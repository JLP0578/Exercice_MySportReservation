<?php
// Vérifier si la session est démarrée et si la clé CSRF est définie
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['csrf_token'])) {
    // Générer un nouveau token CSRF et l'enregistrer dans la session
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
require_once PROJECT_PATH.'/views/components/alert.php';
require_once PROJECT_PATH.'/views/components/logout.php';
?>

<div class="d-flex flex-row flex-wrap justify-content-center m-3">
<?php
    require_once PROJECT_PATH.'/views/components/login.php';
    // require_once PROJECT_PATH.'/views/components/sign.php';
    ?>    
</div>