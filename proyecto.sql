-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2020 a las 03:18:16
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `codigoadmin` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`codigoadmin`, `nombre`, `usuario`, `contrasena`) VALUES
(1, 'juancito molas lopez', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codigocliente` int(11) NOT NULL,
  `propietario` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `contrasenac` varchar(100) NOT NULL,
  `usuarioc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codigocliente`, `propietario`, `direccion`, `telefono`, `contrasenac`, `usuarioc`) VALUES
(62, 'juan', 'Indp. Nacional Esq. 19 ', '  123333', '123', 'juan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `codigomascota` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `raza` varchar(30) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `clientecodigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`codigomascota`, `nombre`, `raza`, `sexo`, `fechanacimiento`, `clientecodigo`) VALUES
(59, 'mauricioo', 'pastor aleman', '  mach', '2001-03-21', 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `seccioncodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `descripcion`, `foto`, `seccioncodigo`) VALUES
(140, ' camillas', 'descripcion', '../../../../proyecto/estilo/fotos/51556223_495128157681256_1332932410140000256_o.jpg', 80),
(141, ' camillas', 'descripcion', '../../../../proyecto/estilo/fotos/19143968_193397321187676_9023465755967421637_o.jpg', 80),
(143, ' camillas', 'descripcion', '../../../../proyecto/estilo/fotos/18698216_181321959061879_8238365883172963873_n.png', 80),
(144, ' comida', 'descripcion', '../../../../proyecto/estilo/fotos/51552762_495127891014616_5522284145343987712_o.jpg', 80),
(145, ' camillas', 'descripcion', '../../../../proyecto/estilo/fotos/19250388_193397624520979_5702642786807562172_o.jpg', 80),
(146, ' antiparacitario', 'descripcion', '../../../../proyecto/estilo/fotos/51635346_496531420874263_6091543354183516160_o.jpg', 82),
(147, ' antiparacitario', 'descripcion', '../../../../proyecto/estilo/fotos/51858152_497214447472627_6984971138153578496_o.jpg', 82),
(149, ' antiparacitario', 'descripcion', '../../../../proyecto/estilo/fotos/55533237_511937336000338_7166865928011907072_o.jpg', 82),
(154, ' ropita', 'descripcion', '../../../../proyecto/estilo/fotos/19390874_196060350921373_540608074700110288_o.jpg', 84),
(155, ' ropita', 'descripcion', '../../../../proyecto/estilo/fotos/19453027_196060727588002_3865694671779649132_o.jpg', 84),
(156, ' x', 'x', '../../../../proyecto/estilo/fotos/19453027_196060727588002_3865694671779649132_o.jpg', 85);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `codigoseccion` int(11) NOT NULL,
  `NombreSeccion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`codigoseccion`, `NombreSeccion`) VALUES
(80, ' Camillas'),
(82, ' Antiparacitarios'),
(84, ' ropitas'),
(85, ' x');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunacion`
--

CREATE TABLE `vacunacion` (
  `codigo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `peso` varchar(50) NOT NULL,
  `vacuna` varchar(300) NOT NULL,
  `proxcontrol` date NOT NULL,
  `mascotacodigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacunacion`
--

INSERT INTO `vacunacion` (`codigo`, `fecha`, `peso`, `vacuna`, `proxcontrol`, `mascotacodigo`) VALUES
(104, '2020-06-30', '40 kg', 'Paracetamol', '2020-07-31', 59),
(105, '1111-11-21', '12kg', 'paracetamol', '1111-11-22', 59);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`codigoadmin`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigocliente`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`codigomascota`),
  ADD KEY `mascota_ibfk_1` (`clientecodigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigoseccion` (`seccioncodigo`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`codigoseccion`);

--
-- Indices de la tabla `vacunacion`
--
ALTER TABLE `vacunacion`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `vacunacion_ibfk_1` (`mascotacodigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `codigoadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigocliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `codigomascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `codigoseccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `vacunacion`
--
ALTER TABLE `vacunacion`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`clientecodigo`) REFERENCES `cliente` (`codigocliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `clave foranea` FOREIGN KEY (`seccioncodigo`) REFERENCES `seccion` (`codigoseccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vacunacion`
--
ALTER TABLE `vacunacion`
  ADD CONSTRAINT `vacunacion_ibfk_1` FOREIGN KEY (`mascotacodigo`) REFERENCES `mascota` (`codigomascota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
