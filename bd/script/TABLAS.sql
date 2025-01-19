CREATE TABLE `historialmatriculas` (
  `id_hismatricula_hismatricula` int NOT NULL AUTO_INCREMENT,
  `id_estudiante_hismatricula` int NOT NULL,
  `id_planestudios_hismatricula` int NOT NULL,
  `id_periodoacademico_hismatricula` int NOT NULL,
  `id_periodolectivo` int NOT NULL,
  `id_programa_estudio` int NOT NULL,
  `periodoacademico_hismatricula` varchar(20) NOT NULL,
  `periodolectivo_hismatricula` int NOT NULL,
  `estado` int NOT NULL,
  `fechamatricula` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hismatricula_hismatricula`,`id_estudiante_hismatricula`,`id_planestudios_hismatricula`,`id_periodoacademico_hismatricula`,`id_periodolectivo`,`id_programa_estudio`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
SELECT * FROM bdacademicov3.historialmatriculas;


CREATE TABLE `periodolectivo` (
  `id_periodo_lectivo` int NOT NULL AUTO_INCREMENT,
  `nombre_periodo` varchar(10) COLLATE utf8mb3_spanish_ci NOT NULL,
  `numero_periodo` int NOT NULL,
  `fechainicio` datetime DEFAULT NULL,
  `fechafinal` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_periodo_lectivo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;


CREATE TABLE `planestudios` (
  `id_plan` int NOT NULL AUTO_INCREMENT,
  `id_programa` int NOT NULL,
  `id_programaestudios` int NOT NULL,
  `nombre_plan` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `descripcion_plan` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `anio` int NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;


CREATE TABLE `matricula` (
  `id_matricula` int NOT NULL AUTO_INCREMENT,
  `id_hismatri` int NOT NULL,
  `id_estudiante_matricula` int NOT NULL,
  `id_unidad_didactica_matricula` int NOT NULL,
  `nombre_ud` varchar(200) COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` int NOT NULL,
  `fecha_matricula` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_matricula`,`id_hismatri`,`id_estudiante_matricula`,`id_unidad_didactica_matricula`),
  KEY `id_estudiante_matricula` (`id_estudiante_matricula`),
  KEY `id_unidad_didactica_matricula` (`id_unidad_didactica_matricula`),
  CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id_estudiante_matricula`) REFERENCES `estudiante` (`id_estudiante`),
  CONSTRAINT `matricula_ibfk_6` FOREIGN KEY (`id_unidad_didactica_matricula`) REFERENCES `unidaddidactica` (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

CREATE TABLE `planestudios` (
  `id_plan` int NOT NULL AUTO_INCREMENT,
  `id_programa` int NOT NULL,
  `id_programaestudios` int NOT NULL,
  `nombre_plan` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `descripcion_plan` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `anio` int NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
