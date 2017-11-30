-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2017 a las 17:03:46
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
(15, 11, 'Okumura Rin', 'From:Ao no Exorcist\r\nCompany:Max Factory\r\nRelease Month:December 2012\r\nScale:1/8\r\nJP Retail Price:¥7600', 12, 'https://images.thefiguremall.com/figure/1560/7.jpg,https://images-na.ssl-images-amazon.com/images/I/41MbOsTcfdL._SL500_AC_SS350_.jpg,http://www.otakuhobbitoysph.com/wp-content/uploads/2017/01/GEMokumuraRin2.jpg', 1, '2017-11-28 19:30:54'),
(22, 1, '18cm Anime Death Note Figure Toy Deathnote Ryuuku', 'Material: PVC\nSize: About 18cm\nPackage: OPP Bag', 99.99, 'https://sc01.alicdn.com/kf/HTB1vyAOJVXXXXXmXpXXq6xXFXXXl.jpg,https://ae01.alicdn.com/kf/HTB15WCwRFXXXXXrXXXXq6xXFXXXT/18CM-Anime-Death-Note-ryuk-Deathnote-Ryuuku-PVC-Action-Figure-Collection-Model-Toy-Dolls-Wholesale-Price.jpg_640x640.jpg,https://ae01.alicdn.com/kf/HTB1x59ZKFXXXXcnXpXXq6xXFXXXJ/Death-Note-Deathnote-Ryuk-Ryuuku-18cm-7-2-Statue-Figure-Toy-Loose-New.jpg', 1, '2017-11-29 02:10:51'),
(23, 1, '15CM Attack on Titan Figma Mikasa Ackerman', 'Material: PVC\nSize: About 18cm\nPackage: OPP Bag', 79.99, 'http://i.ebayimg.com/images/i/111768828034-0-1/s-l1000.jpg,http://www.raccoongames.es/img/productos/figura-figma-ataque-a-los-titanes-mikasa-ackerman-14-5cm/61Pe5T8te5L._SL1000_.jpg,http://www.raccoongames.es/img/productos/figura-figma-ataque-a-los-titanes-mikasa-ackerman-14-5cm/615gHOUt-EL._SL1000_.jpg', 1, '2017-11-29 02:01:51'),
(24, 1, 'Heroines Miku Hatsune Action Figure Anime Miku', 'Material: PVC\nSize: About 18cm\nPackage: OPP Bag', 19.99, 'https://images-na.ssl-images-amazon.com/images/I/41JubOONBhL._SL500_AC_SS350_.jpg,https://ae01.alicdn.com/kf/HTB1kNZ.SXXXXXb2XXXXq6xXFXXXl/PVC-Heroines-Miku-Hatsune-Action-Figure-Anime-Miku-Doll-Model-Toy-Collectibles-Joints-Movable-Interchangeable-Toys.jpg,https://ae01.alicdn.com/kf/HTB1SS4kKFXXXXbaXVXXq6xXFXXXt/Japanese-Anime-Hatsune-Miku-Concert-Singer-PVC-Action-Figure-Lolita-Kids-Toy-Collection-Xmas-Gift.jpg', 1, '2017-11-29 02:03:51'),
(25, 2, 'Rem (PVC Figure)', 'anufacturer  : Good Smile Company\nScale : 1/7\nMaterial  : PVC , ABS\nProducer  : Yuko-n , Knead\nOriginal  : Re: Life in a Different World from Zero\nRelease Date  : Feb(Feb. 14, 2017 Pre-order start.)\nList Price  : 12,300yenabout110.26USD\nSales Price : 10,819yenabout96.99USD\nPoints Acquired : 324pointsOther Currencies\nJAN code  : 4580416940023\nItem code : 940023', 99.99, 'http://www.1999.co.jp/itbig44/10448761.jpg,https://naruto-cdn.animegami.co.uk/wp-content/uploads/2017/02/14141302/x_gsc94002_b.jpg,https://www.otakuhq.com/images/pvc/PVC10551-3.jpg', 1, '2017-11-29 02:03:51'),
(26, 1, 'Tokyo Ghoul Ken Kaneki PVC 23 CM', 'Material: PVC\nSize: About 18cm\nPackage: OPP Bag', 9.99, 'https://li7.rightinthebox.com/images/240x240/201606/xfvh1466507031121.jpg,https://ae01.alicdn.com/kf/HTB14EQTLXXXXXXCXVXXq6xXFXXXL/Tokyo-Ghoul-Figure-Kaneki-Ken-Action-Figures-Model-Toy-Cartoon-Figuras-Anime-Kid-Toys-Pvc-Tokyo.jpg_640x640.jpg', 1, '2017-11-29 02:04:51'),
(27, 1, 'Tenshi - Angel Beats!', 'From the anime Angle Beats! comes a 1/8th scale PVC figure of the angelic student council president, Tenshi. She is posed with her hands clasped together in front of her and a peaceful smile brimming over her face, which creates a very warm and relaxed atmosphere about her.', 199.99, 'http://images.goodsmile.info/cgm/images/product/20101221/3056/12454/large/540287fee2be076596bccc83a5cd5bcf.jpg,https://www.1999.co.jp/itbig13/10135928a3.jpg', 1, '2017-11-29 02:03:51'),
(28, 3, 'Max Factory Sword Art Online II: Sinon Figma', 'A Max Factory import\r\nFrom the hit anime series\r\nSmooth yet pose able joints\r\nIncludes three expressions\r\nSniper rifle included', 72.09, 'https://images-na.ssl-images-amazon.com/images/I/61h9kPp306L._SL1000_.jpg,https://images-na.ssl-images-amazon.com/images/I/513f03QJS6L.jpg,https://images-na.ssl-images-amazon.com/images/I/51tVKti6jyL.jpg,https://images-na.ssl-images-amazon.com/images/I/51xgJKzrOEL.jpg,https://images-na.ssl-images-amazon.com/images/I/41smnwcKRFL.jpg', 1, '2017-11-29 00:00:00'),
(29, 5, 'Furyu 6.3\" RWBY: Ruby Rose Special Figure', 'Officially Licensed by Furyu\r\nMinor Assembly Required\r\nLimited Quantity\r\nPerfect for RWBY Fans\r\nSize Approx: 2\"L x 2\"W x 6.3\"H', 34.52, 'https://images-na.ssl-images-amazon.com/images/I/81QL7mPAxTL._SL1500_.jpg,https://images-na.ssl-images-amazon.com/images/I/81wyW5fTpWL._SL1500_.jpg,https://images-na.ssl-images-amazon.com/images/I/81Inf-TEnxL._SL1500_.jpg', 1, '2017-11-29 00:00:00'),
(30, 4, 'KonoSuba: Megumin', 'Officially Licensed by Sega\r\nNew and sealed inside retail packaging\r\nVery limited and collectible\r\nMinor assembly required\r\nApprox. Size: 5\"L x 4\"W x 7.8\"H', 42.95, 'https://images-na.ssl-images-amazon.com/images/I/818pavI3caL._SL1500_.jpg,https://images-na.ssl-images-amazon.com/images/I/81GoG1jt3OL._SL1500_.jpg,https://images-na.ssl-images-amazon.com/images/I/910V-ZyDCPL._SL1500_.jpg', 1, '2017-11-29 00:00:00'),
(31, 3, 'Madoka Magica SQ 7\" Homura Akemi Figure', 'Officially Licensed Figure from Banpresto Japan\r\nMakes a great gift!\r\nMinor assembly required\r\nLimited Quantity\r\nApprox. Size: 3\"L x 3\"W x 7\"H', 20.99, 'https://images-na.ssl-images-amazon.com/images/I/71eNozGi5DL._SL1500_.jpg,https://images-na.ssl-images-amazon.com/images/I/71K9oVWnDXL._SL1500_.jpg,https://images-na.ssl-images-amazon.com/images/I/71MepwxmBsL._SL1500_.jpg', 1, '2017-11-29 00:00:00'),
(32, 12, 'Date A Live Yoshino Figurine Brinquedos PVC', 'Name:Date A Live Figures\r\nCommodity material:PVC\r\nCondition:100% NEW\r\nSize:about  18cm', 28.3, 'https://ae01.alicdn.com/kf/HTB1AuJsJXXXXXcKaXXXq6xXFXXXo/Japan-Anime-Figure-Date-A-Live-Yoshino-Figurine-Brinquedos-PVC-Action-Figure-Juguetes-Collectible-Model-Doll.jpg,https://ae01.alicdn.com/kf/HTB1T7o5QFXXXXc5XpXXq6xXFXXXh/18cmSAINTGI-1pc-Anime-Cute-Nendoroid-4-Date-A-Live-Yoshino-PVC-Action-Figure-Model-Brinquedos-Tokisaki.jpg', 1, '2017-11-29 16:55:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stars`
--

CREATE TABLE `stars` (
  `star_id` mediumint(8) NOT NULL,
  `buyer_id` mediumint(8) NOT NULL,
  `seller_id` mediumint(8) NOT NULL,
  `value` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stars`
--

INSERT INTO `stars` (`star_id`, `buyer_id`, `seller_id`, `value`) VALUES
(1, 12, 5, 4),
(3, 12, 1, 3);

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
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `seller_id` (`seller_id`);

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
  MODIFY `figure_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `stars`
--
ALTER TABLE `stars`
  MODIFY `star_id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
