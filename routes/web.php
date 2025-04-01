<?php
// routes/web.php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// If your project is in the 'ims-gurukula' folder, remove that from the path:
$base = '/ims-gurukula';
if (strpos($request, $base) === 0) {
    $request = substr($request, strlen($base));
}
if ($request == '') {
    $request = '/';
}

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include necessary controllers
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/StudentController.php';

// Initialize controllers
$authController = new AuthController();
$studentController = new StudentController();

switch ($request) {
    case '/login':
        $authController->login();
        break;
        
    case '/logout':
        $authController->logout();
        break;
        

    case '/register_student':
        $studentController->register();
        break;

    default:
        require_once __DIR__ . '/../views/404.php';
        break;
}
?>
