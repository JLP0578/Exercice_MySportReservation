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





