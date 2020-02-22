<?php
	require_once("cfg/misc.inc");
	$r = $_GET['r'];
	mysql_query("DELETE FROM `catalogo` WHERE id='$_GET[id]'") or die(mysql_error());
	header("Location: $r");		
?>