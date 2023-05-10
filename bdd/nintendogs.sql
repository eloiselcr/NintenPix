-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 10 mai 2023 à 05:34
-- Version du serveur : 10.5.18-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nintendogs`
--

-- --------------------------------------------------------

--
-- Structure de la table `Animaux`
--

CREATE TABLE `Animaux` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `idRaces` int(11) NOT NULL,
  `idTerrains` int(11) NOT NULL,
  `Sante` int(11) NOT NULL,
  `Bonheur` int(11) NOT NULL,
  `Proprete` int(11) NOT NULL,
  `Faim` int(11) NOT NULL,
  `idUtilisateurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Animaux`
--

INSERT INTO `Animaux` (`id`, `nom`, `idRaces`, `idTerrains`, `Sante`, `Bonheur`, `Proprete`, `Faim`, `idUtilisateurs`) VALUES
(4, 'Joris', 10, 2, 50, 80, 50, 20, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Races`
--

CREATE TABLE `Races` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Races`
--

INSERT INTO `Races` (`id`, `nom`, `img`) VALUES
(1, 'Grey1', '../ressources/races/grey1bg.png'),
(2, 'Brown1', '../ressources/races/brown1bg.png'),
(3, 'Brown2', '../ressources/races/brown2bg.png'),
(4, 'Grey2', '../ressources/races/grey2bg.png'),
(5, 'Grey3', '../ressources/races/grey3bg.png\r\n'),
(6, 'Golden', '../ressources/races/goldenbg.png'),
(7, 'Husky', '../ressources/races/huskybg.png'),
(8, 'Rox', '../ressources/races/roxbg.png'),
(9, 'Sunny', '../ressources/races/sunnybg.png'),
(10, 'War', '../ressources/races/warbg.png'),
(11, 'White1', '../ressources/races/white1bg.png'),
(12, 'White2', '../ressources/races/white2bg.png');

-- --------------------------------------------------------

--
-- Structure de la table `Terrains`
--

CREATE TABLE `Terrains` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Terrains`
--

INSERT INTO `Terrains` (`id`, `nom`, `img`) VALUES
(1, 'Waterfalls', '../ressources/terrains/waterfalls.mov'),
(2, 'Jungle', '../ressources/terrains/jungle.mov');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`id`, `login`, `password`) VALUES
(3, 'Zack', '56681010b753e1abe52c449d0aab291b28f1808a3a91b6baeaa726883baad4b0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Animaux`
--
ALTER TABLE `Animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRace` (`idRaces`),
  ADD KEY `idTerrains` (`idTerrains`),
  ADD KEY `idUtilisateurs` (`idUtilisateurs`);

--
-- Index pour la table `Races`
--
ALTER TABLE `Races`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Terrains`
--
ALTER TABLE `Terrains`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Animaux`
--
ALTER TABLE `Animaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Races`
--
ALTER TABLE `Races`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `Terrains`
--
ALTER TABLE `Terrains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Animaux`
--
ALTER TABLE `Animaux`
  ADD CONSTRAINT `Animaux_ibfk_1` FOREIGN KEY (`idUtilisateurs`) REFERENCES `Utilisateurs` (`id`),
  ADD CONSTRAINT `Animaux_ibfk_2` FOREIGN KEY (`idRaces`) REFERENCES `Races` (`id`),
  ADD CONSTRAINT `Animaux_ibfk_3` FOREIGN KEY (`idTerrains`) REFERENCES `Terrains` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
