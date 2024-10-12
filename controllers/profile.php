<?php

require('../app.php');

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $userID = intval($_GET['uid']);

    //Ensure the userID passed in the url matches the id of the user signed in
    if($userID !== $_SESSION['user']['id']) {
        redirect('index.php');
        die();
    }

    //Gather all categories, total number of questions in each category, number of correct answers in each category, numb of incorrect answers in each category

    $categories = $categoryModel->getAllCategories();
    $questionsInCategories = [];
    for($i = 0; $i<sizeof($categories); $i++) {
        $questionsInCategories[$i] = $categoryModel->getNumQuestionsInCategory($categories[$i]->id);
    }
    
    view('views/profile');
}