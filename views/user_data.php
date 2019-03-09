<div class="col-">
    <div class="alert alert-info text-center">
        <h3>User details: <?= $userData['user_login']?></h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Login: <?= $userData['user_login']?></li>
            <li class="list-group-item">First name: <?= $userData['first_name']?></li>
            <li class="list-group-item">Last name: <?= $userData['last_name']?></li>
            <li class="list-group-item">Gender: <?= $userData['gender']?></li>
            <li class="list-group-item">Birthday: <?= $userData['birth']?></li>
        </ul>
        <?php if($_SESSION['access'] === 1) : ?>
            <br>
            <h5><a href="/list">List all users</a></h5>
        <?php endif; ?>
    </div>
</div>