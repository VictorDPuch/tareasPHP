<?php

	//Ej. Eliminar archivo ==> href="cfg/delete.php?f='$dir.$file.'&r=../Album/'.$album.'&t=0&id=0"
	
	require_once("misc.inc");
	$f = $_GET['f']; //Archivo
	$t = $_GET['t']; //Tabla
	$r = $_GET['r']; //Regreso
	$id = $_GET['id']; //id
	
	if($id!="0" && $t!="0" ){
		$q = "UPDATE ".$t." SET status='0' WHERE id = '$id'";
		mysql_query($q) or die(mysql_error());
	}
	
	
	if($f!="0"){
		unlink($f); //funcion para eliminar archivos
		
	}
	
	header("Location: $r");		
?>