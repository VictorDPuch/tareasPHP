<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body style="margin:-2px;">

<?php
	require_once("misc.inc");
	require_once("func.php");
	
	//PHPMailer						
	include("../class.phpmailer.php");
	include("../class.smtp.php");
	  
	$q = mysql_query("SELECT * FROM newsletter WHERE status='0'") or die(mysql_error());
	$n = mysql_num_rows($q);
	
	$n = 1; //Variable para testear el codigo
	
	if($n > 0){//Verificamos si existen newsletters pendientes
	
		$q2 = mysql_query("SELECT DISTINCT `email` FROM usuario WHERE emailing = '1' ") or die(mysql_error());
		
		$i = 0;
		
		while($em = mysql_fetch_array($q2, MYSQL_ASSOC)){ //Creamos el array de correos
			$correos[$i] = $em["email"];
			$i++;
		}
				
		
		/*Cargamos los correos alternativos*
		$q3 = mysql_query("SELECT DISTINCT `email_alternativo` FROM usuario WHERE emailing = '1' ") or die(mysql_error());
		
		$ni = mysql_num_rows($q2); //Obtenemos el numero de correos para continuar en la posicion final del array
		$j = $ni;
		
		while($em = mysql_fetch_array($q3, MYSQL_ASSOC)){ //Creamos el array de correos
			$correos_alt[$j] = $em["email_alternativo"];
			$j++;
		}
		
		//$correos2 = email_alternative_array($correos_alt);
		
		/***********************/
		
		//print_r($correos); //TESTER: Imprime un array completo
				
		/*
		foreach($correos as $n){ //TESTER: Mostramos los correos del array
				echo $n."<br>";
		}
		//*/
		
		
		while($row = mysql_fetch_array($q,MYSQL_ASSOC)){ //Se realiza el envio de correos
			$status = newsletter($row["boletin"],$correos); //funcion newsletter( id_boletin, correos )
			//if($status){
				mysql_query("UPDATE newsletter SET status='1', reenvio='0' WHERE boletin='$row[boletin]'") or die("Error: en update newsletter ".mysql_error());
			//}
		}
	
	echo '<table width="100%" align="center" style="margin:0;">
<tr><td bgcolor="#041CAB" style="color:#FFF; font-size:35px; text-align:center; padding:5px; border-bottom: 2px solid #EF7F1A;">Enviando Boletines</td></tr>
<tr><td align="center"><img style="margin-top:20px;" src="progress.gif"></td></tr>
</table>';
				
	}else{
		print('<h1 style="text-align:center;">No hay Boletines Pendientes para enviar</h1>');	
	}
?>



</body>
</html>