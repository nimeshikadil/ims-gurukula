<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .register-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .error {
            color: red;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="text-center mb-4">Student Registration</h2>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        
        <form action="/ims-gurukula/controllers/studentController.php" method="POST">
            <!-- Student Name input -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            
            <!-- Student Email input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            
            <!-- Student Phone input -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            
             <!-- Grade selection -->
             <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <select name="grade" id="grade" class="form-select" required>
                    <option >Select Grade</option>
                    <option >Grade 6</option>
                    <option >Grade 7</option>
                    <option >Grade 8</option>
                    <option >Grade 9</option>
                    <option >Grade 10</option>
                    <option >Grade 11</option>
                    <option >Advanced level</option>
                </select>
            </div>

            <!-- Registration Date input -->
            <div class="mb-3">
                <label for="registration_date" class="form-label">Registration Date</label>
                <input type="date" name="registration_date" id="registration_date" class="form-control" required>
            </div>
            
            <!-- Submit button -->
            <button type="submit" name="register_student" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
