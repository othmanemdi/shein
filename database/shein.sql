-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 11 sep. 2022 à 18:43
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
-- Structure de la table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `date_cart` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(100) NOT NULL DEFAULT '''127.0.0.1''',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carts`
--

INSERT INTO `carts` (`id`, `date_cart`, `ip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-09-11 13:58:08', '77.0.0.1', '2022-09-11 13:58:08', '2022-09-11 13:58:08', NULL),
(2, '2022-09-11 14:00:47', '125.0.0.1', '2022-09-11 14:00:47', '2022-09-11 14:00:47', NULL),
(3, '2022-09-11 14:07:48', '127.0.0.1', '2022-09-11 14:07:48', '2022-09-11 14:07:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cart_produit`
--

CREATE TABLE `cart_produit` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `qt` int(11) NOT NULL DEFAULT 1,
  `prix` double(11,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cart_produit`
--

INSERT INTO `cart_produit` (`id`, `cart_id`, `produit_id`, `qt`, `prix`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 3, 1, 154.00, '2022-09-11 14:05:18', '2022-09-11 14:05:18', NULL),
(2, 2, 2, 1, 79.00, '2022-09-11 14:07:03', '2022-09-11 14:07:03', NULL),
(3, 3, 1, 1, 5787.52, '2022-09-11 14:07:48', '2022-09-11 14:07:48', NULL),
(4, 3, 1, 1, 5787.52, '2022-09-11 14:10:03', '2022-09-11 14:10:03', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Robes', '2022-09-04 11:56:56', '2022-09-04 11:56:56', NULL),
(2, 'Pentalons', '2022-09-04 11:56:56', '2022-09-04 11:56:56', NULL),
(4, 'Jeans', '2022-09-04 11:56:56', '2022-09-04 11:56:56', NULL),
(5, 'Chaissures', '2022-09-04 11:56:56', '2022-09-04 11:56:56', NULL),
(6, 'Sacs', '2022-09-04 11:56:56', '2022-09-04 11:56:56', NULL),
(7, 'Accessoires', '2022-09-04 11:56:56', '2022-09-04 11:56:56', NULL),
(8, 'Chemise', '2022-09-04 11:56:56', '2022-09-04 11:56:56', NULL),
(9, 'Veste', '2022-09-04 11:56:56', '2022-09-04 11:56:56', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `couleurs`
--

CREATE TABLE `couleurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `couleurs`
--

INSERT INTO `couleurs` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'blue', '2022-09-04 11:58:33', '2022-09-04 11:58:33', NULL),
(3, 'red', '2022-09-04 11:58:33', '2022-09-04 11:58:33', NULL),
(4, 'yellow', '2022-09-04 11:58:33', '2022-09-04 11:58:33', NULL),
(5, 'black', '2022-09-04 11:58:33', '2022-09-04 11:58:33', NULL),
(6, 'gray', '2022-09-04 11:58:33', '2022-09-04 11:58:33', NULL),
(7, 'orange', '2022-09-04 11:58:33', '2022-09-04 11:58:33', NULL),
(80, 'pink', '2022-09-11 12:16:01', '2022-09-11 12:16:01', NULL);

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
(23, 'Jack & jons', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', NULL),
(25, 'Test 2', 1, '2022-08-28 14:05:56', '2022-08-28 14:06:38', '2022-08-28 14:11:09'),
(26, 'Blue', 0, '2022-08-28 14:05:56', '2022-08-28 14:06:38', '2022-08-10 14:09:40'),
(27, 'test 777', 0, '2022-08-28 14:07:01', '2022-08-28 14:07:01', '2022-09-04 13:49:42'),
(28, 'Wiam', 1, '2022-09-04 12:22:02', '2022-09-04 12:23:08', '2022-09-04 13:49:39');

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
  `description` varchar(255) DEFAULT '''Lorem ipsum dolor sit amet consectetur adipisicing elit. Et minus velit repellendus aut reiciendis ex, ducimus dolorum facilis quos modi eum eligendi iste voluptatum aspernatur fuga iure odit, molestiae quisquam.''',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `image`, `reference`, `nom`, `marque_id`, `categorie_id`, `couleur_id`, `prix`, `ancien_prix`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'product_img1.jpg', 'Rt-888', 'Blue dress', 23, 1, 1, '5787.52', '6000.00', '', '2022-09-04 14:32:35', '2022-09-04 14:32:35', NULL),
(2, 'product_img10.jpg', 'Ch-99', 'Chemise rouge', 7, 8, 3, '79.00', '89.00', 'Chemise rouge !!!', '2022-09-04 14:34:22', '2022-09-04 14:34:22', NULL),
(3, 'product_img11.jpg', 'Jb-54', 'Black dress', 7, 1, 5, '154.00', '199.00', 'Flash Seals Black Dress', '2022-09-11 11:33:21', '2022-09-11 11:33:21', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cart_produit`
--
ALTER TABLE `cart_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `produit_id` (`produit_id`);

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
-- Index pour la table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cart_produit`
--
ALTER TABLE `cart_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `couleurs`
--
ALTER TABLE `couleurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart_produit`
--
ALTER TABLE `cart_produit`
  ADD CONSTRAINT `cart_produit_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_produit_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON UPDATE CASCADE;

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
