<?php

require('../app.php');

$categories = $categoryModel->getAllCategories();

view('views/index', $categories);