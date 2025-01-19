CREATE VIEW vista_planestudios_programaestudios
as 
select pe.id_programa as id_programa, plan.id_plan as idplan , plan.nombre_plan as codigo_plan, concat(plan.nombre_plan, ' - ' , plan.descripcion_plan ) AS plan_estudios, plan.anio
from planestudios plan
inner join programaestudios pe
on plan.id_programaestudios= pe.id_programa
where plan.estado = 1;
