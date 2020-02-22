<?php
	include("misc.inc");
	
	$return = "../".$_POST["return"];
	$ids = $_POST["check"]; 
	
	foreach($ids as $id){
		//funcion para eliminar archivos
		mysql_query("UPDATE usuario SET status='0' WHERE id='$id'") or die(mysql_error());

	}
	
	header("Location: $return");		
?>