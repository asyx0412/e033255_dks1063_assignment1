<?php
session_start();
include 'session_check.php';

// Check if user is logged in
if (!isset($_SESSION['userName'])) {
    header("Location: login.php?error=Please login first");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylemain.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>ADMIN DASHBOARD</h1>

    <nav class="navbar">
        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="aboutme.php">About Me</a></li>
            <li><a href="activities.php">My Activity</a></li>
            <li><a href="educations.php">My Education</a></li>
            <li><a href="qualifications.php">My Qualification</a></li>
            <li><a href="interests.php">My Interest</a></li>
            <li><a href="logout.php" style="color: #ff4d4d; font-weight: bold;">Logout</a></li>
        </ul>
    </nav>

    <main>
        <!-- Admin Box -->
        <div class="admin-box" style="max-width: 800px; margin: 20px auto; padding: 20px; background: rgba(30, 39, 97, 0.6); border-radius: 12px; text-align: center;">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['userName']); ?>!</h2>
            <p>Welcome to your admin dashboard! Here you can manage all your content, update information, and keep track of your activities. Explore the links below to navigate through the sections.</p>
            <a href="aboutme_edit.php" style="display: inline-block; margin-top: 15px;">Edit About Me</a>
        </div>

        <!-- Quick Links Section -->
        <div class="card-container">
            <div class="card">
                <h3>Manage Activities</h3>
                <p>Add, edit, or delete your activities.</p>
                <div class="actions">
                    <a href="activities.php">Go</a>
                </div>
            </div>
            <div class="card">
                <h3>Manage Education</h3>
                <p>Update your education history easily.</p>
                <div class="actions">
                    <a href="educations.php">Go</a>
                </div>
            </div>
            <div class="card">
                <h3>Manage Qualifications</h3>
                <p>Keep your qualifications up to date.</p>
                <div class="actions">
                    <a href="qualifications.php">Go</a>
                </div>
            </div>
            <div class="card">
                <h3>Manage Interests</h3>
                <p>Edit your interests to showcase them.</p>
                <div class="actions">
                    <a href="interests.php">Go</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
