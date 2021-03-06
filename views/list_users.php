<?php
$sort = $_SESSION['userListSortOrder'];
if (isset($sort)) {
    $sort = ($sort  === 'ASC') ? '&#x25b3;' : '&#x25bd;';
}

$total_rows = $_SESSION['total_rows'];
$num_pages = ceil($total_rows / $_SESSION['per_page']);

?>

<div class="col-">
    <div class="alert alert-info text-center">
        <h3>List all users</h3>
        <table class="table table-striped" style="background-color: white">
            <thead>
            <tr>
                <th scope="col">
                    <form name="id" method="POST" action="/panel">
                        <input type="hidden" name="action" value="userListSort">
                        <input type="hidden" name="sortColumn" value="id">
                        <a href="#" onclick="document.id.submit()">ID <?php echo ($_SESSION['userListSort'] === 'id') ? $sort : ' '?></a>
                    </form>
                </th>
                <th scope="col">
                    <form name="user_login" method="POST" action="/panel">
                        <input type="hidden" name="action" value="userListSort">
                        <input type="hidden" name="sortColumn" value="user_login">
                        <a href="#" onclick="document.user_login.submit()">Login <?php echo ($_SESSION['userListSort'] === 'user_login') ? $sort : ' '?></a>
                    </form>
                </th>
                <th scope="col">
                    <form name="first_name" method="POST" action="/panel">
                        <input type="hidden" name="action" value="userListSort">
                        <input type="hidden" name="sortColumn" value="first_name">
                        <a href="#" onclick="document.first_name.submit()">First <?php echo ($_SESSION['userListSort'] === 'first_name') ? $sort : ' '?></a>
                    </form>
                </th>
                <th scope="col">
                    <form name="last_name" method="POST" action="/panel">
                        <input type="hidden" name="action" value="userListSort">
                        <input type="hidden" name="sortColumn" value="last_name">
                        <a href="#" onclick="document.last_name.submit()">Last <?php echo ($_SESSION['userListSort'] === 'last_name') ? $sort : ' '?></a>
                    </form>
                </th>
                <th scope="col">
                    <form name="gender" method="POST" action="/panel">
                        <input type="hidden" name="action" value="userListSort">
                        <input type="hidden" name="sortColumn" value="gender">
                        <a href="#" onclick="document.gender.submit()">Gender <?php echo ($_SESSION['userListSort'] === 'gender') ? $sort : ' '?></a>
                    </form>
                </th>
                <th scope="col">
                    <form name="birth" method="POST" action="/panel">
                        <input type="hidden" name="action" value="userListSort">
                        <input type="hidden" name="sortColumn" value="birth">
                        <a href="#" onclick="document.birth.submit()">Birthday <?php echo ($_SESSION['userListSort'] === 'birth') ? $sort : ' '?></a>
                    </form>
                </th>
                <th scope="col">
                    <form name="access" method="POST" action="/panel">
                        <input type="hidden" name="action" value="userListSort">
                        <input type="hidden" name="sortColumn" value="access">
                        <a href="#" onclick="document.access.submit()">Access group <?php echo ($_SESSION['userListSort'] === 'access') ? $sort : ' '?></a>
                    </form>
                </th>
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

        <table class="table table-striped text-center" style="background-color: white">
            <thead>
                <tr>
                    <?php
                    echo '<b>Страницы по ' . $_SESSION['per_page'] . '</b>';
                    for($i = 1; $i <= $num_pages; $i++) {
                        echo '<th scope="col">';
                            $nameForm = 'page_' . $i;
                            $linkPage = ($i == $_SESSION['n_page']) ? '[' . $i . "] " : '<a href="#" onclick="document.' . $nameForm . '.submit()">[' . $i . ']</a>';
                            echo <<<HTML
                                <form name=$nameForm method="POST" action="/panel">
                                    <input type="hidden" name="action" value="userListPagesBtn">
                                    <input type="hidden" name="n_page" value=$i>
                                    $linkPage
                                </form>
HTML;
                        echo '</th>';
                    }
                    ?>
                </tr>
        </table>
    </div>
</div>