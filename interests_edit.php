<?php
include 'connect.php';
$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM interests WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="input.css">
    <title>Edit Interest</title>
</head>
<body>
    <h1>Edit Interest</h1>
    <form action="interests_edit_act.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <label>Title:</label><br>

        <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required><?= htmlspecialchars($row['description']) ?></textarea><br><br>
        
        <label>Current Image:</label><br>
        <?php if (!empty($row['image'])): ?>
            <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" width="100" alt="Current Image"><br><br>
        <?php endif; ?>

        <label>Change Image:</label><br>
        <input type="file" name="image"><br><br>


        <input type="submit" value="Update Interest">
        <a href="interests.php" class="back-link">Back to List</a>
    </form>
</body>
</html>
