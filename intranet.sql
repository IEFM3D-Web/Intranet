-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 04 Novembre 2012 à 15:16
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=195 ;

--
-- Contenu de la table `acls`
--

INSERT INTO `acls` (`id`, `controller`, `action`, `is_auth`, `types_user_id`) VALUES
(169, 'users', 'view_profil', 1, 1),
(168, 'users', 'erase', 1, 1),
(167, 'users', 'edit', 1, 1),
(166, 'users', 'liste', 1, 1),
(165, 'users', 'add', 1, 1),
(164, 'commentaires', 'publish', 1, 1),
(163, 'commentaires', 'erase', 1, 1),
(162, 'commentaires', 'edit', 1, 1),
(161, 'commentaires', 'index', 1, 1),
(160, 'articles', 'publish', 1, 1),
(159, 'articles', 'erase', 1, 1),
(158, 'articles', 'edit', 1, 1),
(157, 'articles', 'liste', 1, 1),
(156, 'articles', 'add', 1, 1),
(155, 'categories', 'erase', 1, 1),
(154, 'categories', 'edit', 1, 1),
(153, 'categories', 'index', 1, 1),
(152, 'categories', 'add', 1, 1),
(142, 'commentaires', 'publish', 1, 2),
(141, 'commentaires', 'erase', 1, 2),
(140, 'commentaires', 'edit', 1, 2),
(139, 'commentaires', 'index', 1, 2),
(138, 'articles', 'publish', 1, 2),
(137, 'articles', 'erase', 1, 2),
(136, 'articles', 'edit', 1, 2),
(135, 'articles', 'liste', 1, 2),
(134, 'articles', 'add', 1, 2),
(133, 'categories', 'erase', 1, 2),
(132, 'categories', 'edit', 1, 2),
(131, 'categories', 'index', 1, 2),
(130, 'categories', 'add', 1, 2),
(190, 'users', 'erase', 0, 3),
(189, 'users', 'edit', 0, 3),
(188, 'users', 'liste', 0, 3),
(187, 'users', 'add', 0, 3),
(186, 'commentaires', 'publish', 1, 3),
(185, 'commentaires', 'erase', 1, 3),
(184, 'commentaires', 'edit', 1, 3),
(183, 'commentaires', 'index', 1, 3),
(182, 'articles', 'publish', 1, 3),
(181, 'articles', 'erase', 1, 3),
(180, 'articles', 'edit', 1, 3),
(179, 'articles', 'liste', 1, 3),
(178, 'articles', 'add', 1, 3),
(177, 'categories', 'erase', 0, 3),
(176, 'categories', 'edit', 0, 3),
(175, 'categories', 'index', 0, 3),
(174, 'categories', 'add', 0, 3),
(109, 'categories', 'add', 0, 4),
(110, 'categories', 'index', 0, 4),
(111, 'categories', 'edit', 0, 4),
(112, 'categories', 'erase', 0, 4),
(113, 'articles', 'add', 0, 4),
(114, 'articles', 'liste', 1, 4),
(115, 'articles', 'edit', 0, 4),
(116, 'articles', 'erase', 0, 4),
(117, 'articles', 'publish', 0, 4),
(118, 'commentaires', 'index', 0, 4),
(119, 'commentaires', 'edit', 0, 4),
(120, 'commentaires', 'erase', 0, 4),
(121, 'commentaires', 'publish', 0, 4),
(122, 'users', 'add', 0, 4),
(123, 'users', 'liste', 0, 4),
(124, 'users', 'edit', 0, 4),
(125, 'users', 'erase', 0, 4),
(126, 'users_types', 'add', 0, 4),
(127, 'users_types', 'index', 0, 4),
(128, 'users_types', 'edit', 0, 4),
(129, 'users_types', 'erase', 0, 4),
(143, 'users', 'add', 1, 2),
(144, 'users', 'liste', 1, 2),
(145, 'users', 'edit', 1, 2),
(146, 'users', 'erase', 1, 2),
(147, 'users', 'view_profil', 1, 2),
(148, 'users_types', 'add', 0, 2),
(149, 'users_types', 'index', 0, 2),
(150, 'users_types', 'edit', 0, 2),
(151, 'users_types', 'erase', 0, 2),
(170, 'users_types', 'add', 1, 1),
(171, 'users_types', 'index', 1, 1),
(172, 'users_types', 'edit', 1, 1),
(173, 'users_types', 'erase', 1, 1),
(191, 'users_types', 'add', 0, 3),
(192, 'users_types', 'index', 0, 3),
(193, 'users_types', 'edit', 0, 3),
(194, 'users_types', 'erase', 0, 3);

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
(1, 'CKeditor', '<p>\r\n	<img alt="" height="89" src="http://a.cksource.com/e/1/img/logo-ckeditor-h100.png" width="246" /></p>\r\n<p>\r\n	Petite pr&eacute;sentation du <acronym title="What you see is what you get">WYSIWYG </acronym>CKeditor.</p>\r\n', '<p style="text-align: center;">\r\n	<img alt="" src="http://a.cksource.com/e/1/img/logo-ckeditor-h100.png" style="width: 273px; height: 100px;" /></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<em>CKEditor</em> est un &eacute;diteur de texte pouvant &ecirc;tre utilis&eacute; &agrave; l&#39;int&eacute;rieur d&#39;une page web. C&rsquo;est un &eacute;diteur <acronym title="What you see is what you get">WYSIWYG</acronym>, ce qui signifie que le texte qui y est &eacute;dit&eacute; ressemble le plus possible au r&eacute;sultat que l&rsquo;utilisateur aura lorsqu&rsquo;il le publiera. Il apporte sur le web de nombreuses fonctionnalit&eacute;s identiques &agrave; celles que l&rsquo;on peut trouver sur des applications d&rsquo;&eacute;dition tels que <a href="http://microsoft.entelechargement.com/">Microsoft Word</a> ou <a href="http://fr.openoffice.org/">OpenOffice</a>. <em>CKEditor</em> permet de faciliter la mise en forme des messages de vos utilisateurs (pour les commentaires ou les forums) sans devoir utiliser de <acronym title="Bulletin Board Code">BBCode</acronym>.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="http://www.tutorielsenfolie.com/articles/img/image_CKEditor_basic.jpeg" style="width: 400px; height: 166px;" /></p>\r\n', '2012-11-04', 1, '2012-11-04', 1, 1, 2);

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
(2, 'Actualités'),
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
(3, 'Ceci est un commentaire posté par un professeur !', '2012-11-04', 3, '2012-11-04', 1, 1, 1, 'profe'),
(4, 'Ceci est un commentaire posté par un élève !', '2012-11-04', 4, '2012-11-04', 1, 1, 1, 'eleve');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `password`, `adresse`, `tel`, `sexe`, `is_auth`, `role`, `folder`) VALUES
(1, 'Dupond', 'Martin', 'admin@gmx.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', '32 rue des Eglantines, 34070 Montpellier', '0234569871', 0, 1, 1, 'martin_dupond_4fc5e9a7c58b4'),
(2, 'Dubois', 'Jean', 'moderateur@gmx.fr', 'f1b9f75822c22f1e7e3f3f91aabfbcd795027963', '1 rue de la République, 34000 Montpellier', '0123456789', 0, 1, 2, 'jean_dubois_50966867d29d0'),
(3, 'Delmas', 'Pierre', 'prof@gmx.fr', 'd9f02d46be016f1b301f7c02a4b9c4ebe0dde7ef', '35 rue Broca, 34000 Montpellier', '0123456789', 0, 1, 3, 'pierre_delmas_509668d674f40'),
(4, 'Cassan', 'Sébastien', 'eleve@gmx.fr', '0e9a7fdc4821370a252df21582a4a656e81e0687', '3 place de la République, 34000 Montpellier', '0123456789', 0, 1, 4, 'sebastien_cassan_50967717cbbed');

-- --------------------------------------------------------

--
-- Structure de la table `_appel`
--

CREATE TABLE IF NOT EXISTS `_appel` (
  `id_users` int(11) NOT NULL,
  `presence` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_matieres` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `_cours`
--

CREATE TABLE IF NOT EXISTS `_cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matieres_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `_matieres`
--

CREATE TABLE IF NOT EXISTS `_matieres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `_users_matieres`
--

CREATE TABLE IF NOT EXISTS `_users_matieres` (
  `eleves_id` int(11) NOT NULL,
  `matieres_id` int(11) NOT NULL,
  PRIMARY KEY (`eleves_id`,`matieres_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
