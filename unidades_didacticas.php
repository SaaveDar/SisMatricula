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
	<title>Document</title>
	
                                    
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
		<div class="text-white bg-success p-2">
			<?php
			echo "Bienvenido ".$_SESSION["nombre"]." ".$_SESSION["apellido"];
			?>
		</div>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<div class="navbar-nav mr-auto">
				<div class="offset-md-1 mr-auto text-center"></div>
						
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify active ml-3 hover-primary" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Registrar
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="postulante.php">Postulante</a>
						<a class="dropdown-item" href="estudiante.php">Estudiante</a>
						<a class="dropdown-item" href="periodo_lectivo.php">Periodo Lectivo</a>
						<a class="dropdown-item" href="programa_estudios.php">Programa de Estudios</a>
						<a class="dropdown-item" href="plan_estudios.php">Plan de Estudios</a>
						<a class="dropdown-item" href="unidades_didacticas.php">Unidades Didacticas</a>
						<a class="dropdown-item" href="periodo_academico.php">Periodo Academico</a>
						<a class="dropdown-item" href="tupa.php">Tupa</a>
						<a class="dropdown-item" href="#">Usuario</a>
					</div>
				</li>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="#">Matricular</a>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Reporte
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="">Postulante</a>
						<a class="dropdown-item" href="#">Estudiante</a>
						<a class="dropdown-item" href="#">Matriculas</a>
						<a class="dropdown-item" href="#">Estado de cuenta</a>
					</div>
				</li>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="controladorCerrar.php">Salir</a>
			</div>
			<div class="text-center justify-content-center">
				<a class="btn btn-outline-primary" target="_blank" href="https://www.facebook.com/istelaredo.trujillo.7">Facebook</a>
				<a class="btn btn-outline-danger" target="_blank" href="https://istelaredo.edu.pe">www.istelaredo.edu.pe</a>
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
                            Registrar Unidades Didácticas  <span id="message" style="color: green;"><?php echo $message; ?></span>
                        </div>
                        <div class="card-body">
                            <form action="controladorud.php" method="POST" id="miud" enctype="multipart/form-data">
                                <div class="row">
								
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre Unidad Didáctica</label>
                                            <input type="text" name="nombre_ud" class="form-control" maxlength="50" required>
											<input type="hidden" name="estado" id="estado" value="1">

                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Abrev. UD</label>
                                            <input type="text" name="abrev_ud" class="form-control" maxlength="10" required>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Plan de Estudios</label>
                                            <select name="planestudios_ud" id="planestudios_ud" class="form-control" required>
											    <option >Seleccione </option>
											    <?php
													$queryplan = $conexion -> query ("SELECT * FROM planestudios");
													while ($valoresplan = mysqli_fetch_array($queryplan)) {
														echo '
													<option value="'.$valoresplan["id_plan"].'">'.$valoresplan["nombre_plan"]. " - ".$valoresplan["anio"].'</option>';
													}	?>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Programa de Estudios</label>
										
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
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Periodo academico</label>
                                            <input type="number" name="periodoacademico_ud" class="form-control" oninput="validateInput(this, 6);" required >
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Módulo</label>
											<select name="modulo_ud" id="modulo_ud" class="form-control" required>
											    <option >Seleccione </option>
											    <option value="I">I</option>
                                                <option value="II">II</option>
												<option value="III">III</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Tipo</label>
											<select name="tipo_ud" id="tipo_ud" class="form-control" required>
											    <option >Seleccione </option>
											    <option value="Empleabilidad">Empleabilidad</option>
                                                <option value="Especifico">Específico</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Créditos</label>
                                            <input type="number" name="creditos_ud" id="creditos_ud" class="form-control"   readonly> 
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Horas teoricas</label>
                                            <input type="number" name="horateorica_ud" id="horateorica_ud" oninput="validateInput(this, 2);calcularSumaYDivision()" class="form-control"  required>
                                                
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Horas Prácticas</label>
                                            <input type="number" name="horapractica_ud" id="horapractica_ud" oninput="validateInput(this, 2);calcularSumaYDivision()" class="form-control"  required >
                                        </div>
                                    </div>
									
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Horas Total</label>
                                            <input type="number" name="horatotal_ud" id="horatotal_ud" class="form-control" readonly>
                                        </div>
                                    </div>
									
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Horas Semanal</label>
                                            <input type="number" name="horasemanal_ud" id="horasemanal_ud" class="form-control"  readonly>
                                        </div>
                                    </div>
                                                                                                         
                                
                                <hr>
                                <hr>
                                <hr>
                               
                                <center>
                                    <button name="btnregisterud" type="submit" class="btn btn-primary btn-lg" >
                                        <i class="fa fa-save"></i> Registrar Unidad Didacticas
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

		function calcularSumaYDivision() {
			// Obtener los valores de las cajas de texto
			var valor1 = document.getElementById("horateorica_ud").value;
			var valor2 = document.getElementById("horapractica_ud").value;
			// Convertir los valores a números, si no hay un número válido, asumir 0
			var num1 = parseFloat(valor1) || 0;
			var num2 = parseFloat(valor2) || 0;
			// Calcular la suma
			var suma = num1 + num2;
			// Mostrar el resultado de la suma en el input 3
			document.getElementById("horatotal_ud").value = suma;
			// Dividir la suma entre 16 y mostrar el resultado en el input 4
			var division = suma / 16;
			document.getElementById("horasemanal_ud").value = division;

			// calcular creditos
			// Obtener los valores de los inputs y convertirlos en números
            var valor1 = parseFloat(document.getElementById("horateorica_ud").value) || 0;
            var valor2 = parseFloat(document.getElementById("horapractica_ud").value) || 0;	
			// Dividir el valor del input1 entre 16 y el valor del input2 entre 32
            var variable1 = valor1 / 16;
            var variable2 = valor2 / 32;

            // Sumar variable1 y variable2
            var suma = variable1 + variable2;

            // Redondear el resultado
            var resultadoRedondeado = Math.round(suma);

            // Mostrar el resultado redondeado en el input5
            document.getElementById("creditos_ud").value = resultadoRedondeado;
		}
   
	</script>

