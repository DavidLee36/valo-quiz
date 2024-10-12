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

        if($userModel->verifyAdmin($userID)) {
            $_SESSION['user']['admin'] = true;
        }

        echo "<script>
                alert('Sign in successful! You will automatically be taken back to the homepage.');
                window.location.href = '/valo-quiz/controllers/index.php';
              </script>";
        exit();
    }else {
        $msg = 'incorrect username or password';
    }
}

view('views/signin', $msg);