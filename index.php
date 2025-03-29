<?php
// ims-gurukula/index.php

// Enable error reporting for debugging (optional)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the routing file to handle the request
require_once __DIR__ . '/routes/web.php';
?>
