<?php

require('../app.php');

// Only allow requests from your specific domain
$allowed_origin = "https://valo-quiz.com";
header("Access-Control-Allow-Origin: https://valo-quiz.com");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] === $allowed_origin) {
    header("Access-Control-Allow-Origin: $allowed_origin");
} else {
    header("HTTP/1.1 403 Forbidden");
    echo json_encode(['status' => 'error', 'message' => 'You are not allowed to access this resource.']);
    exit;
}



if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user'])) {
        header("HTTP/1.1 403 Forbidden");
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized access.']);
        exit;
    }

    $userID = $_SESSION['user']['id'];
    $questionID = $_POST['question_id'];
    $categoryID = $_POST['category_id'];
    $correct = $_POST['correct'];

    // Assuming $userModel is already defined and accessible
    $userModel->addQuestionAttempt($userID, $questionID, $categoryID, $correct);

    header("Content-Type: application/json");
    echo json_encode(['status' => 'success']);
} else {
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
