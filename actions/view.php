<?php

// Get JSON POST data
$json = file_get_contents('php://input');
$data = json_decode($json);

// Set parameters and execute
$form_id = $data->form_id;
$answers = json_encode($data->answers); // Encode answers as JSON
$user_id = 1;

$stmt = $conn->prepare("INSERT INTO form_answers (answers, form_id, user_id) VALUES (?, ?, ?)");
$stmt->bind_param("sii", $answers, $form_id, $user_id);

header('Content-Type: application/json');
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error inserting data']);
}
$stmt->close();
