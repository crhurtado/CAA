-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2013 a las 19:00:00
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `caa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE IF NOT EXISTS `asignaciones` (
  `id_asign` int(11) NOT NULL AUTO_INCREMENT,
  `ced_prof` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cod_mat` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `seccion` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_asign`),
  KEY `ced_prof` (`ced_prof`),
  KEY `cod_mat` (`cod_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `cod_carrera` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nomb_carrera` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_prof`
--

CREATE TABLE IF NOT EXISTS `datos_prof` (
  `ced_prof` int(9) NOT NULL,
  `nomb_prof` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `apell_prof` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `profesion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `telf` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correo_prof` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `hist_asign` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ced_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `id_hist` int(11) NOT NULL AUTO_INCREMENT,
  `ced_prof` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nomb_prof` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `apell_prof` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `nomb_mat` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `seccion` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `aula` int(2) NOT NULL,
  `hora_ent` time NOT NULL,
  `hora_sal` time NOT NULL,
  PRIMARY KEY (`id_hist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hist_pendiente`
--

CREATE TABLE IF NOT EXISTS `hist_pendiente` (
  `id_hist_pend` int(11) NOT NULL AUTO_INCREMENT,
  `ced_prof` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nomb_prof` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `apell_prof` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `nomb_mat` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `seccion` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `aula` int(2) NOT NULL,
  `hora_ent` time NOT NULL,
  `hora_sal` time NOT NULL,
  `horas_acad` int(2) NOT NULL,
  `activo` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_hist_pend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `id_asign` int(11) NOT NULL,
  `ced_prof` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `dia` int(1) NOT NULL,
  `hora_ent` time NOT NULL,
  `hora_sal` time NOT NULL,
  `aula` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `horas_acad` int(1) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_horario`),
  KEY `ced_prof` (`ced_prof`),
  KEY `ced_prof_2` (`ced_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE IF NOT EXISTS `horas` (
  `ced_prof` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `horas_cumplidas` int(11) NOT NULL,
  PRIMARY KEY (`ced_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `cod_mat` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nomb_mat` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `semestre_mat` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `cod_carrera` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_mat`),
  KEY `nomb_mat` (`nomb_mat`),
  KEY `nomb_mat_2` (`nomb_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nick` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nick`, `pass`, `activo`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
('admin_alt', '9174e5b543aa4e8fdc07cc9dae7b5c80', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
