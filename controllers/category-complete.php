<?php

require('../app.php');

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $categoryID = $_GET['category'];
    $category = $categoryModel->getCategory($categoryID);
    view('views/category-complete', $category);
}