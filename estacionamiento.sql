-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2017 a las 05:29:08
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacionamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auto`
--

CREATE TABLE `auto` (
  `id` int(5) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `patente` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auto`
--

INSERT INTO `auto` (`id`, `marca`, `patente`, `color`) VALUES
(5, 'fiat', '223qwe', 'rojo'),
(6, 'fiat', '223qwe', 'rojo'),
(7, 'fiat', '223qwe', 'rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autocochera`
--

CREATE TABLE `autocochera` (
  `idAuto` int(5) NOT NULL,
  `idCochera` int(5) NOT NULL,
  `idEmpleado` int(5) NOT NULL,
  `ingreso` date NOT NULL,
  `salida` date NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `autocochera`
--

INSERT INTO `autocochera` (`idAuto`, `idCochera`, `idEmpleado`, `ingreso`, `salida`, `monto`) VALUES
(1, 1, 1, '2017-06-05', '2017-06-06', 300),
(1, 1, 1, '2017-06-05', '2017-06-06', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cochera`
--

CREATE TABLE `cochera` (
  `id` int(1) NOT NULL,
  `tipoCochera` varchar(15) NOT NULL,
  `estadoCochera` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cochera`
--

INSERT INTO `cochera` (`id`, `tipoCochera`, `estadoCochera`) VALUES
(1, 'reservada', 1),
(2, 'reservada', 1),
(3, 'reservada', 1),
(9, 'estandar', 1),
(10, 'estandar', 1),
(11, 'estandar', 1),
(12, 'estandar', 1),
(13, 'estandar', 1),
(14, 'estandar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(5) NOT NULL,
  `legajo` int(10) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `apellido` varchar(11) NOT NULL,
  `turno` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `legajo`, `nombre`, `apellido`, `turno`) VALUES
(1, 9999, 'Paola', 'Torrealba', 'null'),
(2, 8888, 'Gerardo', 'Fittipaldi', 'mañana'),
(3, 77777, 'Pedro', 'Rivera', 'tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(5) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `mail`, `clave`, `estado`, `rol`) VALUES
(1, 'tpaola85@gmail.com', '1234', 'habilitado', 'administrador'),
(2, 'natalia@gmail.com', '1234', 'habilitado', 'empleado'),
(3, 'pedro@gmail.com', '1234', 'habilitado', 'empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cochera`
--
ALTER TABLE `cochera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
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
-- AUTO_INCREMENT de la tabla `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `cochera`
--
ALTER TABLE `cochera`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
