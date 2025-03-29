<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <h2 class="text-center mb-4">Register</h2>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        
        <form action="/ims-gurukula/controllers/AuthController.php" method="POST">
            <!-- Name input -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            
            <!-- Email input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            
            <!-- Password input -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            
            <!-- Role selection -->
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role_id" id="role" class="form-select" required>
                    <option value="1">Student</option>
                    <option value="2">Teacher</option>
                    <option value="3">Parent</option>
                    <option value="4">Worker</option>
                    <option value="5">Owner</option>
                </select>
            </div>
            
            <!-- Extra fields based on role -->
            <div id="extra-fields" class="mb-3"></div>
            
            <!-- Submit button -->
            <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
    
    <script>
        document.querySelector('select[name="role_id"]').addEventListener('change', function() {
            const extraFields = document.getElementById('extra-fields');
            extraFields.innerHTML = '';
            
            if (this.value == '1') { // Student
                extraFields.innerHTML = 
                    '<div class="mb-3">' +
                    '<label for="phone" class="form-label">Phone</label>' +
                    '<input type="text" name="phone" id="phone" class="form-control" required>' +
                    '</div>' +
                    '<div class="mb-3">' +
                    '<label for="registration_date" class="form-label">Registration Date</label>' +
                    '<input type="date" name="registration_date" id="registration_date" class="form-control" required>' +
                    '</div>';
            } else if (this.value == '2') { // Teacher
                extraFields.innerHTML = 
                    '<div class="mb-3">' +
                    '<label for="subject" class="form-label">Subject</label>' +
                    '<input type="text" name="subject" id="subject" class="form-control" required>' +
                    '</div>';
            } else if (this.value == '4') { // Worker
                extraFields.innerHTML = 
                    '<div class="mb-3">' +
                    '<label for="phone" class="form-label">Phone</label>' +
                    '<input type="text" name="phone" id="phone" class="form-control" required>' +
                    '</div>' +
                    '<div class="mb-3">' +
                    '<label for="job_role" class="form-label">Job Role</label>' +
                    '<input type="text" name="job_role" id="job_role" class="form-control" required>' +
                    '</div>';
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
