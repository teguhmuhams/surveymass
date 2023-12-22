<?php
// Unset all of the session variables.
$_SESSION = array();

// destroy the session.
session_destroy();


// Redirect to index.php
header("Location: index.php");
exit();
