-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2014 a las 05:52:02
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ayc_proyecto3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `CodigoCategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CodigoCategoria`, `NombreCategoria`) VALUES
(1, 'Cámaras y accesorios'),
(2, 'Celulares y teléfonos'),
(3, 'Computación'),
(4, 'Consolas y videojuegos'),
(5, 'Eletrodomésticos'),
(6, 'Electrónica, audio y video'),
(7, 'Relojes y joyas'),
(8, 'Ropa y accesorios'),
(9, 'Salud y belleza'),
(10, 'Accesorios para vehículos'),
(11, 'Animales y mascotas'),
(12, 'Hogar y muebles'),
(13, 'Coleccionables y hobbies'),
(14, 'Industria y oficinas'),
(15, 'Instrumentos musicales'),
(16, 'Juegos y juguetes'),
(17, 'Libros, revistas y comics'),
(18, 'Música, películas y series'),
(19, 'Software'),
(20, 'Merma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `CodigoCiudad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodigoPais` int(10) unsigned DEFAULT NULL,
  `NombreCiudad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoCiudad`),
  KEY `Ciudad_FKIndex1` (`CodigoPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`CodigoCiudad`, `CodigoPais`, `NombreCiudad`) VALUES
(1, 1, 'Santiago'),
(2, 1, 'Arica'),
(3, 1, 'Iquique'),
(4, 1, 'Antofagasta'),
(5, 1, 'Valparaíso'),
(6, 1, 'Concepción'),
(7, 1, 'Temuco'),
(8, 1, 'Punta Arenas'),
(9, 2, 'Nueva York'),
(10, 2, 'Kansas City'),
(11, 2, 'Atlanta'),
(12, 2, 'Texas'),
(13, 2, 'Portland'),
(14, 2, 'San Diego'),
(15, 2, 'Los Angeles'),
(16, 2, 'Miami'),
(17, 2, 'Alabama'),
(18, 2, 'Arkansas'),
(19, 3, 'Pekín'),
(20, 3, 'Shanghái'),
(21, 3, 'Shenzhen'),
(22, 3, 'Guangzhou'),
(23, 3, 'Xiamen'),
(24, 3, 'Zhuhai'),
(25, 4, 'Tokio'),
(26, 4, 'Osaka'),
(27, 4, 'Nagoya'),
(28, 4, 'Kioto'),
(29, 5, 'Seúl'),
(30, 5, 'Busan'),
(31, 5, 'Incheon'),
(32, 5, 'Daegu'),
(33, 5, 'Jeonju'),
(34, 6, 'Buenos Aires'),
(35, 6, 'Córdoba'),
(36, 6, 'Mar del Plata'),
(37, 6, 'Mendoza'),
(38, 6, 'Rosario'),
(39, 6, 'San Carlos de Bariloche'),
(40, 7, 'Sao Paulo'),
(41, 7, 'Río de Janeiro'),
(42, 7, 'Bello Horizonte'),
(43, 7, 'Brasilia'),
(44, 8, 'Ciudad de México, DF'),
(45, 8, 'Jalisco'),
(46, 8, 'Chihuahua'),
(47, 8, 'Veracruz'),
(48, 8, 'Monterrey'),
(49, 8, 'Tijuana'),
(50, 8, 'Guadalajara'),
(51, 9, 'Berlín'),
(52, 9, 'Hamburgo'),
(53, 9, 'Munich'),
(54, 9, 'Ausburg'),
(55, 9, 'Frankfurt'),
(56, 9, 'Sttutgart'),
(57, 10, 'Madrid'),
(58, 10, 'Barcelona'),
(59, 10, 'Valencia'),
(60, 10, 'Sevilla'),
(61, 10, 'Zaragoza'),
(62, 10, 'Bilbao'),
(63, 10, 'Málaga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadcliente`
--

CREATE TABLE IF NOT EXISTS `ciudadcliente` (
  `CodigoCiudadCliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreCiudadCliente` varchar(25) NOT NULL,
  PRIMARY KEY (`CodigoCiudadCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `ciudadcliente`
--

INSERT INTO `ciudadcliente` (`CodigoCiudadCliente`, `NombreCiudadCliente`) VALUES
(1, 'Iquique'),
(2, 'Antofagasta'),
(3, 'Copiapó'),
(4, 'La Serena'),
(5, 'Valparaíso'),
(6, 'Rancagua'),
(7, 'Talca'),
(8, 'Concepción'),
(9, 'Temuco'),
(10, 'Puerto Montt'),
(11, 'Coyhaique'),
(12, 'Punta Arenas'),
(13, 'Santiago'),
(14, 'Valdivia'),
(15, 'Arica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `CodigoCliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RutCliente` varchar(12) NOT NULL,
  `NombreCliente` varchar(100) DEFAULT NULL,
  `ApellidoCliente` varchar(100) DEFAULT NULL,
  `Telefono1Cliente` int(20) unsigned DEFAULT NULL,
  `Telefono2Cliente` int(20) unsigned DEFAULT NULL,
  `CodigoCiudadCliente` int(10) unsigned NOT NULL,
  `EmailCliente` varchar(255) DEFAULT NULL,
  `DireccionCliente` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CodigoCliente`),
  KEY `CodigoCiudadCliente` (`CodigoCiudadCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`CodigoCliente`, `RutCliente`, `NombreCliente`, `ApellidoCliente`, `Telefono1Cliente`, `Telefono2Cliente`, `CodigoCiudadCliente`, `EmailCliente`, `DireccionCliente`) VALUES
(1, '14.069.452-5', 'Karina', 'Abarzúa', 452323232, 98766789, 9, 'karinaa@gmail.com', 'Los Bambúes 3678'),
(2, '7.721.517-4', 'René', 'Padilla', 452332211, 88887777, 4, 'renep1@hotmail.com', 'Orella 0398'),
(3, '16.794.267-9', 'Felipe', 'Ortiz', 4294967295, 66665555, 13, 'felipeo@yahoo.es', 'Waldo Retamal 064'),
(4, '8.225.098-0', 'José', 'Donoso', 452333222, 77665544, 15, 'josedonoso@live.cl', 'Holandesa 798'),
(5, '17.881.952-6', 'Jorge', 'Contreras', 452270111, 88664422, 9, 'jorgec1@gmail.com', 'Las Estrellas 02295');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `CodigoVenta` int(10) unsigned NOT NULL,
  `CodigoProducto` varchar(25) NOT NULL,
  `Cantidad` int(10) DEFAULT NULL,
  `Subtotal` int(10) DEFAULT NULL,
  `Impuesto` float DEFAULT NULL,
  PRIMARY KEY (`CodigoVenta`,`CodigoProducto`),
  KEY `CodigoProducto` (`CodigoProducto`),
  KEY `CodigoVenta` (`CodigoVenta`,`CodigoProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`CodigoVenta`, `CodigoProducto`, `Cantidad`, `Subtotal`, `Impuesto`) VALUES
(1, '7806505018150', 5, 5500, 0.19),
(2, '00144333658', 1, 70000, 0.19),
(2, '00192047537508', 1, 150000, 0.19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formadepago`
--

CREATE TABLE IF NOT EXISTS `formadepago` (
  `CodigoFP` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreFP` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoFP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `formadepago`
--

INSERT INTO `formadepago` (`CodigoFP`, `NombreFP`) VALUES
(1, 'Transferencia por Internet / Depósito'),
(2, 'Tarjeta de crédito'),
(3, 'Tarjeta de débito (RedCompra)'),
(4, 'Efectivo'),
(5, 'Cheque');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giroempresa`
--

CREATE TABLE IF NOT EXISTS `giroempresa` (
  `CodigoGiroEmpresa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreGiroEmpresa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoGiroEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `giroempresa`
--

INSERT INTO `giroempresa` (`CodigoGiroEmpresa`, `NombreGiroEmpresa`) VALUES
(1, 'Producción, procesamiento y conservación de alimentos'),
(2, 'Elaboración de otros productos alimenticios'),
(3, 'Elaboración de productos lácteos'),
(4, 'Elaboración de bebidas'),
(5, 'Elaboración de productos de tabaco'),
(6, 'Fabricación de productos textiles'),
(7, 'Fabricación de prendas de vestir'),
(8, 'Fabricación de calzado'),
(9, 'Fabricación de productos de madera'),
(10, 'Actividades de impresión'),
(11, 'Fabricación de sustancias químicas básicas'),
(12, 'Fabricación de productos de plástico'),
(13, 'Fabricación de vidrios y productos de vidrio'),
(14, 'Fabricación de productos metálicos para uso estructural'),
(15, 'Fab. de otros prod. elaborados y act. de trabajo de metales'),
(16, 'Fabricación de maquinaria de uso general'),
(17, 'Fabricación de aparatos de uso doméstico'),
(18, 'Fabricación de maquinaria de oficina, contabilidad e informática'),
(19, 'Fabricación de aparatos de distrubición y control'),
(20, 'Fabricación de hilos y cables aislados'),
(21, 'Fabricación y reparación de lámparas y equipo de iluminación'),
(22, 'Fabricación y reparación de otros tipos de equipo eléctico'),
(23, 'Fabricación de componentes eléctricos'),
(24, 'Fab. y reparación de trasmisores de radio, televisión y telefonía'),
(25, 'Fab. de receptores de radio, televisión y aparatos de audio y video'),
(26, 'Fab. de aparatos e intrumentos médicos y para realizar mediciones'),
(27, 'Fab. y reparación de instrumentos de óptica y equipo fotográfico'),
(28, 'Fabricación de relojes'),
(29, 'Fabricación de muebles'),
(30, 'Reciclamiento de desperdicios y desechos'),
(31, 'Generación, captación y distribución de energía eléctrica'),
(32, 'Fab. y distribución de gas'),
(33, 'Captación, depuración y distribución de agua'),
(34, 'Venta de vehículos automotores'),
(35, 'Mantenimientos y reparación de vehículos automotores'),
(36, 'Venta de partes, piezas y accesores de vehículos automotores'),
(37, 'Venta de enseres domésticos'),
(38, 'Venta de maquinaria, equipo y materiales conexos'),
(39, 'Venta de alimentos, bebidas, tabaco en almc. especializados'),
(40, 'Comercio al por menor de otros prod. nuevos en almc. especializados'),
(41, 'Venta al por menor en almacenes de artículos usados'),
(42, 'Reparación de efectos personales y enseres domésticos'),
(43, 'Alquiler de maquinaria y equipo'),
(44, 'Alquiler de efectos personales y enseres domésticos'),
(45, 'Publicidad'),
(46, 'Fabricación de papel y cartón'),
(47, 'Venta de celulares, accesorios, y recargas electrónicas'),
(48, 'Venta de art. de librerías, papelerías y de oficina'),
(49, 'venta de juguetería y de juegos infantiles'),
(50, 'Distribución de productos de consumo'),
(51, 'Venta de celulares, accesorios, y recargas electrónicas'),
(52, 'Otras actividades empresariales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `CodigoGrupo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreGrupo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodigoGrupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`CodigoGrupo`, `NombreGrupo`) VALUES
(1, 'Súper administrador'),
(2, 'Administrador'),
(3, 'Supervisor de bodega'),
(4, 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE IF NOT EXISTS `localizacion` (
  `CodigoLocalizacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `des_localizacion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodigoLocalizacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`CodigoLocalizacion`, `des_localizacion`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'A5'),
(6, 'A6'),
(7, 'B1'),
(8, 'B2'),
(9, 'B3'),
(10, 'B4'),
(11, 'B5'),
(12, 'B6'),
(13, 'C1'),
(14, 'C2'),
(15, 'C3'),
(16, 'C4'),
(17, 'C5'),
(18, 'C6'),
(19, 'D1'),
(20, 'D2'),
(21, 'D3'),
(22, 'D4'),
(23, 'D5'),
(24, 'D6'),
(25, 'E1'),
(26, 'E2'),
(27, 'E3'),
(28, 'E4'),
(29, 'E5'),
(30, 'E6'),
(31, 'F1'),
(32, 'F2'),
(33, 'F3'),
(34, 'F4'),
(35, 'F5'),
(36, 'F6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `CodigoMarca` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodigoCategoria` int(10) unsigned DEFAULT NULL,
  `NombreMarca` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoMarca`),
  KEY `CodigoCategoria` (`CodigoCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`CodigoMarca`, `CodigoCategoria`, `NombreMarca`) VALUES
(1, 1, 'Canon'),
(2, 1, 'Nikon'),
(3, 1, 'Fujifilm'),
(4, 1, 'Olympus'),
(5, 1, 'Sony'),
(6, 1, 'Panasonic'),
(7, 1, 'Kodak'),
(8, 1, 'Ricoh'),
(9, 2, 'Nokia'),
(10, 2, 'Samsung'),
(11, 2, 'Alcatel'),
(12, 2, 'HTC'),
(13, 2, 'BlackBerry'),
(14, 2, 'Apple'),
(15, 2, 'Motorola'),
(16, 2, 'LG'),
(17, 2, 'ZTE'),
(18, 2, 'Huawei'),
(19, 3, 'HP'),
(20, 3, 'Dell'),
(21, 3, 'Sony Vaio'),
(22, 3, 'Asus'),
(23, 3, 'Toshiba'),
(24, 3, 'Apple Mac'),
(25, 3, 'Acer'),
(26, 3, 'Compaq'),
(27, 3, 'Samsung'),
(28, 4, 'Nintendo'),
(31, 4, 'PlayStation'),
(34, 4, 'Xbox'),
(47, 14, 'Faber-Castell'),
(48, 14, 'Bic'),
(49, 14, 'Uhu'),
(50, 14, 'Paper Mate'),
(51, 14, 'Epson'),
(52, 14, 'Maxell'),
(53, 14, 'Equalit'),
(54, 14, 'Torre'),
(56, 3, 'TP-Link'),
(57, 6, 'RCA'),
(58, 3, 'Nisuta'),
(59, 6, 'Netmak'),
(60, 4, 'Noga'),
(61, 6, 'Genius'),
(62, 6, 'AM-5252'),
(63, 6, 'Beats'),
(64, 6, 'GTC'),
(65, 6, 'Omega'),
(66, 6, 'Panasonic'),
(67, 6, 'Panacom'),
(68, 6, 'Sony'),
(69, 6, 'Soul'),
(70, 3, 'Noga'),
(71, 3, 'Noganet'),
(73, 3, 'Epson'),
(74, 1, 'Claro'),
(75, 1, 'Movistar'),
(76, 3, 'Novatech'),
(77, 3, 'Kingston'),
(78, 4, 'Nogatech'),
(79, 4, 'Maxtor'),
(80, 3, 'Sharknet'),
(81, 3, 'Olivetti'),
(82, 6, 'Richi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `CodigoPais` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombrePais` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CodigoPais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`CodigoPais`, `NombrePais`) VALUES
(1, 'Chile'),
(2, 'Estados Unidos'),
(3, 'China'),
(4, 'Japón'),
(5, 'Corea del Sur'),
(6, 'Argentina'),
(7, 'Brasil'),
(8, 'México'),
(9, 'Alemania'),
(10, 'España');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `CodigoProducto` varchar(25) NOT NULL,
  `CodigoProveedor` int(10) unsigned DEFAULT NULL,
  `CodigoLocalizacion` int(10) unsigned DEFAULT NULL,
  `CodigoMarca` int(10) unsigned DEFAULT NULL,
  `NombreProducto` varchar(100) DEFAULT NULL,
  `Stock` int(10) unsigned DEFAULT NULL,
  `ValorCompra` int(10) unsigned DEFAULT NULL,
  `ValorVenta` int(10) unsigned DEFAULT NULL,
  `FechaYHoraIngreso` datetime DEFAULT NULL,
  `CodigoUsuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`CodigoProducto`),
  KEY `Producto_FKIndex2` (`CodigoMarca`),
  KEY `Producto_FKIndex3` (`CodigoProveedor`),
  KEY `Producto_FKIndex4` (`CodigoLocalizacion`),
  KEY `CodigoUsuario` (`CodigoUsuario`),
  KEY `CodigoProducto` (`CodigoProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`CodigoProducto`, `CodigoProveedor`, `CodigoLocalizacion`, `CodigoMarca`, `NombreProducto`, `Stock`, `ValorCompra`, `ValorVenta`, `FechaYHoraIngreso`, `CodigoUsuario`) VALUES
('00144333658', 4, 6, 26, 'Presario F700', 20, 40000, 70000, '2014-04-01 09:30:00', 4),
('00192047537508', 2, 12, 19, 'Pavilion dv4', 12, 90000, 150000, '2014-06-24 17:45:00', 4),
('05208', 7, 14, 56, 'Access Point 150Mbps TL-WA701ND', 20, 21000, 26500, '2014-03-03 11:00:00', 5),
('082121', 2, 29, 63, 'Auriculares rojos', 12, 8000, 13500, '2014-05-14 14:17:23', 4),
('091163237853', 2, 31, 61, 'Auriculares GHP GHP-205 Celeste', 25, 8500, 10500, '2014-06-10 10:32:08', 6),
('091163237877', 2, 31, 61, 'Auriculares GHP-240X Rosado', 12, 7500, 8990, '2014-05-06 13:18:32', 6),
('091163237976', 2, 31, 61, 'Auriculares GHP-240X Celeste', 12, 7500, 8990, '2014-06-10 11:26:45', 5),
('10114', 7, 31, 59, 'Adaptador HDMI a Mini HDMI', 45, 3500, 4200, '2014-07-01 10:22:14', 8),
('111453131', 2, 29, 63, 'Auriculares Studio', 10, 10100, 13500, '2014-06-03 09:39:16', 5),
('120023', 2, 32, 64, 'Auriculares HSG-010', 8, 2100, 2990, '2014-06-10 12:20:15', 8),
('1411185', 5, 34, 68, 'Auriculares 3.5 Blanco', 20, 3300, 4500, '2014-06-09 14:26:22', 5),
('156154', 5, 4, 74, 'Chip', 32, 600, 1200, '2014-05-27 16:21:41', 6),
('20030', 7, 29, 58, 'Adaptador de 8P a 2P Molex', 35, 2000, 2500, '2014-06-10 14:18:00', 7),
('20435', 7, 32, 58, 'Adaptador DVI-D a HDMI Blister NS-ADDVHD', 45, 4000, 4990, '2014-06-18 14:16:36', 7),
('205655641', 7, 15, 16, 'Access Point TL-WA500G', 15, 28900, 35000, '2014-04-01 10:10:00', 6),
('213543213', 2, 29, 63, 'Audiculares Solo', 15, 10100, 13000, '2014-07-01 10:37:11', 5),
('216546', 5, 28, 66, 'Auriculares RF-HVO96', 20, 4200, 5500, '2014-07-03 11:41:09', 6),
('3213543218', 5, 15, 19, 'Cargador P/notebook  HP 18.5V 3.5A 65W Smart PIN', 25, 23000, 28990, '2014-05-13 10:14:07', 4),
('332153215', 5, 3, 75, 'Chip', 45, 600, 1200, '2014-05-15 11:27:13', 8),
('356502042485040', 5, 13, 15, 'Celular Key XT Tactil', 12, 55000, 79990, '2014-06-10 10:32:08', 3),
('35818422', 5, 16, 10, 'Celular 1205 Liberado', 12, 23200, 28990, '2014-04-16 13:31:36', 7),
('531543', 5, 3, 13, 'Batería 8520 C-S2 Azul', 20, 6300, 7500, '2014-06-24 12:19:13', 6),
('5513241120', 5, 14, 10, 'Batería SIII', 30, 8100, 9500, '2014-05-13 15:21:22', 5),
('556132114', 5, 17, 20, 'Cargador P/notebook  19.5V 3.34A/4.62A Smart PIN', 30, 22200, 26990, '2014-05-14 09:16:25', 7),
('5644', 2, 29, 63, 'Auriculares Purity HD', 10, 9000, 18990, '2014-06-10 17:18:27', 3),
('6036261', 5, 34, 68, 'Auriculares 3.5 Celeste', 12, 3300, 4500, '2014-05-06 13:18:32', 4),
('60362612', 5, 34, 68, 'Auriculares Sony 3.5 Negro', 10, 3300, 4500, '2014-05-06 12:53:14', 5),
('63352213', 5, 5, 16, 'Batería MG200', 8, 4700, 5700, '2014-02-05 07:10:24', 5),
('651321', 5, 3, 11, 'Batería OT-708', 10, 4700, 5990, '2014-05-20 12:10:00', 5),
('6513545142', 5, 3, 13, 'Batería 9700', 20, 8100, 9700, '2014-06-10 11:26:45', 5),
('663235435', 5, 8, 15, 'Batería BK-60', 13, 4700, 5700, '2014-05-28 10:16:38', 5),
('66654112', 5, 34, 68, 'Auriculares 3.5 Rosa', 21, 3300, 4500, '2014-06-09 16:10:00', 4),
('7798130902341', 2, 32, 67, 'Auriculares HP9505 Celeste', 10, 2900, 3500, '2014-04-08 09:26:15', 3),
('7798130902389', 2, 33, 67, 'Auriculares BL1320 Bluetooth', 12, 35900, 43500, '2014-05-06 15:27:22', 5),
('7798137380883', 5, 11, 70, 'Base para notebook NG-919', 8, 7700, 9990, '2014-05-13 10:38:01', 5),
('7798137383327', 5, 11, 70, 'Base para notebook NG-A206', 6, 4400, 7000, '2014-06-03 16:21:31', 4),
('7798137384362', 5, 12, 71, 'Base para notebook NG-X8', 12, 8050, 9990, '2014-05-06 11:26:14', 4),
('7798137698308', 2, 14, 60, 'Alfombra de baile NGX-880', 10, 11500, 14990, '2014-06-17 16:18:33', 4),
('7806505018150', 1, 30, 54, 'Cuaderno Mat. 7mm. 100 Hjs.', 50, 700, 1100, '2014-03-11 13:00:00', 5),
('7809596505714', 5, 12, 11, 'Celular 292A Liberado', 25, 28000, 35000, '2014-04-08 12:16:00', 6),
('8590934387', 2, 4, 14, 'iPhone, negro, 16GB', 8, 90000, 190000, '2014-05-14 16:50:00', 4),
('8701430242764', 5, 35, 69, 'Auricular SL-33 Rojo', 15, 6100, 7990, '2014-05-06 11:47:14', 6),
('91163238010', 2, 31, 61, 'Auriculares GHP-205 Rosa', 12, 8500, 10500, '2014-03-03 11:00:00', 6),
('95621365', 5, 8, 15, 'Batería BX-50', 12, 4700, 5700, '2014-06-24 12:19:13', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `CodigoProveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodigoCiudad` int(10) unsigned DEFAULT NULL,
  `CodigoGiroEmpresa` int(10) unsigned DEFAULT NULL,
  `NombreProveedor` varchar(100) DEFAULT NULL,
  `Razonsocial` varchar(100) DEFAULT NULL,
  `RutProveedor` varchar(12) DEFAULT NULL,
  `Telefono1Proveedor` int(20) unsigned DEFAULT NULL,
  `Telefono2Proveedor` int(20) unsigned DEFAULT NULL,
  `EmailProveedor` varchar(255) DEFAULT NULL,
  `Nombredecontacto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoProveedor`),
  KEY `Proveedor_FKIndex1` (`CodigoCiudad`),
  KEY `Proveedor_FKIndex2` (`CodigoGiroEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`CodigoProveedor`, `CodigoCiudad`, `CodigoGiroEmpresa`, `NombreProveedor`, `Razonsocial`, `RutProveedor`, `Telefono1Proveedor`, `Telefono2Proveedor`, `EmailProveedor`, `Nombredecontacto`) VALUES
(1, 1, 46, 'PISA', 'Papeles Industriales S.A.', '94.282.000-3', 800200973, 4294967295, 'institucional@pisa.cl', 'José Maria Arriagada'),
(2, 58, 47, 'SoloStocks', 'SoloStocks - Comercio Digital, S.A.', '65.018.259-6', 4294967295, NULL, 'info@solostocks.com', 'Alberto Barnils'),
(3, 1, 48, 'Artel', 'ARTEL S.A.I.C.', '92.642.000-3', 4294967295, 4294967295, 'info@artel.cl', 'Osvaldo Matzner Thomsen'),
(4, 1, 49, 'Mayoreo.cl', 'Mayoreo S.A.', '8.366.097-K', 23026574, 51598348, 'pagos@mayoreo.cl', 'Silvia Pérez Méndez'),
(5, 7, 49, 'Emilio Sandoval Poo', 'Emilio Sandoval Poo S.A', '84.398.200-K', 452955555, 452295556, 'servicioalcliente@espol.cl', 'Natalia Ureta'),
(6, 16, 51, 'Compracelulares.net', 'Global Technology Miami Corp', 'R2800828B', 4294967295, 3055993771, 'alex@gt-miami.com', 'Christopher Vail'),
(7, 1, 38, 'Wei Computación', 'Wei Chile S.A.', '96.775.870-1', 224410000, 226382170, 'wei@wei.cl', 'Waldo Villanueva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `CodigoUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodigoGrupo` int(10) unsigned NOT NULL,
  `RutUsuario` varchar(12) DEFAULT NULL,
  `NombreUsuario` varchar(100) DEFAULT NULL,
  `Contrasena` varchar(1000) DEFAULT NULL,
  `Telefono1Usuario` int(20) unsigned DEFAULT NULL,
  `Telefono2Usuario` int(20) unsigned DEFAULT NULL,
  `EmailUsuario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CodigoUsuario`),
  KEY `Usuario_FKIndex1` (`CodigoGrupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CodigoUsuario`, `CodigoGrupo`, `RutUsuario`, `NombreUsuario`, `Contrasena`, `Telefono1Usuario`, `Telefono2Usuario`, `EmailUsuario`) VALUES
(1, 1, '16.531.409-3', 'Webmaster', 'ee212928713abe023712acec360163e4', 452323802, 77665730, 'teban.az@gmail.com'),
(2, 2, '17.678.305-2', 'Gonzalo González', '3b898a062e35bfb2fe4ae4a29c8836df', 68201076, NULL, 'g.ramirez1891@gmail.com'),
(3, 2, '16.824.763-K', 'Iván Coronado', 'cc57018e0cd61542cac0bc84ed44fa38', 71410440, NULL, 'icoronado21@gmail.com'),
(4, 3, '16.625.110-9', 'Juan Soto', 'juans1', 86358791, NULL, 'juansoto1@gmail.com'),
(5, 4, '15.652.851-K', 'Juan Pérez', 'juanp1', 89111122, NULL, 'juanperez1@gmail.com'),
(6, 3, '13.471.064-0', 'María Herrera', 'maria1', 88776655, NULL, 'mariaherrera1@gmail.com'),
(7, 4, '13.392.364-0', 'Pedro', 'pedro1', 452323808, 55443322, 'pedro1@hotmail.com'),
(8, 3, '08.419.930-3', 'hector', '7a7a717bdd29881b13fe3094740bacfc', 121212, 121212, 'hector1@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE IF NOT EXISTS `vendedor` (
  `CodigoVendedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreVendedor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoVendedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`CodigoVendedor`, `NombreVendedor`) VALUES
(1, 'Pedro Bolivar'),
(2, 'Marcela Freire'),
(3, 'Claudio Espinoza'),
(4, 'Fernanda Ulloa'),
(5, 'David Lagos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `CodigoVenta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodigoVendedor` int(10) unsigned NOT NULL,
  `CodigoFP` int(10) unsigned NOT NULL,
  `CodigoCliente` int(10) unsigned NOT NULL,
  `FechaEmision` date DEFAULT NULL,
  `Total` int(20) NOT NULL,
  `Observaciones` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoVenta`),
  KEY `Factura_FKIndex2` (`CodigoCliente`),
  KEY `Factura_FKIndex3` (`CodigoFP`),
  KEY `Factura_FKIndex1` (`CodigoVendedor`),
  KEY `CodigoVenta` (`CodigoVenta`),
  KEY `CodigoCliente` (`CodigoCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`CodigoVenta`, `CodigoVendedor`, `CodigoFP`, `CodigoCliente`, `FechaEmision`, `Total`, `Observaciones`) VALUES
(1, 2, 4, 1, '2014-06-25', 5500, 'Todo ok.'),
(2, 3, 5, 4, '2014-06-02', 220000, 'El notebook Compaq no tiene garantía ya que no posee repuestos');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`CodigoPais`) REFERENCES `pais` (`CodigoPais`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`CodigoCiudadCliente`) REFERENCES `ciudadcliente` (`CodigoCiudadCliente`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`CodigoProducto`) REFERENCES `producto` (`CodigoProducto`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`CodigoVenta`) REFERENCES `venta` (`CodigoVenta`);

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`CodigoCategoria`) REFERENCES `categoria` (`CodigoCategoria`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`CodigoProveedor`) REFERENCES `proveedor` (`CodigoProveedor`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`CodigoLocalizacion`) REFERENCES `localizacion` (`CodigoLocalizacion`),
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`CodigoMarca`) REFERENCES `marca` (`CodigoMarca`),
  ADD CONSTRAINT `producto_ibfk_5` FOREIGN KEY (`CodigoUsuario`) REFERENCES `usuario` (`CodigoUsuario`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`CodigoCiudad`) REFERENCES `ciudad` (`CodigoCiudad`),
  ADD CONSTRAINT `proveedor_ibfk_2` FOREIGN KEY (`CodigoGiroEmpresa`) REFERENCES `giroempresa` (`CodigoGiroEmpresa`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`CodigoGrupo`) REFERENCES `grupo` (`CodigoGrupo`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`CodigoFP`) REFERENCES `formadepago` (`CodigoFP`),
  ADD CONSTRAINT `venta_ibfk_4` FOREIGN KEY (`CodigoVendedor`) REFERENCES `vendedor` (`CodigoVendedor`),
  ADD CONSTRAINT `venta_ibfk_5` FOREIGN KEY (`CodigoCliente`) REFERENCES `cliente` (`CodigoCliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
