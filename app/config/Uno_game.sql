DROP DATABASE IF EXISTS Uno_game;
CREATE DATABASE Uno_game;
USE Uno_game;
CREATE TABLE `joueurs` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255),
  `scoreTotal` int,
  `imgProfil` varchar(255),
  `password` varchar(255),
  `nom` varchar(255),
  `prenom` varchar(255),
   `isAdmin` BOOLEAN
);

CREATE TABLE `partie` (
  `id` int UNIQUE,
  `id_joueur` int,
  `score` int
);

ALTER TABLE `partie` ADD FOREIGN KEY (`id_joueur`) REFERENCES `joueurs` (`id`);

INSERT INTO joueurs (id, pseudo, scoreTotal, imgProfil, password, nom, prenom, isAdmin) VALUES (1, 'admin', 0, 'https://cdn-icons-png.flaticon.com/512/149/149071.png', '$argon2i$v=19$m=65536,t=4,p=1$Yk1TUnJrN2VEalAwV2kzUA$mgq4y0ls+9KF9lD6EJxlYCK0/WC6+XcocvnVJZ/Vfg4', 'admin', 'admin', TRUE);
