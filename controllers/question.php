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
        //Check if the user has already answered this question
        $correct = 0;
        if(isset($_SESSION['user'])) {
            if($userModel->questionAnsweredCorrectly($_SESSION['user']['id'], $questions[$questionIndex]->id)) {
                $correct = 1;
            }
        }
        $model = [
            'question' => $questions[$questionIndex],
            'correct' => $correct
        ];

        view('views/question', $model);
    }else {
        redirect("controllers/category-complete.php?category=$categoryID");
    }
}