<?php
$t = true;

if($t == true){
	$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
	$str_encontrada = strrpos ($url, "Fotogaleria"); //Encuentra la palabra "Fotogaleria" y devuelve true si aparece
	
	$t = false;
}
?>
<script>
	<?php if($str_encontrada == false){ //Se muestra el código siempre y cuando no se encuentre el texto Fotogaleria?>
     var time = new Date().getTime();
	 
     $(document.body).bind("mousemove keypress", function(e) {
         time6789 = new Date().getTime();
     });
	
	<?php } ?>
	
     function refresh() {
         if(new Date().getTime() - time >= 1) 
             window.location.reload(true);
         else 
             setTimeout(refresh, 1);
     }

     setTimeout(refresh, 1);
	 
</script>
<?php
//inicio la sesion


@$s = session_start();

//Compruebo que el usuario ya este autenticado
// y que el tiempo de conexion no haya expirado
@$au = $_SESSION["autentificado"]; 
if ($au != "SI" || !isset($_SESSION["recuerdame"])){
	//si se cumple es que no esta autenticado
	// entonces lo mandamos a que se identifique
	session_destroy();
	//Redirecciona	 
	
	if( isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6') == false) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 5') == false) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 4') == false) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 3') == false) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 2') == false) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 1') == false) && ((strpos($_SERVER['HTTP_USER_AGENT'], 'Edge') == true) || (strpos($_SERVER['HTTP_USER_AGENT'], 'MAARJS') == true) || (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') == true) || (strpos($_SERVER['HTTP_USER_AGENT'], 'AS') == true)   ) ){
		
		echo "<script type='text/javascript'>window.location='../index.php?y=".$url."'</script>"; //Edge, Internet Explorer 
	}else{
		
		echo "<script type='text/javascript'>window.location='index.php?y=".$url."'</script>"; //Safari, Firefox, Chrome, Opera, IE 6,..1
		
	}
	
	
	//echo strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE');
	

}else{
	if($_SESSION["recuerdame"]=="0"){ //Si no esta marcada la opción recordar mi sesión.
		   //sino, es que ya esta autenticado y calculamos el tiempo transcurrido
		   $fechaGuardada = $_SESSION["ultimoacceso"];
		   $ahora = date("G:i");
		   $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
		   //comparamos el tiempo transcurrido
		   if($tiempo_transcurrido >= 7200) { //60 minutos
		  // el tiempo se calcula en segundos, 600 para 10 minutos
		  session_destroy(); // destruyo la sesión
		  
		  echo "<script type='text/javascript'>parent.location='index.php?y=".$url."&opc3';</script>";
	
		/*echo "<script type='text/javascript'>parent.location='index.php?y=".$url."'</script>";*/
		
		 //header("Location: Inicio"); //envío al usuario a la pag. de autenticación
		  //sino, actualizo la fecha de la sesión
		}else {
		  $_SESSION["ultimoAcceso"] = $ahora;
	
	   }
   
	}
} 
	


	
?>
