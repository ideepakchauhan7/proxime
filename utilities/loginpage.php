<?php
session_start();
include '../config/db_config.php'; // Ensure DB connection is included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error_message = "All fields are required.";
    } else {
        // Check if the user exists
        $query = "SELECT id, name, password FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $db_password);
            $stmt->fetch();

            // Verify the hashed password
            if (password_verify($password, $db_password)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $name;

                header("Location: ./dashboard.php"); 
                exit();
            } else {
                $error_message = "Incorrect password.";
            }
        } else {
            $error_message = "No account found with this email.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proxime - Login</title>
    <link rel="stylesheet" href="../utilities/css/loginpagestyle.css">
</head>
<body>
<div class="login-container">
    <h2>Welcome to Proxime</h2>
    <form method="POST" action="./loginpage.php">
        <div class="form-group-login">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group-login">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="login-submit-button">Login</button>
    </form>

    <div class="form-group-login">
    <button type="button" onclick="window.location.href='http://127.0.0.1:5000/'" class="login-submit-button" style="background-color: #28a745;">Login with Face</button>
    <!-- <button type="button" onclick="window.location.href='http://127.0.0.1:5000/register'" class="login-submit-button" style="background-color: #17a2b8;">Register with Face</button> -->
</div>

    <!-- <button type="button" onclick="startFaceLogin()">Login with Face</button> -->


    <?php if (isset($error_message)): ?>
        <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <div class="forgot-password">
        <a href="#">Forgot Password?</a>
    </div>
</div>

<div class="footer">
    &copy; 2024 Proxime. All rights reserved.
</div>
</body>
</html>

<script>
async function startFaceLogin() {
  const stream = await navigator.mediaDevices.getUserMedia({ video: true });
  const video = document.createElement('video');
  video.srcObject = stream;
  video.play();

  setTimeout(async () => {
    const canvas = document.createElement('canvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);

    const image = canvas.toDataURL('image/jpeg');
    stream.getTracks().forEach(track => track.stop());

    const response = await fetch('http://127.0.0.1:5000/scan', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ image })
    });

    const result = await response.json();
    if (result.found) {
      window.location.href = `./dashboard.php?user_id=${result.id}`;
    } else {
      window.location.href = './face_register.php';
    }
  }, 2000);
}
</script>

