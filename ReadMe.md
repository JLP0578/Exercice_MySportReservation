# Contexte: MySportReservation

## Site de réservation de salles de sport en ligne

***MySportReservation*** est un site permet aux utilisateurs de réserver des créneaux horaires dans des salles de sport partenaires.
Chaque salle de sport peut proposer différents types d'activités (yoga, musculation, fitness, etc.) avec des horaires différents.

## Les fonctionnalités

**Fonctionnalités principales** :

- Inscription et connexion des utilisateurs
- Réservation de créneaux horaires
- Gestion des réservations (annulation, modification, etc.) pour les utilisateurs connectés

<!-- **Fonctionnalités secondaires** : -->

## Les contraintes

Le site doit être sécurisé pour protéger les données personnelles et financières des utilisateurs.

il doit empêcher les attaques :

- par injection SQL.
- les attaques XSS.
- les attaques CSRF 
- les attaques de force brute.

### Les Outils pour tester de sécurité

- **OWASP ZAP** : C'est un outil de test de sécurité de site Web open-source, qui permet de trouver des vulnérabilités telles que les injections SQL, les attaques XSS, les attaques CSRF, etc.
- **Nikto** : C'est un scanner de vulnérabilités open-source pour les serveurs Web. Il peut trouver des failles telles que les injections SQL, les attaques de force brute, les attaques XSS, etc.
- **Nmap** : C'est un scanner de ports open-source qui peut être utilisé pour détecter les services en cours d'exécution sur une machine cible. Cela peut aider à trouver des vulnérabilités potentielles.
- **Metasploit** : C'est un outil de test de pénétration open-source qui peut être utilisé pour tester les vulnérabilités et les exploits.


## Organisation

- **index.php** : le point d'entrée du site
- **config.php** : le fichier de configuration qui contient les informations de connexion à la base de données, les constantes et les paramètres du site

- **assets/** : le dossier contenant les fichiers statiques tels que les images, les styles CSS et les scripts JavaScript
  - **images/**
  - **styles/** 
  - **script/**
- **includes/** : le dossier contenant les fichiers inclus par le code, tels que les classes, les fonctions, les fichiers de langue, etc.
  - **classes/**
  - **fonctions/**
  - **langage/**
- **models/** : le dossier contenant les classes et les fonctions qui gèrent les données de la base de données
  - **classes_BDD/**
  - **fonctions_BDD/**
- **views/** : le dossier contenant les fichiers HTML qui affichent les données au client
- **controllers/** : le dossier contenant les fichiers PHP qui traitent les demandes des utilisateurs et interagissent avec les modèles et les vues

