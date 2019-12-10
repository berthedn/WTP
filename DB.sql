-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 22 Novembre 2019 à 01:13
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `confirmkey` varchar(255) NOT NULL,
  `confirme` int(1) NOT NULL,
  `connect` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`, `confirmkey`, `confirme`, `connect`) VALUES
(1, 'damien', 'dberthenet@hotmail.fr', 'cd0c42419ad0a66aaadb9ce4e70a1b8f1f8acf91', '82099037537949', 1, 0),
(2, 'ok', 'ok@h.fr', 'cd0c42419ad0a66aaadb9ce4e70a1b8f1f8acf91', '63366237398629', 1, 0),
(3, 'damdam', 'ok@ok.fr', 'cd0c42419ad0a66aaadb9ce4e70a1b8f1f8acf91', '', 1, 0),
(4, 'damdam', 'okok@ok.fr', 'cd0c42419ad0a66aaadb9ce4e70a1b8f1f8acf91', '', 1, 0),
(5, 'ok', 'ok@h2.fr', '7a85f4764bbd6daf1c3545efbbf0f279a6dc0beb', '', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Spot`
--

CREATE TABLE `Spot` (
  `id` int(11) NOT NULL,
  `Spot` varchar(15) NOT NULL,
  `Longi` varchar(10) NOT NULL,
  `Lat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Spot`
--

INSERT INTO `Spot` (`id`, `Spot`, `Longi`, `Lat`) VALUES
(1, 'Villeurbanne', '4.8833', '45.7667'),
(2, 'Bron', '4.9167', '45.7333'),
(3, 'Cincinnati', '-84.512019', '39.1031182');

-- --------------------------------------------------------

--
-- Structure de la table `SpotDejaAjoute`
--

CREATE TABLE `SpotDejaAjoute` (
  `numero` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `SpotDejaAjoute`
--

INSERT INTO `SpotDejaAjoute` (`numero`, `image`) VALUES
(2, 'polyenco_logo_officiel.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Spot`
--
ALTER TABLE `Spot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Spot`
--
ALTER TABLE `Spot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;