<input type="hidden" value="<?= $model->correct_answer ?>" id="correct-answer">
<h1><?= $model->question ?></h1>
<?php if(isset($model->image_url)) : ?>
    <?= $model->image_url ?>
    <img class="question-image" src="/valo-quiz/<?= $model->image_url ?>" alt="error loading image">
<?php endif; ?>
<div class="possible-answers-container">
    <?php foreach(json_decode($model->possible_answers) as $key => $possibleAnswer) : ?>
        <button class="answer-btn answer-unselected" name="<?= $key ?>">
            <?= $possibleAnswer ?>
        </button>
    <?php endforeach; ?>
</div>

<?php //Increment the question index to get the next question when clicking 'next' button
    $currentQidx = intval($_GET['qidx']);
    $nextQidx = $currentQidx + 1;
?>

<button class="next-question-btn"
onclick="window.location.href='question.php?category=<?= $model->category_id ?>&qidx=<?= $nextQidx ?>'"
style="display: none;">
    Next ->
</button>

<script src="../models/javascript/question-script.js"></script>