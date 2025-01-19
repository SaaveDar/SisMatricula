<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'aperturar') {
    $idPeriodo = intval($_POST['id_periodo']);
    
    // Verificar si ya hay un periodo con estado = 1
    //$consulta = $conexion->query("SELECT COUNT(*) AS total FROM periodolectivo WHERE estado = 1");
    $consulta = $conexion->query("SELECT nombre_periodo FROM periodolectivo WHERE estado = 1");
    $resultado = $consulta->fetch_assoc();
    
    if ($resultado) {
        // Ya existe un periodo con estado = 1, obtener el nombre del período
        $nombreLectivo = $resultado['nombre_periodo'];
        echo json_encode([
            'exito' => false,
            'mensaje' => "Ya existe un Periodo Lectivo aperturado $nombreLectivo. Cierre el Periodo lectivo actual antes de aperturar uno nuevo."
        ]);
        exit;
    }

    //if ($resultado['total'] > 0) {
        // Ya existe un periodo con estado = 1
    //    echo json_encode([
     //       'exito' => false,
     //       'mensaje' => 'Ya existe un Periodo Lectivo aperturado. Cierre el Periodo lectivo actual antes de aperturar uno nuevo.'
      //  ]);
      //  exit;
   // }

    // Actualizar el estado del periodo
    $actualizacion1 = $conexion->query("UPDATE periodolectivo SET estado = 1 WHERE id_periodo_lectivo = $idPeriodo");

    if ($actualizacion1) {
        echo json_encode(['exito' => true]);
    } else {
        echo json_encode([
            'exito' => false,
            'mensaje' => 'Error al aperturar el periodo. Intente nuevamente.'
        ]);
    }
    exit;


} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'cerrar')  { //{  ($accion === 'cerrar')
    $idPeriodo = intval($_POST['id_periodo']);
    // Cerrar solo el periodo que está aperturado (estado = 1) y coincide con el ID
    $actualizacion = $conexion->query("UPDATE periodolectivo SET estado = 0 WHERE id_periodo_lectivo = $idPeriodo and estado=1");
    if ($actualizacion) {
        echo json_encode(['exito' => true]);
    } else {
        echo json_encode([
            'exito' => false,
            'mensaje' => 'No se pudo cerrar el periodo. Asegúrese de que está aperturado.'
        ]);
    }
    exit;



}
?>
