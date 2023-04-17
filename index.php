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
    <title>MySportReservation</title>
    <link rel="stylesheet" href="./assets/styles/reset.css">
    <link rel="stylesheet" href="./assets/styles/main_style_edit.css">
    <link rel="stylesheet" href="./assets/styles/main_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <?php
        include './views/login-signin.php';
        $AccountTypeId = 3;
        require_once __DIR__.'/views/lists/list_activities.php';

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
    // $connexion = Connexion::getInstance('lecteur');
    // $elements = new Reservations($connexion);
    // Connexion::close('lecteur');
    // d($elements->selectAll());
    




        // include './views/sign.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
