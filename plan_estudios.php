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

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Plan Estudios</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/css/bootstrap.min.css">
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
                            <strong>REGISTRAR PLAN DE ESTUDIOS</strong> <span id="message" style="color: green;"><?php echo $message; ?></span>
							</div>
                        </div>
                        <div class="card-body">
                            <form action="controladorpe.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
									
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Código</label>
                                            <input type="text" name="nombre_plan" id="nombre_plan" class="form-control" placeholder="Ejem: APSTI o ENFETEC o CONTEC" maxlength="6" required>
											<input type="hidden" name="estado" id="estado" value="1">

                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Descrip/detalle Plan Estudios</label>
                                            <input type="text" name="descripcion_plan" id="nombre_plan" class="form-control" placeholder="Ejem: Plan de estudios - (nombre_carrera)" maxlength="50" required>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> Año Plan Estudios</label>
                                            <input type="number" name="anio" id="anio" class="form-control" placeholder="Ejem: 2020" oninput="validateInput(this, 4);" required>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> Programa de estudios </label>
											<select id="programa_ud" name="programa_ud"  class="form-control" required>
												<option value="" >Seleccione </option>
												<?php
													$querype = $conexion -> query ("SELECT * FROM programaestudios");
													while ($valorespe = mysqli_fetch_array($querype)) {
														echo '
													<option value="'.$valorespe["id_programa"].'">'.$valorespe["abreviatura_programa"]. " - ".$valorespe["nombre_programa"].'</option>';
													}	?>
                                             
											</select>
                                        </div>
                                    </div>
									
									
								</div>
                             
                                </br>
                                <center>
                                    <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Por favor revisa bien los datos antes de enviar');">
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
</br>
</br>
</br>
</br>
</br>
</br>
</br>
	<div class="">
		<div class="jumbotron bg-dark text-light rounded-0">
        <!--Pie de pagina-->
		<p> © 2024 IESTP LAREDO | Reservados todos los derechos</p>
		</div>
	</div>
	</div>

<!--
	<form action="" class="form-inline d-flex justify-content-center flex-column flex-md-row">
		<div class="form-group mx-2 my-2">
			<label class="d-none d-md-block" for="">Nombre</label>
			<input type="text" class="form-control" placeholder="Nombre">
		</div>
		<div class="form-group mx-2 my-2">
			<label class="d-none d-md-block" for="">Apellido</label>
			<input type="text" class="form-control" placeholder="Apellido">
		</div>
		<div class="form-group mx-2 my-2">
			<button class="btn btn-outline-primary">enviar</button>
		</div>
	</form>

-->

    <script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>

</html>
<script>
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