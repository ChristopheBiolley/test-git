-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 07 Septembre 2015 à 08:44
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `access_level`
--

CREATE TABLE IF NOT EXISTS `access_level` (
  `access_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `access_level`
--

INSERT INTO `access_level` (`access_id`, `name`, `value`) VALUES
(1, 'Employé', '5'),
(2, 'Admin', '10');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `address1` varchar(45) NOT NULL,
  `address2` varchar(45) NOT NULL,
  `postal_code` varchar(45) NOT NULL,
  `locality` varchar(45) NOT NULL,
  `fixe_phone` varchar(45) NOT NULL,
  `mobile_phone` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`client_id`, `company`, `name`, `surname`, `address1`, `address2`, `postal_code`, `locality`, `fixe_phone`, `mobile_phone`, `mail`, `url`) VALUES
(1, 'ORIF', 'Christophe', 'Biolley', 'Chemin de la Creuse 1', '', '1020', 'Renens', '0216526355', '', 'chbiolley@gmail.com', 'http://www.orif.ch/'),
(2, 'EPSIC', 'Maya', 'Bee', 'Rue de Genève 63', '', '1002', 'Lausanne', '1236547899', '542561881', 'black@mail.ch', 'http://www.epsic.ch/');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(100) NOT NULL,
  `author` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  `task_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `project_id` (`project_id`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`comment_id`, `text`, `author`, `date`, `project_id`, `task_id`) VALUES
(16, 'interface trop simpliste', 'Biolley', '2015-08-24', NULL, 2),
(17, 'Les tests sont en cours', 'Biolley', '2015-08-24', 11, NULL),
(18, 'Je continue de peaufiné', 'Biolley', '2015-08-24', 6, NULL),
(19, 'Test pour un invité', 'guest', '2015-08-31', NULL, 2),
(20, 'Test pour un user', 'Poudlard', '2015-08-31', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `author_user_id` int(10) unsigned NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `client_id` (`client_id`),
  KEY `status_id` (`status_id`),
  KEY `author_user_id` (`author_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`project_id`, `title`, `description`, `create_date`, `author_user_id`, `start_date`, `end_date`, `client_id`, `status_id`) VALUES
(6, 'Gestion', 'logiciel de gestion', '2015-07-10', 1, '2015-01-02', '2015-01-03', 1, 1),
(11, 'test up', 'test réussis', '2015-07-10', 2, '2015-07-07', '2015-07-12', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `project_manager`
--

CREATE TABLE IF NOT EXISTS `project_manager` (
  `project_manager_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`project_manager_id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `project_manager`
--

INSERT INTO `project_manager` (`project_manager_id`, `user_id`, `project_id`) VALUES
(1, 1, 6),
(6, 2, 11);

-- --------------------------------------------------------

--
-- Structure de la table `project_status`
--

CREATE TABLE IF NOT EXISTS `project_status` (
  `status_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `project_status`
--

INSERT INTO `project_status` (`status_id`, `status`) VALUES
(1, 'en attente'),
(2, 'en cours'),
(3, 'réalisé'),
(4, 'validé'),
(5, 'livré'),
(6, 'clôturé');

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `author_user_id` int(10) unsigned NOT NULL,
  `start_date` date DEFAULT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `time_allowed` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `validation_date` date DEFAULT NULL,
  `time_estimate` date DEFAULT NULL,
  `time_real` date DEFAULT NULL,
  `project_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `status_id` (`status_id`),
  KEY `author_user_id` (`author_user_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `task`
--

INSERT INTO `task` (`task_id`, `title`, `description`, `create_date`, `author_user_id`, `start_date`, `status_id`, `time_allowed`, `end_date`, `validation_date`, `time_estimate`, `time_real`, `project_id`) VALUES
(2, 'test new task', 'test', '2015-08-18', 2, '2015-01-01', 2, '2015-12-31', '2015-12-12', '2015-12-12', '2015-12-11', '2015-12-12', 11);

-- --------------------------------------------------------

--
-- Structure de la table `task_manager`
--

CREATE TABLE IF NOT EXISTS `task_manager` (
  `task_user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `task_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`task_user_id`),
  KEY `user_id` (`user_id`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `task_manager`
--

INSERT INTO `task_manager` (`task_user_id`, `user_id`, `task_id`) VALUES
(32, 1, 2),
(33, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `task_status`
--

CREATE TABLE IF NOT EXISTS `task_status` (
  `status_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `task_status`
--

INSERT INTO `task_status` (`status_id`, `status`) VALUES
(1, 'en attente'),
(2, 'en cours'),
(3, 'réalisée'),
(4, 'validée');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `prename` varchar(50) NOT NULL,
  `login` varchar(45) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `access_id` int(10) unsigned NOT NULL,
  `mail` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `access_id` (`access_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `name`, `prename`, `login`, `pw`, `access_id`, `mail`) VALUES
(1, 'Ketchum', 'Ash', 'BiCh', '$6$$TdyHJJFjOr.4.9fzS6C8xV19OTb6TF.f9np.a.K63hqdFkgiF1dDyv3GiRuiMTSptsoVqZaOZLGUIxjFaswBz1', 1, 'gmail'),
(2, 'Black', 'Chris', 'Poudlard', '$6$$vYrxn962DOtSZmfj8WDo5pGYyZVfUQm23Bk4zZbQDhPY5igJBxXGSXh8uOcfFNQA3oXZJMTAR/3szEnm3s1oG/', 2, 'privet@drive.uk');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_4` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`author_user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `project_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `project_status` (`status_id`);

--
-- Contraintes pour la table `project_manager`
--
ALTER TABLE `project_manager`
  ADD CONSTRAINT `project_manager_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_manager_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_5` FOREIGN KEY (`author_user_id`) REFERENCES `user` (`user_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `task_ibfk_6` FOREIGN KEY (`status_id`) REFERENCES `task_status` (`status_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `task_ibfk_7` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `task_manager`
--
ALTER TABLE `task_manager`
  ADD CONSTRAINT `task_manager_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_manager_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`access_id`) REFERENCES `access_level` (`access_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
