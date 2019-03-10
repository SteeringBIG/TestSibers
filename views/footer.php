

    <div class="col-">
        <div class="alert alert-success text-center">

                <form action="/panel" method="post">
                    <input type="hidden" name="action" value="footerBtn">
                    <?php if($_SESSION['access'] === 1) : ?>
                        <button name="submit" value="list" type="submit" class="btn btn-primary">List all users</button>
                        <button name="submit" value="add" type="submit" class="btn btn-primary">Add users</button>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['access'])) : ?>
                        <button name="submit" value="login" type="submit" class="btn btn-primary">Exit</button>
                    <?php else: ?>
                        <button name="submit" value="login" type="submit" class="btn btn-primary">Login</button>
                    <?php endif; ?>
                </form>

        </div>
    </div>

<!-- закрывается <div class="container">-->
</div>
</body>
</html>