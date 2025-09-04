<?php
include 'connect.php'; // defines $mysqli

$id = intval($_GET['id'] ?? 0); // ensure it's numeric
if ($id <= 0) {
    header("Location: qualifications.php");
    exit;
}

// Fetch the record to edit
$result = $mysqli->query("SELECT * FROM qualifications WHERE id=$id");
$row = $result->fetch_assoc();
if (!$row) {
    header("Location: qualifications.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="input.css">
    <title>Edit Qualification</title>
</head>
<body>



<form action="qualifications_edit_act.php" method="POST" enctype="multipart/form-data">
    <h2 class="form-title">Edit Qualification</h2>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    <label>Achievement:</label><br>
    <input type="text" name="achievement" value="<?= htmlspecialchars($row['achievement']) ?>" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required><?= htmlspecialchars($row['description']) ?></textarea><br><br>

    <label>Year:</label><br>
    <input type="text" name="year" value="<?= htmlspecialchars($row['year']) ?>"><br><br>

    <label>Current Image:</label><br>
    <?php if (!empty($row['image'])): ?>
        <img src="uploads/<?= htmlspecialchars($row['image']) ?>" width="100" alt="Current Image"><br><br>
    <?php else: ?>
        <p></p>
    <?php endif; ?>

    <label>Change Image:</label><br>
    <input type="file" name="image"><br><br>

    <input type="submit" value="Update Qualification" class="small-btn">
    <a href="qualifications.php" class="back-link">Back to List</a>
</form>

</body>
</html>
