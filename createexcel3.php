<?php
require_once 'excel3.php';

activeErrorReporting();
noCli();

require_once 'PHPExcel/Classes/PHPExcel.php';
require_once 'conexionexcel.php';
require_once 'listaexcel3.php';

$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Developero")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLS Test Document")
    ->setSubject("Office 2007 XLS Test Document")
    ->setDescription("Test document for Office 2007 XLS, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");

$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
    ->setSize(12);

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'NOMBRE')
    ->setCellValue('B1', 'STOCK')
    ->setCellValue('C1', 'CONSUMO MENSUAL')
    ->setCellValue('D1', 'NECESIDAD');


$informe = getlistaexcel();
$i = 2;
while($row = $informe->fetch_array(MYSQLI_ASSOC))
{
$necesidad=$row["necesidad"];
if ($necesidad<0) {
    $necesidad=0;
}
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A$i", $row['nombrei'])
            ->setCellValue("B$i", $row['stockf'])
            ->setCellValue("C$i", $row['consumom'])
            ->setCellValue("D$i", $necesidad);
$i++;
}
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);


$objPHPExcel->getActiveSheet()->setTitle('Pedido');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
