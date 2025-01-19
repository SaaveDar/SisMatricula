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

if (isset($_POST['nombre_ud']) && isset($_POST['abrev_ud'])) {
    
    // Escapar los datos recibidos para evitar inyección SQL
    $nombre_ud = $conexion->real_escape_string($_POST['nombre_ud']);
    $abrev_ud = $conexion->real_escape_string($_POST['abrev_ud']);
    $planestudios_ud = $conexion->real_escape_string($_POST['planestudios_ud']);
    $programa_ud = $conexion->real_escape_string($_POST['programa_ud']);
    $modulo_ud = $conexion->real_escape_string($_POST['modulo_ud']);
    $tipo_ud = $conexion->real_escape_string($_POST['tipo_ud']);
    $periodoacademico_ud = $conexion->real_escape_string($_POST['periodoacademico_ud']);
    $creditos_ud = (int)$_POST['creditos_ud'];
    $horateorica_ud = (int)$_POST['horateorica_ud'];
    $horapractica_ud = (int)$_POST['horapractica_ud'];
    $horatotal_ud = (int)$_POST['horatotal_ud'];
    $horasemanal_ud = (int)$_POST['horasemanal_ud'];
    $estado = $conexion->real_escape_string($_POST['estado']);

    // Crear la consulta SQL
    $sql = "INSERT INTO unidaddidactica (nombre_unidad, abreviatura_unidad, id_plan_unidad, programa_estudios_unidad, modulo_unidad, tipo_unidad, periodo_academico_unidad, creditos_unidad,
horas_teoricas_unidad, horas_practicas_unidad, horas_totales_unidad, horas_semanales_unidad, estado) 
VALUES (
        UPPER('$nombre_ud'), UPPER('$abrev_ud'), UPPER('$planestudios_ud'), UPPER('$programa_ud'), 
        UPPER('$modulo_ud'), UPPER('$tipo_ud'), UPPER('$periodoacademico_ud'), $creditos_ud, 
        $horateorica_ud, $horapractica_ud, $horatotal_ud, $horasemanal_ud, '$estado'
    )";


if ($conexion->query($sql) === TRUE) {
    // Redirige a la página principal con un mensaje de éxito
    header('Location: unidades_didacticas.php?message=Datos guardados correctamente.');
    $_SESSION['message'] = '(Datos guardados correctamente.)';
} else {
    // Redirige a la página principal con un mensaje de error
    header('Location: unidades_didacticas.php?message=Error al guardar los datos.');
    $_SESSION['message'] = '(Error al guardar los datos.)';
}
} else {
// Si los datos no fueron enviados correctamente, redirige con un mensaje de error
header('Location: unidades_didacticas.php?message=Por favor, complete todos los campos.');
}

$conexion->close();
// Redirigir a la página principal
header('Location: unidades_didacticas.php');
?>



