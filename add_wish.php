<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data && isset($data['wish'])) {
        // In a real application, you would store the wish in a database.
        // For simplicity, we'll just append it to a file here.
        file_put_contents('wishes.txt', $data['wish'] . "\n", FILE_APPEND);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid data']);
    }
}
