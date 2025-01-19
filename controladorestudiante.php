<?php
    session_start();
    include "conexion.php";

    if (isset($_POST['buscar'])) {

      $tipo_doc= $_POST['tipo_doc'];
      $nro_doc= $_POST['nro_doc'];

        $consultaPostulante="SELECT * FROM vista_persona_postulante
                                     WHERE nro_documento_persona='$nro_doc' 
                                       AND tipo_documento_identidad_persona='$tipo_doc'";

        $resultado=mysqli_query($conexion,$consultaPostulante);

        if($resultado){
             if(mysqli_num_rows($resultado) > 0){

                $postulante=$resultado->fetch_array();

                $_SESSION['tipo_documento'] = $postulante['tipo_documento_identidad_persona'];
                $_SESSION['nro_documento'] = $postulante['nro_documento_persona'];
                $_SESSION['primer_nombre'] = $postulante['primer_nombre_persona'];
                $_SESSION['segundo_nombre'] = $postulante['segundo_nombre_persona'];
                $_SESSION['tercer_nombre'] = $postulante['tercer_nombre_persona'];
                $_SESSION['apellido_paterno'] = $postulante['primer_apellido_persona'];
                $_SESSION['apellido_materno'] = $postulante['segundo_apellido_persona'];

              
                $_SESSION['message'] = '(POSTULANTE SE ENCONTRÓ CON EXITO)';
            }else{

                $_SESSION['message'] = '(POSTULANTE NO EXISTE)';
            }

        }else{
           
            $_SESSION['message'] = '(ERROR EN LA CONSULTA)';
        }

        header('Location: estudiante.php');
    }
    $id_postulante=0;

    if (isset($_POST['registrar'])) {
        $tipo_documento = $_SESSION['tipo_documento'];
        $nro_documento =  $_SESSION['nro_documento'];
        $periodo_lectivo = $_POST['periodo_lectivo'];
        $programa_estudios = $_POST['programa_estudios'];

        $consultaPostulante="SELECT * FROM vista_persona_postulante
                                     WHERE nro_documento_persona='$nro_documento' 
                                       AND tipo_documento_identidad_persona='$tipo_documento'";
        
        $resultado2 = mysqli_query($conexion, $consultaPostulante);
      
          if ($resultado2 && mysqli_num_rows($resultado2) > 0) {
              if ($fila = $resultado2->fetch_array()) {
                $id_postulante = $fila['id_postulante'];
              //  echo "El ID POSTULANTE ES " . strval($id_postulante);
              }
          } else {
              $_SESSION['message'] = 'NO SE ENCONTRÓ El POSTULANTE';
              header('Location: estudiante.php');
              exit();  // Detener la ejecución si no hay postulante
          }

        if($id_postulante>0){

           $sqlTablaEstudiante="INSERT INTO estudiante (id_postulante_estudiante,id_periodo_lectivo_estudiante,id_programa_estudios_estudiante,estado) 
                                     VALUES ('$id_postulante','$periodo_lectivo','$programa_estudios',1)";
          $insertandoEstudiante= mysqli_query($conexion,$sqlTablaEstudiante);

            if($insertandoEstudiante){
              $_SESSION['message'] = '(INGRESANTE SE GUARDÓ CON EXITO)';

                $_SESSION['tipo_documento'] = "";
                $_SESSION['nro_documento'] = "";
                $_SESSION['primer_nombre'] = "";
                $_SESSION['segundo_nombre'] = "";
                $_SESSION['tercer_nombre'] = "";
                $_SESSION['apellido_paterno'] = "";
                $_SESSION['apellido_materno'] = "";

            } else{
              $_SESSION['message'] = '(INGRESANTE NO SE LOGRÓ GUARDAR)';
               
              $_SESSION['tipo_documento'] = "";
              $_SESSION['nro_documento'] = "";
              $_SESSION['primer_nombre'] = "";
              $_SESSION['segundo_nombre'] = "";
              $_SESSION['tercer_nombre'] = "";
              $_SESSION['apellido_paterno'] = "";
              $_SESSION['apellido_materno'] = "";
            }
        } else{

          $_SESSION['message'] = '(ERROR EN LA CONSULTA)';
        }
      header('Location: estudiante.php');
    }
$conexion->close();
// Redirigir a la página principal
header('Location: estudiante.php');
?>