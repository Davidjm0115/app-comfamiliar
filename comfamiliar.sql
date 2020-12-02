-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-12-2020 a las 02:48:00
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comfamiliar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `COD_CATEGORIA` int(2) NOT NULL,
  `NOMB_CATEG` varchar(25) NOT NULL,
  PRIMARY KEY (`COD_CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`COD_CATEGORIA`, `NOMB_CATEG`) VALUES
(2, 'Castellano'),
(3, 'Sociales'),
(4, 'Literatura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE IF NOT EXISTS `configuracion` (
  `nit_empresa` varchar(20) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pais` varchar(25) NOT NULL,
  `ciudad` varchar(25) NOT NULL,
  `paginaweb` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`nit_empresa`, `nombre_empresa`, `direccion`, `telefono`, `correo`, `pais`, `ciudad`, `paginaweb`) VALUES
('1234', 'Comfamiliar', 'calle5', 3001244545, 'majuva0318@hotmail.es', 'Colombia', 'cartagena', 'kjhdkjsadcom');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `COD_CURSO` int(2) NOT NULL,
  `DEPARTAMENTO` varchar(25) NOT NULL,
  `CURSO` varchar(5) NOT NULL,
  PRIMARY KEY (`COD_CURSO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`COD_CURSO`, `DEPARTAMENTO`, `CURSO`) VALUES
(1, 'admin', 'admin'),
(2, 'Nariño', '11-02'),
(3, 'Cundinamarca', '11-01'),
(4, 'Putumayo', '11-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

DROP TABLE IF EXISTS `herramienta`;
CREATE TABLE IF NOT EXISTS `herramienta` (
  `COD_LH` int(5) NOT NULL,
  `NOMBRE_LH` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CATEGORIA` int(2) NOT NULL,
  `EDITORIAL` varchar(20) DEFAULT NULL,
  `CANTIDAD` int(3) NOT NULL,
  `CANTIDAD_DISPONIBLE` int(3) NOT NULL,
  `COD_PROVEEDOR` int(5) NOT NULL,
  `AUTOR` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`COD_LH`),
  KEY `COD_PROVEEDOR` (`COD_PROVEEDOR`,`CATEGORIA`),
  KEY `CATEGORIA` (`CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`COD_LH`, `NOMBRE_LH`, `CATEGORIA`, `EDITORIAL`, `CANTIDAD`, `CANTIDAD_DISPONIBLE`, `COD_PROVEEDOR`, `AUTOR`) VALUES
(1, 'Hipertexto 8', 2, 'santillana', 32, 32, 1, 'Santillana'),
(2, 'Cien apos de soledad', 4, 'panamericana', 1, 1, 1, 'Gabriel Garcia marquez'),
(3, 'Hipertexto 5', 3, 'Santillana', 21, 21, 19, 'Santillana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

DROP TABLE IF EXISTS `niveles`;
CREATE TABLE IF NOT EXISTS `niveles` (
  `COD_NIVEL` int(1) NOT NULL,
  `ACESSO` varchar(25) NOT NULL,
  PRIMARY KEY (`COD_NIVEL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`COD_NIVEL`, `ACESSO`) VALUES
(1, 'todo'),
(2, 'bibliotecario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `ID` int(14) NOT NULL,
  `PRIMER_NOMBRE` varchar(18) NOT NULL,
  `SEGUNDO_NOMBRE` varchar(18) DEFAULT NULL,
  `PRIMER_APE` varchar(18) NOT NULL,
  `SEGUNDO_APE` varchar(18) NOT NULL,
  `CATEGORIA` varchar(1) DEFAULT NULL,
  `CURSO` int(5) NOT NULL,
  `CORREO` varchar(50) DEFAULT NULL,
  `TELEFONO` int(15) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CURSO` (`CURSO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`ID`, `PRIMER_NOMBRE`, `SEGUNDO_NOMBRE`, `PRIMER_APE`, `SEGUNDO_APE`, `CATEGORIA`, `CURSO`, `CORREO`, `TELEFONO`) VALUES
(7654, 'Gabriel', 'qqwe', 'Fortich', 'Gomez', 'a', 1, ' fortich', 34434232),
(1002058291, 'David', NULL, 'Jurado', 'Maldonado', 'a', 1, 'dajuma15@hotmail.es', 301286251),
(1002173561, 'Alejandro ', NULL, 'Navarro', 'Rodrigues', 'A', 2, 'Example15@gmail.com', 302294724),
(1002173562, 'Cherise', 'Paola', 'Pajaro', 'Cuentas', 'A', 2, 'Example16@gmail.com', 302294724),
(1002173563, 'Emanuel', 'Alberto', 'Perez', 'M<ngones', 'D', 2, 'Example17@gmail.com', 302294725),
(1002173564, 'Santiago', 'Rafael', 'Quintana', 'Insignare', 'A', 2, 'Example18@gmail.com', 302294726),
(1002173565, 'Luz', 'Adriana', 'Ramirez', 'Camargo', 'A', 2, 'Example19@gmail.com', 302294727),
(1002173566, 'Kevin', 'David', 'Ramirez', 'Gonzales', 'C', 2, 'Example20@gmail.com', 302294728),
(1002173567, 'Maria', 'Fernanda', 'Ramos', 'Utria', 'A', 2, 'Example21@gmail.com', 302294729),
(1002173569, 'Tomas', 'Angel', 'Sarmiento', 'Castillo', 'D', 2, 'Example23@gmail.com', 302294731),
(1002173570, 'Yeferson', 'Dario', 'Sarmiento', 'Gomez', 'A', 2, 'Example24@gmail.com', 302294732),
(1002173571, 'Eilyn', 'Sofia', 'Suarez', 'Mena', 'A', 2, 'Example25@gmail.com', 302294733),
(1002173572, 'Luz', 'Daniela', 'Torres', 'Moreno', 'A', 2, 'Example26@gmail.com', 302294734);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE IF NOT EXISTS `prestamos` (
  `PRESTAMO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID` int(14) NOT NULL,
  `COD_LH` int(5) NOT NULL,
  `FECHA_SALIDA` date NOT NULL,
  `HORA_SALIDA` time NOT NULL,
  `FECHA_ENTREGA` date NOT NULL,
  `HORA_ENTREGA` time NOT NULL,
  `CANTIDA_SA` int(3) NOT NULL,
  `ESTADO` varchar(20) NOT NULL,
  PRIMARY KEY (`PRESTAMO_ID`),
  KEY `USUARIO_ID` (`USUARIO_ID`,`COD_LH`),
  KEY `COD_LH` (`COD_LH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `COD_PROVEEDOR` int(5) NOT NULL,
  `NOMBRE_PROVEEDOR` varchar(18) NOT NULL,
  `PRODUCTO` varchar(18) NOT NULL,
  `DIREC_PRO` varchar(100) NOT NULL,
  `TELEFONO_PROVEEDOR` bigint(14) NOT NULL,
  `PAIS` varchar(25) NOT NULL,
  `CIUDAD` varchar(25) NOT NULL,
  PRIMARY KEY (`COD_PROVEEDOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`COD_PROVEEDOR`, `NOMBRE_PROVEEDOR`, `PRODUCTO`, `DIREC_PRO`, `TELEFONO_PROVEEDOR`, `PAIS`, `CIUDAD`) VALUES
(1, 'Panamericana', 'Libro', 'Calle 29 d # 22 - 108 Centro Comercial Caribe Plaza, Local 226, Cartagena, Bolivar', 3005474596, 'Colombia', 'Cartagena'),
(3, 'Benq', 'Video Bean', 'calle2', 3001547896, 'Colombia', 'cartagena'),
(19, 'norma', 'Cuaderno', 'clle4545', 3001247851, 'Colombia', 'Cartagena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `USUARIO_ID` int(14) NOT NULL,
  `PASS` varchar(25) NOT NULL,
  `NIVEL` int(1) NOT NULL,
  `NOMBRE_USU` varchar(20) DEFAULT NULL,
  KEY `USUARIO_ID` (`USUARIO_ID`,`NIVEL`),
  KEY `NIVEL` (`NIVEL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`USUARIO_ID`, `PASS`, `NIVEL`, `NOMBRE_USU`) VALUES
(1002058291, '1234', 1, 'Heisenber0115'),
(7654, '54321', 2, 'Fortich');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD CONSTRAINT `herramienta_ibfk_1` FOREIGN KEY (`COD_PROVEEDOR`) REFERENCES `proveedores` (`COD_PROVEEDOR`),
  ADD CONSTRAINT `herramienta_ibfk_2` FOREIGN KEY (`CATEGORIA`) REFERENCES `categorias` (`COD_CATEGORIA`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`CURSO`) REFERENCES `curso` (`COD_CURSO`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`USUARIO_ID`) REFERENCES `personal` (`ID`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`COD_LH`) REFERENCES `herramienta` (`COD_LH`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`USUARIO_ID`) REFERENCES `personal` (`ID`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`NIVEL`) REFERENCES `niveles` (`COD_NIVEL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
