<?php
session_start();

include 'session_check.php';
// Now only logged-in admins can access this page

// Use the same session key from login_act.php
if (!isset($_SESSION['userID'])) {
    header("Location: login.php?message=Please login first");
    exit;
}

include "connect.php"; // reuse your DB connection

$sql = "SELECT * FROM aboutme WHERE id = 1 LIMIT 1";
$result = $mysqli->query($sql);

$about = $result && $result->num_rows > 0 ? $result->fetch_assoc() : null;
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="input.css">
    <meta charset="UTF-8">
    <title>Edit About Me</title>
</head>
<body>


    <form method="post" action="aboutme_update.php" enctype="multipart/form-data">
        <h2 class="form-title">Edit About Me</h2>
        <label>Full Name:</label><br>
        <input type="text" name="full_name" 
               value="<?php echo htmlspecialchars($about['full_name'] ?? ''); ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" 
               value="<?php echo htmlspecialchars($about['email'] ?? ''); ?>"><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" 
               value="<?php echo htmlspecialchars($about['phone'] ?? ''); ?>"><br><br>

        <label>Location:</label><br>
        <input type="text" name="location" 
               value="<?php echo htmlspecialchars($about['location'] ?? ''); ?>"><br><br>

        <label>Bio:</label><br>
        <textarea name="bio"><?php echo htmlspecialchars($about['bio'] ?? ''); ?></textarea><br><br>

        <label>Current Image:</label><br>
        <?php if (!empty($about['image'])): ?>
            <img src="uploads/<?php echo htmlspecialchars($about['image']); ?>" width="100"><br><br>
        <?php endif; ?>

        <label>Change Image:</label><br>
        <input type="file" name="image"><br><br>

        <input type="submit" value="update about me">
        <a href="aboutme.php" class="back-link">Back to List</a>
    </form>
</body>
</html>
