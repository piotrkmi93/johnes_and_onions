-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lis 2016, 17:40
-- Wersja serwera: 5.7.11
-- Wersja PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `johnes_and_onions`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `backpacks`
--

CREATE TABLE `backpacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `capacity` int(1) NOT NULL DEFAULT '6'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `backpacks`
--

INSERT INTO `backpacks` (`id`, `capacity`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `backpack_items`
--

CREATE TABLE `backpack_items` (
  `id` int(11) NOT NULL,
  `backpack_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `characters`
--

CREATE TABLE `characters` (
  `id` int(10) UNSIGNED NOT NULL,
  `character_look_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `strength_points` int(11) NOT NULL DEFAULT '10',
  `dexterity_points` int(11) NOT NULL DEFAULT '10',
  `intelligence_points` int(11) NOT NULL DEFAULT '10',
  `durability_points` int(11) NOT NULL DEFAULT '10',
  `luck_points` int(11) NOT NULL DEFAULT '10'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `characters`
--

INSERT INTO `characters` (`id`, `character_look_id`, `name`, `level`, `strength_points`, `dexterity_points`, `intelligence_points`, `durability_points`, `luck_points`) VALUES
(1, 1, 'Pepe Pan Pepson', 1, 10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `character_looks`
--

CREATE TABLE `character_looks` (
  `id` int(11) NOT NULL,
  `hair_variant_id` int(11) NOT NULL,
  `eyebrow_variant_id` int(11) NOT NULL,
  `eyes_variant_id` int(11) DEFAULT NULL,
  `mouth_variant_id` int(11) NOT NULL,
  `head_variant_id` int(11) NOT NULL,
  `nose_variant_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `character_looks`
--

INSERT INTO `character_looks` (`id`, `hair_variant_id`, `eyebrow_variant_id`, `eyes_variant_id`, `mouth_variant_id`, `head_variant_id`, `nose_variant_id`) VALUES
(1, 4, 2, 3, 7, 5, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `character_look_variants`
--

CREATE TABLE `character_look_variants` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `look_variant_color_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `character_look_variants`
--

INSERT INTO `character_look_variants` (`id`, `type`, `look_variant_color_id`, `image_url`) VALUES
(1, 'body', 1, 'images/body1.png'),
(2, 'eyebrow', 2, 'images/eyebrow1.png'),
(3, 'eyes', 3, 'images/eyes1.png'),
(4, 'hair', 2, 'images/hair1.png'),
(5, 'head', 1, 'images/head1.png'),
(7, 'mouth', NULL, 'images/mouth1.png'),
(8, 'nose', NULL, 'images/nose1.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `armor_points` bigint(20) NOT NULL DEFAULT '0',
  `strength_points` bigint(20) NOT NULL DEFAULT '0',
  `dexterity_points` bigint(20) NOT NULL DEFAULT '0',
  `intelligence_points` bigint(20) NOT NULL DEFAULT '0',
  `durability_points` bigint(20) NOT NULL DEFAULT '0',
  `lucky_points` bigint(20) NOT NULL DEFAULT '0',
  `damage_min_points` bigint(20) NOT NULL DEFAULT '0',
  `damage_max_points` bigint(20) NOT NULL DEFAULT '0',
  `price` bigint(20) NOT NULL,
  `item_look_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `items`
--

INSERT INTO `items` (`id`, `type`, `name`, `armor_points`, `strength_points`, `dexterity_points`, `intelligence_points`, `durability_points`, `lucky_points`, `damage_min_points`, `damage_max_points`, `price`, `item_look_id`) VALUES
(1, 'sword', 'Crazy Cow of Rainbow', 0, 0, 0, 0, 0, 0, 10, 20, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `look_variant_colors`
--

CREATE TABLE `look_variant_colors` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `look_variant_colors`
--

INSERT INTO `look_variant_colors` (`id`, `name`) VALUES
(1, 'white'),
(2, 'brown'),
(3, 'green');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `monsters`
--

CREATE TABLE `monsters` (
  `id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `armor_points` int(11) NOT NULL,
  `damage_min_points` int(11) NOT NULL,
  `damage_max_points` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `amount_of_gold` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `players`
--

INSERT INTO `players` (`id`, `user_id`, `character_id`, `description`, `experience_points`, `required_experience_points`, `glory_points`, `weapon_id`, `shield_id`, `helmet_id`, `armor_id`, `gloves_id`, `belt_id`, `boots_id`, `necklace_id`, `ring_id`, `accesory_id`, `backpack_id`, `amount_of_gold`) VALUES
(1, 1, 1, NULL, 0, 1000, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quests`
--

CREATE TABLE `quests` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `experience_points_reward` int(11) NOT NULL,
  `amount_of_gold_reward` int(11) NOT NULL,
  `item_reward_id` int(11) DEFAULT NULL,
  `monster_id` int(11) NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `duration` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kmiecik.piotr.93@gmail.com', '$2y$10$GACScLML6iY1WQ8vYFc6vOqA2iuv6z/hzj32drTocGxfTWWpbYCk2', NULL, '2016-11-02 14:15:42', '2016-11-02 14:15:42');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `word` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `words`
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
(13, 'Rainbow', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `backpacks`
--
ALTER TABLE `backpacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backpack_items`
--
ALTER TABLE `backpack_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_looks`
--
ALTER TABLE `character_looks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_look_variants`
--
ALTER TABLE `character_look_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `look_variant_colors`
--
ALTER TABLE `look_variant_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monsters`
--
ALTER TABLE `monsters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `players_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `players_character_id_unique` (`character_id`),
  ADD UNIQUE KEY `players_backpack_id_unique` (`backpack_id`),
  ADD UNIQUE KEY `players_weapon_id_unique` (`weapon_id`),
  ADD UNIQUE KEY `players_shield_id_unique` (`shield_id`),
  ADD UNIQUE KEY `players_helmet_id_unique` (`helmet_id`),
  ADD UNIQUE KEY `players_armor_id_unique` (`armor_id`),
  ADD UNIQUE KEY `players_gloves_id_unique` (`gloves_id`),
  ADD UNIQUE KEY `players_belt_id_unique` (`belt_id`),
  ADD UNIQUE KEY `players_boots_id_unique` (`boots_id`),
  ADD UNIQUE KEY `players_necklace_id_unique` (`necklace_id`),
  ADD UNIQUE KEY `players_ring_id_unique` (`ring_id`),
  ADD UNIQUE KEY `players_accesory_id_unique` (`accesory_id`);

--
-- Indexes for table `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `backpacks`
--
ALTER TABLE `backpacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `backpack_items`
--
ALTER TABLE `backpack_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `character_looks`
--
ALTER TABLE `character_looks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `character_look_variants`
--
ALTER TABLE `character_look_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `look_variant_colors`
--
ALTER TABLE `look_variant_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `monsters`
--
ALTER TABLE `monsters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `quests`
--
ALTER TABLE `quests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- 09.11.2016 Aktualizacja baz Lukasz Adler
TRUNCATE TABLE  forge.look_variant_colors
INSERT INTO forge.look_variant_colors (name) VALUES ('brown');
INSERT INTO forge.look_variant_colors (name) VALUES ('red');
INSERT INTO forge.look_variant_colors (name) VALUES ('yellow');
INSERT INTO forge.look_variant_colors (name) VALUES ('purple');
INSERT INTO forge.look_variant_colors (name) VALUES ('green');
INSERT INTO forge.look_variant_colors (name) VALUES ('orange');
INSERT INTO forge.look_variant_colors (name) VALUES ('pink');
INSERT INTO forge.look_variant_colors (name) VALUES ('white');
INSERT INTO forge.look_variant_colors (name) VALUES ('blue');

TRUNCATE TABLE character_look_variants
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('body', 1, 'images/body1.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_1', 1, 'images/player/eyebrows/1/brwi1.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_1', 1, 'images/player/eyes/1/oczy1.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('hair_1', 1, 'images/player/hairs/1/hair1.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_1', 1, 'images/player/heads/1/glowak1.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('mouth', null, 'images/mouth1.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('nose_1', null, 'images/player/noses/nose1.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_1', 2, 'images/player/eyebrows/1/brwi2.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_1', 3, 'images/player/eyebrows/1/brwi3.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_1', 4, 'images/player/eyebrows/1/brwi4.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_1', 5, 'images/player/eyebrows/1/brwi5.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_1', 6, 'images/player/eyebrows/1/brwi6.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_1', 7, 'images/player/eyebrows/1/brwi7.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_1', 8, 'images/player/eyebrows/1/brwi8.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_1', 9, 'images/player/eyebrows/1/brwi9.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('hair_1', 2, 'images/player/hairs/1/hair2.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('hair_1', 3, 'images/player/hairs/1/hair3.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('hair_1', 4, 'images/player/hairs/1/hair4.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('hair_1', 5, 'images/player/hairs/1/hair5.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('hair_1', 6, 'images/player/hairs/1/hair6.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('hair_1', 7, 'images/player/hairs/1/hair7.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('hair_1', 8, 'images/player/hairs/1/hair8.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('hair_1', 9, 'images/player/hairs/1/hair9.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_1', 2, 'images/player/eyes/1/oczy2.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_1', 3, 'images/player/eyes/1/oczy3.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_1', 4, 'images/player/eyes/1/oczy4.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_1', 5, 'images/player/eyes/1/oczy5.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_1', 6, 'images/player/eyes/1/oczy6.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_1', 7, 'images/player/eyes/1/oczy7.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_1', 8, 'images/player/eyes/1/oczy8.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_1', 2, 'images/player/heads/1/glowak2.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_1', 3, 'images/player/heads/1/glowak3.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_1', 4, 'images/player/heads/1/glowak4.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_1', 5, 'images/player/heads/1/glowak5.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_1', 6, 'images/player/heads/1/glowak6.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_1', 7, 'images/player/heads/1/glowak7.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_1', 8, 'images/player/heads/1/glowak8.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_1', 9, 'images/player/heads/1/glowak9.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_2', 1, 'images/player/eyebrows/2/brwi1.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_2', 2, 'images/player/eyebrows/2/brwi2.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_2', 3, 'images/player/eyebrows/2/brwi3.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_2', 4, 'images/player/eyebrows/2/brwi4.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_2', 5, 'images/player/eyebrows/2/brwi5.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_2', 6, 'images/player/eyebrows/2/brwi6.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_2', 7, 'images/player/eyebrows/2/brwi7.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_2', 8, 'images/player/eyebrows/2/brwi8.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyebrow_2', 9, 'images/player/eyebrows/2/brwi9.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_2', 1, 'images/player/heads/2/glowa2k1.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_2', 2, 'images/player/heads/2/glowa2k2.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_2', 3, 'images/player/heads/2/glowa2k3.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_2', 4, 'images/player/heads/2/glowa2k4.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_2', 5, 'images/player/heads/2/glowa2k5.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_2', 6, 'images/player/heads/2/glowa2k6.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_2', 7, 'images/player/heads/2/glowa2k7.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_2', 8, 'images/player/heads/2/glowa2k8.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('head_2', 9, 'images/player/heads/2/glowa2k9.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_1', 9, 'images/player/eyes/1/oczy9.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_2', 1, 'images/player/eyes/2/oczy1j.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_2', 2, 'images/player/eyes/2/oczy2j.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_2', 3, 'images/player/eyes/2/oczy3j.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_2', 4, 'images/player/eyes/2/oczy4j.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_2', 5, 'images/player/eyes/2/oczy5j.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_2', 6, 'images/player/eyes/2/oczy6j.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_2', 7, 'images/player/eyes/2/oczy7j.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_2', 8, 'images/player/eyes/2/oczy8j.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('eyes_2', 9, 'images/player/eyes/2/oczy9j.png');
INSERT INTO character_look_variants (type, look_variant_color_id, image_url) VALUES ('nose_2', null, 'images/player/noses/nose2.png');