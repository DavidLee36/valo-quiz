<?php

require('../../app.php');

requireAdmin();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['key'];

    if(empty($id)) {
        //TODO: implement not_found page
        echo "ID: $id not found";
        die();
    }

    $question = $questionModel->getQuestion($id);
    $categories = $categoryModel->getAllCategories();
    if(!$question || !$categories) {
        //TODO: implement not_found page
        echo "Error retrieving question or categories";
        die();
    }
    $data = [
        'question' => $question,
        'categories' => $categories
    ];
    view('admin/views/edit-question', $data);
}



if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = [
        'id' => $_POST['id'],
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
        $question['imageURL'] = $_POST['existing_image_url']; // No image provided, revert to p
    }

    //Add the question to the database
    $questionModel->editQuestion($question);

    //Redirect back to the main admin page
    redirect('admin/controllers/index.php');
    exit;
}