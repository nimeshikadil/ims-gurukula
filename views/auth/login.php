<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Owner Login - Gurukula Institution</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa; /* Light Background */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
      background:rgb(137, 194, 255); 
      color: white;
      font-size: 1.4rem;
      text-align: center;
      font-weight: bold;
      border-radius: 10px 10px 0 0;
    }
    .form-control {
      border-radius: 8px;
    }
    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
    .btn-primary {
      background: #007bff;
      border: none;
      padding: 12px;
      font-size: 1rem;
      border-radius: 8px;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">Owner Login</div>
          <div class="card-body">
            <?php if(isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
            <form method="POST" action="/ims-gurukula/login">
            <div class="mb-3">
                <label for="user_name" class="form-label">Username</label>
                <input type="text" name="user_name" id="user_name" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
