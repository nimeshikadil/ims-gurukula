<?php
// views/auth/login.php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: ../dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login - Learning Management System</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <?php if(isset($_GET['error'])): ?>
      <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
    <form action="../../controllers/AuthController.php?action=authenticate" method="post">
      <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
