create database bdacademicov3;
use bdacademicov3;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2024 a las 15:59:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
  `id_postulante_estudiante` int(11) NOT NULL,
  `id_periodo_lectivo_estudiante` int(11) NOT NULL,
  `id_programa_estudios_estudiante` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_registro_estudiante` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `id_postulante_estudiante`, `id_periodo_lectivo_estudiante`, `id_programa_estudios_estudiante`, `estado`, `fecha_registro_estudiante`) VALUES
(1, 1, 2, 3, 1, '2024-10-22 07:56:33'),
(2, 4, 3, 2, 1, '2024-10-22 08:46:04'),
(3, 5, 3, 3, 1, '2024-10-22 09:17:05'),
(4, 6, 1, 2, 1, '2024-10-22 21:23:37'),
(5, 7, 2, 1, 1, '2024-10-25 12:44:46');

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
  `id_estudiante_pago` int(11) DEFAULT NULL,
  `id_tupa_pago` int(11) DEFAULT NULL,
  `concepto` varchar(100) NOT NULL,
  `monto_pago` double DEFAULT NULL,
  `modalidad_pago` varchar(20) DEFAULT NULL,
  `numero_operacion_pago` varchar(20) DEFAULT NULL,
  `id_periodo_lectivo_pago` int(11) DEFAULT NULL,
  `fecha_pago` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodoacademico`
--

CREATE TABLE `periodoacademico` (
  `id_periodo_academico` int(11) NOT NULL,
  `nombre_periodo` varchar(10) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `periodoacademico`
--

INSERT INTO `periodoacademico` (`id_periodo_academico`, `nombre_periodo`, `estado`) VALUES
(1, '', 1),
(2, '', 1),
(3, 'I', 1),
(4, 'II', 1),
(5, 'III', 1),
(6, 'IV', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodolectivo`
--

CREATE TABLE `periodolectivo` (
  `id_periodo_lectivo` int(11) NOT NULL,
  `nombre_periodo` varchar(10) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `periodolectivo`
--

INSERT INTO `periodolectivo` (`id_periodo_lectivo`, `nombre_periodo`, `estado`) VALUES
(1, '2024-I', 0),
(2, '2024-II', 0),
(3, '2025-I', 0),
(4, '2025-II', 0),
(6, '2026-I', 1),
(7, '2026-II', 1),
(8, '2027-I', 1);

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
  `direccion_persona` varchar(100) NOT NULL,
  `fecha_registro_persona` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `tipo_documento_identidad_persona`, `nro_documento_persona`, `primer_nombre_persona`, `segundo_nombre_persona`, `tercer_nombre_persona`, `primer_apellido_persona`, `segundo_apellido_persona`, `sexo_persona`, `fecha_nacimiento_persona`, `celular_persona`, `correo_persona`, `direccion_persona`, `fecha_registro_persona`) VALUES
(1, '', 43001122, 'Carlos', 'Luis', NULL, 'Rivera', 'Gonzales', 'F', '1986-01-07', 999526333, 'crivera@gmail.com', 'Calle Los Geranios 258', '2024-10-20 07:57:14'),
(2, 'DNI', 40225522, 'Carlos', 'Luis', '', 'Silva', 'Arce', 'M', '2009-01-29', 999985895, 'carlos@gmail.com', '', '2024-10-20 07:57:14'),
(3, 'DNI', 71228922, 'CIELO', 'LIZ', '', 'CERNA', 'PONCE', 'F', '2011-07-07', 999321654, 'cielo@gmail.com', 'Av. Torres 456', '2024-10-20 09:00:14'),
(4, 'DNI', 77820011, 'LIAM', 'MANUEL', 'ELIAS', 'TELLO', 'PERALTA', 'F', '2004-02-06', 985222000, 'LIAM@GMAIL.COM', 'SAN ANDRES 4TA ETAPA MZ A45 LOTE 3', '2024-10-20 09:31:21'),
(5, 'DNI', 41425522, 'DIANA', 'LUZ', 'CELESTE', 'JUAREZ', 'VILLAR', 'F', '2008-02-01', 999555222, 'DIANA@GMAIL.COM', 'PSJ CORAL 789', '2024-10-20 09:50:27'),
(6, 'CARNET EXT.', 951620789, 'CESAR', 'SANTA', 'MARIA', 'PEREZ', 'RODRIGUEZ', 'M', '2008-11-08', 995252631, 'CESARRODRIGUEZ@GMAIL.COM', 'URB. SANTA INEZ 8954', '2024-10-20 10:00:22'),
(7, 'DNI', 77115896, 'DANIEL ', 'ALEJANDRO', 'ANGEL', 'VELIZ', 'PAREDES', 'M', '2009-10-08', 999478512, 'DANIELVELIZ@GMAIL.COM', 'CALLE LAS ESMERALDAS 895 , SANTA INES', '2024-10-20 10:18:20'),
(8, 'DNI', 44789652, 'DANIELA', '', '', 'URIARTE', 'BELO', 'F', '2011-12-17', 90545623, 'DANIELAURIARTE@GMAIL.COM', 'CALLE SIN NUMERO', '2024-10-20 10:34:54'),
(10, 'DNI', 71720330, 'VALERIA', '', '', 'CRUZ', 'CRUZ', 'F', '2012-06-06', 995621235, 'VALERIACRUZ@GMAIL.COM', 'SAN ANDRES', '2024-10-20 11:05:40'),
(11, 'DNI', 80258900, 'LUCY', '', '', 'RAMIREZ', 'CUELLAR', 'F', '2024-09-25', 987456111, 'LUCYRAMIREZ@GMAIL.COM', 'DVFVFDGBFDB', '2024-10-20 11:16:45'),
(12, 'DNI', 80001122, 'GGGGG', 'VVVVVVV', '', 'OKOOK', 'HGHGHGH', 'M', '2024-10-11', 999235654, 'GGGGGG@GMAIL.COM', 'SCSDFDSFSDFDSF', '2024-10-20 11:23:08'),
(13, 'DNI', 70859623, 'beatriz', 'VVVVVVV', '', 'peralta', 'miller', 'F', '2024-10-04', 959632587, 'beatriz@gmail.com', 'ghnfghnf', '2024-10-20 14:29:22'),
(14, 'DNI', 85631245, 'mmmmm', 'bbbbb', '', 'bbbbbbb', 'mmmmm', 'M', '2024-10-05', 999526456, 'mmmm@gmail.com', 'ghfgnhfgjhgjkhi', '2024-10-20 14:35:29'),
(16, 'DNI', 56231458, 'ppppppp', 'mmmmmm', '', 'tttttttttttt', 'bbbbbbbbbbbbbbbb', 'F', '2024-10-03', 2147483647, 'mmmm@gmail.com', 'ghfgnhfgjhgjkhi', '2024-10-20 14:42:47'),
(17, 'DNI', 72701022, 'DAVID', 'OSCAR', 'RAÚL', 'CHIRINOS', 'GONZALES', 'M', '2004-10-13', 998456123, 'DAVIDCHIRINOS@GMAIL.COM', 'CALLE NUEVA S/N TRUJILLO', '2024-10-22 08:43:31'),
(18, 'DNI', 62701122, 'SOFIA', 'MIA', 'CELESTE', 'CABELLOS', 'RIOS', 'F', '2007-01-31', 99999999, 'SOFIACABELLOS@GMAIL.COM', 'JR ENRIQUEZ 852, LA ESMERALDA', '2024-10-22 09:10:04'),
(19, 'DNI', 19191919, 'ELIANNA', 'LIZBETH', '', 'ULLOA', 'HORNA', 'F', '1990-11-02', 999999999, 'ELIANNAULLOA@GMAIL.COM', 'CALLE SIN DESTINO ', '2024-10-22 21:20:23'),
(21, 'DNI', 76691490, 'DARLEY', '', '', 'SAAVEDRA', 'SAAVEDRA', 'M', '2024-10-18', 963852741, 'DARLEY@GMAIL.COM', 'calle sin nro', '2024-10-25 12:43:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planplanestudiosestudios`
--

CREATE TABLE `planestudios` (
  `id_plan` int(11) NOT NULL,
  `nombre_plan` varchar(10) NOT NULL,
  `descripcion_plan` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL
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
  `estado` int(2) NOT NULL,
  `fecha_registro_postulante` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `postulante`
--

INSERT INTO `postulante` (`id_postulante`, `id_persona_postulante`, `anio_admision_postulante`, `colegio_procedencia_postulante`, `primera_opcion_postulante`, `segunda_opcion_postulante`, `dni_foto_postulante`, `pago_postulante`, `foto_postulante`, `certificado_estudios_postulante`, `partida_nacimiento_postulante`, `declaracion_jurada_postulante`, `estado`, `fecha_registro_postulante`) VALUES
(1, 13, 2024, 'I.E. 85231 MARIA BELEN', 'ENFERMERÍA TÉCNICA', 'CONTABILIDAD', '2024-10-20-02-29-22__FOTO1.jpeg', '2024-10-20-02-29-22__FOTO2.jpeg', '2024-10-20-02-29-22__FOTO3.jpeg', '2024-10-20-02-29-22__FOTO4.jpeg', '2024-10-20-02-29-22__FOTO5.jpeg', '2024-10-20-02-29-22__FOTO6.jpeg', 1, '2024-10-20 14:29:22'),
(2, 14, 2024, 'I.E. 96632 VICTOR ANDRES BELAUNDE', 'ENFERMERÍA TÉCNICA', 'CONTABILIDAD', '2024-10-20-02-35-29__FOTO1.jpeg', '2024-10-20-02-35-29__FOTO2.jpeg', '2024-10-20-02-35-29__FOTO3.jpeg', '2024-10-20-02-35-29__FOTO4.jpeg', '2024-10-20-02-35-29__FOTO5.jpeg', '2024-10-20-02-35-29__FOTO6.jpeg', 1, '2024-10-20 14:35:29'),
(3, 16, 2024, 'I.E. 96632 VICTOR ANDRES BELAUNDE', 'ENFERMERÍA TÉCNICA', 'ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TECNOLOGÍAS DE LA INFORMACIÓN', '2024-10-20-02-42-47__FOTO1.jpeg', '2024-10-20-02-42-47__FOTO2.jpeg', '2024-10-20-02-42-47__FOTO3.jpeg', '2024-10-20-02-42-47__FOTO4.jpeg', '2024-10-20-02-42-47__FOTO5.jpeg', '2024-10-20-02-42-47__FOTO6.jpeg', 1, '2024-10-20 14:42:47'),
(4, 17, 2025, 'COLEGIO SANTA RITA', 'ENFERMERÍA TÉCNICA', 'CONTABILIDAD', '2024-10-22-08-43-31__', '2024-10-22-08-43-31__', '2024-10-22-08-43-31__', '2024-10-22-08-43-31__', '2024-10-22-08-43-31__', '2024-10-22-08-43-31__', 1, '2024-10-22 08:43:31'),
(5, 18, 2025, 'IE ANDRES AVELINO', 'ENFERMERÍA TÉCNICA', 'CONTABILIDAD', '2024-10-22-09-10-04__', '2024-10-22-09-10-04__', '2024-10-22-09-10-04__', '2024-10-22-09-10-04__', '2024-10-22-09-10-04__', '2024-10-22-09-10-04__', 1, '2024-10-22 09:10:04'),
(6, 19, 2024, 'COLEGIO SANTA RITA', 'ENFERMERÍA TÉCNICA', 'CONTABILIDAD', '2024-10-22-09-20-23__FOTO1.jpeg', '2024-10-22-09-20-23__FOTO2.jpeg', '2024-10-22-09-20-23__', '2024-10-22-09-20-23__', '2024-10-22-09-20-23__', '2024-10-22-09-20-23__', 1, '2024-10-22 21:20:23'),
(7, 21, 2024, 'I.E. 96632 VICTOR ANDRES BELAUNDE', 'ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TECNOLOGÍAS DE LA INFORMACIÓN', 'CONTABILIDAD', '2024-10-25-12-43-52__FOTO1.jpeg', '2024-10-25-12-43-52__FOTO2.jpeg', '2024-10-25-12-43-52__FOTO3.jpeg', '2024-10-25-12-43-52__', '2024-10-25-12-43-52__', '2024-10-25-12-43-52__', 1, '2024-10-25 12:43:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaestudios`
--

CREATE TABLE `programaestudios` (
  `id_programa` int(11) NOT NULL,
  `abreviatura_programa` varchar(6) NOT NULL,
  `nombre_programa` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `programaestudios`
--

INSERT INTO `programaestudios` (`id_programa`, `abreviatura_programa`, `nombre_programa`, `estado`) VALUES
(1, 'ARQ', 'ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TECNOLOGÍAS DE LA INFORMACIÓN', 1),
(2, 'ENF', 'ENFERMERÍA TÉCNICA', 1),
(3, 'CONT', 'CONTABILIDAD', 1),
(7, 'SEC_EJ', 'SECRETARIADO EJECUTIVO', 1),
(8, 'TEC_EL', 'TÉCNICO ELECTRICISTA', 1),
(9, 'AGRON', 'AGRONOMIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tupa`
--

CREATE TABLE `tupa` (
  `id_tupa` int(11) NOT NULL,
  `denominacion_tupa` varchar(120) NOT NULL,
  `monto_tupa` decimal(10,0) NOT NULL,
  `requisitos_tupa` varchar(300) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `fecha_tupa` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tupa`
--

INSERT INTO `tupa` (`id_tupa`, `denominacion_tupa`, `monto_tupa`, `requisitos_tupa`, `estado`, `fecha_tupa`) VALUES
(1, 'CARNET / FOTOSHECK (duplicado)', 10, '1. Estar considerado en la Nómina de estudiantes.', 1, '2024-10-22 19:01:00'),
(2, 'DERECHO DE INSCRIPCION A EXAMEN DE ADMISION', 50, '1. Solicitud dirigida al Director \n2. Copia de DNI \n3. Dos (2) fotos t/carné \n4. Recibo por derecho de admisión', 1, '2024-10-22 19:07:52'),
(3, 'RATIFICACIÓN DE MATRICULA Y MATRICULA DE INGRESANTES', 170, '1. Solicitud dirigida al Director\r\n2. Boleta de Notas\r\n3. Haber aprobado el examen de admisión\r\n4. Comprobante de pago', 1, '2024-10-22 19:10:19'),
(5, 'CERTIFICADO DE ESTUDIOS', 100, '', 1, '2024-10-25 12:48:36');

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
  `horas_semanales_unidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_persona_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  `identificador_usuario` varchar(8) NOT NULL,
  `clave_usuario` varchar(8) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_creacion_usuario` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_persona_usuario`, `tipo_usuario`, `identificador_usuario`, `clave_usuario`, `estado`, `fecha_creacion_usuario`) VALUES
(1, 1, 'Administrador', '43001122', '123456', 0, '2024-08-13 04:24:45');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_estudiante_pago`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_estudiante_pago` (
`DNI` int(11)
,`NOMBRE_COMPLETO` varchar(154)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_estudiante_pagofinal`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_estudiante_pagofinal` (
`TIPO` varchar(50)
,`DNI` int(11)
,`NOMBRE_COMPLETO` varchar(154)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_persona_estudiante`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_persona_estudiante` (
`DNI` int(11)
,`NOMBRE_COMPLETO` varchar(154)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_persona_estudiantefinal`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_persona_estudiantefinal` (
`TIPO` varchar(50)
,`DNI` int(11)
,`NOMBRE_COMPLETO` varchar(154)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_persona_estudiante_completo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_persona_estudiante_completo` (
`IDESTUDIANTE` int(11)
,`IDPERSONA` int(11)
,`TIPO` varchar(50)
,`NRO` int(11)
,`NOMBRE_COMPLETO` varchar(154)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_persona_postulante`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_persona_postulante` (
`id_postulante` int(11)
,`id_persona_postulante` int(11)
,`tipo_documento_identidad_persona` varchar(50)
,`nro_documento_persona` int(11)
,`primer_nombre_persona` varchar(30)
,`segundo_nombre_persona` varchar(30)
,`tercer_nombre_persona` varchar(30)
,`primer_apellido_persona` varchar(30)
,`segundo_apellido_persona` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_estudiante_pago`
--
DROP TABLE IF EXISTS `vista_estudiante_pago`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_estudiante_pago`  AS SELECT `pe`.`nro_documento_persona` AS `DNI`, concat(`pe`.`primer_nombre_persona`,' ',`pe`.`segundo_nombre_persona`,' ',`pe`.`tercer_nombre_persona`,' ',`pe`.`primer_apellido_persona`,' ',`pe`.`segundo_apellido_persona`) AS `NOMBRE_COMPLETO` FROM (((`persona` `pe` join `postulante` `po` on(`po`.`id_persona_postulante` = `pe`.`id_persona`)) join `estudiante` `e` on(`po`.`id_postulante` = `e`.`id_postulante_estudiante`)) join `pago` `p` on(`e`.`id_estudiante` = `p`.`id_estudiante_pago`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_estudiante_pagofinal`
--
DROP TABLE IF EXISTS `vista_estudiante_pagofinal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_estudiante_pagofinal`  AS SELECT `pe`.`tipo_documento_identidad_persona` AS `TIPO`, `pe`.`nro_documento_persona` AS `DNI`, concat(`pe`.`primer_nombre_persona`,' ',`pe`.`segundo_nombre_persona`,' ',`pe`.`tercer_nombre_persona`,' ',`pe`.`primer_apellido_persona`,' ',`pe`.`segundo_apellido_persona`) AS `NOMBRE_COMPLETO` FROM (((`persona` `pe` join `postulante` `po` on(`po`.`id_persona_postulante` = `pe`.`id_persona`)) join `estudiante` `e` on(`po`.`id_postulante` = `e`.`id_postulante_estudiante`)) join `pago` `p` on(`e`.`id_estudiante` = `p`.`id_estudiante_pago`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_persona_estudiante`
--
DROP TABLE IF EXISTS `vista_persona_estudiante`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_persona_estudiante`  AS SELECT `pe`.`nro_documento_persona` AS `DNI`, concat(`pe`.`primer_nombre_persona`,' ',`pe`.`segundo_nombre_persona`,' ',`pe`.`tercer_nombre_persona`,' ',`pe`.`primer_apellido_persona`,' ',`pe`.`segundo_apellido_persona`) AS `NOMBRE_COMPLETO` FROM ((`persona` `pe` join `postulante` `po` on(`po`.`id_persona_postulante` = `pe`.`id_persona`)) join `estudiante` `e` on(`po`.`id_postulante` = `e`.`id_postulante_estudiante`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_persona_estudiantefinal`
--
DROP TABLE IF EXISTS `vista_persona_estudiantefinal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_persona_estudiantefinal`  AS SELECT `pe`.`tipo_documento_identidad_persona` AS `TIPO`, `pe`.`nro_documento_persona` AS `DNI`, concat(`pe`.`primer_nombre_persona`,' ',`pe`.`segundo_nombre_persona`,' ',`pe`.`tercer_nombre_persona`,' ',`pe`.`primer_apellido_persona`,' ',`pe`.`segundo_apellido_persona`) AS `NOMBRE_COMPLETO` FROM ((`persona` `pe` join `postulante` `po` on(`po`.`id_persona_postulante` = `pe`.`id_persona`)) join `estudiante` `e` on(`po`.`id_postulante` = `e`.`id_postulante_estudiante`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_persona_estudiante_completo`
--
DROP TABLE IF EXISTS `vista_persona_estudiante_completo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_persona_estudiante_completo`  AS SELECT `e`.`id_estudiante` AS `IDESTUDIANTE`, `pe`.`id_persona` AS `IDPERSONA`, `pe`.`tipo_documento_identidad_persona` AS `TIPO`, `pe`.`nro_documento_persona` AS `NRO`, concat(`pe`.`primer_nombre_persona`,' ',`pe`.`segundo_nombre_persona`,' ',`pe`.`tercer_nombre_persona`,' ',`pe`.`primer_apellido_persona`,' ',`pe`.`segundo_apellido_persona`) AS `NOMBRE_COMPLETO` FROM ((`persona` `pe` join `postulante` `po` on(`po`.`id_persona_postulante` = `pe`.`id_persona`)) join `estudiante` `e` on(`po`.`id_postulante` = `e`.`id_postulante_estudiante`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_persona_postulante`
--
DROP TABLE IF EXISTS `vista_persona_postulante`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_persona_postulante`  AS SELECT `pos`.`id_postulante` AS `id_postulante`, `pos`.`id_persona_postulante` AS `id_persona_postulante`, `per`.`tipo_documento_identidad_persona` AS `tipo_documento_identidad_persona`, `per`.`nro_documento_persona` AS `nro_documento_persona`, `per`.`primer_nombre_persona` AS `primer_nombre_persona`, `per`.`segundo_nombre_persona` AS `segundo_nombre_persona`, `per`.`tercer_nombre_persona` AS `tercer_nombre_persona`, `per`.`primer_apellido_persona` AS `primer_apellido_persona`, `per`.`segundo_apellido_persona` AS `segundo_apellido_persona` FROM (`persona` `per` join `postulante` `pos` on(`per`.`id_persona` = `pos`.`id_persona_postulante`)) ;

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
  ADD KEY `id_persona_estudiante` (`id_postulante_estudiante`),
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
  ADD UNIQUE KEY `nro_documento_persona` (`nro_documento_persona`);

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
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_periodo_academico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `periodolectivo`
--
ALTER TABLE `periodolectivo`
  MODIFY `id_periodo_lectivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `planestudios`
--
ALTER TABLE `planestudios`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `id_postulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `programaestudios`
--
ALTER TABLE `programaestudios`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tupa`
--
ALTER TABLE `tupa`
  MODIFY `id_tupa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_postulante_estudiante`) REFERENCES `persona` (`id_persona`),
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
