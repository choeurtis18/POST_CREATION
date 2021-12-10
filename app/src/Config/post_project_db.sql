-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : ven. 10 déc. 2021 à 16:25
-- Version du serveur : 10.6.4-MariaDB-1:10.6.4+maria~focal
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `post_project_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `publishedDate` date NOT NULL,
  `content` varchar(500) NOT NULL,
  `authorId` int(11) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `publishedDate`, `content`, `authorId`, `postId`) VALUES
(1, '2021-12-09', 'Une voix exceptionnel, que dire face à un tel talent ', 2, 9),
(4, '2021-12-09', 'Merci NI', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `publishedDate` date NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb3 NOT NULL,
  `content` varchar(2200) NOT NULL,
  `authorId` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `publishedDate`, `title`, `content`, `authorId`, `image`) VALUES
(26, '2021-12-10', 'Clic clic', 'T\'ÉTAIS MON CHOUCHOU\r\nJE PEUX PAS OUBLIER LE PASSÉ\r\n\r\nT\'ES LA PLUS BELLE DES ÉTOILES\r\nPARMI LES AUTRES JE VOIS QUE TOI\r\nSI TU TE SENS SEULE DIS-MOI\r\nIL RESTE UNE PLACE AUPRÈS DE MOI\r\nLES PROJECTEURS SUR TOI\r\nC\'EST FOU COMMENT TU BRILLES DANS LE NOIR,\r\nT\'ES LA PLUS BELLE MADEMOISELLE\r\nCOMMENT J\'AURAIS FAIT POUR PAS TE VOIR', 1, '../../Assets/Images/8a077b3521534883d6848f13b0fa7869.jpg'),
(27, '2021-12-10', 'Say It', 'You gon have to do more than just (say it)\r\nYou gon have to do less when you (do it)\r\nTell mama you know I (show it)\r\nAlways want you to (prove it)\r\nYou gon have to do more than just (say it)\r\nYou gon have to do less when you (do it)\r\nTell mama you know I (show it)\r\nSee you gon need to do more than just (prove it)', 2, '../../Assets/Images/298934818e7268cd48600540d842a75a.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `lastName`, `mail`, `password`, `isAdmin`) VALUES
(1, 'Angèle', 'Angèle', 'ange@gmail.com', 'ange', 0),
(2, 'test', 'test', 'test@gmail.com', 'test', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
