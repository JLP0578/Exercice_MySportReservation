<?php
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'],$_POST['prenom'], $_POST['email'], $_POST['password'], $_POST['csrf_token'])) {

    // Vérifier si le token CSRF soumis correspond à celui enregistré dans la session
    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {

        // Récupérer les valeurs soumises
        $nom = $_POST['nom'];
        $nom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Vérifier si l'adresse e-mail existe déjà dans la base de données
        if ($membres->selectByEmail($email)) {
            // L'adresse e-mail existe déjà, afficher un message d'erreur
            $erreur = 'Un compte avec cette adresse e-mail existe déjà.';
            header('Location: login.php?errorType=sign&error=2');
            exit();

        } else {
            // L'adresse e-mail n'existe pas encore, ajouter le nouvel utilisateur à la base de données
            $membres->add($nom, $email, password_hash($password, PASSWORD_DEFAULT));
            
            // L'utilisateur est maintenant enregistré, rediriger vers la page de connexion
            header('Location: login.php');
            exit;
        }
    } else {
        // Le token CSRF soumis ne correspond pas à celui enregistré dans la session, afficher un message d'erreur
        $erreur = 'Erreur CSRF : Le formulaire a été altéré.';
        header('Location: login.php?errorType=sign&error=1');
        exit();
    }
}