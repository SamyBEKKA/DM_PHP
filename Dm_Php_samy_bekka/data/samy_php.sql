-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3302
-- Généré le : lun. 15 avr. 2024 à 14:29
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `samy_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_user`, `user_name`, `user_text`, `date`) VALUES
(1, 'Lucas', 'hey trop bien le voyage', '2024-04-09 09:37:27'),
(2, 'AlexLaRocketdu69', 'j\'aime bien le raison de Boulogne :)', '2024-04-09 09:37:27');

-- --------------------------------------------------------

--
-- Structure de la table `continent`
--

DROP TABLE IF EXISTS `continent`;
CREATE TABLE IF NOT EXISTS `continent` (
  `id_continent` int(11) NOT NULL AUTO_INCREMENT,
  `name_continent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_continent`),
  UNIQUE KEY `name_continent` (`name_continent`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `continent`
--

INSERT INTO `continent` (`id_continent`, `name_continent`) VALUES
(1, 'Affrique'),
(5, 'Amérique du NORTH'),
(6, 'Amérique du SUD'),
(4, 'Antarctique'),
(2, 'Asie'),
(3, 'Europe');

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id_country` int(11) NOT NULL AUTO_INCREMENT,
  `name_country` varchar(255) NOT NULL,
  `continent_id` int(11) NOT NULL,
  PRIMARY KEY (`id_country`),
  UNIQUE KEY `name_country` (`name_country`),
  KEY `continent_id` (`continent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id_country`, `name_country`, `continent_id`) VALUES
(1, 'France', 3),
(2, 'Espagne', 3),
(3, 'Angleterre', 3),
(4, 'Ecosse', 3),
(5, 'Algérie', 1),
(6, 'Maroc', 1),
(7, 'Tunisie', 1),
(8, 'Arabia', 2),
(9, 'Japon', 2),
(10, 'Chine', 2),
(11, 'Antarctique', 4),
(12, 'Grèce', 3),
(13, 'Suisse', 3),
(14, 'Portugal', 3);

-- --------------------------------------------------------

--
-- Structure de la table `travel`
--

DROP TABLE IF EXISTS `travel`;
CREATE TABLE IF NOT EXISTS `travel` (
  `id_travel` int(11) NOT NULL AUTO_INCREMENT,
  `name_travel` varchar(255) NOT NULL,
  `travel_text` text DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_travel`),
  UNIQUE KEY `name_travel` (`name_travel`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `travel`
--

INSERT INTO `travel` (`id_travel`, `name_travel`, `travel_text`, `country_id`) VALUES
(1, 'Genève', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio possimus excepturi itaque necessitatibus dolore quos atque velit voluptatem esse? Tempore nobis iure illum maiores ut at. Totam a accusamus eum!\r\n                    Consectetur iusto magnam eaque, nihil eligendi quam commodi culpa blanditiis saepe voluptate. Quibusdam et eos excepturi, commodi alias neque autem, magnam debitis consectetur minima est nobis quis eaque, aliquam odio.\r\n                    Earum eaque quidem debitis, cupiditate voluptate dicta iste nisi. Id laboriosam aperiam aspernatur eveniet explicabo ad, ipsa ipsam sunt, excepturi voluptatem aliquid ex! Odit animi consequuntur unde odio, cum iste.\r\n                    Quibusdam voluptate, odio ipsum numquam eum omnis laudantium! Officia ipsum voluptatibus, iste dolores quo et pariatur deserunt expedita autem consequatur ullam, ea aspernatur doloremque? Distinctio natus veritatis dolor magni harum.\r\n                    Earum quia praesentium molestiae exercitationem quam voluptatibus culpa reiciendis suscipit voluptate architecto ratione reprehenderit recusandae illo tempora commodi, saepe nobis optio perferendis, neque minima beatae numquam non. Odit, sint velit.\r\n                    Ipsum voluptate doloremque libero soluta alias, asperiores hic vel iusto, accusamus ipsa voluptatum sequi quasi unde, aspernatur reiciendis? Laboriosam beatae suscipit ut id ducimus ullam eaque doloremque quibusdam numquam velit.\r\n                    Accusantium modi provident doloribus ipsum ipsam nisi amet earum architecto unde dolores, veniam eligendi suscipit soluta totam tempora temporibus velit rem, accusamus consequuntur nesciunt repudiandae numquam. Similique non quibusdam maiores.\r\n                    Dolore expedita soluta corrupti doloribus labore quae nam, dicta, eveniet magni voluptate dignissimos porro illo voluptates, quo unde nulla voluptatem. Architecto neque explicabo facilis eos consequatur soluta, eius porro nulla?\r\n                    Architecto explicabo dolores corrupti ab itaque cum ullam illum doloremque officiis quasi ea at, nam consequatur magni placeat? Quod aspernatur ullam dicta sapiente eius? Maiores repudiandae nihil iure necessitatibus molestiae.\r\n                    Perferendis, veniam? Provident dicta corporis eos ullam tempora inventore earum quasi labore ut pariatur optio temporibus, delectus consectetur cum quae repellendus quos quibusdam repellat iste id, quo voluptas incidunt libero.', 13),
(2, 'Madrid', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio possimus excepturi itaque necessitatibus dolore quos atque velit voluptatem esse? Tempore nobis iure illum maiores ut at. Totam a accusamus eum!\r\n                    Consectetur iusto magnam eaque, nihil eligendi quam commodi culpa blanditiis saepe voluptate. Quibusdam et eos excepturi, commodi alias neque autem, magnam debitis consectetur minima est nobis quis eaque, aliquam odio.\r\n                    Earum eaque quidem debitis, cupiditate voluptate dicta iste nisi. Id laboriosam aperiam aspernatur eveniet explicabo ad, ipsa ipsam sunt, excepturi voluptatem aliquid ex! Odit animi consequuntur unde odio, cum iste.\r\n                    Quibusdam voluptate, odio ipsum numquam eum omnis laudantium! Officia ipsum voluptatibus, iste dolores quo et pariatur deserunt expedita autem consequatur ullam, ea aspernatur doloremque? Distinctio natus veritatis dolor magni harum.\r\n                    Earum quia praesentium molestiae exercitationem quam voluptatibus culpa reiciendis suscipit voluptate architecto ratione reprehenderit recusandae illo tempora commodi, saepe nobis optio perferendis, neque minima beatae numquam non. Odit, sint velit.\r\n                    Ipsum voluptate doloremque libero soluta alias, asperiores hic vel iusto, accusamus ipsa voluptatum sequi quasi unde, aspernatur reiciendis? Laboriosam beatae suscipit ut id ducimus ullam eaque doloremque quibusdam numquam velit.\r\n                    Accusantium modi provident doloribus ipsum ipsam nisi amet earum architecto unde dolores, veniam eligendi suscipit soluta totam tempora temporibus velit rem, accusamus consequuntur nesciunt repudiandae numquam. Similique non quibusdam maiores.\r\n                    Dolore expedita soluta corrupti doloribus labore quae nam, dicta, eveniet magni voluptate dignissimos porro illo voluptates, quo unde nulla voluptatem. Architecto neque explicabo facilis eos consequatur soluta, eius porro nulla?\r\n                    Architecto explicabo dolores corrupti ab itaque cum ullam illum doloremque officiis quasi ea at, nam consequatur magni placeat? Quod aspernatur ullam dicta sapiente eius? Maiores repudiandae nihil iure necessitatibus molestiae.\r\n                    Perferendis, veniam? Provident dicta corporis eos ullam tempora inventore earum quasi labore ut pariatur optio temporibus, delectus consectetur cum quae repellendus quos quibusdam repellat iste id, quo voluptas incidunt libero.', 2),
(3, 'Soria, Muñecas', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio possimus excepturi itaque necessitatibus dolore quos atque velit voluptatem esse? Tempore nobis iure illum maiores ut at. Totam a accusamus eum!\r\n                    Consectetur iusto magnam eaque, nihil eligendi quam commodi culpa blanditiis saepe voluptate. Quibusdam et eos excepturi, commodi alias neque autem, magnam debitis consectetur minima est nobis quis eaque, aliquam odio.\r\n                    Earum eaque quidem debitis, cupiditate voluptate dicta iste nisi. Id laboriosam aperiam aspernatur eveniet explicabo ad, ipsa ipsam sunt, excepturi voluptatem aliquid ex! Odit animi consequuntur unde odio, cum iste.\r\n                    Quibusdam voluptate, odio ipsum numquam eum omnis laudantium! Officia ipsum voluptatibus, iste dolores quo et pariatur deserunt expedita autem consequatur ullam, ea aspernatur doloremque? Distinctio natus veritatis dolor magni harum.\r\n                    Earum quia praesentium molestiae exercitationem quam voluptatibus culpa reiciendis suscipit voluptate architecto ratione reprehenderit recusandae illo tempora commodi, saepe nobis optio perferendis, neque minima beatae numquam non. Odit, sint velit.\r\n                    Ipsum voluptate doloremque libero soluta alias, asperiores hic vel iusto, accusamus ipsa voluptatum sequi quasi unde, aspernatur reiciendis? Laboriosam beatae suscipit ut id ducimus ullam eaque doloremque quibusdam numquam velit.\r\n                    Accusantium modi provident doloribus ipsum ipsam nisi amet earum architecto unde dolores, veniam eligendi suscipit soluta totam tempora temporibus velit rem, accusamus consequuntur nesciunt repudiandae numquam. Similique non quibusdam maiores.\r\n                    Dolore expedita soluta corrupti doloribus labore quae nam, dicta, eveniet magni voluptate dignissimos porro illo voluptates, quo unde nulla voluptatem. Architecto neque explicabo facilis eos consequatur soluta, eius porro nulla?\r\n                    Architecto explicabo dolores corrupti ab itaque cum ullam illum doloremque officiis quasi ea at, nam consequatur magni placeat? Quod aspernatur ullam dicta sapiente eius? Maiores repudiandae nihil iure necessitatibus molestiae.\r\n                    Perferendis, veniam? Provident dicta corporis eos ullam tempora inventore earum quasi labore ut pariatur optio temporibus, delectus consectetur cum quae repellendus quos quibusdam repellat iste id, quo voluptas incidunt libero.', 2),
(4, 'Barcelone', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio possimus excepturi itaque necessitatibus dolore quos atque velit voluptatem esse? Tempore nobis iure illum maiores ut at. Totam a accusamus eum!\r\n                    Consectetur iusto magnam eaque, nihil eligendi quam commodi culpa blanditiis saepe voluptate. Quibusdam et eos excepturi, commodi alias neque autem, magnam debitis consectetur minima est nobis quis eaque, aliquam odio.\r\n                    Earum eaque quidem debitis, cupiditate voluptate dicta iste nisi. Id laboriosam aperiam aspernatur eveniet explicabo ad, ipsa ipsam sunt, excepturi voluptatem aliquid ex! Odit animi consequuntur unde odio, cum iste.\r\n                    Quibusdam voluptate, odio ipsum numquam eum omnis laudantium! Officia ipsum voluptatibus, iste dolores quo et pariatur deserunt expedita autem consequatur ullam, ea aspernatur doloremque? Distinctio natus veritatis dolor magni harum.\r\n                    Earum quia praesentium molestiae exercitationem quam voluptatibus culpa reiciendis suscipit voluptate architecto ratione reprehenderit recusandae illo tempora commodi, saepe nobis optio perferendis, neque minima beatae numquam non. Odit, sint velit.\r\n                    Ipsum voluptate doloremque libero soluta alias, asperiores hic vel iusto, accusamus ipsa voluptatum sequi quasi unde, aspernatur reiciendis? Laboriosam beatae suscipit ut id ducimus ullam eaque doloremque quibusdam numquam velit.\r\n                    Accusantium modi provident doloribus ipsum ipsam nisi amet earum architecto unde dolores, veniam eligendi suscipit soluta totam tempora temporibus velit rem, accusamus consequuntur nesciunt repudiandae numquam. Similique non quibusdam maiores.\r\n                    Dolore expedita soluta corrupti doloribus labore quae nam, dicta, eveniet magni voluptate dignissimos porro illo voluptates, quo unde nulla voluptatem. Architecto neque explicabo facilis eos consequatur soluta, eius porro nulla?\r\n                    Architecto explicabo dolores corrupti ab itaque cum ullam illum doloremque officiis quasi ea at, nam consequatur magni placeat? Quod aspernatur ullam dicta sapiente eius? Maiores repudiandae nihil iure necessitatibus molestiae.\r\n                    Perferendis, veniam? Provident dicta corporis eos ullam tempora inventore earum quasi labore ut pariatur optio temporibus, delectus consectetur cum quae repellendus quos quibusdam repellat iste id, quo voluptas incidunt libero.', 2),
(5, 'Édimbourg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio possimus excepturi itaque necessitatibus dolore quos atque velit voluptatem esse? Tempore nobis iure illum maiores ut at. Totam a accusamus eum!\r\n                    Consectetur iusto magnam eaque, nihil eligendi quam commodi culpa blanditiis saepe voluptate. Quibusdam et eos excepturi, commodi alias neque autem, magnam debitis consectetur minima est nobis quis eaque, aliquam odio.\r\n                    Earum eaque quidem debitis, cupiditate voluptate dicta iste nisi. Id laboriosam aperiam aspernatur eveniet explicabo ad, ipsa ipsam sunt, excepturi voluptatem aliquid ex! Odit animi consequuntur unde odio, cum iste.\r\n                    Quibusdam voluptate, odio ipsum numquam eum omnis laudantium! Officia ipsum voluptatibus, iste dolores quo et pariatur deserunt expedita autem consequatur ullam, ea aspernatur doloremque? Distinctio natus veritatis dolor magni harum.\r\n                    Earum quia praesentium molestiae exercitationem quam voluptatibus culpa reiciendis suscipit voluptate architecto ratione reprehenderit recusandae illo tempora commodi, saepe nobis optio perferendis, neque minima beatae numquam non. Odit, sint velit.\r\n                    Ipsum voluptate doloremque libero soluta alias, asperiores hic vel iusto, accusamus ipsa voluptatum sequi quasi unde, aspernatur reiciendis? Laboriosam beatae suscipit ut id ducimus ullam eaque doloremque quibusdam numquam velit.\r\n                    Accusantium modi provident doloribus ipsum ipsam nisi amet earum architecto unde dolores, veniam eligendi suscipit soluta totam tempora temporibus velit rem, accusamus consequuntur nesciunt repudiandae numquam. Similique non quibusdam maiores.\r\n                    Dolore expedita soluta corrupti doloribus labore quae nam, dicta, eveniet magni voluptate dignissimos porro illo voluptates, quo unde nulla voluptatem. Architecto neque explicabo facilis eos consequatur soluta, eius porro nulla?\r\n                    Architecto explicabo dolores corrupti ab itaque cum ullam illum doloremque officiis quasi ea at, nam consequatur magni placeat? Quod aspernatur ullam dicta sapiente eius? Maiores repudiandae nihil iure necessitatibus molestiae.\r\n                    Perferendis, veniam? Provident dicta corporis eos ullam tempora inventore earum quasi labore ut pariatur optio temporibus, delectus consectetur cum quae repellendus quos quibusdam repellat iste id, quo voluptas incidunt libero.', 4),
(6, 'Londres', NULL, 3),
(7, 'Glasgow', NULL, 3),
(8, 'Casablanca', NULL, 6),
(9, 'Montreux', NULL, 13),
(10, 'Tunis', NULL, 7),
(11, 'Mecqua', NULL, 8),
(12, 'Médine', NULL, 8),
(13, 'Porto', NULL, 14),
(14, 'thte', 'hntrntr', NULL),
(15, 'sainte', 'vert!!!', NULL),
(16, 'Alger', '14544eezdede', NULL),
(17, 'Ville d\'alger', 'je suis algeriens', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`continent_id`) REFERENCES `continent` (`id_continent`);

--
-- Contraintes pour la table `travel`
--
ALTER TABLE `travel`
  ADD CONSTRAINT `travel_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id_country`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
