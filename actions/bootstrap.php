<?php
define('BASE_URL', 'http://localhost:8001/');
session_set_cookie_params(0, "/", null, false, true);
header("Content-Security-Policy: default-src 'self';");
ob_start();

// Start the session
session_start();

// Include database connection
$conn = include 'connection.php';
