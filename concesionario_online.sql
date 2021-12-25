-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concesionario_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `dni_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(3) NOT NULL,
  PRIMARY KEY (`dni_cliente`),
  UNIQUE KEY `dni_cliente` (`dni_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dni_cliente`, `localidad`, `nombre`, `apellidos`, `edad`) VALUES
('36907570E', 'Madrid', 'Vicente', 'Montalbán', 38),
('40487286H', 'Sevilla', 'Juan', 'López García', 29),
('49548012D', 'Sevilla', 'Lucía', 'Carrasco Méndez', 22),
('50674782D', 'Alcalá de Guadaíra', 'Pepe', 'García', 46),
('75434992Y', 'Mairena del Aljarafe', 'Pedro', 'Picapiedra Martín', 36),
('86852481L', 'Málaga', 'María', 'Moreno', 19),
('97928805A', 'Barcelona', 'Josep', 'Ruiz', 57);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_marca`),
  KEY `id_marca` (`id_marca`),
  KEY `id_marca_2` (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`) VALUES
(1, 'Yamaha'),
(2, 'KTM'),
(3, 'Honda'),
(4, 'Ducati'),
(5, 'Aprilia'),
(6, 'BMW'),
(7, 'Suzuki'),
(8, 'Kawasaki'),
(9, 'Harley Davidson');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motos`
--

DROP TABLE IF EXISTS `motos`;
CREATE TABLE IF NOT EXISTS `motos` (
  `id_moto` varchar(17) COLLATE utf8_spanish_ci NOT NULL,
  `id_marca` int(11) NOT NULL,
  `kilometros` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `antiguedad` int(11) NOT NULL,
  `matricula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  UNIQUE KEY `id_moto_2` (`id_moto`),
  KEY `id_marca` (`id_marca`),
  KEY `id_moto` (`id_moto`),
  KEY `id_moto_3` (`id_moto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `motos`
--

INSERT INTO `motos` (`id_moto`, `id_marca`, `kilometros`, `modelo`, `precio`, `antiguedad`, `matricula`) VALUES
('1D4HR48N73F526307', 2, '12.05933', 'Duke 125', '7500', 15, '6530MLK'),
('1GNFK16Z86J156085', 1, '12.712', 'R1 1000cc', '13.600', 1, '7133BCC'),
('JH4KA3250LC002400', 1, '0', 'MT-07', '12.500', 1, '9103XML'),
('JM1BG2241R0797923', 8, '4172', 'Z900', '7150', 6, '5411CBD'),
('JN1AY1AP7BM521083', 6, '38401', 'R 1250 GS', '15000', 25, '0019RDS'),
('KNJLT06H2T6196801', 4, '103', 'Monster 850', '21.000', 0, '6531KKL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_moto` varchar(17) COLLATE utf8_spanish_ci NOT NULL,
  `dni_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_venta` (`id_venta`),
  KEY `dni_cliente` (`dni_cliente`),
  KEY `id_moto` (`id_moto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_moto`, `dni_cliente`) VALUES
(1, '1D4HR48N73F526307', '40487286H'),
(2, 'JM1BG2241R0797923', '75434992Y'),
(3, '1GNFK16Z86J156085', '50674782D');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `motos`
--
ALTER TABLE `motos`
  ADD CONSTRAINT `motos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`dni_cliente`) REFERENCES `clientes` (`dni_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_moto`) REFERENCES `motos` (`id_moto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
