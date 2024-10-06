<?php

require('../../app.php');

$questions = $questionModel->getAllQuestions();

view('admin/views/index', $questions);