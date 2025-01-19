<?php
session_start();
include __DIR__ . '../conexion.php';

if (empty($_SESSION["nombre"]) and empty($_SESSION["apellido"])) {
	header("location:login.php");
} 

// Verificar si hay un mensaje en la sesión y mostrarlo
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo
} else {
    $message = ''; // Si no hay mensaje, dejar vacío
}
    $tipo_documento = isset($_SESSION['tipo_documento']) ? $_SESSION['tipo_documento'] : '';
    $nro_documento = isset($_SESSION['nro_documento']) ? $_SESSION['nro_documento'] : '';
    $id_estudiante = isset($_SESSION['id_estudiante']) ? $_SESSION['id_estudiante'] : '';
    $nombre_completo = isset($_SESSION['nombre_completo']) ? $_SESSION['nombre_completo'] : '';
    //$montoseleccionado = isset($_SESSION['monto']) ? $_SESSION['monto'] : '';
    //$id_tupa= isset($_SESSION['concepto_pago']) ? $_SESSION['concepto_pago'] : '';//id_tupa 
   // $denominacion_tupa= isset($_SESSION['denominacion_tupa']) ? $_SESSION['denominacion_tupa'] : '';  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pago</title>
	
                                    
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
           
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary" style="box-shadow: 0px 5px 5px 5px #c0c0c0">
                        <div class="card-header">
                            <div class="text-center">
                                    <strong> REGISTRAR PAGO</strong>  <span id="message" style="color: green;"><?php echo $message; ?></span>
                            </div>
                        </div>
                       <div class="card-body">
                                <form action="controladorpago.php" method="POST" enctype="multipart/form-data" name="formbuscar">
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
                                                    <input type="number" name="nro_doc" class="form-control" oninput="validateInput(this)" required>
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
                        <form action="controladorpago.php" method="POST" id="formulario_pago" name="formulario_pago" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">TIPO DOCUMENTO </label> 
                                            <input type="text" name="tipo_documento" class="form-control" value="<?php echo $tipo_documento; ?>" readonly >
                                        </div>
                                    </div>
								    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">NRO DOCUMENTO </label> 
                                            <input type="number" name="nro_documento" class="form-control" value="<?php echo $nro_documento; ?>" readonly >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NOMBRE COMPLETO</label>
                                            <input type="text" name="nombre_completo" class="form-control" value=" <?php echo $nombre_completo; ?>" readonly>
                                            <input type="hidden" name="id_estudiante" id="id_estudiante" value="<?php echo $id_estudiante; ?>">
										</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">CONCEPTO DEL PAGO</label> <span style="color: red;">(*)</span>
                                            <select name="concepto_pago" id="concepto_pago" class="form-control" onchange="enviarFormulario()" required>
											    <option >Seleccione</option>
                                                <?php
                                                    $querype = $conexion -> query ("SELECT * FROM tupa");
													while ($valorespe = mysqli_fetch_array($querype)) {
													echo '<option value="'.$valorespe["id_tupa"].'">'.$valorespe["denominacion_tupa"].'         S/.'. $valorespe["monto_tupa"] .'</option>';
													}
                                                ?>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">MODALIDAD DE PAGO</label>
                                            <select name="modalidad_pago" id="modalidad_pago" class="form-control" required>
                                                <option >Seleccione</option>
                                                <option value="DEPOSITO_BANCARIO">DEPOSITO BANCARIO</option>
											    <option value="EFECTIVO">EFECTIVO</option>
                                                <option value="YAPE">YAPE</option>
                                                
                                            </select>
										</div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">NRO DE OPERACION DEL PAGO</label>
                                            <input type="number" name="numero_operacion_pago" id="numero_operacion_pago" class="form-control">
										</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">PROGRAMA DE ESTUDIOS</label> <span style="color: red;"></span>
                                            <select name="programa" id="programa" class="form-control" required>
											    <option >Seleccione</option>
												<?php
													$querype = $conexion -> query ("SELECT * FROM programaestudios WHERE estado = 1");
													while ($valorespe = mysqli_fetch_array($querype)) {
													echo '<option value="'.$valorespe["id_programa"].'">'.$valorespe["nombre_programa"].'</option>';
													}	
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">PERIODO ACADÉMICO</label>
                                            <select name="periodo_academico" id="periodo_academico" class="form-control" required>
                                                <option >Seleccione</option>
                                                <option value="I">I</option>
											    <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                                <option value="VI">VI</option>
                                            </select>
										</div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">PERIODO LECTIVO</label> <span style="color: red;">(*)</span>
                                            <select name="periodo_lectivo" id="periodo_lectivo" class="form-control" required>
											    <option >Seleccione</option>
												<?php
													$querype = $conexion -> query ("SELECT * FROM periodolectivo where estado = 1");
													while ($valorespe = mysqli_fetch_array($querype)) {
													echo '<option value="'.$valorespe["id_periodo_lectivo"].'">'.$valorespe["nombre_periodo"].'</option>';
													}	
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                                                
                                </div>
                                <hr>                              
                                <center>
                                    <button name="registrar" type="submit" class="btn btn-primary btn-lg" value="registrar" id="registrar" name="registrar" onclick="return confirm('Por favor revisa bien los datos antes de enviar')">
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
		<p> © 2024 IESTP LAREDO | Reservados todos los derechos</p>
		</div>
	</div>
	</div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>

</html>


 <script  type=text/javascript>
         function validateInput2(input){
           
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
           
            var lista = document.getElementById('tipo_doc');
            var indiceSeleccionado = lista.selectedIndex;
            var opcionSeleccionada = lista.options[indiceSeleccionado];
            var tipodocumento = opcionSeleccionada.value;

            if(tipodocumento=="DNI"){
            // Verifica la longitud máxima permitida para DNI
                if (inputValue.length > 8) {
                alert(`Error: El DNI NO puede exceder los ${8} dígitos.`);
                    input.value = inputValue.slice(0,8); // Limita el valor a maxLength dígitos
                    input.value = ''; // Limpia el campo úmero
                    return;
                } 
            } 
            
            if(tipodocumento=="CARNET EXT."){
            // Verifica la longitud máxima permitida para CARNET EXTRANJERIA
                if (inputValue.length > 9) {
               alert(`Error: El CARNET EXT. NO puede exceder los ${9} dígitos.`);
                input.value = inputValue.slice(0,9); // Limita el valor a maxLength dígitos
                input.value = ''; // Limpia el campo úmero
                return;
                } 
            }
        }
    </script>

<script>
        function validarsololetras(event) {
            const input = event.target;
            const regex = /^[a-zA-Z\s]*$/; // Solo permite letras y espacios

            if (!regex.test(input.value)) {
                document.getElementById("mensajeError").textContent = "Solo se permiten letras y espacios.";
                input.value = input.value.replace(/[^a-zA-Z\s]/g, ''); // Elimina caracteres no permitidos
            } else {
                document.getElementById("mensajeError").textContent = "No ingresar caracteres especiales";
            }
        }
</script>


