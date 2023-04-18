<div class="d-flex flex-row flex-wrap justify-content-center m-3 card p-4">
    <form method="POST" action="process_signup.php" class="d-flex flex-column flex-wrap justify-content-between">
        <h2 class="type_form" data-type_name="sign-in" >Sign-in</h2>
        <div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-vcard"></i></span>
                </div>
                <input required type="text" class="form-control" id="signin_username" name="username" placeholder="Username" pattern="^[a-zA-Z0-9]$">
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                </div>
                <input required type="text" class="form-control" id="signin_email" name="email" placeholder="you@exemple.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                </div>
                <input required type="password" class="form-control" id="signin_password" name="password" placeholder="Password" pattern=".{8,}" title="8 or more characters">
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                </div>
                <input required type="password" class="form-control" id="signin_re_password" name="re_password" placeholder="Confirm password" pattern=".{8,}" title="8 or more characters">
            </div>
        </div>
        <div class="input-group input-group-sm mb-2">
            <input required type="hidden" id="signin_csrf_token" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <button type="submit" class="form-control btn btn-primary">S'inscrire</button>
        </div>
    </form>
</div>