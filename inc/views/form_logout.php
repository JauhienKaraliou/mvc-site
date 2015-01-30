<form class="navbar-form navbar-right" method="post" action="<?=BASE_URL?>users/logout">
    <div class="form-inline">
        <label>You are  logged as <?= $_SESSION['username']?></label>
        <button type="submit" class="btn btn-default" name="logout">Log Out</button>
    </div>
</form>