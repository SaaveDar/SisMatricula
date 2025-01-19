<?php
session_start();
include "conexion.php";

if (isset($_POST['registrar'])) {

    $denominacion= $_POST['denominacion'];
    $monto= $_POST['monto'];
    $requisitos= $_POST['requisitos'];

    $consultatupa="INSERT INTO tupa(denominacion_tupa,monto_tupa,requisitos_tupa,estado)
                        VALUES ('$denominacion','$monto','$requisitos',1)";
  
    $resultado=mysqli_query($conexion,$consultatupa);

    if($resultado){

        $_SESSION['message'] = '(TUPA SE GUARDÓ CON EXITO)';

    }else{

        $_SESSION['message'] = '(TUPA NO SE LOGRÓ GUARDAR)';
    }

    header('Location: tupa.php');
}

$conexion->close();
// Redirigir a la página principal
header('Location: tupa.php');

?>