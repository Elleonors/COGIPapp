-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 09 Avril 2019 à 16:14
-- Version du serveur :  5.7.25-0ubuntu0.16.04.2
-- Version de PHP :  7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `COGIP`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `username` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `connexion`
--

INSERT INTO `connexion` (`username`, `pass`) VALUES
('jean-christian', 'COGIP');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `idfacture` int(10) UNSIGNED NOT NULL,
  `numero` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `prestation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`idfacture`, `numero`, `date`, `prestation`) VALUES
(1, 'FR20190001', '2019-01-02', '2019-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `societaires`
--

CREATE TABLE `societaires` (
  `idsocietaires` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telephone` int(11) NOT NULL,
  `facture_idfacture` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `societaires`
--

INSERT INTO `societaires` (`idsocietaires`, `nom`, `prenom`, `email`, `telephone`, `facture_idfacture`) VALUES
(1, 'ranu', 'jean-christian', 'jean-christian.ranu@cogip.fr', 672604825, 1);

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE `societe` (
  `idsociete` int(10) UNSIGNED NOT NULL,
  `tva` varchar(45) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `societaires_idsocietaires` int(10) UNSIGNED NOT NULL,
  `facture_idfacture` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `societe`
--

INSERT INTO `societe` (`idsociete`, `tva`, `pays`, `nom`, `societaires_idsocietaires`, `facture_idfacture`) VALUES
(1, 'FR0001', 'france', 'cogip', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `societe_has_type`
--

CREATE TABLE `societe_has_type` (
  `societe_idsociete` int(10) UNSIGNED NOT NULL,
  `type_idtype` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `societe_has_type`
--

INSERT INTO `societe_has_type` (`societe_idsociete`, `type_idtype`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `idtype` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`idtype`, `nom`) VALUES
(1, 'fournisseur'),
(2, 'client');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idfacture`);

--
-- Index pour la table `societaires`
--
ALTER TABLE `societaires`
  ADD PRIMARY KEY (`idsocietaires`),
  ADD KEY `fk_societaires_facture1_idx` (`facture_idfacture`);

--
-- Index pour la table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`idsociete`),
  ADD KEY `fk_societe_societaires_idx` (`societaires_idsocietaires`),
  ADD KEY `fk_societe_facture1_idx` (`facture_idfacture`);

--
-- Index pour la table `societe_has_type`
--
ALTER TABLE `societe_has_type`
  ADD PRIMARY KEY (`societe_idsociete`,`type_idtype`),
  ADD KEY `fk_societe_has_type_type1_idx` (`type_idtype`),
  ADD KEY `fk_societe_has_type_societe1_idx` (`societe_idsociete`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idtype`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `idfacture` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `societaires`
--
ALTER TABLE `societaires`
  MODIFY `idsocietaires` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `societe`
--
ALTER TABLE `societe`
  MODIFY `idsociete` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `idtype` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `societaires`
--
ALTER TABLE `societaires`
  ADD CONSTRAINT `fk_societaires_facture1` FOREIGN KEY (`facture_idfacture`) REFERENCES `facture` (`idfacture`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `societe`
--
ALTER TABLE `societe`
  ADD CONSTRAINT `fk_societe_facture1` FOREIGN KEY (`facture_idfacture`) REFERENCES `facture` (`idfacture`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_societe_societaires` FOREIGN KEY (`societaires_idsocietaires`) REFERENCES `societaires` (`idsocietaires`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `societe_has_type`
--
ALTER TABLE `societe_has_type`
  ADD CONSTRAINT `fk_societe_has_type_societe1` FOREIGN KEY (`societe_idsociete`) REFERENCES `societe` (`idsociete`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_societe_has_type_type1` FOREIGN KEY (`type_idtype`) REFERENCES `type` (`idtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
