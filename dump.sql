-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 01 avr. 2021 à 12:33
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `url`
--

-- --------------------------------------------------------

--
-- Structure de la table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `code` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `click` int(11) NOT NULL DEFAULT '0',
  `linkname` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `STO` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `shorten_link` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `connectionId` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `links`
--

INSERT INTO `links` (`id`, `url`, `code`, `created`, `click`, `linkname`, `STO`, `shorten_link`, `connectionId`) VALUES
(100000467, 'https://www.php.net/manual/fr/pdo.query.php', 'vQL4v', '2021-04-01 00:00:37', 1, NULL, NULL, NULL, NULL),
(100000466, 'https://www.php.net/', 'pJUe7', '2021-03-31 23:50:36', 1, NULL, NULL, NULL, NULL),
(100000468, './404error/404error.php', 'JRDTA', '2021-04-01 00:01:01', 2, 'hello', 'https://www.php.net/manual/fr/pdo.query.php', NULL, '30');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersMail` varchar(128) NOT NULL,
  `usersUsername` varchar(128) NOT NULL,
  `usersPassword` varchar(128) NOT NULL,
  `connectionId` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usersId`, `usersMail`, `usersUsername`, `usersPassword`, `connectionId`) VALUES
(29, 'test@gmail.com', 'test', '$2y$10$hFo2ZpB2Stv.CuulpL.CPODnaroRg9MzxQ7XgREsEwH1XjzB9P.yO', NULL),
(30, 'mailalexandrabernard@gmail.com', 'philebg', '$2y$10$cf1N/O85dIfuq0DvbD9BC.gSgfR2J547EGe/urKenQhkf42SPPEOu', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000469;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
