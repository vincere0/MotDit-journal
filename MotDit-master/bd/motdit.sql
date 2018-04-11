-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 17 nov. 2017 à 05:04
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `motdit`
--

-- --------------------------------------------------------

--
-- Structure de la table `membresca`
--

CREATE TABLE `membresca` (
  `membreID` int(11) NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `poste` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `motMembre` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `courriel` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `nomutilisateur` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(3000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membresca`
--

INSERT INTO `membresca` (`membreID`, `prenom`, `nom`, `poste`, `motMembre`, `courriel`, `nomutilisateur`, `password`) VALUES
(1, 'Gabriel', 'Lanoville', 'Concepteur Web', 'Salut', 'gablanoville@hotmail.com', 'Gaballive', 'Carey31!');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateurID` int(11) NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `nomutilisateur` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(3000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateurID`, `prenom`, `nom`, `courriel`, `nomutilisateur`, `password`) VALUES
(2, 'Rick', 'Bernier', 'rickbernier@outlook.com', 'Rip', 'hearthstone45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membresca`
--
ALTER TABLE `membresca`
  ADD PRIMARY KEY (`membreID`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateurID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membresca`
--
ALTER TABLE `membresca`
  MODIFY `membreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
