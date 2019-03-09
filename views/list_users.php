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
                <th scope="col">Access</th>
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
                        <th scope="col"><?= $user['access'] ?></th>
                        <th scope="col"><?php echo ($user['access'] === 1) ? "Admin" : "User" ?></th>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>


    </div>
</div>