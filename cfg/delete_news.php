<?php

	
	require_once("misc.inc");
	$r = $_GET['r']; //Regreso
	$id = $_GET['id']; //id
	
	$q = "UPDATE newsletter SET status='1' WHERE id = '$id'";
	mysql_query($q) or die(mysql_error());
	
	
	
	header("Location: $r");		
?>