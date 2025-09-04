<?php
include 'connect.php';

$title = $_POST['title'];
$description = $_POST['description'];

// Image upload
$image = '';
if(isset($_FILES['image']) && $_FILES['image']['name'] != '') {
    $image = time().'_'.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$image);
}

$stmt = $mysqli->prepare("INSERT INTO interests (title, description, image) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $description, $image);
$stmt->execute();

header("Location: interests.php");
