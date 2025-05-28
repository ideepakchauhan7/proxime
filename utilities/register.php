<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proxime";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    
    $check_sql = "SELECT * FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
       
        $user = $result->fetch_assoc();
        if ($user['email'] === $email) {
            if (password_verify($password, $user['password_hash'])) {
                $message = "User is already registered.";
            } else {
                $message = "Invalid credentials. Please check your password.";
            }
        } else {
            $message = "Invalid credentials. Please check your details.";
        }
    } else {
       
        $hashed_password = password_hash($password, PASSWORD_BCRYPT); 
        $sql = "INSERT INTO users (full_name, email, phone_number, password_hash) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $full_name, $email, $phone_number, $hashed_password);

        if ($stmt->execute()) {
            $message = "Registration successful!";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $check_stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="../utilities/css/register.css"> 
</head>
<body>
    <div class="registration-container">
        <h1 align="center">Register</h1>
        <form action="registration.php" method="POST">
        <div class="form-group-login">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" placeholder="Your full name" required>
        </div>

            <div class="form-group-login">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Your email address" required>
            </div>
            
            <div class="form-group-login">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" placeholder="Your phone number">
            </div>
            
            <div class="form-group-login">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
            </div>
            

            <button type="submit">Register</button>

            <button type="button" onclick="window.location.href='http://127.0.0.1:5000/register'" class="login-submit-button" style="background-color: #17a2b8;">Register with Face</button>
        </form>

        <?php if (!empty($message)) { ?>
            <div class="message-box">
                <p><?php echo $message; ?></p>
                <?php if (strpos($message, 'already registered') !== false) { ?>
                    <a href="loginpage.php" class="login-link">Login</a>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="loginto">
            <a href="../utilities/loginpage.php">Already Have an Account? Login Here</a>
        </div>
    </div>

    <div class="footer">
    &copy; 2024 Proxime. All rights reserved.
    </div>
</body>
</html>
