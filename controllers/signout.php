<?php

require('../app.php');

session_start();
session_unset(); // Unset all of the session variables
session_destroy(); // Destroy the session

redirect('controllers/index.php');
exit();
?>
