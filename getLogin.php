<?php
if(isset($_REQUEST['vps'])){
	session_start();
	if( isset($_SESSION['username']) && ($_SESSION['username'] != 'null') ){
		$vps = $_REQUEST['vps'];
	}else{
		$vps = "autos";
	}
}
else{
	session_start();
	if( isset($_SESSION['username']) && ($_SESSION['username'] != 'null') ){
		$vps = $_REQUEST['vps'];
	}else{
		$vps = "autos";
	}
}
$baselink = '?vps=' . $vps;

ob_start();

$username = $_POST['uname'];
$password = $_POST['pword'];

$username = stripslashes($username);
$username = mysql_real_escape_string($username);
$password = stripslashes($password);
$password = mysql_real_escape_string($password);


$con = mysql_connect("localhost","vps","gsincovps");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("vps", $con);

$query = sprintf("SELECT * FROM vps.users WHERE username='%s' AND pass='%s'",$username,$password);
$resultSet = mysql_query($query);

$count=mysql_num_rows($resultSet);

if( $count != 0 ) {
	$permission = '';
	$fullname = '';
	while($row = mysql_fetch_assoc($resultSet)){
		$permission = $row['permissions'];
		$fullname = $row['fullname'];
	}
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['permission'] = $permission;
	$_SESSION['fullname'] = $fullname;
	header("location:index.php".$baselink);
}else{
	session_start();
	$_SESSION['errors'] = 'ERROR';
	header("location:index.php".$baselink);
}

mysql_close($con);

ob_end_flush();
?>