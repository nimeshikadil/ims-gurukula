<?php
// controllers/OwnerController.php
session_start();
require_once __DIR__ . '/../config/database.php';

class OwnerController {
    public function dashboard() {
        // Ensure owner is logged in
        if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 3) {
            header("Location: /login");
            exit();
        }
        
        // (Optional) Fetch additional data for the dashboard if needed
        
        require_once __DIR__ . '/../views/owner/dashboard.php';
    }
}
?>
