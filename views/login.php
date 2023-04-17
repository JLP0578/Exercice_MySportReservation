<?php
// Vérifier si la session est démarrée et si la clé CSRF est définie
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['csrf_token'])) {
    // Générer un nouveau token CSRF et l'enregistrer dans la session
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if(isset($_GET["erreur"])){
    if($_GET["erreur"] == "CSRF"){
        ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Bien tenté!</h4>
            <p>Je suis désolé de vous apprendre que vous ne pouvez pas utilisé le CSRF d'un autre utilisateur.</p>
            <hr>
            <p class="mb-0">Essayez une autre technique.</p>
        </div>
        <?php
    } else if($_GET["erreur"] == "Auth"){
        ?>
        <div class="alert alert-danger" role="alert">
            Vous avez du faire une erreur, on ne vous a pas trouver. 😢
        </div>
        <?php
    }
}
?>

<div class="d-flex flex-row flex-wrap justify-content-center m-2">
    <form method="POST" action="process_login.php" class="d-flex flex-column flex-wrap justify-content-between">
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
            <input required type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>" />
            <button type="submit" class="form-control btn btn-primary">Se connecter</button>
        </div>
    </form>
</div>
