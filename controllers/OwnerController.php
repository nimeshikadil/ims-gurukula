<?php
// controllers/OwnerController.php
session_start();
require_once __DIR__ . '/../config/database.php';

class OwnerController {
    public function dashboard() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 5) {
            header("Location: /login");
            exit();
        }
        // (Optionally, fetch additional data for the dashboard here)
        require_once __DIR__ . '/../views/owner/dashboard.php';
    }
}
?>
