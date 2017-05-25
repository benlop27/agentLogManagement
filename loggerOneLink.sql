-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-05-2017 a las 04:42:06
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `loggerOneLink`
--

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nombre_area`, `descripcion_area`, `activo_area`, `id_departamento`) VALUES
(1, 'telefonia y internet', 'tele zwchartz', 1, 1),
(2, 'quejas', 'de soporte', 1, 1);

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`, `descripcion_cargo`) VALUES
(1, 'agente', 'agente'),
(2, 'supervisor', 'supervisor'),
(3, 'administrador', 'administrador');

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `nombre_cuenta`, `descripcion_cuenta`, `activo_cuenta`, `id_area`) VALUES
(1, 'claro', 'claro sv', 1, 1);

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`, `descripcion_departamento`, `activo_departamento`) VALUES
(1, 'Soporte Tecnico', 'Siporte', 1),
(2, 'Ventas', 'Departamento de ventas ', 1),
(5, 'covifa', 'afs', 0);

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre_empleado`, `telefono_empleado`, `direcion_empleado`, `fecha_entrada_empledo`, `activo_empleado`, `id_cargo`, `id_cuenta`) VALUES
(5, 'Benjamin', '28831', 'el congo', '2019-01-02', 1, 3, 1),
(6, 'carlos', 'asfasf', 'sadfasf', '2017-05-06', 1, 1, 1),
(7, 'sup', 'asd', 'sadad', '2017-05-10', 1, 2, 1),
(8, 'empleado', '123', 'sta ana', '2017-05-10', 1, 1, 1);

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `descripcion_estado`, `id_empleado`, `id_tipo_estado`, `fecha_estado`, `tiempo_estado`) VALUES
(2, 'Login', 5, 1, '2017-03-12 04:12:22', NULL),
(25, NULL, 6, 1, '2017-05-24 15:00:00', NULL),
(26, NULL, 6, 2, '2017-05-24 15:00:00', NULL),
(27, NULL, 6, 3, '2017-05-24 15:32:06', NULL),
(29, NULL, 6, 1, '2017-05-24 15:51:07', NULL),
(30, NULL, 6, 2, '2017-05-24 16:03:13', NULL),
(31, NULL, 6, 3, '2017-05-24 16:54:47', NULL),
(32, NULL, 6, 1, '2017-05-24 16:54:54', NULL),
(33, NULL, 6, 3, '2017-05-24 17:18:31', '00:23:37'),
(34, NULL, 6, 2, '2017-05-24 17:18:38', '00:00:07'),
(35, NULL, 6, 2, '2017-05-24 17:18:44', '00:00:06'),
(36, NULL, 6, 3, '2017-05-24 17:18:53', '00:00:09'),
(37, NULL, 8, 1, '2017-05-24 19:23:34', '00:00:00'),
(38, NULL, 8, 3, '2017-05-24 19:30:59', '00:07:25');

--
-- Volcado de datos para la tabla `tipo_estado`
--

INSERT INTO `tipo_estado` (`id_tipo_estado`, `nombre_tipo_estado`, `descripcion_tipo_estado`) VALUES
(1, 'En Linea', 'Agente está en linea'),
(2, 'En Llamada', 'Agente está en llamada'),
(3, 'Desconectado', 'Agente está desconectado');

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nickname_usuario`, `password_usuario`, `descripcion_usuario`, `activo_usuario`, `id_empleado`) VALUES
(9, 'benlop27', 'sie1997', 'hdfaa', 0, 5),
(10, 'carlos', '1234', 'carlos probar', 1, 6),
(11, 'sup', '123', 'supusuario', 1, 7),
(12, 'empleado', 'sie1997', 'agente de prueba', 1, 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
