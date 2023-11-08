<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // In a real application, you would query the database to get wishes.
    // For simplicity, we'll read wishes from a file here.
    $wishes = file('wishes.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo json_encode($wishes);
}
