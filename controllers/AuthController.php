<?php
// controllers/AuthController.php
session_start();
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_name = trim($_POST['user_name']);
            $password = $_POST['password'];
            
            // Authenticate using the User model
            $user = User::authenticate($user_name, $password);
            
            // Check if the user is found and is an owner (role_id = 3)
            if ($user && $user['role_id'] == 3) {
                $_SESSION['user'] = $user;
                header("Location: /owner/dashboard");
                exit();
            } else {
                $error = "Invalid credentials or you are not authorized as owner.";
            }
        }
        require_once __DIR__ . '/../views/auth/login.php';
    }
    
    public function logout() {
        session_destroy();
        header("Location: /login");
        exit();
    }
}
?>
