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

//if (isset($_SESSION['estudiantes']) && count($_SESSION['estudiantes']) > 0):
 

$tipo_documento = isset($_SESSION['tipo_documento']) ? $_SESSION['tipo_documento'] : "";
$nro_documento = isset($_SESSION['nro_documento']) ? $_SESSION['nro_documento'] : "";
$nombre_completo = isset($_SESSION['nombre_completo']) ? $_SESSION['nombre_completo'] : "";
$periodoacademico = isset($_SESSION['periodoacademico']) ? $_SESSION['periodoacademico'] : "";
$periodolectivo = isset($_SESSION['periodolectivo']) ? $_SESSION['periodolectivo'] : "";
$programa_estudios = isset($_SESSION['programa_estudios']) ? $_SESSION['programa_estudios'] : "";


//unset($_SESSION['estudiantes']); 

//endif;
/*
$ciclo_curso = isset($_SESSION['ciclo_curso']) ? $_SESSION['ciclo_curso'] : "";
$curso_nombre = isset($_SESSION['curso_nombre']) ? $_SESSION['curso_nombre'] : "";
$abrev_curso = isset($_SESSION['abrev_curso']) ? $_SESSION['abrev_curso'] : "";
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>REPORTE - Matricula</title>
	
                                    
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/css/bootstrap.min.css">
	
	
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
<?php
		// Si se recibe un mensaje de éxito o error, lo mostramos en una ventana emergente
		if (isset($_GET['message'])) {
			$message = $_GET['message'];
			echo "<script>alert('$message');</script>";
		}
	?>

<nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
		<div class=logo>
            <a class="navbar-brand" href="inicio.php"><img src="img/logo_istelaredo1.png" alt="Logo" width="140" height="50"></a>
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
        <div class="container" style="width: 95%">
            <br>
            <span id="message" style="color: <?php echo strpos($message, 'ERROR') !== false ? 'red' : 'green'; ?>;">
                                <?php echo $message; ?>
            </span>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary" style="box-shadow: 0px 5px 5px 5px #c0c0c0">
                        <div class="card-header">
                        <div class="text-center">
                           <strong> REPORTE ESTADO DE CUENTA</strong>  <!--<span id="message" style="color: green;"><?php echo $message; ?></span>-->
                           
                        </div>
                      
                        </div>
                        <div class="card-body">  
                        <form action="controlador_estadocuentageneradorpdf.php" method="POST" enctype="multipart/form-data" name="formbuscar">
                                <div class="row">
                                    
                                   <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">TIPO DOCUMENTO</label>
                                            <select name="tipo_doc" id="tipo_doc" class="form-control" required>
											    <option value="DNI">DNI</option>
                                                <option value="CARNET EXT.">CARNET DE EXT.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">NRO DOCUMENTO</label> 
                                            <input type="number" name="nro_doc" class="form-control" oninput="validateInput(this, 12)" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="form-group">
                                              <label for="">PROGRAMA DE ESTUDIOS</label>
                                                <select name="programa" id="programa" class="form-control">
											    <option >Seleccione </option>
											    <?php
													$queryperiodo = $conexion -> query ("SELECT id_programa,nombre_programa FROM programaestudios order by id_programa desc");
													while ($valoresperiodo = mysqli_fetch_array($queryperiodo)) {
														echo '
													<option value="'.$valoresperiodo["id_programa"].'">'.$valoresperiodo["nombre_programa"].'</option>';
													}	?>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-md-3">
										<br>
										<button type="submit" class="btn btn-secondary btn-lg" value="buscar" id="buscar" name="buscar">
											<i class="fa fa-save"></i> Buscar Estudiante
										</button>
                                       
                                    </div>
                               </div>
                        </form>
                        <form action="generarpagos_pdf.php" method="POST" id="formulario_estadocuenta" name="formulario_estadocuenta" target="_blank" enctype="multipart/form-data">
                            
                        <div class="row">
                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">TIPO DOCUMENTO </label> 
                                                <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Tipo de documento" value="<?php echo $tipo_documento; ?>" readonly >
                                                                                                  
                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">NRO DOCUMENTO </label> 
                                                    <input type="number" name="nro" id="nro"  class="form-control" placeholder="nro de documento" value="<?php echo $nro_documento; ?>" readonly >
                                                </div>
                                    </div>
                                    <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">NOMBRE COMPLETO</label>
                                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre completo" value=" <?php echo $nombre_completo; ?>" readonly>
                                                  </div>
                                    </div>
                                    <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">PROGRAMA DE ESTUDIOS</label> 
                                                    <input type="text" name="programa_estudios" id="programa_estudios" class="form-control" placeholder="Programa de estudios" value="<?php echo $programa_estudios; ?>" readonly>
                                                  
                                               </div>
                                    </div>
                                    <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Periodo Lectivo</label> 
                                                    <input type="text" name="periodolectivo" id="periodolectivo" class="form-control" placeholder="Periodo Lectivo" value="<?php echo $periodolectivo; ?>" readonly>
                                           
                                            </div>
                                    </div>
                                    <div class="col-md-3">
                                                <div class="form-group">
                                                <label for="">Periodo Académico </label> 
                                                <input type="text" name="periodoacademico" id="periodoacademico" class="form-control" placeholder="Ciclo" value="<?php echo $periodoacademico; ?>" readonly>
                                                </div>
                                    </div>  
                        </div>       
                                   <?php if (isset($_SESSION['message'])): ?>
                                        <div class="alert alert-info">
                                            <?= $_SESSION['message']; ?>
                                        </div>
                                        <?php unset($_SESSION['message']); ?>
                                    <?php endif; ?>
                            
                                    <!-- Mostrar mensajes si existen -->
                                    <?php if (isset($_SESSION['estudiantes']) && count($_SESSION['estudiantes']) > 0): ?>            
                                            <!-- Mostrar tabla con resultados si existe información del estudiante -->
                                              <h3>Estado de Cuenta</h3>
                                                                   
                                                <table class="table table-bordered" id="datos" name="datos" class="display">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>TIPO DOC.</th>
                                                            <th>NRO DOC.</th>
                                                            <th>NOMBRE COMPLETO</th>
                                                            <th>PROG. ESTUDIOS</th>
                                                            <th>PERIODO ACADÉMICO</th>
                                                            <th>PERIODO LECTIVO</th>
                                                            <th>DENOMINACIÓN</th>
                                                            <th>MONTO</th>
                                                            <th>FECHA</th>
                                                         </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    $contador = 1;
                                                    foreach ($_SESSION['estudiantes'] as $e): ?>
                                                        <tr>
                                                            <td><?= $contador++; ?></td>
                                                            <td><?= $e['tipo_documento']; ?></td>
                                                            <td><?= $e['nro_documento']; ?></td>
                                                            <td><?= $e['nombre_completo']; ?></td>
                                                            <td><?= $e['programa_estudios']; ?></td>
                                                            <td><?= $e['periodoacademico']; ?></td>
                                                            <td><?= $e['periodolectivo']; ?></td>
                                                            <td><?= $e['denominacion']; ?></td>
                                                            <td><?= $e['monto']; ?></td>
                                                            <td><?= $e['fecha']; ?></td>
                                                        </tr>
                                                        <?php  endforeach; ?>
                                                    </tbody>
                                                </table>

                                                <?php   
                                                        unset($_SESSION['tipo_documento']);
                                                        unset($_SESSION['nro_documento']);
                                                        unset($_SESSION['nombre_completo']);
                                                        unset($_SESSION['programa_estudios']);
                                                        unset($_SESSION['periodoacademico']);
                                                        unset($_SESSION['periodolectivo']);
                                                        unset($_SESSION['denominacion']);
                                                        unset($_SESSION['monto']);
                                                        unset($_SESSION['fecha']);
                                                      //  unset($_SESSION['estudiantes']);
                                                        ?>

                                                <?php endif; ?>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-download"></i> Generar PDF
                                    </button>   
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
		<h6> © 2024 IESTP LAREDO | Reservados todos los derechos</h6>
		</div>
	</div>
	</div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>

</html>

<script>
function clearInputs() {
        
    document.getElementById('tipo_documento').value = ''; 
    document.getElementById('nro_documento').value = ''; 
    document.getElementById('nombre_completo').value = ''; 
    document.getElementById('programa_estudios').value = ''; 
    document.getElementById('plectivo').value = ''; 
    document.getElementById('pacademico').value = ''; 
    document.getElementById('pacademico_a').value = ''; 
    document.getElementById('lectivonumerico').value = ''; 
    
    // Limpiar ComboBox y restablecer a la opción "Seleccionar"
     var comboBox = document.getElementById('plan_estudios'); // Cambia 'mi_combobox' por el ID de tu ComboBox
    comboBox.selectedIndex = 0; // 0 es generalmente la opción "Seleccionar"


    document.getElementById('id_programa').value = '';
    document.getElementById('id_estudiante').value = '';
    document.getElementById('id_planestudios').value = '';
    document.getElementById('id_periodolectivo').value = '';
    document.getElementById('id_periodoacademico').value = '';
    
}
</script>



 <script  type=text/javascript>
          function validateInput(input, maxLength) {
           
            // Obtiene el valor ingresado
            const inputValue = input.value;

            // Expresión regular para comprobar si el valor ingresado no es un número
            const regex = /^[0-9]*$/;

            // Eliminar caracteres no numéricos en tiempo real
            input.value = input.value.replace(/[^0-9]/g, '');

            // Verifica si el valor ingresado es un número
            if (!regex.test(inputValue)) {
                alert('Error: Solo se permiten números.');
                input.value = ''; // Limpia el campo si no es un número
                return;
            }

            // Verifica la longitud máxima permitida
            if (inputValue.length > maxLength) {
                alert(`Error: El número no puede exceder los ${maxLength} dígitos.`);
                input.value = inputValue.slice(0, maxLength); // Limita el valor a maxLength dígitos
            }
        }
    </script>


<script>
        // Verifica si la página se ha recargado
        if (performance.navigation.type === 1) {
            document.addEventListener("DOMContentLoaded", function() {
                // Verificar si se está regresando al formulario
                // Puedes agregar cualquier lógica que necesites aquí para determinar si limpiar los campos

                // Limpiar los campos de texto
                document.getElementById("tipo_documento").value = "";
                document.getElementById("nro_documento").value = "";
                document.getElementById("nombre_completo").value = "";
                document.getElementById("pacademico").value = "";
                document.getElementById("plectivo").value = "";
                document.getElementById("programa_estudios").value = "";
                document.getElementById("plan_estudios").value = "Seleccione";
                document.getElementById("pacademico_a").value = "";
               
            });
        }
           
    </script>

<script>
    // Verificar si el valor de 'clearEstudiantes' está en sessionStorage
    if (sessionStorage.getItem('clearEstudiantes') === 'true') {
        // Redirigir a la misma página pero con un parámetro adicional para indicarle a PHP que limpie la variable
        window.location.href = window.location.href.split('?')[0] + '?clearEstudiantes=true';
    }
</script>

</body>