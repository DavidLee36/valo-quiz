<h1>SIGN UP</h1>

<form action="signup.php" method="POST">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" name="confirm-password" id="confirm-password">
    </div>
    <button type="submit" id="signup-btn" class="login-btn">Sign Up</button>
    <h3 class="err-msg"><?= $model ?></h3>
</form>