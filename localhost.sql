
-- Base de données: `sondage`
-- 
CREATE DATABASE `sondage` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sondage`;

-- --------------------------------------------------------

-- 
-- Structure de la table `films`
-- 

CREATE TABLE `films` (
  `visa` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `nom_realisateur` varchar(30) NOT NULL,
  `annee_sortie` int(11) NOT NULL,
  PRIMARY KEY  (`visa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `films`
-- 

INSERT INTO `films` (`visa`, `titre`, `nom_realisateur`, `annee_sortie`) VALUES (231354, 'La Cite de la Peur', 'Les Nuls', 1994),
(545421, 'Kill Bill : Volume 1', 'Quentin Tarantino', 2003),
(545645, 'Kill Bill : Volume 2', 'Quentin Tarantino', 2004);

-- --------------------------------------------------------

-- 
-- Structure de la table `salles`
-- 

CREATE TABLE `salles` (
  `nom` varchar(30) NOT NULL,
  `visa` int(11) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `heure` time NOT NULL,
  PRIMARY KEY  (`nom`),
  KEY `visa` (`visa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `salles`
-- 

INSERT INTO `salles` (`nom`, `visa`, `adresse`, `heure`) VALUES ('ugc cine cite', 231354, 'La Defense', '15:35:00'),
('ugc george v', 545421, 'Paris', '12:00:00'),
('ugc mondeville', 545645, 'Mondeville', '11:25:00');

-- --------------------------------------------------------

-- 
-- Structure de la table `sondage`
-- 

CREATE TABLE `sondage` (
  `numero` int(11) NOT NULL,
  `visa` int(11) NOT NULL,
  `avis` varchar(100) NOT NULL,
  PRIMARY KEY  (`numero`,`visa`),
  KEY `visa` (`visa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `sondage`
-- 

INSERT INTO `sondage` (`numero`, `visa`, `avis`) VALUES (1, 231354, 'Bien'),
(2, 545421, 'Moyen'),
(3, 545645, 'Nul');

-- --------------------------------------------------------

-- 
-- Structure de la table `spectateurs`
-- 

CREATE TABLE `spectateurs` (
  `numero` int(11) NOT NULL auto_increment,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `date_naissance` date NOT NULL,
  `csp` char(30) NOT NULL,
  PRIMARY KEY  (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Contenu de la table `spectateurs`
-- 

INSERT INTO `spectateurs` (`numero`, `nom`, `prenom`, `adresse`, `telephone`, `date_naissance`, `csp`) VALUES (1, 'Martin', 'Pierre', '1 rue Jean Sans Peur', '0123456789', '1979-03-17', 'Employe'),
(2, 'Dupont', 'Jacques', '12 rue de la Sorbonne', '0329374528', '1970-01-12', 'Prof. Lib.'),
(3, 'Martin', 'Nicolas', '1 avenue Verte', '0672520374', '1973-01-17', 'Artisan'),
(4, 'Guionnet', 'Josselin', '23 rue de la Glaciere', '0147844456', '1989-07-19', 'Prof. Lib.'),
(5, 'Low-Renaud', 'Damien', '36 rue de la Boustifaille', '0856696969', '1987-09-29', 'Artisan');

-- 
-- Contraintes pour les tables exportées
-- 

-- 
-- Contraintes pour la table `salles`
-- 
ALTER TABLE `salles`
  ADD CONSTRAINT `salles_ibfk_1` FOREIGN KEY (`visa`) REFERENCES `films` (`visa`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Contraintes pour la table `sondage`
-- 
ALTER TABLE `sondage`
  ADD CONSTRAINT `sondage_ibfk_2` FOREIGN KEY (`visa`) REFERENCES `films` (`visa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sondage_ibfk_1` FOREIGN KEY (`numero`) REFERENCES `spectateurs` (`numero`) ON DELETE CASCADE ON UPDATE CASCADE;
