<div class="d-flex flex-row flex-wrap justify-content-center m-3 card p-4">
    <form method="POST" action="process_login.php" class="d-flex flex-column flex-wrap justify-content-between">
        <h2 class="type_form" data-type_name="login">Login</h2>
        <div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                </div>
                <input required type="text" class="form-control" id="login_email" name="email" placeholder="you@exemple.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                </div>
                <input required type="password" class="form-control" id="login_password" name="password" placeholder="Password">
            </div>
        </div>
        <div class="input-group input-group-sm mb-2">
            <input required type="hidden" id="login_csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>" />
            <button type="submit" class="form-control btn btn-primary">Se connecter</button>
        </div>
    </form>
</div>