<?php
include 'connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];

$interest = $mysqli->query("SELECT image FROM interests WHERE id=$id")->fetch_assoc();
$image = $interest['image'];

if(isset($_FILES['image']) && $_FILES['image']['name'] != '') {
    $image = time().'_'.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$image);
}

$stmt = $mysqli->prepare("UPDATE interests SET title=?, description=?, image=? WHERE id=?");
$stmt->bind_param("sssi", $title, $description, $image, $id);
$stmt->execute();

header("Location: interests.php");
