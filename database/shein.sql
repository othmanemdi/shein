-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 28 août 2022 à 16:12
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shein`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Robes'),
(2, 'Pentalons'),
(4, 'Jeans'),
(5, 'Chaissures'),
(6, 'Sacs'),
(7, 'Accessoires'),
(8, 'Chemise'),
(9, 'Veste');

-- --------------------------------------------------------

--
-- Structure de la table `couleurs`
--

CREATE TABLE `couleurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `couleurs`
--

INSERT INTO `couleurs` (`id`, `nom`) VALUES
(1, 'blue'),
(3, 'red'),
(4, 'yellow'),
(5, 'black'),
(6, 'gray'),
(7, 'orange');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `nom`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'NIKE', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', NULL),
(2, 'ADDIDAS', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', NULL),
(3, 'Luis vuiton', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', NULL),
(4, 'Chanele', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', NULL),
(5, 'puma', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', NULL),
(6, 'Zara', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', NULL),
(7, 'Bershka', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', NULL),
(8, 'Defacto', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', NULL),
(23, 'Jack & jons', 0, '2022-08-28 14:05:56', '2022-08-28 14:06:38', NULL),
(25, 'Test 2', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', '2022-08-28 14:11:09'),
(26, 'Blue', 0, '2022-08-28 14:05:56', '2022-08-28 14:06:38', '2022-08-10 14:09:40'),
(27, 'test 777', 1, '2022-08-28 14:07:01', '2022-08-28 14:07:01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '1.jpg',
  `reference` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `couleur_id` int(11) DEFAULT NULL,
  `prix` decimal(11,2) NOT NULL DEFAULT 0.00,
  `ancien_prix` decimal(11,2) NOT NULL DEFAULT 0.00,
  `qt` int(11) NOT NULL DEFAULT 0,
  `description` varchar(255) DEFAULT 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et minus velit repellendus aut reiciendis ex, ducimus dolorum facilis quos modi eum eligendi iste voluptatum aspernatur fuga iure odit, molestiae quisquam.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `image`, `reference`, `nom`, `marque_id`, `categorie_id`, `couleur_id`, `prix`, `ancien_prix`, `qt`, `description`) VALUES
(1, '1.jpg', 'RS-22', 'Red Shirt', 1, 8, 3, '59.00', '140.00', 20, 'Lorem Ipsum'),
(2, '1.jpg', 'BD-78', 'Blue Dress', 3, 1, 1, '49.00', '160.00', 10, 'Lorem Ipsum'),
(3, '1.jpg', 'BJ-34', 'Black Jacket', 3, 9, 5, '79.00', '180.00', 18, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et minus velit repellendus aut reiciendis ex, ducimus dolorum facilis quos modi eum eligendi iste voluptatum aspernatur fuga iure odit, molestiae quisquam.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `couleurs`
--
ALTER TABLE `couleurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marque_id` (`marque_id`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `produits_ibfk_3` (`couleur_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `couleurs`
--
ALTER TABLE `couleurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `produits_ibfk_3` FOREIGN KEY (`couleur_id`) REFERENCES `couleurs` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
