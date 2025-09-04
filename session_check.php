<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "connect.php"; // make sure $mysqli is defined here

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php?message=Please login first");
    exit();
}

// Optional: get current username from session
$current_user = $_SESSION['userName'];
?>
