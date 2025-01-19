<?php
session_start();
// Conexión a la base de datos
include __DIR__ . '../conexion.php';

// Establecer el conjunto de caracteres a UTF-8
$conexion->set_charset("utf8");

if (isset($_POST['buscar'])) {

    if (!empty($_POST['tipo_doc']) || !empty($_POST['nro_doc']) || !empty($_POST['anioad']) || !empty($_POST['programa'])) {

        $tipo_doc = !empty($_POST['tipo_doc']) ? $_POST['tipo_doc'] : '';
        $nro_doc =!empty($_POST['nro_doc'])? $_POST['nro_doc'] : 0;
        $anioad = !empty($_POST['anioad']) ? $_POST['anioad'] : 0;
        $programa= !empty($_POST['programa']) ? $_POST['programa']:'';

        // Consulta para buscar al estudiante
        $consultapostulantes = "SELECT * FROM vista_persona_postulante_programas where ((tipo_doc = null or tipo_doc='' OR tipo_doc = '$tipo_doc') AND (nro_doc  = null or nro_doc= 0 or nro_doc='$nro_doc'))
                                    OR ((opcion1 =NULL OR opcion1= '' OR opcion1='$programa') and (anio_postulacion =NULL OR anio_postulacion=0 OR anio_postulacion='$anioad'))
                                    OR ((opcion2 =NULL OR opcion2= '' OR opcion2='$programa') and (anio_postulacion =NULL OR anio_postulacion=0 OR anio_postulacion='$anioad'))
                                    OR (anio_postulacion=NULL OR anio_postulacion= 0 OR anio_postulacion='$anioad')
                                    OR (opcion1 =NULL OR opcion1= '' OR opcion1='$programa')
                                    OR (opcion2 =NULL OR opcion2= '' OR opcion2='$programa')
                                order by NOMBRE_COMPLETO desc"; 
    
        $resultado = mysqli_query($conexion, $consultapostulantes);

    if ($resultado === false) {
        $_SESSION['message'] = 'Error en la consulta: ' . mysqli_error($conexion);
    } else {
        if (mysqli_num_rows($resultado) > 0) {
             
              $_SESSION['postulantes'] = []; // Inicializa el arreglo para guardar los resultados
            while ($fila=mysqli_fetch_assoc($resultado)) {
             
                $_SESSION['postulantes'][] = [
                                        
                    'tipo_doc' => $fila['tipo_doc'],
                    'nro_doc' => $fila['nro_doc'],
                    'nombre_completo' => $fila['NOMBRE_COMPLETO'],
                    'anioad' => $fila['anio_postulacion'],
                    'opcion1'=> $fila['opcion1'],
                    'opcion2' => $fila['opcion2'],
                    'dni' => $fila['dni'],
                    'pago' => $fila['pago'],
                    'foto' => $fila['foto'],
                    'certificado' => $fila['certificado_estudios'],
                    'partida' => $fila['partida'],
                    'declaracion' => $fila['declaracion_jurado'],
                    'fecha'=> $fila['fecha']        
                ];
            }
        } else {
            $_SESSION['message'] = '<span style="color: red;">(POSTULANTE(S) NO EXISTE)</span>';
        } 
     } 
    }else{

        $_SESSION['message'] = '(ERROR: SELECCIONA MÍNIMO UN FILTRO)';
    }

}

// Cerrar la conexión
$conexion->close();

header('Location: reporte_postulantes.php');
?>
