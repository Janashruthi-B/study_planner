<?php
session_start();

// Establish database connection (replace with your database credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_email = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username/email exists in the database
    $sql = "SELECT id, username, email, password FROM users WHERE username='$username_email' OR email='$username_email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Login successful, store user data in session
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("Location: main_page.php"); // Redirect to main page
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?>
