<?php
session_start();
include __DIR__ . '../conexion.php';
//unset($_SESSION['estudiantes']);

if (empty($_SESSION["nombre"]) and empty($_SESSION["apellido"])) {
	header("location:login.php");
    exit;
   
} 
// Verificar si hay un mensaje en la sesión y mostrarlo
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo

} else {
    $message = ''; // Si no hay mensaje, dejar vacío
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Configurar Periodo Lectivo</title>
	
                                    
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- INICIO: PARA EL SELECT CON BUSCADOR -->
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <!-- FIN: PARA EL SELECT CON BUSCADOR -->

    <!-- INICIO: PARA LA TABLA -->
    <!-- Estilos CSS de DataTables -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <!-- FIN: PARA LA TABLA -->

    <style>
  /* Estilo general del modal */
  .modal {
    display: none; /* Ocultar por defecto */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Asegura que esté encima de otros elementos */
  }

  /* Contenedor interno del modal */
  .modal-content {
    background-color: #fff; /* Fondo blanco */
    padding: 20px;
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra suave */
    width: 90%;
    max-width: 400px; /* Ancho máximo */
    text-align: center;
    animation: slideDown 0.3s ease; /* Animación al aparecer */
  }

  /* Mensaje del modal */
  .modal-content p {
    font-size: 16px; /* Tamaño de texto */
    color: #333; /* Color del texto */
    margin-bottom: 20px;
  }

  /* Botón del modal */
  .modal-button {
    background-color: #007bff; /* Color de fondo azul */
    color: #fff; /* Color del texto */
    border: none; /* Sin bordes */
    border-radius: 5px; /* Bordes redondeados */
    padding: 10px 20px; /* Espaciado interno */
    font-size: 14px; /* Tamaño de texto */
    cursor: pointer;
    transition: background-color 0.3s ease; /* Animación en hover */
  }

  /* Efecto hover en el botón */
  .modal-button:hover {
    background-color: #0056b3; /* Azul más oscuro */
  }

  /* Animación para que el modal descienda */
  @keyframes slideDown {
    from {
      transform: translateY(-20%);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }
</style>

</head>
<body>

<?php
		// Si se recibe un mensaje de éxito o error, lo mostramos en una ventana emergente
		if (isset($_GET['message'])) {
			$message = $_GET['message'];
			echo "<script>alert('$message');</script>";
		}
	?>
<div id="alertModal" class="modal">
  <div class="modal-content">
    <p id="alertMessage"></p>
    <button onclick="cerrarAlerta()" class="modal-button">Aceptar</button>
  </div>
</div>

<nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
		<div class=logo>
            <a class="p-2" href="inicio.php"><img src="img/logo_istelaredo1.png" alt="Logo" width="140" height="50"></a>
        </div>
        <div class="text-white bg-success p-2" >
        <a  class="text-white bg-success p-2" href="inicio.php" >
        <?php
			echo "Bienvenido ".$_SESSION["nombre"]." ".$_SESSION["apellido"];
			?>
		</a>
            
		</div>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<div class="navbar-nav mr-auto">
				<div class="offset-md-1 mr-auto text-center"></div>
						
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify active ml-3 hover-primary" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Registro
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="postulante.php">Postulante</a>
						<a class="dropdown-item" href="estudiante.php">Ingresante</a>
						<a class="dropdown-item" href="periodo_lectivo.php">Periodo Lectivo</a>
						<a class="dropdown-item" href="programa_estudios.php">Programa de Estudios</a>
						<a class="dropdown-item" href="plan_estudios.php">Plan de Estudios</a>
						<a class="dropdown-item" href="unidades_didacticas.php">Unidades Didacticas</a>
						<a class="dropdown-item" href="periodo_academico.php">Periodo Academico</a>
						<a class="dropdown-item" href="tupa.php">Tupa</a>
                        <a class="dropdown-item" href="pago.php">Pagos</a>
						<a class="dropdown-item" href="usuario.php">Usuario</a>
					</div>
				</li>
				<!--<a class="nav-item nav-link text-justify ml-3 hover-primary" href="matriculas.php">Matricular</a>-->
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Matriculas
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="matriculas.php">Generar Matriculas</a>
						<a class="dropdown-item" href="convalidacion_otros.php">Convalidaciones y otras</a>
						
					</div>
				</li>
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Consultas
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="consultarud.php">Unidades Didacticas</a>
						<a class="dropdown-item" href="reporte_estadocuentas.php">Pagos Realizados</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Configuraciòn
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="configurar_periodolectivo.php">Periodo Lectivo</a>
												
					</div>
				</li>
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Reporte
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="reporte_postulantes.php">Postulante</a>
						<a class="dropdown-item" href="#">Estudiante</a>
						<a class="dropdown-item" href="alumnos_matriculados.php">Matriculas</a>
						<a class="dropdown-item" href="estadocuentagenerarpdf.php">Estado de cuenta</a>
					</div>
				</li>
        <li class="nav-item dropdown">
                  <a class="nav-item nav-link text-justify ml-3 hover-primary" href="controladorCerrar.php">Salir</a>
				</li>
			</div>
			<div class="text-center justify-content-center">
			<!--	<a class="btn btn-outline-primary" target="_blank" href="https://www.facebook.com/istelaredo.trujillo.7">Facebook</a>-->
				<a class="btn btn-outline-primary" target="_blank" href="https://istelaredo.edu.pe">www.istelaredo.edu.pe</a>
			</div>
		</div>

	</nav>
	<main>
    
	<div class="row">
        <div class="container" style="width: 120%">
            <br>
            <span id="message" style="color: <?php echo strpos($message, 'ERROR') !== false ? 'red' : 'green'; ?>;">
                                <?php echo $message; ?>
            </span>
            
            <div class="row">
                <div class="col-md-22">
                    <div class="card card-primary"  style="box-shadow: 0px 5px 5px 5px #c0c0c0">
                        <div class="card-header">
                        <div class="text-center">
                           <strong> CONFIGURACIÓN PERIODO LECTIVO</strong>  <!--<span id="message" style="color: green;"><?php echo $message; ?></span>-->
                        </div>
                       </div>
                        <div class="card-body">  
                        <form action="controlador_configurarplectivo.php" method="POST" enctype="multipart/form-data" name="formbuscar">
                      
                                <div class="col-mi-8">
                                    <table id="tabla_periodo" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Nombre Periodo</th>
                                            <th>Periodo Numérico</th>
                                            <th>Fecha de Inicio</th>
                                            <th>Fecha Final</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $contador = 1;
                                            // Consulta para obtener los datos de la tabla "periodo_lectivo"
                                            $query = $conexion->query("SELECT id_periodo_lectivo, nombre_periodo, numero_periodo, 
                                                                        DATE_FORMAT(fechainicio, '%d-%m-%Y') AS fechainicio, 
                                                                        DATE_FORMAT(fechafinal, '%d-%m-%Y') AS fechafinal ,
                                                                        estado
                                                                        FROM periodolectivo order by nombre_periodo desc");
                                            while ($row = mysqli_fetch_array($query)) {
                                                $estado_texto = '';
                                                switch ($row['estado']) {
                                                    case 0:
                                                        $estado_texto = 'Cerrado';
                                                        break;
                                                    case 1:
                                                        $estado_texto = 'Aperturado';
                                                        break;
                                                    case 3:
                                                        $estado_texto = 'Sin Aperturar';
                                                        break;
                                                    default:
                                                        $estado_texto = 'Desconocido';
                                                        break;
                                                }
                                                echo '<tr>';
                                                echo '<td>' . $contador++  . '</td>'; 
                                                echo '<td>' . $row["nombre_periodo"] . '</td>';
                                                echo '<td>' . $row["numero_periodo"] . '</td>';
                                                echo '<td>' . $row["fechainicio"] . '</td>';
                                                echo '<td>' . $row["fechafinal"] . '</td>';
                                                echo '<td>' . $estado_texto . '</td>';
                                                echo '<td>';
                                                
                                                // Verificar si el estado es diferente de 0 (Cerrado)
                                                if ($row['estado'] == 1) {
                                                    //echo '<button type="button" class="btn btn-primary btn-sm" onclick="aperturarPeriodo(' . $row["id_periodo_lectivo"] . ')">Aperturar</button>';
                                                    echo '<span style="margin: 0 5px;"></span>'; // Separador entre los botones
                                                    echo '<button type="button" class="btn btn-danger btn-sm" onclick="cerrarPeriodo(' . $row["id_periodo_lectivo"] . ')">Cerrar</button>';
                                                } elseif ($row['estado'] == 3) {
                                                    //echo '';
                                                    echo '<button type="button" class="btn btn-primary btn-sm" onclick="aperturarPeriodo(' . $row["id_periodo_lectivo"] . ')">Aperturar</button>';
                                                } else {
                                                  echo '';
                                                } 
                                                
                                                echo '</td>';
                                                
                                                //echo '<td>
                                                //        <button type="button" class="btn btn-primary btn-sm" onclick="aperturarPeriodo(' . $row["id_periodo_lectivo"] . ')">Aperturar</button>
                                                //        <button type="button" class="btn btn-danger btn-sm" onclick="cerrarPeriodo(' . $row["id_periodo_lectivo"] . ')">Cerrar</button>
                                                //    </td>';

                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                         
                             </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
	</main>
	<div class="">
		<div class="jumbotron bg-dark text-light rounded-0">
        <!--Pie de pagina-->
		<h4> © 2024 IESTP LAREDO | Reservados todos los derechos</h4>
		</div>
	</div>
	</div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>

</html>


 
<!-- Scripts necesarios para DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#tabla_periodo').DataTable({
            pageLength: 10, // Mostrar 10 filas por defecto
            lengthMenu: [10, 25, 50], // Opciones de filas
            language: {
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ filas",
                info: "Mostrando _START_ a _END_ de _TOTAL_ filas",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                }
            }
        });
    });

    function editarPeriodo(id) {
        // Redirigir a una página de edición o implementar lógica de edición
        alert('Editar periodo con ID: ' + id);
    }

    function eliminarPeriodo(id) {
        if (confirm('¿Está seguro de eliminar este periodo?')) {
            // Redirigir o implementar lógica de eliminación
            alert('Eliminar periodo con ID: ' + id);
        }
    }

    // Función para mostrar el modal
  function mostrarAlerta(mensaje) {
    const alertModal = document.getElementById("alertModal");
    const alertMessage = document.getElementById("alertMessage");
    alertMessage.textContent = mensaje;
    alertModal.style.display = "flex";
  }

  // Función para cerrar el modal
  function cerrarAlerta() {
    const alertModal = document.getElementById("alertModal");
    alertModal.style.display = "none";
  }

  // Modificación en la función existente
  function aperturarPeriodo(idPeriodo) {
    const confirmacion = confirm("¿Está seguro que desea aperturar este periodo?");
    if (confirmacion) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "controlador_configurarplectivo.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = function () {
        if (xhr.status === 200) {
          const respuesta = JSON.parse(xhr.responseText);
          if (respuesta.exito) {
            mostrarAlerta("El periodo ha sido aperturado correctamente.");
            location.reload();
          } else {
            mostrarAlerta(respuesta.mensaje); // Mostrar el error en el modal
          }
        } else {
          mostrarAlerta("Error al procesar la solicitud.");
        }
      };
      xhr.send("accion=aperturar&id_periodo=" + idPeriodo);
    }
  }

  function cerrarPeriodo(idPeriodo) {
    const confirmacion = confirm("¿Está seguro que desea cerrar este periodo?");
    if (confirmacion) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "controlador_configurarplectivo.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = function () {
        if (xhr.status === 200) {
          const respuesta = JSON.parse(xhr.responseText);
          if (respuesta.exito) {
            mostrarAlerta("El periodo ha sido cerrado correctamente.");
            location.reload();
          } else {
            mostrarAlerta(respuesta.mensaje); // Mostrar el error en el modal
          }
        } else {
          mostrarAlerta("Error al procesar la solicitud.");
        }
      };
      xhr.send("accion=cerrar&id_periodo=" + idPeriodo);
    }
  }


</script>