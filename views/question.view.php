<?php
    $question = $model['question'];
    $correct = $model['correct'];
?>

<input type="hidden" value="<?= $correct ?>" id="correct">
<input type="hidden" value="<?= $question->id ?>" id="question-id">
<input type="hidden" value="<?= $question->category_id ?>" id="category-id">
<input type="hidden" value="<?= $question->correct_answer ?>" id="correct-answer">
<h1><?= $question->question ?></h1>
<?php if(isset($question->image_url)) : ?>
    <img class="question-image" src="https://valo-quiz.com/<?= $question->image_url ?>" alt="error loading image">
<?php endif; ?>
<div class="possible-answers-container btn-container <?php if(isset($question->image_url)) { echo 'image-answers-btn-container'; } ?>">
    <?php foreach(json_decode($question->possible_answers) as $key => $possibleAnswer) : ?>
        <button class="answer-btn answer-unselected" name="<?= $key ?>">
            <?= $possibleAnswer ?>
        </button>
    <?php endforeach; ?>
</div>

<?php //Increment the question index to get the next question when clicking 'next' button
    $currentQidx = intval($_GET['qidx']);
    $nextQidx = $currentQidx + 1;
?>

<button class="next-question-btn answer-correct"
onclick="window.location.href='https://valo-quiz.com/controllers/question.php?category=<?= $question->category_id ?>&qidx=<?= $nextQidx ?>'"
style="display: none;">
    Next ->
</button>

<script src="../models/javascript/question-script.js"></script>