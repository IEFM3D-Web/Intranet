SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `acls`;
CREATE TABLE IF NOT EXISTS `acls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_auth` int(11) NOT NULL,
  `types_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=766 ;

INSERT INTO `acls` (`id`, `controller`, `action`, `is_auth`, `types_user_id`) VALUES
(761, 'users', 'view_profil', 1, 1),
(760, 'users', 'upload', 1, 1),
(759, 'users', 'erase', 1, 1),
(757, 'users', 'liste', 1, 1),
(758, 'users', 'edit', 1, 1),
(756, 'users', 'add', 1, 1),
(755, 'commentaires', 'publish', 1, 1),
(754, 'commentaires', 'erase', 1, 1),
(753, 'commentaires', 'edit', 1, 1),
(752, 'commentaires', 'index', 1, 1),
(751, 'articles', 'publish', 1, 1),
(749, 'articles', 'edit', 1, 1),
(551, 'users_types', 'index', 0, 2),
(550, 'users_types', 'add', 0, 2),
(549, 'users', 'view_profil', 1, 2),
(548, 'users', 'erase', 1, 2),
(547, 'users', 'edit', 1, 2),
(546, 'users', 'liste', 1, 2),
(545, 'users', 'add', 1, 2),
(542, 'commentaires', 'edit', 1, 2),
(544, 'commentaires', 'publish', 1, 2),
(762, 'users_types', 'add', 1, 1),
(742, 'users_types', 'erase', 0, 3),
(741, 'users_types', 'edit', 0, 3),
(740, 'users_types', 'index', 0, 3),
(739, 'users_types', 'add', 0, 3),
(738, 'users', 'erase', 0, 3),
(737, 'users', 'edit', 0, 3),
(736, 'users', 'liste', 0, 3),
(735, 'users', 'add', 0, 3),
(734, 'commentaires', 'publish', 0, 3),
(733, 'commentaires', 'erase', 0, 3),
(528, 'users_types', 'add', 0, 4),
(527, 'users', 'erase', 0, 4),
(526, 'users', 'edit', 0, 4),
(525, 'users', 'liste', 0, 4),
(524, 'users', 'add', 0, 4),
(523, 'commentaires', 'publish', 0, 4),
(522, 'commentaires', 'erase', 0, 4),
(521, 'commentaires', 'edit', 0, 4),
(520, 'commentaires', 'index', 0, 4),
(519, 'articles', 'publish', 0, 4),
(518, 'articles', 'erase', 0, 4),
(517, 'articles', 'edit', 0, 4),
(516, 'articles', 'liste', 1, 4),
(543, 'commentaires', 'erase', 1, 2),
(541, 'commentaires', 'index', 1, 2),
(540, 'articles', 'publish', 1, 2),
(538, 'articles', 'edit', 1, 2),
(750, 'articles', 'erase', 1, 1),
(748, 'articles', 'liste', 1, 1),
(747, 'articles', 'add', 1, 1),
(732, 'commentaires', 'edit', 0, 3),
(730, 'articles', 'publish', 1, 3),
(228, 'commentaires', 'publish', 0, 5),
(227, 'commentaires', 'erase', 0, 5),
(226, 'commentaires', 'edit', 0, 5),
(225, 'commentaires', 'index', 0, 5),
(224, 'articles', 'publish', 1, 5),
(223, 'articles', 'erase', 1, 5),
(222, 'articles', 'edit', 1, 5),
(221, 'articles', 'liste', 1, 5),
(220, 'articles', 'add', 1, 5),
(219, 'categories', 'erase', 1, 5),
(218, 'categories', 'edit', 1, 5),
(217, 'categories', 'index', 1, 5),
(216, 'categories', 'add', 1, 5),
(229, 'users', 'add', 0, 5),
(230, 'users', 'liste', 0, 5),
(231, 'users', 'edit', 0, 5),
(232, 'users', 'erase', 0, 5),
(233, 'users_types', 'add', 0, 5),
(234, 'users_types', 'index', 0, 5),
(235, 'users_types', 'edit', 0, 5),
(236, 'users_types', 'erase', 0, 5),
(237, 'categories', 'add', 1, 6),
(238, 'categories', 'index', 0, 6),
(239, 'categories', 'edit', 0, 6),
(240, 'categories', 'erase', 0, 6),
(241, 'articles', 'add', 1, 6),
(242, 'articles', 'index', 0, 6),
(243, 'articles', 'edit', 0, 6),
(244, 'articles', 'erase', 0, 6),
(245, 'articles', 'publish', 0, 6),
(246, 'commentaires', 'index', 0, 6),
(247, 'commentaires', 'edit', 0, 6),
(248, 'commentaires', 'erase', 0, 6),
(249, 'commentaires', 'publish', 0, 6),
(250, 'users', 'add', 0, 6),
(251, 'users', 'liste', 0, 6),
(252, 'users', 'edit', 0, 6),
(253, 'users', 'erase', 0, 6),
(254, 'users_types', 'add', 0, 6),
(255, 'users_types', 'index', 0, 6),
(256, 'users_types', 'edit', 0, 6),
(257, 'users_types', 'erase', 0, 6),
(258, 'categories', 'add', 1, 7),
(259, 'categories', 'index', 0, 7),
(260, 'categories', 'edit', 0, 7),
(261, 'categories', 'erase', 0, 7),
(262, 'articles', 'add', 1, 7),
(263, 'articles', 'index', 0, 7),
(264, 'articles', 'edit', 0, 7),
(265, 'articles', 'erase', 0, 7),
(266, 'articles', 'publish', 0, 7),
(267, 'commentaires', 'index', 0, 7),
(268, 'commentaires', 'edit', 0, 7),
(269, 'commentaires', 'erase', 0, 7),
(270, 'commentaires', 'publish', 0, 7),
(271, 'users', 'add', 0, 7),
(272, 'users', 'liste', 0, 7),
(273, 'users', 'edit', 0, 7),
(274, 'users', 'erase', 0, 7),
(275, 'users_types', 'add', 0, 7),
(276, 'users_types', 'index', 0, 7),
(277, 'users_types', 'edit', 0, 7),
(278, 'users_types', 'erase', 0, 7),
(279, 'categories', 'add', 1, 8),
(280, 'categories', 'index', 0, 8),
(281, 'categories', 'edit', 0, 8),
(282, 'categories', 'erase', 0, 8),
(283, 'articles', 'add', 1, 8),
(284, 'articles', 'index', 0, 8),
(285, 'articles', 'edit', 0, 8),
(286, 'articles', 'erase', 0, 8),
(287, 'articles', 'publish', 0, 8),
(288, 'commentaires', 'index', 0, 8),
(289, 'commentaires', 'edit', 0, 8),
(290, 'commentaires', 'erase', 0, 8),
(291, 'commentaires', 'publish', 0, 8),
(292, 'users', 'add', 0, 8),
(293, 'users', 'liste', 0, 8),
(294, 'users', 'edit', 0, 8),
(295, 'users', 'erase', 0, 8),
(296, 'users_types', 'add', 0, 8),
(297, 'users_types', 'index', 0, 8),
(298, 'users_types', 'edit', 0, 8),
(299, 'users_types', 'erase', 0, 8),
(731, 'commentaires', 'index', 0, 3),
(726, 'articles', 'add', 1, 3),
(727, 'articles', 'liste', 1, 3),
(728, 'articles', 'edit', 1, 3),
(539, 'articles', 'erase', 1, 2),
(537, 'articles', 'liste', 1, 2),
(536, 'articles', 'add', 1, 2),
(535, 'categories', 'erase', 1, 2),
(534, 'categories', 'edit', 1, 2),
(533, 'categories', 'index', 1, 2),
(515, 'articles', 'add', 0, 4),
(514, 'categories', 'erase', 0, 4),
(513, 'categories', 'edit', 0, 4),
(512, 'categories', 'index', 0, 4),
(511, 'categories', 'add', 0, 4),
(439, 'users', 'liste', 0, 9),
(438, 'users', 'add', 0, 9),
(437, 'commentaires', 'publish', 0, 9),
(436, 'commentaires', 'erase', 0, 9),
(435, 'commentaires', 'edit', 0, 9),
(434, 'commentaires', 'index', 0, 9),
(433, 'articles', 'publish', 0, 9),
(432, 'articles', 'erase', 0, 9),
(431, 'articles', 'edit', 0, 9),
(430, 'articles', 'liste', 0, 9),
(429, 'articles', 'add', 0, 9),
(428, 'categories', 'erase', 0, 9),
(427, 'categories', 'edit', 0, 9),
(426, 'categories', 'index', 1, 9),
(425, 'categories', 'add', 0, 9),
(440, 'users', 'edit', 0, 9),
(441, 'users', 'erase', 0, 9),
(442, 'users_types', 'add', 0, 9),
(443, 'users_types', 'index', 0, 9),
(444, 'users_types', 'edit', 0, 9),
(445, 'users_types', 'erase', 0, 9),
(746, 'categories', 'erase', 1, 1),
(745, 'categories', 'edit', 1, 1),
(744, 'categories', 'index', 1, 1),
(743, 'categories', 'add', 1, 1),
(532, 'categories', 'add', 1, 2),
(729, 'articles', 'erase', 1, 3),
(725, 'categories', 'erase', 0, 3),
(529, 'users_types', 'index', 0, 4),
(530, 'users_types', 'edit', 0, 4),
(531, 'users_types', 'erase', 0, 4),
(552, 'users_types', 'edit', 0, 2),
(553, 'users_types', 'erase', 0, 2),
(724, 'categories', 'edit', 0, 3),
(723, 'categories', 'index', 0, 3),
(722, 'categories', 'add', 0, 3),
(763, 'users_types', 'index', 1, 1),
(764, 'users_types', 'edit', 1, 1),
(765, 'users_types', 'erase', 1, 1);

DROP TABLE IF EXISTS `articles`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

INSERT INTO `articles` (`id`, `titre`, `chapeau`, `contenu`, `created`, `created_by`, `modified`, `modified_by`, `online`, `articles_type_id`) VALUES
(1, 'CKeditor', '<p>\r\n	<img alt="" height="89" src="http://a.cksource.com/e/1/img/logo-ckeditor-h100.png" width="246" /></p>\r\n<p>\r\n	Petite pr&eacute;sentation du <acronym title="What you see is what you get">WYSIWYG </acronym>CKeditor.</p>\r\n', '<p style="text-align: center;">\r\n	<img alt="" src="http://a.cksource.com/e/1/img/logo-ckeditor-h100.png" style="width: 273px; height: 100px;" /></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<em>CKEditor</em> est un &eacute;diteur de texte pouvant &ecirc;tre utilis&eacute; &agrave; l&#39;int&eacute;rieur d&#39;une page web. C&rsquo;est un &eacute;diteur <acronym title="What you see is what you get">WYSIWYG</acronym>, ce qui signifie que le texte qui y est &eacute;dit&eacute; ressemble le plus possible au r&eacute;sultat que l&rsquo;utilisateur aura lorsqu&rsquo;il le publiera. Il apporte sur le web de nombreuses fonctionnalit&eacute;s identiques &agrave; celles que l&rsquo;on peut trouver sur des applications d&rsquo;&eacute;dition tels que <a href="http://microsoft.entelechargement.com/">Microsoft Word</a> ou <a href="http://fr.openoffice.org/">OpenOffice</a>. <em>CKEditor</em> permet de faciliter la mise en forme des messages de vos utilisateurs (pour les commentaires ou les forums) sans devoir utiliser de <acronym title="Bulletin Board Code">BBCode</acronym>.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="http://www.tutorielsenfolie.com/articles/img/image_CKEditor_basic.jpeg" style="width: 400px; height: 166px;" /></p>\r\n', '2012-11-04', 1, '2012-11-04', 1, 1, 2);

DROP TABLE IF EXISTS `articles_types`;
CREATE TABLE IF NOT EXISTS `articles_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

INSERT INTO `articles_types` (`id`, `name`) VALUES
(1, 'Événements'),
(2, 'Actualités'),
(3, 'Réunions');

DROP TABLE IF EXISTS `commentaires`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

INSERT INTO `commentaires` (`id`, `contenu`, `created`, `created_by`, `modified`, `modified_by`, `articles_id`, `online`, `color`) VALUES
(1, 'Ceci est un commentaire posté par un administrateur  !', '2012-11-04', 1, '2012-11-04', 1, 1, 1, 'admin'),
(2, 'Ceci est un commentaire posté par un modérateur !', '2012-11-04', 2, '2012-11-04', 1, 1, 1, 'moder'),
(3, 'Ceci est un commentaire posté par un professeur !', '2012-11-04', 3, '2012-11-04', 1, 1, 1, 'profe'),
(4, 'Ceci est un commentaire posté par un élève !', '2012-11-04', 4, '2012-11-05', 1, 1, 1, 'eleve'),
(5, 'hvubhuhbu  huhihbnihj', '2012-11-05', 1, '2012-11-05', 1, 1, 0, 'admin'),
(6, 'Ceci est un commentaire ', '2012-11-07', 1, '2012-11-07', 1, 1, 1, 'admin');

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=17 ;

INSERT INTO `sections` (`id`, `name`) VALUES
(2, 'Administration'),
(3, 'Professeur'),
(4, 'Prépa'),
(5, 'Anim 1'),
(6, 'Anim 2'),
(7, 'Anim 3'),
(8, 'GDM 1'),
(9, 'GDM 2'),
(10, 'GDM 3'),
(11, 'GD 1'),
(12, 'GD 2'),
(13, 'GD 3'),
(14, 'WEB 1'),
(15, 'WEB 2'),
(16, 'WEB 3');

DROP TABLE IF EXISTS `sexes_users`;
CREATE TABLE IF NOT EXISTS `sexes_users` (
  `id` int(11) NOT NULL,
  `sexe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sexes_users` (`id`, `sexe`) VALUES
(0, 'Homme'),
(1, 'Femme');

DROP TABLE IF EXISTS `types_users`;
CREATE TABLE IF NOT EXISTS `types_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

INSERT INTO `types_users` (`id`, `name`, `color`) VALUES
(1, 'Administrateur', 'admin'),
(2, 'Modérateur', 'moder'),
(3, 'Professeur', 'profe'),
(4, 'Élève', 'eleve');

DROP TABLE IF EXISTS `users`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `password`, `adresse`, `tel`, `sexe`, `is_auth`, `role`, `folder`, `section_id`) VALUES
(1, 'Dupond', 'Martin', 'admin@gmx.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', '32 rue des Eglantines, 34070 Montpellier', '0234569871', 0, 1, 1, 'martin_dupond_4fc5e9a7c58b4', 15),
(2, 'Dubois', 'Jean', 'moderateur@gmx.fr', 'f1b9f75822c22f1e7e3f3f91aabfbcd795027963', '1 rue de la République, 34000 Montpellier', '0123456789', 0, 1, 2, 'jean_dubois_50966867d29d0', 2),
(3, 'Delmas', 'Pierre', 'prof@gmx.fr', 'd9f02d46be016f1b301f7c02a4b9c4ebe0dde7ef', '35 rue Broca, 34000 Montpellier', '0123456789', 0, 1, 3, 'pierre_delmas_509668d674f40', 2),
(4, 'Cassan', 'Sébastien', 'eleve@gmx.fr', '0e9a7fdc4821370a252df21582a4a656e81e0687', '3 place de la République, 34000 Montpellier', '0123456789', 0, 1, 4, 'sebastien_cassan_50967717cbbed', 2),
(5, 'Avoine', 'Matthieu', 'matthieu.avoine@gmx.fr', '53d5c0ca76be4b922cbdbc05e862f4078cb198f8', 'sdfsdffdsfs sdfsdfsdfsdfsdfdfffdsf', '0123456789', 0, 1, 1, 'matthieu_avoine_50a0fd2837b4a', 4),
(7, 'Caribou', 'Claire', 'caribouDu34@hotmail.fr', 'e54ca0f451fa67adfdc259e3a21a86b1a9f5dc67', '36, rue des bois ', '0123456789', 1, 1, 4, 'claire_caribou_50a0fa08d674c', 15);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
