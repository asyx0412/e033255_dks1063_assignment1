<?php
include 'connect.php';
include 'session_check.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $mysqli->query("DELETE FROM activities WHERE id=$id");
}

header("Location: activities.php");
exit;
?>
