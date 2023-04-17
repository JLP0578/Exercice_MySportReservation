<?php
require_once __DIR__.'/models/classes_BDD/Connexion.php';
require_once __DIR__.'/models/classes_BDD/Users.php';
require_once __DIR__.'/models/classes_BDD/Activities.php';
require_once __DIR__.'/models/classes_BDD/Classes.php';
require_once __DIR__.'/models/classes_BDD/Account_types.php';
require_once __DIR__.'/models/classes_BDD/Account_activities.php';
require_once __DIR__.'/models/classes_BDD/User_account_types.php';
require_once __DIR__.'/models/classes_BDD/Reservations.php';
require_once __DIR__.'/outils.php';
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
    <?php

    // // SELECT ALL ACTIVITIES
    // $connexion = Connexion::getInstance('lecteur');
    // $elements = new Activities($connexion);
    // Connexion::close('lecteur');
    // d($elements->selectAll());

    // // SELECT ALL CLASSES
    // $connexion = Connexion::getInstance('lecteur');
    // $elements = new Classes($connexion);
    // Connexion::close('lecteur');
    // d($elements->selectAll());

    // SELECT ALL CLASSES
    // $connexion = Connexion::getInstance('lecteur');
    // $elements = new Classes($connexion);
    // Connexion::close('lecteur');
    // d($elements->selectAll());

    // SELECT ALL ACCOUNT_TYPE
    // $connexion = Connexion::getInstance('lecteur');
    // $elements = new Account_types($connexion);
    // Connexion::close('lecteur');
    // d($elements->selectAll());

    // SELECT ALL ACCOUNT_ACTIVITIES
    // $connexion = Connexion::getInstance('lecteur');
    // $elements = new Account_activities($connexion);
    // Connexion::close('lecteur');
    // d($elements->selectAll());

    // SELECT ALL ACCOUNT_ACTIVITIES
    // $connexion = Connexion::getInstance('lecteur');
    // $elements = new Account_activities($connexion);
    // Connexion::close('lecteur');
    // d($elements->selectAll());

    // SELECT ALL RESERVATIONS
    $connexion = Connexion::getInstance('lecteur');
    $elements = new Reservations($connexion);
    Connexion::close('lecteur');
    d($elements->selectAll());
    



        // include './views/login.php';

        // include './views/sign.php';
    ?>
</body>
</html>
