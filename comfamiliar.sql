-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-12-2020 a las 21:10:57
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
  `NOMB_CATEG` varchar(30) NOT NULL,
  `ESTADO` varchar(25) NOT NULL,
  PRIMARY KEY (`COD_CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`COD_CATEGORIA`, `NOMB_CATEG`, `ESTADO`) VALUES
(1, 'Naturales', 'Activa'),
(2, 'Castellano', 'Activa'),
(3, 'Sociales', 'Activa'),
(4, 'Matematicas', 'Activa'),
(5, 'Literatura', 'Activa'),
(6, 'Ingles', 'Activa'),
(7, 'Video Beam', 'Activa'),
(8, 'Dispositivos de audio', 'Activa'),
(9, 'Diccionario o enciclopedia', 'Activa'),
(10, 'Quimica', 'Activa'),
(11, 'Fisica', 'Activa'),
(12, 'Filosofia', 'Activa'),
(13, ' Informatica', 'Activa'),
(14, 'Etica y Religión', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE IF NOT EXISTS `configuracion` (
  `nit_empresa` varchar(20) NOT NULL,
  `nombre_empresa` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` bigint(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `ciudad` varchar(25) NOT NULL,
  `paginaweb` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`nit_empresa`, `nombre_empresa`, `direccion`, `telefono`, `correo`, `pais`, `ciudad`, `paginaweb`) VALUES
('1234', 'Comfamiliar', 'calle5', 3001244545, 'Example14@gmail.com', 'Colombia', 'cartagena', 'kjhdkjsadcom');

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
  `NOMBRE_LH` varchar(20) NOT NULL,
  `CATEGORIA` int(2) NOT NULL,
  `CANTIDAD` int(3) NOT NULL,
  `CANTIDAD_DISPONIBLE` int(3) NOT NULL,
  `COD_PROVEEDOR` int(5) NOT NULL,
  `AUTOR` varchar(50) DEFAULT NULL,
  `EDITORIAL` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`COD_LH`),
  KEY `COD_PROVEEDOR` (`COD_PROVEEDOR`,`CATEGORIA`),
  KEY `CATEGORIA` (`CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`COD_LH`, `NOMBRE_LH`, `CATEGORIA`, `CANTIDAD`, `CANTIDAD_DISPONIBLE`, `COD_PROVEEDOR`, `AUTOR`, `EDITORIAL`) VALUES
(1, 'Hipertexto 8', 1, 32, 32, 1, 'Carlos Alberto Maldonado ', 'santillana'),
(12, 'Video Beam', 7, 3, 3, 2, '', '');

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
(1, 'Admin'),
(2, 'Bibliotecaria');

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
  `TELEFONO` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CURSO` (`CURSO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`ID`, `PRIMER_NOMBRE`, `SEGUNDO_NOMBRE`, `PRIMER_APE`, `SEGUNDO_APE`, `CATEGORIA`, `CURSO`, `CORREO`, `TELEFONO`) VALUES
(1002058291, 'David', '', 'Jurado', 'Maldonado', '', 1, ' dajuma15@hotmail.es', 30021547),
(1002173560, 'Elian', 'De Jesus', 'Naranjo', 'Gonzales', 'D', 3, 'example14@gmai.com', 3022947230),
(1002173561, 'Alejandro ', NULL, 'navarro', 'Rodrigues', 'C', 3, 'example15@gmai.com', 3022947231),
(1002173562, 'Cherise', 'Paola', 'Pajaro', 'Cuentas', 'A', 3, 'example16@gmail.com', 3022947232),
(1002173563, 'Emanuel', 'Alberto', 'Perez', 'Mangones', 'D', 3, 'example17@gmai.com', 3022947233),
(1002173564, 'Santiago', 'Rafael', 'Quintana', 'Insigares', 'A', 3, 'example18@gmai.com', 3022947234),
(1002173565, 'Luz', 'Adriana', 'Ramirez', 'Camargo', 'A', 3, 'example19@gmai.com', 3022947235),
(1002173566, 'Kevin', 'David', 'Ramirez', 'Gonzales', 'C', 3, 'example20@gmai.com', 3022947236),
(1002173567, 'Maria', 'Fernanda', 'Ramos', 'Utria', 'A', 3, 'example21@gmai.com', 3022947237),
(1002173568, 'Mateo ', 'Alejandro ', 'Ramos', 'Zuñiga', 'A', 3, 'example22@gmai.com', 3022947238),
(1002173569, 'Tomas', 'Angel', 'Sarmiento', 'Castillo', 'D', 3, 'example23@gmai.com', 3022947239),
(1002173570, 'Yeferson', 'Dario', 'Sarmiento', 'Gomez', 'A', 3, 'example24@gmai.com', 3022947240),
(1002173571, 'Eilyn', 'Sofia', 'Suarez', 'Mena', 'A', 3, 'example25@gmai.com', 3022947241),
(1002173572, 'Luz', 'Daniela', 'Torrez', 'Moreno', 'A', 3, 'example26@gmai.com', 3022947242),
(1002193885, 'Dilan', 'Dario', 'Dejanon ', 'Uribe', '', 1, 'dilandasan@hotmail.com', 3022947232),
(1002193886, 'Instuctor', '', 'Gabriel', 'Fortich', 'a', 1, ' gfortich@gmail.com', 30229472),
(1002198740, 'Marlon', 'Andres', 'Angulo', 'Posada', 'A', 2, 'example1@gmail.com', 3022947330),
(1002198741, 'Laura', 'Andrea', 'Arrieta', 'Montalvo', 'A', 2, 'example2@gmail.com', 3022947331),
(1002198742, 'Melanie', NULL, 'Baracasnegras', 'Hurtado', 'A', 2, 'example3@gmail.com', 3022947332),
(1002198743, 'Jeferson', NULL, 'Cañate', 'Ayola', 'D', 2, 'example4@gmail.com', 3022947333),
(1002198744, 'Sharyk', NULL, 'Cruz', 'Estrada', 'C', 2, 'example5@gmail.com', 3022947334),
(1002198745, 'Duvan', 'Felipe', 'Franco', 'Barrios', 'A', 2, 'example6@gmail.com', 3022947335),
(1002198746, 'Juan ', 'Jose', 'Garcia', 'Barrios', 'B', 2, 'example7@gmail.com', 3022947336),
(1002198747, 'Sebastian', 'Andres', 'Garcia', 'Ortega', 'B', 2, 'example8@gmail.com', 3022947337),
(1002198748, 'Adrian', 'Felipe', 'Gomez', 'Consuegra', 'A', 4, 'example9@gmail.com', 3022947338),
(1002198749, 'Sebastian', 'Jose', 'Gonzales', 'Bossa', 'A', 4, 'example10@gmail.com', 3022947339),
(1002198750, 'Luz', 'Kathy', 'Grimaldo', 'Medina', 'D', 4, 'example11@gmail.com', 3022947340),
(1002198751, 'Sebastian', 'Eduardo', 'Hernandez', 'Lopez', 'D', 4, 'example12@gmail.com', 3022947341),
(1002198752, 'Mavis', 'Alejandra', 'Marrugo', 'Gamara', 'A', 4, 'example13@gmail.com', 3022947342);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`PRESTAMO_ID`, `USUARIO_ID`, `COD_LH`, `FECHA_SALIDA`, `HORA_SALIDA`, `FECHA_ENTREGA`, `HORA_ENTREGA`, `CANTIDA_SA`, `ESTADO`) VALUES
(1, 1002173560, 1, '2020-12-18', '15:21:00', '2020-12-09', '16:20:00', 3, 'Devuelto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `COD_PROVEEDOR` int(5) NOT NULL,
  `NOMBRE_PROVEEDOR` varchar(18) NOT NULL,
  `PRODUCTO` varchar(18) NOT NULL,
  `DIREC_PRO` varchar(90) NOT NULL,
  `TELEFONO_PROVEEDOR` bigint(14) NOT NULL,
  `PAIS` varchar(25) NOT NULL,
  `CIUDAD` varchar(25) NOT NULL,
  PRIMARY KEY (`COD_PROVEEDOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`COD_PROVEEDOR`, `NOMBRE_PROVEEDOR`, `PRODUCTO`, `DIREC_PRO`, `TELEFONO_PROVEEDOR`, `PAIS`, `CIUDAD`) VALUES
(1, 'Panamericana', 'Libro', 'Calle 29 d # 22 - 108 Centro Comercial Caribe Plaza, Local 226, Cartagena, Bolívar', 6720706, 'Colombia', 'Cartagena'),
(2, 'Benq', 'Video Beam', 'Carrera 65 A No. 98-15', 3001458789, 'Colombia', 'Bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `USUARIO_ID` int(14) NOT NULL,
  `PASS` varchar(25) NOT NULL,
  `NIVEL` int(1) NOT NULL,
  `NOMBRE_USU` varchar(20) NOT NULL,
  KEY `USUARIO_ID` (`USUARIO_ID`,`NIVEL`),
  KEY `NIVEL` (`NIVEL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`USUARIO_ID`, `PASS`, `NIVEL`, `NOMBRE_USU`) VALUES
(1002058291, '1234', 1, 'DAVID'),
(1002193885, '1234', 1, 'DILAN'),
(1002193886, '1234', 2, 'INT GABRIEL FORTICH');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD CONSTRAINT `herramienta_ibfk_1` FOREIGN KEY (`COD_PROVEEDOR`) REFERENCES `proveedores` (`COD_PROVEEDOR`) ON DELETE CASCADE,
  ADD CONSTRAINT `herramienta_ibfk_2` FOREIGN KEY (`CATEGORIA`) REFERENCES `categorias` (`COD_CATEGORIA`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`CURSO`) REFERENCES `curso` (`COD_CURSO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`USUARIO_ID`) REFERENCES `personal` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`COD_LH`) REFERENCES `herramienta` (`COD_LH`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`USUARIO_ID`) REFERENCES `personal` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`NIVEL`) REFERENCES `niveles` (`COD_NIVEL`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
