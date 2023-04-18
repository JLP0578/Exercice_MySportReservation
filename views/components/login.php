<?php 
require_once PROJECT_PATH.'\models\classes_BDD\Connexion.php';
require_once PROJECT_PATH.'\models\classes_BDD\Users.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Afficher une erreur CSRF si le token n'est pas présent dans le formulaire soumis
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        redirection("index.php?errorType=csrf&errorNum=1");
    }
    
    if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
        $email = htmlspecialchars($_POST['login_email']);
        $password = htmlspecialchars($_POST['login_password']); 
        // $hash = password_hash($password, PASSWORD_DEFAULT);
    
        $users = new Users(Connexion::getInstance('lecteur'));
        Connexion::close('lecteur');
    
        if ($user = $users->authentification($email, $password)) {
            $_SESSION['connected'] = true;
            $_SESSION['current_user'] = $user;
            redirection("index.php?validType=login");
        } else {
            redirection("index.php?errorType=login&errorNum=1");
        }
    } else {
        redirection("index.php?errorType=login&errorNum=2");
    }
}

if(isset($_SESSION['connected']) && $_SESSION['connected'] != true) {
?>
<div class="d-flex flex-row flex-wrap justify-content-center m-3 card p-4">
    <form method="POST" class="d-flex flex-column flex-wrap justify-content-between">
        <h2 class="type_form" data-type_name="login">Login</h2>
        <div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                </div>
                <input required type="text" class="form-control" id="login_email" name="login_email" placeholder="you@exemple.com" value="admin@example.com"/>
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                </div>
                <input required type="password" class="form-control" id="login_password" name="login_password" placeholder="Password" value="Password4dmin*"/>
            </div>
        </div>
        <div class="input-group input-group-sm mb-2">
            <input required type="hidden" id="login_csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>" />
            <button type="submit" id="login_submit" class="form-control btn btn-primary">Se connecter</button>
        </div>
    </form>
</div>
<?php
}
?>