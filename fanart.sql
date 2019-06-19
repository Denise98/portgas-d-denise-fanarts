-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2019 a las 13:17:57
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fanart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idcom` int(11) NOT NULL,
  `texto` text NOT NULL,
  `idus` int(11) NOT NULL,
  `iddib` int(11) NOT NULL,
  `usuario` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idcom`, `texto`, `idus`, `iddib`, `usuario`) VALUES
(1, 'me ha gustado mucho', 8, 10, 'adri89'),
(3, 'esta muy bien hecho', 2, 8, 'alex456'),
(5, 'que bonito!!', 2, 12, 'alex456'),
(8, 'que bonito', 6, 6, 'toni75'),
(9, '<3', 9, 6, 'oscar34'),
(25, 'muy chulo', 2, 6, 'alex456'),
(1237, 'hola', 2, 6, 'alex456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dibujo`
--

CREATE TABLE `dibujo` (
  `iddib` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `idus` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dibujo`
--

INSERT INTO `dibujo` (`iddib`, `titulo`, `idus`, `url`) VALUES
(6, 'ace', 2, 'ace.png'),
(7, 'everafter', 2, 'everafter.png'),
(8, 'star', 6, 'star.png'),
(9, 'yato', 6, 'yato.png'),
(10, 'edward elric', 8, 'edward.png'),
(11, 'robin', 8, 'robin.png'),
(12, 'elsa frozen', 2, 'elsa.png'),
(13, 'nutella kawaii', 9, 'nutella.png'),
(14, 'todoroki', 9, 'todoroki.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idus` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `rol` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idus`, `nombre`, `apellidos`, `usuario`, `pass`, `rol`, `email`) VALUES
(2, 'alexa', 'pestuzo gomez', 'alex456', '1234', 'usuario', 'alexa45@yahoo.com'),
(5, 'josefa', 'zasca rodriguez', 'josefita34', '2345', 'admin', 'josefita244@gmail.com'),
(6, 'antonio', 'perez medina', 'toni75', '1234', 'usuario', 'antonioperez@gmail.com'),
(7, 'denise', 'burgos garcia', 'admin', 'admin', 'admin', 'ninibur@gmail.com'),
(8, 'adrian', 'gutierrez asco', 'adri89', '1234', 'usuario', 'adri89@gmail.com'),
(9, 'oscar', 'burgos garcia', 'oscar34', '1234', 'usuario', 'oscar34@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcom`),
  ADD KEY `idus` (`idus`),
  ADD KEY `iddib` (`iddib`),
  ADD KEY `usuario` (`usuario`(255));

--
-- Indices de la tabla `dibujo`
--
ALTER TABLE `dibujo`
  ADD PRIMARY KEY (`iddib`),
  ADD KEY `idus` (`idus`),
  ADD KEY `url_2` (`url`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idus`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1238;

--
-- AUTO_INCREMENT de la tabla `dibujo`
--
ALTER TABLE `dibujo`
  MODIFY `iddib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idus`) REFERENCES `usuario` (`idus`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`iddib`) REFERENCES `dibujo` (`iddib`);

--
-- Filtros para la tabla `dibujo`
--
ALTER TABLE `dibujo`
  ADD CONSTRAINT `idus` FOREIGN KEY (`idus`) REFERENCES `usuario` (`idus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
