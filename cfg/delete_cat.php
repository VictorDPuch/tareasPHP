<?php
	require_once("misc.inc");
	$r = $_GET['r'];
	mysql_query("DELETE FROM `propiedades` WHERE id='$_GET[id]'") or die(mysql_error());
	
	$q = mysql_query("SELECT imagen FROM slide WHERE id_propiedad='$_GET[id]'") or die(mysql_error());
	$imgs = mysql_fetch_array($q, MYSQL_ASSOC);
	
	if(count($imgs)>0){
		foreach($imgs as $n){//Arreglo ubicaciones lo devuelve la funcion moverArchivos en func.php
			$file = "../../despacho/imgprojects/".$n;
			unlink($file); //funcion para eliminar archivos
			
			mysql_query("DELETE FROM slide WHERE imagen='$n' ") or die(mysql_error());	
		}
	}
	
	
	header("Location: $r");		
?>