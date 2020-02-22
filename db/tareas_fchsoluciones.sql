-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2020 a las 20:02:41
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tareas_fchsoluciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajustes`
--

CREATE TABLE `ajustes` (
  `id` int(7) NOT NULL,
  `servidor_smtp` text NOT NULL,
  `puerto` int(5) NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `email_soporte` text NOT NULL,
  `url_absoluta` text NOT NULL,
  `url_logo` text NOT NULL,
  `envio_correo` char(1) NOT NULL,
  `admin_biblio` int(7) DEFAULT NULL,
  `key_tinypng` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ajustes`
--

INSERT INTO `ajustes` (`id`, `servidor_smtp`, `puerto`, `usuario`, `password`, `email_soporte`, `url_absoluta`, `url_logo`, `envio_correo`, `admin_biblio`, `key_tinypng`) VALUES
(1, 'mail.ficachi.mx', 26, 'inpc_tcambiodolar@ficachi.mx', 'inpct1510*/', 'victor_aldan@hotmail.com', 'http://ficachi.com.mx', 'http://ficachi.com.mx/mipanel/assets/img/logo.png', '1', 1, 'lIm_DoDShrsTiHIXgqPgRR1vL6oXIzt7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(7) NOT NULL,
  `nombre` text NOT NULL,
  `tipo` char(1) NOT NULL COMMENT 't:tarea, m:minuta',
  `idTareaminuta` int(7) NOT NULL COMMENT 'id de la tarea o la minuta a la que corresponde el archivo',
  `status` char(1) NOT NULL,
  `idUsuario` int(7) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(7) NOT NULL,
  `autor` int(7) NOT NULL,
  `idEmpresa` int(7) NOT NULL,
  `nombre` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `autor`, `idEmpresa`, `nombre`, `status`, `registro`) VALUES
(1, 1, 1, 'luis zarco', '1', '2020-01-24 02:55:03'),
(2, 1, 1, 'cesar cruz', '1', '2020-01-24 02:55:03'),
(3, 1, 1, 'esteban olmos', '1', '2020-01-24 02:55:03'),
(4, 1, 118, 'cesar', '1', '2020-01-24 03:07:29'),
(5, 1, 118, 'luciano', '1', '2020-01-24 03:07:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(7) NOT NULL,
  `empresa` text NOT NULL,
  `idGrupoemp` int(7) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edicion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `empresa`, `idGrupoemp`, `status`, `registro`, `edicion`) VALUES
(0, 'OTRA', 0, '1', '2019-11-17 20:08:30', '0000-00-00 00:00:00'),
(1, 'CONTINO FOTO', 3, '1', '2019-09-15 20:09:07', '0000-00-00 00:00:00'),
(2, 'FICACHI ASOCIADOS', 2, '1', '2019-09-15 20:09:28', '0000-00-00 00:00:00'),
(3, 'CONTINO SISTEMAS', 3, '1', '2019-09-15 20:09:57', '0000-00-00 00:00:00'),
(118, 'CORPORATIVO NAD GLOBAL', 4, '1', '2019-09-28 04:05:42', '0000-00-00 00:00:00'),
(120, 'CORPORATIVO GRUVER', 5, '1', '2019-09-28 04:10:16', '0000-00-00 00:00:00'),
(121, 'CORPORATIVO GILGA', 1, '1', '2019-09-28 04:10:33', '0000-00-00 00:00:00'),
(122, 'CORPORATIVO CONTINO', 3, '1', '2019-09-28 04:11:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresacolaborador`
--

CREATE TABLE `empresacolaborador` (
  `id` int(7) NOT NULL,
  `idEmpresa` int(7) NOT NULL,
  `idUsuario` int(7) NOT NULL,
  `autor` int(7) NOT NULL COMMENT 'idUsuario',
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresacolaborador`
--

INSERT INTO `empresacolaborador` (`id`, `idEmpresa`, `idUsuario`, `autor`, `registro`) VALUES
(1, 118, 77, 1, '2020-01-24 03:07:29'),
(2, 118, 766, 1, '2020-01-24 03:07:29'),
(3, 118, 1016, 1, '2020-01-24 03:07:29'),
(4, 118, 1, 1, '2020-01-24 03:07:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupoemp`
--

CREATE TABLE `grupoemp` (
  `id` int(7) NOT NULL,
  `grupo` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edicion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupoemp`
--

INSERT INTO `grupoemp` (`id`, `grupo`, `status`, `registro`, `edicion`) VALUES
(0, 'OTRO', '1', '2019-11-17 20:01:59', '0000-00-00 00:00:00'),
(1, 'GILGA', '1', '2019-08-09 03:01:15', '0000-00-00 00:00:00'),
(2, 'FICACHI', '1', '2019-08-09 03:02:51', '0000-00-00 00:00:00'),
(3, 'CONTINO', '1', '2019-08-09 03:08:16', '0000-00-00 00:00:00'),
(4, 'NAD GLOBAL', '1', '2019-08-09 03:08:51', '0000-00-00 00:00:00'),
(5, 'GRUVER', '1', '2019-08-09 03:09:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `involucrados`
--

CREATE TABLE `involucrados` (
  `id` int(7) NOT NULL,
  `idTarea` int(7) NOT NULL,
  `idUsuario` int(7) NOT NULL,
  `tipo` char(1) NOT NULL COMMENT 't:tarea, s:subtarea'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `involucrados`
--

INSERT INTO `involucrados` (`id`, `idTarea`, `idUsuario`, `tipo`) VALUES
(1, 1, 77, 't'),
(2, 1, 965, 't'),
(3, 1, 766, 't'),
(4, 1, 903, 't'),
(5, 1, 1016, 't'),
(6, 1, 814, 't'),
(7, 1, 809, 't'),
(8, 1, 968, 't'),
(9, 2, 965, 't'),
(10, 2, 1016, 't'),
(11, 3, 903, 't'),
(12, 4, 903, 't'),
(13, 5, 965, 't'),
(14, 6, 786, 't'),
(15, 7, 965, 't'),
(16, 8, 766, 't'),
(17, 9, 766, 't');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(7) NOT NULL,
  `iduser` int(7) NOT NULL,
  `ip` text NOT NULL,
  `host` text NOT NULL,
  `puerto` text NOT NULL,
  `navegador` text NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `iduser`, `ip`, `host`, `puerto`, `navegador`, `registro`) VALUES
(0, 1, '::1', '', '50721', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-03 22:14:36'),
(0, 1, '::1', '', '50820', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-03 22:16:02'),
(0, 1, '::1', '', '50863', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-03 22:16:27'),
(0, 1, '::1', '', '50961', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-03 22:18:08'),
(0, 1, '::1', '', '51309', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-03 22:23:43'),
(0, 1, '::1', '', '51381', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-03 22:24:48'),
(0, 1, '::1', '', '51381', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-03 22:24:54'),
(0, 1, '::1', '', '56624', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-04 00:35:19'),
(0, 1, '::1', '', '58784', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-04 17:14:41'),
(0, 1, '::1', '', '60432', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-04 21:18:45'),
(0, 1, '::1', '', '61850', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-04 22:52:14'),
(0, 1, '::1', '', '57737', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', '2019-06-05 20:40:24'),
(0, 1, '::1', '', '56619', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '2019-06-06 18:33:05'),
(0, 1, '::1', '', '50140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '2019-06-07 03:17:23'),
(0, 1, '::1', '', '51754', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '2019-06-07 18:29:47'),
(0, 1, '::1', '', '52128', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '2019-06-07 19:58:12'),
(0, 1, '192.168.0.111', '', '44915', 'Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Mobile Safari/537.36', '2019-06-07 20:53:41'),
(0, 1, '::1', '', '62096', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '2019-06-10 00:24:35'),
(0, 1, '::1', '', '65069', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '2019-06-10 18:46:04'),
(0, 1, '::1', '', '65089', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '2019-06-10 18:48:25'),
(0, 1, '::1', '', '52601', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '2019-06-12 23:53:35'),
(0, 1, '::1', '', '61484', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.90 Safari/537.36', '2019-06-14 00:02:34'),
(0, 1, '::1', '', '53050', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.90 Safari/537.36', '2019-06-14 20:21:10'),
(0, 1, '::1', '', '49673', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.90 Safari/537.36', '2019-06-14 21:43:26'),
(0, 1, '::1', '', '49880', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.90 Safari/537.36', '2019-06-15 00:15:18'),
(0, 1, '::1', '', '53726', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.90 Safari/537.36', '2019-06-15 21:29:32'),
(0, 1, '::1', '', '64532', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.90 Safari/537.36', '2019-06-16 18:49:42'),
(0, 1, '::1', '', '55746', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.90 Safari/537.36', '2019-06-16 22:27:01'),
(0, 1, '::1', '', '64731', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-18 21:10:55'),
(0, 1, '::1', '', '49405', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-18 21:54:19'),
(0, 1, '::1', '', '52147', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-20 18:07:51'),
(0, 1, '::1', '', '55621', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-21 20:03:13'),
(0, 1, '::1', '', '64126', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-22 23:16:39'),
(0, 1, '::1', '', '55134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-23 21:28:45'),
(0, 1, '::1', '', '55263', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-23 21:43:26'),
(0, 1, '::1', '', '56678', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-23 23:10:34'),
(0, 1, '::1', '', '58916', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-23 23:41:43'),
(0, 1, '::1', '', '59060', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-23 23:43:53'),
(0, 1, '::1', '', '53115', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-24 19:10:57'),
(0, 1, '::1', '', '60104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-25 20:52:06'),
(0, 1, '::1', '', '60165', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-25 20:59:58'),
(0, 1, '::1', '', '64776', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-06-29 18:16:25'),
(0, 1, '::1', '', '59514', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-03 01:47:23'),
(0, 1, '::1', '', '51929', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-04 01:00:50'),
(0, 1, '::1', '', '53902', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-04 19:43:16'),
(0, 1, '::1', '', '58309', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-04 21:20:40'),
(0, 1, '::1', '', '58309', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-04 21:20:43'),
(0, 1, '::1', '', '60110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-04 22:12:13'),
(0, 1, '::1', '', '51937', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-06 00:45:35'),
(0, 1, '::1', '', '54894', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-14 03:06:29'),
(0, 1, '::1', '', '50057', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-14 19:19:02'),
(0, 1, '::1', '', '51995', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', '2019-07-15 20:49:46'),
(0, 1, '::1', '', '50845', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '2019-07-23 21:26:07'),
(0, 1, '::1', '', '58947', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '2019-07-24 20:13:24'),
(0, 1, '192.168.0.116', '', '52130', 'Mozilla/5.0 (Linux; NetCast; U) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/53.0.2785.34 Safari/537.31 SmartTV/6.0', '2019-07-29 20:08:45'),
(0, 1, '::1', '', '54382', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '2019-08-08 17:49:04'),
(0, 1, '::1', '', '57055', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-09 02:31:11'),
(0, 1, '::1', '', '60510', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-10 19:49:26'),
(0, 1, '::1', '', '63989', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-12 18:48:35'),
(0, 1, '::1', '', '50082', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-14 20:34:36'),
(0, 1, '::1', '', '51972', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-18 21:19:43'),
(0, 1, '::1', '', '52904', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-18 22:28:45'),
(0, 1, '::1', '', '55441', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-18 23:26:12'),
(0, 1, '::1', '', '50152', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-19 18:00:24'),
(0, 1, '::1', '', '52924', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-22 18:12:20'),
(0, 1, '::1', '', '50367', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-23 18:38:33'),
(0, 1, '::1', '', '51107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '2019-08-25 18:49:42'),
(0, 1, '::1', '', '62473', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-08-31 16:34:21'),
(0, 1, '::1', '', '53580', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-10 20:51:39'),
(0, 1, '::1', '', '56367', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-11 00:25:48'),
(0, 1, '::1', '', '54117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-13 17:44:51'),
(0, 1, '::1', '', '54128', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-13 17:45:21'),
(0, 1, '::1', '', '59551', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-14 21:17:34'),
(0, 1, '::1', '', '49918', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-15 19:56:59'),
(0, 1, '::1', '', '53089', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-16 16:39:58'),
(0, 1, '::1', '', '54073', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-16 17:14:37'),
(0, 1, '::1', '', '59754', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-17 17:59:24'),
(0, 1, '::1', '', '53516', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-18 02:25:55'),
(0, 1, '::1', '', '54239', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-19 21:43:39'),
(0, 1, '::1', '', '57133', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-20 02:12:26'),
(0, 1, '::1', '', '57954', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-20 19:42:58'),
(0, 1, '::1', '', '53797', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-23 21:22:07'),
(0, 1, '::1', '', '61088', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-24 18:25:03'),
(0, 1, '::1', '', '61244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-25 15:56:29'),
(0, 1, '::1', '', '53907', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-26 16:53:57'),
(0, 1, '::1', '', '61556', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-27 16:16:17'),
(0, 1, '::1', '', '58768', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-30 20:41:17'),
(0, 1, '::1', '', '65037', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-01 23:08:53'),
(0, 1, '::1', '', '53483', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-02 22:03:19'),
(0, 1, '::1', '', '64914', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-04 18:12:11'),
(0, 1, '::1', '', '65236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-04 19:23:04'),
(0, 1, '::1', '', '50489', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-06 22:58:20'),
(0, 1, '::1', '', '61706', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-08 18:14:09'),
(0, 1, '::1', '', '64566', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-08 21:45:24'),
(0, 1, '::1', '', '51895', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-09 18:18:21'),
(0, 1, '::1', '', '53768', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-10 14:49:39'),
(0, 1, '::1', '', '61194', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-10 18:46:35'),
(0, 1, '::1', '', '60845', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-12 01:18:23'),
(0, 1, '::1', '', '56334', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-14 21:41:47'),
(0, 1, '::1', '', '62651', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-15 19:11:58'),
(0, 1, '::1', '', '53320', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-16 21:44:03'),
(0, 1, '::1', '', '56164', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-17 15:46:58'),
(0, 1, '::1', '', '64273', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-17 21:56:09'),
(0, 1, '::1', '', '60367', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-20 17:15:41'),
(0, 1, '::1', '', '62863', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-21 03:17:27'),
(0, 1, '::1', '', '54272', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '2019-10-24 01:03:45'),
(0, 1, '::1', '', '65021', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '2019-10-24 23:49:36'),
(0, 1, '::1', '', '50460', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '2019-10-28 16:47:21'),
(0, 1, '::1', '', '50450', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '2019-10-31 20:15:40'),
(0, 1, '::1', '', '52272', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', '2019-11-09 18:58:31'),
(0, 1, '::1', '', '55596', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', '2019-11-12 18:06:55'),
(0, 1, '::1', '', '57902', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-11-18 21:19:02'),
(0, 1, '::1', '', '61204', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-11-19 20:03:39'),
(0, 1, '::1', '', '63849', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-11-20 21:13:16'),
(0, 1, '::1', '', '54606', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-11-21 22:51:01'),
(0, 1, '::1', '', '57272', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-11-27 20:03:20'),
(0, 1, '::1', '', '59431', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-11-29 23:07:40'),
(0, 1, '::1', '', '65202', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-11-30 23:06:27'),
(0, 1, '::1', '', '50152', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-12-02 20:13:06'),
(0, 1, '::1', '', '60182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-12-03 23:54:23'),
(0, 1, '::1', '', '60500', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-12-04 17:26:44'),
(0, 1, '::1', '', '62838', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', '2019-12-05 20:27:54'),
(0, 1, '::1', '', '53109', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '2019-12-13 22:48:58'),
(0, 1, '::1', '', '49680', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '2019-12-14 04:20:09'),
(0, 1, '::1', '', '50617', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '2019-12-15 20:07:57'),
(0, 1, '::1', '', '53484', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '2019-12-16 19:54:07'),
(0, 1, '::1', '', '56120', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '2019-12-17 22:44:50'),
(0, 1, '::1', '', '58197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/18.17763', '2019-12-25 20:47:03'),
(0, 1, '::1', '', '58576', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '2019-12-25 21:04:41'),
(0, 1, '::1', '', '58608', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '2020-01-03 20:17:03'),
(0, 1, '::1', '', '60327', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '2020-01-04 18:37:49'),
(0, 1, '::1', '', '50759', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '2020-01-07 20:52:20'),
(0, 1, '::1', '', '62284', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', '2020-01-11 18:43:41'),
(0, 1, '::1', '', '52247', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', '2020-01-16 18:18:08'),
(0, 1, '::1', '', '54897', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', '2020-01-19 22:11:43'),
(0, 1, '::1', '', '49969', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', '2020-01-24 02:28:02'),
(0, 1, '::1', '', '52697', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '2020-01-25 15:42:17'),
(0, 1, '::1', '', '53106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '2020-01-25 18:14:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `minutas`
--

CREATE TABLE `minutas` (
  `id` int(7) NOT NULL,
  `autor` int(7) NOT NULL,
  `cliente` int(7) NOT NULL,
  `empresa` int(7) NOT NULL,
  `proyecto` text NOT NULL,
  `tema` text NOT NULL,
  `comentarios` text NOT NULL,
  `tipo` char(1) NOT NULL COMMENT 'R:Reunión, T:Trabajo, O:Otro',
  `lugar` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edicion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `minutas`
--

INSERT INTO `minutas` (`id`, `autor`, `cliente`, `empresa`, `proyecto`, `tema`, `comentarios`, `tipo`, `lugar`, `status`, `registro`, `edicion`) VALUES
(2, 1, 4, 118, 'prueba', 'test hora', 'contenido por ejemplo', 'R', 'oficina restaurant', '1', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtareas`
--

CREATE TABLE `subtareas` (
  `id` int(7) NOT NULL,
  `titulo` text NOT NULL,
  `idTarea` int(7) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `responsable` int(7) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edicion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(7) NOT NULL,
  `idMinuta` int(7) DEFAULT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `autor` int(7) NOT NULL COMMENT 'idUsuario',
  `etiqueta` text NOT NULL,
  `solicitante` text NOT NULL,
  `cliente` int(7) NOT NULL,
  `prioridad` char(1) NOT NULL COMMENT 'A, B, C',
  `responsable` int(7) NOT NULL COMMENT 'idUsuario',
  `fecha_entrega` date NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) NOT NULL DEFAULT '1',
  `edicion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `idMinuta`, `titulo`, `descripcion`, `autor`, `etiqueta`, `solicitante`, `cliente`, `prioridad`, `responsable`, `fecha_entrega`, `registro`, `status`, `edicion`) VALUES
(1, NULL, 'Tarea como responsable', 'primer tarea insertada, creada', 1, 'test,prueba,tarea1,nueva', '', 120, 'C', 1, '0000-00-00', '2020-01-20 22:50:14', '1', NULL),
(2, NULL, 'prueba 1', 'hola', 1, 'fsdfsdsdf,sdfsdfsd,jghjkkkghjk', 'pedro', 121, 'A', 1, '2020-02-13', '2020-02-08 17:39:25', '1', NULL),
(3, NULL, 'stsgsdfg', ',nm,nm,nm,nm,', 1, 'vbcvbcvbcv', 'gdfgdf', 121, 'A', 1, '2020-02-27', '2020-02-08 18:34:31', '1', NULL),
(4, NULL, 'vxcvxc', 'n,nm,n,nm,n', 1, '', 'cvxcvx', 118, 'A', 1, '2020-02-25', '2020-02-08 18:36:37', '1', NULL),
(5, NULL, 'gsdfgdfg', 'dgdfgdfgdf', 1, 'xcvxcxcv', 'fdgdfgdfg', 1, 'A', 1, '2020-02-05', '2020-02-08 18:45:06', '1', NULL),
(6, NULL, 'czxczxczxc', 'mbnmbnmbnmbmbn', 1, 'bnmbnmnbmbn', 'zxczxcz', 120, 'A', 1, '2020-03-07', '2020-02-08 18:48:13', '1', NULL),
(7, NULL, 'bnmbnm', 'ghfghfghfgfg', 1, 'xcvxcvxcvxc', 'bnmbnmb', 118, 'A', 1, '2020-03-07', '2020-02-08 18:49:04', '1', NULL),
(8, NULL, 'cvbcvbc', 'xfsdfsdfsdfsdf', 1, 'xcvxcvxcvxcv', 'vbnvbn', 120, 'A', 1, '2020-02-29', '2020-02-08 18:54:12', '1', NULL),
(9, NULL, 'cvbcvbc', 'xfsdfsdfsdfsdf', 1, 'xcvxcvxcvxcv', 'vbnvbn', 120, 'A', 1, '2020-02-29', '2020-02-08 18:56:07', '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(7) NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `cumpleanios` date DEFAULT NULL,
  `idEmpresa` int(7) DEFAULT NULL,
  `idGrupo` int(7) DEFAULT NULL,
  `depto` text,
  `cargo` text,
  `status` int(1) NOT NULL DEFAULT '1',
  `genero` char(1) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `imagen` text,
  `jefe` int(7) DEFAULT NULL COMMENT 'id del jefe inmediato',
  `nivel` char(2) NOT NULL COMMENT 'N1:Presidente, N2:Gerente, N3:Subgerente, N4:Colaborador, N5:Auxiliar',
  `tipo` char(1) NOT NULL COMMENT '1:Superadmin, 2:Administrador, 3:Colaborador',
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edicion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `cumpleanios`, `idEmpresa`, `idGrupo`, `depto`, `cargo`, `status`, `genero`, `email`, `password`, `imagen`, `jefe`, `nivel`, `tipo`, `registro`, `edicion`) VALUES
(1, 'Víctor Daniel', 'Puch Sánchez', '2020-07-12', 2, 2, 'INFORMATICA', 'Desarrollo Web', 1, 'H', 'vpuch@ficachi.com.mx', 'c2fc027255140b506a839a95f0b5ce22', 'man.gif', 111, 'N5', '1', '2019-06-03 20:09:55', '2020-02-09 00:34:24'),
(64, 'Lourdes ', 'Ale Rosado', '2017-09-27', 1, 2, 'ADMINISTRATIVO', 'Asistente', 1, 'M', 'lale@ficachi.com.mx', 'b81c1fdb33e41f6174b454ea7b6478af', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2017-11-08 13:20:18'),
(65, 'María Isabel ', ' Hernández Amaya', '2018-07-11', 1, 2, 'ADMINISTRATIVO', 'GERENTE ADMINISTRATIVO', 1, 'M', 'mhernandez@ficachi.com.mx', 'eeb5135e8c412187f438bfb73483d458', 'woman.gif', 102, 'N2', '3', '2015-03-02 08:15:00', '2019-08-20 08:09:19'),
(66, 'Sofia ', 'Bustamante Carvajal', '0000-00-00', 1, 2, 'ADMINISTRATIVO', 'Auxiliar', 1, 'M', 'sbustamante@ficachi.com.mx', 'f60a3cbe58bef3afbb58bb9fbd1cb756', 'woman.gif', 65, 'N5', '3', '2015-03-02 08:15:00', '2019-08-20 08:16:51'),
(67, 'María Elena ', 'Sinta Cadena', '2018-08-18', 1, 2, 'ADMINISTRATIVO', 'Recepcionista', 1, 'M', 'msinta@ficachi.com.mx', 'a3212ea80362303b08def45406351d6e', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2018-07-06 04:58:55'),
(68, 'Viridiana ', 'Cabrera Zapata', '0000-00-00', 1, 2, 'ADMINISTRATIVO', 'Auxiliar', 1, 'M', 'vzapata@ficachi.com.mx', '10eda5c310662445c439b733c5ee79d8', 'woman.gif', 65, 'N5', '3', '2015-03-02 08:15:00', '2019-08-20 08:17:27'),
(69, 'Celia ', 'Rojas Velazquez', '2016-08-03', 1, 2, 'AUDITORIA', '', 1, 'M', 'crojas@ficachi.com.mx', '4c12af509333822c4e52a7806edabb05', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2016-11-02 16:29:50'),
(72, 'Marcos ', 'Ochoa Maldonado', '0000-00-00', 1, 2, 'AUDITORIA', 'ENCARGADO', 1, 'H', 'mochoa@ficachi.com.mx', 'e54b5c5b5402e309d0df079628efa399', 'man.gif', 74, 'N3', '3', '2015-03-02 08:15:00', '2019-08-19 04:48:43'),
(73, 'Maylet ', 'Aguilar Roman', '2017-10-11', 1, 2, 'CONTABILIDAD', 'ENCARGADA', 1, 'M', 'maguilar@ficachi.com.mx', '425f331c3ed20ac82afab97c112bbc16', 'woman.gif', 77, 'N3', '3', '2015-03-02 08:15:00', '2019-08-19 04:41:38'),
(74, 'Norberto ', 'Barreda López', '2018-06-12', 1, 2, 'AUDITORIA', 'Gerente', 1, 'H', 'nbarreda@ficachi.com.mx', 'da4a9bda18b0df335283999970fed55b', 'man.gif', 102, 'N2', '3', '2015-03-02 08:15:00', '2019-08-19 04:35:44'),
(75, 'Edith ', 'Rodal Camargo', '2017-06-06', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'erodal@ficachi.com.mx', 'a4de01bd58fa82efb759326098f23e2a', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2017-11-08 13:17:28'),
(77, 'Aidee ', 'López Peña', '0000-00-00', 1, 2, 'CONTABILIDAD', ' Gerente', 1, 'M', 'alopez@ficachi.com.mx', '3597de6cc5ddd6e45eb539f98e3f018f', 'woman.gif', 102, 'N2', '3', '2015-03-02 08:15:00', '2019-10-22 06:32:49'),
(79, 'Evelyn ', 'Fernandez Besiche', '2018-09-01', 1, 2, 'CONTABILIDAD', 'Encargado', 1, 'M', 'efernandez@ficachi.com.mx', '150dec31f861c3a0cc2aa4d13825c894', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2018-05-18 12:55:21'),
(80, 'Gregorio ', 'Espinosa Dominguez', '2018-10-11', 1, 2, 'CONTABILIDAD', 'Encargado', 1, 'H', 'gespinosa@ficachi.com.mx', '9c24559163d5ad35805729abaf34c828', 'man.gif', 81, 'N3', '3', '2015-03-02 08:15:00', '2019-08-19 04:39:24'),
(81, 'Irma ', 'Abad Esteva', '0000-00-00', 1, 2, 'CONTABILIDAD', 'Encargado', 1, 'M', 'iabad@ficachi.com.mx', '4d600da2c2e23893850c52bcd7a10a6f', 'woman.gif', 102, 'N2', '3', '2015-03-02 08:15:00', '2019-08-19 04:33:38'),
(83, 'Cinthya Milagros ', ' López Gutierrez', '2017-10-20', 1, 2, 'CONTABILIDAD', 'Encargado', 1, 'M', 'clopez@ficachi.com.mx', '70aa6f5e2c475ab6a2e70f9abf662c42', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2017-11-08 13:17:10'),
(85, 'María del Pilar ', 'Cruz Vargas', '2014-01-25', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'mcruz@ficachi.com.mx', '2417ffcb04886fad8a12c5e90e341b54', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '0000-00-00 00:00:00'),
(86, 'María Belen ', ' Peña Polo', '2015-11-05', 1, 2, 'CONTABILIDAD', 'Encargado', 1, 'M', 'mpena@ficachi.com.mx', '2a24dbe7a17a3ef55d39ca649a06677b', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2015-06-15 16:09:56'),
(88, 'Celeste ', 'Prieto Contreras', '2017-12-27', 1, 2, 'CONTABILIDAD', 'Encargado', 1, 'M', 'cprietoc@ficachi.com.mx', 'fc86b98fdc632626c1b183c356897900', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2017-11-08 13:18:14'),
(89, 'Fidel Angel ', 'Reyes Flores', '2017-10-04', 1, 2, 'CONTABILIDAD', 'Encargado', 1, 'H', 'freyes@ficachi.com.mx', '874703242bc2e3cd5c08945298b1a109', 'man.gif', 81, 'N3', '3', '2015-03-02 08:15:00', '2019-08-19 04:39:00'),
(90, 'Guadalupe ', ' Ramos Flores', '2018-12-07', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'gramos@ficachi.com.mx', 'ccb02a2ed32bf9ecd35753a1991cff39', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2018-01-23 08:52:23'),
(91, 'Guadalupe ', 'Salinas Alvarado', '2017-11-29', 1, 2, 'CONTABILIDAD', 'Auxiliar Contable', 1, 'M', 'gsalinas@ficachi.com.mx', '49eaed72312f6b019c1cbb6ffe36e08a', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2017-01-24 15:30:21'),
(93, 'Julio Cesar ', 'Contreras Romero', '0000-00-00', 1, 2, 'CONTABILIDAD', 'Encargado', 1, 'H', 'jcontreras@ficachi.com.mx', 'b84be6d01a38d0985969033fc0aed706', 'man.gif', 77, 'N3', '3', '2015-03-02 08:15:00', '2019-08-19 04:40:06'),
(95, 'Miguel Angel ', ' Lagunes Martinez', '0000-00-00', 1, 2, 'CONTABILIDAD', 'ENCARGADO', 1, 'H', 'mlagunes@ficachi.com.mx', '8e0982449bc6fe4826e9ab872a55db41', 'man.gif', 74, 'N3', '3', '2015-03-02 08:15:00', '2019-08-19 04:49:38'),
(97, 'Salomon ', ' López López', '2018-01-28', 1, 2, '', 'Encargado', 1, 'H', 'slopezz@ficachi.com.mx', '5c34d6fd14efee43302e2ca70fe722a4', 'man.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2018-06-06 11:43:39'),
(99, 'Claudia ', 'Hernandez González', '2018-07-11', 1, 2, 'CONTABILIDAD', 'Auxiliar', 1, 'M', 'clhernandez@ficachi.com.mx', '68b563ce2ca1d4f6451358868064d2e8', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2018-09-28 17:03:20'),
(100, 'Thalia ', 'Ficachi Trujillo', '2015-01-09', 1, 2, 'CONTABILIDAD', 'Auxiliar', 1, 'M', 'tficachi@ficachi.com.mx', '5a37398955adf970dbd1436d7e6bc5df', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2015-06-02 16:19:36'),
(102, 'Oswaldo ', ' Ficachi ', '2016-08-19', 1, 2, 'DIRECTOR', 'Director General', 1, 'H', 'oficachi@ficachi.com.mx', '65699726a3c601b9f31bf04019c8593c', 'man.gif', 0, 'N1', '3', '2015-03-02 08:15:00', '2016-06-09 16:19:01'),
(104, 'Marisel ', 'Gómez Zuñiga', '2015-02-13', 1, 2, 'FISCAL', 'Gerente', 1, 'M', 'mgomez@ficachi.com.mx', '666b03d08019e3058ec74e3a6743122e', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2015-12-23 18:54:40'),
(105, 'Edith ', 'Carrillo Mendez', '2015-11-17', 1, 2, 'FISCAL', 'Gerente', 1, 'M', 'ecarrillo@ficachi.com.mx', 'c3c84b34e99e5510500cacd9bcee5678', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2015-09-15 13:42:30'),
(106, 'Jessica ', ' Rodriguez Najera', '2017-06-19', 1, 2, 'FISCAL', 'FISCAL', 1, 'M', 'jrodriguez@ficachi.com.mx', '2cb81a903c7c259bd5d28552b90654dd', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2017-11-08 13:19:25'),
(107, 'María Elena ', 'Espinosa Duran', '2017-08-10', 1, 2, 'FISCAL', '', 1, 'M', 'mespinosa@ficachi.com.mx', '5cd9de4b65f8cc7249fbed48b4a658d9', 'woman.gif', 0, 'N4', '3', '2015-03-02 08:15:00', '2017-11-08 13:21:15'),
(110, 'Joaquin ', 'Arroniz García', '2015-06-19', 1, 2, 'INFORMATICA', 'Gerente', 1, 'H', 'jarroniz@ficachi.com.mx', 'd866d6aabcd84c2661602334c50e1bd2', 'man.gif', 102, 'N2', '2', '2015-03-02 08:15:00', '2015-08-12 15:06:53'),
(111, 'Pablo ', 'Sánchez ', '2001-11-30', 1, 2, 'INFORMATICA', 'ENCARGADO', 1, 'H', 'psanchez@ficachi.com.mx', '579170a55eb64e65b7bdc1eede5d5faf', 'man.gif', 110, 'N3', '2', '2019-08-12 20:28:18', '2019-08-19 04:42:14'),
(745, 'María Fernanda ', 'Rodriguez Alfonsín', '2016-11-16', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'frodriguez@ficachi.com.mx', '7c7b260f20c4e8fa97f1d35c16acda13', 'man.gif', 0, 'N4', '3', '2015-07-30 20:16:27', '2016-08-25 16:08:49'),
(766, 'Alejandro ', 'Gutierrez Dominguez', '2017-05-04', 1, 2, 'ADMINISTRATIVO', '', 1, 'H', 'agutierrez@ficachi.com.mx', '72bb4c092b27085a70c69ba88b86dac6', 'man.gif', 0, 'N4', '3', '2016-05-04 14:44:59', '2017-11-17 13:38:47'),
(768, 'María del Lourdes ', 'Lamothe Ale', '2016-04-03', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'llamothe@ficachi.com.mx', '01152855eec03f714ad3585ca5a44519', 'woman.gif', 0, 'N4', '3', '2016-05-25 16:19:12', '2016-06-24 13:46:39'),
(770, 'Fernando ', 'Ficachi ', '2016-09-22', 1, 2, 'FISCAL', '', 1, 'H', 'fficachi@ficachi.com.mx', '02aed57e9d06de992daf3815445bc988', 'man.gif', 0, 'N4', '3', '2016-06-08 14:49:05', '2016-06-09 21:36:47'),
(778, 'Yomara Gisel ', 'Romero Loyo', '2018-02-05', 1, 2, 'FISCAL', 'ENCARGADA', 1, 'M', 'yromero@ficachi.com.mx', '7aaa27129672945445e00c0e981b311c', 'woman.gif', 0, 'N4', '3', '2016-09-14 13:46:40', '2018-08-21 09:02:38'),
(781, 'Gustavo ', 'Lamothe Ale', '2018-02-22', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'glamothe@ficachi.com.mx', '3bbb4d253361ea6dc23b6558ca42a883', 'man.gif', 0, 'N4', '3', '2016-12-23 16:56:20', '2018-07-26 06:35:21'),
(785, 'Pedro Jovanni Jovanni ', 'Calderon Jimenez', '2017-10-23', 1, 2, 'AUDITORIA', 'Auxiliar de auditoria', 1, 'H', 'pcalderon@ficachi.com.mx', '033a508ebd8740d27892006a0750e4cc', 'man.gif', 0, 'N4', '3', '2017-03-13 16:28:28', '2017-11-01 06:55:30'),
(786, 'Mayra ', 'Jimenez Palacios', '2018-08-06', 1, 2, 'CONTABILIDAD', 'Auxiliar', 1, 'M', 'mjimenez@ficachi.com.mx', 'a7b898cd4c6516848a709c525eb50e30', 'woman.gif', 0, 'N4', '3', '2017-03-25 16:42:32', '2018-01-06 09:44:40'),
(806, 'Kenneth Josué ', 'Fabián Hernández', '2017-02-13', 1, 2, 'CONTABILIDAD', 'AUXILIAR', 1, 'H', 'kfabian@ficachi.com.mx', 'b1c1d74cf3e3029e1809092a38a3cc68', 'man.gif', 0, 'N4', '3', '2017-05-13 04:15:36', '2017-09-15 11:07:56'),
(809, 'Araceli ', 'Pagueros Utrera', '2017-01-01', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'apegueros@ficachi.com.mx', '71086f6989616f1dedf3c8b04c18c039', 'woman.gif', 0, 'N4', '3', '2017-07-13 19:56:23', '0000-00-00 00:00:00'),
(810, 'Hilda ', 'Durán Márquez', '2017-01-02', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'hduran@ficachi.com.mx', '1dbbe65fbdba674cb98a0c6098606bec', 'woman.gif', 0, 'N4', '3', '2017-07-13 19:58:12', '2017-07-28 03:06:07'),
(812, 'José Armando ', 'Sánchez Temis', '2017-10-01', 1, 2, 'CONTABILIDAD', 'Auxiliar Contable', 1, 'H', 'jasanchez@ficachi.com.mx', 'f2a38ee70173d84d4792aa13c280384b', 'man.gif', 0, 'N4', '3', '2017-07-27 21:22:28', '2017-08-18 15:44:17'),
(814, 'Angeles ', 'Hueto Hernández', '2018-03-24', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'ahueto@ficachi.com.mx', 'bf2c7b60cc7b8cd2c5254ce737323207', 'man.gif', 0, 'N4', '3', '2017-08-26 14:40:19', '2018-06-20 09:53:06'),
(816, 'Jacqueline ', 'Meneses Ramos', '2017-05-25', 1, 2, 'CONTABILIDAD', 'Auxiliar Contable', 1, 'H', 'jmeneses@ficachi.com.mx', '334a129df2ab84a5daddd0bbeeb3ef4a', 'man.gif', 0, 'N4', '3', '2017-09-04 14:52:03', '2017-09-09 12:11:10'),
(817, 'Damian ', 'Ruíz Luna', '2018-08-30', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'druiz@ficachi.com.mx', '335b1ead7ae096cd62cd87ae6cfdbdee', 'man.gif', 0, 'N4', '3', '2017-09-07 15:10:00', '2018-02-20 06:30:28'),
(818, 'Cristian ', 'Melendez santiago', '2017-05-17', 1, 2, 'CONTABILIDAD', 'Auxiliar Contable', 1, 'H', 'cmelendez@ficachi.com.mx', '062d2a10fe8751ce6f61dd72eb1b643a', 'man.gif', 0, 'N4', '3', '2017-09-25 14:32:36', '2017-10-13 05:41:59'),
(819, 'Carlos Jesús ', 'Loaiza Gutierrez', '2017-05-18', 1, 2, 'INFORMATICA', '', 1, 'H', 'cloaiza@ficachi.com.mx', 'b93c52617c66f0d2170e0cb953cb0d9e', 'man.gif', 0, 'N4', '3', '2017-09-27 13:51:13', '0000-00-00 00:00:00'),
(838, 'Uriel ', 'Herrera Flores', '2018-08-29', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'uherrera@ficachi.com.mx', '943650e05a04abdfcaf8455f57559490', 'man.gif', 0, 'N4', '3', '2018-01-22 16:20:35', '0000-00-00 00:00:00'),
(896, 'Marisol ', 'Murillo ', '2019-01-02', 1, 2, 'LEGAL', '', 1, 'H', 'mmurillo@ficachi.com.mx', 'aac7a6417504fdd3475c1c026c19aec1', 'man.gif', 0, 'N4', '3', '2018-03-20 14:46:12', '2019-02-05 22:18:51'),
(898, 'Gabriel Eduardo ', 'Prieto Rubio', '0000-00-00', 1, 2, 'INFORMATICA', 'AUXILIAR', 1, 'H', 'gprieto@ficachi.com.mx', '15828412396b727ee60152055d0688b8', 'man.gif', 111, 'N4', '2', '2018-04-11 21:04:09', '2019-08-19 04:46:18'),
(902, 'David ', 'Calatayud Mercado', '2018-12-18', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'dcalatayud@ficachi.com.mx', '1c3630b8dec926f7ffba90d07c144987', 'man.gif', 0, 'N4', '3', '2018-06-01 18:06:58', '2018-06-09 05:39:01'),
(903, 'Ana Lizbeth ', 'Coto Chaga', '2018-05-13', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'acoto@ficachi.com.mx', '9e0ef03eb92b85e404b940e592a43436', 'man.gif', 0, 'N4', '3', '2018-06-05 14:43:20', '2018-09-17 14:52:59'),
(904, 'Lissette ', 'Herrera Hernández', '2019-10-22', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'lherrera@ficachi.com.mx', '4eac4d3f4e1cb77344853fa4eeefc7b5', 'woman.gif', 0, 'N4', '3', '2018-06-07 14:03:20', '2019-03-11 22:02:24'),
(905, 'Zarina Marlene ', 'Lino González', '2018-11-28', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'zlino@ficachi.com.mx', 'faa2cf0ba2aca1071add31962cbada2d', 'woman.gif', 0, 'N4', '3', '2018-06-07 14:04:07', '2018-10-12 15:03:38'),
(949, 'Teresa ', 'Rosales cortes', '2018-09-15', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'trosales@ficachi.com.mx', '3383a1a828ac605b641751392019d3af', 'woman.gif', 0, 'N4', '3', '2018-08-02 17:29:36', '2018-11-22 03:59:51'),
(952, 'Juan ', 'Guevara Santos', '2019-10-19', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'jguevara@ficachi.com.mx', '22be058b120cea6023537f01c105cba8', 'man.gif', 0, 'N4', '3', '2018-08-28 13:44:56', '2019-01-05 05:58:42'),
(953, 'Karina Lizbeth ', 'Rosas Delgado', '2018-07-09', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'krosas@ficachi.com.mx', 'd061bc55139f9961353c1cc79cff764e', 'woman.gif', 0, 'N4', '3', '2018-08-28 19:27:23', '2018-08-29 17:21:53'),
(965, 'Alan Guillermo ', 'Pérez ', '2018-12-11', 1, 2, 'INFORMATICA', 'AUXILIAR', 1, 'H', 'aperez@ficachi.com.mx', '2dd08e9d650e6808c3d21695a2474a71', 'man.gif', 111, 'N4', '3', '2018-09-21 14:13:03', '2019-08-19 04:47:42'),
(966, 'Veronica ', 'Mendez Hernández', '2018-01-01', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'vmendez@ficachi.com.mx', '653506b7101a9bc32d4d379ef68cab12', 'woman.gif', 0, 'N4', '3', '2018-10-05 14:00:29', '2018-10-05 09:00:46'),
(968, 'Araceli ', 'Belmonte ', '2018-03-20', 1, 2, 'INFORMATICA', '', 1, 'M', 'abelmonte@ficachi.com.mx', '36843126177d211163f43daf566a02b9', 'woman.gif', 0, 'N4', '3', '2018-10-12 19:56:51', '0000-00-00 00:00:00'),
(992, 'Eduardo ', 'Castillo Ruiz', '2019-04-21', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'ecastillo@ficachi.com.mx', 'ca03f66bb4ca269c25cb0bc0c8263057', 'man.gif', 0, 'N4', '3', '2019-01-25 15:41:10', '2019-04-16 19:49:47'),
(993, 'César de Jesús ', 'Castillo Bautista', '2019-01-01', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'ccastillo@ficachi.com.mx', '7d48ef8d5d5138be9fbeccce6823e6a0', 'man.gif', 0, 'N4', '3', '2019-01-25 15:43:16', '2019-01-25 16:18:44'),
(994, 'Miguel Angel ', 'Lara Mendez', '2019-01-01', 1, 2, 'INFORMATICA', '', 1, 'H', 'mlara@ficachi.com.mx', '9c8dd73b8ca4836e04a75c1b3af698fd', 'man.gif', 0, 'N4', '3', '2019-01-25 16:11:02', '0000-00-00 00:00:00'),
(995, 'Josie ', 'Montemayor Fernández', '2019-01-01', 1, 2, 'INFORMATICA', '', 1, 'M', 'jmontemayor@ficachi.com.mx', '9c8dd73b8ca4836e04a75c1b3af698fd', 'woman.gif', 0, 'N4', '3', '2019-01-25 16:20:36', '0000-00-00 00:00:00'),
(996, 'Brenda Karen ', 'Castillo Huerta', '2019-01-01', 1, 2, 'INFORMATICA', '', 1, 'M', 'bcastillo@ficachi.com.mx', '9c8dd73b8ca4836e04a75c1b3af698fd', 'woman.gif', 0, 'N4', '3', '2019-01-25 16:30:10', '0000-00-00 00:00:00'),
(997, 'Juan Eduardo ', 'Licona Guevara', '2019-01-01', 1, 2, 'INFORMATICA', '', 1, 'H', 'jlicona@ficachi.com.mx', '9c8dd73b8ca4836e04a75c1b3af698fd', 'man.gif', 0, 'N4', '3', '2019-01-25 16:31:01', '0000-00-00 00:00:00'),
(998, 'Kelvin ', 'López Bautista', '2019-01-01', 1, 2, 'INFORMATICA', '', 1, 'H', 'klopez@ficachi.com.mx', '9c8dd73b8ca4836e04a75c1b3af698fd', 'man.gif', 0, 'N4', '3', '2019-01-25 16:31:57', '0000-00-00 00:00:00'),
(1012, 'Victor Manuel ', 'Zayas Quijano', '2019-01-01', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'vzayas@ficachi.com.mx', 'b08f117d04603fedac0530ab1d9beea8', 'man.gif', 0, 'N4', '3', '2019-03-08 17:11:08', '0000-00-00 00:00:00'),
(1013, 'Karen ', 'Lara Duran', '2019-01-01', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'klara@ficachi.com.mx', '89c7d9b8cee9315cca3398b3158a07e3', 'woman.gif', 0, 'N4', '3', '2019-03-09 16:20:10', '0000-00-00 00:00:00'),
(1015, 'Germán ', 'Fernández Álvarez', '2019-01-01', 1, 2, 'CONTABILIDAD', '', 1, 'H', 'gfernandez@ficachi.com.mx', '85181c0ae199bde685595c8047174d93', 'man.gif', 0, 'N4', '3', '2019-03-11 17:04:40', '0000-00-00 00:00:00'),
(1016, 'Ana Patricia ', 'Soriano Flores', '2019-09-07', 1, 2, 'CONTABILIDAD', '', 1, 'M', 'asoriano@ficachi.com.mx', '35bbf91b4a0cbbbb673954946683e12a', 'woman.gif', 0, 'N4', '3', '2019-03-11 17:08:26', '2019-03-18 05:26:39'),
(1017, 'Nabor Alejo ', 'Zepeda Porcayo', '2019-07-21', 1, 2, 'CONTABILIDAD', 'nzepeda@ficachi.com.mx', 1, 'H', 'nzepeda@ficachi.com.mx', '354246b01eb8d47f98ca56a9d4161faf', 'man.gif', 0, 'N4', '3', '2019-03-11 17:51:12', '2019-03-30 06:40:39'),
(1019, 'Yessenia', 'Aldan Ochoa', '2019-10-12', 1, 2, 'administrativo', 'auxiliar', 1, 'M', 'chena@yahoo.com.mx', '12345', 'woman.gif', 95, 'N5', '3', '2019-10-10 16:00:14', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ajustes`
--
ALTER TABLE `ajustes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresacolaborador`
--
ALTER TABLE `empresacolaborador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupoemp`
--
ALTER TABLE `grupoemp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `involucrados`
--
ALTER TABLE `involucrados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `minutas`
--
ALTER TABLE `minutas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subtareas`
--
ALTER TABLE `subtareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ajustes`
--
ALTER TABLE `ajustes`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT de la tabla `empresacolaborador`
--
ALTER TABLE `empresacolaborador`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `grupoemp`
--
ALTER TABLE `grupoemp`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `involucrados`
--
ALTER TABLE `involucrados`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `minutas`
--
ALTER TABLE `minutas`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `subtareas`
--
ALTER TABLE `subtareas`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1020;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
