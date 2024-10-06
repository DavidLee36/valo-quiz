<?php
    $question = $model['question'];
    $categories = $model['categories'];
?>

<form action="edit-question.php" method="POST" enctype="multipart/form-data">
    
    <!-- Hidden input for question ID -->
    <input type="hidden" name="id" value="<?= $question->id ?>">

    <div class="form-group">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" value="<?= htmlspecialchars($question->question) ?>">
    </div>
    
    <div class="form-group">
        <label for="category">Category:</label>
        <select name="category" id="category">
            <?php foreach($categories as $category) : ?>
                <option value="<?= $category->id ?>" <?= $question->category_id == $category->id ? 'selected' : '' ?>>
                    <?= $category->name ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Possible Answers:</label>
        <div id="possible-answers-list">
            <?php foreach (json_decode($question->possible_answers) as $possible) : ?>
                <div>
                    <input type="text" name="possible_answers[]" class="possible-answer" value="<?= htmlspecialchars($possible) ?>">
                    <button type="button" class="remove-possible-answer-btn">-</button>
                </div>
            <?php endforeach; ?>
            <div>
                <button type="button" id="add-possible-answer-btn">+</button>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="correct-answer">Correct Answer (index):</label>
        <input type="number" name="correct_answer" id="correct-answer" value="<?= intval($question->correct_answer) ?>">
    </div>

    <div class="form-group">
        <label for="question-image">Image (optional):</label>
        
        <!-- Display current image if available -->
        <?php if (!empty($question->image_url)): ?>
            <div>
                <p>Current Image:</p>
                <img src="<?= htmlspecialchars('/valo-quiz/' . $question->image_url) ?>" alt="Question Image" style="max-width: 200px;">
                <p><?=  $question->image_url ?></p>
            </div>
            <!-- Hidden input to pass the existing image URL if no new image is uploaded -->
            <input type="hidden" name="existing_image_url" value="<?= htmlspecialchars($question->image_url) ?>">
        <?php endif; ?>
        
        <!-- Option to upload a new image -->
        <input type="file" name="image_url" id="question-image">
    </div>

    <button type="submit" id="edit-question-submit">Edit Question</button>
</form>

<script src="../models/admin-scripts.js"></script>
