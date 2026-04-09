-- Création de la base de données
CREATE DATABASE IF NOT EXISTS db_etudiant;
USE db_etudiant;

-- 1. Table Utilisateur (Authentification)
CREATE TABLE IF NOT EXISTS utilisateur (
    identifiant VARCHAR(50) PRIMARY KEY,
    mot_de_passe VARCHAR(128) NOT NULL -- SHA-512 génère une chaîne de 128 caractères
);

-- Insertion de l'utilisateur de test (Login: admin / Mot de passe: test1234)
-- Le mot de passe inséré correspond au hachage SHA-512 de "test1234"
INSERT INTO utilisateur (identifiant, mot_de_passe) 
VALUES ('admin', '11116c4e12c19e7a469bb759168b9415c4de5b94f387ff388e3dbf7df5dc481358a9840e791eafad6b4c3efdd0e2418e24dc5c4b14d2eab8fce5bb0a221f0679');

-- 2. Table Distributeur
CREATE TABLE IF NOT EXISTS distributeur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    raison_sociale VARCHAR(100) NOT NULL
);

-- 3. Table Contact
CREATE TABLE IF NOT EXISTS contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    mail VARCHAR(100) NOT NULL,
    tel_fixe VARCHAR(20),
    tel_portable VARCHAR(20),
    privilegie TINYINT(1) DEFAULT 0,
    id_distributeur INT,
    FOREIGN KEY (id_distributeur) REFERENCES distributeur(id)
);

-- 4. Table Commercial
CREATE TABLE IF NOT EXISTS commercial (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL
);

-- 5. Table Motif
CREATE TABLE IF NOT EXISTS motif (
    id_motif INT AUTO_INCREMENT PRIMARY KEY,
    libelle_motif VARCHAR(100) NOT NULL
);

-- 6. Table Visite (Table de liaison pour les comptes rendus)
CREATE TABLE IF NOT EXISTS visite (
    id_commercial INT,
    id_distributeur INT,
    id_contact INT,
    id_motif INT,
    date_visite DATE NOT NULL,
    coefConfiance INT,
    PRIMARY KEY (id_commercial, id_distributeur, id_contact, id_motif, date_visite),
    FOREIGN KEY (id_commercial) REFERENCES commercial(id),
    FOREIGN KEY (id_distributeur) REFERENCES distributeur(id),
    FOREIGN KEY (id_contact) REFERENCES contact(id),
    FOREIGN KEY (id_motif) REFERENCES motif(id_motif)
);

-- Jeu d'essai pour valider les requêtes de consultation
INSERT INTO distributeur (raison_sociale) VALUES ('Matelas & Co'), ('Sommeil Doux');
INSERT INTO commercial (nom, prenom) VALUES ('Dupont', 'Jean'), ('Martin', 'Alice');
INSERT INTO motif (libelle_motif) VALUES ('Prospection'), ('Fidélisation');