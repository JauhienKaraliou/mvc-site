<form class="navbar-form navbar-right" method="post" action="<?=BASE_URL?>users/login">
    <div class="form-inline">
        <input type="text" class="form-inline" placeholder="Username" name="username" required>
        <input type="password" class="form-inline" placeholder="Password" name="password" required>
        <input type="checkbox" class="form-inline" name="stay_logged">
        <button type="submit" class="btn btn-default" name="login">Log In</button>
    </div>
</form>