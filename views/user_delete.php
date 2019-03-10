<div class="col-">
    <div class="alert alert-info text-center btn-block">
        <form action="/panel" method="post">
            <input type="hidden" name="action" value="userDelete">
            <input type="hidden" name="login" value="<?= $userData['user_login'] ?>">

            <label>Delete user <?= $userData['user_login'] ?> </label> <br>
            <button name="submit" value="delete" type="submit" class="btn btn-primary">Delete</button>
            <button name="submit" value="cancel" type="submit" class="btn btn-primary">Cancel</button>
        </form>
    </div>
</div>