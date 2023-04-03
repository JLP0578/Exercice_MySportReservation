-- UTILISATEURS

-- Administrateur système (TOTAL)
-- # Privilèges pour `admin`@`localhost`
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'mot_de_passe';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;

-- Utilisateur régulier (TOTAL SUR BDD)
-- # Privilèges pour `utilisateur`@`localhost`
CREATE USER 'utilisateur'@'localhost' IDENTIFIED BY 'mot_de_passe';
GRANT SELECT, INSERT, UPDATE, DELETE ON `mysportreservation`.* TO 'utilisateur'@'localhost';

-- Utilisateur avec privilèges (SELECT)
-- # Privilèges pour `lecteur`@`localhost`
CREATE USER 'lecteur'@'localhost' IDENTIFIED BY 'mot_de_passe';
GRANT SELECT ON `mysportreservation`.* TO 'lecteur'@'localhost';

