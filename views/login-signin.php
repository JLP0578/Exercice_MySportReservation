<?php
// Vérifier si la session est démarrée et si la clé CSRF est définie
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['csrf_token'])) {
    // Générer un nouveau token CSRF et l'enregistrer dans la session
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

?>

<div class="d-flex flex-row flex-wrap justify-content-center m-3">
    <div class="d-flex flex-row flex-wrap justify-content-center m-3">
        <form method="POST" action="process_login.php" class="d-flex flex-column flex-wrap justify-content-between">
            <h2>Login</h2>
            <div>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">@</span>
                    </div>
                    <input required type="text" class="form-control" id="email" name="email" placeholder="you@exemple.com">
                </div>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                    </div>
                    <input required type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="input-group input-group-sm mb-2">
                <input required type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>" />
                <button type="submit" class="form-control btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
    <div class="d-flex flex-row flex-wrap justify-content-center m-3">
        <form method="POST" action="process_signup.php" class="d-flex flex-column flex-wrap justify-content-between">
            <h2>Sign-in</h2>
            <div>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-vcard"></i></span>
                    </div>
                    <input required type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">@</span>
                    </div>
                    <input required type="text" class="form-control" id="email" name="email" placeholder="you@exemple.com">
                </div>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                    </div>
                    <input required type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                    </div>
                    <input required type="password" class="form-control" id="re_password" name="re_password" placeholder="Confirm password">
                </div>
            </div>
            <div class="input-group input-group-sm mb-2">
                <input required type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <button type="submit" class="form-control btn btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>
</div>