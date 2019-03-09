<div class="col-">
    <div class="alert alert-info text-center btn-block">
        <form action="/panel" method="post">
            <input type="hidden" name="action" value="auth">
            <div class="form-group">
                <label for="InputLogin">User login</label>
                <input type="text" class="form-control" id="InputLogin" name="login" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="InputPassword">Password</label>
                <input type="password" class="form-control" id="InputPassword" name="pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

