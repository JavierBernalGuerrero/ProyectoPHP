-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2016 a las 22:03:32
-- Versión del servidor: 5.7.12-0ubuntu1
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escritorio`
--

CREATE TABLE `escritorio` (
  `idEscritorio` varchar(10) COLLATE utf8_bin NOT NULL,
  `titulo` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'Aqui va el titulo',
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `imagen01` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'imagen01.jpg',
  `imagen02` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'imagen02.jpg',
  `imagen03` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'imagen03.jpg',
  `imagen04` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'imagen04.jpg',
  `imagen05` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'imagen05.jpg',
  `imagen06` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'imagen06.jpg',
  `idUsuario` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `escritorio`
--

INSERT INTO `escritorio` (`idEscritorio`, `titulo`, `descripcion`, `imagen01`, `imagen02`, `imagen03`, `imagen04`, `imagen05`, `imagen06`, `idUsuario`) VALUES
('002', 'Aqui va el titulo', '', 'imagen01.jpg', 'imagen02.jpg', 'imagen03.jpg', 'imagen04.jpg', 'imagen05.jpg', 'imagen06.jpg', '002'),
('003', 'Lorem ipsum', 'Eros impedit an vix. Utroque delicatissimi est an. Ius te vocent ornatus intellegebat, bonorum nusquam principes in usu. Nusquam periculis ea mel. Ex has minimum delicatissimi.\r\n\r\nElitr honestatis ad has. Mei an alia ceteros recteque, rebum apeirian adipiscing vim id. Utroque nusquam salutatus et mel. Ea movet animal postulant mea, homero qualisque in eos. Et vis modo unum suscipiantur.\r\n\r\nEx scaevola sadipscing eos, sanctus molestiae definiebas eos id. Magna maluisset splendide te eos. Phaedrum delicata vulputate id est. Usu prompta posidonium no.', '', 'imagen02.jpg', 'imagen03.jpg', 'imagen04.jpg', 'imagen05.jpg', 'imagen06.jpg', '003'),
('004', 'Aqui va el titulo', '', 'imagen01.jpg', 'imagen02.jpg', 'imagen03.jpg', 'imagen04.jpg', 'imagen05.jpg', 'imagen06.jpg', '004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` varchar(10) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(20) COLLATE utf8_bin NOT NULL,
  `clave` varchar(30) COLLATE utf8_bin NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `clave`, `administrador`) VALUES
('001', 'root', 'root', 1),
('002', 'alumno', 'alumno', 0),
('003', 'usuario', 'usuario', 0),
('004', 'user', 'user', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `escritorio`
--
ALTER TABLE `escritorio`
  ADD PRIMARY KEY (`idEscritorio`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `escritorio`
--
ALTER TABLE `escritorio`
  ADD CONSTRAINT `usuarioEscritorio` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
