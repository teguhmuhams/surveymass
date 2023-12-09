<?php

// Get JSON POST data
$json = file_get_contents('php://input');
$data = json_decode($json);

// Set parameters and execute
$title = $data->form_title;
$description = $data->form_desc;
$items = json_encode($data->items); // Encode items as JSON
$user_id = $_SESSION['user']['id'];
$slug = $data->slug;

$stmt = $conn->prepare("INSERT INTO forms (slug, user_id, title, description, items) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $slug, $user_id, $title, $description, $items);

if ($stmt->execute()) {
    $_SESSION['message'] = '<div class="alert alert-success">Form created successfully</div>';
    header('Location: ' . BASE_URL . '/dashboard');
}
$stmt->close();
