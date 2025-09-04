<?php
include 'connect.php';
include 'session_check.php';

$id = $_POST['id'];
$study = $_POST['study'];
$description = $_POST['discription'];
$start_year = $_POST['start_year'];
$end_year = $_POST['end_year'];

// Check if a new image is uploaded
$imageName = null;
if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
    $targetDir = "uploads/";
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // success
    } else {
        $imageName = null;
    }
}

if ($imageName) {
    // Update with new image
    $stmt = $mysqli->prepare("UPDATE educations SET study=?, discription=?, start_year=?, end_year=?, image=? WHERE id=?");
    $stmt->bind_param("sssssi", $study, $description, $start_year, $end_year, $imageName, $id);
} else {
    // Update without touching image
    $stmt = $mysqli->prepare("UPDATE educations SET study=?, discription=?, start_year=?, end_year=? WHERE id=?");
    $stmt->bind_param("ssssi", $study, $description, $start_year, $end_year, $id);
}

if ($stmt->execute()) {
    header("Location: educations.php");
} else {
    echo "Error: " . $stmt->error;
}
?>
