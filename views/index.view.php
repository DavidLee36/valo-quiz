<div class="heading">
    <h1>Valorant Quiz</h1>
    <h1>Choose a Category:</h1>
</div>
<div class="categories-container btn-container">
    <?php foreach($model as $category) : ?>
        <button class="category-btn" onclick="window.location.href='question.php?category=<?= $category->id ?>&qidx=0'"><?= $category->name ?></button>
    <?php endforeach; ?>
</div>