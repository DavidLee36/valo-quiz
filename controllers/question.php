<?php

require('../app.php');

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $categoryID = $_GET['category'];
    $questionIndex = $_GET['qidx'];

    $questions = $questionModel->getAllQuestionsInCategory($categoryID);

    if(!$questions) {
        echo 'error retrieving questions';
    }

    //We use $questions[questionIndex] rather than the id of a question because
    //question id's are not in an easily iterable form
    if(isset($questions[$questionIndex])) {
        view('views/question', $questions[$questionIndex]);
    }else {
        redirect("category-complete.php?category=$categoryID");
    }
}