<?php
include 'connect.php'; // Make sure this defines $mysqli
include 'session_check.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']); // ID of the activity to update
    $title = $_POST['title'];
    $description = $_POST['description'];
    $activity_date = $_POST['activity_date'];

    // Check if a new image was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image_name = uniqid() . "." . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image_name);

        // Update all fields including image
        $stmt = $mysqli->prepare("UPDATE activities SET title=?, description=?, activity_date=?, image=? WHERE id=?");
        $stmt->bind_param("ssssi", $title, $description, $activity_date, $image_name, $id);
    } else {
        // Update only title, description, and date (image unchanged)
        $stmt = $mysqli->prepare("UPDATE activities SET title=?, description=?, activity_date=? WHERE id=?");
        $stmt->bind_param("sssi", $title, $description, $activity_date, $id);
    }

    $stmt->execute();
    $stmt->close();

    header("Location: activities.php");
    exit;
}
?>
