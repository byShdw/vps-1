<?php
//Check if there is a session active. If not, display the following:
	if( isset($_SESSION['username']) && ($_SESSION['username'] != 'null') ){
		require('configuration.php');
	}else{
		require('loginform.php');
	}
?>