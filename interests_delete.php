<?php
include 'connect.php';
include 'session_check.php';

$id = $_GET['id'];

// 1. Get the image filename using a prepared statement
$stmt = $mysqli->prepare("SELECT image FROM interests WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$interest = $result->fetch_assoc();

// 2. Delete the image file if it exists
if ($interest && $interest['image'] && file_exists('uploads/' . $interest['image'])) {
    unlink('uploads/' . $interest['image']);
}

// 3. Delete the selected row
$stmt = $mysqli->prepare("DELETE FROM interests WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

// 4. Redirect back to the list page
header("Location: interests.php");
exit;
?>
