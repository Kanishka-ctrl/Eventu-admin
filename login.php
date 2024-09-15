<?php
session_start();

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$db_name = "eventdb"; // Replace with your actual database name

$conn = new mysqli($host, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check admin credentials
    $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['uname'] = $username;
        header("Location: admin_dashboard.php"); // Redirect to the admin dashboard upon successful login
    } else {
        $login_error = "Invalid username or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" value="Login">
        </form>
        <?php
        if (isset($login_error)) {
            echo "<p style='color: red;'>$login_error</p>";
        }
        ?>
    </div>
    <!-- Add your JavaScript scripts here if needed -->
</body>
</html>
