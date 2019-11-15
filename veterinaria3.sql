-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2019 a las 15:11:48
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitcirugias`
--

CREATE TABLE `bitcirugias` (
  `id_bitCirug` int(20) NOT NULL,
  `cirugia` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `mascota` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fech_realizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitcitas`
--

CREATE TABLE `bitcitas` (
  `id_bitCitas` int(20) NOT NULL,
  `mascota` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitcompras`
--

CREATE TABLE `bitcompras` (
  `id_bitCompras` int(10) NOT NULL,
  `num_factura` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `proveedor` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `producto` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitexpediente`
--

CREATE TABLE `bitexpediente` (
  `id_bitExp` int(20) NOT NULL,
  `mascota` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitpersonal`
--

CREATE TABLE `bitpersonal` (
  `id_bitPersonal` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nom_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitproveedores`
--

CREATE TABLE `bitproveedores` (
  `id_bitProveedores` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitservicios`
--

CREATE TABLE `bitservicios` (
  `id_bitServicio` int(20) NOT NULL,
  `servicio` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `mascota` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `fecha_realizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitventas`
--

CREATE TABLE `bitventas` (
  `id_bitVentas` int(20) NOT NULL,
  `num_factura` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `empleado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `producto` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `total` double NOT NULL,
  `fecha_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(20) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(5, 'Comida para Perros'),
(6, 'Bebida'),
(7, 'Antiviotico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cirugia`
--

CREATE TABLE `cirugia` (
  `id_cirugia` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `prioridad` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_mascota` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codrecup`
--

CREATE TABLE `codrecup` (
  `idCodRecup` int(11) NOT NULL,
  `CodRecup` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecup` date NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(20) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `id_cita` int(15) NOT NULL,
  `id_receta` int(11) NOT NULL,
  `id_mascota` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `id_Servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosclinica`
--

CREATE TABLE `datosclinica` (
  `id_DatClinica` int(11) NOT NULL,
  `nombre` varchar(75) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_apertura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datosclinica`
--

INSERT INTO `datosclinica` (`id_DatClinica`, `nombre`, `foto`, `direccion`, `telefono`, `fecha_apertura`) VALUES
(1, 'animal love', '156727121norma 141.JPG', 'colonia san luis', '6788-8888', '2019-10-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id_detVenta` int(20) NOT NULL,
  `id_venta` int(15) NOT NULL,
  `cantVenta` int(11) NOT NULL,
  `id_detProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detcirugia`
--

CREATE TABLE `detcirugia` (
  `id_detCirug` int(20) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_cirugia` int(15) NOT NULL,
  `id_Empleado` int(15) NOT NULL,
  `id_Mascota` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detproductos`
--

CREATE TABLE `detproductos` (
  `id_detProd` int(20) NOT NULL,
  `precCompra` double NOT NULL,
  `precVenta` double NOT NULL,
  `fechaCaduc` date NOT NULL,
  `id_producto` int(15) NOT NULL,
  `id_margen` int(15) NOT NULL,
  `cantidCompra` int(11) NOT NULL,
  `id_facturaComp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detproductos`
--

INSERT INTO `detproductos` (`id_detProd`, `precCompra`, `precVenta`, `fechaCaduc`, `id_producto`, `id_margen`, `cantidCompra`, `id_facturaComp`) VALUES
(33, 5, 5.5, '2020-04-15', 6, 1, 80, 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidora`
--

CREATE TABLE `distribuidora` (
  `id_distrib` int(11) NOT NULL,
  `nombre` varchar(75) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `distribuidora`
--

INSERT INTO `distribuidora` (`id_distrib`, `nombre`) VALUES
(1, 'Agroservi'),
(2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_Empleado` int(20) NOT NULL,
  `DUI` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `nombre_usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `foto` mediumblob NOT NULL,
  `correoElectronico` varchar(75) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_Empleado`, `DUI`, `nombres`, `apellidos`, `sexo`, `direccion`, `telefono`, `fecha_nac`, `nombre_usuario`, `contrasena`, `rol`, `foto`, `correoElectronico`) VALUES
(1, '456778', 'ana', 'alvarado', 'femenino', 'san luis', '75223242', '1994-10-14', 'ana12', '1234', 'Secretaria', '', ''),
(2, '35555', 'gggg', 'ffff', 'Masculino', 'tttttttttttttttt', '5555-5555', '2019-11-21', 'zoily', '$2y$10$Dlxg/FB9lo2FY7.lK6159.yP/MY2JAwXz0S2nfTPmrizzZhYroas.', 'Vendedor', 0x433a2f78616d70702f6874646f63732f5665746572696e61726961762d302e312e312f736572766572496d616765732f75736572732f576861747341707020496d61676520323031392d30372d32352061742031312e30392e303720504d2e6a706567, 'accesoriosmya2019@gmail.com'),
(3, '3246', 'diego', 'palacios', 'femenino', 'santa rosa', '435332', '2019-10-15', 'monica02', '', 'Administrador', '', 'monicaalvarado.ues@gmail.com'),
(4, '65789', 'chele', 'peña', 'masculino', 'ghjk', '6789', '2019-06-12', 'chele01', '$2y$10$p5zwzj2e10YGXFwnZCvVV.oR4/2Qnx9640XKC.3fGzGpyks28QZei', 'Secretaria', '', 'monicaalvarado.ues@gmail.com'),
(5, '6435', 'alex', 'romero', 'masculino', 'erefwds', '43223', '2019-11-04', 'alex', '$2y$10$p5zwzj2e10YGXFwnZCvVV.oR4/2Qnx9640XKC.3fGzGpyks28QZei', 'Vendedor', '', 'monicaalvarado.ues@gmail.com'),
(6, '43213333-3', 'Ana', 'Alvarado', 'Femenino', 'san luis', '7525-2222', '2019-11-06', 'norma', '$2y$10$ehMeeVDLnfzis0EEpnXuDOJsF.qI2osakfKbeLXiYUY3I292RWUKS', 'Secretaria', 0x6e6f726d61203134312e4a5047, 'aero@gmail.com'),
(7, '09909099-9', 'norma carolina', 'alvarado', 'Femenino', 'san luis', '7832-0112', '2019-11-06', 'norma01', '$2y$10$Theoh8KuyVuoUQ9C79XT0.JySeQQoXePSfQbOds5kcrPlIyTcIvzW', 'Secretaria', 0x6e6f726d61203231392e4a5047, 'norma@gmail.com'),
(8, '22222222-2', 'mayrelin', 'martinez ', 'Femenino', 'colonia san luis', '7777-7777', '2019-11-05', 'mayrelin', '$2y$10$1jiEp/hdXHGkQALfFeJ8Jequ2bqb7PyrpReJS2kHqT57tXt6kG4tu', 'Vendedor', 0x3538363836353035316e6f726d61203231392e4a5047, 'gi@gmail.com'),
(9, '99999999-0', 'pepito', 'muÃ±uÃ±a', 'Masculino', 'asaber', '8999-8989', '2019-11-12', 'pepito', '$2y$10$cd/NCTaWAH2TuyCZXUHtg.t.O2WgY/CZuPycqUfXpCWfPSrpgmeKK', 'Secretaria', 0x313939323133353837356e6f726d61203231392e4a5047, 'tttt@gmail.com'),
(10, '73737373-7', 'asaber', 'ppopop', 'Femenino', 'san luis', '7282-8282', '2019-11-12', 'asaber', '$2y$10$nOUiK9pV/gjyqWv9iOMOYuzcvDuGp5PI2gTAjt2g5p0RGm3MPwgkG', 'Administrador', 0x666f746f732d3478342d3378332d3578352d766172696f732d656d62616a6164612d70617361706f7274652d362d666f746f732d6361726e65742d445f4e515f4e505f3939303534322d4d4c4133313032303533373939395f3036323031392d462e6a7067, 'gg@gmail.com');

--
-- Disparadores `empleados`
--
DELIMITER $$
CREATE TRIGGER `Agg_usuarios` AFTER INSERT ON `empleados` FOR EACH ROW INSERT INTO usuarios SET id_usuario=new.id_Empleado,
nomUsuario=new.nombre_usuario,
contrasena=new.contrasena,
correoElectronico=new.correoElectronico,
rol=new.rol
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `telFijo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `direccion`, `telFijo`, `estado`) VALUES
(1, 'Gamma Laboratories', 'Avenida Crecencio Miranda', '2121-4300', 'activa'),
(2, 'Laboratorio Clinico para animales', 'San vicente', '7890-4566', '1'),
(3, 'Comida para Perros', 'San Vicente', '6789-0345', '1'),
(4, 'Comida para perro', 'San Vicente', '7857-6764', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `id_especie` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`id_especie`, `nombre`) VALUES
(2, 'Canina'),
(1, 'mamiferos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factcompra`
--

CREATE TABLE `factcompra` (
  `id_factura` int(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_proveedor` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factcompra`
--

INSERT INTO `factcompra` (`id_factura`, `fecha`, `id_proveedor`) VALUES
(40, '2019-11-07 02:32:24', 3),
(41, '2019-11-07 03:07:44', 6),
(42, '2019-11-07 03:24:54', 4),
(47, '2019-11-07 09:41:18', 4),
(48, '2019-11-07 09:46:13', 4),
(53, '2019-11-07 19:05:15', 3),
(54, '2019-11-07 19:05:15', 3),
(57, '2019-11-07 19:08:05', 4),
(58, '2019-11-07 19:09:22', 2),
(59, '2019-11-07 19:09:22', 2),
(60, '2019-11-07 19:20:28', 6),
(61, '2019-11-07 19:23:20', 4),
(62, '2019-11-07 19:23:20', 4),
(63, '2019-11-07 19:31:32', 2),
(64, '2019-11-08 13:57:57', 6),
(65, '2019-11-08 14:40:44', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `margen_ganancia`
--

CREATE TABLE `margen_ganancia` (
  `id_margen` int(20) NOT NULL,
  `porcentaje` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `margen_ganancia`
--

INSERT INTO `margen_ganancia` (`id_margen`, `porcentaje`, `fecha`) VALUES
(1, 10, '2019-11-20'),
(2, 6, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id_mascota` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `alias` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `fechanac` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_raza` int(15) NOT NULL,
  `id_propietario` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id_mascota`, `nombre`, `alias`, `sexo`, `fechanac`, `estado`, `id_raza`, `id_propietario`) VALUES
('DFPC5685', 'Firulais Palacio', 'A0', 'Macho', '2019-10-01', 1, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(20) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `stockMin` int(11) NOT NULL,
  `id_categoria` int(15) NOT NULL,
  `id_UnidMed` int(11) NOT NULL,
  `id_distribuidora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `stockMin`, `id_categoria`, `id_UnidMed`, `id_distribuidora`) VALUES
(6, 'Pastilla hoy', 300, 7, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id_propietario` int(20) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_propietario`, `nombres`, `apellidos`, `sexo`, `direccion`, `telefono`) VALUES
(1, '', 'lopes', 'masculino', 'san rafael', '78392012'),
(2, 'Jose Francisco', 'Romero', 'Masculino', 'Cojutepeque', '7893-4566'),
(3, 'Diego ', 'Palacio', 'Masculino', 'Ilobasco', '7867-6777'),
(4, 'Juan', 'Lopez', 'Masculino', 'ilobasco', '6778-8876');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_empresa` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `telefono`, `correo`, `id_empresa`) VALUES
(1, 'Kelvin Antonio Velasquez', '23456789', 'kelvinvelasquez@gmail.com', 1),
(2, 'Roberto Carlos', '7015-7799', 'Joseroberto@gmail.com', 1),
(3, 'Francisco Romero', '23456799', 'francisco@gmail.com', 1),
(4, 'Gerad Pique', '7015-7723', 'Gerdar@gmail.com', 1),
(5, 'Manual Zenderos', '7011-7723', 'manuelramirez@gmail.com', 1),
(6, 'Jose Maradona', '23457781', 'josemaradona@gmail.com', 1),
(7, 'Juan Antonio', '7890-5678', 'ja@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `id_raza` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_especie` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`id_raza`, `nombre`, `id_especie`) VALUES
(1, 'gatitoss', 1),
(2, 'Pug', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id_receta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `medicamento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dosis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidmedida`
--

CREATE TABLE `unidmedida` (
  `id_unidMed` int(20) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `unidmedida`
--

INSERT INTO `unidmedida` (`id_unidMed`, `descripcion`) VALUES
(1, 'Libra'),
(2, 'Litro'),
(3, 'tableta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(20) NOT NULL,
  `nomUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correoElectronico` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nomUsuario`, `contrasena`, `rol`, `correoElectronico`) VALUES
(2, 'admin', '$2y$10$p5zwzj2e10YGXFwnZCvVV.oR4/2Qnx9640XKC.3fGzGpyks28QZei', 'Secretaria', 'monicaalvarado.ues@gmail.com'),
(3, 'admin3', '$2y$10$p5zwzj2e10YGXFwnZCvVV.oR4/2Qnx9640XKC.3fGzGpyks28QZei', 'Vendedor', 'monicaalvarado.ues@gmail.com'),
(5, 'monica01', '$2y$10$p5zwzj2e10YGXFwnZCvVV.oR4/2Qnx9640XKC.3fGzGpyks28QZei', 'Administrador', 'monicaalvarado.ues@gmail.com'),
(6, 'monica02', '$2y$10$p5zwzj2e10YGXFwnZCvVV.oR4/2Qnx9640XKC.3fGzGpyks28QZei', 'Administrador', 'monicaalvarado.ues@gmail.com'),
(7, 'chele01', '$2y$10$p5zwzj2e10YGXFwnZCvVV.oR4/2Qnx9640XKC.3fGzGpyks28QZei', 'Secretaria', 'monicaalvarado.ues@gmail.com'),
(8, 'alex', '$2y$10$p5zwzj2e10YGXFwnZCvVV.oR4/2Qnx9640XKC.3fGzGpyks28QZei', 'Vendedor', 'monicaalvarado.ues@gmail.com'),
(9, 'pepito', '$2y$10$cd/NCTaWAH2TuyCZXUHtg.t.O2WgY/CZuPycqUfXpCWfPSrpgmeKK', 'Secretaria', 'tttt@gmail.com'),
(10, 'asaber', '$2y$10$nOUiK9pV/gjyqWv9iOMOYuzcvDuGp5PI2gTAjt2g5p0RGm3MPwgkG', 'Administrador', 'gg@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(20) NOT NULL,
  `num_factura` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_empleado` int(15) NOT NULL,
  `id_propietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitcirugias`
--
ALTER TABLE `bitcirugias`
  ADD PRIMARY KEY (`id_bitCirug`),
  ADD UNIQUE KEY `id_bitCirug` (`id_bitCirug`);

--
-- Indices de la tabla `bitcitas`
--
ALTER TABLE `bitcitas`
  ADD PRIMARY KEY (`id_bitCitas`),
  ADD UNIQUE KEY `id_bitCitas` (`id_bitCitas`);

--
-- Indices de la tabla `bitcompras`
--
ALTER TABLE `bitcompras`
  ADD PRIMARY KEY (`id_bitCompras`),
  ADD UNIQUE KEY `id_bitCompras` (`id_bitCompras`);

--
-- Indices de la tabla `bitexpediente`
--
ALTER TABLE `bitexpediente`
  ADD PRIMARY KEY (`id_bitExp`),
  ADD UNIQUE KEY `id_bitExp` (`id_bitExp`);

--
-- Indices de la tabla `bitpersonal`
--
ALTER TABLE `bitpersonal`
  ADD PRIMARY KEY (`id_bitPersonal`),
  ADD UNIQUE KEY `id_bitPersonal` (`id_bitPersonal`);

--
-- Indices de la tabla `bitproveedores`
--
ALTER TABLE `bitproveedores`
  ADD PRIMARY KEY (`id_bitProveedores`),
  ADD UNIQUE KEY `id_bitProveedores` (`id_bitProveedores`);

--
-- Indices de la tabla `bitservicios`
--
ALTER TABLE `bitservicios`
  ADD PRIMARY KEY (`id_bitServicio`),
  ADD UNIQUE KEY `id_bitServicio` (`id_bitServicio`);

--
-- Indices de la tabla `bitventas`
--
ALTER TABLE `bitventas`
  ADD PRIMARY KEY (`id_bitVentas`),
  ADD UNIQUE KEY `id_bitVentas` (`id_bitVentas`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`) USING BTREE,
  ADD UNIQUE KEY `id_categoria` (`id_categoria`) USING BTREE;

--
-- Indices de la tabla `cirugia`
--
ALTER TABLE `cirugia`
  ADD PRIMARY KEY (`id_cirugia`) USING BTREE;

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD UNIQUE KEY `id_cita` (`id_cita`) USING BTREE,
  ADD KEY `fk_idEmpleado` (`id_empleado`),
  ADD KEY `fk_idMascota` (`id_mascota`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_servicio_2` (`id_servicio`);

--
-- Indices de la tabla `codrecup`
--
ALTER TABLE `codrecup`
  ADD PRIMARY KEY (`idCodRecup`),
  ADD KEY `fk_idUsuario` (`idusuario`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD UNIQUE KEY `id_consulta` (`id_consulta`),
  ADD KEY `id_Cita` (`id_cita`) USING BTREE,
  ADD KEY `fk_id_receta` (`id_receta`),
  ADD KEY `id_Servicio` (`id_Servicio`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `datosclinica`
--
ALTER TABLE `datosclinica`
  ADD PRIMARY KEY (`id_DatClinica`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id_detVenta`),
  ADD UNIQUE KEY `id_detVenta` (`id_detVenta`),
  ADD KEY `fk_id_venta` (`id_venta`),
  ADD KEY `id_detProducto` (`id_detProducto`);

--
-- Indices de la tabla `detcirugia`
--
ALTER TABLE `detcirugia`
  ADD PRIMARY KEY (`id_detCirug`),
  ADD UNIQUE KEY `id_detCirug` (`id_detCirug`),
  ADD KEY `fk_id_cirugia` (`id_cirugia`),
  ADD KEY `fk_idEmp` (`id_Empleado`),
  ADD KEY `fk_idMascota` (`id_Mascota`);

--
-- Indices de la tabla `detproductos`
--
ALTER TABLE `detproductos`
  ADD PRIMARY KEY (`id_detProd`),
  ADD UNIQUE KEY `id_detProd` (`id_detProd`),
  ADD KEY `fk_idMargen` (`id_margen`),
  ADD KEY `fk_idProducto` (`id_producto`),
  ADD KEY `id_facturaComp` (`id_facturaComp`);

--
-- Indices de la tabla `distribuidora`
--
ALTER TABLE `distribuidora`
  ADD PRIMARY KEY (`id_distrib`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_Empleado`),
  ADD UNIQUE KEY `id_Empleado` (`id_Empleado`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`id_especie`),
  ADD UNIQUE KEY `id_especie` (`id_especie`),
  ADD UNIQUE KEY `inde` (`nombre`);

--
-- Indices de la tabla `factcompra`
--
ALTER TABLE `factcompra`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `id_factura` (`id_factura`),
  ADD KEY `fk_idProveedor` (`id_proveedor`);

--
-- Indices de la tabla `margen_ganancia`
--
ALTER TABLE `margen_ganancia`
  ADD PRIMARY KEY (`id_margen`),
  ADD UNIQUE KEY `id_margen` (`id_margen`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `fk_idProp` (`id_propietario`),
  ADD KEY `fk_idRaza` (`id_raza`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `id_producto` (`id_producto`),
  ADD KEY `fk_IdCateg` (`id_categoria`),
  ADD KEY `id_UnidMed` (`id_UnidMed`),
  ADD KEY `productos_ibfk_3` (`id_distribuidora`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_propietario`),
  ADD UNIQUE KEY `id_propietario` (`id_propietario`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `fk_IdEmpresa` (`id_empresa`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`id_raza`),
  ADD UNIQUE KEY `id_raza` (`id_raza`),
  ADD UNIQUE KEY `inde` (`nombre`),
  ADD KEY `fk_idEsp` (`id_especie`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id_receta`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD UNIQUE KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `unidmedida`
--
ALTER TABLE `unidmedida`
  ADD PRIMARY KEY (`id_unidMed`),
  ADD UNIQUE KEY `id_unidMed` (`id_unidMed`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD UNIQUE KEY `id_venta` (`id_venta`) USING BTREE,
  ADD KEY `fk_idEmple` (`id_empleado`) USING BTREE,
  ADD KEY `fk_idPropietario` (`id_propietario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitcirugias`
--
ALTER TABLE `bitcirugias`
  MODIFY `id_bitCirug` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitcitas`
--
ALTER TABLE `bitcitas`
  MODIFY `id_bitCitas` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitcompras`
--
ALTER TABLE `bitcompras`
  MODIFY `id_bitCompras` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitexpediente`
--
ALTER TABLE `bitexpediente`
  MODIFY `id_bitExp` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitpersonal`
--
ALTER TABLE `bitpersonal`
  MODIFY `id_bitPersonal` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitproveedores`
--
ALTER TABLE `bitproveedores`
  MODIFY `id_bitProveedores` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitservicios`
--
ALTER TABLE `bitservicios`
  MODIFY `id_bitServicio` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitventas`
--
ALTER TABLE `bitventas`
  MODIFY `id_bitVentas` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cirugia`
--
ALTER TABLE `cirugia`
  MODIFY `id_cirugia` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datosclinica`
--
ALTER TABLE `datosclinica`
  MODIFY `id_DatClinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id_detVenta` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detproductos`
--
ALTER TABLE `detproductos`
  MODIFY `id_detProd` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `distribuidora`
--
ALTER TABLE `distribuidora`
  MODIFY `id_distrib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_Empleado` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `id_especie` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factcompra`
--
ALTER TABLE `factcompra`
  MODIFY `id_factura` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `margen_ganancia`
--
ALTER TABLE `margen_ganancia`
  MODIFY `id_margen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id_propietario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `id_raza` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidmedida`
--
ALTER TABLE `unidmedida`
  MODIFY `id_unidMed` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_Empleado`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`);

--
-- Filtros para la tabla `codrecup`
--
ALTER TABLE `codrecup`
  ADD CONSTRAINT `codrecup_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`id_Servicio`) REFERENCES `servicios` (`id_servicio`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`),
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`id_detProducto`) REFERENCES `detproductos` (`id_detProd`);

--
-- Filtros para la tabla `detcirugia`
--
ALTER TABLE `detcirugia`
  ADD CONSTRAINT `detcirugia_ibfk_1` FOREIGN KEY (`id_Mascota`) REFERENCES `mascotas` (`id_mascota`),
  ADD CONSTRAINT `detcirugia_ibfk_2` FOREIGN KEY (`id_cirugia`) REFERENCES `cirugia` (`id_cirugia`),
  ADD CONSTRAINT `detcirugia_ibfk_3` FOREIGN KEY (`id_Empleado`) REFERENCES `empleados` (`id_Empleado`);

--
-- Filtros para la tabla `detproductos`
--
ALTER TABLE `detproductos`
  ADD CONSTRAINT `detproductos_ibfk_1` FOREIGN KEY (`id_margen`) REFERENCES `margen_ganancia` (`id_margen`),
  ADD CONSTRAINT `detproductos_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detproductos_ibfk_4` FOREIGN KEY (`id_facturaComp`) REFERENCES `factcompra` (`id_factura`);

--
-- Filtros para la tabla `factcompra`
--
ALTER TABLE `factcompra`
  ADD CONSTRAINT `factcompra_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`),
  ADD CONSTRAINT `mascotas_ibfk_2` FOREIGN KEY (`id_raza`) REFERENCES `raza` (`id_raza`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_UnidMed`) REFERENCES `unidmedida` (`id_unidMed`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`id_distribuidora`) REFERENCES `distribuidora` (`id_distrib`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `raza`
--
ALTER TABLE `raza`
  ADD CONSTRAINT `raza_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `especies` (`id_especie`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`id_receta`) REFERENCES `consulta` (`id_receta`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_Empleado`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
