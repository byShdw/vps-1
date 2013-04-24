<?php
require_once('mysqlConn.php');

$inputTDA = array();
$inputREMESAS = array();
$inputQIVF = array();
$inputICC = array();
$inputIM4 = array();
$inputIPAUTOS = array();
$inputIPTRANSPUB = array();
$inputIPGASOLINA = array();
$inputIPREFYACC = array();
$inputIPMANTENA = array();
$inputTIIE91D = array();
$inputEXPTOTALES = array();

$totalValues = $_POST['numVal'];
for($i=0; $i<$totalValues; $i++){
	array_push($inputTDA,$_POST['tda'.$i]);
	array_push($inputREMESAS,$_POST['remesas'.$i]);
	array_push($inputQIVF,$_POST['qivf'.$i]);
	array_push($inputICC,$_POST['icc'.$i]);
	array_push($inputIM4,$_POST['im4'.$i]);
	array_push($inputIPAUTOS,$_POST['ipautos'.$i]);
	array_push($inputIPTRANSPUB,$_POST['iptranspub'.$i]);
	array_push($inputIPREFYACC,$_POST['iprefyacc'.$i]);
	array_push($inputIPGASOLINA,$_POST['ipgasolina'.$i]);
	array_push($inputIPMANTENA,$_POST['ipmantena'.$i]);
	array_push($inputTIIE911D,$_POST['tiie911d'.$i]);
	array_push($inputEXPTOTALES,$_POST['exptotales'.$i]);
}


foreach ($inputTDA as $key => $value) {
	echo $key . "=>" . $value . "<br>";
}


?>