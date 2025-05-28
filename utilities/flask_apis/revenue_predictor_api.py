from flask import Flask, jsonify
from flask_cors import CORS
import mysql.connector
import pandas as pd
from sklearn.linear_model import LinearRegression
import numpy as np
from datetime import datetime
from dateutil.relativedelta import relativedelta

app = Flask(__name__)
CORS(app)

# --- Database Config ---
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': 'IAmCharu',
    'database': 'proxime'
}

@app.route('/')
def home():
    return "Flask Revenue Predictor API is Running! 🚀"

@app.route('/predict_revenue', methods=['GET'])
def predict_revenue():
    try:
        # Connect to MySQL
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor()

        # Fetch revenue data
        query = "SELECT id, month_year, total_revenue FROM revenue ORDER BY id"
        cursor.execute(query)
        result = cursor.fetchall()
        df = pd.DataFrame(result, columns=['id', 'month_year', 'total_revenue'])

        # Prepare data for model
        X = df[['id']]
        y = df['total_revenue']

        model = LinearRegression()
        model.fit(X, y)

        # Last known date from the database
        last_date = df['month_year'].iloc[-1]
        if isinstance(last_date, str):
            last_date = datetime.strptime(last_date, "%Y-%m-%d")

        predictions = {}
        predicted_values = []

        for i in range(1, 13):  # Predict next 12 months
            future_id = len(df) + i
            pred_value = model.predict(pd.DataFrame([[future_id]], columns=['id']))[0]
            future_date = last_date + relativedelta(months=i)
            month_str = future_date.strftime('%b %Y')

            rounded = round(pred_value, 2)
            predictions[month_str] = rounded
            predicted_values.append(rounded)

        # Calculate total and average
        total_predicted = round(sum(predicted_values), 2)
        average_predicted = round(total_predicted / 12, 2)

        return jsonify({
            'status': 'success',
            'yearly_prediction': predictions,
            'total_predicted': total_predicted,
            'average_per_month': average_predicted
        })

    except Exception as e:
        return jsonify({'status': 'error', 'message': str(e)})

if __name__ == '__main__':
    app.run(debug=True)
