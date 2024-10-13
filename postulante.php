<?php
session_start();
if (empty($_SESSION["nombre"]) and empty($_SESSION["apellido"])) {
	header("location:login.php");
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
</head>
<body>
<!--	<div class="bd-example mb-0" style="height: 80vh">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active" style="height: 80vh">
					<img src="img/1.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						
					</div>
				</div>
				<div class="carousel-item" style="height: 80vh">
					<img src="img/1.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						
					</div>
				</div>
				<div class="carousel-item" style="height: 80vh">
					<img src="img/1.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>-->

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
						<a class="dropdown-item" href="usuario.php">Usuario</a>
					</div>
				</li>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="#">Matricular</a>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Reporte
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Postulante</a>
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
                            Registrar datos de postulante
                        </div>
                        <div class="card-body">
                            <form action="controller_create.php" method="post" enctype="multipart/form-data">
                                <div class="row">
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">DNI </label>
                                            <input type="number" name="dni" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">PRIMER NOMBRE </label>
                                            <input type="text" name="primer_nombre" class="form-control" required>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SEGUNDO NOMBRE </label>
                                            <input type="text" name="segundo_nombre" class="form-control" required>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">TERCER NOMBRE </label>
                                            <input type="text" name="tercer_nombre" class="form-control" required>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">APELLIDO PATERNO </label>
                                            <input type="text" name="apellido_paterno" class="form-control" required>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">APELLIDO MATERNO </label>
                                            <input type="text" name="apellido_materno" class="form-control" required>
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">DIRECCIÓN </label>
                                            <input type="text" name="direccion" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">CELULAR</label>
                                            <input type="number" name="celular" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">CORREO ELECTRÓNICO</label>
                                            <input type="email" name="correo" class="form-control" required>
                                        </div>
                                    </div>
									<div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">FECHA NAC</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control" required>
                                        </div>
                                   </div>
								   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SEXO </label>
                                            <select name="especialidad" id="" class="form-control" required>
											    <option >Seleccione </option>
											    <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">FOTO POSTULANTE </label>
                                            <input type="file" name="foto_postulante" class="form-control" required>
                                        </div>
                                    </div>
									<div class="col-md-4">
                                        <div class="form-group">
                                            <label for=""> COLEGIO DE PROCEDENCIA </label>
                                            <input type="text" name="direccion" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">PRIMERA OPCIÓN</label>
                                            <select name="ano_for" id="" class="form-control" required>
											    <option value="PRIMERO">Seleccione</option>
                                                <option value="PRIMERO">ARQUITECTURA DE PLATAFORMAS Y SERVICIO TI</option>
                                                <option value="SEGUNDO">CONTABILIDAD</option>
                                                <option value="TERCERO">ENFERMERIA TÉCNICA</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">SEGUNDA OPCIÓN</label>
                                            <select name="ano_for" id="" class="form-control" required>
											    <option value="PRIMERO">Seleccione</option>
                                                <option value="PRIMERO">ARQUITECTURA DE PLATAFORMAS Y SERVICIO TI</option>
                                                <option value="SEGUNDO">CONTABILIDAD</option>
                                                <option value="TERCERO">ENFERMERIA TÉCNICA</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">AÑO DE FORMACIÓN </label>
                                            <select name="ano_for" id="" class="form-control" required>
                                                <option value="PRIMERO">PRIMERO</option>
                                                <option value="SEGUNDO">SEGUNDO</option>
                                                <option value="TERCERO">TERCERO</option>
                                                <option value="CUARTO">CUARTO</option>
                                                <option value="QUINTO">QUINTO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">ESPECIALIDAD </label>
                                            <select name="especialidad" id="" class="form-control" required>
                                                <option value="INGENIERIA DE SISTEMAS">INGENIERIA DE SISTEMAS</option>
                                                <option value="CONTADURIA PUBLICA">CONTADURIA PUBLICA</option>
                                                <option value="DISEÑO GRAFICO">DISEÑO GRAFICO</option>
                                                <option value="COMUNICACIÓN SOCIAL">COMUNICACIÓN SOCIAL</option>
                                                <option value="ELECTRONICA">ELECTRONICA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">TIPO DE MATRICULACIÓN </label>
                                            <select name="tipo_matriculacion" id="" class="form-control" required>
                                                <option value="ESTUDIANTE REGULAR ( 50 Bs.)">
                                                    ESTUDIANTE REGULAR ( 50 Bs.)
                                                </option>
                                                <option value="ESTUDIANTE PROFESIONAL (100 Bs.)">
                                                    ESTUDIANTE PROFESIONAL (100 Bs.)
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NÚMERO DE DEPOSITO (MATRÍCULA) EJEMPLO: (10XXXXX3)  </label>
                                            <input type="text" name="nro_deposito_matricual" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">ADJUNTAR EL ESCANEADO DEL DEPÓSITO (MATRICULA) </label>
                                            <input type="file" name="foto_deposito_matricula" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="">DOCUMENTOS EN FORMATO (PDF) QUE ADJUNTA PARA LA UNIDAD DE ARCHIVO KARDEX (TODO EN UN SOLO ARCHIVO)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" style="font-size: 16px">Adjuntar archivo PDF
                                            </label>
                                            <input type="file" name="documentos" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <center>
                                    <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Por favor revisa bien los datos antes de enviar');">
                                        <i class="fa fa-save"></i> Registrar matriculación
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