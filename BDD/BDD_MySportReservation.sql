-- BDD
CREATE DATABASE IF NOT EXISTS `MySportReservation`;
USE `MySportReservation`;

-- UTILISATEURS
-- Administrateur système (TOTAL)
CREATE USER 'MSR_admin'@'localhost' IDENTIFIED BY 'mot_de_passe';
GRANT ALL PRIVILEGES ON *.* TO 'MSR_admin'@'localhost' WITH GRANT OPTION;

-- Utilisateur régulier sur la bdd MySportReservation (TOTAL SUR BDD)
CREATE USER 'MSR_utilisateur'@'localhost' IDENTIFIED BY 'mot_de_passe';
GRANT SELECT, INSERT, UPDATE, DELETE ON `mysportreservation`.* TO 'MSR_utilisateur'@'localhost';

-- Utilisateur avec privilèges sur la bdd MySportReservation (SELECT)
CREATE USER 'MSR_lecteur'@'localhost' IDENTIFIED BY 'mot_de_passe';
GRANT SELECT ON `mysportreservation`.* TO 'MSR_lecteur'@'localhost';

-- TABLES
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `account_types` (
    `type_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `type_name` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `user_account_types` (
    `user_id` INT NOT NULL,
    `type_id` INT NOT NULL,
    PRIMARY KEY (`user_id`, `type_id`),
    FOREIGN KEY (`user_id`) REFERENCES users(`user_id`),
    FOREIGN KEY (`type_id`) REFERENCES account_types(`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `activities` (
    `activity_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `activity_name` VARCHAR(50) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `duration` TIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `account_activities` (
    `type_id` INT NOT NULL,
    `activity_id` INT NOT NULL,
    PRIMARY KEY (`type_id`, `activity_id`),
    FOREIGN KEY (`type_id`) REFERENCES account_types(`type_id`),
    FOREIGN KEY (`activity_id`) REFERENCES activities(`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `classes` (
    `class_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `activity_id` INT NOT NULL,
    `start_time` TIME NOT NULL,
    `end_time` TIME NOT NULL,
    `available_spots` INT(11) NOT NULL,
    FOREIGN KEY (`activity_id`) REFERENCES activities(`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `class_id` INT NOT NULL,
  `activity_id` INT NOT NULL,
  `reservation_date` DATETIME NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES users(`user_id`),
  FOREIGN KEY (`class_id`) REFERENCES classes(`class_id`),
  FOREIGN KEY (`activity_id`) REFERENCES activities(`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- DATA
INSERT INTO users (username, email, password) 
VALUES
    ('JohnDoe', 'john.doe@example.com', 'password123'),
    ('JaneDoe', 'jane.doe@example.com', 'password456'),
    ('BobSmith', 'bob.smith@example.com', 'password789'),
    ('admin', 'admin@example.com', 'passwordadmin');

INSERT INTO account_types (type_name) 
VALUES
    ('Basic'),
    ('Medium'),
    ('Prime'),
    ('Admin');

INSERT INTO user_account_types (user_id, type_id) 
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4);

INSERT INTO activities (activity_name, description, duration) 
VALUES
    ('Musculation', 'Renforcement musculaire général', '01:00:00'),
    ('Cardio-training', 'Entraînement cardiovasculaire', '00:45:00'),
    ('Gym', 'Séance de gymnastique', '00:45:00'),
    ('Yoga', 'Séance de yoga', '01:00:00'),
    ('Pilates', 'Séance de Pilates', '00:45:00'),
    ('CrossFit', 'Entraînement intense en groupe', '01:30:00'),
    ('HIIT', 'Entraînement par intervalles à haute intensité', '00:30:00');

INSERT INTO account_activities (type_id, activity_id) 
VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (2, 1),
    (2, 2),
    (2, 3),
    (2, 4),
    (2, 5),
    (3, 1),
    (3, 2),
    (3, 3),
    (3, 4),
    (3, 5),
    (3, 6),
    (3, 7);

-- Ajout de classes pour l'activité de musculation
INSERT INTO classes (activity_id, start_time, end_time, available_spots)
VALUES
  (1, '08:00:00', '09:00:00', 10),
  (1, '12:00:00', '13:00:00', 10),
  (1, '17:00:00', '18:00:00', 10),
  (1, '19:00:00', '20:00:00', 10);

-- Ajout de classes pour l'activité de cardio-training
INSERT INTO classes (activity_id, start_time, end_time, available_spots)
VALUES
  (2, '09:00:00', '10:00:00', 10),
  (2, '13:00:00', '14:00:00', 10),
  (2, '18:00:00', '19:00:00', 10),
  (2, '20:00:00', '21:00:00', 10);

-- Ajout de classes pour l'activité de gym
INSERT INTO classes (activity_id, start_time, end_time, available_spots)
VALUES
  (3, '10:00:00', '11:00:00', 10),
  (3, '14:00:00', '15:00:00', 10),
  (3, '19:00:00', '20:00:00', 10),
  (3, '21:00:00', '22:00:00', 10);

-- Ajout de classes pour l'activité de yoga
INSERT INTO classes (activity_id, start_time, end_time, available_spots)
VALUES
  (4, '08:00:00', '09:00:00', 10),
  (4, '12:00:00', '13:00:00', 10),
  (4, '17:00:00', '18:00:00', 10),
  (4, '19:00:00', '20:00:00', 10);

-- Ajout de classes pour l'activité de pilates
INSERT INTO classes (activity_id, start_time, end_time, available_spots)
VALUES
  (5, '10:00:00', '11:00:00', 10),
  (5, '14:00:00', '15:00:00', 10),
  (5, '19:00:00', '20:00:00', 10),
  (5, '21:00:00', '22:00:00', 10);

-- Ajout de classes pour l'activité de CrossFit
INSERT INTO classes (activity_id, start_time, end_time, available_spots)
VALUES
  (6, '09:00:00', '10:00:00', 10),
  (6, '13:00:00', '14:00:00', 10),
  (6, '18:00:00', '19:00:00', 10),
  (6, '20:00:00', '21:00:00', 10);

-- Ajout de classes pour l'activité de HIIT
INSERT INTO classes (activity_id, start_time, end_time, available_spots) 
VALUES 
    (7, '09:00:00', '10:00:00', 15),
    (7, '10:15:00', '11:15:00', 15),
    (7, '11:30:00', '12:30:00', 15),
    (7, '14:00:00', '15:00:00', 15);

INSERT INTO reservations (user_id, class_id, activity_id, reservation_date) 
VALUES
    (1, 1, 1, '2023-04-17 09:00:00'),
    (2, 1, 1, '2023-04-17 09:00:00'), 
    (3, 2, 2, '2023-04-17 10:45:00');