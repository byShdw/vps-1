<?php
if(isset($_REQUEST['vps']))
	$v = $_REQUEST['vps'];
else
	$v = "autos";
$logoff = '';
session_start();
if( isset($_SESSION['username']) && ($_SESSION['username'] != 'null') ){
	$logoff = sprintf('<li><a id="logoff" href="logout.php" style="padding: 10px 5px 10px;" data-toggle="tooltip" data-placement="right" title="Cerrar sesi%sn"><i class="icon-off"></i></a></li>',utf8_decode('ó'));
}
function isActive($test){
	global $v;
	$string = "<li>";
	if( strcmp($test,$v) == 0 ){
		$string = "<li class='active'>";
	}
	echo $string;
}
?>
<div class="navbar-inner">
	<div>
		<a class="brand" href="index.php">Visualizador de Proyecciones de Venta</a>
	</div>
	<div>
		<ul class="nav">
			<?php isActive('autos');	?><a href="?vps=autos">Autos</a></li>
			<?php isActive('mys');		?><a href="?vps=mys">Minivan's y SUV's</a></li>
			<?php isActive('pl');		?><a href="?vps=pl">Pickup's Lights</a></li>
			<?php isActive('all');		?><a href="?vps=all">Todos</a></li>
			<?php isActive('val');		?><a href="?vps=val">Valores</a></li>
			<?php isActive('conf');		?><a href="?vps=conf" style="padding: 10px 5px 10px;"><i class="icon-cog"></i></a></li>
			<?php echo $logoff;?>
		</ul>
	</div>
</div>