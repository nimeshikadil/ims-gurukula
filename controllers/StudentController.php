<?php
require_once __DIR__ . "/../models/StudentModel.php";

class StudentController {
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $grade = $_POST['grade'];
            $subjects = $_POST['subjects'];

            if (empty($username) || empty($email) || empty($password) || empty($grade) || empty($subjects)) {
                $message = "All fields are required.";
            } else {
                $studentModel = new StudentModel();
                $success = $studentModel->registerStudent($username, $email, $password, $grade, $subjects);

                if ($success) {
                    $message = "Student registered successfully!";
                } else {
                    $message = "Error in student registration.";
                }
            }

            require_once __DIR__ . "/../views/auth/student_register.php";
        } else {
            require_once __DIR__ . "/../views/auth/student_register.php";
        }
    }
}
?>
