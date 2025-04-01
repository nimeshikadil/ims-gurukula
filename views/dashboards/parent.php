<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Worker Dashboard - Gurukula Institution</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
      font-size: 1.2rem;
    }
    /* Sidebar styles */
    .sidebar {
      height: 100vh;
      width: 260px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #02005F;
      padding: 25px;
      color: #fff;
      transition: all 0.3s;
    }
    .sidebar h3 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 1.8rem;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 12px;
      margin-bottom: 12px;
      border-radius: 8px;
      font-size: 1.2rem;
      transition: 0.3s;
    }
    .sidebar a:hover,
    .sidebar a.active {
      background-color: #67BAFD;
      transform: scale(1.05);
    }
    /* Main content styles */
    .content {
      margin-left: 280px;
      padding: 30px;
    }
    /* Dashboard cards styles */
    .dashboard-card {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
      text-align: center;
      padding: 35px;
      transition: transform 0.3s ease-in-out;
      margin-bottom: 20px;
      width: 700px;
      max-width: 300px;
      
    }
    .dashboard-card:hover {
      transform: translateY(-5px);
    }
    .dashboard-card i {
      font-size: 40px;
      color: #007bff;
      margin-bottom: 10px;
    }
    .dashboard-card h5 {
      font-size: 1.3rem;
      margin-bottom: 0;
      font-weight: 600;
    }
    .card-container {
      display: flex;
      justify-content: center;
      gap: 90px;
      flex-wrap: wrap;
    }
  </style>
</head>
<body>
  
<?php include_once __DIR__ . '/../../assets/parent_sidebar.php'; ?>
  <!-- Main Content -->
  <div class="content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']['user_name'] ?? 'Parent'); ?>!</h2>
    
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
