-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 11 déc. 2024 à 08:05
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `film`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `duree` int DEFAULT NULL,
  `date_de_sortie` int DEFAULT NULL,
  `userfile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `duree`, `date_de_sortie`, `userfile`) VALUES
(7, 'The Gentlemen', 113, 2020, NULL),
(9, 'Joker', 122, 2019, NULL),
(13, 'Coucou', 150, 2020, NULL),
(11, 'Princess Mononoké', 134, 1997, NULL),
(16, 'Ludo', 148, 2024, NULL),
(48, 'Pikachu devient un nyancat', 5, 2025, 'images/675806c47309e-elixir.gif'),
(47, 'Coucou2', 222, 2022, 'images/675806a4c289b-elixir.gif'),
(46, 'Coucou2', 222, 2022, 'images/675806189a7f4-elixir.gif');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Coucou', '$argon2i$v=19$m=65536,t=4,p=1$UjFSd1NUZE1UR1NvTlAvSg$uVrqDrQ7J/49APvx58mLFI9Wds4xoTabEXR7NGGYQ/Y'),
(2, 'filmaster', '$argon2i$v=19$m=65536,t=4,p=1$MDBqb0R6QzdZalNVRHB6eA$rhzl6bhw/H8kx6ZSvI0NRocreIDkCMl6/ERmi33SMcM');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
