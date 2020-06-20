-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 20 juin 2020 à 22:04
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mytennis`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4,
  `description` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id` (`parent_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `description`) VALUES
(14, 'Raquettes', NULL, '14.png', 'Catégorie des raquettes'),
(15, 'Tenues', NULL, '15.png', 'catégorie des tenues'),
(16, 'Balles', NULL, '16.png', 'catégorie Balles'),
(17, 'Adultes', 14, '17.png', 'raquettes adulte'),
(19, 'Tenues', 15, '19.png', 'sous-catégorie maillots'),
(22, 'Balles', 16, '16.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `date`, `firstname`, `lastname`) VALUES
(64, 28, '43 rue emiles Combes', '2020-06-20 18:34:57', 'Jules', 'Thomas D'),
(63, 28, '43 rue emiles Combes', '2020-06-20 17:33:29', 'Jules', 'Thomas D'),
(62, 28, '43 rue emiles Combes', '2020-06-20 16:37:32', 'jules', 'Thomas D'),
(61, 28, '43 rue emiles Combes', '2020-06-20 15:21:38', 'jules', 'Thomas D'),
(60, 28, '43 rue emiles Combes', '2020-06-19 20:03:53', 'jules', 'Thomas D');

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_user_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `name`, `price`, `order_id`) VALUES
(8, 11, 'Babolat PS', 145, 53),
(9, 2, 'Short Femme SH', 20, 53),
(10, 9, 'Babolat PS', 145, 54),
(11, 2, 'Short Femme Light 900', 20, 54),
(12, 4, 'Wilson Pure Strike 97L', 165, 55),
(13, 3, 'Short Femme SH', 20, 55),
(14, 4, 'Wilson Pure Strike 97L', 165, 56),
(15, 3, 'Short Femme SH', 20, 56),
(16, 4, 'Wilson Pure Strike 97L', 165, 57),
(17, 3, 'Short Femme SH', 20, 57),
(18, 4, 'Wilson Pure Strike 97L', 165, 58),
(19, 3, 'Short Femme SH', 20, 58),
(20, 4, 'Wilson Pure Strike 97L', 165, 59),
(21, 3, 'Short Femme SH', 20, 59),
(22, 5, 'Babolat PS', 145, 60),
(23, 2, 'Wilson Pure Strike', 199, 61),
(24, 3, 'Wilson Pure Strike 97L', 165, 62),
(25, 6, 'Head Speed', 120, 63),
(26, 2, 'Short Femme Light 900', 20, 64),
(27, 5, 'Balles de tennis Club', 7, 64);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `short_description` tinytext CHARACTER SET utf8mb4 NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `short_description`, `price`, `image`, `quantity`, `activated`) VALUES
(2, 'Wilson Pure Strike', 'Cette raquette est conçue pour les joueurs et joueuses de tennis experts à la recherche de précision et maniabilité.', 199, '2.png', 0, 1),
(3, 'Wilson Pure Strike 97L', 'La raquette de Roger FEDERER en plus légére : le système AmpliFeel vous aide au toucher de balle.', 165, '3.png', 1, 1),
(4, 'Babolat PS', 'Raquette adulte Babolat Pure Strike', 145, '4.png', 10, 1),
(5, 'Artengo TR100', 'Raquette adulte Artengo TR100', 140, '5.png', 8, 1),
(6, 'Wilson 101L', 'Raquette adulte Wilson 101L', 110, '6.png', 3, 1),
(7, 'Graphene E360', 'Raquette adulte Head Graphene E360', 140, '7.png', 12, 1),
(8, 'Head Speed', 'Raquette adulte Head Speed', 120, '8.png', 13, 1),
(11, 'Babolat TR990L', 'Raquette adulte Babolat TR990L', 110, '11.png', 2, 1),
(12, 'Babolat TR160', 'Raquette adulte Babolat Pure Strike', 140, '12.png', 2, 1),
(39, 'Balles ATP4', 'Cette balle est idéale pour le joueur recherchant une balle durable pour jouer sur terrain dur ou sur terre battue. Tube de 4 balles.', 8, '39.png', 10, 1),
(40, 'Balles AC Fort', 'Cette balle est idéale pour le joueur recherchant une balle durable pour jouer sur terrain dur.', 7.5, '40.png', 15, 1),
(41, 'Balles de tennis RG', 'La balle Wilson Roland Garros All court est la version toutes surfaces de la balle officielle de RG.', 6, '41.png', 7, 1),
(42, 'Balles de tennis RG Jaune', 'La balle Wilson Roland Garros Clay est la balle officielle de Roland Garros', 8, '42.png', 10, 1),
(43, 'Balles de tennis Team All Court', 'Ces balles sont idéales pour le joueur recherchant une balle de compétition durable.', 6, '43.png', 15, 1),
(44, 'Balles de tennis Club', 'La Technifibre Club est une balle de de tennis vive, confortable et durable.', 7, '44.png', 15, 1),
(45, 'Balles de tennis Head Pro', 'La balle Head Pro dispose d\'un mélange de caoutchouc unique pour une bonne vivacité et durabilité.', 5.5, '45.png', 15, 1),
(46, 'Balle de tennis Team jaune', 'La nouvelle balle Babolat Team est une balle pression Premium qui allie durabilité et confort.', 7, '46.png', 10, 1),
(47, 'Balles de tennis US OPEN', 'La balle officielle de l’US Open incorpore la technologie Tex/Tech pour une meilleure performance.', 6.5, '47.png', 15, 1),
(48, 'Balle de tennis X ONE', 'Balle haut de gamme de Technifibre, la X-ONE est une balle vive, rapide et très durable.', 8, '48.png', 13, 1),
(49, 'Short Femme Light 900', 'Le short de tennis léger, respirant et pratique avec son shorty intégré.', 20, '49.png', 3, 1),
(50, 'Short Femme Light 900', 'Le short de tennis léger, respirant et pratique avec son shorty intégré.', 20, '50.png', 8, 1),
(51, 'Short Femme SH', 'Le short de tennis léger, respirant et pratique avec son shorty intégré.', 20, '51.png', 10, 1),
(52, 'Short Homme', 'Ce short de tennis vous met à l’aise sur le court. Léger avec une bonne liberté de mouvement.', 6, '52.png', 20, 1),
(53, 'Short Homme Light', 'Ce short vous apporte un maximum de confort grâce à son tissu léger et respirant.', 10, '53.png', 12, 1),
(54, 'Short Homme TSH', 'Ce short de tennis vous assure un portage de balles optimal. Il vous apportera un confort maximum.', 10, '54.png', 5, 1),
(55, 'T-shirt Femme TS', 'Ce top est le produit idéal pour jouer en demi saison. Liberté de mouvement garantie.', 12, '55.png', 5, 1),
(56, 'T-shirt Femme TSL', 'Découvrez le plaisir d\'être libre de vos mouvements avec ce Tee shirt sans couture ultra léger.', 20, '56.png', 2, 1),
(57, 'T-shirt Femme Dry', 'Grace à sa coupe simple et élégante, vous vous sentirez féminine sur les courts !', 8, '57.png', 10, 1),
(58, 'T-shirt Homme Crew', 'Doté de la technologie Dri-Fit, ce t-shirt vous permettra de rester au sec pendant vos séances.', 29, '58.png', 9, 1),
(59, 'T-shirt Homme TTS', 'Notre équipe de conception à développé ce T-shirt pour la pratique du tennis. ', 15, '59.png', 10, 1),
(60, 'T-shirt Homme Light', 'Un poids Plume ! Ce t-shirt de tennis ultra extensible vous accompagnera sur le court.', 10, '60.png', 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `products_categories`
--

DROP TABLE IF EXISTS `products_categories`;
CREATE TABLE IF NOT EXISTS `products_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_categories_product_id` (`product_id`) USING BTREE,
  KEY `products_categories_category_id` (`category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products_categories`
--

INSERT INTO `products_categories` (`id`, `product_id`, `category_id`) VALUES
(65, 39, 16),
(66, 40, 16),
(67, 41, 16),
(68, 42, 16),
(69, 43, 16),
(70, 44, 16),
(71, 45, 16),
(72, 46, 16),
(73, 47, 16),
(74, 48, 16),
(78, 50, 15),
(81, 51, 15),
(82, 52, 15),
(84, 55, 15),
(85, 56, 15),
(86, 58, 15),
(88, 59, 15),
(89, 57, 15),
(90, 54, 15),
(99, 2, 14),
(106, 3, 14),
(107, 4, 14),
(108, 5, 14),
(109, 6, 14),
(110, 7, 14),
(111, 8, 14),
(112, 12, 14),
(120, 49, 15),
(122, 53, 15),
(123, 60, 15);

-- --------------------------------------------------------

--
-- Structure de la table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `images` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_images_product_id` (`product_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `is_admin`, `address`) VALUES
(3, 'dada', 'dada', 'dada@dada.com', '1a36591bceec49c832079e270d7e8b73', 1, ''),
(7, 'nicolas', 'pierre', 'pierre@pierre.com', '84675f2baf7140037b8f5afe54eef841', 1, '12 ezeza'),
(10, 'jules', 'jules', 'jules@jules.com', 'c027636003b468821081e281758e35ff', 1, '21 ekza'),
(26, 'julio', 'julio', 'julio@julio.com', 'c027636003b468821081e281758e35ff', 1, ''),
(28, 'Jules', 'Thomas D', 'jules@thomas.com', '58e537189c53a9d3969e8795588ea574', 1, '43 rue emiles Combes'),
(31, 'arnaud', 'thomas', 'arnaud@thomas.com', 'ea56f45e66e2c57fc79df7dc3ae0437b', 0, 'Lyon'),
(34, 'yann', 'thomas', 'yann@thomas.com', 'yann', 1, 'tregastel'),
(35, 'Youri', 'Thomas', 'youri@doudou.com', 'be5d9ba998a9412a49a6e9d4fcedf931', 0, 'Paris'),
(36, 'travis', 'scott', 'travis@scott.com', '7985139ae9b6efb45373e3e36e444224', 0, 'houston'),
(41, 'test', 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 0, 'test'),
(42, 'test1', 'test1', 'test1@test.com', '5a105e8b9d40e1329780d62ea2265d8a', 1, 'test1'),
(43, 'Max', 'Basset', 'max@admin.com', 'b238c13e822536cad3ac57a2280fbf45', 1, 'Webstart'),
(44, 'Maxime', 'testuser', 'test@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 'Paris');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products_categories`
--
ALTER TABLE `products_categories`
  ADD CONSTRAINT `products_categories_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_categories_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `products_images_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
