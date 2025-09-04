<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="input.css">
    <title>Login</title>
</head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(270deg, #6a11cb, #2575fc, #ff6a00, #ff0080);
      background-size: 800% 800%;
      animation: gradientMove 15s ease infinite;
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      text-align: center;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    }

    p {
      font-size: 1.2rem;
      margin: 10px 0;
    }

    a {
      display: inline-block;
      padding: 10px 20px;
      background: #fff;
      color: #2575fc;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    a:hover {
      background: #2575fc;
      color: #fff;
    }
  </style>
<body>
    <h2>Login</h2>

    <!-- Show error if redirected with message -->
    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>

    <form action="login_act.php" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
