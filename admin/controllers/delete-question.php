<?php

require('../../app.php');

requireAdmin();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['key'];

    if(empty($id)) {
        //TODO: implement not_found page
        echo "ID: $id not found";
        die();
    }

    $question = $questionModel->getQuestion($id);
    if(!$question) {
        //TODO: implement not_found page
        echo "Error retrieving question";
        die();
    }
    view('admin/views/delete-question', $question);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $questionModel->deleteQuestion($id);
    
    header('Location: /valo-quiz/admin/controllers/');
    exit;
}