<?php
session_start();
include __DIR__ . '../conexion.php';

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
 
$tipo_documento = isset($_SESSION['tipo_documento']) ? $_SESSION['tipo_documento'] : "";
$nro_documento = isset($_SESSION['nro_documento']) ? $_SESSION['nro_documento'] : "";
$nombre_completo = isset($_SESSION['nombre_completo']) ? $_SESSION['nombre_completo'] : "";
$pacademico_pasado = isset($_SESSION['pacademicopasado']) ? $_SESSION['pacademicopasado'] : "";
$pacademico_proximo = isset($_SESSION['pacademicoproximo']) ? $_SESSION['pacademicoproximo'] : "";
$programa_estudios = isset($_SESSION['programa_estudios']) ? $_SESSION['programa_estudios'] : "";
$plectivo = isset($_SESSION['plectivo']) ? $_SESSION['plectivo'] : "";
$lectivonumerico = isset($_SESSION['lectivonumerico']) ? $_SESSION['lectivonumerico'] : "";

$id_programa = isset($_SESSION['id_programa']) ? $_SESSION['id_programa'] : "";
$id_estudiante = isset($_SESSION['id_estudiante']) ? $_SESSION['id_estudiante'] : "";
$id_planestudios = isset($_SESSION['id_planestudios']) ? $_SESSION['id_planestudios'] : "";
$id_periodolectivo = isset($_SESSION['id_periodolectivo']) ? $_SESSION['id_periodolectivo'] : "";
$id_periodoacademico = isset($_SESSION['id_periodoacademico']) ? $_SESSION['id_periodoacademico'] : ""; 

$id_hismatricula = isset($_SESSION['id_hismatricula']) ? $_SESSION['id_hismatricula'] : "";

$listacursos = [];
if ($id_programa) {
    $querycursos = "SELECT idplan, id_unidad, abrev_curso, nombre_curso from vista_cursos_xcarrera_xciclo  WHERE id_programa = '$id_programa'";
    $resultadocursos = mysqli_query($conexion, $querycursos);
    
    while ($row = mysqli_fetch_assoc($resultadocursos)) {
        $listacursos[] = $row;
    }
    //$listacursos = "";
}


/*$querycursos = "SELECT idplan, id_unidad, abrev_curso, nombre_curso FROM vista_cursos_xcarrera_xciclo WHERE id_programa = '$id_programa'";
$resultadocursos = mysqli_query($conexion, $querycursos);

if (!$resultadocursos) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

while ($row = mysqli_fetch_assoc($resultadocursos)) {
    var_dump($row); // Imprime los datos
    $listacursos[] = $row;
}*/


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Convalidaciones y otros</title>
	
                                    
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
        <div class="container" style="width: 95%">
            <br>
            <span id="message" style="color: <?php //echo strpos($message, 'ERROR') !== false ? 'red' : 'green'; ?>;">
                                <?php //echo $message; ?>
                            </span>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary" style="box-shadow: 0px 5px 5px 5px #c0c0c0">
                        <div class="card-header">
                        <div class="text-center">
                           <strong> GENERAR MATRICULA: Convalidades / Otros</strong>  <!--<span id="message" style="color: green;"><?php echo $message; ?></span>-->
                           
                        </div>
                        </div>
                        <div class="card-body">
                        <form action="controlador_convalidaciones.php" method="POST" enctype="multipart/form-data" name="formbuscar">
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
										<br>
										<button type="submit" class="btn btn-secondary btn-lg" value="buscar" id="buscar" name="buscar">
											<i class="fa fa-save"></i> Buscar Estudiante
										</button>
                                    </div>
                               </div>
                        </form>
                            <form action="controlador_convalidaciones.php" method="POST" id="formulario_matricula" name="formulario_matricula" enctype="multipart/form-data">
                                <div class="row">
                                                             
                               <div class="col-md-3">
                                        <input type="hidden" name="estado" id="estado" value="1">
                                        <div class="form-group">
                                            <label for="">TIPO DOCUMENTO </label> 
                                            <input type="text" name="tipo_documento" id="tipo_documento" class="form-control" placeholder="Tipo de documento" value="<?php echo $tipo_documento; ?>" readonly >
                                            <input type="hidden" name="id_hismatricula" id="id_hismatricula" value="<?php echo $id_hismatricula; ?>">
                                            
                                        </div>
                                    </div>
								    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">NRO DOCUMENTO </label> 
                                            <input type="number" name="nro_documento" id="nro_documento"  class="form-control" placeholder="nro de documento" value="<?php echo $nro_documento; ?>" readonly >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NOMBRE COMPLETO</label>
                                            <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" placeholder="Nombre completo" value=" <?php echo $nombre_completo; ?>" readonly>
                                            <input type="hidden" name="id_estudiante" id="id_estudiante" value="<?php echo $id_estudiante; ?>">
										</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">PROGRAMA DE ESTUDIOS</label> <span style="color: red;">(*)</span>
                                            <input type="text" name="programa_estudios" id="programa_estudios" class="form-control" placeholder="Programa de estudios" value="<?php echo $programa_estudios; ?>" readonly>
                                            <input type="hidden" name="id_programa" id="id_programa" value="<?php echo $id_programa; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Periodo Lectivo</label> <span style="color: red;">(*)</span>
    										<input type="text" name="plectivo" id="plectivo" class="form-control" placeholder="Periodo Lectivo" value="<?php echo $plectivo; ?>" readonly>
                                            <input type="hidden" name="id_periodolectivo" id="id_periodolectivo" value="<?php echo $id_periodolectivo; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label for="">Periodo Académico (actual) </label> <span style="color: red;">(*)</span>
                                        <input type="text" name="pacademico" id="pacademico" class="form-control" placeholder="Ciclo" value="<?php echo $pacademico_pasado; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label for="">Periodo Académico (entrando) </label> <span style="color: red;">(*)</span>
                                        <input type="text" name="pacademico_a" id="pacademico_a" class="form-control" placeholder="Ciclo" value="<?php echo $pacademico_proximo; ?>" readonly>
                                        <input type="hidden" name="id_periodoacademico" id="id_periodoacademico" value="<?php echo $id_periodoacademico; ?>">
                                        <input type="hidden" name="lectivonumerico" id="lectivonumerico" value="<?php echo $lectivonumerico; ?>">
                                        </div>
                                    </div>
                                 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Unidades Didacticas</label> <span style="color: red;">(*)</span>
                                            <select name="unidadesu" id="unidadesu" class="selectpicker" data-show-subtext="true" data-live-search="true" readonly onchange="mostrarIdPlan()">
											    <option value="" selected="true" >Seleccione</option>
												<?php foreach ($listacursos as $curso): ?>
                                                    <option value="<?= $curso['id_unidad'] ?>" 
                                                        data-idplan="<?= $curso['idplan'] ?>">
                                                        <?= $curso['abrev_curso'] . " - " . $curso['nombre_curso'] ?>
                                                    </option>
                                               <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" name="id_plan" id="id_plan" readonly>     
                                   
                                        </div>
                                 </div>
                                                                
                                </div>
                                <hr>                              
                                <center>
                                    <button name="registrar" type="submit" class="btn btn-primary btn-lg" value="registrar" id="registrar" name="registrar" onclick="confirm('Por favor revisa bien los datos antes de enviar')">
                                        <i class="fa fa-save"></i> Registrar
                                    </button>
									
                                </center>

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
   // var comboBox = document.getElementById('unidadesu'); // Cambia 'mi_combobox' por el ID de tu ComboBox
   // comboBox.selectedIndex = 0; // 0 es generalmente la opción "Seleccionar"


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
               // document.getElementById("unidadesu").value = "Seleccione";
                document.getElementById("pacademico_a").value = "";

            });
        }
           
    </script>
     <script>
//    window.onload = function() {
//        const selectElement = document.getElementById('unidadesu');
        // Mantener solo la primera opción
//        while (selectElement.options.length > 1) {
//            selectElement.remove(1);
//        }
//    };
    </script>

<script>
function mostrarIdPlan() {
    // Obtener el elemento select y el input
    var select = document.getElementById("unidadesu");
    var inputIdPlan = document.getElementById("id_plan");

    // Obtener la opción seleccionada
    var selectedOption = select.options[select.selectedIndex];

    // Obtener el valor del atributo data-idplan
    var idPlan = selectedOption.getAttribute("data-idplan");

    // Mostrar el valor en la caja de texto
    inputIdPlan.value = idPlan ? idPlan : "";
}
</script>
</body>