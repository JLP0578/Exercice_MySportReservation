-- UTILISATEURS

-- Administrateur système (TOTAL)
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'mot_de_passe';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;

-- Utilisateur régulier (TOTAL SUR BDD)
REATE USER 'utilisateur'@'localhost' IDENTIFIED BY 'mot_de_passe';
GRANT SELECT, INSERT, UPDATE, DELETE ON MySportReservation.* TO 'utilisateur'@'localhost';

-- Utilisateur avec privilèges (SELECT)
CREATE USER 'lecteur'@'localhost' IDENTIFIED BY 'mot_de_passe';
GRANT SELECT ON MySportReservation.* TO 'lecteur'@'localhost';
