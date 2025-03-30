<?php
// controllers/AuthController.php
session_start();
require_once __DIR__ . '/../models/user.php';

class AuthController {
    public function login() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_name = trim($_POST['user_name']);
            $password = $_POST['password'];
            
            $user = User::authenticate($user_name, $password);
            if ($user && $user['role_id'] == 5) {
                $_SESSION['user'] = $user;
                header("Location: /ims-gurukula/views/dashboards/owner.php");
                exit();
            }else if($user && $user['role_id'] == 1) {
                    $_SESSION['user'] = $user;
                    header("Location: /ims-gurukula/views/dashboards/student.php");
                    exit();
            }else if($user && $user['role_id'] == 2) {
                    $_SESSION['user'] = $user;
                    header("Location: /ims-gurukula/views/dashboards/teacher.php");
                    exit();
            }else if($user && $user['role_id'] == 3) {
                    $_SESSION['user'] = $user;
                    header("Location: /ims-gurukula/views/dashboards/parent.php");
                    exit();
            }else if($user && $user['role_id'] == 4) {
                    $_SESSION['user'] = $user;
                    header("Location: /ims-gurukula/views/dashboards/worker.php");
                    exit();
            } else {
                $error = "Invalid credentials or you are not authorized.";
            }
        }
        require_once __DIR__ . '/ims-gurukula/views/auth/login.php';
    }
    
    public function logout() {
        session_destroy();
        header("Location: /login");
        exit();
    }
}
?>
