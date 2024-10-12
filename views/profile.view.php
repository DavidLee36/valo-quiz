<?php
$categories = $model['categories'];
$totalQuestions = $model['numQuestionsInCategory'];
$correctGuesses = $model['correctGuesses'];
$incorrectGuesses = $model['incorrectGuesses'];
?>

<div class="progress-header">
    <h1>Welcome back <?= $_SESSION['user']['username'] ?></h1>
    <h1>Your progress:</h1>
</div>
<div class="categories-progress-list">
    <?php for ($i = 0; $i < sizeof($categories); $i++): ?>
        <div class="category-progress-container">
            <div class="progress-container-header">
                <h2><?= $categories[$i]->name ?></h2>
                <?php if ($correctGuesses[$i] == $totalQuestions[$i]): ?>
                    <h3 class="progress-completed">Category Completed!</h3>
                <?php endif; ?>
            </div>

            <div class="progress-stats">
                <h3>Completed <?= $correctGuesses[$i] ?>/<?= $totalQuestions[$i] ?></h3>
                <h3 class="progress-incorrect">Incorrect Guesses: <?= $incorrectGuesses[$i] ?></h3>
            </div>
        </div>
    <?php endfor; ?>
</div>


<button class="logout-btn">Logout</button>