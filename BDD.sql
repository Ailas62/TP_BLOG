-- 
-- Base de données: `db510666784`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `articles`
-- 

CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date` int(11) NOT NULL,
  `tags_id` int(33) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tags_id` (`tags_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

-- 
-- Contenu de la table `articles`
-- 

INSERT INTO `articles` VALUES (27, 'ezfgqezdqz', 'gqz', 1382362451, 1);
INSERT INTO `articles` VALUES (53, 'test1', 'test1', 1390784827, 5);
INSERT INTO `articles` VALUES (55, 'test2', 'test2', 1390786664, 14);

-- --------------------------------------------------------

-- 
-- Structure de la table `tags`
-- 

CREATE TABLE `tags` (
  `id` int(33) NOT NULL AUTO_INCREMENT,
  `tag` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- 
-- Contenu de la table `tags`
-- 

INSERT INTO `tags` VALUES (1, 'Aucun');
INSERT INTO `tags` VALUES (5, 'test1');
INSERT INTO `tags` VALUES (14, 'informatique');

-- --------------------------------------------------------

-- 
-- Structure de la table `utilisateur`
-- 

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Contenu de la table `utilisateur`
-- 

INSERT INTO `utilisateur` VALUES (3, 'test@test.test', 'test', 'e064392fffc9c43acc31ddb9d51fe739');

-- 
-- Contraintes pour les tables exportées
-- 

-- 
-- Contraintes pour la table `articles`
-- 
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`);
