<?php
$con = mysql_connect("localhost","vps","gsincovps");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("vps", $con);
?>