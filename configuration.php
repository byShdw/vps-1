<?php
$user = $_SESSION['fullname'];
$perm = $_SESSION['permission'];
?>
<h3>Bienvenido, <?php echo $user ?>!!!</h3>
<?php
switch($perm){
	case 0: include_once('access_denied.php');break;
	case 1: include_once('advanced_user_configuration.php');break;
	case 2: include_once('superuser_configuration.php');break;
}
?>
<a href="logout.php">Cerrar sesi&oacute;n</a>