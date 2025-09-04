<?php
include 'connect.php';

include 'session_check.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $activity_date = $_POST['activity_date'];

    $image_name = NULL;

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image_name = uniqid() . "." . $ext; // unique file name
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image_name);
    }

    // Use $mysqli from connect.php
    $stmt = $mysqli->prepare("INSERT INTO activities (title, description, activity_date, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $description, $activity_date, $image_name);
    $stmt->execute();
    $stmt->close();

    header("Location: activities.php");
    exit;
}
?>
