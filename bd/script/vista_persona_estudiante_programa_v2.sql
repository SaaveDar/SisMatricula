CREATE VIEW vista_persona_estudiante_programa AS 
    SELECT 
        e.id_estudiante AS IDESTUDIANTE,
        pe.id_persona AS IDPERSONA,
        pe.tipo_documento_identidad_persona AS TIPO,
        pe.nro_documento_persona AS NRO,
        CONCAT(pe.primer_nombre_persona,
                ' ',
                pe.segundo_nombre_persona,
                ' ',
                pe.tercer_nombre_persona,
                ' ',
                pe.primer_apellido_persona,
                ' ',
                pe.segundo_apellido_persona) AS NOMBRE_COMPLETO,
        pes.id_programa AS ID_PROGRAMA,
        e.id_periodo_lectivo_estudiante AS ID_LECTIVO,
        e.estado AS estado
    FROM
        persona pe
        INNER JOIN postulante po ON po.id_persona_postulante = pe.id_persona
        INNER JOIN estudiante e ON po.id_postulante = e.id_postulante_estudiante
        iNNER JOIN programaestudios pes ON e.id_programa_estudios_estudiante = pes.id_programa;
        
        
     