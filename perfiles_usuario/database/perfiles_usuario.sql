-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2022 a las 05:09:07
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `perfiles_usuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logistica`
--

CREATE TABLE `logistica` (
  `id` int(11) NOT NULL,
  `cantidad` int(100) DEFAULT NULL,
  `producto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logistica`
--

INSERT INTO `logistica` (`id`, `cantidad`, `producto`) VALUES
(3, 5555, 'd.kkk'),
(7, 3, 'televisores  dfkahfsk');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mainlogin`
--

CREATE TABLE `mainlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `role` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `mainlogin`
--

INSERT INTO `mainlogin` (`id`, `username`, `email`, `password`, `role`) VALUES
(22, 'andres21', 'aaa123@gmail.com', '123456', 'admin'),
(23, 'maria', 'maria@gmail.com', '123456', 'vendedor'),
(24, 'adrian', 'adrian@gmail.com', '123456789', 'logistica'),
(26, 'Andres1', 'andres1@gmail.com', 'andres1', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `sucursal` varchar(250) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `producto` varchar(200) DEFAULT NULL,
  `cedula_clientes` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `peticion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `fecha`, `sucursal`, `cantidad`, `producto`, `cedula_clientes`, `precio`, `peticion`) VALUES
(35, '0000-00-00', 'Seleccione una sucursal', 0, 'ssssssssss', 0, 0, 'Cambio'),
(38, '2022-04-16', 'Seleccione una sucursal', 100, 'telefonos', 434, 0, 'Devolucion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `logistica`
--
ALTER TABLE `logistica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mainlogin`
--
ALTER TABLE `mainlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `logistica`
--
ALTER TABLE `logistica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `mainlogin`
--
ALTER TABLE `mainlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
