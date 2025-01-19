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

if (isset($_POST['periodo_academico']))  {
    
    // Escapar los datos recibidos para evitar inyección SQL
    $nombre_pa = $conexion->real_escape_string($_POST['periodo_academico']);
 

    // Crear la consulta SQL
    $sql = "INSERT INTO periodoacademico (nombre_periodo, estado) 
    VALUES (UPPER('$nombre_pa'), 1)";


if ($conexion->query($sql) === TRUE) {
    // Redirige a la página principal con un mensaje de éxito
    header('Location: periodo_academico.php?message=Datos guardados correctamente.');
    $_SESSION['message'] = '(PERIODO ACADÉMICO GUARDÓ CON EXITO)';
} else {
    // Redirige a la página principal con un mensaje de error
    header('Location: periodo_academico.php?message=Error al guardar los datos.');
    $_SESSION['message'] = '(ERROR AL GUARDAR PERIODO ACADÉMICO)';
}
} else {
// Si los datos no fueron enviados correctamente, redirige con un mensaje de error
header('Location: periodo_academico.php?message=Por favor, complete todos los campos.');
}

$conexion->close();
// Redirigir a la página principal
header('Location: periodo_academico.php');
?>
