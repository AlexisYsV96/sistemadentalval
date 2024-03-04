-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2019 a las 15:07:30
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_clinicadental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codi_cat` int(11) NOT NULL,
  `nomb_cat` varchar(45) DEFAULT NULL,
  `esta_cat` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codi_cat`, `nomb_cat`, `esta_cat`) VALUES
(1, 'Bajo', 'A'),
(2, 'Medio', 'A'),
(3, 'Alto', 'A'),
(4, 'Intermedio', 'A'),
(5, 'cirugia', 'A'),
(6, 'Simple ', 'A'),
(7, 'NIVEL ALTO', 'A'),
(8, 'ALTO NIVEL', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_medica`
--

CREATE TABLE `cita_medica` (
  `codi_cit` int(11) NOT NULL,
  `codi_pac` int(11) DEFAULT NULL,
  `codi_med` int(11) DEFAULT NULL,
  `motivo_consult` varchar(80) DEFAULT NULL,
  `sintomas` varchar(40) DEFAULT NULL,
  `fech_cit` datetime NOT NULL,
  `obsv_cit` varchar(200) NOT NULL,
  `esta_cit` char(1) DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cita_medica`
--

INSERT INTO `cita_medica` (`codi_cit`, `codi_pac`, `codi_med`, `motivo_consult`, `sintomas`, `fech_cit`, `obsv_cit`, `esta_cit`) VALUES
(1, 1, 1, 'Caries', 'Por curar', '2018-01-05 02:39:00', '', 'A'),
(2, 1, 1, 'Caries', 'dolor', '2018-01-05 02:48:00', 'Por consulta', 'A'),
(3, 1, 1, 'Ninguno', 'Ninguno', '2018-01-06 02:48:00', '', 'A'),
(4, 4, 1, 'a', 'a', '2018-02-10 14:08:00', 'a', 'T'),
(5, 4, 1, '1', '1', '2018-02-11 10:19:00', '1', 'T'),
(6, 4, 1, 'motivo', 'sintoma', '2018-02-11 10:46:00', '', 'A'),
(7, 4, 1, 'e', '2', '2018-02-15 15:33:00', '', 'A'),
(8, 1, 1, '1', '1', '2018-02-22 10:11:00', '1', 'A'),
(9, 1, 1, 'ninguna', 'ninguna', '2018-03-09 09:02:00', 'dews', 'A'),
(10, 1, 1, 'Por dolor molar', 'Dolor en los dientes', '2018-03-10 09:43:00', 'Ninguna', 'T'),
(11, 1, 1, 'desde', 'de', '2018-03-10 11:44:00', 'res', 'A'),
(12, 4, 1, 'por descuido', 'por cobrar', '2018-03-10 11:57:00', 'por descanso', 'A'),
(13, 1, 1, 'DEBER', 'NINGUNO', '2018-03-12 22:12:00', 'POR DEBER', 'A'),
(14, 1, 1, 'D', 'D', '2018-03-11 22:14:00', 'D', 'A'),
(15, 4, 1, 'DE', 'F', '2018-03-12 22:14:00', '', 'A'),
(16, 1, 1, 'dede', 'de', '2018-03-13 23:52:00', '', 'T'),
(17, 1, 1, 'Por desnutricion', 'ninguna', '2018-03-17 06:17:00', 'por ver', 'A'),
(18, 1, 1, 'por desgarro', 'por venir', '2018-03-16 06:18:00', '', 'A'),
(19, 1, 1, 'Por dolor', 'ninguno', '2018-03-18 09:39:00', 'por ninguna', 'A'),
(20, 4, 1, 'Por dolor', 'ningun', '2018-03-18 22:37:00', 'otros', 'A'),
(21, 1, 1, 'POR DOLOR DENTAL', 'NINGUNO', '2018-03-19 19:13:00', 'POR VER', 'T'),
(22, 2, 1, 'de', 'e', '2018-03-19 23:21:00', 's', 'T'),
(23, 1, 1, 'por demor', 'juhh', '2018-03-23 01:01:00', 'hy', 'A'),
(24, 2, 1, 'por tos', 'ninguno', '2018-04-04 04:11:00', '', 'T'),
(25, 1, 1, 'D', 'RE', '2018-04-04 01:55:00', '', 'T'),
(26, 1, 1, 'FRED', 'DES', '2018-04-04 01:57:00', '', 'T'),
(27, 1, 1, 'DESDE', 'DES', '2018-04-04 02:07:00', '', 'T'),
(28, 1, 1, 'DE', 'D', '2018-04-04 02:14:00', '', 'T'),
(29, 1, 1, 'por tos', 'ninguna', '2018-04-04 02:17:00', '', 'T'),
(30, 1, 1, 'des', 'des', '2018-04-04 02:20:00', '', 'T'),
(31, 1, 1, 'de', 'des', '2018-04-04 02:24:00', '', 'T'),
(32, 1, 1, 'des', 'sew', '2018-04-04 02:27:00', '', 'T'),
(33, 1, 1, 'POR TOS', 'NINGUNA', '2018-04-04 14:40:00', '', 'T'),
(34, 1, 1, 'por dientecurado', 'dolor', '2018-04-05 04:51:00', 'por ver', 'T'),
(35, 1, 1, 'ninguna hasta el momento', 'por molar', '2018-04-05 05:01:00', '', 'T'),
(36, 1, 1, 'por ninguna', 'fr', '2018-04-05 05:05:00', '', 'T'),
(37, 1, 1, 'por molares', 'perdida', '2018-04-05 05:12:00', '', 'T'),
(38, 1, 1, 'e', 'de', '2018-04-05 05:16:00', '', 'T'),
(39, 1, 1, 'por distuccion', 'por cariar', '2018-04-05 05:20:00', '', 'T'),
(40, 2, 1, 'de', 'de', '2018-04-05 05:25:00', '', 'T'),
(41, 1, 1, 'RED', 'NINGUNO', '2018-04-08 11:58:00', '', 'T'),
(42, 1, 1, 'des', 's', '2018-04-08 21:11:00', '', 'T'),
(43, 1, 1, 'por desmayo', 'ninguno', '2018-04-09 23:41:00', 'default', 'A'),
(44, 4, 1, 'por demayo', 'ninguno', '2018-04-09 12:47:00', 'paquete', 'A'),
(45, 1, 1, 'des', 'des', '2018-04-10 00:14:00', 'de', 'T'),
(46, 1, 1, 'desdee', 'dddd', '2018-04-10 00:22:00', 'desde', 'T'),
(47, 1, 1, 'POR DOLOR', 'NINGUNO', '2018-04-10 22:29:00', 'POR DOLOR DEL DIENTE', 'T'),
(48, 1, 1, 'dfr', 'des', '2018-04-10 22:53:00', 'se', 'T'),
(49, 1, 1, 'POR DEMORA DE DIENTE', 'POR DOLOR', '2018-04-11 23:35:00', '', 'T'),
(50, 1, 1, 'des', 's', '2018-04-15 12:09:00', 's', 'T'),
(51, 1, 1, 'des', 'des', '2018-04-15 18:12:00', 'des', 'T'),
(52, 1, 1, 'dese', 'dee', '2018-04-17 13:51:00', 'dess3', 'T'),
(53, 1, 1, 'tr', 'r', '2018-04-17 00:39:00', 'r', 'A'),
(54, 1, 1, 'por demora', 'ninguno', '2018-04-18 12:23:00', 'por calculo', 'T'),
(55, 7, 1, 'por caries', 'por ninguno', '2018-04-19 15:40:00', 'wesss', 'T'),
(56, 3, 1, 'afdaf', 'asdfasdf', '2018-04-19 23:28:00', 'asdfsadf', 'T'),
(57, 7, 1, 'dese', 'des', '2018-04-20 15:25:00', 's', 'T'),
(58, 1, 1, 'por dolor en los dientes', 'ninguno', '2018-04-21 12:10:00', 'paciente vino por quemadura', 'A'),
(59, 1, 1, 'por diente', 'ninguno', '2018-04-22 11:53:00', 'por molar', 'T'),
(60, 1, 1, 'DESE', 'DES', '2018-04-22 12:21:00', 'SE', 'T'),
(61, 1, 1, 'des', 'de', '2018-04-22 13:22:00', '', 'T'),
(62, 1, 1, 'chijun', 'hyggy', '2018-04-22 13:42:00', '', 'T'),
(63, 2, 1, 'motivo', 'sintoma', '2018-04-22 13:48:00', '', 'T'),
(64, 1, 1, 'ab', 'd', '2018-04-22 13:57:00', '', 'T'),
(65, 1, 1, 'asd', 'ds', '2018-04-22 13:59:00', '', 'T'),
(66, 1, 1, 'af', 'ff', '2018-04-22 14:00:00', '', 'T'),
(67, 2, 1, 'asdads', 'asd', '2018-04-22 14:02:00', '', 'T'),
(68, 1, 1, 'ninguno', 'des', '2018-04-22 20:03:00', 'e', 'T'),
(69, 1, 1, 'des', 'ee', '2018-04-22 20:06:00', '', 'T'),
(70, 1, 1, 'desde', 'de', '2018-04-22 20:27:00', 'de', 'T'),
(71, 1, 1, 're', 'refed', '2018-04-22 20:57:00', 'de', 'T'),
(72, 1, 1, 'desde', 'e', '2018-04-22 21:00:00', 'e', 'A'),
(73, 1, 1, 'por desgarroo', 'ninguno<', '2018-04-23 08:59:00', '', 'A'),
(74, 8, 1, 'POR DOLOR DE DIENTE', 'FUERTE DOLOR', '2018-04-24 15:35:00', 'NINGUNA', 'T'),
(75, 1, 1, 'ningun', '46', '2018-04-24 23:54:00', 'jyy', 'T'),
(76, 1, 1, 'ninguna', 'hyg', '2018-04-25 00:04:00', 'ju', 'T'),
(77, 1, 1, 'por dolor de caries', 'ninguno', '2018-05-04 12:18:00', 'por dolor mesial', 'T'),
(78, 6, 1, 'por dolor articular', 'ninguno', '2018-05-07 21:11:00', 'ninguno', 'T'),
(79, 1, 1, 'por desgarre', 'por desgarre', '2018-05-07 23:10:00', 'por observacion', 'A'),
(80, 1, 1, 'por dolor molar', 'ninguno', '2018-06-06 09:25:00', 'ninguno', 'A'),
(81, 6, 1, 'POR DOLOR DENTAL', 'DOLOR', '2018-06-19 23:40:00', 'POR DOLORES FUERTES', 'T'),
(82, 1, 1, 'dental', 'ninguno', '2018-07-17 23:26:00', 'desde', 'A'),
(83, 1, 1, 'por dolor dental', 'no tiene ningun sintoma el paciente', '2018-08-11 12:23:00', 'dolor', 'A'),
(84, 1, 1, 'por dolor molar', 'dolor dientes', '2018-09-01 01:48:00', '', 'A'),
(85, 1, 1, 'molar', 'sistemas', '2018-09-16 20:52:00', 'deses', 'A'),
(86, 1, 3, 'POR DOLOR', 'POR NINGUNO', '2018-09-20 12:17:00', 'SIN DOLOR', 'T'),
(87, 8, 1, 'por dolor', 'ninguno dolor', '2018-09-29 13:39:00', 'por dolar', 'T'),
(88, 8, 2, 'por un dolor en los dientes', 'dolor fuerte', '2018-09-29 15:00:00', 'por dolores', 'A'),
(89, 1, 1, 'Por un dolor ', 'por molares', '2018-10-06 13:30:00', 'revisar', 'T'),
(90, 1, 1, 'por dolor', 'ninguno', '2018-10-06 14:04:00', 'por dolores', 'T'),
(91, 9, 2, 'por un dolor fuerte en los dientes superiores', 'fuerte dolor', '2018-10-09 16:10:00', 'por una atencion', 'A'),
(92, 1, 2, 'dolores en las muelas', 'fuertes dolores', '2018-12-25 11:40:00', 'dolor', 'A'),
(93, 1, 3, 'dolores', 'dolor', '2018-12-26 18:53:00', 'fuerte', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica`
--

CREATE TABLE `clinica` (
  `id_clin` int(11) NOT NULL,
  `nomb_clin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direc_clin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telf_clin` int(15) NOT NULL,
  `email_clin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ruc_clin` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `esta_clin` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clinica`
--

INSERT INTO `clinica` (`id_clin`, `nomb_clin`, `direc_clin`, `telf_clin`, `email_clin`, `ruc_clin`, `esta_clin`) VALUES
(1, 'VITAL DENT', 'PROL. SAN MARTÍN 170 - 2 PISO - HUACHO ', 2394087, 'clinicavitaldent@hotmail.com', '10424584555', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_fac`
--

CREATE TABLE `detalle_fac` (
  `precio` decimal(10,2) DEFAULT NULL,
  `codi_dpr` int(11) NOT NULL,
  `codi_fac` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_fac`
--

INSERT INTO `detalle_fac` (`precio`, `codi_dpr`, `codi_fac`) VALUES
('200.00', 1, 1),
('200.00', 2, 2),
('200.00', 3, 3),
('200.00', 4, 3),
('200.00', 5, 4),
('200.00', 6, 4),
('200.00', 7, 5),
('200.00', 8, 5),
('200.00', 9, 6),
('200.00', 10, 6),
('200.00', 11, 7),
('200.00', 12, 7),
('200.00', 13, 7),
('200.00', 14, 8),
('200.00', 15, 8),
('200.00', 16, 9),
('200.00', 17, 10),
('200.00', 18, 10),
('200.00', 19, 11),
('200.00', 20, 12),
('200.00', 21, 12),
('200.00', 22, 13),
('200.00', 23, 13),
('200.00', 24, 14),
('200.00', 25, 15),
('200.00', 26, 15),
('200.00', 27, 16),
('200.00', 28, 16),
('200.00', 29, 17),
('200.00', 30, 17),
('200.00', 31, 18),
('200.00', 32, 18),
('200.00', 33, 18),
('200.00', 34, 19),
('200.00', 35, 19),
('200.00', 36, 19),
('200.00', 37, 20),
('200.00', 38, 21),
('200.00', 39, 21),
('200.00', 40, 22),
('200.00', 41, 22),
('200.00', 42, 23),
('200.00', 43, 24),
('200.00', 44, 24),
('200.00', 45, 25),
('200.00', 46, 25),
('200.00', 47, 25),
('200.00', 48, 26),
('200.00', 49, 26),
('200.00', 50, 26),
('200.00', 51, 27),
('200.00', 52, 27),
('200.00', 53, 27),
('200.00', 54, 28),
('200.00', 55, 29),
('200.00', 56, 30),
('200.00', 57, 31),
('200.00', 58, 32),
('200.00', 59, 33),
('200.00', 60, 34),
('200.00', 61, 34),
('200.00', 62, 34),
('200.00', 63, 34),
('200.00', 64, 34),
('200.00', 65, 35),
('200.00', 66, 35),
('200.00', 67, 35),
('200.00', 68, 36),
('180.00', 69, 36),
('180.00', 70, 36),
('180.00', 71, 36),
('200.00', 72, 37),
('200.00', 73, 37),
('200.00', 74, 37),
('200.00', 75, 37),
('200.00', 76, 37),
('200.00', 77, 37),
('200.00', 78, 37),
('200.00', 79, 47),
('200.00', 80, 47),
('200.00', 81, 47),
('200.00', 82, 48),
('200.00', 83, 49),
('200.00', 84, 49),
('200.00', 85, 49),
('200.00', 86, 50),
('200.00', 87, 51),
('200.00', 88, 51),
('200.00', 89, 51),
('192.00', 90, 51),
('200.00', 91, 52),
('200.00', 92, 53),
('200.00', 93, 53),
('200.00', 94, 54),
('450.00', 95, 54),
('200.00', 96, 55),
('200.00', 97, 55),
('200.00', 98, 55),
('200.00', 99, 55),
('623.76', 100, 56),
('678.00', 101, 56),
('678.00', 102, 56),
('600.00', 103, 58),
('200.00', 104, 59),
('450.00', 105, 59),
('450.00', 106, 59),
('200.00', 107, 60),
('480.00', 108, 60),
('450.00', 109, 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_proc`
--

CREATE TABLE `detalle_proc` (
  `codi_dpr` int(11) NOT NULL,
  `codi_odo` int(11) NOT NULL,
  `codi_tar` int(11) NOT NULL,
  `aseg_dpr` decimal(3,1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_proc`
--

INSERT INTO `detalle_proc` (`codi_dpr`, `codi_odo`, `codi_tar`, `aseg_dpr`) VALUES
(1, 76, 7, '0.0'),
(2, 77, 7, '0.0'),
(3, 81, 7, '0.0'),
(4, 82, 7, '0.0'),
(5, 83, 7, '0.0'),
(6, 84, 7, '0.0'),
(7, 9, 7, '0.0'),
(8, 85, 7, '0.0'),
(9, 86, 7, '0.0'),
(10, 87, 7, '0.0'),
(11, 88, 7, '0.0'),
(12, 12, 7, '0.0'),
(13, 89, 7, '0.0'),
(14, 8, 7, '0.0'),
(15, 90, 7, '0.0'),
(16, 8, 7, '0.0'),
(17, 8, 7, '0.0'),
(18, 91, 7, '0.0'),
(19, 8, 7, '0.0'),
(20, 6, 7, '0.0'),
(21, 15, 7, '0.0'),
(22, 8, 7, '0.0'),
(23, 15, 7, '0.0'),
(24, 92, 7, '0.0'),
(25, 8, 7, '0.0'),
(26, 15, 7, '0.0'),
(27, 17, 7, '0.0'),
(28, 7, 7, '0.0'),
(29, 8, 7, '0.0'),
(30, 15, 7, '0.0'),
(31, 6, 7, '0.0'),
(32, 94, 7, '0.0'),
(33, 15, 7, '0.0'),
(34, 8, 7, '0.0'),
(35, 15, 7, '0.0'),
(36, 95, 7, '0.0'),
(37, 8, 7, '0.0'),
(38, 8, 7, '0.0'),
(39, 21, 7, '0.0'),
(40, 8, 7, '0.0'),
(41, 97, 7, '0.0'),
(42, 99, 7, '0.0'),
(43, 8, 7, '0.0'),
(44, 101, 7, '0.0'),
(45, 6, 7, '0.0'),
(46, 102, 7, '0.0'),
(47, 21, 7, '0.0'),
(48, 103, 7, '0.0'),
(49, 18, 7, '0.0'),
(50, 20, 7, '0.0'),
(51, 8, 7, '0.0'),
(52, 104, 7, '0.0'),
(53, 105, 7, '0.0'),
(54, 8, 7, '0.0'),
(55, 17, 7, '0.0'),
(56, 17, 7, '0.0'),
(57, 22, 7, '0.0'),
(58, 6, 7, '0.0'),
(59, 107, 7, '0.0'),
(60, 8, 7, '0.0'),
(61, 8, 7, '0.0'),
(62, 8, 7, '0.0'),
(63, 108, 7, '0.0'),
(64, 109, 7, '0.0'),
(65, 110, 7, '0.0'),
(66, 111, 7, '0.0'),
(67, 112, 7, '0.0'),
(68, 113, 7, '0.0'),
(69, 113, 7, '10.0'),
(70, 114, 7, '10.0'),
(71, 116, 7, '10.0'),
(72, 118, 7, '0.0'),
(73, 119, 7, '0.0'),
(74, 120, 7, '0.0'),
(75, 121, 7, '0.0'),
(76, 122, 7, '0.0'),
(77, 123, 7, '0.0'),
(78, 124, 7, '0.0'),
(79, 15, 7, '0.0'),
(80, 15, 7, '0.0'),
(81, 15, 7, '0.0'),
(82, 8, 7, '0.0'),
(83, 8, 7, '0.0'),
(84, 8, 7, '0.0'),
(85, 8, 7, '0.0'),
(86, 8, 7, '0.0'),
(87, 131, 7, '0.0'),
(88, 131, 7, '0.0'),
(89, 132, 7, '0.0'),
(90, 133, 7, '4.0'),
(91, 6, 7, '0.0'),
(92, 6, 7, '0.0'),
(93, 7, 7, '0.0'),
(94, 134, 7, '0.0'),
(95, 134, 9, '0.0'),
(96, 136, 7, '0.0'),
(97, 137, 7, '0.0'),
(98, 139, 7, '0.0'),
(99, 141, 7, '0.0'),
(100, 135, 8, '8.0'),
(101, 142, 8, '0.0'),
(102, 143, 8, '0.0'),
(103, 32, 10, '0.0'),
(104, 145, 7, '0.0'),
(105, 145, 9, '0.0'),
(106, 146, 9, '0.0'),
(107, 17, 7, '0.0'),
(108, 9, 11, '0.0'),
(109, 32, 9, '0.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diente`
--

CREATE TABLE `diente` (
  `codi_die` int(11) NOT NULL,
  `codi_pac` int(11) NOT NULL,
  `codi_cit` int(11) NOT NULL,
  `id_die` int(11) NOT NULL,
  `num_die` int(11) NOT NULL,
  `codi_edi` int(11) DEFAULT NULL,
  `part_die` char(5) NOT NULL DEFAULT '00000'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `diente`
--

INSERT INTO `diente` (`codi_die`, `codi_pac`, `codi_cit`, `id_die`, `num_die`, `codi_edi`, `part_die`) VALUES
(1, 4, 4, 1, 65, 2, 'MDVPO'),
(2, 4, 5, 1, 52, 6, 'MDVPO'),
(3, 4, 5, 1, 72, 3, '000P0'),
(4, 4, 5, 1, 83, 5, 'MDVPO'),
(5, 4, 5, 1, 85, 5, '00V00'),
(6, 1, 89, 1, 11, 7, 'MDVPO'),
(7, 1, 76, 1, 61, 4, 'MDVPO'),
(8, 1, 71, 1, 21, 5, 'MDVPO'),
(9, 1, 90, 1, 51, 2, 'MDVPO'),
(10, 1, 54, 1, 43, 2, 'MDVPO'),
(11, 2, 22, 1, 11, 4, 'MDVPO'),
(12, 2, 24, 1, 31, 4, 'MDVPO'),
(13, 2, 40, 1, 21, 3, 'MDVPO'),
(14, 2, 24, 1, 47, 8, 'MDVPO'),
(15, 1, 68, 1, 31, 2, 'MDVPO'),
(16, 1, 54, 1, 42, 8, 'MDVPO'),
(17, 1, 89, 1, 22, 1, '0D00I'),
(18, 1, 54, 1, 32, 2, 'MDVPO'),
(19, 1, 54, 1, 81, 4, 'MDVPO'),
(20, 1, 54, 1, 46, 1, 'MDVPO'),
(21, 1, 54, 1, 41, 3, 'MDVPO'),
(22, 1, 54, 1, 71, 2, 'MDVPO'),
(23, 1, 54, 1, 45, 16, 'MDVPO'),
(24, 2, 40, 1, 72, 3, 'MDVPO'),
(25, 2, 40, 1, 42, 4, 'MDVPO'),
(26, 1, 89, 1, 64, 4, 'MDVPO'),
(27, 1, 54, 1, 52, 6, 'MDVPO'),
(28, 1, 60, 1, 12, 11, 'MDVPO'),
(29, 1, 54, 1, 62, 1, 'MDVPO'),
(30, 1, 54, 1, 82, 4, 'MDVPO'),
(31, 1, 54, 1, 53, 2, 'MDVPO'),
(32, 1, 90, 1, 23, 3, 'MDVPO'),
(33, 1, 54, 1, 15, 4, 'MDVPO'),
(34, 1, 54, 1, 26, 3, 'MDVPO'),
(35, 7, 55, 1, 13, 5, 'MDVPO'),
(36, 7, 55, 1, 62, 2, 'MDVPO'),
(37, 7, 55, 1, 46, 1, 'MDVPO'),
(38, 3, 56, 1, 11, 6, 'MDVPO'),
(39, 3, 56, 1, 62, 5, 'MDVPO'),
(40, 3, 56, 1, 32, 5, '000L0'),
(41, 3, 56, 1, 74, 5, '0000O'),
(42, 3, 56, 1, 82, 8, 'M0000'),
(43, 7, 57, 1, 55, 3, 'MDVPO'),
(44, 7, 57, 1, 54, 7, 'MDVPO'),
(45, 7, 57, 1, 53, 7, 'MDVPO'),
(46, 7, 57, 1, 71, 7, 'MDVPO'),
(47, 7, 57, 1, 81, 7, 'MDVPO'),
(48, 7, 57, 1, 72, 7, 'MDVPO'),
(49, 7, 57, 1, 75, 7, 'MDVPO'),
(50, 7, 57, 1, 74, 7, 'MDVPO'),
(51, 1, 59, 1, 13, 8, 'MDVPO'),
(52, 1, 59, 1, 28, 7, 'MDVPO'),
(53, 2, 63, 1, 13, 1, 'MDVPO'),
(54, 2, 67, 1, 41, 3, 'MDVPO'),
(55, 1, 71, 1, 83, 3, 'MDVPO'),
(56, 8, 74, 1, 12, 3, 'MDVPO'),
(57, 8, 74, 1, 26, 5, 'MDVPO'),
(58, 8, 74, 1, 71, 2, 'MDVPO'),
(59, 1, 77, 1, 24, 2, 'MDVPO'),
(60, 6, 81, 1, 22, 1, 'MDVPO'),
(61, 6, 78, 1, 23, 4, 'M0000'),
(62, 6, 78, 1, 13, 4, 'M0000'),
(63, 6, 78, 1, 14, 3, '0D000'),
(64, 6, 78, 1, 15, 5, '0D000'),
(65, 6, 78, 1, 25, 6, '0D000'),
(66, 6, 78, 1, 21, 6, '0D000'),
(67, 6, 81, 1, 63, 3, 'MDVPO'),
(68, 6, 81, 1, 53, 6, 'MDVPO'),
(69, 1, 89, 1, 25, 2, 'MDVPO'),
(70, 8, 87, 1, 61, 2, 'MDVPO'),
(71, 8, 87, 1, 64, 4, '0D0P0'),
(72, 8, 87, 1, 13, 1, 'MDVPO'),
(73, 8, 87, 1, 22, 4, 'MDVPO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE `enfermedad` (
  `codi_enf` varchar(6) NOT NULL,
  `titu_enf` char(1) DEFAULT NULL,
  `desc_enf` varchar(200) DEFAULT NULL,
  `esta_enf` char(1) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enfermedad`
--

INSERT INTO `enfermedad` (`codi_enf`, `titu_enf`, `desc_enf`, `esta_enf`) VALUES
('K00.4', 'D', 'Trastornos en la formación ', 'A'),
('K00.2', 'D', 'Anormalidades de tamaño y forma de los dientes', 'A'),
('K00.1', 'D', 'Hiperodontia', 'A'),
('K00.0', 'D', 'Anodoncia', 'A'),
('K02.1', 'D', 'Caries de dentina', 'A'),
('K00.5', 'D', 'Trastornos hereditarios en la estructura de los dientes, no clasificados en otra parte', 'A'),
('K00.6', 'D', 'Trastornos en la erupción de los dientes', 'A'),
('K00.7', 'D', 'Síndrome de la dentición', 'A'),
('K00.8', 'D', 'Otros trastornos del desarrollo de los dientes', 'A'),
('K00.9', 'D', 'Trastorno del desarrollo de los dientes sin especificar', 'A'),
('K01.0', 'D', 'Dientes embebidos', 'A'),
('K01.1', 'D', 'Dientes impactados', 'A'),
('K02.0', 'D', 'Caries limitada al esmalte', 'A'),
('K02.2', 'D', 'Caries del cemento', 'A'),
('K02.3', 'D', 'Caries arrestada', 'A'),
('K02.4', 'D', 'Odontoclasia', 'A'),
('K02.8', 'D', 'Otras caries', 'A'),
('K02.9', 'D', 'Caries sin especificar', 'A'),
('K03.0', 'D', 'Atrición excesiva de los dientes', 'A'),
('K03.1', 'D', 'Abrasion de los dientes', 'A'),
('K03.2', 'D', 'Erosión de los dientes', 'A'),
('K03.3', 'D', ' Resorción patológica de los dientes', 'A'),
('K03.4', 'D', 'Hipercementosis', 'A'),
('K03.5', 'D', 'Anquilosis de los dientes', 'A'),
('K03.6', 'D', 'Depósitos (acreciones) de los dientes', 'A'),
('K03.7', 'D', 'Cambios de color posteruptivos de los tejidos duros dentales', 'A'),
('K03.8', 'D', 'Otras enfermedades especificadas de los tejidos duros de los dientes', 'A'),
('K03.9', 'D', 'Enfermedad de los tejidos duros de los dientes sin especificar', 'A'),
('K04.0', 'D', 'Pulpitis', 'A'),
('K04.1', 'D', 'Necrosis de la pulpa dentaria', 'A'),
('K04.2', 'D', 'Degeneración de la pulpa dentaria', 'A'),
('K04.3', 'D', 'Formación anormal de los tejidos duros de la pulpa dentaria', 'A'),
('K04.4', 'D', 'Periodontitis apical aguda de la pulpa dentaria', 'A'),
('K04.5', 'D', 'Periodontitis apical crónica', 'A'),
('K04.6', 'D', 'Absceso periapical con senos', 'A'),
('K04.7', 'D', 'Absceso periapical sin senos', 'A'),
('K04.8', 'D', 'Quiste radicular', 'A'),
('K04.9', 'D', 'Otras enfermedades de la pulpa dentaria y los tejidos periapicales y enfermedades sin especificar', 'A'),
('K05.0', 'D', 'Gingivitis aguda', 'A'),
('K05.1', 'D', 'Gingivitis crónica', 'A'),
('K05.2', 'D', 'Periodontitis aguda', 'A'),
('K05.3', 'D', 'Periodontitis crónica', 'A'),
('K05.4', 'D', 'Periodontosis', 'A'),
('K05.5', 'D', 'Otras enfermedades periodontales', 'A'),
('K05.6', 'D', 'Enfermedad periodontal sin especificar', 'A'),
('K06.0', 'D', 'Recesión gingival', 'A'),
('K06.1', 'D', 'Alargamiento gingival', 'A'),
('K06.2', 'D', 'Lesiones gingivales y de la cresta alveolar edentulosa asociadas con traumas', 'A'),
('K06.8', 'D', 'Otros trastornos gingivales y de la cresta alveolar edentulosa especificados', 'A'),
('K06.9', 'D', 'Trastorno gingival y de la cresta alveolar edentulosa sin especificar', 'A'),
('K07.0', 'D', 'Anomalías mayores del tamaño de la mandíbula', 'A'),
('K07.1', 'D', 'Anomalías de la relación mandíbula-base del craneo', 'A'),
('K07.2', 'D', 'Anomalías de la relación del arco dental', 'A'),
('K07.3', 'D', 'Anomalías de la posición de los dientes', 'A'),
('K07.4', 'D', 'Maloclusión sin especificar', 'A'),
('K07.5', 'D', ' Anormalidades funcionales dentofaciales', 'A'),
('K07.6', 'D', 'Trastornos de la unión temporomandibular', 'A'),
('K07.8', 'D', 'Otras anomalías dentofaciales', 'A'),
('K07.9', 'D', 'Anomalía dentofacial sin especificar', 'A'),
('K08.0', 'D', 'Exfoliación de los dientes debida a causas sistémicas', 'A'),
('K08.1', 'D', 'Pérdida de los dientes debido a un accidente, extracción o enfermedad periodontal local', 'A'),
('K08.2', 'D', 'Atrofia de la cresta alveolar edentulosa', 'A'),
('K08.3', 'D', 'Raíz dental retenida', 'A'),
('K08.8', 'D', 'Otros trastornos especificados de dientes y estructuras de soporte', 'A'),
('K08.9', 'D', 'Trastorno especificado de dientes y estructuras de soporte sin especificar', 'A'),
('K09.0', 'D', ' Quiste odontogánico de desarrollo', 'A'),
('K09.1', 'D', 'Quistes de desarrollo (no-odontogénicos) de la región oral', 'A'),
('K09.2', 'D', 'Otros quistes de la mandíbula', 'A'),
('K09.8', 'D', 'Otros quistes de la región oral, no clasificados en otra parte', 'A'),
('K09.9', 'D', 'Quiste de la región oral sin especificar', 'A'),
('K10.0', 'D', 'Trastornos de desarrollo de las mandíbulas', 'A'),
('K10.1', 'D', 'Granuloma celular gigante, central', 'A'),
('K10.2', 'D', 'Condiciones inflamatorias de las mandíbulas', 'A'),
('K10.3', 'D', 'Alveolitis de las mandíbulas', 'A'),
('K10.8', 'D', 'Otras enfermedades de las mandíbulas especificadas', 'A'),
('K10.9', 'D', 'Enfermedad de las mandíbulas, sin especificar', 'A'),
('K11.0', 'D', 'Atrofia de las glándulas salivales', 'A'),
('K11.1', 'D', 'Hipertrofia de las glándulas salivales', 'A'),
('K11.2', 'D', 'Sialadenitis', 'A'),
('K11.3', 'D', 'Abceso de las glándulas salivales', 'A'),
('K11.4', 'D', 'Fístula de las glándulas salivales', 'A'),
('K11.5', 'D', 'Sialolitiasis', 'A'),
('K11.6', 'D', 'Mucocele de las glándulas salivales', 'A'),
('K11.7', 'D', 'Trastornos de la secreción salival', 'A'),
('K11.8', 'D', 'Otras enfermedades de las glándulas salivales', 'A'),
('K11.9', 'D', 'Enfermedad de las glándulas salivales sin especificar', 'A'),
('K12.0', 'D', 'Afta oral recurrente', 'A'),
('K12.1', 'D', 'Otras formas de estomatitis', 'A'),
('K12.2', 'D', 'Celulitis y abceso bucal', 'A'),
('K13.0', 'D', 'Enfermedades de los labios', 'A'),
('K13.1', 'D', 'Picadure en la mejilla y los labios', 'A'),
('K13.2', 'D', 'Leucoplaquia y otros trastornos del epitelio oral, incluyendo la lengua', 'A'),
('K13.3', 'D', 'Leucoplaquia capilar', 'A'),
('K13.4', 'D', 'Granuloma y lesiones de tipo granulómico de la mucosa oral', 'A'),
('K13.5', 'D', 'Fibrosis oral submucosa', 'A'),
('K13.6', 'd', 'Hiperplasia irritativa de la mucosa oral', 'A'),
('K13.7', 'D', 'Otras lesiones y lesiones sin especificar de la mucosa oral', 'A'),
('K14.0', 'D', 'Glositis', 'A'),
('K14.1', 'D', 'Lengua geográfica', 'A'),
('K14.2', 'D', 'Glositis romboidea mediana', 'D'),
('K14.3', 'D', 'Hipertrofia de las papilas gustativas', 'A'),
('K14.4', 'D', 'Atrofia de las papilas gustativas', 'A'),
('K14.5', 'D', 'Lengua plicada', 'A'),
('K14.6', 'D', 'Glosodinia', 'A'),
('K14.8', 'D', 'Otras enfermedades de la lengua', 'A'),
('K14.9', 'D', 'Enfermedad de la lengua sin especificar', 'A'),
('K00.30', 'D', 'Diagnostico diente molar', 'A'),
('k00.19', 'E', 'Exodoncia', 'A'),
('M00.7', 'B', 'Brakers', 'A'),
('FF', 'F', 'POR ROTURA', 'A'),
('Z00.1', 'Z', 'Endodoncia maxilar superioes', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_diente`
--

CREATE TABLE `estado_diente` (
  `codi_edi` int(11) NOT NULL,
  `titu_edi` varchar(5) NOT NULL,
  `nomb_edi` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_diente`
--

INSERT INTO `estado_diente` (`codi_edi`, `titu_edi`, `nomb_edi`) VALUES
(1, '', 'Sano'),
(2, '', 'Curado'),
(5, '--', 'Faltante'),
(3, 'DO', 'Diente obturado'),
(4, 'C', 'Cariado'),
(7, 'X', 'Exodoncia'),
(8, 'CP', 'Caries penetrante'),
(9, 'R', 'Retenido'),
(10, 'PP', 'Pieza de puente'),
(11, 'CO', 'Corona'),
(12, 'PR', 'Protesis removible'),
(13, 'INC', 'Incrustación'),
(14, 'EP', 'Enfermedad periodontal'),
(15, 'FD', 'Fractura dentaria'),
(16, 'MPD', 'Mal posición dentaria'),
(17, 'PM', 'Perno muñon'),
(18, 'TC', 'Tratamiento de cto'),
(19, 'F', 'Fluorosis'),
(20, 'IMP', 'Implante dental'),
(21, 'MB', 'Mancha blanca'),
(22, 'SE', 'Sellador'),
(23, 'SP SR', 'Surco profundo o mineralizado'),
(24, 'HP', 'Hipoplasia de esmalte'),
(25, 'MS', 'Maxilar Superior'),
(6, 'X', 'Extraido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `codi_fac` int(11) NOT NULL,
  `fech_fac` datetime DEFAULT NULL,
  `sesi_fac` varchar(45) DEFAULT NULL,
  `tota_fac` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`codi_fac`, `fech_fac`, `sesi_fac`, `tota_fac`) VALUES
(1, '2018-02-10 14:59:21', '1', '200.00'),
(2, '2018-02-11 10:39:04', '1', '200.00'),
(3, '2018-03-10 09:44:57', '1', '400.00'),
(4, '2018-03-13 23:53:12', '1', '400.00'),
(5, '2018-03-19 22:08:08', '1', '400.00'),
(6, '2018-03-31 15:08:13', '1', '400.00'),
(7, '2018-04-04 00:21:43', '1', '600.00'),
(8, '2018-04-04 01:56:39', '1', '400.00'),
(9, '2018-04-04 01:58:26', '1', '200.00'),
(10, '2018-04-04 02:08:27', '1', '400.00'),
(11, '2018-04-04 02:14:40', '1', '200.00'),
(12, '2018-04-04 02:18:44', '1', '400.00'),
(13, '2018-04-04 02:20:52', '1', '400.00'),
(14, '2018-04-04 02:24:41', '1', '200.00'),
(15, '2018-04-04 02:27:47', '1', '400.00'),
(16, '2018-04-04 14:41:54', '1', '400.00'),
(17, '2018-04-05 04:52:23', '1', '400.00'),
(18, '2018-04-05 05:03:01', '1', '600.00'),
(19, '2018-04-05 05:07:14', '1', '600.00'),
(20, '2018-04-05 05:13:30', '1', '200.00'),
(21, '2018-04-05 05:17:17', '1', '400.00'),
(22, '2018-04-05 05:21:29', '1', '400.00'),
(23, '2018-04-05 05:26:54', '1', '200.00'),
(24, '2018-04-08 19:48:18', '1', '400.00'),
(25, '2018-04-08 21:12:48', '1', '600.00'),
(26, '2018-04-10 22:30:50', '1', '600.00'),
(27, '2018-04-10 22:32:56', '1', '600.00'),
(28, '2018-04-10 22:50:34', '1', '200.00'),
(29, '2018-04-10 22:53:34', '1', '200.00'),
(30, '2018-04-11 23:38:38', '1', '200.00'),
(31, '2018-04-15 12:09:51', '1', '200.00'),
(32, '2018-04-15 22:56:04', '1', '200.00'),
(33, '2018-04-17 00:35:43', '1', '200.00'),
(34, '2018-04-18 12:24:39', '1', '1000.00'),
(35, '2018-04-19 15:42:44', '1', '600.00'),
(36, '2018-04-19 23:30:50', '1', '740.00'),
(37, '2018-04-20 15:29:47', '1', '1400.00'),
(38, '2018-04-22 13:20:18', '1', '400.00'),
(39, '2018-04-22 13:21:23', '1', '200.00'),
(40, '2018-04-22 13:22:54', '1', '200.00'),
(41, '2018-04-22 13:43:37', '1', '200.00'),
(42, '2018-04-22 13:50:00', '1', '200.00'),
(43, '2018-04-22 13:58:07', '1', '200.00'),
(44, '2018-04-22 14:00:16', '1', '200.00'),
(45, '2018-04-22 14:01:46', '1', '200.00'),
(46, '2018-04-22 14:03:30', '1', '200.00'),
(47, '2018-04-22 20:06:04', '1', '200.00'),
(48, '2018-04-22 20:06:52', '1', '200.00'),
(49, '2018-04-22 20:33:45', '1', '600.00'),
(50, '2018-04-22 20:58:30', '1', '200.00'),
(51, '2018-04-23 22:42:08', '1', '792.00'),
(52, '2018-04-25 00:03:49', '1', '200.00'),
(53, '2018-04-25 00:06:45', '1', '400.00'),
(54, '2018-05-03 22:20:26', '1', '650.00'),
(55, '2018-05-07 23:04:03', '1', '800.00'),
(56, '2018-06-18 22:43:47', '1', '1979.76'),
(57, '2018-09-01 01:49:32', '1', '0.00'),
(58, '2018-09-19 23:25:21', '1', '450.00'),
(59, '2018-09-29 13:41:03', '1', '1100.00'),
(60, '2018-10-06 14:03:58', '1', '680.00'),
(61, '2018-10-06 14:05:11', '1', '450.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_enf`
--

CREATE TABLE `historial_enf` (
  `codi_hie` int(11) NOT NULL,
  `codi_cit` int(11) NOT NULL,
  `codi_enf` varchar(6) CHARACTER SET utf8 NOT NULL,
  `num_die` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `historial_enf`
--

INSERT INTO `historial_enf` (`codi_hie`, `codi_cit`, `codi_enf`, `num_die`) VALUES
(1, 4, 'K00.0', 65),
(2, 5, 'K00.4', 52),
(3, 10, 'K00.0', 11),
(4, 10, 'K00.0', 61),
(5, 16, 'K00.1', 21),
(6, 16, 'K00.6', 51),
(7, 21, 'K00.1', 21),
(8, 21, 'K00.7', 51),
(9, 21, 'K00.7', 43),
(10, 22, 'K02.1', 11),
(11, 22, 'K02.1', 31),
(12, 24, 'K00.5', 21),
(13, 24, 'K13.2', 31),
(14, 24, 'K13.2', 47),
(15, 25, 'K00.5', 21),
(16, 25, 'K08.1', 31),
(17, 26, 'K00.5', 21),
(18, 27, 'K00.5', 21),
(19, 27, 'K00.5', 42),
(20, 28, 'K00.5', 21),
(21, 29, 'K00.5', 11),
(22, 29, 'K00.5', 31),
(23, 30, 'K00.0', 21),
(24, 30, 'K00.0', 31),
(25, 31, 'K02.1', 22),
(26, 32, 'K00.5', 21),
(27, 32, 'K08.1', 31),
(28, 33, 'K00.5', 22),
(29, 33, 'K00.5', 61),
(30, 34, 'K00.7', 21),
(31, 34, 'K00.7', 31),
(32, 35, 'K00.5', 11),
(33, 35, 'K00.5', 81),
(34, 35, 'K08.1', 31),
(35, 36, 'K00.5', 21),
(36, 36, 'K00.9', 21),
(37, 36, 'K08.1', 31),
(38, 36, 'K08.8', 46),
(39, 37, 'K00.5', 21),
(40, 37, 'K08.1', 21),
(41, 37, 'K06.2', 21),
(42, 38, 'K00.2', 21),
(43, 38, 'K00.5', 41),
(44, 39, 'K00.5', 21),
(45, 39, 'K08.1', 21),
(46, 39, 'K08.1', 71),
(47, 39, 'K07.0', 45),
(48, 40, 'K00.0', 72),
(49, 40, 'K00.5', 72),
(50, 40, 'K08.1', 72),
(51, 41, 'K02.1', 21),
(52, 41, 'K02.1', 64),
(53, 42, 'K00.5', 11),
(54, 42, 'K00.5', 52),
(55, 42, 'K02.0', 41),
(56, 47, 'K00.5', 12),
(57, 47, 'K00.5', 32),
(58, 47, 'K00.5', 46),
(59, 46, 'K00.2', 21),
(60, 46, 'K00.2', 62),
(61, 46, 'K02.3', 82),
(62, 45, 'K02.1', 21),
(63, 48, 'K00.6', 22),
(64, 49, 'K00.5', 22),
(65, 49, 'K01.0', 51),
(66, 50, 'K00.7', 71),
(67, 51, 'K02.1', 11),
(68, 51, 'K00.8', 11),
(69, 52, 'K00.4', 23),
(70, 54, 'K00.0', 21),
(71, 54, 'K00.5', 21),
(72, 54, 'K02.0', 21),
(73, 54, 'K01.0', 15),
(74, 54, 'K03.0', 26),
(75, 55, 'K00.5', 13),
(76, 55, 'K00.5', 62),
(77, 55, 'K00.5', 46),
(78, 56, 'K00.4', 11),
(79, 56, 'K00.6', 11),
(80, 56, 'K00.6', 62),
(81, 56, 'K00.6', 74),
(82, 57, 'K00.4', 55),
(83, 57, 'K00.4', 54),
(84, 57, 'K00.4', 53),
(85, 57, 'K00.4', 71),
(86, 57, 'K00.4', 81),
(87, 57, 'K00.4', 72),
(88, 57, 'K00.4', 75),
(89, 57, 'K00.4', 74),
(90, 59, 'K00.4', 13),
(91, 59, 'K02.1', 13),
(92, 59, 'K01.0', 13),
(93, 59, 'K01.0', 28),
(94, 59, 'K02.0', 28),
(95, 59, 'K02.8', 28),
(96, 60, 'K00.4', 12),
(97, 61, 'K00.4', 22),
(98, 62, 'K02.1', 21),
(99, 62, 'K02.1', 61),
(100, 62, 'K00.9', 61),
(101, 63, 'K00.4', 13),
(102, 64, 'K00.4', 22),
(103, 65, 'K00.4', 61),
(104, 66, 'K00.4', 31),
(105, 67, 'K00.4', 41),
(106, 68, 'K00.7', 31),
(107, 68, 'K01.0', 31),
(108, 68, 'K00.7', 31),
(109, 68, 'K01.0', 31),
(110, 68, 'K00.7', 31),
(111, 68, 'K01.0', 31),
(112, 69, 'K00.4', 21),
(113, 70, 'K00.7', 21),
(114, 70, 'K02.3', 21),
(115, 70, 'K00.5', 51),
(116, 71, 'K00.4', 21),
(117, 71, 'K00.8', 21),
(118, 74, 'K00.2', 12),
(119, 74, 'K00.9', 12),
(120, 74, 'K02.4', 26),
(121, 74, 'K02.2', 71),
(122, 75, 'K00.4', 11),
(123, 75, 'K00.6', 11),
(124, 75, 'K00.6', 61),
(125, 75, 'K02.0', 61),
(126, 76, 'K00.4', 11),
(127, 76, 'K00.7', 11),
(128, 76, 'K02.0', 61),
(129, 76, 'K00.1', 61),
(130, 77, 'K00.4', 24),
(131, 78, 'K00.4', 23),
(132, 78, 'K00.4', 13),
(133, 78, 'K00.4', 15),
(134, 78, 'K00.4', 21),
(135, 81, 'K00.1', 22),
(136, 81, 'K00.1', 63),
(137, 81, 'K00.1', 53),
(138, 86, 'K00.8', 23),
(139, 86, 'K02.2', 23),
(140, 86, 'K03.0', 25),
(141, 87, 'K00.0', 61),
(142, 87, 'K00.9', 64),
(143, 87, 'K00.9', 13),
(144, 89, 'K00.8', 22),
(145, 89, 'K00.8', 51),
(146, 90, 'K00.0', 23),
(147, 90, 'K00.0', 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_paciente`
--

CREATE TABLE `historial_paciente` (
  `codi_his` int(11) NOT NULL,
  `codi_pac` int(11) NOT NULL,
  `codi_cit` int(11) NOT NULL,
  `codi_die` int(11) NOT NULL,
  `id_die` int(11) NOT NULL,
  `num_die` int(11) NOT NULL,
  `codi_edi` int(11) NOT NULL,
  `part_die` char(5) NOT NULL DEFAULT '00000',
  `fech_his` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial_paciente`
--

INSERT INTO `historial_paciente` (`codi_his`, `codi_pac`, `codi_cit`, `codi_die`, `id_die`, `num_die`, `codi_edi`, `part_die`, `fech_his`) VALUES
(1, 4, 4, 1, 1, 65, 2, 'MDVPO', '2018-02-10'),
(2, 4, 5, 2, 1, 52, 6, 'MDVPO', '2018-02-11'),
(3, 4, 5, 3, 1, 72, 3, '000P0', '2018-02-11'),
(4, 4, 5, 4, 1, 83, 5, 'MDVPO', '2018-02-11'),
(5, 4, 5, 5, 1, 85, 5, '00V00', '2018-02-11'),
(6, 1, 10, 6, 1, 11, 2, 'MDVPO', '2018-03-10'),
(7, 1, 10, 7, 1, 61, 2, 'MDVPO', '2018-03-10'),
(8, 1, 16, 8, 1, 21, 4, 'MDVPO', '2018-03-13'),
(9, 1, 16, 9, 1, 51, 3, 'MDVPO', '2018-03-13'),
(10, 1, 21, 8, 1, 21, 3, 'MDVPO', '2018-03-19'),
(11, 1, 21, 9, 1, 51, 2, 'MDVPO', '2018-03-19'),
(12, 1, 21, 10, 1, 43, 2, 'MDVPO', '2018-03-19'),
(13, 2, 22, 11, 1, 11, 4, 'MDVPO', '2018-03-31'),
(14, 2, 22, 12, 1, 31, 2, 'MDVPO', '2018-03-31'),
(15, 2, 24, 13, 1, 21, 2, 'MDVPO', '2018-04-04'),
(16, 2, 24, 12, 1, 31, 4, 'MDVPO', '2018-04-04'),
(17, 2, 24, 14, 1, 47, 8, 'MDVPO', '2018-04-04'),
(18, 1, 25, 8, 1, 21, 2, 'MDVPO', '2018-04-04'),
(19, 1, 25, 15, 1, 31, 14, 'MDVPO', '2018-04-04'),
(20, 1, 26, 8, 1, 21, 8, 'MDVPO', '2018-04-04'),
(21, 1, 26, 7, 1, 61, 2, 'MDVPO', '2018-04-04'),
(22, 1, 27, 8, 1, 21, 3, 'MDVPO', '2018-04-04'),
(23, 1, 27, 16, 1, 42, 8, 'MDVPO', '2018-04-04'),
(24, 1, 28, 8, 1, 21, 13, 'MDVPO', '2018-04-04'),
(25, 1, 29, 6, 1, 11, 2, 'MDVPO', '2018-04-04'),
(26, 1, 29, 15, 1, 31, 7, 'MDVPO', '2018-04-04'),
(27, 1, 30, 8, 1, 21, 1, 'MDVPO', '2018-04-04'),
(28, 1, 30, 15, 1, 31, 3, 'MDVPO', '2018-04-04'),
(29, 1, 31, 17, 1, 22, 8, 'MDVPO', '2018-04-04'),
(30, 1, 31, 18, 1, 32, 23, 'MDVPO', '2018-04-04'),
(31, 1, 32, 8, 1, 21, 4, 'MDVPO', '2018-04-04'),
(32, 1, 32, 15, 1, 31, 23, 'MDVPO', '2018-04-04'),
(33, 1, 33, 17, 1, 22, 2, 'MDVPO', '2018-04-04'),
(34, 1, 33, 7, 1, 61, 4, 'MDVPO', '2018-04-04'),
(35, 1, 34, 8, 1, 21, 1, 'MDVPO', '2018-04-05'),
(36, 1, 34, 15, 1, 31, 13, 'MDVPO', '2018-04-05'),
(37, 1, 35, 6, 1, 11, 14, 'MDVPO', '2018-04-05'),
(38, 1, 35, 19, 1, 81, 4, 'MDVPO', '2018-04-05'),
(39, 1, 35, 15, 1, 31, 1, 'MDVPO', '2018-04-05'),
(40, 1, 36, 8, 1, 21, 3, 'MDVPO', '2018-04-05'),
(41, 1, 36, 15, 1, 31, 3, 'MDVPO', '2018-04-05'),
(42, 1, 36, 20, 1, 46, 1, 'MDVPO', '2018-04-05'),
(43, 1, 37, 8, 1, 21, 3, 'MDVPO', '2018-04-05'),
(44, 1, 37, 21, 1, 41, 3, 'MDVPO', '2018-04-05'),
(45, 1, 37, 9, 1, 51, 3, 'MDVPO', '2018-04-05'),
(46, 1, 38, 8, 1, 21, 23, 'MDVPO', '2018-04-05'),
(47, 1, 38, 21, 1, 41, 14, 'MDVPO', '2018-04-05'),
(48, 1, 39, 8, 1, 21, 3, 'MDVPO', '2018-04-05'),
(49, 1, 39, 22, 1, 71, 23, 'MDVPO', '2018-04-05'),
(50, 1, 39, 23, 1, 45, 16, 'MDVPO', '2018-04-05'),
(51, 2, 40, 24, 1, 72, 3, 'MDVPO', '2018-04-05'),
(52, 2, 40, 13, 1, 21, 3, 'MDVPO', '2018-04-05'),
(53, 2, 40, 25, 1, 42, 4, 'MDVPO', '2018-04-05'),
(54, 1, 41, 8, 1, 21, 14, 'MDVPO', '2018-04-08'),
(55, 1, 41, 26, 1, 64, 3, 'MDVPO', '2018-04-08'),
(56, 1, 42, 6, 1, 11, 3, 'MDVPO', '2018-04-08'),
(57, 1, 42, 27, 1, 52, 6, 'MDVPO', '2018-04-08'),
(58, 1, 42, 21, 1, 41, 3, 'MDVPO', '2018-04-08'),
(59, 1, 47, 28, 1, 12, 2, 'MDVPO', '2018-04-10'),
(60, 1, 47, 18, 1, 32, 2, 'MDVPO', '2018-04-10'),
(61, 1, 47, 20, 1, 46, 1, 'MDVPO', '2018-04-10'),
(62, 1, 46, 8, 1, 21, 6, 'MDVPO', '2018-04-10'),
(63, 1, 46, 29, 1, 62, 1, 'MDVPO', '2018-04-10'),
(64, 1, 46, 30, 1, 82, 4, 'MDVPO', '2018-04-10'),
(65, 1, 45, 8, 1, 21, 2, 'MDVPO', '2018-04-10'),
(66, 1, 48, 17, 1, 22, 2, 'MDVPO', '2018-04-10'),
(67, 1, 49, 17, 1, 22, 3, 'MDVPO', '2018-04-11'),
(68, 1, 49, 9, 1, 51, 2, 'MDVPO', '2018-04-11'),
(69, 1, 50, 8, 1, 21, 2, 'MDVPO', '2018-04-15'),
(70, 1, 50, 22, 1, 71, 2, 'MDVPO', '2018-04-15'),
(71, 1, 51, 6, 1, 11, 4, 'MDVPO', '2018-04-15'),
(72, 1, 51, 31, 1, 53, 2, 'MDVPO', '2018-04-15'),
(73, 1, 52, 6, 1, 11, 4, 'MDVPO', '2018-04-17'),
(74, 1, 52, 6, 1, 11, 4, 'MDVPO', '2018-04-17'),
(75, 1, 52, 6, 1, 11, 4, 'MDVPO', '2018-04-17'),
(76, 1, 52, 31, 1, 53, 2, 'MDVPO', '2018-04-17'),
(77, 1, 52, 31, 1, 53, 2, 'MDVPO', '2018-04-17'),
(78, 1, 52, 31, 1, 53, 2, 'MDVPO', '2018-04-17'),
(79, 1, 52, 32, 1, 23, 5, 'MDVPO', '2018-04-17'),
(80, 1, 54, 8, 1, 21, 6, 'MDVPO', '2018-04-18'),
(81, 1, 54, 33, 1, 15, 4, 'MDVPO', '2018-04-18'),
(82, 1, 54, 34, 1, 26, 3, 'MDVPO', '2018-04-18'),
(83, 7, 55, 35, 1, 13, 5, 'MDVPO', '2018-04-19'),
(84, 7, 55, 36, 1, 62, 2, 'MDVPO', '2018-04-19'),
(85, 7, 55, 37, 1, 46, 1, 'MDVPO', '2018-04-19'),
(86, 3, 56, 38, 1, 11, 6, 'MDVPO', '2018-04-19'),
(87, 3, 56, 39, 1, 62, 5, 'MDVPO', '2018-04-19'),
(88, 3, 56, 40, 1, 32, 5, '000L0', '2018-04-19'),
(89, 3, 56, 41, 1, 74, 5, '0000O', '2018-04-19'),
(90, 3, 56, 42, 1, 82, 8, 'M0000', '2018-04-19'),
(91, 7, 57, 43, 1, 55, 3, 'MDVPO', '2018-04-20'),
(92, 7, 57, 44, 1, 54, 7, 'MDVPO', '2018-04-20'),
(93, 7, 57, 45, 1, 53, 7, 'MDVPO', '2018-04-20'),
(94, 7, 57, 46, 1, 71, 7, 'MDVPO', '2018-04-20'),
(95, 7, 57, 47, 1, 81, 7, 'MDVPO', '2018-04-20'),
(96, 7, 57, 48, 1, 72, 7, 'MDVPO', '2018-04-20'),
(97, 7, 57, 49, 1, 75, 7, 'MDVPO', '2018-04-20'),
(98, 7, 57, 50, 1, 74, 7, 'MDVPO', '2018-04-20'),
(99, 1, 59, 51, 1, 13, 8, 'MDVPO', '2018-04-22'),
(100, 1, 59, 52, 1, 28, 7, 'MDVPO', '2018-04-22'),
(101, 1, 60, 28, 1, 12, 11, 'MDVPO', '2018-04-22'),
(102, 1, 61, 17, 1, 22, 9, 'MDVPO', '2018-04-22'),
(103, 1, 62, 8, 1, 21, 5, 'MDVPO', '2018-04-22'),
(104, 1, 62, 7, 1, 61, 3, 'MDVPO', '2018-04-22'),
(105, 2, 63, 53, 1, 13, 1, 'MDVPO', '2018-04-22'),
(106, 1, 64, 17, 1, 22, 3, 'MDVPO', '2018-04-22'),
(107, 1, 65, 7, 1, 61, 4, 'MDVPO', '2018-04-22'),
(108, 1, 66, 15, 1, 31, 2, 'MDVPO', '2018-04-22'),
(109, 2, 67, 54, 1, 41, 3, 'MDVPO', '2018-04-22'),
(110, 1, 68, 15, 1, 31, 2, 'MDVPO', '2018-04-22'),
(111, 1, 68, 15, 1, 31, 2, 'MDVPO', '2018-04-22'),
(112, 1, 68, 15, 1, 31, 2, 'MDVPO', '2018-04-22'),
(113, 1, 68, 6, 1, 11, 7, 'MDVPO', '2018-04-22'),
(114, 1, 69, 8, 1, 21, 6, 'MDVPO', '2018-04-22'),
(115, 1, 70, 8, 1, 21, 6, 'MDVPO', '2018-04-22'),
(116, 1, 70, 9, 1, 51, 2, 'MDVPO', '2018-04-22'),
(117, 1, 71, 8, 1, 21, 5, 'MDVPO', '2018-04-22'),
(118, 1, 71, 55, 1, 83, 3, 'MDVPO', '2018-04-22'),
(119, 8, 74, 56, 1, 12, 3, 'MDVPO', '2018-04-23'),
(120, 8, 74, 57, 1, 26, 5, 'MDVPO', '2018-04-23'),
(121, 8, 74, 58, 1, 71, 2, 'MDVPO', '2018-04-23'),
(122, 1, 75, 6, 1, 11, 7, 'MDVPO', '2018-04-25'),
(123, 1, 75, 7, 1, 61, 2, 'MDVPO', '2018-04-25'),
(124, 1, 76, 6, 1, 11, 6, 'MDVPO', '2018-04-25'),
(125, 1, 76, 7, 1, 61, 4, 'MDVPO', '2018-04-25'),
(126, 1, 77, 59, 1, 24, 2, 'MDVPO', '2018-05-03'),
(127, 6, 78, 60, 1, 22, 8, '0D000', '2018-05-07'),
(128, 6, 78, 61, 1, 23, 4, 'M0000', '2018-05-07'),
(129, 6, 78, 62, 1, 13, 4, 'M0000', '2018-05-07'),
(130, 6, 78, 63, 1, 14, 3, '0D000', '2018-05-07'),
(131, 6, 78, 64, 1, 15, 5, '0D000', '2018-05-07'),
(132, 6, 78, 65, 1, 25, 6, '0D000', '2018-05-07'),
(133, 6, 78, 66, 1, 21, 6, '0D000', '2018-05-07'),
(134, 6, 81, 60, 1, 22, 1, 'MDVPO', '2018-06-18'),
(135, 6, 81, 67, 1, 63, 3, 'MDVPO', '2018-06-18'),
(136, 6, 81, 68, 1, 53, 6, 'MDVPO', '2018-06-18'),
(137, 1, 86, 32, 1, 23, 1, '0D00I', '2018-09-19'),
(138, 1, 86, 69, 1, 25, 6, 'M00PO', '2018-09-19'),
(139, 8, 87, 70, 1, 61, 2, 'MDVPO', '2018-09-29'),
(140, 8, 87, 71, 1, 64, 4, '0D0P0', '2018-09-29'),
(141, 8, 87, 72, 1, 13, 1, 'MDVPO', '2018-09-29'),
(142, 8, 87, 73, 1, 22, 4, 'MDVPO', '2018-09-29'),
(143, 1, 89, 17, 1, 22, 1, '0D00I', '2018-10-06'),
(144, 1, 89, 9, 1, 51, 8, 'MDVPO', '2018-10-06'),
(145, 1, 89, 26, 1, 64, 4, 'MDVPO', '2018-10-06'),
(146, 1, 89, 69, 1, 25, 2, 'MDVPO', '2018-10-06'),
(147, 1, 89, 6, 1, 11, 7, 'MDVPO', '2018-10-06'),
(148, 1, 90, 32, 1, 23, 3, 'MDVPO', '2018-10-06'),
(149, 1, 90, 9, 1, 51, 2, 'MDVPO', '2018-10-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_proc`
--

CREATE TABLE `historial_proc` (
  `codi_hip` int(11) NOT NULL,
  `codi_cit` int(11) NOT NULL,
  `codi_dpr` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial_proc`
--

INSERT INTO `historial_proc` (`codi_hip`, `codi_cit`, `codi_dpr`) VALUES
(1, 4, 1),
(2, 5, 2),
(3, 10, 3),
(4, 10, 4),
(5, 16, 5),
(6, 16, 6),
(7, 21, 7),
(8, 21, 8),
(9, 22, 9),
(10, 22, 10),
(11, 24, 11),
(12, 24, 12),
(13, 24, 13),
(14, 25, 14),
(15, 25, 15),
(16, 26, 16),
(17, 27, 17),
(18, 27, 18),
(19, 28, 19),
(20, 29, 20),
(21, 29, 21),
(22, 30, 22),
(23, 30, 23),
(24, 31, 24),
(25, 32, 25),
(26, 32, 26),
(27, 33, 27),
(28, 33, 28),
(29, 34, 29),
(30, 34, 30),
(31, 35, 31),
(32, 35, 32),
(33, 35, 33),
(34, 36, 34),
(35, 36, 35),
(36, 36, 36),
(37, 37, 37),
(38, 38, 38),
(39, 38, 39),
(40, 39, 40),
(41, 39, 41),
(42, 40, 42),
(43, 41, 43),
(44, 41, 44),
(45, 42, 45),
(46, 42, 46),
(47, 42, 47),
(48, 47, 48),
(49, 47, 49),
(50, 47, 50),
(51, 46, 51),
(52, 46, 52),
(53, 46, 53),
(54, 45, 54),
(55, 48, 55),
(56, 49, 56),
(57, 50, 57),
(58, 51, 58),
(59, 52, 59),
(60, 54, 60),
(61, 54, 61),
(62, 54, 62),
(63, 54, 63),
(64, 54, 64),
(65, 55, 65),
(66, 55, 66),
(67, 55, 67),
(68, 56, 68),
(69, 56, 69),
(70, 56, 70),
(71, 56, 71),
(72, 57, 72),
(73, 57, 73),
(74, 57, 74),
(75, 57, 75),
(76, 57, 76),
(77, 57, 77),
(78, 57, 78),
(79, 68, 79),
(80, 68, 80),
(81, 68, 81),
(82, 69, 82),
(83, 70, 83),
(84, 70, 84),
(85, 70, 85),
(86, 71, 86),
(87, 74, 87),
(88, 74, 88),
(89, 74, 89),
(90, 74, 90),
(91, 75, 91),
(92, 76, 92),
(93, 76, 93),
(94, 77, 94),
(95, 77, 95),
(96, 78, 96),
(97, 78, 97),
(98, 78, 98),
(99, 78, 99),
(100, 81, 100),
(101, 81, 101),
(102, 81, 102),
(103, 86, 103),
(104, 87, 104),
(105, 87, 105),
(106, 87, 106),
(107, 89, 107),
(108, 89, 108),
(109, 90, 109);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `cod_inventario` int(11) NOT NULL,
  `codigo_barra` varchar(50) DEFAULT NULL,
  `nombre_almacen` varchar(80) NOT NULL,
  `nombre_producto` varchar(60) DEFAULT NULL,
  `cod_tipo_inventario` int(11) NOT NULL,
  `precio_entrada` decimal(10,2) DEFAULT NULL,
  `precio_salida` decimal(10,2) DEFAULT NULL,
  `unidad` varchar(100) DEFAULT NULL,
  `stock_inventario` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`cod_inventario`, `codigo_barra`, `nombre_almacen`, `nombre_producto`, `cod_tipo_inventario`, `precio_entrada`, `precio_salida`, `unidad`, `stock_inventario`, `fecha_registro`, `estado`) VALUES
(1, '12345', 'Almacen central', 'Jeringa', 21, '12.00', '14.00', '15 x 20 ', 4, '2018-04-13 10:28:03', 1),
(2, NULL, 'Almacen de procedimientos', 'Alcohol', 3, '12.00', '14.00', 'por frasco', 0, '2018-01-13 05:02:46', 0),
(3, NULL, 'Almacen de centros', 'jeringas', 3, '15.00', '14.00', 'ninguno', 0, '2018-01-13 06:05:07', 0),
(4, NULL, 'Almacen de procedimientos', 'Diente molar', 1, '12.00', '12.00', 'por 100', 3, '2018-01-19 13:12:08', 0),
(5, NULL, 'Farmacia', 'Hizijot', 2, '23.00', '45.00', 'Frasco', 4, '2018-01-19 22:10:17', 0),
(6, NULL, 'Por consumo', 'diente molar', 1, '0.00', '12.00', '2', 4, '2018-03-09 13:42:00', 0),
(7, NULL, 'Almacen para dental', 'Molares ', 21, '12.00', '16.00', 'Kilos', 3, '2018-04-13 03:29:06', 0),
(8, NULL, 'Almacen de pasta', 'Pasta para dientes', 45, '12.00', '16.00', '12 x4', 6, '2018-04-24 10:55:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `codi_med` int(11) NOT NULL,
  `nomb_med` varchar(20) DEFAULT NULL,
  `apel_med` varchar(20) DEFAULT NULL,
  `dni_med` varchar(10) DEFAULT NULL,
  `ruc_med` varchar(11) NOT NULL,
  `coleg_med` varchar(50) NOT NULL,
  `telf_med` varchar(10) DEFAULT NULL,
  `dire_med` varchar(100) DEFAULT NULL,
  `emai_med` varchar(100) DEFAULT NULL,
  `fena_med` date DEFAULT NULL,
  `sexo_med` char(1) DEFAULT NULL,
  `esta_med` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`codi_med`, `nomb_med`, `apel_med`, `dni_med`, `ruc_med`, `coleg_med`, `telf_med`, `dire_med`, `emai_med`, `fena_med`, `sexo_med`, `esta_med`) VALUES
(1, 'DIEGO ALFONSO', 'LOAYZA LOPEZ', '42458455', '10424584555', '40508', '949105955', 'URB. LOS JARDINES C11', 'clinicavitaldent@hotmail.com', '1984-06-20', 'M', 'A'),
(2, 'Silvana', 'Diaz Salinas', '44660415', '20230608688', '232456', '992398412', 'SAN BARTOLOME 3RA ETAPA', 'silvana123@gmail.com', '1979-01-01', 'F', 'A'),
(3, 'Jose ', 'Diaz Valladares', '66666666', '3333333', '12345', '992398412', 'san jacinto', 'cdiaz_1987@outlook.com', '1979-07-12', 'M', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontograma`
--

CREATE TABLE `odontograma` (
  `codi_odo` int(11) NOT NULL,
  `part_die` char(6) NOT NULL DEFAULT '000000',
  `codi_die` int(11) DEFAULT NULL,
  `codi_enf` varchar(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `odontograma`
--

INSERT INTO `odontograma` (`codi_odo`, `part_die`, `codi_die`, `codi_enf`) VALUES
(1, '000000', 1, NULL),
(2, '000000', 2, NULL),
(3, '000000', 3, NULL),
(4, '000000', 4, NULL),
(5, '000000', 5, NULL),
(6, '000000', 6, NULL),
(7, '000000', 7, NULL),
(8, '000000', 8, NULL),
(9, '000000', 9, NULL),
(10, '000000', 10, NULL),
(11, '000000', 11, NULL),
(12, '000000', 12, NULL),
(13, '000000', 13, NULL),
(14, '000000', 14, NULL),
(15, '000000', 15, NULL),
(16, '000000', 16, NULL),
(17, '000000', 17, NULL),
(18, '000000', 18, NULL),
(19, '000000', 19, NULL),
(20, '000000', 20, NULL),
(21, '000000', 21, NULL),
(22, '000000', 22, NULL),
(23, '000000', 23, NULL),
(24, '000000', 24, NULL),
(25, '000000', 25, NULL),
(26, '000000', 26, NULL),
(27, '000000', 27, NULL),
(28, '000000', 28, NULL),
(29, '000000', 29, NULL),
(30, '000000', 30, NULL),
(31, '000000', 31, NULL),
(32, '000000', 32, NULL),
(33, '000000', 33, NULL),
(34, '000000', 34, NULL),
(35, '000000', 35, NULL),
(36, '000000', 36, NULL),
(37, '000000', 37, NULL),
(38, '000000', 1, NULL),
(39, '000000', 2, NULL),
(40, '000000', 3, NULL),
(41, '000000', 4, NULL),
(42, '000000', 5, NULL),
(43, '000000', 6, NULL),
(44, '000000', 7, NULL),
(45, '000000', 8, NULL),
(46, '000000', 9, NULL),
(47, '000000', 10, NULL),
(48, '000000', 11, NULL),
(49, '000000', 12, NULL),
(50, '000000', 13, NULL),
(51, '000000', 14, NULL),
(52, '000000', 15, NULL),
(53, '000000', 16, NULL),
(54, '000000', 17, NULL),
(55, '000000', 18, NULL),
(56, '000000', 19, NULL),
(57, '000000', 20, NULL),
(58, '000000', 21, NULL),
(59, '000000', 22, NULL),
(60, '000000', 23, NULL),
(61, '000000', 24, NULL),
(62, '000000', 25, NULL),
(63, '000000', 26, NULL),
(64, '000000', 27, NULL),
(65, '000000', 28, NULL),
(66, '000000', 29, NULL),
(67, '000000', 30, NULL),
(68, '000000', 31, NULL),
(69, '000000', 32, NULL),
(70, '000000', 33, NULL),
(71, '000000', 34, NULL),
(72, '000000', 35, NULL),
(73, '000000', 1, NULL),
(74, '000000', 2, NULL),
(75, '000000', 3, NULL),
(76, '000000', 1, NULL),
(77, '000000', 2, NULL),
(78, '000000', 3, NULL),
(79, '000000', 4, NULL),
(80, '000000', 5, NULL),
(81, '000000', 6, NULL),
(82, '000000', 7, NULL),
(83, '000000', 8, NULL),
(84, '000000', 9, NULL),
(85, '000000', 10, NULL),
(86, '000000', 11, NULL),
(87, '000000', 12, NULL),
(88, '000000', 13, NULL),
(89, '000000', 14, NULL),
(90, '000000', 15, NULL),
(91, '000000', 16, NULL),
(92, '000000', 17, NULL),
(93, '000000', 18, NULL),
(94, '000000', 19, NULL),
(95, '000000', 20, NULL),
(96, '000000', 21, NULL),
(97, '000000', 22, NULL),
(98, '000000', 23, NULL),
(99, '000000', 24, NULL),
(100, '000000', 25, NULL),
(101, '000000', 26, NULL),
(102, '000000', 27, NULL),
(103, '000000', 28, NULL),
(104, '000000', 29, NULL),
(105, '000000', 30, NULL),
(106, '000000', 31, NULL),
(107, '000000', 32, NULL),
(108, '000000', 33, NULL),
(109, '000000', 34, NULL),
(110, '000000', 35, NULL),
(111, '000000', 36, NULL),
(112, '000000', 37, NULL),
(113, '000000', 38, NULL),
(114, '000000', 39, NULL),
(115, '000000', 40, NULL),
(116, '000000', 41, NULL),
(117, '000000', 42, NULL),
(118, '000000', 43, NULL),
(119, '000000', 44, NULL),
(120, '000000', 45, NULL),
(121, '000000', 46, NULL),
(122, '000000', 47, NULL),
(123, '000000', 48, NULL),
(124, '000000', 49, NULL),
(125, '000000', 50, NULL),
(126, '000000', 51, NULL),
(127, '000000', 52, NULL),
(128, '000000', 53, NULL),
(129, '000000', 54, NULL),
(130, '000000', 55, NULL),
(131, '000000', 56, NULL),
(132, '000000', 57, NULL),
(133, '000000', 58, NULL),
(134, '000000', 59, NULL),
(135, '000000', 60, NULL),
(136, '000000', 61, NULL),
(137, '000000', 62, NULL),
(138, '000000', 63, NULL),
(139, '000000', 64, NULL),
(140, '000000', 65, NULL),
(141, '000000', 66, NULL),
(142, '000000', 67, NULL),
(143, '000000', 68, NULL),
(144, '000000', 69, NULL),
(145, '000000', 70, NULL),
(146, '000000', 71, NULL),
(147, '000000', 72, NULL),
(148, '000000', 73, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `codi_pac` int(11) NOT NULL,
  `nomb_pac` varchar(20) NOT NULL,
  `apel_pac` varchar(20) NOT NULL,
  `edad_pac` varchar(3) NOT NULL,
  `ocupacion` varchar(40) NOT NULL,
  `lugar_nacimiento` varchar(30) NOT NULL,
  `informacion_clinica` varchar(70) DEFAULT NULL,
  `dire_pac` varchar(100) DEFAULT NULL,
  `telf_pac` varchar(20) DEFAULT NULL,
  `dni_pac` varchar(10) NOT NULL,
  `fena_pac` date NOT NULL,
  `sexo_pac` char(1) NOT NULL,
  `civi_pac` char(1) NOT NULL,
  `esta_pac` char(1) DEFAULT NULL,
  `afil_pac` varchar(30) DEFAULT NULL,
  `aler_pac` varchar(120) DEFAULT NULL,
  `emai_pac` varchar(50) DEFAULT NULL,
  `titu_pac` varchar(20) NOT NULL,
  `enfe_pac` varchar(50) DEFAULT NULL,
  `motivo_consulta` varchar(200) DEFAULT NULL,
  `signos` varchar(60) DEFAULT NULL,
  `antec_pac` varchar(200) DEFAULT NULL,
  `presion_pac` varchar(8) DEFAULT NULL,
  `pulso_pac` varchar(6) DEFAULT NULL,
  `temp_pac` varchar(20) DEFAULT NULL,
  `fc_pac` varchar(6) DEFAULT NULL,
  `frec_resp` varchar(10) DEFAULT NULL,
  `exam_clinico` varchar(200) DEFAULT NULL,
  `exam_complementario` varchar(200) DEFAULT NULL,
  `odonestomalogico` varchar(250) DEFAULT NULL,
  `diagn_pac` varchar(300) DEFAULT NULL,
  `observación` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`codi_pac`, `nomb_pac`, `apel_pac`, `edad_pac`, `ocupacion`, `lugar_nacimiento`, `informacion_clinica`, `dire_pac`, `telf_pac`, `dni_pac`, `fena_pac`, `sexo_pac`, `civi_pac`, `esta_pac`, `afil_pac`, `aler_pac`, `emai_pac`, `titu_pac`, `enfe_pac`, `motivo_consulta`, `signos`, `antec_pac`, `presion_pac`, `pulso_pac`, `temp_pac`, `fc_pac`, `frec_resp`, `exam_clinico`, `exam_complementario`, `odonestomalogico`, `diagn_pac`, `observación`) VALUES
(1, 'CHRISTHIAM ALEXIS', 'Diaz Saona', '30', 'INGENIERO', 'HUACHO', 'POR FACEBOOK', 'SAN BARTOLOME 3RA ETAPA', '992398412', '44660415', '1987-07-15', 'M', 'C', 'A', 'Particular', 'TOS', 'cdiaz_1987@hotmail.com', 'SI', 'NINGUNA', '2', '2', '2', '45', '2', '2', '2', '2', '2', '2', '2', 'CIE12', ''),
(2, 'ANTONIO', 'Corso', '23', 'ADE', 'HUACHO', 'POR AMIGO', 'SAN JACINTO', '12345678', '44665423', '2011-07-01', 'M', 'S', 'A', 'EPS', 'Por dolor a garganta', 'csaona@clinicasanpedro.com', 'si', 'si', 'd', 'dd', 'd', '', '12', '1', '1', 'COMPLETO', 'd', 'd', 'd', 'CIE10', ''),
(3, '123', '123', '123', '123', '123', '123', '123', '123', '12312323', '1970-01-01', 'M', 'S', 'A', 'Particular', '123', 'a@a.com', '123', '123', '123', '123', '123', '', '123', '123', '123', '123', '123', '123', '123', '123', ''),
(4, 'Carlos', 'García', '27', '', '', NULL, NULL, '123456789', '47474747', '1970-01-01', 'M', 'C', 'A', 'EPS', 'Nada', 'yo@me.com', 'Yo', 'Inmortal', 'c#', '', '', '', '', '', '', '', '', '', 're', 'C45', ''),
(5, 'KEVIN ROJAS', 'ESPINOZA', '12', 'Ingeniero', 'Huacho', 'Por facebookes', 'SAN JACINTO DEL BIEN', '992398412', '20230688', '1988-07-15', 'M', 'S', 'A', 'Particular', 'Ninguna', 'krojas@clinicasanpedro.com', 'si', 'NingunA', 'si', 'ninguno', 'callos', '', '12', '34', '23', '12', 'POR MEDULAR', 'POR COMPLEMENTO', 'ODONTOLOGICO', 'E.12.4', ''),
(6, 'Marcia ', 'Ayres ximena', '23', 'Ingeniera', 'Huacho', 'por todas las partes', 'San Jacinto de aquino', '992398412', '23333333', '1995-07-12', 'F', 'S', 'A', 'EPS', 'Polvo', 'jose@gmail.com', 'Si el mismo', '23 dias', 'Por motivo de consulta medica', 'Tos ronquida', 'por padre', '2', '2', '4', '5', '5', 'Por clinica dental', 'Por caries', 'Por presion', ' C.10', ''),
(7, 'carlos villa', 'sono ', '40', 'gerente', 'huacho', 'por facebook', 'san jacinto del peru juan', '992398412', '55555555', '1997-06-10', 'M', 'C', 'A', 'Particular', ' ninguno', 'cvilla@clinicasanpedro.com', 'por lados', 'años', 'por cita medica', 'muchotobby', 'por personales   ', '2', '2', '4', '6', '7', ' des', '   dess', '   desss', ' seee', ''),
(8, 'SEBASTIAN', 'CUADRO', '23', 'PROFESOR', 'URUGUAY', 'Por face y un amigo', 'URUGUAY', '433333', '33333333', '1988-02-12', 'M', 'C', 'A', 'Particular', ' al polvo ', 'sebascuadro19@gmail.com', 'Si el mismo', '2 meses', 'Por dolor de los dientes', 'ninguno', 'ninguno', '12', '13', '3', '4', '67', ' Ninguno', 'ninguno   ', 'ninguno   ', 'POR GRIPE CE.10 ', ''),
(9, 'Soria', 'Quijantes', 'año', 'Docente', 'Lima', 'Por facebook', 'Aramburu 520', '992398412', '50679234', '1970-03-18', 'M', 'C', 'A', 'Particular', ' polvo', 'soria@gmail.com', 'el mismo', 'ninguno', 'Por un dolor ', 'dolor', '  por dolores', '3', '4', '3', '6', '4', 'ninguno', '  no presenta', '   ninguno', ' ninguno', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `cod_pago` int(11) NOT NULL,
  `concepto_pago` varchar(80) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_pago` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `monto_pago` decimal(10,2) NOT NULL,
  `movimiento_pago` varchar(1) NOT NULL,
  `tipo_pago` varchar(1) NOT NULL,
  `observacion` text,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`cod_pago`, `concepto_pago`, `fecha_registro`, `fecha_pago`, `monto_pago`, `movimiento_pago`, `tipo_pago`, `observacion`, `estado`) VALUES
(1, 'Pago de personal', '2018-04-13 04:51:29', '2018-04-13 04:51:29', '40.00', 'E', 'C', 'Pago personal de limpieza', 1),
(2, 'Pago de luz', '2018-01-17 06:35:18', '2018-01-17 06:35:18', '12.00', 'E', 'C', 'pago de luz ', 0),
(3, 'Pago suplementos', '2018-01-29 07:06:47', '2018-01-29 07:06:47', '23.00', 'E', 'C', '', 0),
(4, 'Pago por comision', '2018-04-13 04:32:44', '2018-04-13 04:32:44', '12.00', 'E', 'C', 'por devolucion', 0),
(5, 'Pago de agua', '2018-04-24 03:56:32', '2018-04-24 03:56:32', '45.00', 'E', 'P', 'Por pago mensual de agua', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `placa`
--

CREATE TABLE `placa` (
  `ID` int(11) NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `NombreArchivo` varchar(255) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `placa`
--

INSERT INTO `placa` (`ID`, `ID_Paciente`, `NombreArchivo`, `Estado`) VALUES
(1, 1, '000.png', 1),
(2, 2, '000.png', 0),
(3, 4, '2018-01-08 at 09-39-10.png', 1),
(4, 4, '2017-12-18 at 15-16-47.png', 1),
(5, 2, 'contacto_9.jpg', 0),
(6, 3, 'Productos.png', 1),
(7, 3, 'Productos.png', 1),
(8, 1, 'cajero.jpg', 1),
(9, 4, '1604907_803032483176793_6251016339880222135_n.jpg', 1),
(10, 4, '12181_1020306408044477_5178803912017649300_n.jpg', 1),
(11, 4, '12181_1020306408044477_5178803912017649300_n.jpg', 1),
(12, 4, '12181_1020306408044477_5178803912017649300_n.jpg', 1),
(13, 3, '994740_10153834837940419_3234783633739683684_n.jpg', 1),
(14, 3, '994740_10153834837940419_3234783633739683684_n.jpg', 1),
(15, 2, '10155016_10153705350901006_6581652315462611827_n.jpg', 0),
(16, 4, '677605.jpg', 1),
(17, 4, 'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg', 1),
(18, 4, 'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg', 1),
(19, 4, 'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg', 1),
(20, 3, '677605.jpg', 1),
(21, 3, 'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg', 1),
(22, 3, 'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg', 1),
(23, 4, '3464_1259891837364588_371872476449882433_n.jpg', 1),
(24, 5, '581895_10153834838335419_2907799703966513927_n.jpg', 1),
(25, 5, '10255849_1056391401090554_8590161764988025352_n.jpg', 1),
(26, 5, '3464_1259891837364588_371872476449882433_n.jpg', 0),
(27, 6, '581895_10153834838335419_2907799703966513927_n.jpg', 1),
(28, 5, '994740_10153834837940419_3234783633739683684_n.jpg', 1),
(29, 8, '677605.jpg', 1),
(30, 8, 'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg', 0),
(31, 5, '10155016_10153705350901006_6581652315462611827_n.jpg', 1),
(32, 5, '1604907_803032483176793_6251016339880222135_n.jpg', 0),
(33, 7, '581895_10153834838335419_2907799703966513927_n.jpg', 1),
(34, 7, '994740_10153834837940419_3234783633739683684_n.jpg', 1),
(35, 9, '11048774_802557329890975_3621912673063467855_n (1).jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `id_presupuesto` int(11) NOT NULL,
  `codi_pac` int(11) NOT NULL,
  `adelanto` decimal(8,2) DEFAULT NULL,
  `codi_med` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `estado_tratamiento` char(1) NOT NULL DEFAULT '1',
  `estado_presupuesto` varchar(1) NOT NULL DEFAULT 'S'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`id_presupuesto`, `codi_pac`, `adelanto`, `codi_med`, `fecha`, `total`, `estado_tratamiento`, `estado_presupuesto`) VALUES
(1, 1, '34.00', 1, '2018-04-08', '200.00', '1', 'S'),
(2, 1, '200.00', 1, '2018-04-09', '200.00', '1', 'S'),
(3, 1, '200.00', 1, '2018-04-08', '200.00', '1', 'S'),
(4, 1, '200.00', 1, '2018-04-16', '0.00', '1', 'S'),
(5, 1, '1100.00', 1, '2018-04-16', '1233.00', '1', 'S'),
(6, 1, '200.00', 1, '2018-04-16', '0.00', '2', 'S'),
(7, 1, '1000.00', 1, '2018-04-15', '10000000.00', '2', 'S'),
(8, 1, '100.00', 1, '2018-04-18', '0.00', '2', 'S'),
(9, 1, '150.00', 1, '2018-04-18', '0.00', '2', 'S'),
(10, 1, '200.00', 1, '2018-04-18', '200.00', '1', 'S'),
(11, 1, '150.00', 1, '2018-04-18', '0.00', '2', 'S'),
(12, 1, '150.00', 1, '2018-04-18', '0.00', '2', 'S'),
(13, 1, '150.00', 1, '2018-04-18', '0.00', '2', 'S'),
(14, 1, '200.00', 1, '2018-04-18', '200.00', '2', 'S'),
(15, 1, '200.00', 1, '2018-04-18', '200.00', '2', 'S'),
(16, 1, '24.00', 1, '2018-04-18', '0.00', '2', 'S'),
(17, 1, '234.00', 1, '2018-04-18', '0.00', '2', 'S'),
(18, 6, '345.00', 1, '2018-04-20', '200.00', '2', 'S'),
(19, 1, '345.00', 1, '2018-04-20', '200.00', '2', 'S'),
(20, 1, '456.00', 1, '2018-04-20', '0.00', '2', 'S'),
(21, 1, '456.00', 1, '2018-04-20', '600.00', '2', 'S'),
(22, 1, '345.00', 1, '2018-04-20', '0.00', '2', 'S'),
(23, 1, '345.00', 1, '2018-04-20', '0.00', '2', 'S'),
(24, 1, '345.00', 1, '2018-04-20', '0.00', '2', 'S'),
(25, 1, '345.00', 1, '2018-04-20', '0.00', '2', 'S'),
(26, 1, '23.00', 1, '2018-04-20', '0.00', '2', 'S'),
(27, 1, '234.00', 1, '2018-04-20', '600.00', '2', 'S'),
(28, 1, '345.00', 1, '2018-04-20', '600.00', '2', 'S'),
(29, 1, '345.00', 1, '2018-04-20', '0.00', '2', 'S'),
(30, 1, '45.00', 1, '2018-04-20', '0.00', '2', 'S'),
(31, 1, '56.00', 1, '2018-04-20', '600.00', '2', 'S'),
(32, 1, '56.00', 1, '2018-04-20', '0.00', '2', 'S'),
(33, 1, '45.00', 1, '2018-04-20', '600.00', '2', 'S'),
(34, 1, '345.00', 1, '2018-04-20', '600.00', '2', 'S'),
(35, 1, '56.00', 1, '2018-04-20', '600.00', '2', 'S'),
(36, 1, '45.00', 1, '2018-04-20', '800.00', '2', 'S'),
(37, 1, '56.00', 1, '2018-04-20', '0.00', '2', 'S'),
(38, 1, '67.00', 1, '2018-04-20', '800.00', '2', 'S'),
(39, 2, '500.00', 1, '2018-04-20', '0.00', '2', 'S'),
(40, 2, '320.00', 1, '2018-04-20', '200.00', '1', 'S'),
(41, 1, '23.00', 1, '2018-04-22', '0.00', '2', 'S'),
(42, 1, '34.00', 1, '2018-04-22', '0.00', '2', 'S'),
(43, 1, '345.00', 1, '2018-04-22', '0.00', '1', 'S'),
(44, 1, '45.00', 1, '2018-04-22', '200.00', '2', 'S'),
(45, 1, '56.00', 1, '2018-04-22', '200.00', '2', 'S'),
(46, 8, '200.00', 1, '2018-05-01', '200.00', '1', 'S'),
(47, 1, '100.00', 1, '2018-05-04', '400.00', '2', 'S'),
(48, 1, '34.00', 1, '2018-05-04', '450.00', '2', 'S'),
(49, 1, '300.00', 1, '2018-05-04', '450.00', '2', 'S'),
(50, 1, '23.00', 1, '2018-05-29', '450.00', '2', 'S'),
(51, 1, '0.00', 3, '2018-09-20', '0.00', '1', 'S'),
(52, 1, '0.00', 3, '2018-09-20', '1050.00', '1', 'S'),
(53, 1, '500.00', 1, '2018-09-29', '450.00', '1', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto_detalle`
--

CREATE TABLE `presupuesto_detalle` (
  `id_pres_detalle` int(11) NOT NULL,
  `codi_pro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_procedimiento` decimal(10,2) NOT NULL,
  `id_presupuesto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `presupuesto_detalle`
--

INSERT INTO `presupuesto_detalle` (`id_pres_detalle`, `codi_pro`, `cantidad`, `precio_procedimiento`, `id_presupuesto`) VALUES
(1, 7, 1, '200.00', 1),
(2, 7, 1, '200.00', 2),
(3, 7, 1, '200.00', 3),
(4, 7, 1, '1233.00', 5),
(5, 7, 1, '10000000.00', 7),
(6, 7, 1, '200.00', 10),
(7, 7, 1, '200.00', 14),
(8, 7, 1, '200.00', 15),
(9, 7, 1, '200.00', 18),
(10, 7, 1, '200.00', 19),
(11, 7, 1, '200.00', 21),
(12, 7, 1, '200.00', 21),
(13, 7, 1, '200.00', 21),
(14, 7, 1, '200.00', 27),
(15, 7, 1, '200.00', 27),
(16, 7, 1, '200.00', 27),
(17, 7, 1, '200.00', 28),
(18, 7, 1, '200.00', 28),
(19, 7, 1, '200.00', 28),
(20, 7, 1, '200.00', 31),
(21, 7, 1, '200.00', 31),
(22, 7, 1, '200.00', 31),
(23, 7, 1, '200.00', 33),
(24, 7, 1, '200.00', 33),
(25, 7, 1, '200.00', 33),
(26, 7, 1, '200.00', 34),
(27, 7, 1, '200.00', 34),
(28, 7, 1, '200.00', 34),
(29, 7, 1, '200.00', 35),
(30, 7, 1, '200.00', 35),
(31, 7, 1, '200.00', 35),
(32, 7, 1, '200.00', 36),
(33, 7, 1, '200.00', 36),
(34, 7, 1, '200.00', 36),
(35, 7, 1, '200.00', 36),
(36, 7, 1, '200.00', 38),
(37, 7, 1, '200.00', 38),
(38, 7, 1, '200.00', 38),
(39, 7, 1, '200.00', 38),
(40, 7, 1, '200.00', 40),
(41, 7, 1, '200.00', 44),
(42, 7, 1, '200.00', 45),
(43, 7, 1, '200.00', 46),
(44, 7, 1, '200.00', 47),
(45, 7, 1, '200.00', 47),
(46, 8, 1, '450.00', 48),
(47, 8, 1, '450.00', 49),
(48, 8, 1, '450.00', 50),
(49, 8, 1, '450.00', 52),
(50, 9, 1, '600.00', 52),
(51, 8, 1, '450.00', 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE `procedimiento` (
  `codi_pro` int(11) NOT NULL,
  `desc_pro` varchar(150) DEFAULT NULL,
  `grup_pro` varchar(50) DEFAULT NULL,
  `esta_pro` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `procedimiento`
--

INSERT INTO `procedimiento` (`codi_pro`, `desc_pro`, `grup_pro`, `esta_pro`) VALUES
(7, 'Sutura de diente', 'S', 'A'),
(8, 'sutura por molar', 'B', 'A'),
(9, 'sutura dientes', 'S', 'A'),
(10, 'sacado de dientes', 'D', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `codi_med` int(11) NOT NULL,
  `txt_med` varchar(200) DEFAULT NULL,
  `codi_pac` int(11) NOT NULL,
  `txt_pac` varchar(200) DEFAULT NULL,
  `edad_pac` int(11) DEFAULT NULL,
  `receta` varchar(1000) DEFAULT NULL,
  `prescripcion` varchar(1000) DEFAULT NULL,
  `fecha_sc` datetime DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `fecha`, `codi_med`, `txt_med`, `codi_pac`, `txt_pac`, `edad_pac`, `receta`, `prescripcion`, `fecha_sc`, `estado`) VALUES
(1, '2018-09-27 00:00:00', 1, 'LOAYZA LOPEZ DIEGO ALFONSO', 1, 'Diaz Saona CHRISTHIAM ALEXIS', 30, '[\"POR DOMIR\"]', '[\"DOLOR\"]', '2018-09-27 16:03:00', 'v'),
(2, '2019-02-13 00:00:00', 1, 'LOAYZA LOPEZ DIEGO ALFONSO', 1, 'Diaz Saona CHRISTHIAM ALEXIS', 30, '[\"dolores fuertes\"]', '[\"ninguna\"]', '2019-02-13 13:10:00', 'v');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `codi_rol` int(11) NOT NULL,
  `nomb_rol` varchar(30) DEFAULT NULL,
  `esta_rol` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`codi_rol`, `nomb_rol`, `esta_rol`) VALUES
(1, 'Administrador', 'A'),
(2, 'Usuario', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa_proc`
--

CREATE TABLE `tarifa_proc` (
  `codi_tar` int(11) NOT NULL,
  `codi_cat` int(11) DEFAULT NULL,
  `codi_pro` int(11) DEFAULT NULL,
  `cost_tar` decimal(10,2) DEFAULT NULL,
  `esta_tar` char(1) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarifa_proc`
--

INSERT INTO `tarifa_proc` (`codi_tar`, `codi_cat`, `codi_pro`, `cost_tar`, `esta_tar`) VALUES
(7, 2, 7, '200.00', 'A'),
(8, 1, 7, '678.00', 'A'),
(9, 4, 8, '450.00', 'A'),
(10, 1, 9, '600.00', 'A'),
(11, 1, 10, '480.00', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_inventario`
--

CREATE TABLE `tipo_inventario` (
  `cod_tipo_inventario` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_inventario`
--

INSERT INTO `tipo_inventario` (`cod_tipo_inventario`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Venta', 'Por medicamento', 0),
(2, 'Compras', 'Para Farmacia', 0),
(3, 'Compra', 'Por compra de medicamentos', 0),
(4, 'DES', 'SS', 0),
(5, 'WEEE', 'EE', 0),
(6, 'ds', 'ss', 0),
(7, 'd', 'd', 0),
(8, 'd', 'd', 0),
(9, 'JUH', 'JUH', 0),
(10, 'fr', 'd', 0),
(11, 'DESDES', 'DESE', 0),
(12, 'Por ventas', 'medicamentos', 0),
(13, 'por demoler', 'bien', 0),
(14, 'por telefono', 'no no', 0),
(15, 'des', '', 0),
(16, 'desdee', '', 0),
(17, 'des', 'sss', 0),
(18, 'dess', 'sss', 0),
(19, 'dess', 'ss', 0),
(20, 'des', 'seee', 0),
(21, 'Por medicamento', 'medicamento', 0),
(22, 'dientes', 'molares', 0),
(23, 'prueba', 'prueba', 0),
(24, 'pruebas', 'r', 0),
(25, 'des', 'e', 0),
(26, 'ttee', 'e', 0),
(27, 'ee', 'ee', 0),
(28, 'tr', '', 0),
(29, 'fr', 'f', 0),
(30, 'ft', 'tt', 0),
(31, 'ii', 'ii', 0),
(32, 'hhh', '', 0),
(33, 'feded', 'des', 0),
(34, 'fedes', 'hugo', 0),
(35, 'gtfr', 'hy', 0),
(36, 'hygttt', 'kijii', 0),
(37, 'juhuu', 'juu', 0),
(38, 'sistemas', 'christhiam', 0),
(39, 'hgvfghgfh', 'ftxffcgcfgcfgy', 0),
(40, 'hgvfghgfh', 'ftxffcgcfgcfgy', 0),
(41, 'Por ingreso almacen', 'almacen', 1),
(42, '231132123165564', 'fdcxdfcdftg', 0),
(43, 'ygbvygvytv', 'rtftftrtfr', 0),
(44, 'CHRISTIAM ALEXIS', 'des', 0),
(45, 'Salida de procedimientos', 'procedimientos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `codi_pro_tmp` int(11) NOT NULL,
  `precio_tmp` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmp`
--

INSERT INTO `tmp` (`id_tmp`, `cantidad_tmp`, `codi_pro_tmp`, `precio_tmp`, `session_id`) VALUES
(25, 1, 7, 200, '0rb3ojf2n9lrvst8u56vve4c20'),
(26, 1, 7, 200, '0rb3ojf2n9lrvst8u56vve4c20'),
(27, 1, 7, 200, '0rb3ojf2n9lrvst8u56vve4c20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codi_usu` int(11) NOT NULL,
  `logi_usu` varchar(20) DEFAULT NULL,
  `pass_usu` varbinary(1000) DEFAULT NULL,
  `esta_usu` char(1) DEFAULT NULL,
  `codi_rol` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codi_usu`, `logi_usu`, `pass_usu`, `esta_usu`, `codi_rol`) VALUES
(1, 'admin', 0x3231323332663239376135376135613734333839346130653461383031666333, 'A', 1),
(2, 'DEBI', 0x6166643962343139353061356465663762636432633265613033633132383065, 'A', 2),
(3, 'DIEGO', 0x3434396637376462623833373333356230326533383435323132613135313234, 'A', 2),
(4, 'XXX', 0x6263393138393430366265383465633239373436346135313432323134303664, 'A', 1),
(5, '', '', 'A', 0),
(6, '', '', 'A', 0),
(7, 'MANUEL', 0x6330363434393233323033303836323064633737346466613737633265663734, 'A', 1),
(8, 'ARON', 0x6434316438636439386630306232303465393830303939386563663834323765, 'A', 1),
(9, 'DEMO', 0x6264366462643036336635616237333934383739653363303837383163643732, 'A', 2),
(10, 'CARLOS235', 0x3537613039636130346537643765376438356662346462323762316637333265, 'A', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vcitas_medicas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vcitas_medicas` (
`codi_cit` int(11)
,`fech_cit` datetime
,`nomb_pac` varchar(20)
,`apel_pac` varchar(20)
,`nomb_med` varchar(20)
,`apel_med` varchar(20)
,`obsv_cit` varchar(200)
,`codi_pac` int(11)
,`codi_med` int(11)
,`esta_cit` char(1)
,`motivo_consult` varchar(80)
,`sintomas` varchar(40)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vdetalle_procedimiento`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vdetalle_procedimiento` (
`codi_odo` int(11)
,`codi_die` int(11)
,`codi_pac` int(11)
,`num_die` int(11)
,`codi_enf` varchar(6)
,`desc_enf` varchar(200)
,`codi_dpr` int(11)
,`codi_tar` int(11)
,`aseg_dpr` decimal(3,1)
,`codi_pro` int(11)
,`desc_pro` varchar(150)
,`grup_pro` varchar(50)
,`codi_cat` int(11)
,`nomb_cat` varchar(45)
,`cost_tar` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vdiente_enfermedad`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vdiente_enfermedad` (
`codi_odo` int(11)
,`part_die` char(6)
,`codi_die` int(11)
,`codi_enf` varchar(6)
,`titu_enf` char(1)
,`desc_enf` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vdiente_enfermedad_2`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vdiente_enfermedad_2` (
`codi_odo` int(11)
,`codi_die` int(11)
,`part_die` char(6)
,`codi_pac` int(11)
,`num_die` int(11)
,`codi_enf` varchar(6)
,`titu_enf` char(1)
,`desc_enf` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vfactura`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vfactura` (
`codi_fac` int(11)
,`fech_fac` datetime
,`sesi_fac` varchar(45)
,`tota_fac` decimal(10,2)
,`precio` decimal(10,2)
,`aseg_dpr` decimal(3,1)
,`part_die` char(5)
,`cost_tar` decimal(10,2)
,`num_die` int(11)
,`nomb_cat` varchar(45)
,`desc_pro` varchar(150)
,`grup_pro` varchar(50)
,`nomb_pac` varchar(20)
,`apel_pac` varchar(20)
,`codi_cit` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vhistorial`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vhistorial` (
`codi_his` int(11)
,`codi_die` int(11)
,`codi_pac` int(11)
,`codi_cit` int(11)
,`fech_cit` datetime
,`id_die` int(11)
,`num_die` int(11)
,`codi_edi` int(11)
,`part_die` char(5)
,`nomb_edi` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vhistorial_proc`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vhistorial_proc` (
`codi_cit` int(11)
,`codi_dpr` int(11)
,`num_die` int(11)
,`desc_pro` varchar(150)
,`nomb_cat` varchar(45)
,`cost_tar` decimal(10,2)
,`aseg_dpr` decimal(3,1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vodontograma`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vodontograma` (
`codi_odo` int(11)
,`codi_die` int(11)
,`codi_pac` int(11)
,`codi_cit` int(11)
,`fech_cit` datetime
,`id_die` int(11)
,`num_die` int(11)
,`codi_edi` int(11)
,`part_die` char(5)
,`nomb_edi` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vodontograma_reporte`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vodontograma_reporte` (
`codi_cit` int(11)
,`apel_med` varchar(20)
,`nomb_med` varchar(20)
,`coleg_med` varchar(50)
,`codi_pac` int(11)
,`apel_pac` varchar(20)
,`nomb_pac` varchar(20)
,`num_die` int(11)
,`nomb_edi` varchar(45)
,`desc_enf` varchar(200)
,`part_die` char(5)
,`codi_enf` varchar(6)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vpacientes_historial`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vpacientes_historial` (
`codi_pac` int(11)
,`nomb_pac` varchar(20)
,`apel_pac` varchar(20)
,`dire_pac` varchar(100)
,`telf_pac` varchar(20)
,`dni_pac` varchar(10)
,`fena_pac` date
,`sexo_pac` char(1)
,`civi_pac` char(1)
,`esta_pac` char(1)
,`afil_pac` varchar(30)
,`aler_pac` varchar(120)
,`emai_pac` varchar(50)
,`titu_pac` varchar(20)
,`enfe_pac` varchar(50)
,`edad_pac` varchar(3)
,`ocupacion` varchar(40)
,`lugar_nacimiento` varchar(30)
,`motivo_consulta` varchar(200)
,`signos` varchar(60)
,`antec_pac` varchar(200)
,`presion_pac` varchar(8)
,`pulso_pac` varchar(6)
,`temp_pac` varchar(20)
,`fc_pac` varchar(6)
,`frec_resp` varchar(10)
,`exam_clinico` varchar(200)
,`exam_complementario` varchar(200)
,`odonestomalogico` varchar(250)
,`diagn_pac` varchar(300)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vtarifa`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vtarifa` (
`codi_tar` int(11)
,`desc_pro` varchar(150)
,`nomb_cat` varchar(45)
,`cost_tar` decimal(10,2)
,`grup_pro` varchar(50)
,`codi_pro` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vtarifa_tmp`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vtarifa_tmp` (
`codi_tar` int(11)
,`desc_pro` varchar(150)
,`nomb_cat` varchar(45)
,`cost_tar` decimal(10,2)
,`grup_pro` varchar(50)
,`codi_pro` int(11)
,`id_tmp` int(11)
,`cantidad_tmp` int(11)
,`codi_pro_tmp` int(11)
,`precio_tmp` int(11)
,`session_id` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vusuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vusuario` (
`codi_usu` int(11)
,`logi_usu` varchar(20)
,`pass_usu` varbinary(1000)
,`codi_rol` int(11)
,`esta_usu` char(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vusuario_rol`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vusuario_rol` (
`codi_usu` int(11)
,`logi_usu` varchar(20)
,`pass_usu` varbinary(1000)
,`esta_usu` char(1)
,`codi_rol` int(11)
,`nomb_rol` varchar(30)
,`esta_rol` char(1)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vcitas_medicas`
--
DROP TABLE IF EXISTS `vcitas_medicas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcitas_medicas`  AS  select `c`.`codi_cit` AS `codi_cit`,`c`.`fech_cit` AS `fech_cit`,`p`.`nomb_pac` AS `nomb_pac`,`p`.`apel_pac` AS `apel_pac`,`m`.`nomb_med` AS `nomb_med`,`m`.`apel_med` AS `apel_med`,`c`.`obsv_cit` AS `obsv_cit`,`p`.`codi_pac` AS `codi_pac`,`m`.`codi_med` AS `codi_med`,`c`.`esta_cit` AS `esta_cit`,`c`.`motivo_consult` AS `motivo_consult`,`c`.`sintomas` AS `sintomas` from ((`cita_medica` `c` join `paciente` `p`) join `medico` `m`) where ((`c`.`codi_pac` = `p`.`codi_pac`) and (`c`.`codi_med` = `m`.`codi_med`) and ((`c`.`esta_cit` = 'A') or (`c`.`esta_cit` = 'T')) and (`p`.`esta_pac` = 'A')) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vdetalle_procedimiento`
--
DROP TABLE IF EXISTS `vdetalle_procedimiento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdetalle_procedimiento`  AS  select `o`.`codi_odo` AS `codi_odo`,`o`.`codi_die` AS `codi_die`,`d`.`codi_pac` AS `codi_pac`,`d`.`num_die` AS `num_die`,`o`.`codi_enf` AS `codi_enf`,`ed`.`desc_enf` AS `desc_enf`,`dp`.`codi_dpr` AS `codi_dpr`,`dp`.`codi_tar` AS `codi_tar`,`dp`.`aseg_dpr` AS `aseg_dpr`,`tp`.`codi_pro` AS `codi_pro`,`p`.`desc_pro` AS `desc_pro`,`p`.`grup_pro` AS `grup_pro`,`tp`.`codi_cat` AS `codi_cat`,`c`.`nomb_cat` AS `nomb_cat`,`tp`.`cost_tar` AS `cost_tar` from ((((((`odontograma` `o` join `diente` `d`) join `enfermedad` `ed`) join `detalle_proc` `dp`) join `tarifa_proc` `tp`) join `procedimiento` `p`) join `categoria` `c`) where ((`o`.`codi_die` = `d`.`codi_die`) and (`o`.`codi_enf` = `ed`.`codi_enf`) and (`dp`.`codi_odo` = `o`.`codi_odo`) and (`dp`.`codi_tar` = `tp`.`codi_tar`) and (`tp`.`codi_pro` = `p`.`codi_pro`) and (`tp`.`codi_cat` = `c`.`codi_cat`)) order by `dp`.`codi_dpr` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vdiente_enfermedad`
--
DROP TABLE IF EXISTS `vdiente_enfermedad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdiente_enfermedad`  AS  select `ed`.`codi_odo` AS `codi_odo`,`ed`.`part_die` AS `part_die`,`ed`.`codi_die` AS `codi_die`,`ed`.`codi_enf` AS `codi_enf`,`e`.`titu_enf` AS `titu_enf`,`e`.`desc_enf` AS `desc_enf` from (`odontograma` `ed` join `enfermedad` `e`) where (`ed`.`codi_enf` = `e`.`codi_enf`) order by `ed`.`codi_die` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vdiente_enfermedad_2`
--
DROP TABLE IF EXISTS `vdiente_enfermedad_2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdiente_enfermedad_2`  AS  select `o`.`codi_odo` AS `codi_odo`,`o`.`codi_die` AS `codi_die`,`o`.`part_die` AS `part_die`,`d`.`codi_pac` AS `codi_pac`,`d`.`num_die` AS `num_die`,`o`.`codi_enf` AS `codi_enf`,`ed`.`titu_enf` AS `titu_enf`,`ed`.`desc_enf` AS `desc_enf` from ((`odontograma` `o` join `diente` `d`) join `enfermedad` `ed`) where ((`o`.`codi_die` = `d`.`codi_die`) and (`o`.`codi_enf` = `ed`.`codi_enf`)) order by `d`.`num_die` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vfactura`
--
DROP TABLE IF EXISTS `vfactura`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vfactura`  AS  select `f`.`codi_fac` AS `codi_fac`,`f`.`fech_fac` AS `fech_fac`,`f`.`sesi_fac` AS `sesi_fac`,`f`.`tota_fac` AS `tota_fac`,`df`.`precio` AS `precio`,`dp`.`aseg_dpr` AS `aseg_dpr`,`d`.`part_die` AS `part_die`,`tp`.`cost_tar` AS `cost_tar`,`d`.`num_die` AS `num_die`,`c`.`nomb_cat` AS `nomb_cat`,`p`.`desc_pro` AS `desc_pro`,`p`.`grup_pro` AS `grup_pro`,`pa`.`nomb_pac` AS `nomb_pac`,`pa`.`apel_pac` AS `apel_pac`,`cm`.`codi_cit` AS `codi_cit` from ((((((((((`factura` `f` join `detalle_fac` `df`) join `detalle_proc` `dp`) join `odontograma` `o`) join `tarifa_proc` `tp`) join `diente` `d`) join `categoria` `c`) join `procedimiento` `p`) join `paciente` `pa`) left join `historial_proc` `hp` on((`hp`.`codi_dpr` = `dp`.`codi_dpr`))) left join `cita_medica` `cm` on(((`hp`.`codi_cit` = `cm`.`codi_cit`) and (`d`.`codi_cit` = `cm`.`codi_cit`)))) where ((`f`.`codi_fac` = `df`.`codi_fac`) and (`df`.`codi_dpr` = `dp`.`codi_dpr`) and (`dp`.`codi_odo` = `o`.`codi_odo`) and (`o`.`codi_die` = `d`.`codi_die`) and (`dp`.`codi_tar` = `tp`.`codi_tar`) and (`tp`.`codi_pro` = `p`.`codi_pro`) and (`tp`.`codi_cat` = `c`.`codi_cat`) and (`pa`.`codi_pac` = `d`.`codi_pac`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vhistorial`
--
DROP TABLE IF EXISTS `vhistorial`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vhistorial`  AS  select `hp`.`codi_his` AS `codi_his`,`hp`.`codi_die` AS `codi_die`,`hp`.`codi_pac` AS `codi_pac`,`hp`.`codi_cit` AS `codi_cit`,`c`.`fech_cit` AS `fech_cit`,`hp`.`id_die` AS `id_die`,`hp`.`num_die` AS `num_die`,`hp`.`codi_edi` AS `codi_edi`,`hp`.`part_die` AS `part_die`,`ed`.`nomb_edi` AS `nomb_edi` from ((`historial_paciente` `hp` join `estado_diente` `ed`) join `cita_medica` `c`) where ((`hp`.`codi_edi` = `ed`.`codi_edi`) and (`hp`.`codi_cit` = `c`.`codi_cit`)) order by `hp`.`codi_pac` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vhistorial_proc`
--
DROP TABLE IF EXISTS `vhistorial_proc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vhistorial_proc`  AS  select `h`.`codi_cit` AS `codi_cit`,`h`.`codi_dpr` AS `codi_dpr`,`di`.`num_die` AS `num_die`,`p`.`desc_pro` AS `desc_pro`,`c`.`nomb_cat` AS `nomb_cat`,`t`.`cost_tar` AS `cost_tar`,`d`.`aseg_dpr` AS `aseg_dpr` from ((((((`historial_proc` `h` join `detalle_proc` `d`) join `procedimiento` `p`) join `categoria` `c`) join `tarifa_proc` `t`) join `odontograma` `o`) join `diente` `di`) where ((`h`.`codi_dpr` = `d`.`codi_dpr`) and (`d`.`codi_tar` = `t`.`codi_tar`) and (`t`.`codi_pro` = `p`.`codi_pro`) and (`t`.`codi_cat` = `c`.`codi_cat`) and (`d`.`codi_odo` = `o`.`codi_odo`) and (`o`.`codi_die` = `di`.`codi_die`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vodontograma`
--
DROP TABLE IF EXISTS `vodontograma`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vodontograma`  AS  select `o`.`codi_odo` AS `codi_odo`,`d`.`codi_die` AS `codi_die`,`d`.`codi_pac` AS `codi_pac`,`d`.`codi_cit` AS `codi_cit`,`c`.`fech_cit` AS `fech_cit`,`d`.`id_die` AS `id_die`,`d`.`num_die` AS `num_die`,`d`.`codi_edi` AS `codi_edi`,`d`.`part_die` AS `part_die`,`ed`.`nomb_edi` AS `nomb_edi` from (((`diente` `d` join `estado_diente` `ed`) join `cita_medica` `c`) join `odontograma` `o`) where ((`o`.`codi_die` = `d`.`codi_die`) and (`d`.`codi_edi` = `ed`.`codi_edi`) and (`d`.`codi_cit` = `c`.`codi_cit`)) order by `d`.`codi_die` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vodontograma_reporte`
--
DROP TABLE IF EXISTS `vodontograma_reporte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vodontograma_reporte`  AS  select `he`.`codi_cit` AS `codi_cit`,`m`.`apel_med` AS `apel_med`,`m`.`nomb_med` AS `nomb_med`,`m`.`coleg_med` AS `coleg_med`,`p`.`codi_pac` AS `codi_pac`,`p`.`apel_pac` AS `apel_pac`,`p`.`nomb_pac` AS `nomb_pac`,`he`.`num_die` AS `num_die`,`ed`.`nomb_edi` AS `nomb_edi`,`en`.`desc_enf` AS `desc_enf`,`hp`.`part_die` AS `part_die`,`he`.`codi_enf` AS `codi_enf` from ((((((`historial_enf` `he` join `historial_paciente` `hp`) join `cita_medica` `c`) join `medico` `m`) join `paciente` `p`) join `estado_diente` `ed`) join `enfermedad` `en`) where ((`he`.`codi_cit` = `hp`.`codi_cit`) and (`hp`.`num_die` = `he`.`num_die`) and (`he`.`codi_cit` = `c`.`codi_cit`) and (`c`.`codi_med` = `m`.`codi_med`) and (`c`.`codi_pac` = `p`.`codi_pac`) and (`hp`.`codi_edi` = `ed`.`codi_edi`) and (`he`.`codi_enf` = `en`.`codi_enf`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vpacientes_historial`
--
DROP TABLE IF EXISTS `vpacientes_historial`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpacientes_historial`  AS  select distinct `h`.`codi_pac` AS `codi_pac`,`p`.`nomb_pac` AS `nomb_pac`,`p`.`apel_pac` AS `apel_pac`,`p`.`dire_pac` AS `dire_pac`,`p`.`telf_pac` AS `telf_pac`,`p`.`dni_pac` AS `dni_pac`,`p`.`fena_pac` AS `fena_pac`,`p`.`sexo_pac` AS `sexo_pac`,`p`.`civi_pac` AS `civi_pac`,`p`.`esta_pac` AS `esta_pac`,`p`.`afil_pac` AS `afil_pac`,`p`.`aler_pac` AS `aler_pac`,`p`.`emai_pac` AS `emai_pac`,`p`.`titu_pac` AS `titu_pac`,`p`.`enfe_pac` AS `enfe_pac`,`p`.`edad_pac` AS `edad_pac`,`p`.`ocupacion` AS `ocupacion`,`p`.`lugar_nacimiento` AS `lugar_nacimiento`,`p`.`motivo_consulta` AS `motivo_consulta`,`p`.`signos` AS `signos`,`p`.`antec_pac` AS `antec_pac`,`p`.`presion_pac` AS `presion_pac`,`p`.`pulso_pac` AS `pulso_pac`,`p`.`temp_pac` AS `temp_pac`,`p`.`fc_pac` AS `fc_pac`,`p`.`frec_resp` AS `frec_resp`,`p`.`exam_clinico` AS `exam_clinico`,`p`.`exam_complementario` AS `exam_complementario`,`p`.`odonestomalogico` AS `odonestomalogico`,`p`.`diagn_pac` AS `diagn_pac` from (`historial_paciente` `h` join `paciente` `p`) where (`h`.`codi_pac` = `p`.`codi_pac`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vtarifa`
--
DROP TABLE IF EXISTS `vtarifa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtarifa`  AS  select `t`.`codi_tar` AS `codi_tar`,`p`.`desc_pro` AS `desc_pro`,`c`.`nomb_cat` AS `nomb_cat`,`t`.`cost_tar` AS `cost_tar`,`p`.`grup_pro` AS `grup_pro`,`p`.`codi_pro` AS `codi_pro` from ((`categoria` `c` join `procedimiento` `p`) join `tarifa_proc` `t`) where ((`t`.`codi_cat` = `c`.`codi_cat`) and (`t`.`codi_pro` = `p`.`codi_pro`) and (`t`.`esta_tar` = 'A')) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vtarifa_tmp`
--
DROP TABLE IF EXISTS `vtarifa_tmp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtarifa_tmp`  AS  select `vtarifa`.`codi_tar` AS `codi_tar`,`vtarifa`.`desc_pro` AS `desc_pro`,`vtarifa`.`nomb_cat` AS `nomb_cat`,`vtarifa`.`cost_tar` AS `cost_tar`,`vtarifa`.`grup_pro` AS `grup_pro`,`vtarifa`.`codi_pro` AS `codi_pro`,`tmp`.`id_tmp` AS `id_tmp`,`tmp`.`cantidad_tmp` AS `cantidad_tmp`,`tmp`.`codi_pro_tmp` AS `codi_pro_tmp`,`tmp`.`precio_tmp` AS `precio_tmp`,`tmp`.`session_id` AS `session_id` from (`vtarifa` join `tmp`) where (`vtarifa`.`codi_pro` = `tmp`.`codi_pro_tmp`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vusuario`
--
DROP TABLE IF EXISTS `vusuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vusuario`  AS  select `usuario`.`codi_usu` AS `codi_usu`,`usuario`.`logi_usu` AS `logi_usu`,`usuario`.`pass_usu` AS `pass_usu`,`usuario`.`codi_rol` AS `codi_rol`,`usuario`.`esta_usu` AS `esta_usu` from `usuario` where (`usuario`.`esta_usu` = 'A') ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vusuario_rol`
--
DROP TABLE IF EXISTS `vusuario_rol`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vusuario_rol`  AS  select `u`.`codi_usu` AS `codi_usu`,`u`.`logi_usu` AS `logi_usu`,`u`.`pass_usu` AS `pass_usu`,`u`.`esta_usu` AS `esta_usu`,`r`.`codi_rol` AS `codi_rol`,`r`.`nomb_rol` AS `nomb_rol`,`r`.`esta_rol` AS `esta_rol` from (`usuario` `u` join `rol` `r`) where (`u`.`codi_rol` = `r`.`codi_rol`) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codi_cat`),
  ADD UNIQUE KEY `nomb_cat` (`nomb_cat`);

--
-- Indices de la tabla `cita_medica`
--
ALTER TABLE `cita_medica`
  ADD PRIMARY KEY (`codi_cit`),
  ADD KEY `fk_cita_medica_paciente` (`codi_pac`),
  ADD KEY `fk_cita_medica_medico` (`codi_med`);

--
-- Indices de la tabla `clinica`
--
ALTER TABLE `clinica`
  ADD PRIMARY KEY (`id_clin`);

--
-- Indices de la tabla `detalle_fac`
--
ALTER TABLE `detalle_fac`
  ADD PRIMARY KEY (`codi_dpr`,`codi_fac`),
  ADD KEY `fk_detalle_fac_detalle_proc` (`codi_dpr`),
  ADD KEY `fk_detalle_fac_factura` (`codi_fac`);

--
-- Indices de la tabla `detalle_proc`
--
ALTER TABLE `detalle_proc`
  ADD PRIMARY KEY (`codi_dpr`),
  ADD KEY `fk_detalle_proc_odontograma` (`codi_odo`),
  ADD KEY `fk_detalle_proc_tarifa_proc` (`codi_tar`);

--
-- Indices de la tabla `diente`
--
ALTER TABLE `diente`
  ADD PRIMARY KEY (`codi_die`),
  ADD KEY `fk_diente_paciente` (`codi_pac`),
  ADD KEY `fk_diente_estado_diente` (`codi_edi`);

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`codi_enf`);

--
-- Indices de la tabla `estado_diente`
--
ALTER TABLE `estado_diente`
  ADD PRIMARY KEY (`codi_edi`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`codi_fac`);

--
-- Indices de la tabla `historial_enf`
--
ALTER TABLE `historial_enf`
  ADD PRIMARY KEY (`codi_hie`);

--
-- Indices de la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  ADD PRIMARY KEY (`codi_his`);

--
-- Indices de la tabla `historial_proc`
--
ALTER TABLE `historial_proc`
  ADD PRIMARY KEY (`codi_hip`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`cod_inventario`),
  ADD KEY `fk_inventario_tipo_inventario` (`cod_tipo_inventario`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`codi_med`),
  ADD UNIQUE KEY `ruc_med` (`ruc_med`),
  ADD UNIQUE KEY `coleg_med` (`coleg_med`),
  ADD UNIQUE KEY `nomb_med` (`nomb_med`),
  ADD UNIQUE KEY `apel_med` (`apel_med`),
  ADD UNIQUE KEY `dni_med` (`dni_med`);

--
-- Indices de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD PRIMARY KEY (`codi_odo`),
  ADD KEY `fk_odontograma_diente` (`codi_die`),
  ADD KEY `fk_odontograma_enfermedad` (`codi_enf`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`codi_pac`),
  ADD UNIQUE KEY `nomb_pac` (`nomb_pac`),
  ADD UNIQUE KEY `apel_pac` (`apel_pac`),
  ADD UNIQUE KEY `dni_pac` (`dni_pac`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`cod_pago`);

--
-- Indices de la tabla `placa`
--
ALTER TABLE `placa`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`id_presupuesto`),
  ADD KEY `fk_presupuesto_paciente` (`codi_pac`),
  ADD KEY `fk_medico_presupuesto` (`codi_med`);

--
-- Indices de la tabla `presupuesto_detalle`
--
ALTER TABLE `presupuesto_detalle`
  ADD PRIMARY KEY (`id_pres_detalle`),
  ADD KEY `fk_presupuesto_detalle_tarifa_proc` (`codi_pro`),
  ADD KEY `fk_presupuesto_detalle_presupuesto` (`id_presupuesto`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`codi_pro`),
  ADD UNIQUE KEY `desc_pro` (`desc_pro`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`codi_rol`);

--
-- Indices de la tabla `tarifa_proc`
--
ALTER TABLE `tarifa_proc`
  ADD PRIMARY KEY (`codi_tar`),
  ADD KEY `fk_tarifa_proc_categoria` (`codi_cat`),
  ADD KEY `fk_tarifa_proc_procedimiento` (`codi_pro`);

--
-- Indices de la tabla `tipo_inventario`
--
ALTER TABLE `tipo_inventario`
  ADD PRIMARY KEY (`cod_tipo_inventario`);

--
-- Indices de la tabla `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codi_usu`),
  ADD KEY `fk_usuario_rol` (`codi_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codi_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `cita_medica`
--
ALTER TABLE `cita_medica`
  MODIFY `codi_cit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT de la tabla `clinica`
--
ALTER TABLE `clinica`
  MODIFY `id_clin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `detalle_proc`
--
ALTER TABLE `detalle_proc`
  MODIFY `codi_dpr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT de la tabla `diente`
--
ALTER TABLE `diente`
  MODIFY `codi_die` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `estado_diente`
--
ALTER TABLE `estado_diente`
  MODIFY `codi_edi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `codi_fac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `historial_enf`
--
ALTER TABLE `historial_enf`
  MODIFY `codi_hie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT de la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  MODIFY `codi_his` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT de la tabla `historial_proc`
--
ALTER TABLE `historial_proc`
  MODIFY `codi_hip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `cod_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `codi_med` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  MODIFY `codi_odo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `codi_pac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `cod_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `placa`
--
ALTER TABLE `placa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `id_presupuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `presupuesto_detalle`
--
ALTER TABLE `presupuesto_detalle`
  MODIFY `id_pres_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  MODIFY `codi_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `codi_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tarifa_proc`
--
ALTER TABLE `tarifa_proc`
  MODIFY `codi_tar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tipo_inventario`
--
ALTER TABLE `tipo_inventario`
  MODIFY `cod_tipo_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codi_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- FIN