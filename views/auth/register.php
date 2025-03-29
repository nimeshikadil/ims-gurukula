<?php
// register.php

// Enable error reporting (for debugging - remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection parameters
$host = 'localhost';
$dbname = 'lms_db'; // Change to your database name
$dbUser = 'root';
$dbPass = '';

try {
    // Create a new PDO connection
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$message = "";

// Process the registration form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and trim form data
    $user_name = trim($_POST['user_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    // Optionally, allow the user to select a role. Default is Student (role_id = 1)
    $role_id = isset($_POST['role_id']) ? intval($_POST['role_id']) : 1;

    // Basic validation
    if(empty($user_name) || empty($email) || empty($password)) {
        $message = "Please fill in all fields.";
    } else {
        // Check if a user with the same username or email already exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR user_name = ?");
        $stmt->execute([$email, $user_name]);
        if ($stmt->rowCount() > 0) {
            $message = "A user with that email or username already exists.";
        } else {
            // Hash the password using BCRYPT
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert the new user into the users table
            $stmt = $pdo->prepare("INSERT INTO users (user_name, email, password, role_id) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$user_name, $email, $hashedPassword, $role_id])) {
                $message = "Registration successful! You can now log in.";
            } else {
                $message = "Registration failed. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Gurukula Institution</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 450px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="register-container">
        <h3 class="text-center mb-4">User Registration</h3>
        <?php if($message): ?>
            <div class="alert alert-info text-center"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="register.php">
            <div class="mb-3">
                <label for="user_name" class="form-label">Username</label>
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
            </div>
            <!-- Optional: Role selection -->
            <div class="mb-3">
                <label for="role_id" class="form-label">Role</label>
                <select name="role_id" id="role_id" class="form-control">
                    <option value="1" selected>Student</option>
                    <option value="2">Teacher</option>
                    <option value="5">Owner</option>
                    <option value="3">Parent</option>
                    <option value="4">Worker</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
