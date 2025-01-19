<?php
    session_start();
    include "conexion.php";
    $id_estudiante=0;
    if (isset($_POST['buscar'])) {

      $tipo_doc= $_POST['tipo_doc'];
      $nro_doc= $_POST['nro_doc'];
 
        $consultaestudiante="SELECT * FROM vista_persona_estudiante_completo
                                     WHERE NRO='$nro_doc' 
                                       AND TIPO='$tipo_doc'";

        $resultado=mysqli_query($conexion,$consultaestudiante);

        if($resultado){
             if(mysqli_num_rows($resultado) > 0){

                $estudiante=$resultado->fetch_array();
                $_SESSION['tipo_documento'] = $estudiante['TIPO'];
                $_SESSION['nro_documento'] = $estudiante['NRO'];
                $_SESSION['nombre_completo'] = $estudiante['NOMBRE_COMPLETO'];
                $_SESSION['id_estudiante'] = $estudiante['IDESTUDIANTE'];
             //   $id_estudiante=$estudiante['IDESTUDIANTE'];
               
                              
                $_SESSION['message'] = '(ESTUDIANTE SE ENCONTRÓ CON EXITO)';
            }else{

                $_SESSION['message'] = '(ESTUDIANTE NO EXISTE)';
            }

        }else{
            $_SESSION['message'] = '(ERROR EN LA CONSULTA)';
        }
        header('Location: pago.php');
    }

  //  $_SESSION['monto'] = "";
  //  $denominacion_tupa="";
  //  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['concepto_pago'])) {
  //    $id_Tupa = $_POST['concepto_pago'];
     // Guardar en sesión el concepto de pago seleccionado
  
      // Consulta para obtener el monto correspondiente al id seleccionado
   //   $queryMonto = $conexion->query("SELECT * FROM tupa WHERE id_tupa = '$id_Tupa'");
      
   //   if ($queryMonto && $queryMonto->num_rows > 0) {
      //    $fila = $queryMonto->fetch_assoc();
        //  $montoseleccionado =  // Guarda el monto en la sesión
     //     $_SESSION['concepto_pago'] = $id_Tupa;
     //     $_SESSION['monto'] = $fila['monto_tupa'];
       //   $_SESSION['denominacion_tupa']= $fila['denominacion_tupa'];
       //   $_SESSION['message'] = 'Monto Tupa Encontrado '.$fila['monto_tupa'];

   //   } else {
      //    $_SESSION['monto'] = 0;
     //     $_SESSION['message'] = 'Monto no encontrado';
     // }
  
     // header('Location: pago.php'); // Redirige de nuevo a pago.php para mostrar el monto actualizado
    //  exit;
//  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar']))  {
    if (!empty($_POST['periodo_lectivo']) && !empty($_POST['numero_operacion_pago']) &&
        !empty($_POST['modalidad_pago']) &&  !empty($_POST['concepto_pago']) && 
        !empty($_POST['id_estudiante']) && !empty($_POST['periodo_academico']) && !empty($_POST['programa'])){

        // Recuperar datos
        $id_estudiante = $_POST['id_estudiante'];
        $id_tupa = $_POST['concepto_pago'];
        $modalidad_pago = $_POST['modalidad_pago'];
        $numero_operacion_pago =!empty($_POST['numero_operacion_pago']) ? $_POST['numero_operacion_pago']:0;
        $programa_estudios= $_POST['programa'];
        $periodo_academico_pago= $_POST['periodo_academico'];
        $id_periodo_lectivo = $_POST['periodo_lectivo'];
          
        // Consulta para insertar el pago en la tabla pago

            $sqlTablapago = "INSERT INTO pago ( id_estudiante_pago,
                                                id_tupa_pago,                                       
                                                modalidad_pago,
                                                numero_operacion_pago,
                                                periodo_academico_pago, 
                                                id_periodo_lectivo_pago,
                                                id_programa_estudios_pago
                                              ) VALUES (
                                                '$id_estudiante',
                                                '$id_tupa', 
                                                '$modalidad_pago',
                                                '$numero_operacion_pago',
                                                '$periodo_academico_pago', 
                                                '$id_periodo_lectivo',
                                                '$programa_estudios'
                                                )";

            // Ejecutar consulta
            $insertandopago = mysqli_query($conexion, $sqlTablapago);

            if ($insertandopago) {
                $_SESSION['message'] = '(PAGO GUARDADO CON EXITO)';

                // Limpiar los datos de la sesión
                
                $_SESSION['nro_documento'] = "";
                $_SESSION['tipo_documento'] = "";
                $_SESSION['nombre_completo'] = "";
                $_SESSION['concepto_pago'] = "";
                $_SESSION['modalidad_pago'] = "";
                $_SESSION['numero_operacion_pago'] = "";
                $_SESSION['id_estudiante'] = "";
                $_SESSION['id_periodo_lectivo'] = "";

            } else {
                $_SESSION['message'] = '(ERROR: NO SE PUEDE GUARDAR EL PAGO)';
            }

        } else {
            $_SESSION['message'] = '(ERROR: FALTAN DATOS PARA GUARDAR EL PAGO)';
        }

        header('Location: pago.php');
     }

    $conexion->close();
    // Redirigir a la página principal
    header('Location: pago.php');
?>