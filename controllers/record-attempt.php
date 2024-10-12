<?php

require('../app.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_SESSION['user'])) {
        die();
    }
    $userID = $_SESSION['user']['id'];
    $questionID = $_POST['question_id'];
    $categoryID = $_POST['category_id'];
    $correct = $_POST['correct'];

    $userModel->addQuestionAttempt($userID, $questionID, $categoryID, $correct);

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
