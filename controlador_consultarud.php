<?php
session_start();
// Conexión a la base de datos
include __DIR__ . '../conexion.php';

// Establecer el conjunto de caracteres a UTF-8
$conexion->set_charset("utf8");

if (isset($_POST['buscar'])) {

    if (!empty($_POST['programa_ud']) || !empty($_POST['planestudios_ud']) || 
    !empty($_POST['periodoacademico_ud']) || !empty($_POST['modulo_ud']) || 
    !empty($_POST['tipo_ud'])) {

        
    $id_programa = !empty($_POST['programa_ud']) ? $_POST['programa_ud'] : 0;
    $id_planestudios = !empty($_POST['planestudios_ud']) ? $_POST['planestudios_ud'] : 0;
    $id_periodoacademico = !empty($_POST['periodoacademico_ud']) ? $_POST['periodoacademico_ud'] : 0;
    $modulo_ud = !empty($_POST['modulo_ud']) ? $_POST['modulo_ud'] : '';
    $tipo_ud = !empty($_POST['tipo_ud']) ? $_POST['tipo_ud'] : '';                                                                            
 
    // Consulta para buscar al estudiante
    $consultar_ud = "CALL sp_obtener_cursos('$id_programa', '$id_planestudios', '$id_periodoacademico', '$modulo_ud', '$tipo_ud')";
    //"CALL verificar_matricula_dni_v2('$nro_doc')";
    $resultado = mysqli_query($conexion, $consultar_ud);

    if ($resultado === false) {
        $_SESSION['message'] = 'Error en la consulta: ' . mysqli_error($conexion);
    } else {
        if (mysqli_num_rows($resultado) > 0) {
             
              $_SESSION['unidades_didacticas'] = []; // Inicializa el arreglo para guardar los resultados
                  
                // Procesar el resto de los resultados
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $_SESSION['unidades_didacticas'][] = [
                        'nombre_programa' => $fila['nombre_programa'],
                        'descripcion_plan' => $fila['descripcion_plan'],
                        'anio' => $fila['anio'],
                        'nombre_curso' => $fila['nombre_curso'],
                        'modulo' => $fila['modulo'],
                        'tipo_unidad' => $fila['tipo_unidad'],
                        'horas_teorica' => $fila['horas_teorica'],
                        'horas_practica' => $fila['horas_practica'],
                        'horas_semanal' => $fila['horas_semanal'],
                        'creditos' => $fila['creditos'],
                        'ciclo' => $fila['ciclo']
            ];
        }
            
            }else{

                    $_SESSION['message'] = '<span style="color: red;">(LA UNIDAD DIDACTICA NO EXISTE)</span>';
            }  
        }} else {
            $_SESSION['message'] = '(ERROR: SELECCIONA MÍNIMO UN FILTRO)';
        }
   
  }
   // header('Location: consultarud.php');
    //header("Location: matricula.php?nro_doc=$nro_doc&id_programa=$id_programa");
   // exit(); // Termina la ejecución después de redirigir
//}

// Cerrar la conexión
$conexion->close();

header('Location: consultarud.php');
?>
