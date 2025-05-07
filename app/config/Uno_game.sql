-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 07 mai 2025 à 16:21
-- Version du serveur : 9.2.0
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Uno_game`
--

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `name`, `createdAt`) VALUES
(1, 'img_6818628713c601.11959267.webp', '2025-05-05 07:02:31'),
(2, 'img_6818628715adc9.06354291.webp', '2025-05-05 07:02:31'),
(3, 'img_681862871784e7.76169229.webp', '2025-05-05 07:02:31'),
(4, 'img_681862ca939687.00616639.webp', '2025-05-05 07:03:38'),
(5, 'img_681862ca9545d9.53586879.webp', '2025-05-05 07:03:38'),
(6, 'img_681862ca96df79.85678378.webp', '2025-05-05 07:03:38');

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE `joueurs` (
  `id` int NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `scoreTotal` int DEFAULT '0',
  `imgProfil` varchar(255) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `pseudo`, `scoreTotal`, `imgProfil`, `password`, `nom`, `prenom`, `isAdmin`) VALUES
(1, 'admin', -10000, 'https://cdn-icons-png.flaticon.com/512/149/149071.png', '$argon2i$v=19$m=65536,t=4,p=1$Yk1TUnJrN2VEalAwV2kzUA$mgq4y0ls+9KF9lD6EJxlYCK0/WC6+XcocvnVJZ/Vfg4', 'admin', 'admin', 1),
(12, 'Raichu', 1542, 'avatar_68187bb080b802.80896532.png', '$argon2i$v=19$m=65536,t=4,p=1$a1NrT1M4VmsxeHAvMS93Lg$/QUpgDQOaBxgelqEoCCe+yBjCZPHVUoBTOnhGCh5ZJA', '', 'Nicolas', 0),
(13, 'Feunard', 0, 'avatar_68187c6a3dd5c9.67000307.png', '$argon2i$v=19$m=65536,t=4,p=1$VFNrMTJ1ZEtTNGFKSzBhQg$pzK7dudlKAVFajeXS2mgx/CdVxJhYjsMC5OhjPNfB68', 'Lopez', 'Santiago', 0),
(14, 'Dracaufeu', 0, 'avatar_68187c3f9e7a33.75703301.png', '$argon2i$v=19$m=65536,t=4,p=1$SlFmVlQwLi56MHRqTUo5TQ$/4SNoSf6/DfqA5kdSOYRsRObl1KGrZ0is9ZWHpgo7vc', 'Touil', 'Icham', 0),
(15, 'Togepi', 4791, 'avatar_681877365d6837.35873376.png', '$argon2i$v=19$m=65536,t=4,p=1$VjZrSWxkRHVCTzRKbDEwRw$C5EvD+RjxYL8V9eWcsWKSFFElrrnWSoeeHkaxIZXieo', '', 'Elodie', 0),
(16, 'Noctali', 4396, 'avatar_68187a5582d270.99562903.png', '$argon2i$v=19$m=65536,t=4,p=1$QzJUZElML3NPV2tQNTlmOA$iRCffxpso9IOE5nXpDBkYd9BMv3j7jwOlnRTgUcEOf4', 'Doelsh', 'Morgane', 0),
(17, 'Pikachu', 5566, 'avatar_6818768bb06047.32677845.png', '$argon2i$v=19$m=65536,t=4,p=1$a3U0YzBDTUpvazY0VW9JcA$n9CYVNrTK5OilO4weRew86f7NsfIUdClEQGWz4jyh7M', '', 'Mohamed', 0),
(18, 'Wolf', 7554, 'avatar_6818765a9acec5.54197966.png', '$argon2i$v=19$m=65536,t=4,p=1$d3VUbzFGWXFzMXBLZE5xdA$M0H0dhc1sHulJUrxgGOpDir+bSRGyQYmFY/GzTO0EpI', '', 'Younes', 0),
(19, 'Evoli', 3402, 'avatar_68187b1d487035.45314767.png', '$argon2i$v=19$m=65536,t=4,p=1$cmxodjNaT0lzUFFLUnd6NQ$MK0D1ZZf16xoGWnGcaRNyc2eBTA4TWKZWrAJRAO9Aw4', 'Prigent', 'Alexandre', 0),
(20, 'Nymphali', 2010, 'avatar_68187b82702098.57642251.png', '$argon2i$v=19$m=65536,t=4,p=1$bFZXNjRYN3NXTVgwYWVCMw$H+AvZ1hqeAo1B8350hTofBWPPzKVOj0pQD+MDCle7/I', '', 'Anastasia', 0),
(21, 'Carapuce', 0, 'avatar_68187c300feec0.21326149.png', '$argon2i$v=19$m=65536,t=4,p=1$LndqS3k0YlMwUURTTVNFcg$5lSZ5QGGabWEScNnJeWpzeNKJyrQ9yaTM5j1Y349x5E', '', 'Farouk', 0),
(22, 'Tortank', 3460, 'avatar_68187ac49c2071.04328797.png', '$argon2i$v=19$m=65536,t=4,p=1$WE1GN09pV040bUNZVDNPVw$x6QeOkYEVKwCkX8QaS8WhlYt4GfS2fVKdkO9ETklxQc', '', 'Frederick', 0),
(23, 'Kulbutoke', 8190, 'avatar_681875fe916910.13690259.png', '$argon2i$v=19$m=65536,t=4,p=1$L3hzalBib3ZhSjdFMTFlYQ$KuKztUZ8JE3XAVy0td3dO4oICmy8l+vc3Gmr1c8+vic', '', 'Benjamin', 0),
(24, 'Rondoudou', 3661, 'avatar_68187a8fbef955.38151864.png', '$argon2i$v=19$m=65536,t=4,p=1$bGFUaVRDQzVWRU9jUkdYMw$Y8peUIwQoqfNaegqGRcNpgONTOPyJqfCxbZ+LmPtXcw', 'Falco', 'Rose', 0),
(25, 'Ronflex', 750, 'avatar_68187bd68daf55.70430390.png', '$argon2i$v=19$m=65536,t=4,p=1$eFQveGRGcGdJLkZCRmpndg$nVbnlRojX/xWl2bQkeFEd2y+aGb8xDIAKXP0Cqr9TjM', 'Clavurier', 'Guillaume', 0),
(26, 'Tygnon', 250, 'avatar_68187bfa9c9d91.38673320.png', '$argon2i$v=19$m=65536,t=4,p=1$bDUwWEIzNmRqMWpJRnh3Nw$IN4//vlaVQeJsA3LikcEr1pJziNa7hB4JSXS+3Mazio', '', 'Sarah', 0),
(27, 'Carabaffe', 0, 'avatar_68187cbc59d661.24520362.png', '$argon2i$v=19$m=65536,t=4,p=1$UFA0anJ4UlI3VmdwZk9nYw$dfxPJnM7524J5nrKTlg5+/3E/4gWGgle+E7UEKXVnmg', '', 'Yannick', 0);

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `id` int DEFAULT NULL,
  `id_joueur` int DEFAULT NULL,
  `score` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_joueur` (`id_joueur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`id_joueur`) REFERENCES `joueurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
