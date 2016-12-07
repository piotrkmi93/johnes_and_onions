-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2016 at 02:32 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forge`
--

-- --------------------------------------------------------

--
-- Table structure for table `backpacks`
--

DROP TABLE IF EXISTS `backpacks`;
CREATE TABLE IF NOT EXISTS `backpacks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `capacity` int(1) NOT NULL DEFAULT '6',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `backpacks`
--

TRUNCATE TABLE `backpacks`;
--
-- Dumping data for table `backpacks`
--

INSERT INTO `backpacks` (`id`, `capacity`) VALUES
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6),
(7, 6),
(8, 6),
(9, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `backpack_items`
--

DROP TABLE IF EXISTS `backpack_items`;
CREATE TABLE IF NOT EXISTS `backpack_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `backpack_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=210 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `backpack_items`
--

TRUNCATE TABLE `backpack_items`;
--
-- Dumping data for table `backpack_items`
--

INSERT INTO `backpack_items` (`id`, `backpack_id`, `item_id`) VALUES
(1, 1, 22),
(2, 1, 30),
(3, 4, 36),
(5, 10, 43),
(6, 10, 44),
(7, 10, 45),
(8, 10, 46),
(9, 10, 47),
(195, 12, 224),
(138, 11, 156),
(143, 16, 173),
(140, 11, 159),
(139, 11, 160),
(209, 11, 171),
(201, 13, 230),
(200, 13, 229),
(199, 13, 228),
(198, 13, 227),
(197, 13, 226),
(196, 13, 225),
(207, 14, 236),
(206, 14, 235),
(205, 14, 234),
(204, 14, 233),
(203, 14, 232),
(202, 14, 231),
(194, 12, 223),
(193, 12, 222),
(192, 12, 221),
(191, 12, 220),
(151, 15, 177),
(190, 12, 219),
(150, 15, 174),
(146, 16, 176),
(177, 18, 206),
(148, 16, 178),
(149, 15, 175),
(153, 15, 181),
(176, 18, 205),
(175, 18, 204),
(174, 18, 203),
(173, 18, 202),
(172, 18, 201),
(183, 19, 212),
(182, 19, 211),
(181, 19, 210),
(180, 19, 209),
(179, 19, 208),
(178, 19, 207),
(184, 20, 213),
(185, 20, 214),
(186, 20, 215),
(187, 20, 216),
(188, 20, 217),
(189, 20, 218);

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE IF NOT EXISTS `characters` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `character_look_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `strength_points` int(11) NOT NULL DEFAULT '10',
  `dexterity_points` int(11) NOT NULL DEFAULT '10',
  `intelligence_points` int(11) NOT NULL DEFAULT '10',
  `durability_points` int(11) NOT NULL DEFAULT '10',
  `luck_points` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `characters`
--

TRUNCATE TABLE `characters`;
--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `character_look_id`, `name`, `level`, `strength_points`, `dexterity_points`, `intelligence_points`, `durability_points`, `luck_points`) VALUES
(1, 1, 'Pepe Pan Pepson', 15, 14, 10, 10, 10, 10),
(2, 2, 'Jakiś debil', 1, 10, 10, 10, 10, 10),
(3, 3, 'Janek Wędrowniczek', 1, 10, 10, 10, 10, 10),
(9, 9, 'Creepy Hamster of Obscurity', 1, 7, 9, 8, 10, 7),
(8, 8, 'Creepy Chinchilla of Rainbow', 1, 6, 10, 10, 6, 1),
(7, 7, 'Weird Cow of Rainbow', 1, 10, 7, 5, 10, 4),
(10, 10, 'Weird Duck of Rainbow', 1, 8, 8, 7, 6, 6),
(11, 11, 'Weird Chinchilla of Obscurity', 1, 8, 8, 7, 9, 10),
(12, 12, 'Weird Hippo of Obscurity', 1, 9, 8, 8, 8, 9),
(13, 13, 'Creepy Hamster of Obscurity', 1, 6, 8, 6, 9, 0),
(14, 14, 'Creepy Meerkat of Obscurity', 1, 10, 10, 6, 9, 9),
(15, 15, 'Weird Hamster of Obscurity', 1, 5, 7, 9, 10, 9),
(16, 16, 'Weird Sheep of Rainbow', 1, 5, 5, 7, 10, 1),
(70, 70, 'Loony Prawn of Extinction', 15, 13, 9, 5, 6, 0),
(68, 68, 'Weird Badger of Rainbow', 15, 8, 10, 6, 7, 6),
(69, 69, 'Sluggish Badger of Cleverness', 15, 9, 6, 10, 9, 7),
(71, 71, 'Jan Twardowsky', 1, 10, 10, 10, 10, 10),
(79, 79, 'Podgy Chinchilla of Rainbow', 1, 10, 8, 5, 5, 9),
(78, 78, 'Sluggish Badger of Glory', 1, 10, 8, 10, 7, 4),
(80, 80, 'Smelly Duck of Rainbow', 1, 7, 6, 6, 10, 3),
(81, 81, 'Kaszalot', 19, 10, 10, 10, 10, 10),
(157, 158, 'hghfdghfg', 2, 10, 10, 10, 10, 10),
(161, 162, 'fdgfdsgsdfgsfd', 1, 10, 10, 10, 10, 10),
(162, 163, 'Slimy Guenon of Cleverness', 19, 6, 8, 10, 10, 6),
(163, 164, 'Slimy Guenon of Rainbow', 19, 8, 7, 10, 5, 9),
(164, 165, 'Harmfull Bat of Rainbow', 19, 6, 7, 8, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `character_looks`
--

DROP TABLE IF EXISTS `character_looks`;
CREATE TABLE IF NOT EXISTS `character_looks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hair_variant_id` int(11) NOT NULL,
  `eyebrow_variant_id` int(11) NOT NULL,
  `eyes_variant_id` int(11) DEFAULT NULL,
  `mouth_variant_id` int(11) NOT NULL,
  `head_variant_id` int(11) NOT NULL,
  `nose_variant_id` int(11) NOT NULL,
  `body_variant_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `character_looks`
--

TRUNCATE TABLE `character_looks`;
--
-- Dumping data for table `character_looks`
--

INSERT INTO `character_looks` (`id`, `hair_variant_id`, `eyebrow_variant_id`, `eyes_variant_id`, `mouth_variant_id`, `head_variant_id`, `nose_variant_id`, `body_variant_id`) VALUES
(1, 19, 11, 28, 6, 5, 7, 1),
(2, 19, 11, 28, 7, 5, 8, 1),
(3, 17, 9, 27, 7, 5, 8, 1),
(11, 20, 9, 27, 6, 5, 7, 1),
(10, 16, 14, 30, 6, 5, 7, 1),
(9, 22, 15, 28, 6, 5, 7, 1),
(12, 23, 10, 3, 6, 5, 7, 1),
(13, 22, 10, 28, 6, 5, 7, 1),
(14, 22, 10, 29, 6, 5, 7, 1),
(15, 17, 11, 26, 6, 5, 7, 1),
(16, 18, 2, 24, 6, 5, 7, 1),
(69, 16, 2, 62, 6, 36, 7, 1),
(68, 23, 43, 65, 6, 48, 7, 1),
(70, 21, 41, 65, 6, 49, 67, 1),
(71, 4, 2, 3, 7, 5, 7, 1),
(80, 22, 8, 63, 6, 54, 7, 1),
(79, 18, 47, 62, 6, 48, 67, 1),
(78, 4, 10, 58, 6, 51, 67, 1),
(81, 17, 41, 60, 7, 32, 7, 1),
(82, 16, 46, 30, 6, 54, 67, 1),
(162, 4, 2, 3, 6, 5, 7, 1),
(163, 78, 46, 66, 89, 52, 7, 1),
(158, 17, 41, 25, 7, 50, 7, 1),
(164, 81, 45, 63, 91, 49, 7, 1),
(165, 76, 12, 27, 90, 54, 85, 72);

-- --------------------------------------------------------

--
-- Table structure for table `character_look_variants`
--

DROP TABLE IF EXISTS `character_look_variants`;
CREATE TABLE IF NOT EXISTS `character_look_variants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `look_variant_color_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `character_look_variants`
--

TRUNCATE TABLE `character_look_variants`;
--
-- Dumping data for table `character_look_variants`
--

INSERT INTO `character_look_variants` (`id`, `type`, `look_variant_color_id`, `image_url`) VALUES
(1, 'body_1', 1, 'images/player/body/cialo1w.png'),
(2, 'eyebrow_1', 1, 'images/player/eyebrows/1/brwi1.png'),
(3, 'eyes_1', 1, 'images/player/eyes/1/oczy1.png'),
(4, 'hair_1', 1, 'images/player/hairs/1/hair1.png'),
(5, 'head_1', 1, 'images/player/heads/1/glowak1.png'),
(6, 'mouth_1', NULL, 'images/player/mouths/ustaw1.png'),
(7, 'nose_1', NULL, 'images/player/noses/nose1.png'),
(8, 'eyebrow_1', 2, 'images/player/eyebrows/1/brwi2.png'),
(9, 'eyebrow_1', 3, 'images/player/eyebrows/1/brwi3.png'),
(10, 'eyebrow_1', 4, 'images/player/eyebrows/1/brwi4.png'),
(11, 'eyebrow_1', 5, 'images/player/eyebrows/1/brwi5.png'),
(12, 'eyebrow_1', 6, 'images/player/eyebrows/1/brwi6.png'),
(13, 'eyebrow_1', 7, 'images/player/eyebrows/1/brwi7.png'),
(14, 'eyebrow_1', 8, 'images/player/eyebrows/1/brwi8.png'),
(15, 'eyebrow_1', 9, 'images/player/eyebrows/1/brwi9.png'),
(16, 'hair_1', 2, 'images/player/hairs/1/hair2.png'),
(17, 'hair_1', 3, 'images/player/hairs/1/hair3.png'),
(18, 'hair_1', 4, 'images/player/hairs/1/hair4.png'),
(19, 'hair_1', 5, 'images/player/hairs/1/hair5.png'),
(20, 'hair_1', 6, 'images/player/hairs/1/hair6.png'),
(21, 'hair_1', 7, 'images/player/hairs/1/hair7.png'),
(22, 'hair_1', 8, 'images/player/hairs/1/hair8.png'),
(23, 'hair_1', 9, 'images/player/hairs/1/hair9.png'),
(24, 'eyes_1', 2, 'images/player/eyes/1/oczy2.png'),
(25, 'eyes_1', 3, 'images/player/eyes/1/oczy3.png'),
(26, 'eyes_1', 4, 'images/player/eyes/1/oczy4.png'),
(27, 'eyes_1', 5, 'images/player/eyes/1/oczy5.png'),
(28, 'eyes_1', 6, 'images/player/eyes/1/oczy6.png'),
(29, 'eyes_1', 7, 'images/player/eyes/1/oczy7.png'),
(30, 'eyes_1', 8, 'images/player/eyes/1/oczy8.png'),
(31, 'head_1', 2, 'images/player/heads/1/glowak2.png'),
(32, 'head_1', 3, 'images/player/heads/1/glowak3.png'),
(33, 'head_1', 4, 'images/player/heads/1/glowak4.png'),
(34, 'head_1', 5, 'images/player/heads/1/glowak5.png'),
(35, 'head_1', 6, 'images/player/heads/1/glowak6.png'),
(36, 'head_1', 7, 'images/player/heads/1/glowak7.png'),
(37, 'head_1', 8, 'images/player/heads/1/glowak8.png'),
(38, 'head_1', 9, 'images/player/heads/1/glowak9.png'),
(39, 'eyebrow_2', 1, 'images/player/eyebrows/2/brwi1.png'),
(40, 'eyebrow_2', 2, 'images/player/eyebrows/2/brwi2.png'),
(41, 'eyebrow_2', 3, 'images/player/eyebrows/2/brwi3.png'),
(42, 'eyebrow_2', 4, 'images/player/eyebrows/2/brwi4.png'),
(43, 'eyebrow_2', 5, 'images/player/eyebrows/2/brwi5.png'),
(44, 'eyebrow_2', 6, 'images/player/eyebrows/2/brwi6.png'),
(45, 'eyebrow_2', 7, 'images/player/eyebrows/2/brwi7.png'),
(46, 'eyebrow_2', 8, 'images/player/eyebrows/2/brwi8.png'),
(47, 'eyebrow_2', 9, 'images/player/eyebrows/2/brwi9.png'),
(48, 'head_2', 1, 'images/player/heads/2/glowa2k1.png'),
(49, 'head_2', 2, 'images/player/heads/2/glowa2k2.png'),
(50, 'head_2', 3, 'images/player/heads/2/glowa2k3.png'),
(51, 'head_2', 4, 'images/player/heads/2/glowa2k4.png'),
(52, 'head_2', 5, 'images/player/heads/2/glowa2k5.png'),
(53, 'head_2', 6, 'images/player/heads/2/glowa2k6.png'),
(54, 'head_2', 7, 'images/player/heads/2/glowa2k7.png'),
(55, 'head_2', 8, 'images/player/heads/2/glowa2k8.png'),
(56, 'head_2', 9, 'images/player/heads/2/glowa2k9.png'),
(57, 'eyes_1', 9, 'images/player/eyes/1/oczy9.png'),
(58, 'eyes_2', 1, 'images/player/eyes/2/oczy1j.png'),
(59, 'eyes_2', 2, 'images/player/eyes/2/oczy2j.png'),
(60, 'eyes_2', 3, 'images/player/eyes/2/oczy3j.png'),
(61, 'eyes_2', 4, 'images/player/eyes/2/oczy4j.png'),
(62, 'eyes_2', 5, 'images/player/eyes/2/oczy5j.png'),
(63, 'eyes_2', 6, 'images/player/eyes/2/oczy6j.png'),
(64, 'eyes_2', 7, 'images/player/eyes/2/oczy7j.png'),
(65, 'eyes_2', 8, 'images/player/eyes/2/oczy8j.png'),
(66, 'eyes_2', 9, 'images/player/eyes/2/oczy9j.png'),
(67, 'nose_2', NULL, 'images/player/noses/nose2.png'),
(68, 'body_1', 2, 'images/player/body/cialo2w.png'),
(69, 'body_1', 3, 'images/player/body/cialo3w.png'),
(70, 'body_1', 4, 'images/player/body/cialo4w.png'),
(71, 'body_1', 5, 'images/player/body/cialo5w.png'),
(72, 'body_1', 6, 'images/player/body/cialo6w.png'),
(73, 'body_1', 7, 'images/player/body/cialo7w.png'),
(74, 'body_1', 8, 'images/player/body/cialo8w.png'),
(75, 'body_1', 9, 'images/player/body/cialo9w.png'),
(85, 'nose_3', NULL, 'images/player/noses/nose3.png'),
(76, 'hair_2', 1, 'images/player/hairs/2/hairg1.png'),
(77, 'hair_2', 2, 'images/player/hairs/2/hairg2.png'),
(78, 'hair_2', 3, 'images/player/hairs/2/hairg3.png'),
(79, 'hair_2', 4, 'images/player/hairs/2/hairg4.png'),
(80, 'hair_2', 5, 'images/player/hairs/2/hairg5.png'),
(81, 'hair_2', 6, 'images/player/hairs/2/hairg6.png'),
(82, 'hair_2', 7, 'images/player/hairs/2/hairg7.png'),
(83, 'hair_2', 8, 'images/player/hairs/2/hairg8.png'),
(84, 'hair_2', 9, 'images/player/hairs/2/hairg9.png'),
(86, 'nose_4', NULL, 'images/player/noses/nose4.png'),
(87, 'nose_5', NULL, 'images/player/noses/nose5.png'),
(88, 'mouth_2', NULL, 'images/player/mouths/ustaw2.png'),
(89, 'mouth_3', NULL, 'images/player/mouths/ustaw3.png'),
(90, 'mouth_4', NULL, 'images/player/mouths/ustaw4.png'),
(91, 'mouth_5', NULL, 'images/player/mouths/ustaw5.png');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `armor_points` bigint(20) NOT NULL DEFAULT '0',
  `strength_points` bigint(20) NOT NULL DEFAULT '0',
  `dexterity_points` bigint(20) NOT NULL DEFAULT '0',
  `intelligence_points` bigint(20) NOT NULL DEFAULT '0',
  `durability_points` bigint(20) NOT NULL DEFAULT '0',
  `luck_points` bigint(20) NOT NULL DEFAULT '0',
  `damage_min_points` bigint(20) NOT NULL DEFAULT '0',
  `damage_max_points` bigint(20) NOT NULL DEFAULT '0',
  `price` bigint(20) NOT NULL,
  `item_look_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=237 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `items`
--

TRUNCATE TABLE `items`;
--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `type`, `name`, `armor_points`, `strength_points`, `dexterity_points`, `intelligence_points`, `durability_points`, `luck_points`, `damage_min_points`, `damage_max_points`, `price`, `item_look_id`) VALUES
(1, 'sword', 'Crazy Cow of Rainbow', 0, 0, 0, 0, 0, 0, 10, 20, 1, 1),
(2, 'sword', 'Weird Duck of Obscurity', 0, 0, 0, 0, 0, 0, 10, 20, 1, 1),
(3, 'sword', 'Crazy Cow of Rainbow', 0, 0, 0, 0, 0, 0, 10, 20, 1, 1),
(5, 'gloves', 'Weird Duck', 9, 4, 10, 2, 5, 3, 0, 0, 97, 1),
(6, 'belt', 'Crazy Hippo', 0, 2, 0, 0, 9, 8, 0, 0, 82, 1),
(32, 'sword', 'Creepy Fox', 114, 37, 40, 61, 81, 42, 134, 264, 1041, 1),
(22, 'gloves', 'Creepy Sheep', 35, 47, 17, 18, 30, 6, 0, 0, 267, 1),
(33, 'boots', 'Slimy Bat', 18, 23, 112, 107, 31, 100, 0, 0, 760, 1),
(30, 'necklace', 'Smelly Badger', 37, 106, 94, 5, 4, 65, 0, 0, 710, 1),
(34, 'sword', 'Loony Cow of Cleverness', 0, 0, 0, 0, 0, 0, 10, 20, 1, 1),
(39, 'armor', 'Podgy Chinchilla', 7, 6, 5, 2, 0, 4, 0, 0, 54, 1),
(36, 'accessory', 'Slimy Hippo', 1, 6, 5, 10, 1, 5, 0, 0, 50, 1),
(40, 'accessory', 'Weird Prawn', 6, 0, 9, 3, 2, 4, 0, 0, 71, 1),
(41, 'gloves', 'Crazy Prawn', 7, 2, 6, 3, 10, 6, 0, 0, 56, 1),
(42, 'sword', 'Sluggish Kangaroo', 33, 91, 89, 83, 34, 95, 159, 262, 606, 1),
(43, 'wand', 'Slimy Sheep', 62, 31, 4, 70, 53, 56, 137, 233, 1066, 1),
(44, 'sword', 'Smelly Guenon', 2, 91, 111, 59, 53, 52, 170, 286, 1141, 1),
(45, 'sword', 'Blind Guenon', 75, 14, 68, 45, 19, 79, 196, 269, 722, 1),
(46, 'sword', 'Slimy Meerkat', 38, 69, 75, 67, 106, 27, 178, 239, 825, 1),
(47, 'shield', 'Sluggish Swine', 79, 108, 43, 58, 32, 111, 0, 0, 956, 1),
(48, 'sword', 'Smelly Kangaroo of Extinction', 0, 0, 0, 0, 0, 0, 10, 20, 1, 1),
(175, 'sword', 'Smelly Swine', 2, 2, 9, 0, 1, 9, 16, 22, 55, 1),
(224, 'wand', 'Weird Sheep', 219, 48, 28, 22, 148, 32, 320, 523, 2117, 1),
(223, 'wand', 'Loony Chimpanzee', 9, 162, 48, 91, 8, 6, 383, 504, 1278, 1),
(219, 'wand', 'Crazy Kangaroo', 106, 174, 32, 97, 91, 20, 423, 560, 1964, 1),
(171, 'ring', 'Weird Sheep', 152, 56, 10, 54, 131, 139, 0, 0, 1589, 1),
(173, 'sword', 'Podgy Fox', 6, 10, 9, 3, 10, 3, 15, 26, 62, 1),
(230, 'helmet', 'Weird Swine', 45, 227, 170, 37, 125, 193, 0, 0, 1518, 1),
(228, 'belt', 'Slimy Hamster', 190, 128, 65, 214, 150, 82, 0, 0, 2183, 1),
(225, 'armor', 'Weird Bat', 182, 9, 34, 30, 148, 187, 0, 0, 1879, 1),
(226, 'helmet', 'Podgy Chimpanzee', 184, 136, 210, 213, 139, 192, 0, 0, 1237, 1),
(227, 'belt', 'Slimy Bat', 206, 118, 164, 64, 6, 23, 0, 0, 2198, 1),
(229, 'boots', 'Sluggish Guenon', 79, 107, 86, 148, 56, 81, 0, 0, 2052, 1),
(235, 'necklace', 'Smelly Chinchilla', 171, 29, 211, 14, 222, 212, 0, 0, 2259, 1),
(234, 'necklace', 'Crazy Guenon', 221, 60, 215, 62, 197, 166, 0, 0, 2229, 1),
(233, 'ring', 'Slimy Fox', 62, 176, 225, 8, 50, 176, 0, 0, 1509, 1),
(231, 'accessory', 'Sluggish Bat', 31, 202, 30, 53, 71, 132, 0, 0, 1440, 1),
(232, 'necklace', 'Loony Fox', 208, 204, 67, 139, 65, 69, 0, 0, 1533, 1),
(172, 'sword', 'Smelly Prawn of Cleverness', 0, 0, 0, 0, 0, 0, 10, 20, 1, 1),
(159, 'boots', 'Crazy Cow', 3, 74, 19, 50, 78, 42, 0, 0, 910, 1),
(222, 'wand', 'Harmfull Duck', 67, 113, 98, 35, 198, 2, 409, 473, 1685, 1),
(174, 'shield', 'Smelly Cow', 4, 1, 10, 1, 7, 10, 0, 0, 99, 1),
(236, 'ring', 'Blind Badger', 84, 24, 156, 35, 65, 28, 0, 0, 1313, 1),
(220, 'shield', 'Slimy Meerkat', 126, 94, 1, 0, 133, 177, 0, 0, 1565, 1),
(221, 'wand', 'Blind Kangaroo', 181, 117, 89, 50, 120, 21, 266, 526, 1857, 1),
(156, 'belt', 'Blind Duck', 65, 90, 74, 78, 33, 66, 0, 0, 712, 1),
(160, 'ring', 'Creepy Hippo', 136, 130, 32, 36, 123, 66, 0, 0, 1422, 1),
(176, 'sword', 'Blind Cow', 6, 9, 4, 2, 8, 5, 18, 20, 87, 1),
(177, 'wand', 'Crazy Chinchilla', 4, 6, 3, 9, 0, 2, 11, 22, 95, 1),
(178, 'shield', 'Podgy Chimpanzee', 0, 10, 6, 6, 6, 2, 0, 0, 76, 1),
(181, 'wand', 'Loony Guenon', 2, 6, 7, 9, 11, 7, 16, 30, 63, 1),
(182, 'sword', 'Sluggish Prawn of Underworld', 0, 0, 0, 0, 0, 0, 10, 20, 1, 1),
(206, 'sword', 'Crazy Chinchilla', 3, 5, 3, 1, 3, 7, 16, 22, 69, 1),
(205, 'wand', 'Blind Chimpanzee', 9, 9, 5, 9, 5, 7, 18, 26, 78, 1),
(203, 'shield', 'Crazy Hamster', 4, 10, 4, 0, 8, 10, 0, 0, 55, 1),
(204, 'sword', 'Smelly Hamster', 6, 5, 8, 4, 3, 2, 17, 30, 54, 1),
(201, 'sword', 'Harmfull Hamster', 5, 4, 0, 6, 4, 1, 14, 27, 57, 1),
(202, 'sword', 'Harmfull Prawn', 5, 9, 10, 0, 2, 0, 13, 22, 98, 1),
(211, 'belt', 'Creepy Fox', 9, 7, 10, 3, 0, 5, 0, 0, 100, 1),
(210, 'belt', 'Crazy Sheep', 0, 2, 6, 3, 1, 2, 0, 0, 66, 1),
(209, 'armor', 'Crazy Meerkat', 9, 4, 10, 0, 2, 3, 0, 0, 84, 1),
(208, 'boots', 'Creepy Swine', 8, 2, 1, 6, 7, 10, 0, 0, 65, 1),
(207, 'boots', 'Weird Kangaroo', 8, 0, 6, 4, 7, 5, 0, 0, 73, 1),
(212, 'gloves', 'Loony Kangaroo', 1, 3, 6, 7, 9, 10, 0, 0, 72, 1),
(213, 'ring', 'Blind Swine', 7, 10, 5, 3, 3, 2, 0, 0, 70, 1),
(214, 'ring', 'Loony Guenon', 1, 3, 2, 8, 0, 1, 0, 0, 82, 1),
(215, 'ring', 'Blind Meerkat', 3, 1, 7, 0, 9, 4, 0, 0, 96, 1),
(216, 'accessory', 'Slimy Chimpanzee', 10, 3, 5, 6, 5, 8, 0, 0, 98, 1),
(217, 'accessory', 'Sluggish Fox', 8, 4, 4, 4, 7, 0, 0, 0, 76, 1),
(218, 'ring', 'Weird Guenon', 6, 2, 3, 1, 3, 9, 0, 0, 67, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_looks`
--

DROP TABLE IF EXISTS `item_looks`;
CREATE TABLE IF NOT EXISTS `item_looks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `item_looks`
--

TRUNCATE TABLE `item_looks`;
--
-- Dumping data for table `item_looks`
--

INSERT INTO `item_looks` (`id`, `item_type`, `image_url`) VALUES
(1, NULL, 'images/items/example_item.png');

-- --------------------------------------------------------

--
-- Table structure for table `look_variant_colors`
--

DROP TABLE IF EXISTS `look_variant_colors`;
CREATE TABLE IF NOT EXISTS `look_variant_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `look_variant_colors`
--

TRUNCATE TABLE `look_variant_colors`;
--
-- Dumping data for table `look_variant_colors`
--

INSERT INTO `look_variant_colors` (`id`, `name`) VALUES
(1, 'brown'),
(2, 'red'),
(3, 'yellow'),
(4, 'purple'),
(5, 'green'),
(6, 'orange'),
(7, 'pink'),
(8, 'white'),
(9, 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
-- --------------------------------------------------------

--
-- Table structure for table `monsters`
--

DROP TABLE IF EXISTS `monsters`;
CREATE TABLE IF NOT EXISTS `monsters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `character_id` int(11) NOT NULL,
  `armor_points` int(11) NOT NULL,
  `damage_min_points` int(11) NOT NULL,
  `damage_max_points` int(11) DEFAULT NULL,
  `attack_type` varchar(10) COLLATE utf8_polish_ci NOT NULL DEFAULT 'melee',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `monsters`
--

TRUNCATE TABLE `monsters`;
--
-- Dumping data for table `monsters`
--

INSERT INTO `monsters` (`id`, `character_id`, `armor_points`, `damage_min_points`, `damage_max_points`, `attack_type`) VALUES
(67, 70, 0, 23, 36, 'magic'),
(65, 68, 0, 20, 24, 'magic'),
(66, 69, 0, 22, 35, 'melee'),
(76, 80, 0, 16, 21, 'magic'),
(75, 79, 0, 14, 26, 'magic'),
(74, 78, 0, 19, 22, 'magic'),
(155, 162, 26, 938, 1145, 'melee'),
(156, 163, 20, 972, 1715, 'magic'),
(157, 164, 22, 1446, 1802, 'magic');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `password_resets`
--

TRUNCATE TABLE `password_resets`;
-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience_points` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `required_experience_points` bigint(20) UNSIGNED NOT NULL DEFAULT '1000',
  `glory_points` int(11) NOT NULL DEFAULT '0',
  `weapon_id` int(11) DEFAULT NULL,
  `shield_id` int(11) DEFAULT NULL,
  `helmet_id` int(11) DEFAULT NULL,
  `armor_id` int(11) DEFAULT NULL,
  `gloves_id` int(11) DEFAULT NULL,
  `belt_id` int(11) DEFAULT NULL,
  `boots_id` int(11) DEFAULT NULL,
  `necklace_id` int(11) DEFAULT NULL,
  `ring_id` int(11) DEFAULT NULL,
  `accesory_id` int(11) DEFAULT NULL,
  `backpack_id` int(11) NOT NULL,
  `amount_of_gold` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `busy` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'f',
  PRIMARY KEY (`id`),
  UNIQUE KEY `players_user_id_unique` (`user_id`),
  UNIQUE KEY `players_character_id_unique` (`character_id`),
  UNIQUE KEY `players_backpack_id_unique` (`backpack_id`),
  UNIQUE KEY `players_weapon_id_unique` (`weapon_id`),
  UNIQUE KEY `players_shield_id_unique` (`shield_id`),
  UNIQUE KEY `players_helmet_id_unique` (`helmet_id`),
  UNIQUE KEY `players_armor_id_unique` (`armor_id`),
  UNIQUE KEY `players_gloves_id_unique` (`gloves_id`),
  UNIQUE KEY `players_belt_id_unique` (`belt_id`),
  UNIQUE KEY `players_boots_id_unique` (`boots_id`),
  UNIQUE KEY `players_necklace_id_unique` (`necklace_id`),
  UNIQUE KEY `players_ring_id_unique` (`ring_id`),
  UNIQUE KEY `players_accesory_id_unique` (`accesory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `players`
--

TRUNCATE TABLE `players`;
--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `user_id`, `character_id`, `description`, `experience_points`, `required_experience_points`, `glory_points`, `weapon_id`, `shield_id`, `helmet_id`, `armor_id`, `gloves_id`, `belt_id`, `boots_id`, `necklace_id`, `ring_id`, `accesory_id`, `backpack_id`, `amount_of_gold`, `busy`) VALUES
(1, 1, 1, 'Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies.', 4948, 11417, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8929, 'f'),
(2, 2, 2, NULL, 0, 1000, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 'f'),
(3, 3, 3, NULL, 0, 1000, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 'f'),
(4, 5, 71, NULL, 864, 1000, 0, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 192, 'f'),
(5, 6, 81, NULL, 14107, 22894, -30, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 45597, 'f'),
(6, 7, 157, NULL, 1035, 1190, 0, 172, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 27, 'f'),
(7, 9, 161, NULL, 0, 1000, 0, 182, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 0, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `quests`
--

DROP TABLE IF EXISTS `quests`;
CREATE TABLE IF NOT EXISTS `quests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `experience_points_reward` int(11) NOT NULL,
  `amount_of_gold_reward` int(11) NOT NULL,
  `item_reward_id` int(11) DEFAULT NULL,
  `monster_id` int(11) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `quests`
--

TRUNCATE TABLE `quests`;
--
-- Dumping data for table `quests`
--

INSERT INTO `quests` (`id`, `player_id`, `name`, `experience_points_reward`, `amount_of_gold_reward`, `item_reward_id`, `monster_id`, `end_date`, `duration`) VALUES
(54, 1, 'Blind Guenon', 4466, 2166, NULL, 67, NULL, 45),
(63, 4, 'Creepy Bat', 1550, 141, 41, 76, NULL, 60),
(53, 1, 'Smelly Chimpanzee', 2896, 1457, 33, 66, NULL, 30),
(52, 1, 'Blind Badger', 3897, 1654, 32, 65, NULL, 30),
(62, 4, 'Smelly Swine', 1176, 186, 40, 75, NULL, 15),
(61, 4, 'Slimy Hamster', 678, 178, 39, 74, NULL, 15),
(144, 5, 'Podgy Chimpanzee', 6456, 2946, NULL, 157, NULL, 1),
(143, 5, 'Creepy Prawn', 3633, 3914, NULL, 156, NULL, 1),
(142, 5, 'Creepy Duck', 6236, 3470, NULL, 155, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
CREATE TABLE IF NOT EXISTS `shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `player_id` int(11) NOT NULL,
  `backpack_id` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `shops`
--

TRUNCATE TABLE `shops`;
--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `type`, `player_id`, `backpack_id`, `last_update`) VALUES
(1, 'armorer', 1, 10, '2016-11-27 13:31:38'),
(2, 'armorer', 5, 12, '2016-12-07 14:17:39'),
(3, 'blacksmith', 5, 13, '2016-12-07 14:17:39'),
(4, 'jeweler', 5, 14, '2016-12-07 14:17:40'),
(5, 'armorer', 6, 16, '2016-12-06 18:25:05'),
(6, 'armorer', 7, 18, '2016-12-07 10:04:20'),
(7, 'blacksmith', 7, 19, '2016-12-07 10:04:20'),
(8, 'jeweler', 7, 20, '2016-12-07 10:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kmiecik.piotr.93@gmail.com', '$2y$10$Hgsbilor0uNolnYk.AjCvOOY7rm8cYNhtv65NyXtSVY.qCmsECBd2', 'W2hnb5fWOd1teLOXyx1IUoaGEJkf6DGvg7VNdbimdc15kIms99mMQGink4O5', '2016-11-02 14:15:42', '2016-11-19 14:10:29'),
(2, 'test@test.pl', '$2y$10$xfpeXlM30.C8.4ndJkM0zuNQJ1Ob1f4JUHx9eS44N3X2RLKJpvlf.', 'Xq5McHIs5IH4PcXYFbQ7XsrMCXYKvGKMqeDkkDIAK14DOBWXSqgCLbgYBg08', '2016-11-09 13:42:18', '2016-11-09 15:10:24'),
(3, 'test2@test.pl', '$2y$10$20t.9nuptLXMiv3GBdgC6.44iVLpcCJPzW5Bw0QHQpuMJTrD8k.PK', 'PBh3DAyHWrSIXMm0Le6n7Xz4lXCuNV4CBPjNwRYVuYhZIgYVASgn4hheKAJj', '2016-11-09 15:12:43', '2016-11-09 15:14:46'),
(4, 'test3@test.pl', '$2y$10$HK6.brBjbtD6MxxAmeQnkecRuHuiufxs4YpDMh6PZ3E99R8A3044u', 'uhIAj2VH5sm4IsWGp8ulc56Jcezccc20l39MsrRmNlePLYH2bZGFX54ui1Tl', '2016-11-10 14:21:11', '2016-11-19 14:11:09'),
(5, 'jan.twardowski@ksiezyc.pl', '$2y$10$MJjJUOnXe2sJL26uBePIjey7gaRBu2M7dOgLkuXCkVJ0vPUk9C.K.', NULL, '2016-11-23 14:33:22', '2016-11-23 14:33:22'),
(6, 'ckmkingkong@gmail.com', '$2y$10$A15lsllLED6I40hu75j5jenjUVGA1RCk/77NAOYR07juaY/7zfzS.', 'O6vNYKRSQe9BHeSeCkTl3BnSTJfhHXu4LWFM3AsYA7m9KAqqc9XoK6caz3hS', '2016-12-03 13:59:36', '2016-12-06 18:01:39'),
(7, 'eqweqw@qweqw.pl', '$2y$10$4sorgbnRm7.qe.fCgzGTV.KKBxSHfoDY57sj54iPqBRurF6lEEPQq', NULL, '2016-12-06 18:01:52', '2016-12-06 18:01:52'),
(8, 'pol@pa.pl', '$2y$10$ul0r7XELQJwVt9LovjiK8usMHz/Arz4mzrsO42dza.kIx2Qiplh9W', NULL, '2016-12-07 09:00:54', '2016-12-07 09:00:54'),
(9, 'qweqw@qwew.pl', '$2y$10$GTimqorbmJ1rgEGeGuiSIu8j8M9I7c5cb9zChk8z3yuI.bY272dSS', NULL, '2016-12-07 09:17:32', '2016-12-07 09:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

DROP TABLE IF EXISTS `words`;
CREATE TABLE IF NOT EXISTS `words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `words`
--

TRUNCATE TABLE `words`;
--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `word`, `type`) VALUES
(1, 'Creepy', 1),
(2, 'Crazy', 1),
(3, 'Weird', 1),
(4, 'Duck', 2),
(5, 'Hippo', 2),
(6, 'Cow', 2),
(7, 'Sheep', 2),
(8, 'Meerkat', 2),
(9, 'Hamster', 2),
(10, 'Guenon', 2),
(11, 'Chinchilla', 2),
(12, 'Obscurity', 3),
(13, 'Rainbow', 3),
(14, 'Slimy', 1),
(15, 'Smelly', 1),
(16, 'Sluggish', 1),
(17, 'Loony', 1),
(18, 'Podgy', 1),
(19, 'Blind', 1),
(20, 'Harmfull', 1),
(21, 'Badger', 2),
(22, 'Prawn', 2),
(23, 'Chimpanzee', 2),
(24, 'Kangaroo', 2),
(25, 'Swine', 2),
(26, 'Fox', 2),
(27, 'Bat', 2),
(28, 'Seas', 3),
(29, 'Destiny', 3),
(30, 'Glory', 3),
(31, 'Extinction', 3),
(32, 'Mystery', 3),
(33, 'Cleverness', 3),
(34, 'Underworld', 3);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE IF NOT EXISTS `works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '1',
  `end_date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `works_player_id_uindex` (`player_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Truncate table before insert `works`
--

TRUNCATE TABLE `works`;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
