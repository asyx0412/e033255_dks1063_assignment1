<?php
include 'connect.php';
include 'session_check.php';

$id = $_GET['id'];

// Delete the row safely with prepared statement
$stmt = $mysqli->prepare("DELETE FROM educations WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: educations.php");
exit;
?>
