-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 mars 2024 à 16:43
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `j_intern`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `idCandidature` int(11) NOT NULL,
  `nom_candidat` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `diplome` varchar(255) DEFAULT NULL,
  `date_candidature` date DEFAULT NULL,
  `id_offre` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `lettre_motivation` varchar(255) DEFAULT NULL,
  `statut` varchar(50) DEFAULT 'En attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`idCandidature`, `nom_candidat`, `cv`, `diplome`, `date_candidature`, `id_offre`, `id_utilisateur`, `lettre_motivation`, `statut`) VALUES
(1, 'awounang', '$../assets/fichiers/LISTE DES THEMES PROJETS TUTEURES 2023-2024.pdf', '../assets/fichiers/LISTE DES THEMES PROJETS TUTEURES 2023-2024.pdf', '2023-11-28', 2, 4, '../assets/fichiers/LISTE DES THEMES PROJETS TUTEURES 2023-2024.pdf', 'En attente'),
(2, 'oooo', '$../assets/fichiers/LISTE DES THEMES PROJETS TUTEURES 2023-2024.pdf', '../assets/fichiers/LISTE DES THEMES PROJETS TUTEURES 2023-2024.pdf', '2023-11-28', 17, 4, '../assets/fichiers/LISTE DES THEMES PROJETS TUTEURES 2023-2024.pdf', 'Rejetée'),
(3, 'sontsa', '$../assets/fichiers/LISTE DES THEMES PROJETS TUTEURES 2023-2024.pdf', '../assets/fichiers/LISTE DES THEMES PROJETS TUTEURES 2023-2024.pdf', '2023-11-28', 15, 5, '../assets/fichiers/LISTE DES THEMES PROJETS TUTEURES 2023-2024.pdf', 'Acceptée'),
(4, 'awounang', '../assets/fichiers/projets awounang et atsangou.txt', '../assets/fichiers/projets awounang et atsangou.txt', '2023-12-04', 2, 5, '../assets/fichiers/projets awounang et atsangou.txt', 'En attente'),
(5, 'sontsa', '../assets/fichiers/projets awounang et atsangou.txt', '../assets/fichiers/projets awounang et atsangou.txt', '2023-12-04', 18, 5, '../assets/fichiers/projets awounang et atsangou.txt', 'Acceptée'),
(6, '', '../assets/fichiers/Acte De Naissance.pdf', '../assets/fichiers/Photocopie Du Baccalauréat.pdf', '2023-12-05', 20, 11, '../assets/fichiers/Preuve De Séjour.pdf', 'Acceptée'),
(7, '', '../assets/fichiers/Preuve De Séjour.pdf', '../assets/fichiers/Preuve De Séjour.pdf', '2023-12-08', 20, 11, '../assets/fichiers/Preuve De Séjour.pdf', 'En attente'),
(8, '', '../assets/fichiers/Preuve De Séjour.pdf', '../assets/fichiers/Preuve De Séjour.pdf', '2023-12-08', 20, 12, '../assets/fichiers/Photocopie Du Probatoire.pdf', 'En attente'),
(9, '', '../assets/fichiers/Preuve De Séjour.pdf', '../assets/fichiers/Photocopie Du DEC.pdf', '2023-12-08', 20, 12, '../assets/fichiers/Photocopie Du Probatoire.pdf', 'Rejetée');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `description_entreprise` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `industrie` varchar(255) DEFAULT NULL,
  `photo_entreprise` varchar(255) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `description_entreprise`, `nom`, `industrie`, `photo_entreprise`, `id_utilisateur`) VALUES
(1, 'tout ce qui est relatif à la plomberie', 'plom sarl', 'plomberie', NULL, 3),
(2, 'ttttttttttttttt', 'karel shop', 'vetement', NULL, 7),
(4, 'dev detch est une entreprise offrant des services innformatiques', 'dev tecth', 'programmation', NULL, 10);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id` int(11) NOT NULL,
  `description_offre` varchar(255) DEFAULT NULL,
  `domaine` varchar(255) DEFAULT NULL,
  `competences` varchar(255) DEFAULT NULL,
  `date_limite` date DEFAULT NULL,
  `id_entreprise` int(11) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `salaire` float DEFAULT NULL,
  `type_offre` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `description_offre`, `domaine`, `competences`, `date_limite`, `id_entreprise`, `titre`, `salaire`, `type_offre`, `photo`) VALUES
(2, 'faites des merveilles avec vos mains', 'coiffure', 'rasta et lace frontale', '2023-01-27', NULL, 'coiffeuse', 0, 'emploi', '../assets/images/automobile.jpg'),
(15, 'faites des merveilles avec vos mains', 'coiffure    ', 'rasta et lace frontale', '2023-01-27', 1, 'coiffeur', 0, 'stage', '../assets/images/beaute3.jpg'),
(17, 'uuuuuuuuuu', 'uuuuuuuu', 'ggggggg', '2023-01-28', 1, 'kkkk', 10000000, 'emploi', '../assets/images/info2.jpg'),
(18, 'jiiiiiiiiiii', 'jjjjjjjjjjjjjjjjjjjjjjjj', 'pppppppppppppp', '2023-11-29', 1, 'hhhh', 900000000, 'stage', '../assets/images/flyer1.jpg'),
(20, 'construire des application web communiquant avec la base de données', 'programmation ', 'php, htm et css', '2023-12-13', 4, 'Développeuse php', 100000, 'emploi', '../assets/images/info2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `nom_utilisateur` varchar(50) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `photo_user` varchar(255) DEFAULT NULL,
  `role_utilisateur` varchar(50) DEFAULT 'candidat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `nom`, `nom_utilisateur`, `passwd`, `photo_user`, `role_utilisateur`) VALUES
(3, 'd@gmail.com', 'danielle', 'danielle', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', NULL, 'employeur'),
(4, 's@gmail.com', 'stone', 'stone', 'd86f18dc7239727344924fa2755170ce74521aaa', NULL, 'candidat'),
(5, 'r@gmail.com', 'rubi', 'rubi', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', NULL, 'candidat'),
(6, 'r@gmail.com', 'rubi', 'rubi', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', NULL, 'candidat'),
(7, 'k@gmai.com', 'k', 'karel', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', NULL, 'employeur'),
(10, 't@gmai.com', 'Tchouta', 'Tchouta', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', NULL, 'employeur'),
(11, 'a@gmail.com', 'Awounang Danielle', 'Dani', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', NULL, 'candidat'),
(12, 'jamesbeaurisque@gmail.com', 'nkenfack', 'beaurisque', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', NULL, 'candidat');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`idCandidature`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_offre` (`id_offre`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `idCandidature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `candidature_ibfk_2` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `entreprise_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
