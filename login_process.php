<?php
session_start();

// Your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$database = "suggestionform";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get input data
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database for the user
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // Login successful
    $_SESSION['username'] = $username;
    header("Location: index.html");
} else {
    // Login failed
    echo "Invalid username or password. <a href='login.php'>Try again</a>";
}

$conn->close();
?>
