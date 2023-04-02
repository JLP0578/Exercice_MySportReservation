-- BDD
CREATE DATABASE IF NOT EXISTS `MySportReservation`;
USE `MySportReservation`;

-- TABLES
CREATE TABLE IF NOT EXISTS `types_activites` (
  `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `nom` VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `horaires` (
  `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `heure_debut` TIME,
  `heure_fin` TIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `activites` (
  `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `id_type_activite` INT,
  FOREIGN KEY (`id_type_activite`) REFERENCES types_activites(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `membres` (
  `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `nom` VARCHAR(50),
  `prenom` VARCHAR(50),
  `email` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `abonnements` (
  `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `id_membre` INT,
  `date_debut` DATE,
  `date_fin` DATE,
  FOREIGN KEY (`id_membre`) REFERENCES membres(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `abonnements_activites` (
  `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `id_abonnement` INT,
  `id_activite` INT,
  FOREIGN KEY (`id_abonnement`) REFERENCES abonnements(id),
  FOREIGN KEY (`id_activite`) REFERENCES activites(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `creneaux` (
  `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `id_horaire` INT,
  `id_activite` INT,
  `date` DATE,
  `nb_places_dispo` INT,
  FOREIGN KEY (`id_horaire`) REFERENCES horaires(id),
  FOREIGN KEY (`id_activite`) REFERENCES activites(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- DATAS

INSERT INTO types_activites (id, nom)
VALUES (1, 'Yoga'),
       (2, 'Musculation'),
       (3, 'Fitness');

INSERT INTO horaires (id, heure_debut, heure_fin)
VALUES (1, '08:00:00', '09:00:00'),
       (2, '09:00:00', '10:00:00'),
       (3, '10:00:00', '11:00:00'),
       (4, '11:00:00', '12:00:00'),
       (5, '12:00:00', '13:00:00');

INSERT INTO activites (id, id_type_activite)
VALUES (1, 1),
       (2, 2),
       (3, 1),
       (4, 3),
       (5, 2);

INSERT INTO membres (id, nom, prenom, email)
VALUES (1, 'Dupont', 'Jean', 'jean.dupont@mail.com'),
       (2, 'Martin', 'Lucie', 'lucie.martin@mail.com'),
       (3, 'Durand', 'Pierre', 'pierre.durand@mail.com');

INSERT INTO abonnements (id, id_membre, date_debut, date_fin)
VALUES (1, 1, '2023-04-01', '2024-03-31'),
       (2, 2, '2023-04-01', '2023-09-30'),
       (3, 3, '2023-04-01', '2023-06-30');

INSERT INTO abonnements_activites (id, id_abonnement, id_activite)
VALUES (1, 1, 1),
       (2, 1, 2),
       (3, 2, 1),
       (4, 2, 3),
       (5, 3, 2);

INSERT INTO creneaux (id, id_horaire, id_activite, date, nb_places_dispo)
VALUES (1, 1, 1, '2023-04-03', 10),
       (2, 2, 2, '2023-04-03', 5),
       (3, 3, 1, '2023-04-04', 8),
       (4, 4, 3, '2023-04-05', 3),
       (5, 5, 2, '2023-04-06', 15);