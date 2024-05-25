-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2024 a las 03:11:14
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
-- Base de datos: `salon_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta_temp`
--

CREATE TABLE `detalle_venta_temp` (
  `id_detalle` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `cantidad_detalle` int(11) DEFAULT NULL,
  `subtotal_detalle` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta_temp`
--

INSERT INTO `detalle_venta_temp` (`id_detalle`, `id_venta`, `id_producto`, `id_cliente`, `id_empleado`, `cantidad_detalle`, `subtotal_detalle`) VALUES
(3, 0, 3, 1, 0, 1, 0),
(4, 0, 3, 1, 0, 1, 0),
(5, 0, 1, 1, 0, 2, 0),
(6, 0, 1, 1, 0, 2, 0),
(7, 0, 12, 1, 0, 10, 0),
(8, 0, 14, 3, 0, 23, 0),
(9, 0, 5, 1, 0, 123, 0),
(10, 0, 2, 1, 0, 3, 0),
(12, 0, 2, 1, 0, 44, 0),
(13, 0, 1, 1, 0, 100, 0),
(14, 0, 3, 3, 0, 12, 311.88),
(15, 0, 1, 3, 0, 12, 311.88),
(16, 0, 5, 3, 0, 123, 3196.77),
(17, 0, 5, 3, 0, 123, 3196.77),
(18, 0, 9, 3, 0, 123, 3196.77),
(19, 0, 4, 5, 0, 100, 2599),
(20, 0, 4, 5, 0, 100, 2599),
(21, 0, 1, 2, NULL, 2, 51.98),
(22, 0, 6, 2, NULL, 21, 545.79),
(23, 0, 16, 2, NULL, 100, 2599),
(24, 0, 19, 2, NULL, 211, 5483.89),
(25, 0, 6, 2, NULL, 11, 285.89),
(26, 0, 24, 2, NULL, 123, 3196.77),
(27, 0, 24, 2, NULL, 123, 3196.77),
(28, 0, 9, 1, NULL, 4, 103.96);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_venta_temp`
--
ALTER TABLE `detalle_venta_temp`
  ADD PRIMARY KEY (`id_detalle`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_venta_temp`
--
ALTER TABLE `detalle_venta_temp`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
