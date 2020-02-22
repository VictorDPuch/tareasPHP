<?php
	require_once("misc.inc");
	$id = $_GET['id'];
	
	//Consultamos nombre de la imagen del perfil
	$q = mysql_query("SELECT imagen FROM usuario WHERE id='$id'") or die(mysql_error());
	
	$img = mysql_fetch_array($q,MYSQL_ASSOC);
	
	//Eliminamos la imagen fisicamente
	$file = "../assets/img/profiles/".$img["imagen"];
	
	unlink($file); //funcion para eliminar archivos
	
	mysql_query("UPDATE usuario SET imagen='' WHERE id='$id'") or die(mysql_error());
	
	
	header("Location: ../perfil.php");		
?>