<?php
// add_subject.php

// Enable error reporting for debugging (remove or disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include your database connection file from the config folder
require_once __DIR__ . '/../../config/database.php';

// Create a new PDO connection using your Database class
$database = new Database();
$conn = $database->getConnection();

$message = "";

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Use the null coalescing operator to ensure a default value
    $subject_id = trim($_POST['subject_id'] ?? '');
    $subject_name = trim($_POST['subject_name'] ?? '');

    // Basic validation: Ensure both fields are not empty
    if (empty($subject_id) || empty($subject_name)) {
        $message = "Both subject ID and subject name are required.";
    } else {
        // Prepare the insert query (for subject_id and subject_name)
        $stmt = $conn->prepare("INSERT INTO subject (subject_id, subject_name) VALUES (?, ?)");
        
        // Execute the statement with the subject id and subject name as parameters
        if ($stmt->execute([$subject_id, $subject_name])) {
            $message = "Subject added successfully!";
        } else {
            $message = "Error adding subject.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Subject</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Add New Subject</h2>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="add_subject.php">
            <div class="mb-3">
                <label for="subject_id" class="form-label">Subject ID</label>
                <input type="number" class="form-control" id="subject_id" name="subject_id" placeholder="Enter subject ID" required>
            </div>
            <div class="mb-3">
                <label for="subject_name" class="form-label">Subject Name</label>
                <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Enter subject name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Subject</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
