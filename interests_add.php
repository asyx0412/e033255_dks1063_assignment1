<!DOCTYPE html>
<html>
<head>
    <title>Add Interest</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
<form action="interests_add_act.php" method="post" enctype="multipart/form-data">
    <h2 class="form-title">add interests</h2>
    <form action="interests_add_act.php" method="post" enctype="multipart/form-data">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>

        <label>Image:</label><br>
        <input type="file" name="image"><br><br>
        
        <input type="submit" value="Add Interest">
        <a href="interests.php" class="back-link">Back to List</a>
    </form>
</body>
</html>
