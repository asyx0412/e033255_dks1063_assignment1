<?php
include 'session_check.php'; // protect the page
$mysqli = new mysqli("localhost", "root", "", "asyx");

// Fetch activities
$sql = "SELECT * FROM activities ORDER BY activity_date DESC";
$result = $mysqli->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Activities</title>
    <link rel="stylesheet" href="stylemain.css">

</head>
<body>


    <h1>My Activities</h1>

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

    


    <div class="card-container">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <?php if (!empty($row['image'])): ?>
                        <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Activity Image">
                    <?php endif; ?>
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                    <p><strong>Date:</strong> <?php echo $row['activity_date']; ?></p>
                    <div class="actions">
                        <a href="activities_edit.php?id=<?php echo $row['id']; ?>">✏️ Edit</a>
                        <a href="activities_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No activities found.</p>
        <?php endif; ?>
    </div>

    <div class="add-button">
    <a href="activities_add.php">➕ Add New Activity</a>
    </div>

    <br>

</body>
</html>
