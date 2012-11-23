-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 23 Novembre 2012 à 21:09
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `intranet`
--

-- --------------------------------------------------------

--
-- Structure de la table `acls`
--

CREATE TABLE IF NOT EXISTS `acls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_auth` int(11) NOT NULL,
  `types_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1128 ;

--
-- Contenu de la table `acls`
--

INSERT INTO `acls` (`id`, `controller`, `action`, `is_auth`, `types_user_id`) VALUES
(1126, 'sections', 'edit', 0, 4),
(1100, 'sections', 'erase', 1, 1),
(1099, 'sections', 'edit', 1, 1),
(1098, 'sections', 'index', 1, 1),
(1097, 'sections', 'add', 1, 1),
(1096, 'users_types', 'erase', 1, 1),
(1095, 'users_types', 'edit', 1, 1),
(1094, 'users_types', 'index', 1, 1),
(1093, 'users_types', 'add', 1, 1),
(1092, 'users', 'view_profil', 1, 1),
(1091, 'users', 'upload', 1, 1),
(1090, 'users', 'publish', 1, 1),
(1069, 'sections', 'add', 0, 2),
(1068, 'users_types', 'erase', 0, 2),
(1067, 'users_types', 'edit', 0, 2),
(1066, 'users_types', 'index', 0, 2),
(1065, 'users_types', 'add', 0, 2),
(1064, 'users', 'view_profil', 1, 2),
(1063, 'users', 'upload', 0, 2),
(1062, 'users', 'publish', 0, 2),
(1061, 'users', 'erase', 1, 2),
(1060, 'users', 'edit', 1, 2),
(1040, 'users_types', 'erase', 0, 3),
(1039, 'users_types', 'edit', 0, 3),
(1038, 'users_types', 'index', 0, 3),
(1037, 'users_types', 'add', 0, 3),
(1036, 'users', 'upload', 0, 3),
(1035, 'users', 'publish', 0, 3),
(1034, 'users', 'erase', 0, 3),
(1033, 'users', 'edit', 0, 3),
(1032, 'users', 'liste', 0, 3),
(1031, 'users', 'add', 0, 3),
(1030, 'commentaires', 'publish', 1, 3),
(1125, 'sections', 'index', 0, 4),
(1124, 'sections', 'add', 0, 4),
(1123, 'users_types', 'erase', 0, 4),
(1122, 'users_types', 'edit', 0, 4),
(1121, 'users_types', 'index', 0, 4),
(1120, 'users_types', 'add', 0, 4),
(1119, 'users', 'upload', 0, 4),
(1118, 'users', 'publish', 0, 4),
(1117, 'users', 'erase', 0, 4),
(1116, 'users', 'edit', 0, 4),
(1115, 'users', 'liste', 0, 4),
(1114, 'users', 'add', 0, 4),
(1113, 'commentaires', 'publish', 0, 4),
(1059, 'users', 'liste', 1, 2),
(1058, 'users', 'add', 1, 2),
(1057, 'commentaires', 'publish', 1, 2),
(1056, 'commentaires', 'erase', 1, 2),
(1055, 'commentaires', 'edit', 1, 2),
(1089, 'users', 'erase', 1, 1),
(1088, 'users', 'edit', 1, 1),
(1087, 'users', 'liste', 1, 1),
(1029, 'commentaires', 'erase', 1, 3),
(1028, 'commentaires', 'edit', 1, 3),
(1054, 'commentaires', 'index', 1, 2),
(1053, 'articles', 'publish', 1, 2),
(1052, 'articles', 'erase', 1, 2),
(1050, 'articles', 'liste', 1, 2),
(1051, 'articles', 'edit', 1, 2),
(1048, 'categories', 'erase', 1, 2),
(1086, 'users', 'add', 1, 1),
(1085, 'commentaires', 'publish', 1, 1),
(1084, 'commentaires', 'erase', 1, 1),
(1083, 'commentaires', 'edit', 1, 1),
(1082, 'commentaires', 'index', 1, 1),
(1081, 'articles', 'publish', 1, 1),
(1080, 'articles', 'erase', 1, 1),
(1079, 'articles', 'edit', 1, 1),
(1112, 'commentaires', 'erase', 0, 4),
(1111, 'commentaires', 'edit', 0, 4),
(1110, 'commentaires', 'index', 0, 4),
(1109, 'articles', 'publish', 0, 4),
(1078, 'articles', 'liste', 1, 1),
(1077, 'articles', 'add', 1, 1),
(1076, 'categories', 'erase', 1, 1),
(1074, 'categories', 'index', 1, 1),
(1049, 'articles', 'add', 1, 2),
(1027, 'commentaires', 'index', 1, 3),
(1026, 'articles', 'publish', 1, 3),
(1025, 'articles', 'erase', 1, 3),
(1024, 'articles', 'edit', 1, 3),
(1108, 'articles', 'erase', 0, 4),
(1107, 'articles', 'edit', 0, 4),
(1106, 'articles', 'liste', 0, 4),
(1105, 'articles', 'add', 0, 4),
(1104, 'categories', 'erase', 0, 4),
(1103, 'categories', 'edit', 0, 4),
(1075, 'categories', 'edit', 1, 1),
(1073, 'categories', 'add', 1, 1),
(1127, 'sections', 'erase', 0, 4),
(1072, 'sections', 'erase', 0, 2),
(1071, 'sections', 'edit', 0, 2),
(1070, 'sections', 'index', 0, 2),
(1044, 'sections', 'erase', 0, 3),
(1043, 'sections', 'edit', 0, 3),
(1042, 'sections', 'index', 0, 3),
(1041, 'sections', 'add', 0, 3),
(1102, 'categories', 'index', 0, 4),
(1101, 'categories', 'add', 0, 4),
(1047, 'categories', 'edit', 1, 2),
(1046, 'categories', 'index', 1, 2),
(1045, 'categories', 'add', 1, 2),
(1023, 'articles', 'liste', 1, 3),
(1022, 'articles', 'add', 1, 3),
(1021, 'categories', 'erase', 0, 3),
(1020, 'categories', 'edit', 0, 3),
(1019, 'categories', 'index', 0, 3),
(1018, 'categories', 'add', 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chapeau` text COLLATE utf8_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  `articles_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `chapeau`, `contenu`, `created`, `created_by`, `modified`, `modified_by`, `online`, `articles_type_id`) VALUES
(1, 'CKeditor', '<p>\r\n	<img alt="" height="89" src="http://a.cksource.com/e/1/img/logo-ckeditor-h100.png" width="246" /></p>\r\n<p>\r\n	Petite pr&eacute;sentation du <acronym title="What you see is what you get">WYSIWYG </acronym>CKeditor.</p>\r\n', '<p style="text-align: center;">\r\n	<img alt="" src="http://a.cksource.com/e/1/img/logo-ckeditor-h100.png" style="width: 273px; height: 100px;" /></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<em>CKEditor</em> est un &eacute;diteur de texte pouvant &ecirc;tre utilis&eacute; &agrave; l&#39;int&eacute;rieur d&#39;une page web. C&rsquo;est un &eacute;diteur <acronym title="What you see is what you get">WYSIWYG</acronym>, ce qui signifie que le texte qui y est &eacute;dit&eacute; ressemble le plus possible au r&eacute;sultat que l&rsquo;utilisateur aura lorsqu&rsquo;il le publiera. Il apporte sur le web de nombreuses fonctionnalit&eacute;s identiques &agrave; celles que l&rsquo;on peut trouver sur des applications d&rsquo;&eacute;dition tels que <a href="http://microsoft.entelechargement.com/">Microsoft Word</a> ou <a href="http://fr.openoffice.org/">OpenOffice</a>. <em>CKEditor</em> permet de faciliter la mise en forme des messages de vos utilisateurs (pour les commentaires ou les forums) sans devoir utiliser de <acronym title="Bulletin Board Code">BBCode</acronym>.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="http://www.tutorielsenfolie.com/articles/img/image_CKEditor_basic.jpeg" style="width: 400px; height: 166px;" /></p>\r\n', '2012-11-04', 1, '2012-11-23', 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `articles_types`
--

CREATE TABLE IF NOT EXISTS `articles_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `articles_types`
--

INSERT INTO `articles_types` (`id`, `name`) VALUES
(1, 'Événements'),
(2, 'Actualité'),
(3, 'Réunions');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  `online` int(11) NOT NULL DEFAULT '0',
  `color` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `contenu`, `created`, `created_by`, `modified`, `modified_by`, `articles_id`, `online`, `color`) VALUES
(1, 'Ceci est un commentaire posté par un administrateur  !', '2012-11-04', 1, '2012-11-04', 1, 1, 1, 'admin'),
(2, 'Ceci est un commentaire posté par un modérateur !', '2012-11-04', 2, '2012-11-04', 1, 1, 1, 'moder'),
(3, 'Ceci est un commentaire posté par un professeur !', '2012-11-04', 3, '2012-11-23', 1, 1, 1, 'profe'),
(4, 'Ceci est un commentaire posté par un élève !', '2012-11-04', 4, '2012-11-23', 1, 1, 1, 'eleve');

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `sections`
--

INSERT INTO `sections` (`id`, `name`) VALUES
(1, 'Administrateur'),
(2, 'Professeur');

-- --------------------------------------------------------

--
-- Structure de la table `sexes_users`
--

CREATE TABLE IF NOT EXISTS `sexes_users` (
  `id` int(11) NOT NULL,
  `sexe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sexes_users`
--

INSERT INTO `sexes_users` (`id`, `sexe`) VALUES
(0, 'Homme'),
(1, 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `types_users`
--

CREATE TABLE IF NOT EXISTS `types_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `types_users`
--

INSERT INTO `types_users` (`id`, `name`, `color`) VALUES
(1, 'Administrateur', 'admin'),
(2, 'Modérateur', 'moder'),
(3, 'Professeur', 'profe'),
(4, 'Élève', 'eleve');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` int(11) NOT NULL,
  `is_auth` int(11) NOT NULL DEFAULT '1',
  `role` int(11) NOT NULL,
  `folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `password`, `adresse`, `tel`, `sexe`, `is_auth`, `role`, `folder`, `section_id`) VALUES
(1, 'Dupond', 'Martin', 'admin@gmx.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', '32 rue des Eglantines, 34070 Montpellier', '0234569871', 0, 1, 1, 'martin_dupond_50afe1dd08c2a', 1),
(2, 'Dubois', 'Jean', 'moderateur@gmx.fr', 'f1b9f75822c22f1e7e3f3f91aabfbcd795027963', '1 rue de la République, 34000 Montpellier', '0123456789', 0, 1, 2, 'jean_dubois_50afe1dabf54b', 1),
(3, 'Delmas', 'Pierre', 'prof@gmx.fr', 'd9f02d46be016f1b301f7c02a4b9c4ebe0dde7ef', '35 rue Broca, 34000 Montpellier', '0123456789', 0, 1, 3, 'pierre_delmas_50afe1d85d517', 2),
(4, 'Cassan', 'Sébastien', 'eleve@gmx.fr', '0e9a7fdc4821370a252df21582a4a656e81e0687', '3 place de la République, 34000 Montpellier', '0123456789', 0, 1, 4, 'sebastien_cassan_50afe1f394697', 2);
