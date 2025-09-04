<?php
include 'connect.php';
include 'session_check.php';

$result = $mysqli->query("SELECT * FROM interests");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stylemain.css">
    <title>Interests</title>
</head>
<body>
    <h1>Interests</h1>

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
                    <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="Interest Image">
                <?php endif; ?>
                <h3><?= htmlspecialchars($row['title']) ?></h3>
                <p><?= htmlspecialchars($row['description']) ?></p>
                <div class="actions">
                    <a href="interests_edit.php?id=<?= $row['id'] ?>">✏️ Edit</a> 
                    <a href="interests_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

        <div class="add-button">
        <a href="interests_add.php">+ Add New Interest</a>
    </div>
    <br>

</body>
</html>
