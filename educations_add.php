<?php
include 'connect.php';
include 'session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="input.css">
</head>

<h1>Add Education</h1>
<form method="POST" action="educations_add_act.php" enctype="multipart/form-data">
    <label>Study:</label><br>
    <input type="text" name="study" required><br><br>

    <label>Description:</label>
    <textarea name="discription" required></textarea><br><br>

    <label>Start Year:</label>
    <input type="text" name="start_year"><br><br>

    <label>End Year:</label>
    <input type="text" name="end_year"><br><br>

    <label>Image:</label><br>
    <input type="file" name="image"><br><br>

    <input type="submit" value="Add Education">
    <a href="educations.php" class="back-link">Back to List</a>
</form>
