<?php
session_start();
include "connect.php"; // your $mysqli connection

// Get input safely
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// Check if fields are filled
if (empty($username) || empty($password)) {
    header("Location: login.php?error=Please fill in all fields");
    exit();
}

// Prepare SQL query to fetch user
$stmt = $mysqli->prepare("SELECT userID, userName, password FROM users WHERE userName = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Verify password
    // Use password_verify() if your DB stores hashed passwords
    if ($password === $row['password']) { // for plain text passwords

        // Login successful → store session
        $_SESSION['loggedin'] = true;
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['userName'] = $row['userName'];

        header("Location: admin.php"); // redirect to admin/dashboard
        exit();
    } else {
        header("Location: login.php?error=Invalid password");
        exit();
    }
} else {
    header("Location: login.php?error=User not found");
    exit();
}
?>
