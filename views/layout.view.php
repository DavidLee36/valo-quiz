<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valo Quiz</title>
    <link href="/assets/css/styles.css" rel="stylesheet" />
</head>
<body>
    <?php
        require(APP_PATH . "views/header.view.php");
    ?>
    <div class="main-content-wrapper">
        <?php require(APP_PATH . "$name.view.php"); ?>
    </div>
</body>
</html>