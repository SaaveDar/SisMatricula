<?php
session_start();

// Verifica si los datos están presentes
if (!isset($_POST['tipo']) || empty($_POST['tipo'])) {
    die('No hay datos disponibles para generar el PDF.');
}

// Incluye la librería de generación de PDF
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Encabezado del documento
    function Header()
    {
        $this->Image('img/logo_istelaredo.png', 10, 0, 30); // Ajusta la ruta y las dimensiones
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'FICHA DE MATRICULA - ISTEP LAREDO', 0, 1, 'C');
        $this->Ln(8);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear el PDF
$pdf = new PDF();
$pdf->AddPage();
// Título en negrita
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'DATOS DEL ESTUDIANTE:', 0, 1);

// Configuración para el contenido
$pdf->SetFont('Arial', 'B', 11); // Texto estático en negrita
$pdf->Cell(50, 10, 'Tipo Documento:', 0, 0); // Cambia el ancho de la celda para acomodar los textos

$pdf->SetFont('Arial', '', 10); // Texto dinámico en normal
$pdf->Cell(0, 10, $_POST['tipo'], 0, 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 10, 'Nro Documento:', 0, 0);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, $_POST['nro'], 0, 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 10, 'Estudiante:', 0, 0);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, $_POST['nombre'], 0, 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 10, 'Programa de Estudios:', 0, 0);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, $_POST['programa_estudios'], 0, 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 10, 'Periodo Lectivo:', 0, 0);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, $_POST['periodolectivo'], 0, 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 10, 'Periodo Academico:', 0, 0);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, $_POST['periodoacademico'], 0, 1);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 10, 'Fecha Matricula:', 0, 0);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, $_POST['fecha_matricula'], 0, 1);
$pdf->Ln(4);

// Agrega una tabla si hay cursos disponibles
if (isset($_SESSION['estudiantes']) && count($_SESSION['estudiantes']) > 0) {
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'DETALLE DE MATRICULA:', 0, 1);
    $pdf->Ln(5);
    // Encabezados en negrita y centrados
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 10, '#', 1, 0, 'C'); // 'C' para centrar
    $pdf->Cell(23, 10, 'Periodo Lectivo', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Abrev. UD', 1, 0, 'C');
    $pdf->Cell(80, 10, 'Unidad Didactica', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Creditos', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Horas', 1, 0, 'C');
    $pdf->Cell(15, 10, 'Modulo', 1, 1, 'C'); // '1' para salto de línea al final
    //$pdf->Ln();

    $contador = 1;
    foreach ($_SESSION['estudiantes'] as $estudiante) {
        $pdf->SetFont('Arial', '', 8); // Letra normal
        $pdf->Cell(10, 10, $contador++, 1, 0, 'C'); // 'L' para alinear a la izquierda
        $pdf->Cell(23, 10, $estudiante['ciclo_curso'], 1, 0, 'C');
        $pdf->Cell(25, 10, $estudiante['abrev_curso'], 1, 0, 'L');
        $pdf->Cell(80, 10, $estudiante['curso_nombre'], 1, 0, 'L');
        $pdf->Cell(20, 10, $estudiante['creditos'], 1, 0, 'C');
        $pdf->Cell(20, 10, $estudiante['horas_semanales'], 1, 0, 'C');
        $pdf->Cell(15, 10, $estudiante['modulo'], 1, 1, 'C'); // '1' para salto de línea al final
       // $pdf->Ln();
    }
}


// Salida del archivo PDF
$pdf->Output('I', 'reporte_matricula.pdf');
// Limpiar la sesión
unset($_SESSION['tipo_documento']);
unset($_SESSION['nro_documento']);
unset($_SESSION['nombre_completo']);
unset($_SESSION['programa_estudios']);
unset($_SESSION['periodolectivo']);
unset($_SESSION['periodoacademico']);
unset($_SESSION['estudiantes']);
?>
