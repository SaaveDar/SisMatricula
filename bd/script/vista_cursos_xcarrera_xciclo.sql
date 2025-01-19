CREATE VIEW vista_cursos_xcarrera_xciclo AS
    SELECT 
        u.id_unidad as id_unidad,
        u.nombre_unidad AS nombre_curso,
        u.abreviatura_unidad AS abrev_curso,
        u.horas_teoricas_unidad AS horas_teorica,
        u.horas_practicas_unidad AS horas_practica,
        u.horas_semanales_unidad AS horas_semanal,
        u.creditos_unidad AS creditos,
        ( select 
			  case
				when u.periodo_academico_unidad = 'I' then 1
				WHEN u.periodo_academico_unidad = 'II' THEN 2
				WHEN u.periodo_academico_unidad = 'III' THEN 3
				WHEN u.periodo_academico_unidad = 'IV' THEN 4
				WHEN u.periodo_academico_unidad = 'V' THEN 5
				WHEN u.periodo_academico_unidad = 'VI' THEN 6
			 ELSE u.periodo_academico_unidad -- Si no es un número entre 1 y 10, se muestra el valor original
			END  AS numero_ciclo
			--  from unidaddidactica un
            --  WHERE un.id_plan_unidad = plan.id_plan
        ) as id_periodoacademico,
        u.periodo_academico_unidad AS ciclo,
        u.modulo_unidad AS modulo,
        pe.id_programa as id_programa,
        pe.nombre_programa AS nombre_programa,
        plan.id_plan AS idplan,
        plan.nombre_plan AS codigo_plan,
        plan.descripcion_plan AS descripcion_plan,
        CONCAT(plan.nombre_plan,
                ' - ',
                plan.descripcion_plan) AS plan_estudios,
         plan.estado as estado_plan       
    FROM
        unidaddidactica u
        JOIN programaestudios pe ON u.programa_estudios_unidad = pe.id_programa
        JOIN planestudios plan ON u.id_plan_unidad = plan.id_plan
	WHERE plan.estado = 1