<?php

// Get JSON POST data
$json = file_get_contents('php://input');
$data = json_decode($json);

// Set parameters and execute
$form_id = $data->form_id;
$responses = json_encode($data->responses); // Encode responses as JSON

header('Content-Type: application/json');

try {
    $stmt = $conn->prepare("INSERT INTO form_responses (responses, form_id) VALUES (?, ?)");
    $stmt->bind_param("si", $responses, $form_id);

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
    // If there's an exception/error, it will be caught here.
    $response = array(
        "status" => "failed",
        "message" => "Error occurred: " . $e->getMessage()
    );
}

echo json_encode($response);
