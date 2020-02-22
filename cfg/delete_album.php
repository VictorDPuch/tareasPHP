<?php

	//Ej. Eliminar archivo ==> href="cfg/delete.php?f='$dir.$file.'&r=../Album/'.$album.'&t=0&id=0"
	
	$f = $_GET['f']; //Carpeta que contine archivos y queremos eliminar 
	$r = $_GET['r']; //Regreso
	
	
	if($f!="0"){

		foreach(glob($f."/*.*") as $archivos_carpeta){  
		 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
		}  
	
		rmdir($f);     
	}
	
	header("Location: $r");		
?>