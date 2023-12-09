<?php

// Get user input from form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if email already exists
$checkQuery = $conn->prepare("SELECT email FROM users WHERE email = ?");
$checkQuery->bind_param("s", $email);
$checkQuery->execute();
$result = $checkQuery->get_result();

if ($result->num_rows > 0) {
    $_SESSION['message'] = '<div class="alert alert-danger">Registration failed. Email already registered.</div>';
    header('location: ' . BASE_URL . '/register');
    exit;
} else {
    // Email does not exist, proceed with registration

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query to insert user
    $insertQuery = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $insertQuery->bind_param("sss", $name, $email, $hashed_password);

    // Execute the query
    if ($insertQuery->execute()) {
        $_SESSION['message'] = '<div class="alert alert-success">Registration success</div>';
        header('Location: ' . BASE_URL . '/login');
        exit;
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger">Registration failed.' . $insertQuery->error . '</div>';
        header('location: ' . BASE_URL . '/register');
        exit;
    }
}

// Close the connection
$conn->close();
