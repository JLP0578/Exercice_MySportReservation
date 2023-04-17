<?php
require_once __DIR__.'/../models/classes_BDD/Connexion.php';
require_once __DIR__.'/../models/classes/Users.php';

// Afficher une erreur CSRF si le token n'est pas présent dans le formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']))) {
    $erreur = 'Erreur CSRF : Le formulaire a été altéré.';
    header('Location: login.php?errorType=login&error=1');
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['re_password'])) {
    $nom = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $re_password = htmlspecialchars($_POST['re_password']);
    $re_password = htmlspecialchars($_POST['re_password']);
    $csrf_token = htmlspecialchars($_POST['csrf_token']);

    if($password != $re_password) {
        $erreur = 'Erreur password : Le formulaire a été altéré.';
        header('Location: login.php?errorType=sign&error=');
        exit();
    }
    // Récupérer les valeurs soumises
    $users = new Users(Connexion::getInstance('lecteur'));
    Connexion::close('lecteur');

    // Vérifier si l'adresse e-mail existe déjà dans la base de données
    if ($users->selectByEmail($email)) {
        // L'adresse e-mail existe déjà, afficher un message d'erreur
        $erreur = 'Un compte avec cette adresse e-mail existe déjà.';
        header('Location: login.php?errorType=sign&error=2');
        exit();

    } else {
        // L'adresse e-mail n'existe pas encore, ajouter le nouvel utilisateur à la base de données
        $users = new Users(Connexion::getInstance('utilisateur'));
        Connexion::close('utilisateur');
        $users->add($nom, $email, $password);
        
        // L'utilisateur est maintenant enregistré, rediriger vers la page de connexion
        header('Location: login.php');
        exit;
    }
}