<?php
    session_start();
    include "conexion.php";
    date_default_timezone_set("America/Lima");
    $fechaHora =date("Y-m-d H:i:s");
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
    $tipo_usuario=$_POST['tipo_usuario'];
    $identificador=$_POST['identificador'];
    $clave=$_POST['clave'];
    $idpersona=0;
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
      
        $sqlTablaUsuario="INSERT INTO usuario(id_persona_usuario,tipo_usuario,identificador_usuario,clave_usuario,estado)
                               VALUES ('$idpersona','$tipo_usuario','$identificador','$clave',1)";
  

        $insertandoUsuario= mysqli_query($conexion,$sqlTablaUsuario);
          if($insertandoUsuario){
        
             $_SESSION['message'] = '(USUARIO SE GUARDÓ CON EXITO)';
            } 

        }else{

            $_SESSION['message'] = '(USUARIO NO SE LOGRÓ GUARDAR)';
        }
     header('Location: usuario.php');
   }


   $conexion->close();
   // Redirigir a la página principal
   header('Location: usuario.php');
?>