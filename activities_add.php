<?php
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


<body>

<form method="post" action="activities_add_act.php" enctype="multipart/form-data">
<h2 class="form-title">add activities</h2>

        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" placeholder="Title" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" placeholder="Description"></textarea><br><br>

        <label for="activity_date">Date:</label><br>
        <input type="date" id="activity_date" name="activity_date"><br><br>

        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br><br>

        <button type="submit">Add Activity</button>

        <a href="activities.php" class="back-link">Back to List</a>

</form>

<body>
