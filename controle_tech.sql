-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 17 juil. 2022 à 13:13
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `controle_tech`
--

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

DROP TABLE IF EXISTS `marques`;
CREATE TABLE IF NOT EXISTS `marques` (
  `id_marque` int(255) NOT NULL AUTO_INCREMENT,
  `nom_marque` varchar(255) NOT NULL,
  PRIMARY KEY (`id_marque`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id_marque`, `nom_marque`) VALUES
(6, 'Honda'),
(5, 'Ford'),
(7, 'Renault'),
(8, 'Nissan'),
(9, 'Alfa'),
(10, 'Volkswagen'),
(11, 'Toyota');

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

DROP TABLE IF EXISTS `modeles`;
CREATE TABLE IF NOT EXISTS `modeles` (
  `id_modele` int(255) NOT NULL AUTO_INCREMENT,
  `id_marque` int(255) NOT NULL,
  `nom_modele` varchar(255) NOT NULL,
  PRIMARY KEY (`id_modele`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modeles`
--

INSERT INTO `modeles` (`id_modele`, `id_marque`, `nom_modele`) VALUES
(12, 5, 'Raptor'),
(11, 5, 'Mustang'),
(10, 5, 'Focus'),
(9, 5, 'Fiesta'),
(13, 6, 'Civic'),
(14, 6, 'Jazz'),
(15, 6, 'Prelude'),
(16, 6, 'HR-V'),
(17, 7, 'Clio'),
(18, 7, 'Laguna'),
(19, 7, 'Megane'),
(20, 7, 'Zoe'),
(21, 8, 'Leaf'),
(22, 8, 'GT-R'),
(23, 8, 'Leaf'),
(24, 8, 'Micra'),
(25, 9, 'Giulietta'),
(26, 9, '147'),
(27, 9, '159'),
(28, 9, 'Giulia'),
(29, 10, 'Golf'),
(30, 10, 'Polo'),
(31, 10, 'Tiguan'),
(32, 10, 'Sirocco'),
(33, 11, 'Yaris'),
(34, 11, 'Supra'),
(35, 11, 'Prius'),
(36, 11, 'Corolla');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `id_inter` int(255) NOT NULL AUTO_INCREMENT,
  `nom_marque` varchar(255) NOT NULL,
  `nom_modele` varchar(255) NOT NULL,
  `puissance` varchar(255) NOT NULL,
  `immat` varchar(15) NOT NULL,
  `fin_inter` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_inter`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id_inter`, `nom_marque`, `nom_modele`, `puissance`, `immat`, `fin_inter`) VALUES
(5, '5', '11', '545', 'ER767DE', 0),
(6, '7', '17', '45', 'FH527PF', 0),
(7, '9', '25', '245', 'RT676ER', 0),
(8, '8', '24', '60', 'ER767DE', 0),
(9, '10', '32', '140', 'FT768GT', 0),
(10, '7', '20', '75', 'RT676ER', 0),
(11, '7', '17', '90', 'PD345DQ', 0),
(12, '8', '22', '545', 'FH527PF', 0),
(13, '5', '10', '185', 'FT768GT', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
