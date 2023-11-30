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
    echo "Email already exists";
} else {
    // Email does not exist, proceed with registration

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query to insert user
    $insertQuery = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $insertQuery->bind_param("sss", $name, $email, $hashed_password);

    // Execute the query
    if ($insertQuery->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $insertQuery->error;
    }
}

// Close the connection
$conn->close();
