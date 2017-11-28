-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2017 a las 21:03:54
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
  `price` mediumint(9) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `figures`
--

INSERT INTO `figures` (`figure_id`, `user_id`, `name`, `description`, `price`, `image`) VALUES
(4, 1, 'Fate Stay Night Saber LILY White Dress', '	\r\nNew: A brand-new, unused, unopened, undamaged item (including handmade items). See the seller\'s listing for full details.', 22, 'https://i.ebayimg.com/images/g/DiwAAOSw-ldZX2dK/s-l1600.jpg'),
(5, 1, 'Hatsune Miku Kimono Yukata Hanairogoromo', 'Description:No Box, Version: Made in China,China Version, Size:23cm', 45, 'https://i.ebayimg.com/images/g/1G8AAOSwCGVYAddz/s-l500.jpg'),
(6, 2, 'Re:Zero In A Different World From Zero Ram Figure', 'Chinese-made clay jacks are large or small or suitable, elastic is a normal phenomenon.  For the loose joints, sometimes need their own simple treatment can be. Does not affect the overall effect. If can\'t accept this item have small problem, please go to other shop buy. Hope understanding, thanks!', 89, 'https://i.ebayimg.com/images/g/NTYAAOSwpuFaGDni/s-l1600.jpg');

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
  `pass` char(40) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `email`, `pass`, `registration_date`) VALUES
(1, 'jhon001', 'John', 'Lennon', 'john@beatles.com', '2a50435b0f512f60988db719106a258fb7e338ff', '2017-11-24 18:35:44'),
(2, 'paulXD', 'Paul', 'McCartney', 'paul@beatles.com', '6ae16792c502a5b47da180ce8456e5ae7d65e262', '2017-11-24 18:35:44'),
(3, 'saoisthebest', 'George', 'Harrison', 'george@beatles.com ', '1af17e73721dbe0c40011b82ed4bb1a7dbe3ce29', '2017-11-24 18:35:44'),
(4, 'CodeGayAss', 'Ringo', 'Starr', 'ringo@beatles.com', '520f73691bcf89d508d923a2dbc8e6fa58efb522', '2017-11-24 18:35:44');

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
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `figures`
--
ALTER TABLE `figures`
  MODIFY `figure_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Volcado de datos para la tabla `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'abc', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"lshl\",\"phpmyadmin\",\"prueba\",\"sitename\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"json_structure_or_data\":\"data\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Estructura de la tabla @TABLE@\",\"latex_structure_continued_caption\":\"Estructura de la tabla @TABLE@ (continÃºa)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Contenido de la tabla @TABLE@\",\"latex_data_continued_caption\":\"Contenido de la tabla @TABLE@ (continÃºa)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"htmlword_columns\":null,\"json_pretty_print\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(2, 'root', 'server', 'sadasd', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"lshl\",\"phpmyadmin\",\"prueba\",\"sitename\",\"test\",\"u787804074_lshl\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"json_structure_or_data\":\"data\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Estructura de la tabla @TABLE@\",\"latex_structure_continued_caption\":\"Estructura de la tabla @TABLE@ (continÃºa)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Contenido de la tabla @TABLE@\",\"latex_data_continued_caption\":\"Contenido de la tabla @TABLE@ (continÃºa)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"htmlword_columns\":null,\"json_pretty_print\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"u787804074_lshl\",\"table\":\"users\"},{\"db\":\"u787804074_lshl\",\"table\":\"figures\"},{\"db\":\"lshl\",\"table\":\"users\"},{\"db\":\"lshl\",\"table\":\"figures\"},{\"db\":\"sitename\",\"table\":\"tasks\"},{\"db\":\"sitename\",\"table\":\"users\"},{\"db\":\"prueba\",\"table\":\"usuaris\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-11-17 16:12:03', '{\"lang\":\"es\",\"collation_connection\":\"utf8mb4_unicode_ci\",\"ThemeDefault\":\"pmahomme\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `prueba`
--
CREATE DATABASE IF NOT EXISTS `prueba` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prueba`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`);
--
-- Base de datos: `sitename`
--
CREATE DATABASE IF NOT EXISTS `sitename` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sitename`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `fk_user_id` mediumint(8) UNSIGNED NOT NULL,
  `task_id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(25) CHARACTER SET utf8 NOT NULL,
  `description` varchar(240) CHARACTER SET utf8 DEFAULT NULL,
  `completed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`fk_user_id`, `task_id`, `title`, `description`, `completed`) VALUES
(3, 1, 'Homework', 'Do all the math problems for tomorrow.', 0),
(3, 2, 'Sleep', 'Sleep tight puppy.', 1),
(5, 3, 'Watch fuutanari', NULL, 0),
(28, 4, 'Titulo de tarea', 'Descripcion real de la tarea no fake.', 1),
(28, 5, 'ada', 'adad', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(40) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `registration_date`) VALUES
(1, 'Larry', 'Ullman', 'email@example.com', 'e727d1464ae12436e899a726da5b2f11d8381b26', '2017-11-21 20:20:37'),
(2, 'Zoe', 'Isabella', 'email2@example.com', '6b793ca1c216835ba85c1fbd1399ce729e34b4e5', '2017-11-21 20:20:38'),
(3, 'John', 'Lennon', 'john@beatles.com', '2a50435b0f512f60988db719106a258fb7e338ff', '2017-11-21 20:20:38'),
(4, 'Paul', 'McCartney', 'paul@beatles.com', '6ae16792c502a5b47da180ce8456e5ae7d65e262', '2017-11-21 20:20:38'),
(5, 'George', 'Harrison', 'george@beatles.com ', '1af17e73721dbe0c40011b82ed4bb1a7dbe3ce29', '2017-11-21 20:20:38'),
(6, 'Ringo', 'Starr', 'ringo@beatles.com', '520f73691bcf89d508d923a2dbc8e6fa58efb522', '2017-11-21 20:20:38'),
(7, 'David', 'Jones', 'davey@monkees.com', 'ec23244e40137ef72763267f17ed6c7ebb2b019f', '2017-11-21 20:20:38'),
(9, 'Micky', 'Dolenz', 'micky@monkees.com ', '0599b6e3c9206ef135c83a921294ba6417dbc673', '2017-11-21 20:20:38'),
(10, 'Mike', 'Nesmith', 'mike@monkees.com', '804a1773e9985abeb1f2605e0cc22211cc58cb1b', '2017-11-21 20:20:38'),
(11, 'David', 'Sedaris', 'david@authors.com', 'f54e748ae9624210402eeb2c15a9f506a110ef72', '2017-11-21 20:20:38'),
(12, 'Nick', 'Hornby', 'nick@authors.com', '815f12d7b9d7cd690d4781015c2a0a5b3ae207c0', '2017-11-21 20:20:38'),
(13, 'Melissa', 'Bank', 'melissa@authors.com', '15ac6793642add347cbf24b8884b97947f637091', '2017-11-21 20:20:38'),
(14, 'Toni', 'Morrison', 'toni@authors.com', 'ce3a79105879624f762c01ecb8abee7b31e67df5', '2017-11-21 20:20:38'),
(15, 'Jonathan', 'Franzen', 'jonathan@authors.com', 'c969581a0a7d6f790f4b520225f34fd90a09c86f', '2017-11-21 20:20:38'),
(16, 'Don', 'DeLillo', 'don@authors.com', '01a3ff9a11b328afd3e5affcba4cc9e539c4c455', '2017-11-21 20:20:38'),
(17, 'Graham', 'Greene', 'graham@authors.com', '7c16ec1fcbc8c3ec99790f25c310ef63febb1bb3', '2017-11-21 20:20:38'),
(18, 'Michael', 'Chabon', 'mike@authors.com', 'bd58cc413f97c33930778416a6dbd2d67720dc41', '2017-11-21 20:20:38'),
(19, 'Richard', 'Brautigan', 'richard@authors.com', 'b1f8414005c218fb53b661f17b4f671bccecea3d', '2017-11-21 20:20:38'),
(20, 'Russell', 'Banks', 'russell@authors.com', '6bc4056557e33f1e209870ab578ed362f8b3c1b8', '2017-11-21 20:20:38'),
(21, 'Homer', 'Simpson', 'homer@simpson.com', '54a0b2dcbc5a944907d29304405f0552344b3847', '2017-11-21 20:20:38'),
(22, 'Marge', 'Simpson', 'marge@simpson.com', 'cea9be7b57e183dea0e4cf000489fe073908c0ca', '2017-11-21 20:20:38'),
(23, 'Bart', 'Simpson', 'bart@simpson.com', '73265774abd1028ed8ef06afc5fa0f9a7ccbb6aa', '2017-11-21 20:20:38'),
(24, 'Lisa', 'Simpson', 'lisa@simpson.com', 'a09bb16971ec0759dfff75c088f004e205c9e27b', '2017-11-21 20:20:38'),
(25, 'Maggie', 'Simpson', 'maggie@simpson.com', '0e87350b393ceced1d4751b828d18102be123edb', '2017-11-21 20:20:38'),
(26, 'Abe', 'Simpson', 'abe@simpson.com', '6591827c8e3d4624e8fc1ee324f31fa389fdafb4', '2017-11-21 20:20:38'),
(27, 'ayy', 'lmao', 'XD', '033497bfd3b0873fa0b7f994dec3b2669a676ba6', '2017-11-21 21:06:35'),
(28, 'miguel', 'patata', 'a@a.com', 'a16358be6e2306b153b1f071477e68837266075e', '2017-11-23 18:45:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Base de datos: `u787804074_lshl`
--
CREATE DATABASE IF NOT EXISTS `u787804074_lshl` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `u787804074_lshl`;

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
