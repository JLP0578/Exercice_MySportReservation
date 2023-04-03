<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__.'/models/classes_BDD/Connexion.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?

    // $connexion_admin = Connexion::getInstance('admin');
    // Connexion::close('admin');

    // $connexion_utilisateur = Connexion::getInstance('utilisateur');
    // Connexion::close('utilisateur');

    // $connexion_lecteur = Connexion::getInstance('lecteur');
    // Connexion::close('lecteur');
        include './views/login.php';

        include './views/sign.php';
    ?>
</body>
</html>
