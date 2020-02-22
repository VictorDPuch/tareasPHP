<?php

	$host="localhost";
	$user="root";
	$password="";
	$db="tareas_fchsoluciones";
    /*
		$user="ficachi1_tareas";
	$password="ficachitareas";
	$db="ficachi1_tareas";

    */
	@mysql_connect($host,$user,$password);
	@mysql_select_db($db) or die(mysql_error());
	@mysql_query("SET NAMES 'utf8'") or die(mysql_error());
?>
