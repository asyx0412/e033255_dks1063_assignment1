<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Qualification</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
    
    <form action="qualifications_add_act.php" method="POST" enctype="multipart/form-data">
        <h2 class="form-title">Add Qualification</h2>

        
        <!-- Achievement -->
        <label>Achievement:</label><br>
        <input type="text" name="achievement" required><br><br>

        <!-- Description -->
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>

        <!-- Year -->
        <label>Year:</label><br>
        <input type="text" name="year"><br><br>

        <!-- Image Upload -->
        <label>Image:</label><br>
        <input type="file" name="image"><br><br>

        <input type="submit" value="Add Qualification">
        <a href="qualifications.php" class="back-link">Back to List</a>
    </form>
</body>
</html>
