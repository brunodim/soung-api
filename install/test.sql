-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Client: localhost:3306
-- Généré le : Mer 27 Septembre 2017 à 17:15
-- Version du serveur: 5.6.32
-- Version de PHP: 5.4.45-1~dotdeb+7.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `song`
--

INSERT INTO `song` (`id`, `name`, `duration`) VALUES
(1, 'Sample 1', 60),
(2, 'Sample 2', 58);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`) VALUES
(1, 'bdimiceli', 'dimicelibruno@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `user_song`
--

CREATE TABLE IF NOT EXISTS `user_song` (
  `id_user` int(11) NOT NULL,
  `id_song` int(11) NOT NULL,
  UNIQUE KEY `user_song` (`id_user`,`id_song`),
  KEY `id_song` (`id_song`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_song`
--

INSERT INTO `user_song` (`id_user`, `id_song`) VALUES
(1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `user_song`
--
ALTER TABLE `user_song`
  ADD CONSTRAINT `user_song_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_song_ibfk_2` FOREIGN KEY (`id_song`) REFERENCES `song` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
