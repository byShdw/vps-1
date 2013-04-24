<?php
//Check if there is a session active. If not, display the following:
	session_start();
	if( isset($_SESSION['username']) && ($_SESSION['username'] != 'null') ){
		$baselink = $vps . "autos";
	}else{
		$baselink = $vps . "login";
	}
?>
