-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2017 a las 21:05:41
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u787804074_lshl`
--

USE u787804074_lshl;
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
  `images` varchar(1300) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `published` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `figures`
--

INSERT INTO `figures` (`figure_id`, `user_id`, `name`, `description`, `price`, `images`, `status`, `published`) VALUES
(4, 1, 'Fate Stay Night Saber LILY White Dress', '	\r\nNew: A brand-new, unused, unopened, undamaged item (including handmade items). See the seller\'s listing for full details.', 22.99, 'https://i.ebayimg.com/images/g/DiwAAOSw-ldZX2dK/s-l1600.jpg,https://ae01.alicdn.com/kf/HTB11BeBLFXXXXbAXpXXq6xXFXXXQ/27CM-Japanese-anime-figure-ALTER-Fate-stay-night-Saber-Lily-white-dress-PVC-Action-Figure-Toy.jpg,http://g02.a.alicdn.com/kf/HTB1aDsQSXXXXXa7XpXXq6xXFXXXw/SQ-Fate-stay-night-Saber-Lily-White-Dress-Ver-PVC-Figure-Collectible-Model-Toy-22cm.jpg_220x220.jpg', 1, '2017-11-24 00:00:00'),
(5, 1, 'Hatsune Miku Kimono Yukata Hanairogoromo', 'Description:No Box, Version: Made in China,China Version, Size:23cm', 45, 'https://i.ebayimg.com/images/g/1G8AAOSwCGVYAddz/s-l500.jpg,https://ae01.alicdn.com/kf/HTB10yxSNVXXXXcaXpXXq6xXFXXXj/Hatsune-font-b-Miku-b-font-Kimono-ver-Yukata-font-b-Hanairogoromo-b-font-1-8.jpg,https://ae01.alicdn.com/kf/HTB1aZtxQFXXXXbPXVXXq6xXFXXXG/Love-Thank-You-Hatsune-Miku-Kimono-Yukata-Hanairogoromo-Stronger-figure-toy-20-cm-box-new-anime.jpg,https://ae01.alicdn.com/kf/HTB1D8kpNFXXXXXfapXXq6xXFXXXm/Stronger-Hatsune-Miku-Kimono-Yukata-Hanairogoromo-23cm-PVC-1-8-Scale-Action-Figure-no-retail-box.jpg', 1, '2017-11-21 00:00:00'),
(6, 2, 'Re:Zero In A Different World From Zero Ram Figure', 'Chinese-made clay jacks are large or small or suitable, elastic is a normal phenomenon.  For the loose joints, sometimes need their own simple treatment can be. Does not affect the overall effect. If can\'t accept this item have small problem, please go to other shop buy. Hope understanding, thanks!', 89, 'https://i.ebayimg.com/images/g/NTYAAOSwpuFaGDni/s-l1600.jpg,https://d3ieicw58ybon5.cloudfront.net/ex/350.509/shop/product/66a02c507a9544bda2a212a1141c428c.jpg,http://static.pub-ecommerce.crunchyroll.com/product_images/a155bb7eaccf51e1f6a405d7943f88e8_w400/ram-swimsuit-version-112-scale-figure-rezero-starting.jpg', 1, '2017-11-22 00:00:00'),
(7, 3, 'Lucky Star Macross F Frontier Konata Banpresto', '~ Like new (only displayed)\r\n~ Authentic\r\n~ NO BOX (comes as is)', 10, 'https://i.ebayimg.com/images/g/1dgAAOSwQS1Z8Lkd/s-l1600.jpg,https://i.ebayimg.com/images/g/IWwAAMXQfvlShejh/s-l300.jpg,https://i.ebayimg.com/images/g/lr8AAOxyXDhSheji/s-l500.jpg,https://i.ebayimg.com/images/g/~LIAAOxyTjNShejk/s-l500.jpg', 1, '2017-11-28 00:00:00'),
(8, 10, 'Simpsons The Marge 2.75\" PVC Action Figure', 'Miniature Figurine\r\nUnique collector\'s item\r\nMade of durable PVC', 5.75, 'https://images-na.ssl-images-amazon.com/images/I/7103-rTigML._SY679_.jpg,http://www.16bit.com/toypics/simpsons/marge/01.gif', 1, '2017-11-28 00:00:00'),
(15, 11, 'Okumura Rin', 'From:Ao no Exorcist\r\nCompany:Max Factory\r\nRelease Month:December 2012\r\nScale:1/8\r\nJP Retail Price:¥7600', 12, 'https://images.thefiguremall.com/figure/1560/7.jpg,https://images-na.ssl-images-amazon.com/images/I/41MbOsTcfdL._SL500_AC_SS350_.jpg,http://www.otakuhobbitoysph.com/wp-content/uploads/2017/01/GEMokumuraRin2.jpg', 1, '2017-11-28 19:30:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stars`
--

CREATE TABLE `stars` (
  `star_id` mediumint(8) NOT NULL,
  `buyer_id` mediumint(8) NOT NULL,
  `seller_id` mediumint(8) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `image` varchar(250) DEFAULT 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/7e/30/c8/7e30c857-99f6-ed48-c4c8-f1387d2b992e/source/1200x630bb.jpg',
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
(4, 'CodeGayAss', 'Ringo', 'Starr', 'ringo@beatles.com', '768567890', '520f73691bcf89d508d923a2dbc8e6fa58efb522', 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/7e/30/c8/7e30c857-99f6-ed48-c4c8-f1387d2b992e/source/1200x630bb.jpg', 'Hey there! I\'m using Love Second Hand Live!', '2017-11-24 18:35:44'),
(5, 'pablito', 'Pablo', 'Motos', 'pablo_motos@yahoo.es', '654738291', 'pablito1', 'https://donbalonrosa.defensacentral.com/images/2017/09/07/1504799606.jpg', 'Hey que tal guapas ;)', '2017-11-28 00:00:00'),
(10, 'morgan', 'Morgan', 'Suisa', 'morgan@dasuisa.cat', '420420420', '9706377a84ddf99fa147d587c02c6a684c7a3465', 'https://vignette.wikia.nocookie.net/creation/images/2/22/ANGRY_MARGE_BECH.jpg', 'NO TE PASES DE LISTO CON MIGO.', '2017-11-28 18:25:40'),
(11, 'prueba', 'prueba', 'prueba', 'prueba@prueba.com', '000000000', 'prueba', 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/7e/30/c8/7e30c857-99f6-ed48-c4c8-f1387d2b992e/source/1200x630bb.jpg', 'Hey there! I\'m using Love Second Hand Live!', '2017-11-28 00:00:00'),
(12, 'test1', 'test', 'test', 'test@test.com', '123123123', 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/7e/30/c8/7e30c857-99f6-ed48-c4c8-f1387d2b992e/source/1200x630bb.jpg', 'testing', '2017-11-28 20:22:29');

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
-- Indices de la tabla `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`star_id`),
  ADD KEY `fk_stars` (`buyer_id`),
  ADD KEY `fk_seller_id` (`seller_id`);

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
  MODIFY `figure_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `stars`
--
ALTER TABLE `stars`
  MODIFY `star_id` mediumint(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
