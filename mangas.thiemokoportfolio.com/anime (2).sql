-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 mars 2023 à 20:59
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mangas`
--

-- --------------------------------------------------------

--
-- Structure de la table `anime`
--

CREATE TABLE `anime` (
  `id` int(11) NOT NULL,
  `titre` text DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `episode` int(11) DEFAULT NULL,
  `realisateur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `producteur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `illustration` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `anime`
--

INSERT INTO `anime` (`id`, `titre`, `description`, `episode`, `realisateur`, `producteur`, `illustration`, `resume`) VALUES
(3, 'blackclover', 'Animi voluptatem magnam, possimus eveniet doloremque laborum id excepturi vel repudiandae reiciendis, voluptatibus quia impedit. Quos, neque veritatis hic pariatur accusantium illo. A harum, nihil soluta officia eum quia laborum vero deleniti magnam hic,', 170, 'tatsuya yoshihara', 'pierrot', 'blackclover.png', 'consectetur adipisicing elit. Quos totam maxime id obcaecati aspernatur cum voluptas a. Rerum quod velit minima enim tenetur natus ratione dolore cupiditate. Tempora, beatae assumenda! Itaque saepe dolore nulla modi vel voluptate, quasi.'),
(4, 'attaque des titants', 'sit amet consectetur adipisicing elit. Animi voluptatem magnam, possimus eveniet doloremque laborum id excepturi vel repudiandae reiciendis, voluptatibus quia impedit. Quos, neque veritatis hic pariatur accusantium illo.', 139, 'tetsuro araki', 'toho', 'snk.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos totam maxime id obcaecati aspernatur cum voluptas a. Rerum quod velit minima enim tenetur natus ratione dolore cupiditate. Tempora, beatae assumenda! Itaque saepe dolore nulla modi vel voluptat'),
(1, 'naruto', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos totam maxime id obcaecati aspernatur cum voluptas a. Rerum quod velit minima enim tenetur natus ratione dolore cupiditate. Tempora, beatae assumenda! Itaque saepe dolore nulla modi vel voluptate, quasi, accusamus quis aliquid, magni eveniet?', 500, 'hayato date', 'akiko gujima', 'naruto.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos totam maxime id obcaecati aspernatur cum voluptas a. Rerum quod velit minima enim tenetur natus ratione dolore cupiditate. Tempora, beatae assumenda! Itaque saepe dolore nulla modi vel voluptat'),
(2, 'one piece', ' Tempora, beatae assumenda! Itaque saepe dolore nulla modi vel voluptate, quasi, accusamus quis aliquid, magni eveniet? Excepturi aut nemo voluptatibus perferendis expedita accusantium', 1053, 'konosuke uda', 'toei animation', 'onepiece.png', 'maxime id obcaecati aspernatur cum voluptas a. Rerum quod velit minima enim tenetur natus ratione dolore cupiditate. Tempora, beatae assumenda! Excepturi aut nemo voluptatibus perferendis expedita accusantium tempora cum quod suscipit, minima enim praesen');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
