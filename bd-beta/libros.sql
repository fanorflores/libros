-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-04-2019 a las 21:26:12
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libros`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `InsertarAsignatura`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarAsignatura` (IN `nombreIN` VARCHAR(45), IN `carreraIN` VARCHAR(45))  BEGIN
INSERT INTO `libros`.`asignatura` (`nombre`, `carrera`) VALUES (nombreIN, carreraIN);
END$$

DROP PROCEDURE IF EXISTS `login`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `userIN` VARCHAR(60), IN `pwdIN` VARCHAR(60))  BEGIN
SELECT * FROM libros.usuarios where usuarios.user=userIN and usuarios.pwd=pwdIN and not suspendido;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
CREATE TABLE IF NOT EXISTS `asignatura` (
  `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `carrera` varchar(45) NOT NULL,
  PRIMARY KEY (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idAsignatura`, `nombre`, `carrera`) VALUES
(2, 'Metodología de la Investigación', 'IE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

DROP TABLE IF EXISTS `autores`;
CREATE TABLE IF NOT EXISTS `autores` (
  `idAutores` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  PRIMARY KEY (`idAutores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `idLibros` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `isbn` int(11) NOT NULL,
  `paginas` int(11) NOT NULL,
  `size` float NOT NULL,
  `year` year(4) NOT NULL,
  `edicion` int(11) NOT NULL,
  `fechaUp` date NOT NULL,
  `tomo` int(11) NOT NULL,
  `idBiblio` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `portada` varchar(500) DEFAULT NULL,
  `resumen` varchar(1500) DEFAULT NULL,
  PRIMARY KEY (`idLibros`),
  UNIQUE KEY `isbn_UNIQUE` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librosasignatura`
--

DROP TABLE IF EXISTS `librosasignatura`;
CREATE TABLE IF NOT EXISTS `librosasignatura` (
  `idlibrosAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `idLibros` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`idlibrosAsignatura`),
  KEY `idLibros_idx` (`idLibros`),
  KEY `idAsignatura_idx` (`idAsignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librosautores`
--

DROP TABLE IF EXISTS `librosautores`;
CREATE TABLE IF NOT EXISTS `librosautores` (
  `idlibrosAutores` int(11) NOT NULL AUTO_INCREMENT,
  `idLibros` int(11) NOT NULL,
  `idAutores` int(11) NOT NULL,
  PRIMARY KEY (`idlibrosAutores`),
  KEY `idLibros_idx` (`idLibros`),
  KEY `idAutores_idx` (`idAutores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `url` varchar(500) NOT NULL,
  `submenu` tinyint(4) NOT NULL,
  `iconClass` varchar(60) DEFAULT NULL,
  `padre` int(11) DEFAULT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idMenu`),
  KEY `idTipoUsuario_idx` (`idTipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mislibros`
--

DROP TABLE IF EXISTS `mislibros`;
CREATE TABLE IF NOT EXISTS `mislibros` (
  `idMisLibros` int(11) NOT NULL AUTO_INCREMENT,
  `subido` tinyint(4) NOT NULL,
  `favorito` tinyint(4) NOT NULL,
  `idLibros` int(11) NOT NULL,
  `id` bigint(20) NOT NULL,
  PRIMARY KEY (`idMisLibros`),
  KEY `idLibros_idx` (`idLibros`),
  KEY `id_idx` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Docente'),
(3, 'Estudiante'),
(4, 'Guest');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `user` varchar(45) NOT NULL,
  `pwd` varchar(60) NOT NULL,
  `suspendido` tinyint(4) NOT NULL,
  `picture` varchar(120) DEFAULT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTipoUsuario_idx` (`idTipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `user`, `pwd`, `suspendido`, `picture`, `idTipoUsuario`) VALUES
(1, 'Fanor Antonio', 'Rivera Flores', 'frivera', '123hacked', 0, NULL, 1),
(2, 'Dagoberto', 'Cáceres', 'dcacers', '321hacked', 0, NULL, 2),
(3, 'Jorge', 'Laguna', 'avellan', '985hacked', 0, NULL, 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `librosasignatura`
--
ALTER TABLE `librosasignatura`
  ADD CONSTRAINT `idAsignatura` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`idAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idLibrosA` FOREIGN KEY (`idLibros`) REFERENCES `libros` (`idLibros`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `librosautores`
--
ALTER TABLE `librosautores`
  ADD CONSTRAINT `idAutores` FOREIGN KEY (`idAutores`) REFERENCES `autores` (`idAutores`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idLibrosE` FOREIGN KEY (`idLibros`) REFERENCES `libros` (`idLibros`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `idTipoUsuarioMenu` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mislibros`
--
ALTER TABLE `mislibros`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idLibros` FOREIGN KEY (`idLibros`) REFERENCES `libros` (`idLibros`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idTipoUsuario` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
