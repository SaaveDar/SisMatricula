DELIMITER //

CREATE PROCEDURE insertarMatricula(
    IN id_hismatri INT,
    IN id_estudiante_matricula INT,
    IN id_programa INT,
    IN id_plan_estudios INT
)
BEGIN
    DECLARE id_unidad_didactica INT;
    DECLARE done BOOLEAN DEFAULT FALSE;

    -- Declarar el cursor para seleccionar todos los id_unidad_didactica
    DECLARE cur CURSOR FOR
    SELECT vcxc.id_unidad
    FROM vista_cursos_xcarrera_xciclo vcxc
    WHERE vcxc.id_programa = id_programa
          AND vcxc.idplan = id_plan_estudios;

    -- Declarar un manejador para cerrar el cursor cuando no haya más filas
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    -- Abrir el cursor
    OPEN cur;

    read_loop: LOOP
        FETCH cur INTO id_unidad_didactica;
        IF done THEN
            LEAVE read_loop;
        END IF;

        -- Insertar cada resultado en la tabla matricula
        INSERT INTO matricula (
            id_hismatri, 
            id_estudiante_matricula, 
            id_programa,
            id_planestudios,
            id_unidad_didactica_matricula, 
            estado
        ) VALUES (
            id_hismatri, 
            id_estudiante_matricula, 
            id_programa,
            id_plan_estudios,
            id_unidad_didactica, 
            1
        );
    END LOOP;

    -- Cerrar el cursor
    CLOSE cur;
END

DELIMITER ;
