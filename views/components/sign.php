<?php 
// TODO: PAS OP
require_once PROJECT_PATH.'/models/classes_BDD/Connexion.php';
require_once PROJECT_PATH.'/models/classes_BDD/Users.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Afficher une erreur CSRF si le token n'est pas présent dans le formulaire soumis
    if ((!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']))) {
        redirection("index.php?errorType=csrf&errorNum=1");
    }
    
    // Vérifier si le formulaire a été soumis
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password'])) {
        $nom = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $re_password = htmlspecialchars($_POST['re_password']);
    
        if($password != $re_password) {
            redirection("index.php?errorType=sign&errorNum=1");
        }
        // Récupérer les valeurs soumises
        $users = new Users(Connexion::getInstance('lecteur'));
        Connexion::close('lecteur');
    
        // Vérifier si l'adresse e-mail existe déjà dans la base de données
        if ($users->selectByEmail($email)) {
            // L'adresse e-mail existe déjà, afficher un message d'erreur
            redirection("index.php?errorType=sign&errorNum=2");
    
        } else {
            // L'adresse e-mail n'existe pas encore, ajouter le nouvel utilisateur à la base de données
            $users = new Users(Connexion::getInstance('utilisateur'));
            Connexion::close('utilisateur');
            $users->add($nom, $email, $password);

            $_SESSION['connected'] = true;
            $_SESSION['current_user'] = $user;
            redirection("index.php");
            
            
            // L'utilisateur est maintenant enregistré, rediriger vers la page de connexion
            redirection("index.php");
        }
    }
}
?>

<div class="d-flex flex-row flex-wrap justify-content-center m-3 card p-4">
    <form method="POST" class="d-flex flex-column flex-wrap justify-content-between">
        <h2 class="type_form" data-type_name="sign-in" >Sign-in</h2>
        <div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-vcard"></i></span>
                </div>
                <input required type="text" class="form-control" id="signin_username" name="username" placeholder="Username" />
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                </div>
                <input required type="text" class="form-control" id="signin_email" name="email" placeholder="you@exemple.com" />
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                </div>
                <input required type="password" class="form-control" id="signin_password" name="password" placeholder="Password" />
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                </div>
                <input required type="password" class="form-control" id="signin_re_password" name="re_password" placeholder="Confirm password" />
            </div>
        </div>
        <div class="input-group input-group-sm mb-2">
            <input required type="hidden" id="signin_csrf_token" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <button type="submit" id="signin_submit" class="form-control btn btn-primary">S'inscrire</button>
        </div>
    </form>
</div>