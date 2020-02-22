<?php

	//Ej. Eliminar archivo ==> href="cfg/delete.php?&r=../Album/'.$album.'&t=0&id=0"
	
	require_once("misc.inc");
	$t = $_GET['t']; //Tabla
	$r = $_GET['r']; //Regreso
	$id = $_GET['id']; //id
	$libro = $_GET['libro']; //id
	
	if($id!="0" && $t!="0" ){
		$q = "UPDATE ".$t." SET status='0' WHERE id = '$id'";
		mysql_query($q) or die(mysql_error("error update-1"));
		
		$q2 = "UPDATE biblioteca SET status='1' WHERE id = '$libro'";
		mysql_query($q2) or die(mysql_error("error update-2"));
	}
	
	
	header("Location: $r");		
?>