<?php
require_once('mysqlConn.php');

$query = 'SELECT idconfiguration,mes,anio FROM vps.config';
$result = mysql_query($query);

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$mesMinimo 		= 12;
$anioMinimo 	= 1970;
$mesMaximo 		= 1;
$anioMaximo 	= 1970;

while($row = mysql_fetch_assoc($result)){
	if( $row['idconfiguration'] == 1 ){
		$mesMinimo = $row['mes'];
		$anioMinimo = $row['anio'];
	}else{
		$mesMaximo = $row['mes'];
		$anioMaximo = $row['anio'];
	}
}
?>
<form class="" method="POST" action="updateDataEdition.php">
  <fieldset>
    <legend>Permitir edicion de datos a partir de</legend>
    <div class="row">
		<div class="span3">
			<select name="desdeM">
				<?php
				$aux = $meses;
				while (list($key, $value) = each($meses)) {
					$i = $key + 1;
					if( $i == $mesMinimo){
						echo "<option selected value='".$i."'>".$value."</option>";
					}else{
						echo "<option value='".$i."'>".$value."</option>";
					}
					next($aux);
				}
				?>
			</select>
		</div>
		<div class="span3">
			<select name="desdeA">
				<?php
				for ($i=date('Y'); $i <= date('Y')+3; $i++) {
					if($i == $anioMinimo){
						echo "<option selected>" . (string)$i . "</option>";
					}else{
						echo "<option>" . (string)$i . "</option>";
					}
				}
				?>
			</select>
		</div>
	</div>
	<span class="help-block"></span>
	<legend>Hasta:</legend>
    <div class="row">
		<div class="span3">
			<select name="hastaM">
				<?php
				$aux = $meses;
				while (list($key, $value) = each($meses)) {
					$i = $key + 1;
					if( $i == $mesMaximo){
						echo "<option selected value='".$i."'>".$value."</option>";
					}else{
						echo "<option value='".$i."'>".$value."</option>";
					}
					next($aux);
				}
				?>
			</select>
		</div>
		<div class="span3">
			<select name="hastaA">
				<?php
				for ($i=date('Y'); $i <= date('Y')+3; $i++) { 
					if($i == $anioMaximo){
						echo "<option selected>" . (string)$i . "</option>";
					}else{
						echo "<option>" . (string)$i . "</option>";
					}
				}
				?>
			</select>
		</div>
	</div>
    <button type="submit" class="btn">Actualizar</button>
  </fieldset>
</form>
