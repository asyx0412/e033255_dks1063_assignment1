<?php
include 'connect.php';  // defines $mysqli
include 'session_check.php';

$result = $mysqli->query("SELECT * FROM qualifications");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylemain.css">
    <title>Qualifications</title>
</head>
<body>
    <h1>Qualifications</h1>

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

    <!-- Card Container -->
    <div class="card-container">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="card">
                
                <?php if (!empty($row['image'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" 
                alt="Qualification Image">
                <?php endif; ?>

                <h3><?= htmlspecialchars($row['achievement']) ?></h3>
                <p><?= htmlspecialchars($row['description']) ?></p>
                <p><strong>Year:</strong> <?= htmlspecialchars($row['year']) ?></p>

                <div class="actions">
                    <a href="qualifications_edit.php?id=<?= $row['id'] ?>">✏️ Edit</a>
                    <a href="qualifications_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="add-button">
        <a href="qualifications_add.php">➕ Add New Qualification</a>
    </div>

<br>


</body>
</html>
