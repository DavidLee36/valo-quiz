
<!-- TODO: FIX THIS SHIT DOESN'T WORK -->

<div>
    <h1>Admin Page</h1>
    <button onclick="window.location.href='add-question.php'">Add Question</button>
    <table class="admin-view-table">
        <?php foreach($model as $question) : ?>
            <tr>
                <td><a href="edit-question.php?key=<?= $question->id ?>">Edit</a></td>
                <td><?= $question->question ?></td>
                <!-- TODO: implement category -->
                
                <td>
                    <?php foreach(json_decode($question->possible_answers) as $possible) : ?>
                        <p><?= $possible ?></p>
                    <?php endforeach; ?>
                </td>
                <td><?= $question->correct_answer ?></td>
                <td><?php
                    // TODO: display small preview of image
                    if(isset($question->image_url)) {
                        echo $question->image_url;
                    }else {
                        echo 'No image';
                    }
                ?></td>
                <td><a href="delete-question.php?key=<?= $question->id ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>