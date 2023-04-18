<?php
echo d($_SERVER);
require_once __DIR__.'/../models/classes_BDD/Connexion.php';
require_once __DIR__.'/../models/classes/Users.php';

session_start();

// Afficher une erreur CSRF si le token n'est pas présent dans le formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']))) {
    $erreur = 'Erreur CSRF : Le formulaire a été altéré.';
    header('Location: login.php?errorType=login&error=1');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); 

    $users = new Users(Connexion::getInstance('lecteur'));
    Connexion::close('lecteur');

    if ($users->authentification($email, $password)) {
        $_SESSION['connected'] = true;
        $_SESSION['email'] = $email;
        header('Location: index.php');
        exit();
    } else {
        header('Location: login.php?errorType=login&error=2');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}