<?php
	$host="localhost";
	$user="root";
	$password="root";
	$db="up";

	mysql_connect($host,$user,$password);
	mysql_select_db($db);
	mysql_query("SET NAMES 'utf8'");
?>
