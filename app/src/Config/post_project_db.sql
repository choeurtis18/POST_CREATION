-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : ven. 10 déc. 2021 à 14:15
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
(9, '2021-12-01', 'Mauvais rêves', 'Mauvaise idée, tout allait bien avant que je décide\r\nD\'aller chercher dans mes pires souvenirs\r\nCe qui vit la nuit disparaît le matin sans faire un bruit\r\nDouleurs s\'en suivent et tout ça s\'enfuit\r\n\r\nMon corps se déchire, j\'en perds la vue et je crie\r\nPour le meilleur et le pire, ils sont réveillés par mes nuits\r\nJ\'ai beau me le dire, cette fois je m\'l\'étais promis\r\nPlus de cauchemars dans ma vie', 1, '../../Assets/Images/baby (1).jpg'),
(10, '2021-12-08', 'OG', 'J\'roule un gros pilon pour gérer l\'anxiété, sourire au bout des vres-lè, tant que ça tourne\r\nDans les soirées mondaines, elles sont excitées, dans les soirées mondaines, elles sont excitées (eh)\r\nBébé, vodka, c\'est le mood, la potion (eh), tu ferais mieux de revoir les notions (eh)\r\nBébé, vodka, c\'est le mood, la potion (eh), tu ferais mieux de revoir les notions\r\nJ\'lui mets son coup juste après la vaisselle (la vaisselle), elle me parle de son père au Brésil', 2, '../../Assets/Images/baby (1).jpg'),
(13, '2021-12-09', 'Doudou', 'J\'repense à tout, tout, tout et même sur Snap\', y a la Doudou-dou\r\nPar la vitre, elle m\'fait \"coucou\", c\'est ma gadji, c\'est mon chouchou\r\nC\'est bizarre, j\'repense à tout, tout, tout, même sur Snap\', y a la Doudou-dou\r\nPar la vitre, elle m\'fait \"coucou\", c\'est ma gadji, c\'est mon chouchou', 1, '../../Assets/Images/baby (1).jpg'),
(23, '2021-12-10', 'sc', 'sccs', 1, '../../Assets/Images/5ad468e6b6e1c3744726e9892e104c09.jpg');

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
(1, 'Angèle', 'Queen', 'angele@gmail.com', 'ange', 0),
(2, 'Ninho', 'Jefe', 'ni@gmail.com', 'roro', 1),
(9, 'test', 'test', 'test@gmail.com', 'test', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
