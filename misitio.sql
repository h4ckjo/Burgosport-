-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2021 a las 09:59:56
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `misitio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `clave` varchar(50) COLLATE utf32_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `clave`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `num` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `tallas` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `estado`, `num`, `idUsuario`, `idProducto`, `tallas`, `cantidad`, `precio`, `descuento`, `envio`, `fecha`) VALUES
(0, '1', 'NiBLXSlpWIRJ6YycCmu9g34ZbqnFa8', 0, 52, 0, 1, '145.00', '0.00', '0.00', '2021-01-29 11:22:47'),
(0, '1', 'NiBLXSlpWIRJ6YycCmu9g34ZbqnFa8', 0, 65, 0, 1, '100.00', '0.00', '0.00', '2021-01-29 11:23:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicos`
--

CREATE TABLE `historicos` (
  `id` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `num` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `historicos`
--

INSERT INTO `historicos` (`id`, `estado`, `num`, `idUsuario`, `idProducto`, `cantidad`, `precio`, `descuento`, `envio`, `fecha`) VALUES
(0, '1', 'WAngBT0Km2wjeVMhOqIEoQDscJXYPt', 0, 30, 1, '90.00', '0.00', '0.00', '2021-01-29 11:07:48'),
(0, '1', 'o8V6pe3xE9mAa7qMZ2UwlzHvnCGhXJ', 0, 55, 5, '90.00', '0.00', '0.00', '2021-01-29 11:09:26'),
(0, '1', 'o8V6pe3xE9mAa7qMZ2UwlzHvnCGhXJ', 0, 54, 4, '50.00', '0.00', '0.00', '2021-01-29 11:09:26'),
(0, '1', 'o8V6pe3xE9mAa7qMZ2UwlzHvnCGhXJ', 0, 68, 2, '100.00', '0.00', '0.00', '2021-01-29 11:09:26'),
(0, '0', 'Mp8WzuBIHfYnec4DPQJSjlEXLrK1kC', 0, 55, 1, '90.00', '0.00', '0.00', '2021-01-29 11:09:33'),
(0, '1', 'w3OGY6LRoDVpIgsFmZ49Jz0hUqTebc', 0, 52, 1, '145.00', '0.00', '0.00', '2021-01-29 11:09:39'),
(0, '1', 'w3OGY6LRoDVpIgsFmZ49Jz0hUqTebc', 0, 54, 1, '50.00', '0.00', '0.00', '2021-01-29 11:09:39'),
(0, '0', 'jzONoBVwMDyYmhbrFk6igH2R3n8Acv', 0, 52, 1, '145.00', '0.00', '0.00', '2021-01-29 11:09:44'),
(0, '0', 'mrpLjf6eaOsuSNCB384GFvZx9TkRqK', 0, 52, 1, '145.00', '0.00', '0.00', '2021-01-29 11:09:49'),
(0, '0', 'A3mqksV8942WozLdRif5tIHP7ZcUN1', 0, 52, 1, '145.00', '0.00', '0.00', '2021-01-29 11:09:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `tipo` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `subtipo` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `tallas` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descuento` decimal(10,0) NOT NULL,
  `envio` decimal(10,0) NOT NULL,
  `imagen` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `relacion1` int(11) NOT NULL,
  `relacion2` int(11) NOT NULL,
  `relacion3` int(11) NOT NULL,
  `masvendidos` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `nuevos` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `tipo`, `subtipo`, `nombre`, `descripcion`, `tallas`, `precio`, `descuento`, `envio`, `imagen`, `relacion1`, `relacion2`, `relacion3`, `masvendidos`, `nuevos`) VALUES
(51, '4', '1', 'Camiseta ', 'fvdvdfb', 'L', '66', '0', '0', 'camiseta.jpg', 0, 0, 0, '0', '0'),
(52, '0', '1', 'Camiseta FC. Barcelona', 'Camiseta furbol.... aaaaaaaa.....', 'XL', '145', '0', '0', 'camiseta fc. barcelona.jpg', 0, 0, 0, '1', '1'),
(53, '1', '1', 'Camiseta Jordan', 'dfad', 'Xl.L', '90', '0', '0', 'camisetajordan.jpg', 0, 0, 0, '0', '0'),
(54, '2', '1', 'Mallot ', 'dgdg', 'S,M.L', '50', '0', '0', 'mallot.jpg', 0, 0, 0, '0', '0'),
(55, '0', '2', 'botas futbol', 'fgdfg', '44', '90', '0', '0', 'botas futbol.jpg', 0, 0, 0, '0', '0'),
(56, '3', '1', 'Camiseta surf', 'dgasdgd', 'S,M.L', '50', '0', '0', 'camisetasurf.jpg', 0, 0, 0, '0', '0'),
(57, '5', '3', 'zapatillas outdoor', 'dfad', '46', '120', '0', '0', 'zapatillasoutdoor.jpg', 0, 0, 0, '0', '0'),
(58, '6', '4', 'complemeto tenis', 'dadas', 'S,M.L', '30', '0', '0', 'complemeto tenis.jpg', 0, 0, 0, '0', '0'),
(59, '0', '3', 'chandal futbol', 'dfadf', 'S,M.L', '100', '0', '0', 'chandal futbol.jpg', 0, 0, 0, '0', '0'),
(60, '0', '4', 'complemeto futbol', 'dasdgf', 'S,M.L', '100', '0', '0', 'complemeto futbol.jpg', 0, 0, 0, '0', '0'),
(61, '1', '2', 'botas baloncesto', 'dfdfsdfs', 'S,M.L', '100', '0', '0', 'botasbaloncesto.jpg', 0, 0, 0, '0', '0'),
(62, '1', '3', 'chandal baloncesto', 'asdfadf', 'S,M.L', '100', '0', '0', 'chandalbaloncesto.jpg', 0, 0, 0, '0', '0'),
(63, '1', '4', 'complento baloncesto', 'fdfasdfasd', 'S,M.L', '100', '0', '0', 'complentobaloncesto.jpg', 0, 0, 0, '0', '0'),
(64, '2', '2', 'botas ciclismo', 'dgfadg', 'S,M.L', '100', '0', '0', 'botasciclismo.jpg', 0, 0, 0, '0', '0'),
(65, '2', '3', 'Bicicleta', 'sdasdfasdf', 'S,M.L', '100', '0', '0', 'bicicleta.jpg', 0, 0, 0, '0', '0'),
(66, '2', '4', 'complemeto ciclismo', 'ffdgefg', 'S,M.L', '100', '0', '0', 'complemetociclismo.jpg', 0, 0, 0, '0', '0'),
(67, '3', '2', 'neopreno', 'dasdf', 'S,M.L', '100', '0', '0', 'neopreno.jpg', 0, 0, 0, '0', '0'),
(68, '3', '3', 'tablas', 'fgdgadfg', 'S,M.L', '100', '0', '0', 'tablas.jpg', 0, 0, 0, '0', '0'),
(69, '3', '4', 'complemento surf', 'dsdv', 'S,M.L', '100', '0', '0', 'complementosurf.jpg', 0, 0, 0, '0', '0'),
(70, '4', '2', 'mallas', 'dfasdf', 'S,M.L', '100', '0', '0', 'mallas.jpg', 0, 0, 0, '0', '0'),
(71, '4', '3', 'zapatillas running', 'dfasdf', 'S,M.L', '100', '0', '0', 'zapatillasrunning.jpg', 0, 0, 0, '0', '0'),
(72, '4', '4', 'complemento running', 'dfawfdawd', 'S,M.L', '100', '0', '0', 'complementorunning.jpg', 0, 0, 0, '0', '0'),
(73, '5', '2', 'Pantalones Outdoor', 'sdfadf', 'S,M.L', '100', '0', '0', 'pantalonesoutdoor.jpg', 0, 0, 0, '0', '0'),
(74, '5', '1', 'Camiseta outdoor', 'fefdfv', 'S,M.L', '100', '0', '0', 'camisetaoutdoor.jpg', 0, 0, 0, '0', '0'),
(75, '5', '4', 'complemento outdoor', 'fdfadasd', 'S,M.L', '100', '0', '0', 'complementooutdoor.jpg', 0, 0, 0, '0', '0'),
(76, '6', '1', 'camiseta tenis', 'fasdf', 'S,M.L', '100', '0', '0', 'camiseta tenis.jpg', 0, 0, 0, '0', '0'),
(77, '6', '2', 'pantalones tenis', 'asdfasd', 'S,M.L', '100', '0', '0', 'pantalones tenis.jpg', 0, 0, 0, '0', '0'),
(78, '6', '3', 'zapatillas tenis', 'fvdfaefd', 'S,M.L', '100', '0', '0', 'zapatillas tenis.jpg', 0, 0, 0, '0', '0'),
(79, '7', '1', 'camisetas outlet', 'fsfb', 'S,M.L', '100', '0', '0', 'camisetas outlet.jpg', 0, 0, 0, '0', '0'),
(80, '7', '3', 'zapatilla outolet 1', 'dadgad', 'S,M.L', '100', '0', '0', 'zapatilla outolet 1.jpg', 0, 0, 0, '0', '0'),
(81, '7', '2', 'zapatilla outolet 2', 'dgagd', 'S,M.L', '100', '0', '0', 'zapatilla outolet 2.jpg', 0, 0, 0, '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `clave1` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `clave2` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `poblacion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `codpost` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(400) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `email`, `clave1`, `clave2`, `direccion`, `poblacion`, `codpost`, `provincia`, `telefono`, `clave`) VALUES
(0, 'jose Luis', 'Ortiz', 'isa@gmail.com', 'Ab123456', 'Ab123456', 'Plaza Santiago', 'Burgos', '09007', 'Burgos', 'Burgos', 'c55be8160d2b4f3e756991b4f5c5db6d01e38386ac5a9079b4acbfbd2aebc722018f631b6da71cbca91f4f9e01f73e51d1f45b7e05718b08e8bdaffa5205e9a3'),
(0, 'Juan', 'Perez', 'juan@gmail.com', 'Ab123456', 'Ab123456', 'Calle Catedral', 'Burgos', '09007', 'Burgos', '666111222', 'c55be8160d2b4f3e756991b4f5c5db6d01e38386ac5a9079b4acbfbd2aebc722018f631b6da71cbca91f4f9e01f73e51d1f45b7e05718b08e8bdaffa5205e9a3'),
(0, 'Pedro', 'Rojo', 'pedro@gmail.com', 'Ab123456', 'Ab123456', 'plaza mayor', 'Burgos', '09007', 'Burgos', '666111222', 'c55be8160d2b4f3e756991b4f5c5db6d01e38386ac5a9079b4acbfbd2aebc722018f631b6da71cbca91f4f9e01f73e51d1f45b7e05718b08e8bdaffa5205e9a3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
