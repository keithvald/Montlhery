-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 25 mars 2021 à 11:36
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
  `dateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `adminUser`
--

INSERT INTO `adminUser` (`id`, `nom`, `email`, `password`, `code`, `dateInscription`) VALUES
(3, 'password', 'password', '$2y$10$.sJbu13IeF0KSdT6mqilxOnV1P3QKO48eAbuJBvgax7aPl3Me/i8i', 0, '2021-03-24 14:07:39'),
(4, 'mikail', 'mikailkalkanpro@gmail.com', '$2y$10$C8lAIDbRpDZVPVsrntU93.qUPZOto1vRhLhua6hF.yvpTrmT8L.DG', 0, '2021-03-24 15:37:59'),
(5, 'test', 'montlhery.autoecole.narbonne@gmail.com', 'test', 0, '2021-03-25 09:38:33');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `auteur` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `titre` varchar(40) COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `text` text COLLATE utf8mb4_bin NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `auteur`, `titre`, `image`, `text`, `dateCreation`) VALUES
(32, 'Mikail', 'Carte', '1.png', 'test arceus meilleur pokemon', '2021-03-23 13:55:53'),
(33, 'benji', 'logo', '300.png', 'Logo de la securiter routiere', '2021-03-23 14:16:13'),
(34, 'Client', 'code de la route ', 'pexels-photomix-company-190448.jpg', 'Nouvelle règles en vigueur ', '2021-03-23 14:23:56'),
(35, 'benji', 'poommme', 'michael-rivera-DypO_XgAE4Y-unsplash.jpg', 'YESSS TEST ', '2021-03-24 09:46:25'),
(36, 'sandra', 'test', '8.png', 'pokemon', '2021-03-25 08:51:14');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
