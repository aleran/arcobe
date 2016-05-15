<?php
include("../connect/conexion.php");
$archivo = $_FILES['excel']['name'];
$tipo = $_FILES['excel']['type'];
$destino = $archivo;
if (copy($_FILES['excel']['tmp_name'],$destino)) echo "Archivo Cargado Con Exito<br>";
else echo "Error Al Cargar el Archivo";

if($archivo!=""){ 
include('../Classes/PHPExcel.php');
include('../Classes/PHPExcel/Reader/Excel2007.php');

$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load($archivo);
$objFecha = new PHPExcel_Shared_Date();
$objPHPExcel->setActiveSheetIndex(0);

$i=2;
$co=1;
$stop=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
while ($stop!=""){
	$trb_cedula = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
	$trb_telefono = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
	$trb_direccionh = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
	$trb_correo = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
	$buscarSQL = mysql_query("SELECT trb_cedula FROM cj_trabajadores WHERE trb_cedula='$trb_cedula'");
	$buscarROW = mysql_fetch_array($buscarSQL);
	if($trb_cedula==$buscarROW['trb_cedula']){
	$sql = "UPDATE cj_trabajadores
			SET trb_telefono='$trb_telefono',
			    trb_direccionh='$trb_direccionh',
			    trb_correo='$trb_correo'
			    WHERE trb_cedula='$trb_cedula'
			    ";
	mysql_query($sql,$con) or die (mysql_error());
	}
	$is=$i+1;
	$stop=$objPHPExcel->getActiveSheet()->getCell('A'.$is)->getCalculatedValue();
	$i=$i+1;
	$co=$co+1;
}
header("location:index.php?accion=1");
}

?>

