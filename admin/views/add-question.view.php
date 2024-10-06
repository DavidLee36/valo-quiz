<form action="add-question.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question">
    </div>
    
    <div class="form-group">
        <label for="category">Category:</label>
        <select name="category" id="category">
            <!-- TODO: AUTOMATICALLY POPULATE CATEGORIES LIST -->
            <option value="1">Map Based</option>
            <option value="2">Character Abilities</option>
            <option value="3">Weapons</option>
            <option value="4">Lore</option>
            <option value="5">General Knowledge</option>
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