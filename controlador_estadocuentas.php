<?php
session_start();
// Conexión a la base de datos
include __DIR__ . '../conexion.php';

// Establecer el conjunto de caracteres a UTF-8
$conexion->set_charset("utf8");

if (isset($_POST['buscar'])) {

    if (!empty($_POST['tipo_doc']) || !empty($_POST['nro_doc']) || 
    !empty($_POST['periodo']) || !empty($_POST['programa'])) {

    $tipo_doc = !empty($_POST['tipo_doc']) ? $_POST['tipo_doc'] : 0;
    $nro_doc =!empty($_POST['nro_doc'])? $_POST['nro_doc'] : 0;
    $periodo = !empty($_POST['periodo']) ? $_POST['periodo'] : 0;
    $programa= !empty($_POST['programa']) ? $_POST['programa']:0;

    // Consulta para buscar al estudiante
    $consultapagos = "SELECT * FROM vista_persona_estudiante_pago_tupa_periodolectivo_programa
                               where ((TIPO_DOC = null or TIPO_DOC='' OR TIPO_DOC = '$tipo_doc') AND (NRO_DOC  = null or NRO_DOC= 0 or NRO_DOC='$nro_doc'))
                                 OR ((ID_PROGRAMA_ESTUDIOS = NULL OR ID_PROGRAMA_ESTUDIOS= 0 OR ID_PROGRAMA_ESTUDIOS='$programa') AND (ID_PERIODO_LECTIVO = NULL OR ID_PERIODO_LECTIVO = 0 OR ID_PERIODO_LECTIVO='$periodo')) 
                                 OR ((TIPO_DOC = null or TIPO_DOC='' OR TIPO_DOC = '$tipo_doc') AND (NRO_DOC  = null or NRO_DOC= 0 or NRO_DOC='$nro_doc') AND (ID_PROGRAMA_ESTUDIOS = NULL OR ID_PROGRAMA_ESTUDIOS= 0 OR ID_PROGRAMA_ESTUDIOS='$programa') AND (ID_PERIODO_LECTIVO = NULL OR ID_PERIODO_LECTIVO = 0 OR ID_PERIODO_LECTIVO='$periodo'))
                                 OR ((ID_PROGRAMA_ESTUDIOS = NULL OR ID_PROGRAMA_ESTUDIOS= 0 OR ID_PROGRAMA_ESTUDIOS='$programa'))
                                 OR ((ID_PERIODO_LECTIVO = NULL OR ID_PERIODO_LECTIVO = 0 OR ID_PERIODO_LECTIVO='$periodo'))
                                 order by FECHA_PAGO desc";
    
    $resultado = mysqli_query($conexion, $consultapagos);

    if ($resultado === false) {
        $_SESSION['message'] = 'Error en la consulta: ' . mysqli_error($conexion);
    } else {
        if (mysqli_num_rows($resultado) > 0) {
             
              $_SESSION['estudiantes'] = []; // Inicializa el arreglo para guardar los resultados
            while ($fila=mysqli_fetch_assoc($resultado)) {
             
                $_SESSION['estudiantes'][] = [
                                        
                    'tipo_documento' => $fila['TIPO_DOC'],
                    'nro_documento' => $fila['NRO_DOC'],
                    'nombre_completo' => $fila['NOMBRE_COMPLETO'],
                    'programa_estudios'=> $fila['PROGRAMA_ESTUDIOS'],
                    'periodolectivo' => $fila['PERIODO_LECTIVO'],
                    'periodoacademico'=> $fila['PERIODO_ACADEMICO'],
                    'denominacion' => $fila['DENOMINACION_TUPA'],
                    'monto' => $fila['MONTO_TUPA'],
                    'fecha'=> $fila['FECHA_PAGO'],         
                ];
            }
        } else {
            $_SESSION['message'] = '<span style="color: red;">(ESTUDIANTE(S) NO EXISTE)</span>';
        } 
    } }else{

        $_SESSION['message'] = '(ERROR: SELECCIONA MÍNIMO UN FILTRO)';
    }


   
}

// Cerrar la conexión
$conexion->close();

header('Location: reporte_estadocuentas.php');
?>
