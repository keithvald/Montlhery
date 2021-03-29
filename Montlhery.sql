-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 29 mars 2021 à 10:52
-- Version du serveur :  8.0.23-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Montlhery`
--

-- --------------------------------------------------------

--
-- Structure de la table `adminUser`
--

CREATE TABLE `adminUser` (
  `id` int NOT NULL,
  `nom` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `code` int NOT NULL,
  `dateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `secret` varchar(150) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `adminUser`
--

INSERT INTO `adminUser` (`id`, `nom`, `email`, `password`, `code`, `dateInscription`, `secret`) VALUES
(5, 'Montlhery\r\n', 'montlhery.autoecole.narbonne@gmail.com', '$2y$14$39P5e95DGHn..NAVekF44eoIecrBU9fyVon2bt/IEl9ckZLwWPn9C', 3959453, '2021-03-25 09:38:33', '$2y$14$JWVnCIiqJjBamD2Xr46gFeNiyXAah6ui8fU/VRAD54i39JNe7D7TO'),
(6, 'admin', 'admin', '$2y$14$SH1NCpff4usAtKJRZkDXTOx6o0rA/NA07RSHP9ljsXHK.WinRxn2G', 0, '2021-03-26 11:06:15', '');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `auteur` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `titre` varchar(40) COLLATE utf8mb4_bin NOT NULL,
  `lien` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `image` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `sommaire` text COLLATE utf8mb4_bin NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `auteur`, `titre`, `lien`, `image`, `sommaire`, `text`, `dateCreation`) VALUES
(37, 'Montlhery', 'Nouvelles régles du permis en vigeur', 'https://www.rts.ch/info/suisse/11855334-quelles-nouvelles-regles-sur-les-routes-en-2021.html', 'online-3412473_1920.jpg', 'Dès le 1er janvier 2021, plusieurs nouvelles dispositions de la circulation routière entreront en vigueur et impacteront autant les automobilistes que les cyclistes ou les piétons. Tour d\'horizon des principaux changements.', 'Sur l\'autoroute\r\nCouloirs de secours\r\n\r\nPour faciliter l\'accès de véhicules d\'intervention circulant avec les gyrophares, les automobilistes devront spontanément créer un couloir de secours au milieu des voies, sans empiéter sur la bande d\'arrêt d\'urgence. Il faudra serrer au plus proche du bord de la chaussée dans les tunnels.\r\n\r\nSur une autoroute à trois voies, les véhicules au centre et à droite devront serrer à droite et ceux sur la voie de gauche serreront à gauche; cela dégagera un espace suffisant pour le passage des véhicules d\'urgence.', '2021-03-29 08:27:33');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adminUser`
--
ALTER TABLE `adminUser`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adminUser`
--
ALTER TABLE `adminUser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
