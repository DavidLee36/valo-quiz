<form action="add-question.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question">
    </div>
    
    <div class="form-group">
        <label for="category">Category:</label>
        <select name="category" id="category">
            <!-- TODO: AUTOMATICALLY POPULATE CATEGORIES LIST -->
             <?php foreach($model as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Possible Answers:</label>
        <div id="possible-answers-list">
            <div>
                <input type="text" name="possible_answers[]" class="possible-answer">
                <button type="button" id="add-possible-answer-btn">+</button>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="correct-answer">Correct Answer (index):</label>
        <input type="number" name="correct_answer" id="correct-answer">
    </div>

    <div class="form-group">
        <label for="question-image">Image (optional):</label>
        <input type="file" name="image_url" id="question-image">
    </div>

    <button type="submit" id="add-question-submit">Add Question</button>
</form>

<script src="../models/admin-scripts.js"></script>