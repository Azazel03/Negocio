-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2018 a las 09:14:45
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `negocio`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_producto` (IN `nombre` VARCHAR(100) CHARSET utf8, IN `stock` INT, IN `codigo` VARCHAR(100) CHARSET utf8, IN `categoria` VARCHAR(100), IN `descripcion` VARCHAR(200) CHARSET utf8, IN `id_usuario` INT)  NO SQL
INSERT INTO productos VALUES(null,nombre,stock,codigo,categoria,descripcion,id_usuario)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consulta_producto` (IN `nombre` VARCHAR(100) CHARSET utf8)  NO SQL
SELECT * FROM productos WHERE nombre_producto=nombre$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_producto` (IN `codigo` VARCHAR(50) CHARSET utf8)  NO SQL
DELETE FROM productos WHERE codigo_prodcuto=codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `nombre` VARCHAR(50) CHARSET utf8, IN `pass` VARCHAR(50) CHARSET utf8)  NO SQL
select * from usuarios where nombre_usuario=nombre and pass_usuario=pass$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporte_producto` (IN `categoria` VARCHAR(100) CHARSET utf8)  NO SQL
SELECT * FROM productos WHERE categoria_producto=categoria$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `stock_producto` int(11) NOT NULL,
  `codigo_producto` varchar(100) NOT NULL,
  `categoria_producto` varchar(100) NOT NULL,
  `descripcion_producto` varchar(200) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `nombre_producto`, `stock_producto`, `codigo_producto`, `categoria_producto`, `descripcion_producto`, `id_usuario`) VALUES
(1, 'a', 4, '123ad', 'electro', 'a', 1),
(2, 'a', 1, 'a', 'vestuario', 'a', 1),
(3, 'aaa', 22, 'aa', 'vestuario', 'aa', 1),
(4, 'hh', 3, 'hh', 'vestuario', 'h', 1),
(5, 'hh', 2, 'hh', 'alimento', 'asd', 1),
(6, 'hh', 2, 'hh', 'alimento', 'h', 1),
(7, 'hh', 1, 'hh', 'alimento', 'hh', 1),
(8, 'hh', 1, 'hh', 'electro', 'hh', 1),
(9, 'hhr', 1, 'hh', 'electro', 'h', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `pass_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `pass_usuario`) VALUES
(1, 'admin', '0ce200a3db8411e520b52450f25ad5e06ce0346b ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`),
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
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
