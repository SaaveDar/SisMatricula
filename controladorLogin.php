<?php
session_start();
if (!empty($_POST["btningresar"])){

   if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
    $usuario=$_POST["usuario"];
    $password=$_POST["password"];
    $sql=$conexion->query("select primer_nombre_persona ,primer_apellido_persona from persona INNER JOIN usuario ON usuario.id_persona_usuario=persona.id_persona where usuario_usuario='$usuario' and contrasena_usuario='$password'");
    if ($datos=$sql->fetch_object()) {
       $_SESSION["nombre"]=$datos->primer_nombre_persona;
       $_SESSION["apellido"]=$datos->primer_apellido_persona;
        header ("Location: inicio.php");
    } else {
        echo "<div class='alert alert-danger'> Usuario y/o Contraseña incorrectas</div>";
    }
    
   } else {
    echo "<div class='alert alert-danger'> Campos vacios</div>";
   }
   
}

?>