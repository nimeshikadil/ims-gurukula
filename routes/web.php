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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

switch($request) {
    case '/login':
        require_once __DIR__ . '/../controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
        
    case '/logout':
        require_once __DIR__ . '/../controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;
        
    case '/owner/dashboard':
        require_once __DIR__ . '/../controllers/OwnerController.php';
        $controller = new OwnerController();
        $controller->dashboard();
        break;
        
    default:
        require_once __DIR__ . '/../views/404.php';
        break;
}
?>
