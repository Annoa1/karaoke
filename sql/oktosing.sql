-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 17 Mai 2015 à 18:36
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `oktosing`
--

-- --------------------------------------------------------

--
-- Structure de la table `tj_note_not`
--

CREATE TABLE IF NOT EXISTS `tj_note_not` (
  `NOT_VAL` int(11) NOT NULL,
  `USR_ID` int(11) NOT NULL,
  `VID_ID` int(11) NOT NULL,
  PRIMARY KEY (`USR_ID`,`VID_ID`),
  KEY `FK_NOT_VID` (`VID_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tj_realise_rea`
--

CREATE TABLE IF NOT EXISTS `tj_realise_rea` (
  `ART_ID` int(11) NOT NULL,
  `VID_ID` int(11) NOT NULL,
  PRIMARY KEY (`ART_ID`,`VID_ID`),
  KEY `FK_REA_ID` (`VID_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tj_realise_rea`
--

INSERT INTO `tj_realise_rea` (`ART_ID`, `VID_ID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 4),
(7, 5),
(8, 6),
(9, 7);

-- --------------------------------------------------------

--
-- Structure de la table `tr_pays_pay`
--

CREATE TABLE IF NOT EXISTS `tr_pays_pay` (
  `PAY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAY_NOM` varchar(45) NOT NULL,
  PRIMARY KEY (`PAY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=242 ;

--
-- Contenu de la table `tr_pays_pay`
--

INSERT INTO `tr_pays_pay` (`PAY_ID`, `PAY_NOM`) VALUES
(1, 'Afghanistan'),
(2, 'Afrique du Sud'),
(3, 'Albanie'),
(4, 'Algérie'),
(5, 'Allemagne'),
(6, 'Andorre'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctique'),
(10, 'Antigua-et-Barbuda'),
(11, 'Antilles Néerlandaises'),
(12, 'Arabie Saoudite'),
(13, 'Argentine'),
(14, 'Arménie'),
(15, 'Aruba'),
(16, 'Australie'),
(17, 'Autriche'),
(18, 'Azerbaïdjan'),
(19, 'Bahamas'),
(20, 'Bahreïn'),
(21, 'Bangladesh'),
(22, 'Barbade'),
(23, 'Bélarus'),
(24, 'Belgique'),
(25, 'Belize'),
(26, 'Bénin'),
(27, 'Bermudes'),
(28, 'Bhoutan'),
(29, 'Bolivie'),
(30, 'Bosnie-Herzégovine'),
(31, 'Botswana'),
(32, 'Brésil'),
(33, 'Brunéi Darussalam'),
(34, 'Bulgarie'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodge'),
(38, 'Cameroun'),
(39, 'Canada'),
(40, 'Cap-vert'),
(41, 'Chili'),
(42, 'Chine'),
(43, 'Chypre'),
(44, 'Colombie'),
(45, 'Comores'),
(46, 'Costa Rica'),
(47, 'Côte d''Ivoire'),
(48, 'Croatie'),
(49, 'Cuba'),
(50, 'Danemark'),
(51, 'Djibouti'),
(52, 'Dominique'),
(53, 'Égypte'),
(54, 'El Salvador'),
(55, 'Émirats Arabes Unis'),
(56, 'Équateur'),
(57, 'Érythrée'),
(58, 'Espagne'),
(59, 'Estonie'),
(60, 'États Fédérés de Micronésie'),
(61, 'États-Unis'),
(62, 'Éthiopie'),
(63, 'Fédération de Russie'),
(64, 'Fidji'),
(65, 'Finlande'),
(66, 'France'),
(67, 'Gabon'),
(68, 'Gambie'),
(69, 'Géorgie'),
(70, 'Géorgie du Sud et les Îles Sandwich du Sud'),
(71, 'Ghana'),
(72, 'Gibraltar'),
(73, 'Grèce'),
(74, 'Grenade'),
(75, 'Groenland'),
(76, 'Guadeloupe'),
(77, 'Guam'),
(78, 'Guatemala'),
(79, 'Guinée'),
(80, 'Guinée Équatoriale'),
(81, 'Guinée-Bissau'),
(82, 'Guyana'),
(83, 'Guyane Française'),
(84, 'Haïti'),
(85, 'Honduras'),
(86, 'Hong-Kong'),
(87, 'Hongrie'),
(88, 'Île Bouvet'),
(89, 'Île Christmas'),
(90, 'Île de Man'),
(91, 'Île Norfolk'),
(92, 'Îles (malvinas) Falkland'),
(93, 'Îles Åland'),
(94, 'Îles Caïmanes'),
(95, 'Îles Cocos (Keeling)'),
(96, 'Îles Cook'),
(97, 'Îles Féroé'),
(98, 'Îles Heard et Mcdonald'),
(99, 'Îles Mariannes du Nord'),
(100, 'Îles Marshall'),
(101, 'Îles Mineures Éloignées des États-Unis'),
(102, 'Îles Salomon'),
(103, 'Îles Turks et Caïques'),
(104, 'Îles Vierges Britanniques'),
(105, 'Îles Vierges des États-Unis'),
(106, 'Inde'),
(107, 'Indonésie'),
(108, 'Iraq'),
(109, 'Irlande'),
(110, 'Islande'),
(111, 'Israël'),
(112, 'Italie'),
(113, 'Jamahiriya Arabe Libyenne'),
(114, 'Jamaïque'),
(115, 'Japon'),
(116, 'Jordanie'),
(117, 'Kazakhstan'),
(118, 'Kenya'),
(119, 'Kirghizistan'),
(120, 'Kiribati'),
(121, 'Koweït'),
(122, 'L''ex-République Yougoslave de Macédoine'),
(123, 'Lesotho'),
(124, 'Lettonie'),
(125, 'Liban'),
(126, 'Libéria'),
(127, 'Liechtenstein'),
(128, 'Lituanie'),
(129, 'Luxembourg'),
(130, 'Macao'),
(131, 'Madagascar'),
(132, 'Malaisie'),
(133, 'Malawi'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malte'),
(137, 'Maroc'),
(138, 'Martinique'),
(139, 'Maurice'),
(140, 'Mauritanie'),
(141, 'Mayotte'),
(142, 'Mexique'),
(143, 'Monaco'),
(144, 'Mongolie'),
(145, 'Montserrat'),
(146, 'Mozambique'),
(147, 'Myanmar'),
(148, 'Namibie'),
(149, 'Nauru'),
(150, 'Népal'),
(151, 'Nicaragua'),
(152, 'Niger'),
(153, 'Nigéria'),
(154, 'Niué'),
(155, 'Norvège'),
(156, 'Nouvelle-Calédonie'),
(157, 'Nouvelle-Zélande'),
(158, 'Oman'),
(159, 'Ouganda'),
(160, 'Ouzbékistan'),
(161, 'Pakistan'),
(162, 'Palaos'),
(163, 'Panama'),
(164, 'Papouasie-Nouvelle-Guinée'),
(165, 'Paraguay'),
(166, 'Pays-Bas'),
(167, 'Pérou'),
(168, 'Philippines'),
(169, 'Pitcairn'),
(170, 'Pologne'),
(171, 'Polynésie Française'),
(172, 'Porto Rico'),
(173, 'Portugal'),
(174, 'Qatar'),
(175, 'République Arabe Syrienne'),
(176, 'République Centrafricaine'),
(177, 'République de Corée'),
(178, 'République de Moldova'),
(179, 'République Démocratique du Congo'),
(180, 'République Démocratique Populaire Lao'),
(181, 'République Dominicaine'),
(182, 'République du Congo'),
(183, 'République Islamique d''Iran'),
(184, 'République Populaire Démocratique de Corée'),
(185, 'République Tchèque'),
(186, 'République-Unie de Tanzanie'),
(187, 'Réunion'),
(188, 'Roumanie'),
(189, 'Royaume-Uni'),
(190, 'Rwanda'),
(191, 'Sahara Occidental'),
(192, 'Saint-Kitts-et-Nevis'),
(193, 'Saint-Marin'),
(194, 'Saint-Pierre-et-Miquelon'),
(195, 'Saint-Siège (état de la Cité du Vatican)'),
(196, 'Saint-Vincent-et-les Grenadines'),
(197, 'Sainte-Hélène'),
(198, 'Sainte-Lucie'),
(199, 'Samoa'),
(200, 'Samoa Américaines'),
(201, 'Sao Tomé-et-Principe'),
(202, 'Sénégal'),
(203, 'Serbie-et-Monténégro'),
(204, 'Seychelles'),
(205, 'Sierra Leone'),
(206, 'Singapour'),
(207, 'Slovaquie'),
(208, 'Slovénie'),
(209, 'Somalie'),
(210, 'Soudan'),
(211, 'Sri Lanka'),
(212, 'Suède'),
(213, 'Suisse'),
(214, 'Suriname'),
(215, 'Svalbard etÎle Jan Mayen'),
(216, 'Swaziland'),
(217, 'Tadjikistan'),
(218, 'Taïwan'),
(219, 'Tchad'),
(220, 'Terres Australes Françaises'),
(221, 'Territoire Britannique de l''Océan Indien'),
(222, 'Territoire Palestinien Occupé'),
(223, 'Thaïlande'),
(224, 'Timor-Leste'),
(225, 'Togo'),
(226, 'Tokelau'),
(227, 'Tonga'),
(228, 'Trinité-et-Tobago'),
(229, 'Tunisie'),
(230, 'Turkménistan'),
(231, 'Turquie'),
(232, 'Tuvalu'),
(233, 'Ukraine'),
(234, 'Uruguay'),
(235, 'Vanuatu'),
(236, 'Venezuela'),
(237, 'Viet Nam'),
(238, 'Wallis et Futuna'),
(239, 'Yémen'),
(240, 'Zambie'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `t_artist_art`
--

CREATE TABLE IF NOT EXISTS `t_artist_art` (
  `ART_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ART_NOM` varchar(128) NOT NULL,
  PRIMARY KEY (`ART_ID`),
  UNIQUE KEY `UNIQUE_ART_NOM` (`ART_NOM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `t_artist_art`
--

INSERT INTO `t_artist_art` (`ART_ID`, `ART_NOM`) VALUES
(2, 'Canabasse'),
(5, 'Girl''s Generation'),
(4, 'Hatsune Miku'),
(7, 'Ho Hoang Yen'),
(1, 'Masako Hayashi'),
(6, 'Monica Bellucci'),
(8, 'Papa Wamba'),
(3, 'Vitola Vita'),
(9, 'Youssou Ndour');

-- --------------------------------------------------------

--
-- Structure de la table `t_user_usr`
--

CREATE TABLE IF NOT EXISTS `t_user_usr` (
  `USR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USR_LOG` varchar(32) NOT NULL,
  `USR_MAIL` varchar(128) NOT NULL,
  `USR_PWD` varchar(255) NOT NULL,
  `USR_COLOR` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`USR_ID`),
  UNIQUE KEY `UNIQUE_USR_LOG` (`USR_LOG`),
  UNIQUE KEY `UNIQUE_USR_MAIL` (`USR_MAIL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `t_user_usr`
--

INSERT INTO `t_user_usr` (`USR_ID`, `USR_LOG`, `USR_MAIL`, `USR_PWD`, `USR_COLOR`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', NULL),
(2, 'Annoa', 'annoa@gmail.com', 'annoa', NULL),
(3, 'Leonie', 'leonie@gmail.com', 'leonie', NULL),
(4, 'Tofuw', 'tofuw@gmail.com', 'tofuw', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_video_vid`
--

CREATE TABLE IF NOT EXISTS `t_video_vid` (
  `VID_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VID_TITLE` varchar(32) NOT NULL,
  `VID_YEAR` year(4) DEFAULT NULL,
  `VID_SBT` tinyint(1) NOT NULL,
  `PAY_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`VID_ID`),
  KEY `FK_VID_PAY` (`PAY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `t_video_vid`
--

INSERT INTO `t_video_vid` (`VID_ID`, `VID_TITLE`, `VID_YEAR`, `VID_SBT`, `PAY_ID`) VALUES
(1, 'Mononoke Hime', 2008, 0, 115),
(2, 'Na Gnou Dem', 2009, 1, 202),
(3, 'Danzare', 2010, 1, 112),
(4, 'Run Devil Run', 2014, 1, 115),
(5, 'Rieng Mot Goc Troi', 2003, 0, 237),
(6, 'Lingala', 2005, 0, 182),
(7, 'Téléphone', 2001, 0, 202);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tj_note_not`
--
ALTER TABLE `tj_note_not`
  ADD CONSTRAINT `FK_NOT_VID` FOREIGN KEY (`VID_ID`) REFERENCES `t_video_vid` (`VID_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_NOT_USR` FOREIGN KEY (`USR_ID`) REFERENCES `t_user_usr` (`USR_ID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tj_realise_rea`
--
ALTER TABLE `tj_realise_rea`
  ADD CONSTRAINT `FK_REA_ID` FOREIGN KEY (`VID_ID`) REFERENCES `t_video_vid` (`VID_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_REA_ART` FOREIGN KEY (`ART_ID`) REFERENCES `t_artist_art` (`ART_ID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `t_video_vid`
--
ALTER TABLE `t_video_vid`
  ADD CONSTRAINT `FK_VID_PAY` FOREIGN KEY (`PAY_ID`) REFERENCES `tr_pays_pay` (`PAY_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
