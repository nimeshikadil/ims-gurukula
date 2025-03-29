<?php
// views/owner/dashboard.php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 3) {
    header("Location: /login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Owner Dashboard - Gurukula Institution</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    .sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #343a40;
      padding: 20px;
      color: #fff;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
      display: block;
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 5px;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      margin-left: 270px;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h3 class="text-center">Owner Dashboard</h3>
    <a href="/owner/dashboard"><i class="fas fa-home"></i> Home</a>
    <a href="/admin/financial-updates"><i class="fas fa-money-bill-wave"></i> Financial Updates</a>
    <a href="/admin/forum"><i class="fas fa-comments"></i> Forum</a>
    <a href="/logout" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>
  <div class="content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']['user_name']); ?>!</h2>
    <p>This is your owner dashboard. You can add more functionality here.</p>
  </div>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
