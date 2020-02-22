<?php

	//Ej. Eliminar archivo ==> href="cfg/delete.php?f='$dir.$file.'&r=../Album/'.$album.'&t=0&id=0"
	
	require_once("misc.inc");

	$r = $_GET['r']; //Regreso
	$id = $_GET['id']; //id
	$libro = $_GET['libro']; //id libro
	$hoy = date("YmdHis");
	
	mysql_query("UPDATE biblioteca SET status='1' WHERE id='$libro'") or die(mysql_error());
	mysql_query("UPDATE prestamo SET status='E', devolucion='$hoy' WHERE id='$id'") or die(mysql_error());
	
	
	header("Location: $r");		
?>