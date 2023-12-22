<?php

// Get JSON POST data
$json = file_get_contents('php://input');
$data = json_decode($json);

$form_id = $_POST['form_id'];

$stmt = $conn->prepare("DELETE FROM forms WHERE id = ?");
$stmt->bind_param("i", $form_id);

if ($stmt->execute()) {
    $_SESSION['message'] = '<div class="alert alert-success">Form deleted successfully</div>';
}

header('Location: ' . BASE_URL . '/dashboard');

$stmt->close();
