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
                            <div class="text-center" >
                            <strong> REGISTRAR POSTULANTE</strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="controller_create.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">TIPO DOCUMENTO IDENTIDAD</label>
                                            <select name="tipo_documento_identidad" id="" class="form-control" required>
											    <option value="DNI">DNI</option>
                                                <option value="CARNET EXT.">CARNET DE EXTRANJERIA</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">NRO DEL DOCUMENTO </label> <span style="color: red;">(*)</span>
                                            <input type="number" name="nro_documento_identidad" class="form-control" required>
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
                                            <input type="date" name="fecha_nacimiento" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">CELULAR</label> <span style="color: red;">(*)</span>
                                            <input type="number" name="celular" class="form-control" required>
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
                                            <input type="number" name="anio_admision" class="form-control" required>
                                        </div>
                                    </div>
									<div class="col-md-4">
                                        <div class="form-group">
                                            <label for=""> COLEGIO DE PROCEDENCIA </label> <span style="color: red;">(*)</span>
                                            <input type="text" name="direccion" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="primera_opc">PRIMERA OPCIÓN</label> <span style="color: red;">(*)</span>
                                            <select name="primera_opcion" id="primera_opc" class="form-control" required>
											    <option >Seleccione</option>
                                                <option value="ARQUITECTURA DE PLATAFORMAS">ARQUITECTURA DE PLATAFORMAS Y SERVICIO TI</option>
                                                <option value="CONTABILIDAD">CONTABILIDAD</option>
                                                <option value="ENFERMERIA TECNICA">ENFERMERIA TÉCNICA</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="segunda_opc">SEGUNDA OPCIÓN</label> <span style="color: red;">(*)</span>
                                            <select name="segunda_opcion" id="segunda_opc" class="form-control" required>
											    <option >Seleccione</option>
                                                <option value="ARQUITECTURA DE PLATAFORMAS">ARQUITECTURA DE PLATAFORMAS Y SERVICIO TI</option>
                                                <option value="CONTABILIDAD">CONTABILIDAD</option>
                                                <option value="ENFERMERIA TECNICA">ENFERMERIA TÉCNICA</option>
                                            </select>
                                        </div>
                                    </div>
                                   <!--
                                    <div class="col-md-3">
                                        <div class="form-group"> 
                                            <label for="" >PARTIDA DE NACIMIENTO </label>   
                                            <div class="form-control">
                                            <input type="radio" id="si_partida" name="partida_postulante" value="SI" /> 
                                            <label for="si_partida">SÍ</label>  
                                            <input type="radio" id="no_partida" name="partida_postulante" value="NO" checked />    
                                            <label for="no_partida">NO</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>-->
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
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span style="color: red;">(*)</span> Es un campo obligatorio a llenar para registar postulante.
                                        <br><br>
                                    </div>
                                </div>
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