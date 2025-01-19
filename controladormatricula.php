<?php
session_start();
// Conexión a la base de datos
include __DIR__ . '../conexion.php';

// Establecer el conjunto de caracteres a UTF-8
$conexion->set_charset("utf8");

if (isset($_POST['buscar'])) {
    $tipo_doc = $_POST['tipo_doc'];
    $nro_doc = $_POST['nro_doc'];

    // Consulta para buscar al estudiante
    $consultaestudiante = "CALL verificar_matricula_dni_v2('$nro_doc')";
    $resultado = mysqli_query($conexion, $consultaestudiante);

    if ($resultado === false) {
      // Esto muestra un error si la consulta falla
      $_SESSION['message'] = '(ERROR EN LA CONSULTA: ' . mysqli_error($conexion) . ')';
    } else {
     

        if ($resultado) {
            if (mysqli_num_rows($resultado) > 0) {
                $estudiante = $resultado->fetch_array();
                $_SESSION['tipo_documento'] = $estudiante['tipodoc'];
                $_SESSION['nro_documento'] = $estudiante['documento'];
                $_SESSION['nombre_completo'] = $estudiante['nombre_completo'];
                $_SESSION['pacademicopasado'] = $estudiante['pasado_ciclo'];
                $_SESSION['pacademicoproximo'] = $estudiante['proximo_ciclo'];
                $_SESSION['plectivo'] = $estudiante['lectivo_actual'];
                $_SESSION['lectivonumerico'] = $estudiante['lectivoactual_numerico'];
                $_SESSION['programa_estudios'] = $estudiante['programa_estudios'];
                $_SESSION['id_programa'] = $estudiante['id_programa'];
                $_SESSION['id_estudiante'] = $estudiante['id_estudiante'];
                $_SESSION['id_planestudios'] = $estudiante['id_planestudios'];
                $_SESSION['id_periodolectivo'] = $estudiante['id_periodolectivo'];
                $_SESSION['id_periodoacademico'] = $estudiante['id_periodoacademico'];
                $_SESSION['id_hismatricula'] = $estudiante['id_hismatricula'];

               // $_SESSION['message'] = '(ESTUDIANTE SE ENCONTRÓ CON ÉXITO)';
            } else {
                      // Captura el mensaje del procedimiento almacenado
                    // Aquí puedes manejar el mensaje devuelto desde MySQL
                  $mensaje_mysql = "DNI no encontrado"; // Asumiendo que este es el mensaje de error esperado
                  $_SESSION['message'] = $mensaje_mysql;
            }
        } else {
            $_SESSION['message'] = '(ERROR EN LA CONSULTA: ' . mysqli_error($conexion) . ')';
        }
          //  if (isset($_SESSION['message'])) {
         //  $_SESSION['message'] ;
         // unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo
       // }
  }

  /*  
    if ($resultado) {

        if (mysqli_num_rows($resultado) > 0) {
            $estudiante = $resultado->fetch_array();
            $_SESSION['tipo_documento'] = $estudiante['tipodoc'];
            $_SESSION['nro_documento'] = $estudiante['documento'];
            $_SESSION['nombre_completo'] = $estudiante['nombre_completo'];
            $_SESSION['pacademicopasado'] = $estudiante['pasado_ciclo'];
            $_SESSION['pacademicoproximo'] = $estudiante['proximo_ciclo'];
            $_SESSION['plectivo'] = $estudiante['lectivo_actual'];
            $_SESSION['lectivonumerico'] = $estudiante['lectivoactual_numerico'];
            $_SESSION['programa_estudios'] = $estudiante['programa_estudios'];
            $_SESSION['id_programa'] = $estudiante['id_programa'];
            $_SESSION['id_estudiante'] = $estudiante['id_estudiante'];
            $_SESSION['id_planestudios'] = $estudiante['id_planestudios'];
            $_SESSION['id_periodolectivo'] = $estudiante['id_periodolectivo'];
            $_SESSION['id_periodoacademico'] = $estudiante['id_periodoacademico'];
                         
            $_SESSION['message'] = '(ESTUDIANTE SE ENCONTRÓ CON EXITO)';
        } else {
            $_SESSION['message'] = '(ESTUDIANTE NO EXISTE)';
        }
    } else {
        $_SESSION['message'] = '(ERROR EN LA CONSULTA: ' . mysqli_error($conexion) . ')';
    } */

    header('Location: matriculas.php');
    //header("Location: matricula.php?nro_doc=$nro_doc&id_programa=$id_programa");
    exit(); // Termina la ejecución después de redirigir
}

if (isset($_POST['registrar'])) {
    // Validación de todas las variables requeridas
    if (!empty($_POST['id_programa']) && !empty($_POST['id_periodolectivo']) && 
        !empty($_POST['id_periodoacademico']) && !empty($_POST['id_estudiante']) && 
        !empty($_POST['plan_estudios']) && !empty($_POST['lectivonumerico']) && 
        !empty($_POST['pacademico_a'])) {

        $id_programa = $_POST['id_programa'];
        $id_periodolectivo = $_POST['id_periodolectivo'];
        $id_periodoacademico = $_POST['id_periodoacademico'];
        $id_estudiante = $_POST['id_estudiante'];
        $id_plan_estudios = $_POST['plan_estudios'];
        $lectivonumerico = $_POST['lectivonumerico'];
        $pacademico_proximo = $_POST['pacademico_a'];
        $id_hismatricula = $_POST['id_hismatricula'];
        
        $fechaHoraActual = date('Y-m-d H:i:s');
        $nro_doc = $_POST['nro_documento'];
        // Consulta para verificar si el estudiante ya está matriculado en el mismo periodo
        
        //verificar primero que este aperturada el periodo lectivo
        $sqlverificarperiodolectivo = "SELECT nombre_periodo from periodolectivo where estado = 1 ";
        $resultadoperiodolectivo = mysqli_query($conexion, $sqlverificarperiodolectivo);
        if (mysqli_num_rows($resultadoperiodolectivo) > 0) {
            // Existe al menos un período activo
           // echo "Hay un período activo en la tabla periodolectivo.";
    
        $sqlVerificacion = "SELECT * FROM historialmatriculas 
                            WHERE id_estudiante_hismatricula = '$id_estudiante' 
                            AND id_periodolectivo = '$id_periodolectivo' 
                            AND periodolectivo_hismatricula = '$lectivonumerico'";

        $resultadoVerificacion = mysqli_query($conexion, $sqlVerificacion);

        if (mysqli_num_rows($resultadoVerificacion) > 0) {
            // Ya está matriculado, mostrar mensaje
            $_SESSION['message'] = '(ERROR: EL ESTUDIANTE '.  $nro_doc . ' YA ESTÁ MATRICULADO EN ESTE PERIODO '. $lectivonumerico .')';
        } else {
            // Si no existe el registro, proceder a la inserción
            $sqlTablahistorialmatri = "INSERT INTO historialmatriculas (
                id_estudiante_hismatricula, id_planestudios_hismatricula, 
                id_periodoacademico_hismatricula, id_periodolectivo, 
                id_programa_estudio, periodoacademico_hismatricula, 
                periodolectivo_hismatricula, estado
            ) VALUES (
                '$id_estudiante', '$id_plan_estudios', '$id_periodoacademico', 
                '$id_periodolectivo', '$id_programa', '$pacademico_proximo', 
                '$lectivonumerico', 1
            )";

            $actualizarestadohistorialmatriculas = (" UPDATE historialmatriculas SET estado = 0 where id_estudiante_hismatricula = '$id_estudiante' and estado = 1 AND id_periodolectivo < '$id_periodolectivo'"); 

            $sqlTablaestadodeuda = "INSERT INTO estadodeuda (
              id_estudiante_estado_deuda, idperiodolectivo, codigo,descripcion,monto,  estado
            ) VALUES (
              '$id_estudiante',$id_periodolectivo , '505010', 'DERECHO DE MATRICULA', '50.00', 1 )";

           // $sqlTablamatriculacursos = " INSERT INTO matricula (id_hismatri,id_estudiante_matricula, id_unidad_didactica_matricula,estado ) 
           // VALUES ('$id_hismatricula' , '$id_estudiante',  '$id_programa', '$id_plan_estudios  ', '$periodo' ) ";
           $verifica_id = "SELECT COUNT(id_hismatricula_hismatricula) as total FROM historialmatriculas"; 
           $confirma_id = mysqli_query ($conexion, $verifica_id);
           if($confirma_id){
            $fila = mysqli_fetch_assoc($confirma_id);
            if ($fila['total'] == 0) {
                    $id_hismatricula = 1;
                    $sqlTablamatriculacursos =  "CALL insertarMatricula('$id_hismatricula', '$id_estudiante', '$id_programa', '$id_plan_estudios', '$pacademico_proximo')";
                }
            else {
                    $sqlTablamatriculacursos =  "CALL insertarMatricula('$id_hismatricula', '$id_estudiante', '$id_programa', '$id_plan_estudios', '$pacademico_proximo')";
            }
                
           }

            //$sqlTablamatriculacursos =  "CALL insertarMatricula('$id_hismatricula', '$id_estudiante', '$id_programa', '$id_plan_estudios', '$pacademico_proximo')";

            $insertandohistmatri = mysqli_query($conexion, $sqlTablahistorialmatri);
            $actualizarestado = mysqli_query($conexion, $actualizarestadohistorialmatriculas);
            $insertandodeuda = mysqli_query($conexion, $sqlTablaestadodeuda);
            $insertandomatricula = mysqli_query($conexion,$sqlTablamatriculacursos);

            // Verificación del resultado de la inserción
            if ($insertandohistmatri && $actualizarestado && $insertandodeuda && $insertandomatricula ) {
                $_SESSION['message'] = '(LA MATRICULA DEL ESTUDIANTE CON DNI '.  $nro_doc . ' SE GUARDÓ CON ÉXITO)';

                $_SESSION['tipo_documento'] = "";
                $_SESSION['nro_documento'] = "";
                $_SESSION['nombre_completo'] = "";
                $_SESSION['pacademicopasado'] = "";
                $_SESSION['pacademicoproximo'] = "";
                $_SESSION['plectivo'] = "";
                $_SESSION['lectivonumerico'] = "";
                $_SESSION['programa_estudios'] = "";
               
                $_SESSION['id_programa'] = "";
                $_SESSION['id_estudiante'] = "";
                $_SESSION['id_planestudios'] = "";
                $_SESSION['id_periodolectivo'] = "";
                $_SESSION['id_periodoacademico'] = "";


            } else {
                $_SESSION['message'] = '(ERROR: LA MATRICULA NO SE GUARDÓ - ' . mysqli_error($conexion) . ')';
            }
        }
    
    } else {
        $_SESSION['message'] = '(ERROR: FALTAN CAMPOS REQUERIDOS)';
    }
} else {
    // No existe ningún período activo
    $_SESSION['message'] = "(ERROR: NO HAY PERIODO LECTIVO APERTURADO. DEBE APERTURAR UNO)";
}
  }
// Cerrar la conexión
$conexion->close();

header('Location: matriculas.php');
?>
