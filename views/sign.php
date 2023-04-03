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

<form action="process_signup.php" method="POST">
    <label for="nom">Nom :</label>
    <input required type="text" id="nom" name="nom" />

    <label for="prenom">Prénom :</label>
    <input required type="text" id="prenom" name="prenom" />
    
    <label for="email">Adresse e-mail :</label>
    <input required type="email" id="email" name="email" />

    <label for="password">Mot de passe :</label>
    <input required type="password" id="password" name="password" />
    
    <input required type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

    <button type="submit">S'inscrire</button>
</form>