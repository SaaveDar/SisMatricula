-- SELECT * FROM bdacademicov3.vista_persona_estudiante_completo;

-- select * FROM bdacademicov3.vista_cursos_xcarrera_xciclo;

-- SELECT * FROM bdacademicov3.unidaddidactica;
-- SELECT * FROM bdacademicov3.matricula;
-- select * from historialmatriculas;

create view alumnos_matriculados as
select es_pro.TIPO, es_pro.NRO, es_pro.NOMBRE_COMPLETO, h.periodoacademico_hismatricula, h.periodolectivo_hismatricula
	   ,programa.abreviatura_programa, programa.nombre_programa, plan.nombre_plan, plan.descripcion_plan
       ,u.abreviatura_unidad, u.nombre_unidad
       , m.fecha_matricula
       , h.id_planestudios_hismatricula, h.id_periodoacademico_hismatricula,h.id_periodolectivo, h.id_programa_estudio
from vista_persona_estudiante_programa es_pro
inner join historialmatriculas h
ON es_pro.IDESTUDIANTE = h.id_estudiante_hismatricula
inner join matricula m
ON h.id_hismatricula_hismatricula = m.id_hismatri AND h.id_estudiante_hismatricula = m.id_estudiante_matricula
inner join programaestudios programa
ON es_pro.ID_PROGRAMA = programa.id_programa
inner join planestudios plan
ON h.id_planestudios_hismatricula = plan.id_plan
inner join unidaddidactica u
on m.id_unidad_didactica_matricula = u.id_unidad
where h.estado = 1 and programa.estado = 1 and plan.estado = 1 and u.estado = 1;