
--
-- Estructura de tabla para la tabla `subgrupos`
--
create database subgrupos;
use subgrupos;

CREATE TABLE IF NOT EXISTS `subgrupos` (
  `id` int(11) NOT NULL,
  `cod` smallint(5) unsigned NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

