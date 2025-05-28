from flask import Flask, request, jsonify, render_template, redirect, url_for
from flask_cors import CORS
from firebase_admin import credentials, initialize_app, db
from supabase import create_client, Client
from datetime import datetime
import os
import cv2
import face_recognition
import pickle
import base64
import numpy as np

# --- Flask App Setup ---
app = Flask(__name__)
CORS(app)

# --- Firebase Setup ---
cred = credentials.Certificate("serviceAccountKey.json")
initialize_app(cred, {
    'databaseURL': "https://face-reg-8d928-default-rtdb.firebaseio.com/"
})
firebase_ref = db.reference("Employee")

# --- Supabase Setup ---
SUPABASE_URL = "https://julctvlqgvpceralzvus.supabase.co"
SUPABASE_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imp1bGN0dmxxZ3ZwY2VyYWx6dnVzIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0NTQwMzUzMywiZXhwIjoyMDYwOTc5NTMzfQ.qgxcQZOH-2Pa1jLosYfJqiaJMwZ9OHZaCYo7AFUSerc"
supabase: Client = create_client(SUPABASE_URL, SUPABASE_KEY)
supabase_storage = supabase.storage.from_('employees-images')

# --- Load Existing Encodings ---
ENCODE_FILE = "EncodeFile.p"
encodeListKnown = []
employeeIds = []
if os.path.exists(ENCODE_FILE):
    with open(ENCODE_FILE, "rb") as f:
        try:
            encodeListKnown, employeeIds = pickle.load(f)
        except EOFError:
            print("EncodeFile.p is empty.")
        except Exception as e:
            print(f"Error loading {ENCODE_FILE}: {e}")
else:
    print(f"{ENCODE_FILE} not found. Starting with empty encoding list.")

@app.route('/')
def index():
    return render_template('scanner.html')

@app.route('/scan', methods=['POST'])
def scan():
    data_url = request.json.get('image')
    if not data_url:
        return jsonify({'error': 'No image data provided'}), 400

    try:
        # Decode base64 image
        header, encoded = data_url.split(',', 1)
        img_data = base64.b64decode(encoded)
        np_arr = np.frombuffer(img_data, np.uint8)
        img = cv2.imdecode(np_arr, cv2.IMREAD_COLOR)
        imgS = cv2.resize(img, (0, 0), None, 0.25, 0.25)
        imgS = cv2.cvtColor(imgS, cv2.COLOR_BGR2RGB)
        facesCurFrame = face_recognition.face_locations(imgS)
        encodesCurFrame = face_recognition.face_encodings(imgS, facesCurFrame)

        for encodeFace in encodesCurFrame:
            matches = face_recognition.compare_faces(encodeListKnown, encodeFace)
            faceDis = face_recognition.face_distance(encodeListKnown, encodeFace)
            matchIndex = np.argmin(faceDis)

            if matches[matchIndex]:
                match_id = employeeIds[matchIndex]
                return jsonify({'found': True, 'id': match_id})

        return jsonify({'found': False})

    except Exception as e:
        return jsonify({'error': f'Error during scanning: {str(e)}'}), 500

@app.route('/profile/<emp_id>')
def profile(emp_id):
    data = firebase_ref.child(emp_id).get()
    if data:
        return render_template('profile.html', data=data)
    else:
        return redirect(url_for('register'))

from flask import request, jsonify, render_template
import traceback
import sys
sys.stdout.reconfigure(encoding='utf-8')  # Optional: for proper console output on Windows

@app.route('/register', methods=['GET', 'POST'])
def register():

    if request.method == 'GET':
        return render_template('register.html')  # show the form
    if request.method == 'POST':
        emp_id = request.form['employee_id']
        name = request.form['name']
        major = request.form['major']
        year = request.form['year']
        starting_year = request.form['starting_year']
        standing = request.form['standing']
        image_file = request.files['image']

        try:
            
            existing_employee = firebase_ref.child(emp_id).get()
            if existing_employee:
                return render_template('register.html', error_message="Employee ID already exists in Databse!")

            # Read image content
            image_content = image_file.read()
            image_file.seek(0)

            # Upload to Supabase Storage
            image_path = f"{emp_id}.png"
            supabase_storage.upload(image_path, image_content, {"content-type": image_file.content_type})
            image_url = supabase_storage.get_public_url(image_path)

            # Save to Firebase only
            employee_data = {
                "name": name,
                "major": major,
                "year": year,
                "starting_year": starting_year,
                "total_attendance": 0,
                "standing": standing,
                "last_attendance_time": datetime.now().strftime("%Y-%m-%d %H:%M:%S"),
                "supabase_image_url": image_url
            }
            firebase_ref.child(emp_id).set(employee_data)

            # Encode the uploaded image
            np_arr = np.frombuffer(image_content, np.uint8)
            img = cv2.imdecode(np_arr, cv2.IMREAD_COLOR)
            if img is None:
                raise ValueError("Failed to decode the uploaded image.")

            faces = face_recognition.face_locations(img)
            if not faces:
                raise ValueError("No face detected in the uploaded image.")

            encode = face_recognition.face_encodings(img, faces)[0]
            encodeListKnown.append(encode)
            employeeIds.append(emp_id)

            # Save updated encodings
            with open(ENCODE_FILE, 'wb') as file:
                pickle.dump((encodeListKnown, employeeIds), file)

            return render_template('success.html', name=name)


        except Exception as e:
            # Clean up image and Firebase if something fails
            try:
                supabase_storage.remove([image_path])
                firebase_ref.child(emp_id).delete()
            except Exception as cleanup_error:
                print("Cleanup error:", cleanup_error)

            print("Registration error:", traceback.format_exc())
            return jsonify({'error': f'Registration failed: {str(e) or repr(e)}'}), 500

    return render_template('register.html')



# --- Run Server ---
if __name__ == '__main__':
    app.run(debug=True)