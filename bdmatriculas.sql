-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2024 a las 07:40:25
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
-- Base de datos: `bdmatriculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopago`
--

CREATE TABLE `estadopago` (
  `id_estado_pago` int(11) NOT NULL,
  `id_estudiante_estado_pago` int(11) DEFAULT NULL,
  `id_pago_estado_pago` int(11) DEFAULT NULL,
  `descripcion_estado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `id_persona_estudiante` int(11) NOT NULL,
  `id_periodo_lectivo_estudiante` int(11) NOT NULL,
  `id_programa_estudios_estudiante` int(11) NOT NULL,
  `fecha_registro_estudiante` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `fecha_matricula` date DEFAULT NULL,
  `id_estudiante_matricula` int(11) DEFAULT NULL,
  `id_periodo_lectivo_matricula` int(11) DEFAULT NULL,
  `id_periodo_academico_matricula` int(11) DEFAULT NULL,
  `id_programa_matricula` int(11) DEFAULT NULL,
  `id_plan_matricula` int(11) DEFAULT NULL,
  `id_unidad_didactica_matricula` int(11) DEFAULT NULL,
  `id_pago_matricula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `monto_pago` double DEFAULT NULL,
  `modalidad_pago` varchar(20) DEFAULT NULL,
  `numero_operacion_pago` varchar(20) DEFAULT NULL,
  `id_tupa_pago` int(11) DEFAULT NULL,
  `id_estudiante_pago` int(11) DEFAULT NULL,
  `id_periodo_lectivo_pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodoacademico`
--

CREATE TABLE `periodoacademico` (
  `id_periodo_academico` int(11) NOT NULL,
  `nombre_periodo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodolectivo`
--

CREATE TABLE `periodolectivo` (
  `id_periodo_lectivo` int(11) NOT NULL,
  `nombre_periodo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `tipo_documento_identidad_persona` varchar(50) NOT NULL,
  `nro_documento_persona` int(11) NOT NULL,
  `primer_nombre_persona` varchar(30) NOT NULL,
  `segundo_nombre_persona` varchar(30) DEFAULT NULL,
  `tercer_nombre_persona` varchar(30) DEFAULT NULL,
  `primer_apellido_persona` varchar(30) NOT NULL,
  `segundo_apellido_persona` varchar(30) NOT NULL,
  `sexo_persona` char(1) NOT NULL,
  `fecha_nacimiento_persona` date NOT NULL,
  `celular_persona` int(11) NOT NULL,
  `correo_persona` varchar(100) NOT NULL,
  `direccion_persona` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `tipo_documento_identidad_persona`, `nro_documento_persona`, `primer_nombre_persona`, `segundo_nombre_persona`, `tercer_nombre_persona`, `primer_apellido_persona`, `segundo_apellido_persona`, `sexo_persona`, `fecha_nacimiento_persona`, `celular_persona`, `correo_persona`, `direccion_persona`) VALUES
(1, '', 43001122, 'Carlos', 'Luis', NULL, 'Rivera', 'Gonzales', 'F', '1986-01-07', 999526333, 'crivera@gmail.com', 'Calle Los Geranios 258');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planestudios`
--

CREATE TABLE `planestudios` (
  `id_plan` int(11) NOT NULL,
  `nombre_plan` varchar(10) NOT NULL,
  `descripcion_plan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `id_postulante` int(11) NOT NULL,
  `id_persona_postulante` int(11) NOT NULL,
  `anio_admision_postulante` int(11) NOT NULL,
  `colegio_procedencia_postulante` varchar(100) NOT NULL,
  `primera_opcion_postulante` varchar(80) NOT NULL,
  `segunda_opcion_postulante` varchar(80) NOT NULL,
  `dni_foto_postulante` text DEFAULT NULL,
  `pago_postulante` text DEFAULT NULL,
  `foto_postulante` text DEFAULT NULL,
  `certificado_estudios_postulante` text DEFAULT NULL,
  `partida_nacimiento_postulante` text DEFAULT NULL,
  `declaracion_jurada_postulante` text DEFAULT NULL,
  `fecha_registro_postulante` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaestudios`
--

CREATE TABLE `programaestudios` (
  `id_programa` int(11) NOT NULL,
  `abreviatura_programa` varchar(6) NOT NULL,
  `nombre_programa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tupa`
--

CREATE TABLE `tupa` (
  `id_tupa` int(11) NOT NULL,
  `descripcion_tupa` varchar(30) DEFAULT NULL,
  `monto_tupa` decimal(10,0) DEFAULT NULL,
  `fecha_tupa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidaddidactica`
--

CREATE TABLE `unidaddidactica` (
  `id_unidad` int(11) NOT NULL,
  `nombre_unidad` varchar(100) NOT NULL,
  `abreviatura_unidad` varchar(6) NOT NULL,
  `id_plan_unidad` int(11) DEFAULT NULL,
  `programa_estudios_unidad` varchar(100) DEFAULT NULL,
  `modulo_unidad` char(3) DEFAULT NULL,
  `tipo_unidad` varchar(15) DEFAULT NULL,
  `periodo_academico_unidad` varchar(3) DEFAULT NULL,
  `creditos_teoricos_unidad` int(11) NOT NULL,
  `creditos_practicas_unidad` int(11) NOT NULL,
  `creditos_totales_unidad` int(11) NOT NULL,
  `horas_teoricas_unidad` int(11) NOT NULL,
  `horas_practicas_unidad` int(11) NOT NULL,
  `horas_totales_unidad` int(11) NOT NULL,
  `horas_semanales_unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario_usuario` varchar(8) DEFAULT NULL,
  `contrasena_usuario` varchar(10) DEFAULT NULL,
  `fecha_creacion_usuario` timestamp NULL DEFAULT current_timestamp(),
  `tipo_usuario` varchar(20) DEFAULT NULL,
  `id_persona_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario_usuario`, `contrasena_usuario`, `fecha_creacion_usuario`, `tipo_usuario`, `id_persona_usuario`) VALUES
(1, '43001122', '123456', '2024-08-13 04:24:45', 'Administrador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estadopago`
--
ALTER TABLE `estadopago`
  ADD PRIMARY KEY (`id_estado_pago`),
  ADD KEY `id_estudiante_estado_pago` (`id_estudiante_estado_pago`),
  ADD KEY `id_pago_estado_pago` (`id_pago_estado_pago`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `id_persona_estudiante` (`id_persona_estudiante`),
  ADD KEY `id_periodo_lectivo_estudiante` (`id_periodo_lectivo_estudiante`),
  ADD KEY `id_programa_estudios_estudiante` (`id_programa_estudios_estudiante`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `id_estudiante_matricula` (`id_estudiante_matricula`),
  ADD KEY `id_periodo_lectivo_matricula` (`id_periodo_lectivo_matricula`),
  ADD KEY `id_periodo_academico_matricula` (`id_periodo_academico_matricula`),
  ADD KEY `id_programa_matricula` (`id_programa_matricula`),
  ADD KEY `id_plan_matricula` (`id_plan_matricula`),
  ADD KEY `id_unidad_didactica_matricula` (`id_unidad_didactica_matricula`),
  ADD KEY `id_pago_matricula` (`id_pago_matricula`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_tupa_pago` (`id_tupa_pago`),
  ADD KEY `id_estudiante_pago` (`id_estudiante_pago`),
  ADD KEY `id_periodo_lectivo_pago` (`id_periodo_lectivo_pago`);

--
-- Indices de la tabla `periodoacademico`
--
ALTER TABLE `periodoacademico`
  ADD PRIMARY KEY (`id_periodo_academico`);

--
-- Indices de la tabla `periodolectivo`
--
ALTER TABLE `periodolectivo`
  ADD PRIMARY KEY (`id_periodo_lectivo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `DNI_persona` (`nro_documento_persona`);

--
-- Indices de la tabla `planestudios`
--
ALTER TABLE `planestudios`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`id_postulante`),
  ADD KEY `id_persona_postulante` (`id_persona_postulante`);

--
-- Indices de la tabla `programaestudios`
--
ALTER TABLE `programaestudios`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `tupa`
--
ALTER TABLE `tupa`
  ADD PRIMARY KEY (`id_tupa`);

--
-- Indices de la tabla `unidaddidactica`
--
ALTER TABLE `unidaddidactica`
  ADD PRIMARY KEY (`id_unidad`),
  ADD KEY `id_plan_unidad` (`id_plan_unidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_persona_usuario` (`id_persona_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estadopago`
--
ALTER TABLE `estadopago`
  MODIFY `id_estado_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodoacademico`
--
ALTER TABLE `periodoacademico`
  MODIFY `id_periodo_academico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodolectivo`
--
ALTER TABLE `periodolectivo`
  MODIFY `id_periodo_lectivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `planestudios`
--
ALTER TABLE `planestudios`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `id_postulante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programaestudios`
--
ALTER TABLE `programaestudios`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tupa`
--
ALTER TABLE `tupa`
  MODIFY `id_tupa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidaddidactica`
--
ALTER TABLE `unidaddidactica`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estadopago`
--
ALTER TABLE `estadopago`
  ADD CONSTRAINT `estadopago_ibfk_1` FOREIGN KEY (`id_estudiante_estado_pago`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `estadopago_ibfk_2` FOREIGN KEY (`id_pago_estado_pago`) REFERENCES `pago` (`id_pago`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_persona_estudiante`) REFERENCES `persona` (`id_persona`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`id_periodo_lectivo_estudiante`) REFERENCES `periodolectivo` (`id_periodo_lectivo`),
  ADD CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`id_programa_estudios_estudiante`) REFERENCES `programaestudios` (`id_programa`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id_estudiante_matricula`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`id_periodo_lectivo_matricula`) REFERENCES `periodolectivo` (`id_periodo_lectivo`),
  ADD CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`id_periodo_academico_matricula`) REFERENCES `periodoacademico` (`id_periodo_academico`),
  ADD CONSTRAINT `matricula_ibfk_4` FOREIGN KEY (`id_programa_matricula`) REFERENCES `programaestudios` (`id_programa`),
  ADD CONSTRAINT `matricula_ibfk_5` FOREIGN KEY (`id_plan_matricula`) REFERENCES `planestudios` (`id_plan`),
  ADD CONSTRAINT `matricula_ibfk_6` FOREIGN KEY (`id_unidad_didactica_matricula`) REFERENCES `unidaddidactica` (`id_unidad`),
  ADD CONSTRAINT `matricula_ibfk_7` FOREIGN KEY (`id_pago_matricula`) REFERENCES `pago` (`id_pago`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_tupa_pago`) REFERENCES `tupa` (`id_tupa`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`id_estudiante_pago`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `pago_ibfk_3` FOREIGN KEY (`id_periodo_lectivo_pago`) REFERENCES `periodolectivo` (`id_periodo_lectivo`);

--
-- Filtros para la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD CONSTRAINT `postulante_ibfk_1` FOREIGN KEY (`id_persona_postulante`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `unidaddidactica`
--
ALTER TABLE `unidaddidactica`
  ADD CONSTRAINT `unidaddidactica_ibfk_1` FOREIGN KEY (`id_plan_unidad`) REFERENCES `planestudios` (`id_plan`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_persona_usuario`) REFERENCES `persona` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
