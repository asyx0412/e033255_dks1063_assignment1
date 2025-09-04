<?php
include 'connect.php'; // defines $mysqli

$id = intval($_POST['id'] ?? 0);
$achievement = $_POST['achievement'] ?? '';
$description = $_POST['description'] ?? '';
$year = $_POST['year'] ?? '';

// Fetch current image
$result = $mysqli->query("SELECT image FROM qualifications WHERE id=$id");
$current = $result->fetch_assoc();
$finalImage = $current['image'] ?? null;

// Handle new image upload
if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
    $targetDir = "uploads/";
    $imageName = time() . "_" . basename($_FILES['image']['name']);
    $targetFile = $targetDir . $imageName;

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (in_array($fileType, $allowedTypes)) {
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
        $finalImage = $imageName; // replace with new image
    }
}

// Update the database safely
$stmt = $mysqli->prepare("UPDATE qualifications SET achievement=?, description=?, year=?, image=? WHERE id=?");
$stmt->bind_param("ssssi", $achievement, $description, $year, $finalImage, $id);

if ($stmt->execute()) {
    $stmt->close();
    header("Location: qualifications.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}
