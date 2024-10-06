<?php

require('../../app.php');



if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = [
        'question' => $_POST['question'],
        'category' => $_POST['category'],
        'possibleAnswers' => $_POST['possible_answers'],
        'correctAnswer' => $_POST['correct_answer'],
    ];

    //Handle image upload
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
        // Define where to store the uploaded file
        $targetDir = APP_PATH . 'assets/images/questions/'; // Change this to your folder path
        $fileName = basename($_FILES['image_url']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow only specific file formats
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array(strtolower($fileType), $allowedTypes)) {
            // Move uploaded file to the target directory
            if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFilePath)) {
                // File successfully uploaded
                $question['imageURL'] = 'assets/images/questions/' . $fileName; // Relative path for saving to the database
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
        }
    } else {
        $question['imageURL'] = null; // No image provided
    }

    //Add the question to the database
    $questionModel->addQuestion($question);

    //Redirect back to the main admin page
    header('Location: /valo-quiz/admin/controllers/');
    exit;
}

$categories = $categoryModel->getAllCategories();
view('admin/views/add-question', $categories);