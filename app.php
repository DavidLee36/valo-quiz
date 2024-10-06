<?php

define('APP_PATH', dirname(__FILE__) . '/');

// Include necessary files
require(APP_PATH . 'config/database-info.php');
require(APP_PATH . 'models/functions.php');
require(APP_PATH . 'models/question.class.php');
require(APP_PATH . 'models/question-category.class.php');
require(APP_PATH . 'models/question-model.class.php');

// Initialize the Model classes used in database communication
$questionModel = new QuestionModel(DBINFO['db']);
$categoryModel = new CategoryModel(DBINFO['db']);
