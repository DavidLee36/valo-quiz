<?php
    $questions = $model['questions'];
    $categories = $model['categories'];
?>

<div>
    <h1>Admin Page</h1>
    <h2>Questions:</h2>
    <button onclick="window.location.href='add-question.php'">Add Question</button>
    <table class="admin-view-table">
        <?php foreach($questions as $question) : ?>
            <tr>
                <td><a href="edit-question.php?key=<?= $question->id ?>">Edit</a></td>
                <td><?= $question->question ?></td>
                <td>
                    <?php
                        // Find the category name by matching category_id with $categories
                        foreach ($categories as $category) {
                            if ($category->id == $question->category_id) {
                                echo htmlspecialchars($category->name);
                                break;
                            }
                        }
                    ?>
                <td>
                    <?php foreach(json_decode($question->possible_answers) as $possible) : ?>
                        <p><?= $possible ?></p>
                    <?php endforeach; ?>
                </td>
                <td><?= $question->correct_answer ?></td>
                <td><?php
                    if(isset($question->image_url)) {
                        echo basename($question->image_url);
                    }else {
                        echo 'No image';
                    }
                ?></td>
                <td><a href="delete-question.php?key=<?= $question->id ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Categories:</h2>
    <button onclick="window.location.href='add-category.php'">Add Category</button>
    <table class="admin-view-table">
        <?php foreach($categories as $category) : ?>
            <tr>
                <td><a href="edit-category.php?key=<?= $category->id ?>">Edit</a></td>
                <td><?= $category->name ?></td>
                <td><?= $category->id?></td>
                <td><a href="delete-category.php?key=<?= $category->id ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>