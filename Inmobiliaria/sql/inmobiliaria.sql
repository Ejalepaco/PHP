-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2025 a las 13:13:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprados`
--

CREATE TABLE `comprados` (
  `usuario_comprador` int(5) NOT NULL,
  `codigo_piso` int(11) NOT NULL,
  `precio_final` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pisos`
--

CREATE TABLE `pisos` (
  `codigo_piso` int(11) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numero` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `puerta` varchar(5) NOT NULL,
  `cp` int(11) NOT NULL,
  `metros` int(11) NOT NULL,
  `zona` varchar(15) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `usuario_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(5) NOT NULL,
  `nombres` varchar(35) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(80) NOT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `nombres`, `correo`, `clave`, `tipo_usuario`) VALUES
(3, 'Paco', 'paco@chile.com', '$2y$10$FSH7o1WG3GCDXgrSKYj.Muf3iCaUDssBmNt/5gNSeCXk19imHy18e', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comprados`
--
ALTER TABLE `comprados`
  ADD PRIMARY KEY (`usuario_comprador`,`codigo_piso`),
  ADD KEY `codigo_piso` (`codigo_piso`);

--
-- Indices de la tabla `pisos`
--
ALTER TABLE `pisos`
  ADD PRIMARY KEY (`codigo_piso`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pisos`
--
ALTER TABLE `pisos`
  MODIFY `codigo_piso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comprados`
--
ALTER TABLE `comprados`
  ADD CONSTRAINT `comprados_ibfk_1` FOREIGN KEY (`usuario_comprador`) REFERENCES `usuario` (`usuario_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comprados_ibfk_2` FOREIGN KEY (`codigo_piso`) REFERENCES `pisos` (`codigo_piso`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pisos`
--
ALTER TABLE `pisos`
  ADD CONSTRAINT `pisos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
