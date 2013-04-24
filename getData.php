<?php
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];
$producto = $_GET['producto'];

$con = mysql_connect("localhost","vps","gsincovps");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("vps", $con);

$arrayTotal = array();
switch($producto){
	case "autos":
		$query = sprintf("SELECT mes,a%so,ma,qautos,aut FROM vps.data WHERE ma BETWEEN '%s' AND '%s';", utf8_decode("ñ"), $desde, $hasta);
		$resultSet = mysql_query($query);
		while($row = mysql_fetch_assoc($resultSet)){
			$array = array();
			$array['mes'] = $row['mes'];
			$array['anio'] = $row[utf8_decode('año')];
			$array['qs'] = $row['qautos'];
			$arrayTotal[] = $array;
			//array_push($array, "id"=>$row['id'], "mes"=>$row['mes'],"año"=>$row['año'],"qautos"=>$row['qautos'],"aut"=>$row['aut'])
		}
		break;
	case "mys":
		$query = sprintf("SELECT mes,a%so,ma,qminysuvs,msuv FROM vps.data WHERE ma BETWEEN '%s' AND '%s';", utf8_decode("ñ"), $desde, $hasta);
		$resultSet = mysql_query($query);
		while($row = mysql_fetch_assoc($resultSet)){
			$array = array();
			$array['mes'] = $row['mes'];
			$array['anio'] = $row[utf8_decode('año')];
			$array['qs'] = $row['qminysuvs'];
			$arrayTotal[] = $array;
			//array_push($array, "id"=>$row['id'], "mes"=>$row['mes'],"año"=>$row['año'],"qautos"=>$row['qautos'],"aut"=>$row['aut'])
		}
		break;
	case "pl":
		$query = sprintf("SELECT mes,a%so,ma,qpickylights,pkl FROM vps.data WHERE ma BETWEEN '%s' AND '%s';", utf8_decode("ñ"), $desde, $hasta);
		$resultSet = mysql_query($query);
		while($row = mysql_fetch_assoc($resultSet)){
			$array = array();
			$array['mes'] = $row['mes'];
			$array['anio'] = $row[utf8_decode('año')];
			$array['qs'] = $row['qpickylights'];
			$arrayTotal[] = $array;
			//array_push($array, "id"=>$row['id'], "mes"=>$row['mes'],"año"=>$row['año'],"qautos"=>$row['qautos'],"aut"=>$row['aut'])
		}
		break;
	case "all";
		$query = sprintf("SELECT mes,a%so,ma,qautos,qminysuvs,qpickylights FROM vps.qs WHERE ma BETWEEN '%s' AND '%s';", utf8_decode("ñ"),$desde, $hasta);
		$resultSet = mysql_query($query);
		while($row = mysql_fetch_assoc($resultSet)){
			$array = array();
			$array['mes'] = $row['mes'];
			$array['anio'] = $row[utf8_decode('año')];
			$array['qs'] = $row['qautos'] + $row['qminysuvs'] + $row['qpickylights'];
			$arrayTotal[] = $array;
			//array_push($array, "id"=>$row['id'], "mes"=>$row['mes'],"año"=>$row['año'],"qautos"=>$row['qautos'],"aut"=>$row['aut'])
		}
		break;
}
mysql_close($con);

$arrayTotal['name'] = $producto;
echo $_GET['callback']."(".json_encode($arrayTotal).");";
?>
;
?>