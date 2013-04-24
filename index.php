<?php
if(isset($_REQUEST['vps'])){
	session_start();
	if( isset($_SESSION['username']) && ($_SESSION['username'] != 'null') ){
		$vps = $_REQUEST['vps'];
	}else{
		$vps = "login";
	}
}
else{
	session_start();
	if( isset($_SESSION['username']) && ($_SESSION['username'] != 'null') ){
		$vps = "autos";
	}else{
		$vps = "login";
	}
}
$baselink = '?vps=' . $vps;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>VPS</title>
		<?php require_once('csss.php') ?>
	</head>
	<body>
		<div class="container">
			<div class="navbar">
				<?php require 'navbar.php';?>
			</div>
			<div class="container">
				<?php
					switch($vps){
						case "login":
							printf('<h2>Inicio de sesi%sn</h2>',utf8_decode('ó'));
							require('loginform.php');
							break;
						case "autos":
							echo "<h2>Autos</h2>";
							require('dateChooser.php');
							break;
						case "mys":
							echo "<h2>Minivan's y SUV's</h2>";
							require('dateChooser.php');
							break;
						case "pl":
							echo "<h2>Pickup's Lights</h2>";
							require('dateChooser.php');
							break;
						case "all":
							echo "<h2>Todos</h2>";
							require('dateChooser.php');
							break;
						case "val":
							echo "<h2>Valores</h2>";
							require('valuesEditor.php');
							break;
						case "conf":
							echo sprintf("<h2>Configuraci%sn</h2>",utf8_decode('ó'));
							require('configurationEntryPoint.php');
							break;	
						default:
							echo "<h2>Undefined</h2>";
							echo "<h3>417 Expectation Failed</h3>";
							echo "<h3>418 I'm a teapot (RFC 2324)</h3>";
							echo "<h4>The server cannot meet the requirements of the Expect request-header field.</h4>";
							break;
					}
				?>
				<div class="container contents">
					
					
				</div>
			</div>
			<div id="chart" style="width: 100%; height: 400px">
						
			</div>
		</div>
	</body>
	<?php require_once('javascripts.php') ?>
</hmtl>