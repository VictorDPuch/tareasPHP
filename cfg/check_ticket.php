<?php
	include("misc.inc");
	$r = $_GET["r"];
	$id = $_GET["id"]; //funcion para eliminar archivos
mysql_query("UPDATE ticket SET visto = '1' WHERE id='$id'") or die(mysql_error());
	header("Location: $r");		
?>