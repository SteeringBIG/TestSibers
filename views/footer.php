

    <div class="col-">
        <div class="alert alert-success text-center">
            <?php if($_SESSION['access'] === 1) : ?>
                <form action="/panel" method="post">
                    <input type="hidden" name="action" value="list">
                    <button type="submit" class="btn btn-primary">List all users</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

<!-- закрывается <div class="container">-->
</div>
</body>
</html>