-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 18 jan. 2019 à 14:15
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `TDW`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Universitaires'),
(2, 'Professionnelles'),
(3, 'Secondaires'),
(4, 'Moyennes'),
(5, 'Primaires'),
(6, 'Maternelles');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `userid` int(11) NOT NULL,
  `ecoleid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `ecoleid` (`ecoleid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `message`, `userid`, `ecoleid`) VALUES
(1, 'Cest une tres bonnes ecole, formations tres interessantes ', 1, 1),
(2, 'Cest un peu chere par rapport aux formations proposees', 1, 1),
(3, 'Jaimerai avoir plus d\'informations sil vous plait', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `wilaya` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `wilaya` (`wilaya`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`id`, `nom`, `wilaya`) VALUES
(1, 'Dar-El-Beida', 16),
(2, 'Cherchell', 42),
(3, 'Lakhdaria', 10),
(4, 'Tenes', 2),
(5, 'Ain-El-Turk', 31),
(6, 'Hussein-Dey', 16),
(7, 'Cheraga', 16),
(8, 'Ibn-Badis', 25),
(9, 'Soumaa', 9),
(10, 'El-Eulma', 19),
(11, 'Akbou', 6),
(12, 'Freha', 15),
(13, 'Oued Smar', 16),
(14, 'Boumerdes(centre', 35),
(15, 'Es-Senia', 31),
(16, 'Djamaa ', 39),
(17, 'Rouiba', 16),
(18, 'Saoura', 8),
(19, 'Mansoura', 27),
(20, 'Hennaya', 13);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE IF NOT EXISTS `domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id`, `nom`) VALUES
(1, 'Commerce et finance'),
(2, 'Electronique'),
(3, 'Informatique'),
(4, 'Agronomie'),
(5, 'Veternaire'),
(6, 'Hotellerie'),
(7, 'Plomberie'),
(8, 'Mecanique'),
(9, 'Batiment');

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

DROP TABLE IF EXISTS `ecole`;
CREATE TABLE IF NOT EXISTS `ecole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `categorie` int(11) NOT NULL,
  `commune` int(11) NOT NULL,
  `domaine` int(11) DEFAULT NULL,
  `lienAdmin` text,
  `actif` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `categorie` (`categorie`),
  KEY `domaine` (`domaine`),
  KEY `commune` (`commune`)
) ENGINE=MyISAM AUTO_INCREMENT=987681 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`id`, `nom`, `tel`, `adresse`, `fax`, `categorie`, `commune`, `domaine`, `lienAdmin`, `actif`) VALUES
(1, 'Ecole Superieure de Commerce ', ' 031562570 ', '50 Rue des martyrs', '031 56 30 50', 1, 15, 1, 'http://localhost/Tesla/Admin/admin.php', 1),
(2, 'Institut dHotellerie et de Restauration', '021562570', '0 Rue des martyrs', '031 56 30 50', 2, 12, 6, NULL, 1),
(987660, 'Institue des metiers de plomberie et chauffage ', ' 021 56 25 70 ', '50 Rue de la liberté', '021563050', 2, 10, 7, 'http://localhost/Tesla/Admin/admin.php', 1),
(987659, 'Institue Superieure de commerce', '032 56 25 70 ', ' 20 Rue de la montagne', ' 032 56 30 50 ', 1, 11, 1, 'http://localhost/Tesla/Admin/admin.php', 1),
(987658, 'Ecole Superieure Veterinaire', ' 025 56 25 70 ', ' 10 Rue des oliviers', ' 025 56 30 50 ', 1, 12, 5, NULL, 1),
(987657, 'Ecole Superieure d\'Agronomie', ' 026 56 25 70 ', ' 30 Rue des dunes', '026 56 30 50 ', 1, 16, 4, 'http://localhost/Tesla/Admin/admin.php', 1),
(987656, 'Ecole Superieure d\'Informatique', '023 56 25 70', '68 rue de la gare', '023 56 30 50 ', 1, 13, 3, 'http://localhost/Tesla/Admin/admin.php', 1),
(987655, 'Ecole Superieure d\'electronique', ' 035 56 25 70 ', '3500 Rue de la liberté', ' 035 56 30 50', 1, 14, 2, 'http://localhost/Tesla/Admin/admin.php', 1),
(987661, 'Institue de mecanique', ' 021 56 25 70 ', '50 Rue de la gare', ' 021 56 30 50 ', 2, 9, 8, 'http://localhost/Tesla/Admin/admin.php', 1),
(987662, 'Institue dhygiene et securite', '021 56 25 7', ' 50 Rue des dunes', ' 021 56 30 50 ', 2, 17, 1, NULL, 1),
(987663, 'Institue des metiers du betiments ', ' 021 56 25 70 ', ' 50 Rue des oliviers', ' 021 56 30 50', 2, 18, 9, 'http://localhost/Tesla/Admin/admin.php', 1),
(987664, 'Ecole El-Falah', ' 021 56 25 70 ', ' 50 Rue de la liberté', ' 021 56 30 50 ', 3, 19, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987665, 'Ecole El-Nadjah ', ' 021 56 25 70 ', ' 50 Rue des martyrs', '021 56 30 50 ', 3, 8, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987666, 'Ecole Les glycines ', ' 021 56 25 70 ', '50 Rue de la gare', '021 56 30 50 ', 3, 7, NULL, NULL, 1),
(987667, 'Ecole Madrassati ', ' 021 56 25 70 ', ' 50 Rue des oliviers', ' 021 56 30 50 ', 3, 6, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987668, 'Ecole El-Fath ', ' 021 56 25 70 ', ' 50 Rue des dunes', ' 021 56 30 50 ', 3, 20, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987669, 'Ecole Madrassatii', ' 021 56 25 70 ', '50 Rue de la gare', '021 56 30 50 ', 4, 6, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987671, 'Ecole Les ecoliers ', ' 021 56 25 70 ', ' 50 Rue de la liberté', ' 021 56 30 50 ', 4, 5, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987672, 'Ecole El-Nadjihine ', ' 021 56 25 70', ' 50 Rue des dunes', ' 021 56 30 50 ', 5, 3, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987673, 'Ecole-El-Nadjah ', ' 021 56 25 70 ', '50 Rue de la liberté', ' 021 56 30 50 ', 5, 8, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987674, 'Ecole El-oumma ', '021 56 25 70 ', '50 Rue dses martyrs', ' 021 56 30 50 ', 5, 2, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987675, 'Ecole Les Poussins', ' 021 56 25 70 ', '50 Rue de la liberté', ' 021 56 30 50 ', 6, 1, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987676, 'Ecole-Les Poussins', ' 021 56 25 70 ', '50 Rue de la liberté', ' 021 56 30 50 ', 6, 1, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987677, 'Ecole--Madrassati', ' 021 56 25 70 ', '50 Rue des martyrs', ' 021 56 30 50', 6, 6, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987678, 'Ecole El Nadjah ', ' 021 56 25 70 ', '50 Rue des oliviers', ' 021 56 30 50', 6, 8, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987679, 'Ecole El Nadjaah ', ' 021 56 25 70 ', '50 Rue des oliviers', ' 021 56 30 50', 6, 8, NULL, 'http://localhost/Tesla/Admin/admin.php', 1),
(987680, 'Ecole El Oumma ', ' 021 56 25 70 ', '50 Rue des dunes', ' 021 56 30 50 ', 6, 2, NULL, 'http://localhost/Tesla/Admin/admin.php', 1);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `typeformationId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `typeformationId` (`typeformationId`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `nom`, `typeformationId`) VALUES
(15, 'Anglais', 3),
(8, 'Word', 25),
(16, 'Allemand', 3),
(12, 'Francais', 3),
(17, 'Movie Maker', 2),
(18, 'Excel', 25),
(22, 'FrontEnd', 31),
(20, 'Processus Planification', 4),
(21, 'Android', 30);

-- --------------------------------------------------------

--
-- Structure de la table `superadmin`
--

DROP TABLE IF EXISTS `superadmin`;
CREATE TABLE IF NOT EXISTS `superadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) NOT NULL,
  `password` char(255) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

DROP TABLE IF EXISTS `type_formation`;
CREATE TABLE IF NOT EXISTS `type_formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `volumeHorraire` int(11) DEFAULT NULL,
  `prixht` double DEFAULT NULL,
  `taux` double DEFAULT NULL,
  `ecoleid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ecoleid` (`ecoleid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_formation`
--

INSERT INTO `type_formation` (`id`, `nom`, `volumeHorraire`, `prixht`, `taux`, `ecoleid`) VALUES
(25, 'Bureautique', 12, 12000, 17, 1),
(2, 'Infographie', 24, 15000, 0, 1),
(3, 'Langues', 10, 12000, 0, 1),
(4, 'Management', 12, 22000, 19, 2),
(31, 'Web', 20, 22000, 17, 1),
(30, 'Mobile', 20, 35000, 19, 2),
(32, 'Test', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(255) NOT NULL,
  `actif` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `actif`) VALUES
(1, 'user', '12dea96fec20593566ab75692c9949596833adc9', 0);

-- --------------------------------------------------------

--
-- Structure de la table `wilaya`
--

DROP TABLE IF EXISTS `wilaya`;
CREATE TABLE IF NOT EXISTS `wilaya` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `wilaya`
--

INSERT INTO `wilaya` (`id`, `nom`) VALUES
(1, 'Adrar'),
(2, 'Chlef'),
(6, 'Bejaia'),
(9, 'Blida'),
(10, 'Bouira'),
(15, 'Tizi-ouzou'),
(16, 'Alger'),
(19, 'Setif'),
(25, 'Constantine'),
(31, 'Oran'),
(35, 'Boumerdes'),
(42, 'Tipaza'),
(39, 'El Oued'),
(8, 'Bechar'),
(27, 'Mostaganem'),
(13, 'Telemcen');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
