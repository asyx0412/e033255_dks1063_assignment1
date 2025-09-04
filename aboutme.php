<?php
session_start();        // Always start the session first
include 'connect.php';  // Connect to the database if needed

// check if logged in
if (!isset($_SESSION['userID'])) {
    header("Location: login.php?message=Please login first");
    exit;
}

// fetch aboutme row
$sql = "SELECT * FROM aboutme WHERE id = 1 LIMIT 1";
$result = $mysqli->query($sql);

// set $about safely
$about = null;
if ($result && $result->num_rows > 0) {
    $about = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>About Me</title>
    <link rel="stylesheet" href="stylemain.css">
</head>
<body>
    <h1>About Me</h1>

    <nav class="navbar">
        <ul>
            <li><a href="admin.php">home</a></li>
            <li><a href="aboutme.php">about me</a></li>
            <li><a href="activities.php">my activity</a></li>
            <li><a href="educations.php">my education</a></li>
            <li><a href="qualifications.php">my qualification</a></li>
            <li><a href="interests.php">my interest</a></li>
            <li><a href="logout.php" style="color: #ff4d4d; font-weight: bold;">Logout</a></li>
        </ul>
    </nav>

    <?php if ($about): ?>
        <!-- Display profile image above the table -->
        <?php if (!empty($about['image'])): ?>
            <div style="text-align:center; margin-bottom:20px;">
                <img src="uploads/<?php echo htmlspecialchars($about['image']); ?>" 
                     alt="Profile Image" width="150" style="border-radius:50%;">
            </div>
        <?php endif; ?>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Full Name</th>
                <td><?php echo htmlspecialchars($about['full_name']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo urlencode($about['email']); ?>" target="_blank">
                        <?php echo htmlspecialchars($about['email']); ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo htmlspecialchars($about['phone']); ?></td>
            </tr>
            <tr>
                <th>Location</th>
                <td><?php echo htmlspecialchars($about['location']); ?></td>
            </tr>
            <tr>
                <th>Bio</th>
                <td><?php echo nl2br(htmlspecialchars($about['bio'])); ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p>No information available yet. <a href="aboutme_edit.php">Add now</a></p>
    <?php endif; ?>

    <div class="add-button">
        <a href="aboutme_edit.php">Edit About Me</a>
    </div>

    <br>

</body>
</html>
