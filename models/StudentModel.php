<?php
require_once __DIR__ . "/../config/database.php";

class StudentModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection(); // Use getConnection() instead of connect()

    }

    public function registerStudent($username, $email, $password, $grade, $subjects) {
        try {
            $this->conn->beginTransaction(); // Start transaction
            
            // Insert into users table
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $role_id = 1; // Student Role ID

            $query = "INSERT INTO users (user_name, email, password, role_id, created_at) 
                      VALUES (?, ?, ?, ?, NOW())";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$username, $email, $hashedPassword, $role_id]);

            // Get the last inserted user_id
            $user_id = $this->conn->lastInsertId();

            // Insert into students table
            $query2 = "INSERT INTO student (user_id, subject, grade) VALUES (?, ?, ?)";
            $stmt2 = $this->conn->prepare($query2);
            $stmt2->execute([$user_id, $subject, $grade]);

            $this->conn->commit(); // Commit transaction
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack(); // Rollback on failure
            return false;
        }
    }
}
?>
