<?php
session_start();

include "conexion.php";

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
$anioActual = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Postulante</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/css/bootstrap.min.css">
    <script type="text/javascript">

     function validateInput2(input) {

            
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
           
            var lista = document.getElementById('tipo_doc_identidad');
            var indiceSeleccionado = lista.selectedIndex;
            var opcionSeleccionada = lista.options[indiceSeleccionado];
            var tipodocumento = opcionSeleccionada.value;

            if(tipodocumento=="DNI"){
            // Verifica la longitud máxima permitida para DNI
                if (inputValue.length > 8) {
                alert(`Error: El DNI no puede exceder los ${8} dígitos.`);
                    input.value = inputValue.slice(0,8); // Limita el valor a maxLength dígitos
                    input.value = ''; // Limpia el campo úmero
                    return;
                } 
            } 
            
            if(tipodocumento=="CARNET EXT."){
            // Verifica la longitud máxima permitida para CARNET EXTRANJERIA
                if (inputValue.length > 9) {
               alert(`Error: El CARNET EXT. no puede exceder los ${9} dígitos.`);
                input.value = inputValue.slice(0,9); // Limita el valor a maxLength dígitos
                input.value = ''; // Limpia el campo úmero
                return;
                } 
            }

        } 
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
</head>
<body>
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
                            <div class="text-center" >
                            <strong> REGISTRAR POSTULANTE</strong> <span id="message" style="color: green;"><?php echo $message; ?></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="controladorpostulante.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tipo_doc">TIPO DOCUMENTO</label>
                                            <select name="tipo_doc_identidad" id="tipo_doc_identidad" class="form-control" required>
											    <option value="DNI" selected>DNI</option>
                                                <option value="CARNET EXT.">CARNET DE EXT.</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">NRO DOCUMENTO </label> <span style="color: red;">(*)</span>
                                            <input type="number" name="nro_doc_identidad" class="form-control" oninput="validateInput2(this)" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">PRIMER NOMBRE </label> <span style="color: red;">(*)</span>
                                            <input type="text" name="primer_nombre" class="form-control" required>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SEGUNDO NOMBRE </label>
                                            <input type="text" name="segundo_nombre" class="form-control">
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">TERCER NOMBRE </label>
                                            <input type="text" name="tercer_nombre" class="form-control">
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">APELLIDO PATERNO </label> <span style="color: red;">(*)</span>
                                            <input type="text" name="apellido_paterno" class="form-control" required>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">APELLIDO MATERNO </label> <span style="color: red;">(*)</span>
                                            <input type="text" name="apellido_materno" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SEXO</label> <span style="color: red;">(*)</span>
                                            <select name="sexo" id="" class="form-control" required>
											    <option >Seleccione </option>
											    <option value="F">FEMENINO</option>
                                                <option value="M">MASCULINO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">FECHA NACIMIENTO</label> <span style="color: red;">(*)</span>
                                            <input type="date" name="fecha_nac" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">CELULAR</label> <span style="color: red;">(*)</span>
                                            <input type="number" name="celular" class="form-control" oninput="validateInput(this, 9)" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">CORREO ELECTRÓNICO</label> <span style="color: red;">(*)</span>
                                            <input type="email" name="correo" class="form-control" required>
                                        </div>
                                    </div>

									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">DIRECCIÓN </label> <span style="color: red;">(*)</span>
                                            <input type="text" name="direccion" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">AÑO ADMISION</label> <span style="color: red;">(*)</span>
                                            <input type="number" name="anio_admision" class="form-control" value="<?php echo $anioActual; ?>" readonly>
                                        </div>
                                    </div>
									<div class="col-md-4">
                                        <div class="form-group">
                                            <label for=""> COLEGIO DE PROCEDENCIA </label> <span style="color: red;">(*)</span>
                                            <input type="text" name="colegio" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primera_opc">PRIMERA OPCIÓN</label> <span style="color: red;">(*)</span>
											<select name="primera_opcion" id="primera_opc" class="form-control" required>
												<option value="" >Seleccione </option>
												<?php
													$querype = $conexion -> query ("SELECT * FROM programaestudios");
													while ($valorespe = mysqli_fetch_array($querype)) {
													echo '<option value="'.$valorespe["nombre_programa"].'">'.$valorespe["nombre_programa"].'</option>';
													}	
                                                ?>
											</select>
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="segunda_opc">SEGUNDA OPCIÓN</label> <span style="color: red;">(*)</span>
											<select name="segunda_opcion" id="segunda_opc" class="form-control" required>
												<option value="" >Seleccione </option>
												<?php
													$querype = $conexion -> query ("SELECT * FROM programaestudios");
													while ($valorespe = mysqli_fetch_array($querype)) {
                                                    echo '<option value="'.$valorespe["nombre_programa"].'">'.$valorespe["nombre_programa"].'</option>';
													}	
                                                ?>
											</select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">FOTO DNI </label>
                                            <input type="file" name="foto_dni" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">PAGO DE INSCRIPCIÓN</label>
                                            <input type="file" name="pago_postulante" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">FOTO DE POSTULANTE </label>
                                            <input type="file" name="foto_postulante" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">CERTIFICADO DE ESTUDIOS </label>
                                            <input type="file" name="certificado_estudios" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">PARTIDA DE NACIMIENTO </label>
                                            <input type="file" name="partida_postulante" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">DECLARACIÓN JURADA </label>
                                            <input type="file" name="declaracion_jurada" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="motivo">MOTIVO: ¿ES TRASLADO?</label>
                                            <select name="motivo_pos" id="motivo_pos" class="form-control">
                                                <option value="" >--</option>
                                                <option value="TRASLADO INTERNO" >TRASLADO INTERNO</option>
                                                <option value="TRASLADO EXTERNO">TRASLADO EXTERNO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span style="color: red;">(*)</span> Es un campo obligatorio a llenar para registar postulante.
                                    </div>
                                </div>
                                <hr> 
                                <center>
                                    <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Por favor revisa bien los datos antes de enviar')">
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
       <p> © 2024 IESTP LAREDO | Reservados todos los derechos</p>
		</div>
	</div>
    </div>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>

</html>