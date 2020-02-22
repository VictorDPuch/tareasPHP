<?php

	//Ej. Eliminar archivo ==> href="cfg/delete.php?f='$dir.$file.'&r=../Album/'.$album.'&t=0&id=0"
	
	require_once("misc.inc");
	require_once("func.php");
	
	$r = $_GET['r']; //Regreso
	$libro = $_GET['libro']; // ID libro
	
	//Envio Si
		//Insertamos datos en la tabla
			if(isset($_GET['au_correo'])==1){ //Registro autorizado por correo por el administrador
				
				$id = $_GET['id']; // ID del prestamo para autorizar
			
				mysql_query("UPDATE `prestamo` SET `autorizado`='1' WHERE id = '$id' ") or die(mysql_error("Error UPDATE - 1")); //Se autoriza el registro del libro
			
			}else{ // Se crea el registro del prestamo del libro desde la biblioteca
				$user = $_GET['user']; // ID usuario
				
	
				mysql_query("INSERT INTO `prestamo`(`id_libro`,`id_usuario`) VALUES ('$libro','$user')") or die(mysql_error("Error INSERT"));
				
				
				if(mysql_affected_rows() > 0){ //Revisamos que la operación anterior se haya realizado con éxito
					mysql_query("UPDATE `biblioteca` SET `status`='P' WHERE id = '$libro' ") or die(mysql_error("Error UPDATE - 2")); //Colocamos el libro en status como P:PRESTADO
					
					//enviar email
					solicitar_prestamo($user,$libro);	
				}	
				
			}
				
					
		
	header("Location: $r");		// regresamos al punto anterior
?>