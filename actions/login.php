<?php
// Get user input from form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL query to select user
$query = $conn->prepare("SELECT * FROM users WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();

// Store the result so we can check if the account exists in the database.
$result = $query->get_result();
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the password with the hashed password in the database
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('location: ' . BASE_URL . '/dashboard');
        exit;
        // Start session, set session variables, etc.
    } else {
        $_SESSION['error_message'] = 'Login failed. Invalid credentials.';
        header('location: ' . BASE_URL . '/login');
        exit;
    }
} else {
    $_SESSION['error_message'] = 'Login failed. Invalid credentials.';
    header('location: ' . BASE_URL . '/login');
    exit;
}

// Close the connection
$conn->close();
