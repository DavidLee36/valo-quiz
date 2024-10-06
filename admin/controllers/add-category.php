<?php

require('../../app.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = [
        'name' => $_POST['name']
    ];

    $categoryModel->addCategory($category);

    header('Location: /valo-quiz/admin/controllers/');
    exit;
}

view('admin/views/add-category');