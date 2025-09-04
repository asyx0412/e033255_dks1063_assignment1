<?php
session_start();
include 'session_check.php';
// Use the correct session key
if (!isset($_SESSION['userID'])) {
    header("Location: login.php?message=Please login first");
    exit;
}

include "connect.php"; // reuse your DB connection

// Get form inputs safely
$full_name = $_POST['full_name'] ?? '';
$email     = $_POST['email'] ?? '';
$phone     = $_POST['phone'] ?? '';
$location  = $_POST['location'] ?? '';
$bio       = $_POST['bio'] ?? '';

// Handle image upload
$imageName = null;
if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
    $targetDir = "uploads/";
    $imageName = time() . "_" . basename($_FILES['image']['name']); // unique filename
    $targetFile = $targetDir . $imageName;

    // Optional: validate file type
    $allowedTypes = ['jpg','jpeg','png','gif'];
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (in_array($fileType, $allowedTypes)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    } else {
        $imageName = null; // ignore invalid type
    }
}

// Check if row exists
$sql = "SELECT id, image FROM aboutme WHERE id = 1 LIMIT 1";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // If a new image was uploaded, use it; else keep existing
    $finalImage = $imageName ? $imageName : $row['image'];

    $stmt = $mysqli->prepare(
        "UPDATE aboutme SET full_name=?, email=?, phone=?, location=?, bio=?, image=? WHERE id=1"
    );
    $stmt->bind_param("ssssss", $full_name, $email, $phone, $location, $bio, $finalImage);
    $stmt->execute();
    $stmt->close();
} else {
    $stmt = $mysqli->prepare(
        "INSERT INTO aboutme (id, full_name, email, phone, location, bio, image) VALUES (1, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("ssssss", $full_name, $email, $phone, $location, $bio, $imageName);
    $stmt->execute();
    $stmt->close();
}

// redirect back to aboutme.php after save
header("Location: aboutme.php?message=Saved successfully");
exit;
