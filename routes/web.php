<?php
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

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
