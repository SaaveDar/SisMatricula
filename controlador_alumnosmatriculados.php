<?php
session_start();
// Conexión a la base de datos
include __DIR__ . '../conexion.php';

// Establecer el conjunto de caracteres a UTF-8
$conexion->set_charset("utf8");

if (isset($_POST['buscar'])) {
    $tipo_doc = $_POST['tipo_doc'];
    $nro_doc = $_POST['nro_doc'];
    $periodo = $_POST['periodo'];  

    // Consulta para buscar al estudiante
    $consultaestudiantematriculado = "SELECT * FROM vista_alumnos_matriculados where tipo = '$tipo_doc' AND NRO = '$nro_doc' and (periodolectivo_hismatricula = '' OR id_periodolectivo = '$periodo')";
    //"CALL verificar_matricula_dni_v2('$nro_doc')";
    $resultado = mysqli_query($conexion, $consultaestudiantematriculado);

    if ($resultado === false) {
        $_SESSION['message'] = 'Error en la consulta: ' . mysqli_error($conexion);
    } else {
        if (mysqli_num_rows($resultado) > 0) {
             
              $_SESSION['estudiantes'] = []; // Inicializa el arreglo para guardar los resultados

           
        
                // Inicializar los datos de las cajas de texto con el primer resultado
                $primerResultado = mysqli_fetch_assoc($resultado);
                $_SESSION['tipo_documento'] = $primerResultado['TIPO'];
                $_SESSION['nro_documento'] = $primerResultado['NRO'];
                $_SESSION['nombre_completo'] = $primerResultado['NOMBRE_COMPLETO'];
                $_SESSION['programa_estudios'] = $primerResultado['nombre_programa'];
                $_SESSION['periodolectivo'] = $primerResultado['periodolectivo_hismatricula'];
                $_SESSION['periodoacademico'] = $primerResultado['periodoacademico_hismatricula'];
                $_SESSION['fecha_matricula'] = $primerResultado['fecha_matricula'];
                

                    // Agregar el primer resultado a la lista de cursos
                $_SESSION['estudiantes'][] = [
                    'ciclo_curso' => $primerResultado['ciclo_curso'],
                    'abrev_curso' => $primerResultado['abreviatura_unidad'],
                    'curso_nombre' => $primerResultado['nombre_unidad'],
                    'creditos' => $primerResultado['creditos'],
                    'horas_semanales' => $primerResultado['horas_semanales'],
                    'modulo' => $primerResultado['modulo'],
                    'fecha_matricula' => $primerResultado['fecha_matricula']
                ];
                    // Procesar el resto de los resultados
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $_SESSION['estudiantes'][] = [
                        'ciclo_curso' => $fila['ciclo_curso'],
                        'abrev_curso' => $fila['abreviatura_unidad'],
                        'curso_nombre' => $fila['nombre_unidad'],
                        'creditos' => $fila['creditos'],
                        'horas_semanales' => $fila['horas_semanales'],
                        'modulo' => $fila['modulo'],
                        'fecha_matricula' => $fila['fecha_matricula']
            ];
        }
            
            }else{

                    $_SESSION['message'] = '<span style="color: red;">(LA MATRICULA NO EXISTE)</span>';
            }
   
  }
    header('Location: alumnos_matriculados.php');
    //header("Location: matricula.php?nro_doc=$nro_doc&id_programa=$id_programa");
    exit(); // Termina la ejecución después de redirigir
}

// Cerrar la conexión
$conexion->close();

header('Location: alumnos_matriculados.php');
?>
