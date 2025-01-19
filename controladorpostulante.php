
<?php
    
    session_start();
    include "conexion.php";
    $mensaje = ""; // Variable para el mensaje de resultado
    date_default_timezone_set("America/Lima");
    $fechaHora =date("Y-m-d H:i:s");
    // $fecha_del_sistema =date("Y-m-d");
    // $hora_del_sistema =date("H:i:s");
    //$dia_actual = date("d");
    // $anio_actual=date("Y");

    $tipo_doc_identidad = $_POST['tipo_doc_identidad'];
    $nro_doc_identidad = $_POST['nro_doc_identidad'];
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $tercer_nombre = $_POST['tercer_nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $sexo = $_POST['sexo'];
    $fecha_nac = $_POST['fecha_nac'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $idpersona=0;
    $anioadmision=$_POST['anio_admision'];
    $colegio=$_POST['colegio'];
    $primera_opc=$_POST['primera_opcion'];
    $segunda_opc=$_POST['segunda_opcion'];
    $motivo_pos = $_POST['motivo_pos'];

    //$foto_dni = $_POST['foto_dni'];
    $nombre_de_foto_dni = "".date('Y-m-d-h-i-s');
    $filename1 = $nombre_de_foto_dni."__".$_FILES['foto_dni']['name'];
    $location = "documentos/".$filename1;
    move_uploaded_file($_FILES['foto_dni']['tmp_name'],$location);

    //$pago_postulante = $_POST['pago_postulante'];
    $nombre_de_pago_postulante = "".date('Y-m-d-h-i-s');
    $filename2 = $nombre_de_pago_postulante."__".$_FILES['pago_postulante']['name'];
    $location = "documentos/".$filename2;
    move_uploaded_file($_FILES['pago_postulante']['tmp_name'],$location);

    //$foto_postulante = $_POST['foto_postulante'];
    $nombre_de_foto_postulante = "".date('Y-m-d-h-i-s');
    $filename3 = $nombre_de_foto_postulante."__".$_FILES['foto_postulante']['name'];
    $location = "documentos/".$filename3;
    move_uploaded_file($_FILES['foto_postulante']['tmp_name'],$location);

    //$certificado_estudios = $_POST['certificado_estudios'];
    $nombre_de_certificado_estudios = "".date('Y-m-d-h-i-s');
    $filename4 = $nombre_de_certificado_estudios."__".$_FILES['certificado_estudios']['name'];
    $location = "documentos/".$filename4;
    move_uploaded_file($_FILES['certificado_estudios']['tmp_name'],$location);

    //$partida_postulante = $_POST['partida_postulante'];
    $nombre_de_partida_postulante = "".date('Y-m-d-h-i-s');
    $filename5 = $nombre_de_partida_postulante."__".$_FILES['partida_postulante']['name'];
    $location = "documentos/".$filename5;
    move_uploaded_file($_FILES['partida_postulante']['tmp_name'],$location);

    //$declaracion_jurada = $_POST['declaracion_jurada'];
    $nombre_de_declaracion_jurada= "".date('Y-m-d-h-i-s');
    $filename6 = $nombre_de_declaracion_jurada."__".$_FILES['declaracion_jurada']['name'];
    $location = "documentos/".$filename6;
    move_uploaded_file($_FILES['declaracion_jurada']['tmp_name'],$location);

    $sqlTablaPersona="INSERT INTO persona (tipo_documento_identidad_persona,nro_documento_persona,
                                          primer_nombre_persona,segundo_nombre_persona,tercer_nombre_persona,
                                          primer_apellido_persona,segundo_apellido_persona,sexo_persona,
                                          fecha_nacimiento_persona,celular_persona,correo_persona,direccion_persona)
                     VALUES('$tipo_doc_identidad','$nro_doc_identidad','$primer_nombre','$segundo_nombre','$tercer_nombre',
                     '$apellido_paterno','$apellido_materno','$sexo','$fecha_nac','$celular','$correo','$direccion')";

   $insertandoPersona= mysqli_query($conexion,$sqlTablaPersona);
  /*echo "Inserto Persona";*/
   if($insertandoPersona){
   /* Consulta pata obtener el id personsa  */
     $consulta_idpersona="SELECT * FROM Persona WHERE nro_documento_persona='$nro_doc_identidad'";
     $resultado=mysqli_query($conexion,$consulta_idpersona);
        if($resultado){
            if($fila=$resultado->fetch_array()){
              $idpersona=$fila['id_persona'];
            }
        }
       
     if($idpersona>0){
      $sqlTablaPostulante="INSERT INTO postulante(id_persona_postulante,anio_admision_postulante,colegio_procedencia_postulante,
                                                primera_opcion_postulante,segunda_opcion_postulante,dni_foto_postulante,pago_postulante,
                                                foto_postulante,certificado_estudios_postulante,partida_nacimiento_postulante,
                                                declaracion_jurada_postulante,motivo,estado)
                           VALUES('$idpersona','$anioadmision','$colegio','$primera_opc','$segunda_opc','$filename1','$filename2','$filename3',
                               '$filename4','$filename5','$filename6','$motivo_pos',1)";
      $insertandoPostulante= mysqli_query($conexion,$sqlTablaPostulante);
         if($insertandoPostulante){
          
          $_SESSION['message'] = '(POSTULANTE SE GUARDÓ CON EXITO)';
          } 
     }else{
          $_SESSION['message'] = '(POSTULANTE NO SE LOGRÓ GUARDAR)';
     }
     header('Location: postulante.php');
   }

   $conexion->close();
   // Redirigir a la página principal
   header('Location: postulante.php');

?>

