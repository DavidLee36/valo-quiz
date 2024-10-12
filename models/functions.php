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