<?php

require('../app.php');

$msg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if($password != $confirmPassword) {
        view('views/signup', 'passwords do not match');
        exit();
    }

    $signup = $userModel->addUser($username, $password);
    if($signup) {
        echo "<script>
                alert('Account created successfully');
              </script>";
        redirect('controllers/index.php');
        exit();
    }else {
        $msg = 'Username already taken';
    }
}

view('views/signup', $msg);