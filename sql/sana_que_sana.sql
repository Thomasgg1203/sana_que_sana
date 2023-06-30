-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-06-2023 a las 06:08:05
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sana_que_sana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `emp_id` int(11) NOT NULL,
  `emp_tipo_id` int(11) DEFAULT NULL,
  `emp_nombre` varchar(30) DEFAULT NULL,
  `emp_direccion` varchar(50) DEFAULT NULL,
  `emp_telefono` varchar(12) DEFAULT NULL,
  `emp_ciudad` varchar(30) DEFAULT NULL,
  `emp_departamento` varchar(30) DEFAULT NULL,
  `emp_codigo_postal` varchar(30) NOT NULL,
  `emp_cedula` varchar(30) NOT NULL,
  `emp_seguridad_social` varchar(40) DEFAULT NULL,
  `emp_matricula_profesional` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`emp_id`, `emp_tipo_id`, `emp_nombre`, `emp_direccion`, `emp_telefono`, `emp_ciudad`, `emp_departamento`, `emp_codigo_postal`, `emp_cedula`, `emp_seguridad_social`, `emp_matricula_profesional`) VALUES
(1, 1, 'Arturo', 'Calle 54c 12a  70', '3216977445', 'Manizales', '', '2', 'Cedula1', '2123123', 'Odontologo'),
(2, 2, 'Beatriz', 'Direccion2', '3216977446', 'Ciudad2', 'Departamento2', 'CodigoPostal2', 'Cedula2', 'SegSocial2', 'Matricula2'),
(3, 3, 'Carlos', 'Direccion3', '3216977447', 'Ciudad3', 'Departamento3', 'CodigoPostal3', 'Cedula3', 'SegSocial3', 'Matricula3'),
(4, 4, 'Diana', 'Direccion4', '3216977448', 'Ciudad4', 'Departamento4', 'CodigoPostal4', 'Cedula4', 'SegSocial4', 'Matricula4'),
(5, 5, 'Enrique', 'Direccion5', '3216977449', 'Ciudad5', 'Departamento5', 'CodigoPostal5', 'Cedula5', 'SegSocial5', 'Matricula5'),
(6, 6, 'Fernanda', 'Direccion6', '3216977450', 'Ciudad6', 'Departamento6', 'CodigoPostal6', 'Cedula6', 'SegSocial6', 'Matricula6'),
(7, 7, 'Gabriel', 'Direccion7', '3216977451', 'Ciudad7', 'Departamento7', 'CodigoPostal7', 'Cedula7', 'SegSocial7', 'Matricula7'),
(8, 8, 'Hugo', 'Direccion8', '3216977452', 'Ciudad8', 'Departamento8', 'CodigoPostal8', 'Cedula8', 'SegSocial8', 'Matricula8'),
(10, 3, 'Thomas', 'Calle 54c 12a  69', '3216977400', 'Manizales', 'Caldas', '4000123', '1002652452', '1', 'matricula4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `hora_id` int(11) NOT NULL,
  `hora_emp_id` int(11) DEFAULT NULL,
  `hora_dia_semana` varchar(30) DEFAULT NULL,
  `hora_inicio` date NOT NULL,
  `hora_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `pace_id` int(11) NOT NULL,
  `pace_emp_id` int(11) DEFAULT NULL,
  `pace_nombre` varchar(30) DEFAULT NULL,
  `pace_direccion` varchar(30) DEFAULT NULL,
  `pace_telefono` varchar(30) DEFAULT NULL,
  `pace_codigo_postal` varchar(12) DEFAULT NULL,
  `pace_cedula` varchar(14) DEFAULT NULL,
  `pace_seguridad_social` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos_vacaciones`
--

CREATE TABLE `periodos_vacaciones` (
  `peri_id` int(11) NOT NULL,
  `peri_emp_id` int(11) DEFAULT NULL,
  `peri_fecha_inicio` date DEFAULT NULL,
  `peri_fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustituciones`
--

CREATE TABLE `sustituciones` (
  `sus_id` int(11) NOT NULL,
  `sus_emp_id` int(11) DEFAULT NULL,
  `sus_fecha_alta` date DEFAULT NULL,
  `sus_fecha_baja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_empleados`
--

CREATE TABLE `tipos_empleados` (
  `tipo_id` int(11) NOT NULL,
  `tipo_empleado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_empleados`
--

INSERT INTO `tipos_empleados` (`tipo_id`, `tipo_empleado`) VALUES
(1, 'Medico Titular'),
(2, 'Medico Interino'),
(3, 'Medico Sustituto'),
(4, 'ATS'),
(5, 'ATS de Zona'),
(6, 'Auxiliares de Enfermeria'),
(7, 'Celadores'),
(8, 'Administrativos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_tipo_id` (`emp_tipo_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`hora_id`),
  ADD KEY `hora_emp_id` (`hora_emp_id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`pace_id`),
  ADD KEY `pace_emp_id` (`pace_emp_id`);

--
-- Indices de la tabla `periodos_vacaciones`
--
ALTER TABLE `periodos_vacaciones`
  ADD PRIMARY KEY (`peri_id`),
  ADD KEY `peri_emp_id` (`peri_emp_id`);

--
-- Indices de la tabla `sustituciones`
--
ALTER TABLE `sustituciones`
  ADD PRIMARY KEY (`sus_id`),
  ADD KEY `sus_emp_id` (`sus_emp_id`);

--
-- Indices de la tabla `tipos_empleados`
--
ALTER TABLE `tipos_empleados`
  ADD PRIMARY KEY (`tipo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `hora_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `pace_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodos_vacaciones`
--
ALTER TABLE `periodos_vacaciones`
  MODIFY `peri_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sustituciones`
--
ALTER TABLE `sustituciones`
  MODIFY `sus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_empleados`
--
ALTER TABLE `tipos_empleados`
  MODIFY `tipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`emp_tipo_id`) REFERENCES `tipos_empleados` (`tipo_id`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`hora_emp_id`) REFERENCES `empleados` (`emp_id`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`pace_emp_id`) REFERENCES `empleados` (`emp_id`);

--
-- Filtros para la tabla `periodos_vacaciones`
--
ALTER TABLE `periodos_vacaciones`
  ADD CONSTRAINT `periodos_vacaciones_ibfk_1` FOREIGN KEY (`peri_emp_id`) REFERENCES `empleados` (`emp_id`);

--
-- Filtros para la tabla `sustituciones`
--
ALTER TABLE `sustituciones`
  ADD CONSTRAINT `sustituciones_ibfk_1` FOREIGN KEY (`sus_emp_id`) REFERENCES `empleados` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
