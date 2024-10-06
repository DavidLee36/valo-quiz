<?php

//Class used to represent a question
class Question {
    public $id;
    public $question;
    public $possible_answers;
    public $correct_answer;
    public $image_url;
    public $category_id;

    //NO CONSTRUCTOR METHOD AS PDO::FETCH_CLASS WILL HANDLE IT ALL AUTOMATICALLY
    //HAVING A CONSTRUCTOR CAUSED THE CODE TO FAIL
}
