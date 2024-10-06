<form action="edit-category.php" method="POST">
    <input type="hidden" value="<?= $model->id ?>" name="id" id="id">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $model->name ?>">
    </div>
    <button type="submit">Edit Category</button>
</form>