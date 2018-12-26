-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 26 déc. 2018 à 09:37
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projectphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `reporting` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `reporting`) VALUES
(1, 1, 'Greg', 'Enfin l\'arrivé de ce sitee', '2018-10-18 17:17:54', NULL),
(2, 2, 'Sophie', 'Si un jour tu le maitrise tu va pouvoir faire des prouesses avec.', '2018-10-18 17:29:19', NULL),
(3, 2, 'Greg', 'Accroche-toi tu vas y arriver ', '2018-10-18 17:30:11', NULL),
(4, 2, 'tatjana', 'Ta vu c\'est pas mal comme langage', '2018-10-24 12:25:34', NULL),
(5, 2, 'Inconnu', 'sa veut dire quoi php ?', '2018-10-24 12:27:07', NULL),
(6, 6, 'Pierre', 'Que dit tu d\'ajouter la possibilité d\'injecter un nouveau chapitre de ton blog directement sur grace a une page administrateur ?', '2018-10-25 18:28:05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `name`, `pseudo`, `pass`, `mail`, `registration_date`, `admin`) VALUES
(1, 'alan', 'houker', '$2y$10$YoUmB/X9hk7YHNcLuZpnbe81jO61yPxJCEQIWj.Eo5GsJVuWEN.JK', 'alan.dauphas@me.com', '2018-10-30 15:41:32', 1),
(2, 'Jean', 'Jean', '$2y$10$SFJS0Su1xFjLLQg1L.Bd6u5KP845Qz7U8JC49s0HDZXe30rnWQHku', 'Jean@Forteroche.com', '2018-12-18 12:21:58', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Chapitre 1', 'Bienvenu sur mon projet Php', '2018-10-18 15:12:12'),
(2, 'Chapitre 2', 'Voici mes premiers pas sur le langage php.', '2018-10-18 17:28:31'),
(3, 'Chapitre 3', 'Maintenant que j\'ai les bases en Php, place au MVC.', '2018-10-25 18:19:12'),
(4, 'Chapitre 4', 'MVC c\'est maintenant Ok', '2018-10-25 18:25:20'),
(5, 'Chapitre 5', 'Place a la POO (mise en forme objet)', '2018-10-25 18:25:45'),
(6, 'Chapitre 6', 'Une fois que j\'aurais mis le site en orientée objet, je penserais à ajouter des fonctionnalité. Si vous avez des suggestion je suis preneur.', '2018-10-25 18:27:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
