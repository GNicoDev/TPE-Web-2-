-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2024 a las 15:00:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquilerautos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `cant_dias` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `fecha_reserva`, `cant_dias`, `id_vehiculo`) VALUES
(1, '2024-10-15', 10, 1),
(2, '2024-10-25', 13, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `tipo` varchar(10) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `telefono`, `tipo`) VALUES
(1, 'Roberto Muñoz', 'rmunioz@gmail.com', '123456', 249456784, 'usuario'),
(2, 'Jose Lopez', 'jlopez@gmail.com', '123456', 2494347698, 'usuario'),
(3, 'Juan Perez', 'jperez@gmail.com', 'admin', 2494358769, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` int(11) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `precio_dia` decimal(10,0) NOT NULL,
  `reservado` tinyint(1) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `marca`, `modelo`, `matricula`, `precio_dia`, `reservado`, `imagen`) VALUES
(1, 'FERRARI', 2019, 'AD456ZQ', 125, 1, 'https://wallup.net/wp-content/uploads/2019/09/586471-2013-ferrari-laferrari-supercar.jpg'),
(2, 'BUGATTI', 2020, 'FE482YU', 110, 0, 'https://th.bing.com/th/id/OIP.75UipjbunaSqqlVkII5TjAHaEo?rs=1&pid=ImgDetMain'),
(3, 'TESLA', 2023, 'SG754RE', 95, 1, 'https://st.automobilemag.com/uploads/sites/11/2017/11/2020-Tesla-Roadster-Above.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
