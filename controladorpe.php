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

if (isset($_POST['nombre_plan']) && isset($_POST['descripcion_plan'])) {
    // Escapar los datos recibidos para evitar inyección SQL   
    $id_programa = $conexion ->real_escape_string($_POST['programa_ud']);
    $nombre_plan = $conexion->real_escape_string($_POST['nombre_plan']);
    $descripcion_plan = $conexion->real_escape_string($_POST['descripcion_plan']); 
    $anio =  (int)$_POST['anio'];
    $estado = $conexion->real_escape_string($_POST['estado']);

    // Crear la consulta SQL 
    $sql = "INSERT INTO planestudios (id_programaestudios, nombre_plan, descripcion_plan, anio, estado) values (
        UPPER('$nombre_plan'), UPPER('$id_programa', '$descripcion_plan'), '$anio', '$estado'
    )";

if ($conexion->query($sql) === TRUE) {
    // Redirige a la página principal con un mensaje de éxito
    header('Location: plan_estudios.php?message=Datos guardados correctamente.');
    $_SESSION['message'] = '(Datos guardados correctamente.)';
} else {
    // Redirige a la página principal con un mensaje de error
    header('Location: plan_estudios.php?message=Error al guardar los datos.');
    $_SESSION['message'] = '(Erroral guardar los datos.)';
}
} else {
// Si los datos no fueron enviados correctamente, redirige con un mensaje de error
header('Location: plan_estudios.php?message=Por favor, complete todos los campos.');
$_SESSION['message'] = '(Por favor, complete todos los campos.)';
}
 
$conexion->close();
// Redirigir a la página principal
header('Location: plan_estudios.php');
?>




