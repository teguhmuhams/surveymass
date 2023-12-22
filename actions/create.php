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

header('Content-Type: application/json');

try {
    $stmt = $conn->prepare("INSERT INTO forms (slug, user_id, title, description, items) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $slug, $user_id, $title, $description, $items);

    if ($stmt->execute()) {
        $response = array(
            "status" => "success",
            "message" => "Data received!"
        );
    } else {
        // If the statement execution fails, it will go here.
        $response = array(
            "status" => "failed",
            "message" => "Unable to perform your requests."
        );
    }

    $stmt->close();
} catch (Exception $e) {
    $response = array(
        "status" => "error",
        "message" => "Error: " . $e->getMessage(),
    );
}

echo json_encode($response);
