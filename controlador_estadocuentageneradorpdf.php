<?php
session_start();
// Conexión a la base de datos
include __DIR__ . '../conexion.php';

// Establecer el conjunto de caracteres a UTF-8
$conexion->set_charset("utf8");
if (isset($_POST['buscar'])) {

    if (!empty($_POST['tipo_doc']) || !empty($_POST['nro_doc']) || !empty($_POST['programa'])) {

    $tipo_doc = !empty($_POST['tipo_doc']) ? $_POST['tipo_doc'] : 0;
    $nro_doc =!empty($_POST['nro_doc'])? $_POST['nro_doc'] : 0;
    $programa= !empty($_POST['programa']) ? $_POST['programa']:0;

    // Consulta para buscar al estudiante
    $consultapagos = "SELECT * FROM vista_persona_estudiante_pago_tupa_periodolectivo_programa
                               where  TIPO_DOC = '$tipo_doc' AND NRO_DOC='$nro_doc' AND  ID_PROGRAMA_ESTUDIOS='$programa'
                               order by FECHA_PAGO desc";
    
    $resultado = mysqli_query($conexion, $consultapagos);

    if ($resultado === false) {
        $_SESSION['message'] = 'Error en la consulta: ' . mysqli_error($conexion);
    } else {
        if (mysqli_num_rows($resultado) > 0) {
             
              $_SESSION['estudiantes'] = []; // Inicializa el arreglo para guardar los resultados
           
              $primerResultado = mysqli_fetch_assoc($resultado);
           
              $_SESSION['tipo_documento'] = $primerResultado['TIPO_DOC'];
              $_SESSION['nro_documento'] = $primerResultado['NRO_DOC'];
              $_SESSION['nombre_completo'] = $primerResultado['NOMBRE_COMPLETO'];
              $_SESSION['programa_estudios'] = $primerResultado['PROGRAMA_ESTUDIOS'];
              $_SESSION['periodolectivo'] = $primerResultado['PERIODO_LECTIVO'];
              $_SESSION['periodoacademico'] = $primerResultado['PERIODO_ACADEMICO'];
              
              $_SESSION['estudiantes'][] = [
                                        
                'tipo_documento' => $primerResultado['TIPO_DOC'],
                'nro_documento' => $primerResultado['NRO_DOC'],
                'nombre_completo' => $primerResultado['NOMBRE_COMPLETO'],
                'programa_estudios'=> $primerResultado['PROGRAMA_ESTUDIOS'],
                'periodolectivo' => $primerResultado['PERIODO_LECTIVO'],
                'periodoacademico'=> $primerResultado['PERIODO_ACADEMICO'],
                'denominacion' => $primerResultado['DENOMINACION_TUPA'],
                'monto' => $primerResultado['MONTO_TUPA'],
                'fecha'=> $primerResultado['FECHA_PAGO'],         
            ];
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
    }
    header('Location: estadocuentagenerarpdf.php');
    //header("Location: matricula.php?nro_doc=$nro_doc&id_programa=$id_programa");
    exit(); // Termina la ejecución después de redirigir 
}
}

// Cerrar la conexión
$conexion->close();

header('Location:estadocuentagenerarpdf.php');
?>