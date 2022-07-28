

<?php 

require_once '../library/fpdf/fpdf.php';

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
foreach($reporte as $reportes){
    $pdf->SetXY(80,15);
    $pdf->Cell(50,8,'Reporte',0,1,'C');
    $pdf->ln(10);
    
    //Nombre de las columnas
    $pdf->SetFillColor(51, 119, 122);
    $pdf->Cell(20,10,'Nombre',1,0,'C',1);
    $pdf->Cell(20,10,'Usuario',1,0,'C',1);
    $pdf->Cell(35,10,'Fecha de Creacion',1,0,'C',1);
    $pdf->Cell(35,10,'Fecha Programada',1,0,'C',1);
    $pdf->Cell(25,10,'Frecuencia',1,0,'C',1);
    $pdf->Cell(20,10,'Tipo',1,0,'C',1);
    $pdf->Cell(40,10,'Observaciones',1,1,'C',1);
    
    //Valores de la db
    $pdf->SetFillColor(113, 113, 113);
    $pdf->Cell(20,10,utf8_decode($reportes->nombre),1,0,'C',1);
    $pdf->Cell(20,10,utf8_decode($reportes->usuario),1,0,'C',1);
    $pdf->Cell(35,10,utf8_decode($reportes->fechaCreacion),1,0,'C',1);
    $pdf->Cell(35,10,utf8_decode($reportes->fechaProgramada),1,0,'C',1);
    $pdf->Cell(25,10,utf8_decode($reportes->frecuencia),1,0,'C',1);
    $pdf->Cell(20,10,utf8_decode($reportes->tipo),1,0,'C',1);
    $pdf->Cell(40,10,utf8_decode($reportes->observaciones),1,0,'C',1);
}
$pdf->Output();

?>