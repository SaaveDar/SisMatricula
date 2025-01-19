<?php
session_start();
// Conexión a la base de datos
include __DIR__ . '../conexion.php';

// Establecer el conjunto de caracteres a UTF-8
$conexion->set_charset("utf8");

// Verificar si la conexión tuvo éxito
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$mensaje = ""; // Variable para el mensaje de resultado

if (isset($_POST['nombre_pl']))  {
    
    // Escapar los datos recibidos para evitar inyección SQL
    $nombre_pl = $conexion->real_escape_string($_POST['nombre_pl']);
    $nombre_number = $conexion->real_escape_string($_POST['nombre_number']);
    $fechainicio = $conexion->real_escape_string($_POST['fechainicio']);
    $fechafinal = $conexion->real_escape_string($_POST['fechafinal']);
    $estado = $conexion->real_escape_string($_POST['estado']);

    // Crear la consulta SQL
    $sql = "INSERT INTO periodolectivo (nombre_periodo, numero_periodo, fechainicio, fechafinal, estado) 
    VALUES ('$nombre_pl', '$nombre_number', '$fechainicio', '$fechafinal',3)";


if ($conexion->query($sql) === TRUE) {
    // Redirige a la página principal con un mensaje de éxito
    header('Location: periodo_lectivo.php?message=Datos guardados correctamente.');
    $_SESSION['message'] = '(PERIODO LECTIVO GUARDÓ CON EXITO)';
} else {
    // Redirige a la página principal con un mensaje de error
    header('Location: periodo_lectivo.php?message=Error al guardar los datos.');
    $_SESSION['message'] = '(ERROR AL GUARDAR PERIODO LECTIVO)';
}
} else {
// Si los datos no fueron enviados correctamente, redirige con un mensaje de error
header('Location: periodo_lectivo.php?message=Por favor, complete todos los campos.');
}

$conexion->close();
// Redirigir a la página principal
header('Location: periodo_lectivo.php');
?>
