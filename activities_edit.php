<?php
include 'connect.php';
include 'session_check.php';
$id = intval($_GET['id']);

// Use $mysqli, not $conn
$result = $mysqli->query("SELECT * FROM activities WHERE id=$id");
$activity = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Activity</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
    <h1>Edit Activity</h1>
    <form method="post" action="activities_edit_act.php" enctype="multipart/form-data">
        <h2 class="form-title">Edit Activities</h2>
        <input type="hidden" name="id" value="<?php echo $activity['id']; ?>">

        <label>Title:</label><br>
        <input type="text" name="title" value="<?php echo htmlspecialchars($activity['title']); ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description"><?php echo htmlspecialchars($activity['description']); ?></textarea><br><br>

        <label>Date:</label><br>
        <input type="date" name="activity_date" value="<?php echo $activity['activity_date']; ?>"><br><br>

        <label>Current Image:</label><br>
        <?php if (!empty($activity['image'])): ?>
            <img src="uploads/<?php echo htmlspecialchars($activity['image']); ?>" width="100" alt="Current Image"><br><br>
        <?php endif; ?>

        <label>Change Image:</label><br>
        <input type="file" name="image"><br><br>


        <button type="submit">Update</button>
        <a href="activities.php" class="back-link">Back to List</a>
    </form>
</body>
</html>
