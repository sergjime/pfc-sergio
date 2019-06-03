-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2019 a las 20:08:01
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pfc_dual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios`
--

CREATE TABLE `sitios` (
  `id_sitio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_sitio` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sitios`
--

INSERT INTO `sitios` (`id_sitio`, `id_usuario`, `nombre_sitio`, `user`, `password`, `url`) VALUES
(12, 1, 'Gmail', 'sergjime10', '12345', 'https://www.gmail.com/mail/help/intl/es/about.html?iframe'),
(13, 1, 'Foroweb', 'sergjime10', '12345', 'http://www.forosdelweb.com/'),
(14, 5, 'ForoCoches', 'mariito30', '12345', 'https://www.forocoches.com/'),
(15, 4, 'Sony', 'kratos3', '12345', 'https://www.playstation.com/es-es/'),
(16, 5, 'MotosRey', 'mariito30', '12345', 'https://motosrey.es/index.php/login'),
(17, 2, 'Gmail', 'heidi69', '12345', 'https://www.gmail.com/mail/help/intl/es/about.html?iframe'),
(18, 4, 'Gmail', 'kratos3', '12345', 'https://www.gmail.com/mail/help/intl/es/about.html?iframe'),
(19, 3, 'Gmail', 'pablete50', '12345', 'https://www.gmail.com/mail/help/intl/es/about.html?iframe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nick` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password_login` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido1` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol_usuario` enum('admin','user') COLLATE utf8_spanish_ci NOT NULL,
  `fecha_alta` date NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `avatar`, `nick`, `password_login`, `apellido1`, `apellido2`, `rol_usuario`, `fecha_alta`, `email`) VALUES
(1, 'Sergio', 'sergjime1.png',  'sergjime', 'admin', 'Jiménez', 'Sastre', 'admin', '2019-03-29', 'sergjime@gmail.com'),
(2, 'Pedro', 'fighter2.jpg', 'fighter', 'guay', 'Sánchez', 'Martínez', 'user', '2019-03-29', 'fighter@gmail.com'),
(3, 'Pablo', 'pablete3.jpg', 'pablete', 'pablito', 'Alves', 'García', 'user', '2019-03-29', 'pablete@gmail.com'),
(4, 'David', 'kratos344.jpg', 'kratos34', 'kratos', 'Kratos', 'Duro', 'user', '2019-03-29', 'kratos34@gmail.com'),
(5, 'Mario', 'luigi5.png', 'luigi', 'luigi', 'Godoy', 'Salamanca', 'user', '2019-03-29', 'luigi@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sitios`
--
ALTER TABLE `sitios`
  ADD PRIMARY KEY (`id_sitio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sitios`
--
ALTER TABLE `sitios`
  MODIFY `id_sitio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sitios`
--
ALTER TABLE `sitios`
  ADD CONSTRAINT `sitios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;