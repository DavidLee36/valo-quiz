<?php

require('../../app.php');

requireAdmin();

$questions = $questionModel->getAllQuestions();
$categories = $categoryModel->getAllCategories();

$objects = [
    "questions" => $questions,
    "categories" => $categories
];

view('admin/views/index', $objects);