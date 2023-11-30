<?php
define('BASE_URL', 'http://localhost:8000');
session_set_cookie_params(0, "/", null, false, true);
ob_start();

// Start the session
session_start();

// Include database connection
$conn = include 'connection.php';
