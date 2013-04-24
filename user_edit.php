<?php
session_start();
$user = $_SESSION['username'];
$perm = $_SESSION['permission'];
require_once('mysqlConn.php');

$query = 'SELECT type,mes,anio FROM vps.config';
$result = mysql_query($query);

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$mesMinimo 		= 1;
$anioMinimo 	= 1970;
$mesMaximo 		= 12;
$anioMaximo 	= 1970;

while($row = mysql_fetch_assoc($result)){
	if( $row['type'] == 'minimo' ){
		$mesMinimo = $row['mes'];
		$anioMinimo = $row['anio'];
	}else if( $row['type'] == 'maximo') {
		$mesMaximo = $row['mes'];
		$anioMaximo = $row['anio'];
	}
}
?>
<div class="container">
	<div class="well">
		<p>Usted puede editar a partir de:<br>
		<strong> <?php echo $meses[$mesMinimo - 1] . " de " . $anioMinimo; ?> </strong>
		</p>
		<p>Y hasta:<br>
		<strong> <?php echo $meses[$mesMaximo - 1] . " de " . $anioMaximo; ?> </strong>
		</p>
	</div>
</div>
<form method="POST" action="updateValues.php">
	<fieldset>
	<?php 
	/*
	Grab all the data since minimum year and minimum month up until now and make them editable.
	Leave blank if no new value is added.
	*/
	$mesesU = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
	$inputTDA = 0;
	$inputREMESAS = 0;
	$inputQIVF = 0;
	$inputICC = 0;
	$inputIM4 = 0;
	$inputIPAUTOS = 0;
	$inputIPTRANSPUB = 0;
	$inputIPGASOLINA = 0;
	$inputIPREFYACC = 0;
	$inputIPMANTENA = 0;
	$inputTIIE91D = 0;
	$inputEXPTOTALES = 0;
	for($i=$anioMinimo; $i<=$anioMaximo; $i++){
		$query = sprintf('SELECT mes,a%so,tda,remesas,qivf,icc,im4,ipautos,iptranspub,ipgasolina,iprefyacc,ipmantena,tiie91d,exptotales FROM vps.data WHERE a%so>=%s' ,utf8_decode('ñ'),utf8_decode('ñ'),$i);
		$result = mysql_query($query);
		if( mysql_num_rows($result) ){
			while( $row = mysql_fetch_assoc($result) ){
				$invalidMonth = ((array_search($row['mes'],$mesesU)+1) < $mesMinimo)	? true : false;
				if( $invalidMonth ){
					continue;
				}else{?>
<div class='aMonth<?php echo $inputTDA ?>'>
	<legend> <?php echo $meses[array_search($row['mes'],$mesesU)] ?> de <?php echo $row[sprintf('a%so',utf8_decode('ñ'))]; ?></legend>
	<table>
		<tr>
			<th><h6>TDA</h6></th>
			<th><h6>Remesas</h6></th>
			<th><h6>QIVF</h6></th>
			<th><h6>ICC</h6></th>
		</tr>
		<tr>
			<td><input name="tda<?php echo $inputTDA++ ?>" id="tda" type="number" step='any' min='0' placeholder="TDA" value='<?php echo $row['tda'] ?>'></td>
			<td><input name="remesas<?php echo $inputREMESAS++ ?>" id="remesas" type="number" step='any' min='0' placeholder="REMESAS" value='<?php echo $row['remesas'] ?>'></td>
			<td><input name="qivf<?php echo $inputQIVF++ ?>" id="qivf" type="number" step='any' min='0' placeholder="Q IVF" value='<?php echo $row['qivf'] ?>'></td>
			<td><input name="icc<?php echo $inputICC++ ?>" id="icc" type="number" step='any' min='0' placeholder="ICC" value='<?php echo $row['icc'] ?>'></td>
		</tr>
		<tr>
			<th><h6>IM4</h6></th> <th><h6>IPAUTOS</h6></th> <th><h6>IPTRANSPUB</h6></th> <th><h6>IPGASOLINA</h6></th>
		</tr>
		<tr>
			<td><input name="im4<?php echo $inputIM4++ ?>" id="im4" type="number" step='any' min='0' placeholder="IM4" value='<?php echo $row['im4'] ?>'></td>
			<td><input name="ipautos<?php echo $inputIPAUTOS++ ?>" id="ipautos" type="number" step='any' min='0' placeholder="IP AUTOS" value='<?php echo $row['ipautos'] ?>'></td>
			<td><input name="iptranspub<?php echo $inputIPTRANSPUB++ ?>" id="iptranspub" type="number" step='any' min='0' placeholder="IPTRANSPUB" value='<?php echo $row['iptranspub'] ?>'></td>
			<td><input name="ipgasolina<?php echo $inputIPGASOLINA++ ?>" id="ipgasolina" type="number" step='any' min='0' placeholder="IP GASOLINA" value='<?php echo $row['ipgasolina'] ?>'></td>
		</tr>
		<tr>
			<th><h6>IP REF y ACC</h6></th> <th><h6>IPMANTENA</h6></th> <th><h6>TIIE91d</h6></th> <th><h6>EXPTOTALES</h6></th>
		</tr>
		<tr>
			<td><input name="iprefyacc<?php echo $inputIPREFYACC++ ?>" id="iprefyacc" type="number" step='any' min='0' placeholder="IP REF Y ACC" value='<?php echo $row['iprefyacc'] ?>'></td>
			<td><input name="ipmantena<?php echo $inputIPMANTENA++ ?>" id="ipmantena" type="number" step='any' min='0' placeholder="IP MANTENA" value='<?php echo $row['ipmantena'] ?>'></td>
			<td><input name="tiie91d<?php echo $inputTIEE91D++ ?>" id="tiie91d" type="number" step='any' min='0' placeholder="TIIE 91D" value='<?php echo $row['tiie91d'] ?>'></td>
			<td><input name="exptotales<?php echo $inputEXPTOTALES++ ?>" id="exptotales" type="number" step='any' min='0' placeholder="EXP TOTALES" value='<?php echo $row['exptotales'] ?>'></td>
		</tr>	
	</table>
</div>
				<?}
			}
		}else{
			foreach ($meses as $key => $value) {
				if($key < $mesMaximo){?>
<div class="aMonth<?php echo $inputTDA ?>">
	<legend><?php echo $value; ?> de <?php echo $i; ?></legend>
	<table>
		<tr>
			<th><h6>TDA</h6></th> <th><h6>Remesas</h6></th> <th><h6>QIVF</h6></th> <th><h6>ICC</h6></th>
		</tr>
		<tr>
			<td><input name="tda<?php echo $inputTDA++ ?>" id="tda" type="number" step='any' min='0' placeholder="TDA"></td>
			<td><input name="remesas<?php echo $inputREMESAS++ ?>" id="remesas" type="number" step='any' min='0' placeholder="REMESAS"></td>
			<td><input name="qivf<?php echo $inputQIVF++ ?>" id="qivf" type="number" step='any' min='0' placeholder="Q IVF"></td>
			<td><input name="icc<?php echo $inputICC++ ?>" id="icc" type="number" step='any' min='0' placeholder="ICC"></td>
		</tr>
		<tr>
			<th><h6>IM4</h6></th> <th><h6>IPAUTOS</h6></th> <th><h6>IPTRANSPUB</h6></th> <th><h6>IPGASOLINA</h6></th>
		</tr>
		<tr>
			<td><input name="im4<?php echo $inputIM4++ ?>" id="im4" type="number" step='any' min='0' placeholder="IM4"></td>
			<td><input name="ipautos<?php echo $inputIPAUTOS++ ?>" id="ipautos" type="number" step='any' min='0' placeholder="IP AUTOS"></td>
			<td><input name="iptranspub<?php echo $inputIPTRANSPUB++ ?>" id="iptranspub" type="number" step='any' min='0' placeholder="IPTRANSPUB"></td>
			<td><input name="ipgasolina<?php echo $inputIPGASOLINA++ ?>" id="ipgasolina" type="number" step='any' min='0' placeholder="IP GASOLINA"></td>
		</tr>
		<tr>
			<th><h6>IP REF y ACC</h6></th> <th><h6>IPMANTENA</h6></th> <th><h6>TIIE91d</h6></th> <th><h6>EXPTOTALES</h6></th>
		</tr>
		<tr>
			<td><input name="iprefyacc<?php echo $inputIPREFYACC++ ?>" id="iprefyacc" type="number" step='any' min='0' placeholder="IP REF Y ACC"></td>
			<td><input name="ipmantena<?php echo $inputIPMANTENA++ ?>" id="ipmantena" type="number" step='any' min='0' placeholder="IP MANTENA"></td>
			<td><input name="tiie91d<?php echo $inputTIEE91D++ ?>" id="tiie91d" type="number" step='any' min='0' placeholder="TIIE 91D"></td>
			<td><input name="exptotales<?php echo $inputEXPTOTALES++ ?>" id="exptotales" type="number" step='any' min='0' placeholder="EXP TOTALES"></td>
		</tr>
	</table>
</div>
				<?}
			}
		}
	}
	?>
	</fieldset>
	<input name='numVal' type='hidden' value='<?php echo --$inputTDA ?>'>
	<!-- <button class='btn btn-large btn-primary'>Actualizar</button>-->
</form>
<!-- <script src="gsuseredittooltip.js"></script> -->
> -->