<?php
include 'connect.php';
include 'session_check.php';

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM educations WHERE id='$id'");
$education = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Education</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
<h1>Edit Education</h1>
<form method="POST" action="educations_edit_act.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $education['id']; ?>">

    Study: <br>
    <input type="text" name="study" value="<?php echo $education['study']; ?>" required><br><br>

    Description: 
    <input type="text" name="discription" value="<?php echo $education['discription']; ?>"><br><br>

    Start Year: 
    <input type="text" name="start_year" value="<?php echo $education['start_year']; ?>"><br><br>

    End Year: 
    <input type="text" name="end_year" value="<?php echo $education['end_year']; ?>"><br><br>

    <label>Current Image:</label><br>
    <?php if (!empty($education['image'])): ?>
        <img src="uploads/<?php echo htmlspecialchars($education['image']); ?>" width="100" alt="Current Image"><br><br>
    <?php endif; ?>

    <label>Change Image:</label><br>
    <input type="file" name="image"><br><br>

    <input type="submit" value="Update">
    <a href="educations.php" class="back-link">Back to List</a>
</form>

</body>
</html>

