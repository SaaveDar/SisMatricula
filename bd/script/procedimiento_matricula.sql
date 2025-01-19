DELIMITER //

CREATE PROCEDURE verificar_matricula_dni_v2(
    IN p_dni VARCHAR(20)
)
BEGIN
    DECLARE v_pasado_ciclo VARCHAR(20);
    DECLARE v_proximo_ciclo VARCHAR(20) DEFAULT 'I';
    DECLARE v_estado_matricula INT DEFAULT 0;
    DECLARE v_programa_estudios VARCHAR(100);
    DECLARE v_periodo_inicio VARCHAR(20);
    DECLARE v_tipodoc VARCHAR(200);
    DECLARE v_documento VARCHAR(200);  
    DECLARE v_nombre_completo VARCHAR(200);
    DECLARE v_plan_estudios VARCHAR(200);
    DECLARE v_periodo_lectivo_actual VARCHAR(200);
    DECLARE v_lectivoactual_numerico INT;
    DECLARE v_id_estudiante INT;
    DECLARE v_id_planestudios INT;
    DECLARE v_id_periodolectivo INT;
    DECLARE v_id_periodoacademico INT;
    DECLARE v_id_programa INT;

    -- Verificar si el DNI existe en la vista_persona_estudiante_programa
    SELECT COUNT(*) INTO v_estado_matricula
    FROM vista_persona_estudiante_completo
    WHERE NRO = p_dni;

    IF v_estado_matricula = 0 THEN
        -- Si no existe, mostrar el mensaje y terminar el procedimiento
        SELECT 'DNI no encontrado' AS mensaje;
        -- Se termina el procedimiento, no es necesario un RETURN o LEAVE
      SET @dummy = 0; -- Esto es solo para asegurarnos de que el flujo continúe.
    ELSE

    -- Verificar si el estudiante tiene un historial de matrículas en el programa
    SELECT COUNT(*) INTO v_estado_matricula
    FROM vista_persona_estudiante_completo e
    JOIN historialmatriculas hm ON e.IDESTUDIANTE = hm.id_estudiante_hismatricula
    WHERE e.NRO = p_dni
      AND hm.estado = 1;

    -- Si el estudiante tiene matrículas, determinar el próximo ciclo y demás información desde historialmatriculas
    IF v_estado_matricula > 0 THEN
        -- Determinar el próximo ciclo
        SELECT 
            CASE 
                WHEN MAX(hm.periodoacademico_hismatricula) = 'I' THEN 'II'
                WHEN MAX(hm.periodoacademico_hismatricula) = 'II' THEN 'III'
                WHEN MAX(hm.periodoacademico_hismatricula) = 'III' THEN 'IV'
                WHEN MAX(hm.periodoacademico_hismatricula) = 'IV' THEN 'V'
                WHEN MAX(hm.periodoacademico_hismatricula) = 'V' THEN 'VI'
                WHEN MAX(hm.periodoacademico_hismatricula) = 'VI' THEN 'VI'
                ELSE 'I'
            END INTO v_proximo_ciclo
        FROM historialmatriculas hm
        JOIN vista_persona_estudiante_completo e ON hm.id_estudiante_hismatricula = e.IDESTUDIANTE
        WHERE e.NRO = p_dni
          AND hm.estado = 1;

        -- Obtener el programa de estudios, el periodo de inicio, y el nombre completo del estudiante desde historialmatriculas
        SELECT 
            hm.periodoacademico_hismatricula as pasado_ciclo,
            pe.nombre_programa AS programa_estudios, 
            hm.periodolectivo_hismatricula AS periodo_inicio,
            e.TIPO,
            e.NRO,
            e.NOMBRE_COMPLETO,
            CONCAT_WS(' ', plan.nombre_plan, anio) as plan_estudios,
            (SELECT nombre_periodo FROM periodolectivo WHERE estado = 1) as lectivo_actual,
            (SELECT numero_periodo FROM periodolectivo WHERE estado = 1) as lectivoactual_numerico,
            hm.id_estudiante_hismatricula as id_estudiante,
            hm.id_planestudios_hismatricula as id_planestudios,
            (SELECT id_periodo_lectivo FROM periodolectivo WHERE estado = 1) as id_periodolectivo,
            (SELECT (id_periodo_academico +1) FROM periodoacademico WHERE estado = 1 AND id_periodo_academico = hm.id_periodoacademico_hismatricula AND id_periodo_academico <> 7) as id_periodoacademico,
            hm.id_programa_estudio as id_programa
        INTO 
            v_pasado_ciclo,
            v_programa_estudios, 
            v_periodo_inicio,
            v_tipodoc,
            v_documento,
            v_nombre_completo,
            v_plan_estudios,
            v_periodo_lectivo_actual,
            v_lectivoactual_numerico,
            v_id_estudiante,
            v_id_planestudios,
            v_id_periodolectivo,
            v_id_periodoacademico,
            v_id_programa
        FROM historialmatriculas hm
        JOIN vista_persona_estudiante_programa e ON hm.id_estudiante_hismatricula = e.IDESTUDIANTE
        INNER JOIN programaestudios pe ON e.ID_PROGRAMA = pe.id_programa
        INNER JOIN planestudios plan ON hm.id_planestudios_hismatricula = plan.id_plan
        WHERE e.NRO = p_dni
          AND hm.estado = 1 AND plan.estado = 1
        LIMIT 1;

    ELSE
        -- Si el estudiante no tiene matrículas, asumir que está en el primer ciclo y obtener los datos desde la tabla estudiante
        SET v_proximo_ciclo = 'I';

        SELECT 
            ' ' AS pasado_ciclo,
            pe.nombre_programa AS programa_estudios, 
            per.nombre_periodo AS periodo_inicio,
            p.TIPO,
            p.NRO,
            p.NOMBRE_COMPLETO AS nombre_completo,
            CONCAT_WS(' ', plan.nombre_plan, anio) as plan_estudios,
            (SELECT nombre_periodo FROM periodolectivo WHERE estado = 1) AS lectivo_actual,
            (SELECT numero_periodo FROM periodolectivo WHERE estado = 1) AS lectivoactual_numerico,
            p.IDESTUDIANTE AS id_estudiante,
            (SELECT id_plan FROM planestudios WHERE estado = 1 AND id_programaestudios = pe.id_programa) AS id_planestudios,
            (SELECT id_periodo_lectivo FROM periodolectivo WHERE estado = 1) AS id_periodolectivo,
            (SELECT id_periodo_academico FROM periodoacademico WHERE id_periodo_academico = 1) AS id_periodoacademico,
            (SELECT id_programa FROM programaestudios WHERE id_programa = p.ID_PROGRAMA) AS id_programa
       INTO 
            v_pasado_ciclo,
            v_programa_estudios, 
            v_periodo_inicio,
            v_tipodoc,
            v_documento,
            v_nombre_completo,
            v_plan_estudios,
            v_periodo_lectivo_actual,
            v_lectivoactual_numerico,
            v_id_estudiante,
            v_id_planestudios,
            v_id_periodolectivo,
            v_id_periodoacademico,
            v_id_programa
        FROM vista_persona_estudiante_programa p
        INNER JOIN programaestudios pe ON p.ID_PROGRAMA = pe.id_programa
        INNER JOIN periodolectivo per ON p.ID_LECTIVO = per.id_periodo_lectivo
        INNER JOIN planestudios plan ON plan.id_plan = (SELECT id_plan FROM planestudios WHERE estado = 1 AND id_programaestudios = pe.id_programa)
        WHERE p.NRO = p_dni
          AND p.estado = 1 AND plan.estado = 1
        LIMIT 1;
    END IF;

    -- Resultado final
    SELECT v_pasado_ciclo AS pasado_ciclo,
           v_proximo_ciclo AS proximo_ciclo, 
           v_programa_estudios AS programa_estudios,
           v_periodo_inicio AS periodo_inicio,
           v_tipodoc AS tipodoc,
           v_documento AS documento,
           v_nombre_completo AS nombre_completo,
           v_plan_estudios AS plan_estudios,
           v_periodo_lectivo_actual AS lectivo_actual,
           v_lectivoactual_numerico AS lectivoactual_numerico,
           v_id_estudiante AS id_estudiante,
           v_id_planestudios AS id_planestudios,
           v_id_periodolectivo AS id_periodolectivo,
           v_id_periodoacademico AS id_periodoacademico,
           v_id_programa AS id_programa;
	END IF;
END //

DELIMITER ;

CALL verificar_matricula_dni_v2 ('202020202')