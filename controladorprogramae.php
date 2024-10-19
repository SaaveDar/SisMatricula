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

if (isset($_POST['abreviatura_programa']) && isset($_POST['nombre_programa'])) {
    // Escapar los datos recibidos para evitar inyección SQL
    $abre_programa = $conexion->real_escape_string($_POST['abreviatura_programa']);
    $nombre_programa = $conexion->real_escape_string($_POST['nombre_programa']); 
    //$anio =  (int)$_POST['anio'];
    //$estado = $conexion->real_escape_string($_POST['estado']);

    // Crear la consulta SQL 
    $sql = "INSERT INTO programaestudios (abreviatura_programa, nombre_programa, estado) VALUES (
        '$abre_programa', '$nombre_programa', 1
    )";

if ($conexion->query($sql) === TRUE) {
    // Redirige a la página principal con un mensaje de éxito
    header('Location: programa_estudios.php?message=Datos guardados correctamente.');
    $_SESSION['message'] = '(Datos guardados correctamente.)';
} else {
    // Redirige a la página principal con un mensaje de error
    header('Location: programa_estudios.php?message=Error al guardar los datos.');
    $_SESSION['message'] = '(Erroral guardar los datos.)';
}
} else {
// Si los datos no fueron enviados correctamente, redirige con un mensaje de error
header('Location: programa_estudios.php?message=Por favor, complete todos los campos.');
$_SESSION['message'] = '(Por favor, complete todos los campos.)';
}
 
$conexion->close();
// Redirigir a la página principal
header('Location: programa_estudios.php');
?>




