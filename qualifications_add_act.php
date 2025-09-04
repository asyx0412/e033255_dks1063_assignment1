<?php
include 'connect.php'; // defines $mysqli

// Get form data safely
$achievement = $_POST['achievement'] ?? '';
$description = $_POST['description'] ?? '';
$year        = $_POST['year'] ?? '';

// Handle image upload
$imageName = null;
if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
    $targetDir = "uploads/";
    $imageName = time() . "_" . basename($_FILES['image']['name']);
    $targetFile = $targetDir . $imageName;

    // Optional: restrict file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (in_array($fileType, $allowedTypes)) {
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    } else {
        $imageName = null; // ignore invalid file type
    }
}

// Insert into database using prepared statement
$stmt = $mysqli->prepare("INSERT INTO qualifications (achievement, description, year, image) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $achievement, $description, $year, $imageName);

if ($stmt->execute()) {
    $stmt->close();
    header("Location: qualifications.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}
