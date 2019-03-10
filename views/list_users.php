<div class="col-">
    <div class="alert alert-info text-center">
        <h3>List all users</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Login</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Gender</th>
                <th scope="col">Birthday</th>
                <th scope="col">Access group</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($allUsers as $user) : ?>
                    <tr>
                        <th scope="col"><?= $user['id'] ?></th>
                        <th scope="col"><?= $user['user_login'] ?></th>
                        <th scope="col"><?= $user['first_name'] ?></th>
                        <th scope="col"><?= $user['last_name'] ?></th>
                        <th scope="col"><?= $user['gender'] ?></th>
                        <th scope="col"><?= $user['birth'] ?></th>
                        <th scope="col"><?php echo ($user['access'] === 1) ? "Admin" : "User" ?></th>
                        <th scope="col">
                            <form action="/panel" method="post">
                                <input type="hidden" name="action" value="userListBtn">
                                <input type="hidden" name="login" value="<?= $user['user_login'] ?>">
                                <button name="submit" value="info" type="submit" class="btn btn-info">Info</button>
                                <button name="submit" value="edit" type="submit" class="btn btn-success">Edit</button>
                                <button name="submit" value="delete" type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>