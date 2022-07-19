-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 juil. 2022 à 21:52
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tft_database_tool`
--

-- --------------------------------------------------------

--
-- Structure de la table `champion`
--

CREATE TABLE `champion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` smallint(6) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `champion`
--

INSERT INTO `champion` (`id`, `name`, `origine`, `cost`, `image`) VALUES
(1, 'Ornn', 'Tempest Bruiser Legend', 4, 'Ornn.png'),
(2, 'Aatrox', 'Shimmerscale Warrior', 1, 'Aatrox.png'),
(3, 'Ezreal', 'Swiftshot Tempest', 1, 'Ezreal.png'),
(4, 'Sejuani', 'Guild Cavalier', 1, 'Sejuani.png'),
(5, 'TahmKench', 'Revel Bruiser', 1, 'TahmKench.png'),
(6, 'Heimerdinger', 'Trainer Mage', 1, 'Heimerdinger.png'),
(7, 'Karma', 'Dragonmancerne Jade', 1, 'Karma.png'),
(8, 'Senna', 'Ragewing Cannoneer', 1, 'Senna.png'),
(9, 'Leona', 'Mirage Guardian', 1, 'Leona.png'),
(10, 'Nami', 'Astrale Mage Mystic', 2, 'Nami.png'),
(11, 'Vladimir', 'Astral Mage', 1, 'Vladimir.png'),
(12, 'Sett', 'Ragewing Dragonmancer', 1, 'Sett.png'),
(13, 'Skarner', 'Astral Bruiser', 1, 'Skarner.png'),
(14, 'Taric', 'Jade Guardian', 1, 'Taric.png'),
(15, 'Nidalee', 'Astrale Shapeshifter', 1, 'Nidalee.png'),
(16, 'Ashe', 'Jade, Dragonmancerne, Tireuse d\'élite', 2, 'Ashe.png'),
(17, 'Braum', 'Scalescorn Gardien', 2, 'Braum.png'),
(18, 'Yone', 'Mirage Warrior', 2, 'Yone.png'),
(19, 'Twitch', 'Guild Swiftshot', 2, 'Twitch.png'),
(20, 'Gnar', 'Shapeshifter Jade', 2, 'Gnar.png'),
(21, 'Jinx', 'Revel Cannoneer', 2, 'Jinx.png'),
(22, 'Kayn', 'Ragewing Shimmerscale Assassin', 2, 'Kayn.png'),
(23, 'Lillia', 'Scalescorn Cavalier Mage', 2, 'Lillia.png'),
(24, 'Thresh', 'Whispers Gardien', 2, 'Thresh.png'),
(25, 'Tristana', 'Trainer Cannoneer', 2, 'Tristana.png'),
(26, 'Shen', 'Ragewing Bruiser Warrior', 2, 'Shen.png'),
(27, 'Qiyana', 'Tempest Assassin', 2, 'Qiyana.png'),
(28, 'Illaoi', 'Astrale Bruisere', 3, 'Illaoi.png'),
(29, 'Lulu', 'Mystic Evoker Trainer', 3, 'Lulu.png'),
(30, 'Swain', 'Shapeshifter Ragewing Dragonmancer', 3, 'Swain.png'),
(31, 'Anivia', 'Jade Evoker Legend', 3, 'Anivia.png'),
(32, 'Diana', 'Scalescorn Assassin', 3, 'Diana.png'),
(33, 'Elise', 'Shapeshifter Wisper', 3, 'Elise.png'),
(34, 'LeeSin', 'Tempest Dragonmancer', 3, 'LeeSin.png'),
(35, 'Nunu', 'Mirage Cavalier', 3, 'Nunu.png'),
(36, 'Olaf', 'Scalescorn Bruiser Warrior', 3, 'Olaf.png'),
(37, 'Ryze', 'Guild Mage', 3, 'Ryze.png'),
(38, 'Sylas', 'Whispers Mage Bruiser', 3, 'Sylas.png'),
(39, 'Varus', 'Astral Swiftshot', 3, 'Varus.png'),
(40, 'Volibear', 'Shimmerscale Dragonmancer Legend', 3, 'Volibear.png'),
(41, 'Daeja', 'Dragon Mirage', 4, 'Daeja.png'),
(42, 'Idas', 'Dragon Shimmerscale Gardien', 8, 'Idas.png'),
(43, 'SyFen', 'Dragon Whispers Bruiser', 4, 'SyFen.png'),
(44, 'ShiOhYu', 'Dragon Jade Mystic', 8, 'ShiOhYu.png'),
(45, 'Corki', 'Revel Cannoneer', 4, 'Corki.png'),
(46, 'Talon', 'Guild Assassin', 4, 'Talon.png'),
(47, 'Hecarim', 'Ragewing Cavalier', 4, 'Hecarim.png'),
(48, 'Neeko', 'Shapeshifter Jade', 4, 'Neeko.png'),
(49, 'Sona', 'Revel Evoker', 4, 'Sona.png'),
(50, 'Xayah', 'Ragewing Swiftshot', 4, 'Xayah.png'),
(51, 'AoShin', 'Dragon Tempest', 10, 'AoShin.png'),
(52, 'AurelionSol', 'Dragon Astral Evoker', 10, 'AurelionSol.png'),
(53, 'Shyvana', 'Dragon Ragewing Shapeshifter', 10, 'Shyvana.png'),
(54, 'Bard', 'Bard Guild Mystic', 5, 'Bard.png'),
(55, 'Yasuo', 'Mirage Dragonmancer Warrior', 5, 'Yasuo.png'),
(56, 'Zoé', 'Shimmerscale Mage Spell Thief', 5, 'Zoé.png'),
(57, 'Pyke', 'Whispers Assassin', 5, 'Pyke.png'),
(58, 'Soraka', 'Jade Starcaller', 5, 'Soraka.png'),
(59, 'Daeja', 'Mirage Dragon', 8, 'Daeja.png');

-- --------------------------------------------------------

--
-- Structure de la table `champion_item`
--

CREATE TABLE `champion_item` (
  `id` int(11) NOT NULL,
  `champion_id` int(11) DEFAULT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `champion_item`
--

INSERT INTO `champion_item` (`id`, `champion_id`, `rank`) VALUES
(18, 1, 'A');

-- --------------------------------------------------------

--
-- Structure de la table `champion_item_item`
--

CREATE TABLE `champion_item_item` (
  `champion_item_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `champion_item_item`
--

INSERT INTO `champion_item_item` (`champion_item_id`, `item_id`) VALUES
(18, 1),
(18, 8),
(18, 55);

-- --------------------------------------------------------

--
-- Structure de la table `champion_item_position`
--

CREATE TABLE `champion_item_position` (
  `id` int(11) NOT NULL,
  `champion_item_id` int(11) NOT NULL,
  `position` smallint(6) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `champion_item_position`
--

INSERT INTO `champion_item_position` (`id`, `champion_item_id`, `position`, `item_id`) VALUES
(16, 18, 0, 55),
(17, 18, 1, 1),
(18, 18, 2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220717233431', '2022-07-18 01:34:44', 811),
('DoctrineMigrations\\Version20220717233738', '2022-07-18 01:37:43', 81),
('DoctrineMigrations\\Version20220717235215', '2022-07-18 01:52:21', 397),
('DoctrineMigrations\\Version20220718215142', '2022-07-18 23:51:53', 464),
('DoctrineMigrations\\Version20220719182715', '2022-07-19 20:27:32', 635),
('DoctrineMigrations\\Version20220719184756', '2022-07-19 20:48:07', 416);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`id`, `name`, `image`) VALUES
(1, 'archangels staff', 'archangels-staff.png'),
(2, 'assassin emblem', 'assassin-emblem.png'),
(3, 'banshees claw', 'banshees-claw.png'),
(4, 'bf sword', 'bf-sword.png'),
(5, 'Bloodthirster', 'Bloodthirster.png'),
(6, 'blue buff', 'blue-buff.png'),
(7, 'bramble vest', 'bramble-vest.png'),
(8, 'cavalier emblem', 'cavalier-emblem.png'),
(9, 'chain vest', 'chain-vest.png'),
(10, 'chalice of power', 'chalice-of-power.png'),
(11, 'deathblade', 'deathblade.png'),
(12, 'dragonmancer emblem', 'dragonmancer-emblem.png'),
(13, 'dragons claw', 'dragons-claw.png'),
(14, 'edge of night', 'edge-of-night.png'),
(15, 'frozen heart', 'frozen-heart.png'),
(16, 'gargoyle stoneplate', 'gargoyle-stoneplate.png'),
(17, 'giant slayer', 'giant-slayer.png'),
(18, 'giants belt', 'giants-belt.png'),
(19, 'guardian emblem', 'guardian-emblem.png'),
(20, 'guinsoos rageblade', 'guinsoos-rageblade.png'),
(21, 'GuinsoosRageblade', 'GuinsoosRageblade.png'),
(22, 'hand of justice', 'hand-of-justice.png'),
(23, 'hextech gunblade', 'hextech-gunblade.png'),
(24, 'infinity edge', 'infinity-edge.png'),
(25, 'ionic spark', 'ionic-spark.png'),
(26, 'jeweled gauntlet', 'jeweled-gauntlet.png'),
(27, 'last whisper', 'last-whisper.png'),
(28, 'locket of the iron solari', 'locket-of-the-iron-solari.png'),
(29, 'mage emblem', 'mage-emblem.png'),
(30, 'mirage emblem', 'mirage-emblem.png'),
(31, 'morellonomicon', 'morellonomicon.png'),
(32, 'needlessly large rod', 'needlessly-large-rod.png'),
(33, 'negatron cloak', 'negatron-cloak.png'),
(34, 'Quicksilver', 'Quicksilver.png'),
(35, 'rabadons deathcap', 'rabadons-deathcap.png'),
(36, 'ragewing emblem', 'ragewing-emblem.png'),
(37, 'rapid firecannon', 'rapid-firecannon.png'),
(38, 'recurve bow', 'recurve-bow.png'),
(39, 'redemption', 'redemption.png'),
(40, 'runaans hurricane', 'runaans-hurricane.png'),
(41, 'shimmerscale emblem', 'shimmerscale-emblem.png'),
(42, 'shroud of stillness', 'shroud-of-stillness.png'),
(43, 'sparring gloves', 'sparring-gloves.png'),
(44, 'spatula', 'spatula.png'),
(45, 'spear of shojin', 'spear-of-shojin.png'),
(46, 'statikk shiv', 'statikk-shiv.png'),
(47, 'sunfire cape', 'sunfire-cape.png'),
(48, 'tacticians crown', 'tacticians-crown.png'),
(49, 'tear of the goddess', 'tear-of-the-goddess.png'),
(50, 'thiefs gloves', 'thiefs-gloves.png'),
(51, 'titans resolve', 'titans-resolve.png'),
(52, 'warmogs armor', 'warmogs-armor.png'),
(53, 'zekes herald', 'zekes-herald.png'),
(54, 'zephyr', 'zephyr.png'),
(55, 'zzrot portal', 'zzrot-portal.png');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `champion`
--
ALTER TABLE `champion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `champion_item`
--
ALTER TABLE `champion_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34BA4A7FA7FD7EB` (`champion_id`);

--
-- Index pour la table `champion_item_item`
--
ALTER TABLE `champion_item_item`
  ADD PRIMARY KEY (`champion_item_id`,`item_id`),
  ADD KEY `IDX_94EA6C2C91136FF3` (`champion_item_id`),
  ADD KEY `IDX_94EA6C2C126F525E` (`item_id`);

--
-- Index pour la table `champion_item_position`
--
ALTER TABLE `champion_item_position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1488E8C491136FF3` (`champion_item_id`),
  ADD KEY `IDX_1488E8C4126F525E` (`item_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `champion`
--
ALTER TABLE `champion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `champion_item`
--
ALTER TABLE `champion_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `champion_item_position`
--
ALTER TABLE `champion_item_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `champion_item`
--
ALTER TABLE `champion_item`
  ADD CONSTRAINT `FK_D34BA4A7FA7FD7EB` FOREIGN KEY (`champion_id`) REFERENCES `champion` (`id`);

--
-- Contraintes pour la table `champion_item_item`
--
ALTER TABLE `champion_item_item`
  ADD CONSTRAINT `FK_94EA6C2C126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_94EA6C2C91136FF3` FOREIGN KEY (`champion_item_id`) REFERENCES `champion_item` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `champion_item_position`
--
ALTER TABLE `champion_item_position`
  ADD CONSTRAINT `FK_1488E8C4126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `FK_1488E8C491136FF3` FOREIGN KEY (`champion_item_id`) REFERENCES `champion_item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
