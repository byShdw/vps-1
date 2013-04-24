<div class="alert alert-error OAlert">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	Usuario o contrase&ntilde;a incorrecto, porfavor, vuelva a intentar.
</div>	

<?php
session_start();
if( isset($_SESSION['errors']) ){?>
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	Usuario o contrase&ntilde;a incorrecto, porfavor, vuelva a intentar.
</div>	
<?php unset($_SESSION['errors']); } ?>

<!-- This should be dynamically be deleted by Javascript upon authentication received -->
<form class="GetAuth" method="POST" action="getLogin.php">
  <fieldset>
    <legend>Porfavor, ingrese sus datos de inicio de sesi&oacute;n</legend>
    <input name="uname" id="uname" type="text" placeholder="Usuario">
	<span class="help-block"></span>
	<input name="pword" id="pword" type="password" placeholder="Contrase&ntilde;a">
	<span class="help-block"></span>
	<input type="hidden" id="permissions" value="0">
    <button type="submit" class="btn">Ingresar</button>
  </fieldset>
</form>

<!-- Get script for authenticating -->
<script src="gsincoauth.js"></script>