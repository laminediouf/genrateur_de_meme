-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 02 nov. 2018 à 16:13
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `generateur_image`
--

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `file`
--

INSERT INTO `file` (`id`, `name`, `file_url`) VALUES
(1, 'djouma2.jpg', 'files/djouma2.jpg'),
(8, '1237.jpg', 'files/1237.jpg'),
(3, 'djoumadji.jpg', 'files/djoumadji.jpg'),
(4, 's.moutaha.jpg', 'files/s.moutaha.jpg'),
(7, 'djoumadji.jpg', 'files/djoumadji.jpg'),
(9, '1238.jpg', 'files/1238.jpg'),
(10, 'coder2.jpg', 'files/coder2.jpg'),
(11, 'coder.jpg', 'files/coder.jpg'),
(12, 'coder.jpg', 'files/coder.jpg'),
(13, 'logopython.PNG', 'files/logopython.PNG'),
(14, 'summit-computer.jpg', 'files/summit-computer.jpg'),
(15, 'gitphotorecaptul2.png', 'files/gitphotorecaptul2.png');

-- --------------------------------------------------------

--
-- Structure de la table `texte`
--

DROP TABLE IF EXISTS `texte`;
CREATE TABLE IF NOT EXISTS `texte` (
  `id_text` int(11) NOT NULL AUTO_INCREMENT,
  `description_up` text NOT NULL,
  `description_down` text NOT NULL,
  `id_image` int(11) NOT NULL,
  PRIMARY KEY (`id_text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user_groupe`
--

DROP TABLE IF EXISTS `user_groupe`;
CREATE TABLE IF NOT EXISTS `user_groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupe` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user_groupe`
--

INSERT INTO `user_groupe` (`id`, `groupe`) VALUES
(1, 'Administrateur'),
(2, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pin` varchar(60) NOT NULL,
  `date_inscription` date NOT NULL,
  `type_group` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `login`, `password`, `email`, `pin`, `date_inscription`, `type_group`) VALUES
(1, 'Diouf', 'Lamine', 'lamine', '85e0dd0da960f8da9feebb07d2bd8171b3472bda', 'alamine@hotmail.fr', '8cb2237d0679ca88db6464eac60da96345513964', '2018-10-23', '1'),
(2, 'diatta', 'elzo', 'elzo', 'e4ea59b411263b4298f4ae3dfbfaf144bd870126', 'elzo@gmil.com', '8cb2237d0679ca88db6464eac60da96345513964', '2018-11-02', 'User'),
(3, 'Oumou', 'Diouf', 'Oumou', 'c1f957a96fcd339cec088a181fa0bae77b0c99b1', 'omouuu@codeur.online', '8cb2237d0679ca88db6464eac60da96345513964', '2018-11-02', '2'),
(4, 'omzo', 'dollard', 'omzo', '86373be82d57b2c2a6b21f3fa75c2b3fbc9ff4e6', 'omzo.m@codeur.online', '8cb2237d0679ca88db6464eac60da96345513964', '2018-11-02', '2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
