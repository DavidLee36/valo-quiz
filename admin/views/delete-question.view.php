<div class="delete-container">
    <h1>Are you sure you want to delete <?= $model->question?>?</h1>
    <form action="" method="POST">
        <input type="hidden" value="<?= $model->id ?>" name="id">
        <div class="delete-question-btn-group">
            <button type="submit">Delete</button>
            <button type="button" onclick="window.location.href='index.php'">Cancel</button>
        </div>
    </form>
</div>