<?php

require('../app.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$msg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userID = $userModel->verifyUser($username, $password);
    if($userID !== -1) {

        $_SESSION['user'] = [
            'id' => $userID,
            'username' => $userModel->getUsername($userID)
        ];

        echo $userModel->verifyAdmin($userID);
        if($userModel->verifyAdmin($userID)) {
            $_SESSION['user']['admin'] = true;
        }

        redirect('controllers/index.php');
        exit();
    }else {
        $msg = 'incorrect username or password';
    }
}

view('views/signin', $msg);