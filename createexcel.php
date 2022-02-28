<?php
require_once 'excel.php';

activeErrorReporting();
noCli();

require_once 'PHPExcel/Classes/PHPExcel.php';
require_once 'conexionexcel.php';
require_once 'listaexcel.php';

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
    ->setCellValue('B1', 'PRESENTACION')
    ->setCellValue('C1', 'STOCK INICIAL')
    ->setCellValue('D1', 'C.S.L.')
    ->setCellValue('E1', 'CLEARING(Ingresante)')
    ->setCellValue('F1', 'UNIDADES ENTREGADAS')
    ->setCellValue('G1', 'CLEARING(Saliente)')
    ->setCellValue('H1', 'NO APTOS')
    ->setCellValue('I1', 'OTRAS')
    ->setCellValue('J1', 'CONSUMO MENSUAL')
    ->setCellValue('K1', 'STOCK FINAL');


$informe = getlistaexcel();
$i = 2;
while($row = $informe->fetch_array(MYSQLI_ASSOC))
{

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A$i", $row['nombrei'])
            ->setCellValue("B$i", $row['nombrep'])
            ->setCellValue("C$i", $row['stocki'])
            ->setCellValue("D$i", $row['csl'])
            ->setCellValue("E$i", $row['clearr'])
            ->setCellValue("F$i", $row['ue'])
            ->setCellValue("G$i", $row['clears'])
            ->setCellValue("H$i", $row['noapt'])
            ->setCellValue("I$i", $row['otras'])
            ->setCellValue("J$i", $row['consumom'])            
            ->setCellValue("K$i", $row['stockf']);
$i++;
}
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);



$objPHPExcel->getActiveSheet()->setTitle('Informe Completo');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>