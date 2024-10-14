<?php

require('../../app.php');

requireAdmin();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = [
        'name' => $_POST['name']
    ];

    $categoryModel->addCategory($category);

    redirect('admin/controllers/index.php');
    exit;
}

view('admin/views/add-category');