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
	<title>Consulta - Estado de Cuentas</title>
	
                                    
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
       <script>
        $(document).ready(function() {
            $('#datos').DataTable();
        } );
    </script>    
    <style>
                /* Mantén los estilos para la tabla con la clase 'datos' */
        .datos {
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 1em;
            width: 100%; /* Asegura que la tabla ocupe todo el ancho */
        }

        .datos tr:nth-child(even) {
            background: #ccc;
        }

        .datos td {
            padding: 5px;
        }

        .datos tr.noSearch {
            background: White;
            font-size: 0.8em;
        }

        .datos tr.noSearch td {
            padding-top: 10px;
            text-align: right;
        }

        .hide {
            display: none;
        }

        .red {
            color: Red;
        }

        /* Nueva clase para alinear los controles en la misma línea */
        .controls-container {
            display: flex;
           /* Distribuye el espacio entre los elementos */
            align-items: center; /* Alineación vertical de los elementos */
            margin-bottom: 10px; /* Espacio inferior */
            width: 100%; /* Asegura que ocupe todo el ancho disponible */
        }

        /* Estilo para el campo de búsqueda alineado a la derecha */
        .search-container {
            display: flex;
            align-items: center; /* Alineación vertical */
            margin-left: 63%; /
        }

        #searchTerm {
            padding: 8px;
            font-size: 1em;
            margin-left: 10px; /* Espacio entre "Buscar:" y el input */
        }


        /* Estilo para el "Mostrar" y su select */
        .controls-container  label {
            margin-right: 0px; /* Espacio entre el texto y el select */
        }

        #rowsPerPage {
            padding: 8px;
            font-size: 1em;
        }


  </style>

<style>
        /* Estilo básico para la tabla  PAGINACION */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align:   left;
            border: 1px solid #ddd;
        }
        /* Botones de paginación */
        .pagination {
            margin-top: 10px;
            text-align: right;
            margin-left: 80%; /
        }
        .pagination button {
            padding: 5px 15px;
            margin: 0 5px;
            cursor: pointer;
        }
        .pagination button:disabled {
            cursor: not-allowed;
            background-color: #ccc;
        }
    </style>
</head>
<body>

   <?php
		// Si se recibe un mensaje de éxito o error, lo mostramos en una ventana emergente
		//if (isset($_GET['message'])) {
		//	$message = $_GET['message'];
		//	echo "<script>alert('$message');</script>";
		//}
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
    </br></br></br> 
	<div class="row">
   
        <div class="container" style="margin-top: -50px; width: 120%">
            
            <span id="message" style="color: <?php echo strpos($message, 'ERROR') !== false ? 'red' : 'green'; ?>;">
                                <?php echo $message; ?>
            </span>
           
            <div class="row">
                <div class="col-md-22">
                    <div class="card card-primary" style="box-shadow: 0px 5px 5px 5px #c0c0c0">
                        <div class="card-header">
                        <div class="text-center">
                           <strong> REPORTE DE POSTULANTES</strong>  <!--<span id="message" style="color: green;"><?php echo $message; ?></span>-->
                        </div>
                       </div>
                        <div class="card-body">  
                        <form action="controlador_postulantes.php" method="POST" enctype="multipart/form-data" name="formbuscar">
                        <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <label for="">TIPO DOCUMENTO</label>
                                            <select name="tipo_doc" id="tipo_doc" class="form-control">
											    <option value="DNI">DNI</option>
                                                <option value="CARNET EXT.">CARNET DE EXT.</option>
                                            </select>
                                            </div>
                                        </div>
                                       <div class="col-md-2">
                                           <div class="form-group">
                                            <label for="">NRO DOCUMENTO</label> 
                                            <input type="number" name="nro_doc" id="nro_doc" class="form-control" oninput="validateInput(this, 12)">
                                            </div>
                                       </div>
                                       <div class="col-md-5">
                                            <div class="form-group">
                                              <label for="">PROGRAMA DE ESTUDIOS</label>
                                                <select name="programa" id="programa" class="form-control">
											    <option >Seleccione </option>
											    <?php
													$queryperiodo = $conexion -> query ("SELECT id_programa,nombre_programa FROM programaestudios order by id_programa desc");
													while ($valoresperiodo = mysqli_fetch_array($queryperiodo)) {
														echo '
													<option value="'.$valoresperiodo["nombre_programa"].'">'.$valoresperiodo["nombre_programa"].'</option>';
													}	?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">AÑO ADMISION</label> <span style="color: black;">(Ejem:2024)</span>
                                            <input type="number" name="anioad" id="anioad" class="form-control">
                                        </div>
                                        </div>
									    <div class="col-md-3">
										<button type="submit" class="btn btn-secondary btn-lg" value="buscar" id="buscar" name="buscar">
											<i class="fa fa-save"></i> Buscar
										</button>
                                        </div>
                        </div>
                        </form>
                        <form action="generarpostulantes_pdf.php" method="POST" id="formulario_postulante" name="formulario_postulante" target="_blank" enctype="multipart/form-data">
                            
                            <div class="row">
                                
                                           
                                </div>          
                                   <?php if (isset($_SESSION['message'])): ?>
                                        <div class="alert alert-info">
                                            <?= $_SESSION['message']; ?>
                                        </div>
                                        <?php unset($_SESSION['message']); ?>
                                    <?php endif; ?>
                            
                                    <!-- Mostrar mensajes si existen -->
                                    <?php if (isset($_SESSION['postulantes']) && count($_SESSION['postulantes']) > 0): ?>            
                                            <!-- Mostrar tabla con resultados si existe información del estudiante -->
                                              <h2>Lista de Postulantes</h2>
                                          
                                              <div class="controls-container">
                                                Mostrar:
                                                <select id="rowsPerPage" onchange="updateTableRows()">
                                                    <option value="10">10 Filas</option>
                                                    <option value="25">25 Filas</option>
                                                    <option value="50">50 Filas</option>
                                                </select>

                                                <div class="search-container">
                                                    Buscar: <input id="searchTerm" type="text" onkeyup="doSearch()" />
                                                </div>
                                            </div>

                                                <table class="table table-bordered" id="datos" name="datos" class="display">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>TIPO DOC.</th>
                                                            <th>NRO DOC.</th>
                                                            <th>NOMBRE COMPLETO</th>
                                                            <th>AÑO ADM.</th>
                                                            <th>OPCION 1</th>
                                                            <th>OPCION 2</th>
                                                          <!--  <th>DOC. DNI</th>
                                                            <th>VOUCHER</th>
                                                            <th>FOTO</th>
                                                            <th>CERTIFICADO EST.</th>
                                                            <th>PARTIDA</th>
                                                            <th>DECL. JURADA</th>-->
                                                            <th>FECHA</th>
                                                         </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    $contador = 1;
                                                    foreach ($_SESSION['postulantes'] as $p): ?>
                                                        <tr>
                                                            <td><?= $contador++; ?></td>
                                                            <td><?= $p['tipo_doc']; ?></td>
                                                            <td><?= $p['nro_doc']; ?></td>
                                                            <td><?= $p['nombre_completo']; ?></td>
                                                            <td><?= $p['anioad']; ?></td>
                                                            <td><?= $p['opcion1']; ?></td>
                                                            <td><?= $p['opcion2']; ?></td>
                                                            <td><?= $p['fecha']; ?></td>
                                                        </tr>
                                                        <?php  endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <div class="pagination">
                                                    <button id="prevBtn" onclick="changePage('prev')"><<</button>
                                                    <span id="pageNumber"> 1</span>
                                                    <button id="nextBtn" onclick="changePage('next')">>></button>
                                                </div>
                                                <div id="searchMessage" class="hide"></div>
                                                <?php   
                                                        unset($_SESSION['tipo_doc']);
                                                        unset($_SESSION['nro_doc']);
                                                        unset($_SESSION['nombre_completo']);
                                                        unset($_SESSION['anioad']);
                                                        unset($_SESSION['opcion1']);
                                                        unset($_SESSION['opcion2']);
                                                        unset($_SESSION['fecha']);
                                                       // unset($_SESSION['postulantes//']);
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

<style>
            table,tr,th,td{
                border: 1px solid black;
            }
 </style>

<script>
  
    // Función para actualizar las filas visibles según la selección del usuario
    function updateTableRows() {
        const table = document.getElementById('datos');
        const rowsPerPage = document.getElementById('rowsPerPage').value; // Obtiene el valor del filtro "Mostrar"
        const rows = table.getElementsByTagName('tr'); // Obtiene todas las filas de la tabla (incluyendo la fila de encabezado)

        // Hacemos que las filas a mostrar dependan del valor de "rowsPerPage"
        let totalRows = rows.length;
        let startRow = 1; // Empieza desde la segunda fila (después del encabezado)

        // Ajustamos las filas visibles según el valor seleccionado
        for (let i = startRow; i < totalRows; i++) {
            if (i < startRow + parseInt(rowsPerPage)) {
                rows[i].style.display = '';  // Muestra la fila
            } else {
                rows[i].style.display = 'none';  // Oculta la fila
            }
        }
    }

    function doSearch() {
    const tableReg = document.getElementById('datos');
    const searchText = document.getElementById('searchTerm').value.toLowerCase();
    let total = 0;

    // Recorremos todas las filas con contenido de la tabla
    for (let i = 1; i < tableReg.rows.length; i++) {
        // Si el td tiene la clase "noSearch" no se busca en su contenido
        if (tableReg.rows[i].classList.contains("noSearch")) {
            continue;
        }

        let found = false;
        const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');

        // Recorremos todas las celdas
        for (let j = 0; j < cellsOfRow.length && !found; j++) {
            const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            // Buscamos el texto en el contenido de la celda
            if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                found = true;
                total++;
            }
        }

        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            // Si no ha encontrado ninguna coincidencia, esconde la fila de la tabla
            tableReg.rows[i].style.display = 'none';
        }
    }

    // Mostramos las coincidencias en un span fuera de la tabla
    const searchMessage = document.getElementById("searchMessage");  // Elemento donde mostrar el mensaje

    if (searchText == "") {
        searchMessage.classList.add("hide");
    } else if (total) {
        searchMessage.classList.remove("hide");
        searchMessage.innerHTML = "Se ha encontrado " + total + " coincidencia" + (total > 1 ? "s" : "");
    } else {
        searchMessage.classList.remove("hide");
        searchMessage.innerHTML = "No se han encontrado coincidencias";
    }

  
}

  window.onload = updateTableRows;
//    updateTableRows()
</script>

<script>
        let currentPage = 1;
        const rowsPerPage = 10;
        const table = document.getElementById('datos');
        const rows = table.getElementsByTagName('tr');
        const totalRows = rows.length - 1;  // Excluyendo el encabezado de la tabla
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        // Inicializar tabla y botones
        function initializeTable() {
            // Ocultar todas las filas
            for (let i = 1; i < rows.length; i++) {
                rows[i].style.display = 'none';
            }
            // Mostrar las filas de la página actual
            for (let i = (currentPage - 1) * rowsPerPage + 1; i <= currentPage * rowsPerPage && i < rows.length; i++) {
                rows[i].style.display = '';
            }
            // Actualizar el número de página
            document.getElementById('pageNumber').textContent = ` ${currentPage}`; // aqui va la letra paginacioon
            // Habilitar/deshabilitar botones de paginación
            document.getElementById('prevBtn').disabled = currentPage === 1;
            document.getElementById('nextBtn').disabled = currentPage === totalPages;
        }

        // Función para cambiar de página
        function changePage(direction) {
            if (direction === 'next' && currentPage < totalPages) {
                currentPage++;
            } else if (direction === 'prev' && currentPage > 1) {
                currentPage--;
            }
            initializeTable();
        }

        // Inicializar al cargar la página
        window.onload = initializeTable;
    </script>

 
</body>