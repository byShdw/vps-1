<?php
session_start();
$perm = $_SESSION['permission'];
if($perm != 2){
	header('location:access_denied.php');
}

$desdeM = $_POST['desdeM'];
$desdeA = $_POST['desdeA'];

$hastaM = $_POST['hastaM'];
$hastaA = $_POST['hastaA'];

require_once('mysqlConn.php');

$desde = $desdeA . '-' . ($desdeM>=10?"":"0") . $desdeM . '-01';
$queryMinimo = sprintf("UPDATE vps.config SET mes=%s,anio=%s,ma='%s' WHERE idconfiguration=1",$desdeM,$desdeA,$desde);

$hasta = $hastaA . '-' . ($hastaM>=10?"":"0") . $hastaM . '-01';
$queryMaximo = sprintf("UPDATE vps.config SET mes=%s,anio=%s,ma='%s' WHERE idconfiguration=2",$hastaM,$hastaA,$hasta);

$resultMin = mysql_query($queryMinimo);
$resultMax = mysql_query($queryMaximo);

header('location:index.php?vps=conf');

?>