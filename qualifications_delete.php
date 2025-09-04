<?php
include 'connect.php'; // this defines $mysqli

$id = $_GET['id'];

// Delete record
$sql = "DELETE FROM qualifications WHERE id = $id";

if ($mysqli->query($sql) === TRUE) {
    header("Location: qualifications.php");
    exit;
} else {
    echo "Error: " . $mysqli->error;
}
?>
