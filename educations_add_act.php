<?php
include 'connect.php';
include 'session_check.php';

$study = $_POST['study'];
$description = $_POST['discription'];
$start_year = $_POST['start_year'];
$end_year = $_POST['end_year'];

$imageName = null;

if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
    $targetDir = "uploads/";
    $imageName = basename($_FILES["image"]["name"]); // only filename
    $targetFilePath = $targetDir . $imageName;

    // Move file to uploads/ folder
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // success
    } else {
        $imageName = null; // fallback if upload fails
    }
}

// Insert into DB
$stmt = $mysqli->prepare("INSERT INTO educations (study, discription, start_year, end_year, image) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $study, $description, $start_year, $end_year, $imageName);

if ($stmt->execute()) {
    header("Location: educations.php");
} else {
    echo "Error: " . $stmt->error;
}
?>
