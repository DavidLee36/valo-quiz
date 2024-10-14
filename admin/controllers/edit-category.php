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
        echo "Error retrieving category";
        die();
    }
    view('admin/views/edit-category', $category);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = [
        'id' => $_POST['id'],
        'name' => $_POST['name']
    ];

    $categoryModel->editCategory($category);

    redirect('admin/controllers/index.php');
    exit;
}