<?php

session_start();

function view($name, $model = '') {
    $user = '';
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
    require(APP_PATH . "views/layout.view.php");
}

function redirect($url) {
    header("Location: $url");
    die();
}

function requireAdmin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if(!isset($_SESSION['user']['admin']) || !$_SESSION['user']['admin']) {
        redirect('\valo-quiz/controllers/index.php');
    }
}