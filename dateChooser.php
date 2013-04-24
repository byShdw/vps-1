<?php
	$year = 2009;
	$years = 0;
	$con = mysql_connect("localhost","vps","gsincovps");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	mysql_select_db("vps", $con);
	$query = sprintf("SELECT a%so FROM vps.qs WHERE id=(SELECT MAX(id) FROM vps.qs);",utf8_decode("ñ"));
	$recordSet = mysql_query($query);
	while($row = mysql_fetch_assoc($recordSet)){
		$years = $row[utf8_decode("año")] - 2009 + 1;
	}
?>
<div class="container dateChooser">
	<div class="container">
		<div class="row">
			<form class="OgetData" action="" method="POST">
				<?php echo "<input type='hidden' id='producto' value=$vps>"; ?>
				<div class="span7">
					<fieldset>
						<legend>Desde</legend>
						<div class="span3">
							<label>Mes</label>
							<select id="desdeM">
								<option value="01">Enero</option>
								<option value="02">Febrero</option>
								<option value="03">Marzo</option>
								<option value="04">Abril</option>
								<option value="05">Mayo</option>
								<option value="06">Junio</option>
								<option value="07">Julio</option>
								<option value="08">Agosto</option>
								<option value="09">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
						</div>
						<div class="span3">
							<label>A&ntilde;o</label>
							<select id="desdeA">
								<?php
								for ($i=0; $i < $years; $i++) { 
									echo "<option>" . (string)$year++ . "</option>";
								}
								?>
							</select>
						</div>
					</fieldset>
				</div>
				<div class="span7">
					<fieldset>
						<legend>Hasta</legend>
						<div class="span3">
							<label>Mes</label>
							<select id="hastaM">
								<option value="01">Enero</option>
								<option value="02">Febrero</option>
								<option value="03">Marzo</option>
								<option value="04">Abril</option>
								<option value="05">Mayo</option>
								<option value="06">Junio</option>
								<option value="07">Julio</option>
								<option value="08">Agosto</option>
								<option value="09">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
						</div>
						<div class="span3">
							<label>A&ntilde;o</label>
							<select id="hastaA">
								<?php
								$year = 2009;
								for ($i=0; $i < $years; $i++) { 
									echo "<option>" . (string)$year++ . "</option>";
								}
								?>
							</select>
						</div>
					</fieldset>
				</div>
				<div class="span7">
					<fieldset>
						<legend></legend>
						<button class="btn btn-large btn-primary" type="submit">Consultar</button>
					</fieldset>
				</div>
			</form>
		</div>
	</div>
</div>