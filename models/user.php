<?php
// models/User.php
require_once __DIR__ . '/../config/database.php';

class User {
    // Authenticate owner by username and password
    public static function authenticate($user_name, $password) {
        $database = new Database();
        $conn = $database->getConnection();
        
        $query = "SELECT * FROM users WHERE user_name = :user_name LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->execute();
        
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>
