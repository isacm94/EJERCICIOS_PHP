--
-- Base de datos: `diario`
--
CREATE DATABASE IF NOT EXISTS `diario` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `diario`;

--
-- Estructura de tabla para la tabla `diario`
--

DROP TABLE IF EXISTS `diario`;
CREATE TABLE IF NOT EXISTS `diario` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `anotacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=734 DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diario`
--
ALTER TABLE `diario`
  ADD PRIMARY KEY (`id`),
  ADD INDEX KEY `fecha` (`fecha`);


