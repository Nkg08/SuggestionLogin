<?php
session_start();

// Check if the user is logged in (you can use this check on other protected pages too)
if (isset($_SESSION['username'])) {
    // User is logged in, so destroy the session to log them out
    session_destroy();
}

// Redirect the user to the login page after logout
header("Location: login.php");
exit; // Ensure that no further code is executed after the redirect
?>
