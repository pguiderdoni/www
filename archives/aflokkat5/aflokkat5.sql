-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 mars 2022 à 09:58
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aflokkat5`
--

-- --------------------------------------------------------

--
-- Structure de la table `log_password`
--

DROP TABLE IF EXISTS `log_password`;
CREATE TABLE IF NOT EXISTS `log_password` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `log_password`
--

INSERT INTO `log_password` (`id`, `mail`, `created_at`) VALUES
(1, 'a@a.fr', '2022-03-15 00:26:25');

-- --------------------------------------------------------

--
-- Structure de la table `log_sms`
--

DROP TABLE IF EXISTS `log_sms`;
CREATE TABLE IF NOT EXISTS `log_sms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `code` varchar(255) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `log_sms`
--

INSERT INTO `log_sms` (`id`, `user_id`, `code`, `state`) VALUES
(1, 1, '4782', 1),
(2, 1, '9695', 0),
(3, 1, '6815', 1),
(4, 1, '3823', 1),
(5, 1, '2155', 1),
(6, 1, '5886', 1),
(7, 1, '9439', 1),
(8, 13, '2234', 0),
(9, 13, '6592', 0),
(10, 13, '4481', 0),
(11, 13, '9518', 0),
(12, 13, '1230', 0),
(13, 13, '4573', 0),
(14, 13, '2230', 1),
(15, 13, '6700', 0),
(16, 14, '8935', 1);

-- --------------------------------------------------------

--
-- Structure de la table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `request`
--

INSERT INTO `request` (`id`, `user_id`, `hash`, `state`) VALUES
(1, 15, 'QFBwuPEYKjrvCgocSnqL', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `pass_end` datetime DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mail`, `pass`, `pass_end`, `type`, `hash`, `created_date`) VALUES
(1, 'toto', 'a@a.fr', '456', '2022-06-14 00:00:00', NULL, NULL, '2022-03-14 15:26:55'),
(2, 'test', 'test@test.fr', '123', NULL, NULL, NULL, '2022-03-14 15:27:38'),
(3, 'abc', 'a@a.gt', '123', NULL, NULL, NULL, '2022-03-14 15:28:26'),
(4, 'aa', 'a@d.fr', 'aa', NULL, NULL, NULL, '2022-03-14 15:29:29'),
(5, '123', '1@1.fr', '00', NULL, NULL, NULL, '2022-03-14 15:30:26'),
(6, '1234', '1@1.fra', '00', NULL, NULL, NULL, '2022-03-14 15:30:41'),
(7, '12345', '1@1.fraa', '00', NULL, NULL, NULL, '2022-03-14 15:31:17'),
(8, 'test1', 'dt@d.fr', '888888', NULL, NULL, NULL, '2022-03-14 15:31:36'),
(9, 'accc', 'dd@yahoo.fr', '8888', NULL, NULL, NULL, '2022-03-14 21:19:53'),
(10, 'yep', 'abg@f.fr', '55688', '2022-06-14 00:00:00', NULL, NULL, '2022-03-14 23:04:02'),
(11, 'admin', 'pl@ghszj', 'Scbastia5!', '2022-06-14 00:00:00', NULL, NULL, '2022-03-14 23:05:09'),
(12, 'test555', 'b@b.fr', '202cb962ac59075b964b07152d234b70', '2022-06-15 00:00:00', NULL, NULL, '2022-03-15 01:30:09'),
(13, 'aaaaa', 'c@c.fr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-06-15 00:00:00', NULL, NULL, '2022-03-15 01:33:12'),
(14, 'dada', 'd@d.fr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-06-15 00:00:00', 'prof', '623041c732d08', '2022-03-15 08:35:35'),
(15, 'eaea', 'e@e.fr', '51eac6b471a284d3341d8c0c63d0f1a286262a18', '2022-06-15 00:00:00', 'student', '623041e71814c', '2022-03-15 08:36:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
