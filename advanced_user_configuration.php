<?php
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
<form class="" method="POST" action="">
  <fieldset>
    <legend>Edicion de datos a partir de</legend>
    <div class="row">
		<div class="span3">
			<select disabled name="desdeM">
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
			<select disabled name="desdeA">
				<?php
				for ($i=$anioMinimo; $i <= 2016; $i++) { 
					echo "<option>" . (string)$i . "</option>";
				}
				?>
			</select>
		</div>
	</div>
	<span class="help-block"></span>
	<legend>Hasta:</legend>
    <div class="row">
		<div class="span3">
			<select disabled name="hastaM">
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
			<select disabled name="hastaA">
				<?php
				for ($i=$anioMinimo; $i <= $anioMaximo; $i++) { 
					echo "<option>" . (string)$i . "</option>";
				}
				?>
			</select>
		</div>
	</div>
    <button disabled class="btn">Actualizar</button>
  </fieldset>
</form>
