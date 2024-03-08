<?php
include './include/session.php';
require('./lib/fpdf/fpdf.php');
if(!isset($_REQUEST['id'])){
    header('Location: semanasacademicas.php');
}

class PDF extends FPDF {

    function __construct($orientation = 'P', $unit = 'mm', $size = 'Letter') {
        parent::__construct($orientation, $unit, $size);
    }

    // Cabecera de página
    function Header() {

        $this->SetFont('Arial', 'B', 14);
        $this->Cell(35, 25, $this->Image('img/logoitszo.jpg', 15, 10, 25), 1, 0, 'C');
        $this->Cell(160, 25, $this->Text(50, 25, utf8_decode('INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS OCCIDENTE')), 1, 0, 'C');

        //$this->Image('img/logo_sev.jpg', 144, 12, 33);
        //$this->Image('img/logo_orgullo_veracruz.png', 178, 14.5, 20);
        $this->Ln(30);
    }

// Pie de página
    function Footer() {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 10);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function MultiCellBlt($w, $h, $blt, $txt, $border = 0, $align = 'J', $fill = false) {
        //Get bullet width including margins
        $blt_width = $this->GetStringWidth($blt) + $this->cMargin * 2;

        //Save x
        $bak_x = $this->x;

        //Output bullet
        $this->Cell($blt_width, $h, $blt, 0, '', $fill);

        //Output text
        $this->MultiCell($w - $blt_width, $h, $txt, $border, $align, $fill);

        //Restore x
        $this->x = $bak_x;
    }
}
$con = DatabaseConnect::getConnection();
$query = "SELECT carrera, telefono_tutor, is_firmado, numero_control, nombre_completo, semana_academica.semestre, fecha_salida, fecha_regreso FROM alumno INNER JOIN semana_academica ON alumno.id_alumno = semana_academica.id_alumno NATURAL JOIN carrera WHERE id_semana_academica = " . $_REQUEST['id'];
$result = mysqli_query($con, $query);
if ($result) {
    foreach ($result as $data) {
        $numero_control = $data['numero_control'];
        $nombre_completo = $data['nombre_completo'];
        $semestre = $data['semestre'];
        $fechaSalida = $data['fecha_salida'];
        $fechaRegreso = $data['fecha_regreso'];
        $firmado = $data['is_firmado'];
        $telefono_tutor = $data['telefono_tutor'];
        $carrera = $data['carrera'];
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(5);
$pdf->Cell(150, 5, '', 0);
$pdf->MultiCell(50, 5, utf8_decode('Fecha: ' . date("d-m-y")), 0, 'L');
$pdf->Ln(10);
$pdf->Cell(5, 5, '', 0);
$pdf->MultiCell(185, 10, utf8_decode('Por este conducto autorizo a mi hijo(a)'), 0, 'L');
$pdf->Cell(5, 5, '', 0);
$pdf->MultiCell(185, 10, utf8_decode('Nombre '.$nombre_completo.' No. Control '.$numero_control.' del '.$semestre.' semestre de la carrera de '.$carrera.', para que viaje a la ciudad de Zacatecas, con motivo de realizar una exposición siendo la salida el dia '.$fechaSalida.' y regresando el dia '.$fechaRegreso.'.'), 0, 'J');
$pdf->Cell(5, 5, '', 0);
$pdf->MultiCell(185, 20, utf8_decode('Nota: Telefono en donde localizar a los padres '.$telefono_tutor).'.', 0, 'J');
$pdf->Ln(10);
$pdf->MultiCell(185, 5, utf8_decode('____________________________'), 0, 'C');
$pdf->MultiCell(185, 5, utf8_decode('NOMBRE Y FIRMA DEL TUTOR'), 0, 'C');
/*
  $pdf->Cell(15, 5,'', 0);
  $pdf->MultiCell(70, 5, utf8_decode('SISTEMA: '), 0, 'L');
  $pdf->Cell(120, 5, '', 0);
  $pdf->MultiCell(70, 5, utf8_decode('TURNO: '), 0, 'L');
  $pdf->MultiCell(190, 5, utf8_decode('MOTIVOS: '), 0, 'J');
  $pdf->Ln(2);
  $pdf->MultiCell(190, 5, utf8_decode('FECHA A JUSTIFICAR: '), 0, 'J');
  $pdf->Ln(2);
  $pdf->Cell(30, 5, 'ACTIVIDADES: ', 0, 0, 'L');
  $pdf->Cell(5, 5,'' , 1, 1, 'C');
  $pdf->Ln(1);
  $pdf->Cell(30, 5, 'ASISTENCIAS: ', 0, 0, 'L');
  $pdf->Cell(5, 5,'', 1, 0, 'C');
  $pdf->Ln(8);
  $pdf->Cell(110, 5, '', 0);
  $pdf->MultiCell(80, 5, utf8_decode('___________________________________ NOMBRE Y FIRMA DEL TUTOR'), 0, 'C');
 */
//    $pdf->Output('D', strtoupper($tutor.'-'.$claveCarrera).'-'.$grupo.'-'.$anual.$_REQUEST['idGrupo'].'.pdf');
$pdf->Output();

