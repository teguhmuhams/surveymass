<?php

// Get JSON POST data
$json = file_get_contents('php://input');
$data = json_decode($json);

// Set parameters and execute
$title = $data->form_title;
$description = $data->form_desc;
$items = json_encode($data->items); // Encode items as JSON
$user_id = 1;
$slug = $data->slug;

$stmt = $conn->prepare("INSERT INTO forms (slug, user_id, title, description, items) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $slug, $user_id, $title, $description, $items);

header('Content-Type: application/json');
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error inserting data']);
}
$stmt->close();
