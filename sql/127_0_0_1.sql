-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2017 a las 02:19:41
-- Versión del servidor: 5.7.17
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lshl`
--
CREATE DATABASE IF NOT EXISTS `lshl` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lshl`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `figures`
--

CREATE TABLE `figures` (
  `figure_id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `published` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `figures`
--

INSERT INTO `figures` (`figure_id`, `user_id`, `name`, `description`, `price`, `image`, `status`, `published`) VALUES
(4, 1, 'Fate Stay Night Saber LILY White Dress', '	\r\nNew: A brand-new, unused, unopened, undamaged item (including handmade items). See the seller\'s listing for full details.', 22.99, 'https://i.ebayimg.com/images/g/DiwAAOSw-ldZX2dK/s-l1600.jpg', 1, '2017-11-24 00:00:00'),
(5, 1, 'Hatsune Miku Kimono Yukata Hanairogoromo', 'Description:No Box, Version: Made in China,China Version, Size:23cm', 45, 'https://i.ebayimg.com/images/g/1G8AAOSwCGVYAddz/s-l500.jpg', 1, '2017-11-21 00:00:00'),
(6, 2, 'Re:Zero In A Different World From Zero Ram Figure', 'Chinese-made clay jacks are large or small or suitable, elastic is a normal phenomenon.  For the loose joints, sometimes need their own simple treatment can be. Does not affect the overall effect. If can\'t accept this item have small problem, please go to other shop buy. Hope understanding, thanks!', 89, 'https://i.ebayimg.com/images/g/NTYAAOSwpuFaGDni/s-l1600.jpg', 1, '2017-11-22 00:00:00'),
(7, 3, 'Lucky Star Macross F Frontier Konata Banpresto', '~ Like new (only displayed)\r\n~ Authentic\r\n~ NO BOX (comes as is)', 10, 'https://i.ebayimg.com/images/g/1dgAAOSwQS1Z8Lkd/s-l1600.jpg', 1, '2017-11-28 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telephone` varchar(9) NOT NULL,
  `pass` char(40) NOT NULL,
  `image` varchar(250) NOT NULL DEFAULT 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/7e/30/c8/7e30c857-99f6-ed48-c4c8-f1387d2b992e/source/1200x630bb.jpg',
  `description` varchar(500) DEFAULT 'Hey there! I''m using Love Second Hand Live!',
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `email`, `telephone`, `pass`, `image`, `description`, `registration_date`) VALUES
(1, 'jhon001', 'John', 'Lennon', 'john@beatles.com', '654375123', '2a50435b0f512f60988db719106a258fb7e338ff', 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/7e/30/c8/7e30c857-99f6-ed48-c4c8-f1387d2b992e/source/1200x630bb.jpg', 'Hey there! I\'m using Love Second Hand Live!', '2017-11-24 18:35:44'),
(2, 'paulXD', 'Paul', 'McCartney', 'paul@beatles.com', '748346784', '6ae16792c502a5b47da180ce8456e5ae7d65e262', 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/7e/30/c8/7e30c857-99f6-ed48-c4c8-f1387d2b992e/source/1200x630bb.jpg', 'Hey there! I\'m using Love Second Hand Live!', '2017-11-24 18:35:44'),
(3, 'saoisthebest', 'George', 'Harrison', 'george@beatles.com ', '321876543', '1af17e73721dbe0c40011b82ed4bb1a7dbe3ce29', 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/7e/30/c8/7e30c857-99f6-ed48-c4c8-f1387d2b992e/source/1200x630bb.jpg', 'Hey there! I\'m using Love Second Hand Live!', '2017-11-24 18:35:44'),
(4, 'CodeGayAss', 'Ringo', 'Starr', 'ringo@beatles.com', '768567890', '520f73691bcf89d508d923a2dbc8e6fa58efb522', 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/7e/30/c8/7e30c857-99f6-ed48-c4c8-f1387d2b992e/source/1200x630bb.jpg', 'Hey there! I\'m using Love Second Hand Live!', '2017-11-24 18:35:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `figures`
--
ALTER TABLE `figures`
  ADD PRIMARY KEY (`figure_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `figures`
--
ALTER TABLE `figures`
  MODIFY `figure_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `figures`
--
ALTER TABLE `figures`
  ADD CONSTRAINT `figures_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
