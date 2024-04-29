-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 avr. 2024 à 20:51
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `ID_FORUM` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_FORUM`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`ID_FORUM`, `NAME`) VALUES
(1, 'Politique'),
(2, 'Economie'),
(3, 'Culture'),
(4, 'Sport'),
(5, 'Loisirs'),
(6, 'Société');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID_MESSAGE` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `ID_POST` int NOT NULL,
  `CONTENT` text COLLATE utf8mb4_general_ci NOT NULL,
  `CREATEDAT` datetime NOT NULL,
  `UPDATEDAT` datetime NOT NULL,
  PRIMARY KEY (`ID_MESSAGE`),
  KEY `FK_MESSAGE_PUBLISH_POST` (`ID_POST`),
  KEY `FK_MESSAGE_WRITE_USER` (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`ID_MESSAGE`, `ID_USER`, `ID_POST`, `CONTENT`, `CREATEDAT`, `UPDATEDAT`) VALUES
(1, 1, 2, 'Augmentons les salaires, et les prix...ainsi producteurs et salariés seront contents !', '2024-04-09 22:46:58', '2024-04-09 22:46:59'),
(2, 2, 2, 'Mais vraiment ils ne savent tellement plus quoi inventer, un énième plan de relance de je ne sais quoi... Que maintenant ils et elles veulent supprimer des droits, celui du droit de grève est constitutionnelle... Donc comment vont ils s y prendre ? Est ce qu ils vont encore se réunir à Versailles ?', '2024-04-09 22:47:17', '2024-04-09 22:47:17'),
(3, 3, 3, 'C’est incroyable ce que Renard a insufflé à cette équipe : la gagne ! Dommage qu’il parte…', '2024-04-09 22:48:50', '2024-04-09 22:48:51');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `ID_POST` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `ID_FORUM` int NOT NULL,
  `TITLE` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `DESCRIPTION` text COLLATE utf8mb4_general_ci,
  `CREATEDAT` datetime NOT NULL,
  `UPDATEDAT` datetime NOT NULL,
  PRIMARY KEY (`ID_POST`),
  KEY `FK_POST_BELONG_TO_FORUM` (`ID_FORUM`),
  KEY `FK_POST_START_USER` (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `post` (`ID_POST`, `ID_USER`, `ID_FORUM`, `TITLE`, `DESCRIPTION`, `CREATEDAT`, `UPDATEDAT`) VALUES
(1, 1, 3, 'Six détails exceptionnels repérés à l’exposition \"Metal, Diabolus in musica\" à la Philharmonie de Paris', 'Que l\'on soit familier ou pas de la musique metal, l\'exposition que lui consacre pour la première fois la Philharmonie de Paris est riche d\'enseignements. Nous l\'avons parcourue en compagnie d\'un de ses deux co-curateurs, le docteur en histoire de l\'art Milan Garcin. Ses éclairages sont passionnants.', '2024-03-09 22:46:29', '2024-03-09 22:46:29'),
(2, 4, 1, 'Le Sénat limite le droit de grève dans le secteur des transports sur certaines périodes', 'Le texte octroie au gouvernement un quota de 30 jours par an durant lesquels les \"personnels des services publics de transports\", excepté le secteur aérien, seraient privés de ce droit.', '2024-04-09 22:46:29', '2024-04-09 22:46:30'),
(3, 4, 4, 'Qualifications de l\'Euro 2025 : les Bleues signent un succès de prestige en Suède et s\'envolent en tête de leur poule', 'Quatre jours après sa victoire contre l\'Irlande, l\'équipe de France a enchaîné face aux vice-championnes olympiques (1-0), mardi à Göteborg.', '2024-04-09 22:46:29', '2024-04-09 22:46:30');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` int NOT NULL AUTO_INCREMENT,
  `FIRSTNAME` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `LASTNAME` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EMAIL` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PASSWORD` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ROLE` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_USER`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `PASSWORD`, `ROLE`) VALUES
(1, 'Fred', 'STAMP', 'fred.stam@email.com', '$2y$13$qc5zkK1.XqgZbJim2xEqOey.NajSaKdt/wZH5QI64cgutX6F/6JDW', 'ROLE_USER'),
(2, 'Alice', 'BORDER', 'alice.border@email.com', '$2y$13$qc5zkK1.XqgZbJim2xEqOey.NajSaKdt/wZH5QI64cgutX6F/6JDW', 'ROLE_USER'),
(3, 'John', 'KAPLAN', 'john.kaplan@email.com', '$2y$13$qc5zkK1.XqgZbJim2xEqOey.NajSaKdt/wZH5QI64cgutX6F/6JDW', 'ROLE_ADMIN'),
(4, 'Vera', 'EDITE', 'vera.edite@email.com', '$2y$13$qc5zkK1.XqgZbJim2xEqOey.NajSaKdt/wZH5QI64cgutX6F/6JDW', 'ROLE_USER');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_MESSAGE_PUBLISH_POST` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_MESSAGE_WRITE_USER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_POST_BELONG_TO_FORUM` FOREIGN KEY (`ID_FORUM`) REFERENCES `forum` (`ID_FORUM`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_POST_START_USER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
