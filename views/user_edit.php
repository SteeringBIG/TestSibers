<div class="col-">
    <div class="alert alert-info text-left">
        <h3 class="text-center">Edit user data</h3>
            <form method="POST" action="/panel">
                <input type="hidden" name="action" value="setUserInfo">
                <input type="hidden" name="login" value="<?= $userData['user_login'] ?>">

                <div class="form-group">
                    <label for="id"><b>User ID: </b><?= $userData['id'] ?></label>
                    <input type="hidden" class="form-control" name="id" value="<?= $userData['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="user_login"><b>Login: </b><?= $userData['user_login'] ?></label>
                    <input type="hidden" class="form-control" name="user_login" value="<?= $userData['user_login'] ?>">
                </div>
                <div class="form-group">
                    <label for="first_name"><b>First name:</b></label>
                    <input type="text" class="form-control" name="first_name" value="<?= $userData['first_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="last_name"><b>Last name:</b></label>
                    <input type="text" class="form-control" name="last_name" value="<?= $userData['last_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="gender"><b>Gender:</b></label>
<!--                    <input type="text" class="form-control" name="gender" value="--><?//= $userData['gender'] ?><!--">-->
                    <div >
                        <div class="form-check form-check-inline">
                            <label class="btn btn-secondary active">
                                <input class="form-check-input" type="radio" name="gender" id="gender1" value="1" <?php echo $userData['gender'] == "male" ? 'checked' : ''; ?> > Male
                            </label>
                            <div class="form-check form-check-inline">
                            </div>
                            <label class="btn btn-secondary">
                                <input class="form-check-input" type="radio" name="gender" id="gender2" value="0" <?php echo $userData['gender'] == "female" ? 'checked' : ''; ?> > Female
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="birth"><b>Birthday:</b></label>
                    <input type="date" class="form-control" name="gender" value="<?= $userData['birth'] ?>">
                </div>
                <div class="form-group">
                    <label for="access"><b>Access:</b></label>
<!--                    <input type="text" class="form-control" name="access" value="--><?//= $userData['access'] ?><!--">-->
                    <div >
                        <div class="form-check form-check-inline">
                            <label class="btn btn-secondary active">
                                <input class="form-check-input" type="radio" name="access" id="access1" value="1" <?php echo $userData['access'] == "1" ? 'checked' : ''; ?> > Admin
                            </label>
                            <div class="form-check form-check-inline">
                            </div>
                            <label class="btn btn-secondary">
                                <input class="form-check-input" type="radio" name="access" id="access2" value="0" <?php echo $userData['access'] == "0" ? 'checked' : ''; ?> > User
                            </label>
                        </div>
                    </div>



                </div>

                <button name="submit" value="save" type="submit" class="btn btn-primary">Save</button>
                <button name="submit" value="cancel" type="submit" class="btn btn-primary">Cancel</button>
            </form>
    </div>
</div>