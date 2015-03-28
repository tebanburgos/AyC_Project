-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2014 a las 06:21:17
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `CodigoCiudad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodigoRegion` int(10) unsigned DEFAULT NULL,
  `NombreCiudad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoCiudad`),
  KEY `Ciudad_FKIndex1` (`CodigoRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `CodigoCliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RutCliente` varchar(12) NOT NULL,
  `NombreCliente` varchar(100) DEFAULT NULL,
  `ApellidoCliente` varchar(100) DEFAULT NULL,
  `Telefono1Cliente` int(10) unsigned DEFAULT NULL,
  `Telefono2Cliente` int(10) unsigned DEFAULT NULL,
  `EmailCliente` varchar(255) DEFAULT NULL,
  `DireccionCliente` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CodigoCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `CodigoFactura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodigoUsuario` int(10) unsigned NOT NULL,
  `CodigoFP` int(10) unsigned NOT NULL,
  `CodigoCliente` int(10) unsigned NOT NULL,
  `FechaEmision` date DEFAULT NULL,
  `Cantidad` int(10) unsigned DEFAULT NULL,
  `Subtotal` int(10) unsigned DEFAULT NULL,
  `Impuesto` float DEFAULT NULL,
  `Descuento` float DEFAULT NULL,
  `Total` int(10) unsigned DEFAULT NULL,
  `Observaciones` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoFactura`),
  KEY `Factura_FKIndex2` (`CodigoCliente`),
  KEY `Factura_FKIndex3` (`CodigoFP`),
  KEY `Factura_FKIndex1` (`CodigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formadepago`
--

CREATE TABLE IF NOT EXISTS `formadepago` (
  `CodigoFP` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreFP` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoFP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `CodigoGrupo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreGrupo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodigoGrupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`CodigoGrupo`, `NombreGrupo`) VALUES
(1, 'Administrador'),
(2, 'Supervisor'),
(3, 'Estandard');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `CodigoInventario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodigoMovimiento` int(10) unsigned DEFAULT NULL,
  `FechaInventario` date DEFAULT NULL,
  PRIMARY KEY (`CodigoInventario`),
  KEY `Inventario_FKIndex1` (`CodigoMovimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE IF NOT EXISTS `localizacion` (
  `CodigoLocalizacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `des_localizacion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodigoLocalizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `CodigoMarca` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreMarca` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE IF NOT EXISTS `movimiento` (
  `CodigoMovimiento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreMovimiento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoMovimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `CodigoPais` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombrePais` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CodigoPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `CodigoProducto` bigint(30) unsigned NOT NULL,
  `CodigoProveedor` int(10) unsigned DEFAULT NULL,
  `CodigoCategoria` int(10) unsigned DEFAULT NULL,
  `CodigoLocalizacion` int(10) unsigned DEFAULT NULL,
  `CodigoMarca` int(10) unsigned DEFAULT NULL,
  `NombreProducto` varchar(30) DEFAULT NULL,
  `Stock` int(10) unsigned DEFAULT NULL,
  `ValorCompra` int(10) unsigned DEFAULT NULL,
  `ValorVenta` int(10) unsigned DEFAULT NULL,
  `FechaYHoraIngreso` datetime DEFAULT NULL,
  PRIMARY KEY (`CodigoProducto`),
  KEY `Producto_FKIndex1` (`CodigoCategoria`),
  KEY `Producto_FKIndex2` (`CodigoMarca`),
  KEY `Producto_FKIndex3` (`CodigoProveedor`),
  KEY `Producto_FKIndex4` (`CodigoLocalizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`CodigoProducto`, `CodigoProveedor`, `CodigoCategoria`, `CodigoLocalizacion`, `CodigoMarca`, `NombreProducto`, `Stock`, `ValorCompra`, `ValorVenta`, `FechaYHoraIngreso`) VALUES
(7800063330068, 12, 13, 14, 15, 'Remedio', 16, 1990, 5000, '2014-06-24 03:16:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_factura`
--

CREATE TABLE IF NOT EXISTS `producto_factura` (
  `Producto_CodigoProducto` int(10) unsigned NOT NULL,
  `Factura_CodigoFactura` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Producto_CodigoProducto`,`Factura_CodigoFactura`),
  KEY `Producto_Factura_FKIndex1` (`Producto_CodigoProducto`),
  KEY `Producto_Factura_FKIndex2` (`Factura_CodigoFactura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_inventario`
--

CREATE TABLE IF NOT EXISTS `producto_inventario` (
  `Producto_CodigoProducto` int(10) unsigned NOT NULL,
  `Inventario_CodigoInventario` int(10) unsigned NOT NULL,
  `Cantidad` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`Producto_CodigoProducto`,`Inventario_CodigoInventario`),
  KEY `Producto_Inventario_FKIndex1` (`Producto_CodigoProducto`),
  KEY `Producto_Inventario_FKIndex2` (`Inventario_CodigoInventario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `CodigoProveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodigoCiudad` int(10) unsigned DEFAULT NULL,
  `CodigoRazonSocial` int(10) unsigned NOT NULL,
  `NombreProveedor` varchar(100) DEFAULT NULL,
  `RutProveedor` varchar(12) DEFAULT NULL,
  `Telefono1Proveedor` int(10) unsigned DEFAULT NULL,
  `Telefono2Proveedor` int(10) unsigned DEFAULT NULL,
  `EmailProveedor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CodigoProveedor`),
  KEY `Proveedor_FKIndex1` (`CodigoCiudad`),
  KEY `Proveedor_FKIndex2` (`CodigoRazonSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razonsocial`
--

CREATE TABLE IF NOT EXISTS `razonsocial` (
  `CodigoRazonSocial` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NombreRazonSocial` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoRazonSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `CodigoRegion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodigoPais` int(10) unsigned DEFAULT NULL,
  `NombreRegion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodigoRegion`),
  KEY `Region_FKIndex1` (`CodigoPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE IF NOT EXISTS `trabajadores` (
  `nombre` varchar(34) NOT NULL,
  `apaterno` varchar(39) NOT NULL,
  `amaterno` varchar(30) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `rfc` int(20) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`nombre`, `apaterno`, `amaterno`, `puesto`, `rfc`, `id`) VALUES
('Gonzalo', 'Gonzalez', 'Ramirez', 'Gerente', 123, 7800063330068);

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
  `Telefono1Usuario` int(10) unsigned DEFAULT NULL,
  `Telefono2Usuario` int(10) unsigned DEFAULT NULL,
  `EmailUsuario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CodigoUsuario`),
  KEY `Usuario_FKIndex1` (`CodigoGrupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CodigoUsuario`, `CodigoGrupo`, `RutUsuario`, `NombreUsuario`, `Contrasena`, `Telefono1Usuario`, `Telefono2Usuario`, `EmailUsuario`) VALUES
(1, 1, '17678305-2', 'Gerente', '21232f297a57a5a743894a0e4a801fc3', 12312312, 1235, 'asjdga@gmail.com'),
(2, 2, '9177817-3', 'Supervisor', '1b3231655cebb7a1f783eddf27d254ca', 351465, 1654654, 'laksjd@gmail.com'),
(3, 3, '17678305-3', 'Reponedor', 'ee11cbb19052e40b07aac0ca060c23ee', 12312, 123123, '1231@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `CodigoFactura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FechaVenta` date DEFAULT NULL,
  `ValorVenta` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`CodigoFactura`),
  KEY `Ventas_FKIndex2` (`CodigoFactura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
