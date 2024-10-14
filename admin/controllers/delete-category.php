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

    $category = $categoryModel->getCategory($id);
    if(!$category) {
        //TODO: implement not_found page
        echo "Error retrieving question";
        die();
    }
    view('admin/views/delete-category', $category);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $categoryModel->deleteCategory($id);
    
    header('Location: /valo-quiz/admin/controllers/');
    exit;
}