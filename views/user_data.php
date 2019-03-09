<div class="col-">
    <div class="alert alert-info text-center">
        <h3>User details: <?= $userData['user_login']?></h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Login:</b> <?= $userData['user_login']?></li>
            <li class="list-group-item"><b>First name:</b> <?= $userData['first_name']?></li>
            <li class="list-group-item"><b>Last name:</b> <?= $userData['last_name']?></li>
            <li class="list-group-item"><b>Gender:</b> <?= $userData['gender']?></li>
            <li class="list-group-item"><b>Birthday:</b> <?= $userData['birth']?></li>
            <li class="list-group-item"><b>Access group:</b> <?php echo ($userData['access'] === 1) ? "Admin" : "User" ?></li>
        </ul>
    </div>
</div>