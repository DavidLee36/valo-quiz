<h1>SIGN IN</h1>

<form action="signin.php" method="POST">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </div>
    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    <button type="submit" id="signin-btn" class="login-btn">Sign In</button>
    <h3 class="err-msg"><?= $model ?></h3>
</form>