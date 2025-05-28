<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Face Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 50px;
    }
    video, canvas {
      margin: 10px;
      border: 1px solid #ccc;
    }
    form {
      max-width: 400px;
      width: 100%;
    }
    input, select, button {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
    }
  </style>
</head>
<body>
  <h2>Register with Face</h2>
  <video id="video" autoplay playsinline width="320" height="240"></video>
  <button onclick="captureImage()">Capture Face</button>
  <canvas id="canvas" width="320" height="240" style="display:none;"></canvas>

  <form id="faceForm">
    <input type="text" name="employee_id" placeholder="Employee ID" required />
    <input type="text" name="name" placeholder="Full Name" required />
    <input type="text" name="major" placeholder="Major" required />
    <input type="number" name="year" placeholder="Current Year" required />
    <input type="number" name="starting_year" placeholder="Starting Year" required />
    <select name="standing" required>
      <option value="">Standing</option>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
    </select>
    <input type="hidden" name="image" id="image" />
    <button type="submit">Register</button>
  </form>

  <script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const imageInput = document.getElementById('image');

    navigator.mediaDevices.getUserMedia({ video: true })
      .then(stream => video.srcObject = stream)
      .catch(err => alert("Camera access denied: " + err));

    function captureImage() {
      const ctx = canvas.getContext('2d');
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
      const imageData = canvas.toDataURL('image/jpeg');
      imageInput.value = imageData;
      alert("Image captured. Now fill the form to register.");
    }

    document.getElementById('faceForm').addEventListener('submit', async function(e) {
      e.preventDefault();
      const formData = new FormData(this);

      const response = await fetch('http://127.0.0.1:5000/register', {
        method: 'POST',
        body: formData
      });

      const result = await response.json();
      alert(result.message);
      if (result.success) window.location.href = './loginpage.php';
    });
  </script>
</body>
</html>

