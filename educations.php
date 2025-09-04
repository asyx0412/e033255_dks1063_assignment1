<?php
include 'connect.php';
include 'session_check.php';

// Fetch all educations
$result = $mysqli->query("SELECT * FROM educations");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stylemain.css">
    <title>Educations</title>
</head>
<body>
    <h1>Educations</h1>

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
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="card">
                <?php if($row['image']): ?>
                    <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="Education Image">
                <?php endif; ?>

                <h3><?= htmlspecialchars($row['study']) ?></h3>
                <p><?= htmlspecialchars($row['discription']) ?></p>
                <p><strong>Start Year:</strong> <?= htmlspecialchars($row['start_year']) ?></p>
                <p><strong>End Year:</strong> <?= htmlspecialchars($row['end_year']) ?></p>

                <div class="actions">
                    <a href="educations_edit.php?id=<?= $row['id'] ?>">✏️ Edit</a>
                    <a href="educations_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="add-button">
    <a href="educations_add.php">➕ Add New Education</a>
    </div>

    <br>

</body>
</html>
