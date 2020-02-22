<?php
	
	function limpiar_tags($tags){  
			$tags = strip_tags($tags);  
			$tags = stripslashes($tags);  
			$tags = htmlentities($tags);  
			return $tags;  
	}
	
	function analytics(){
		?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-40834559-1', 'auto');
		  ga('send', 'pageview');
		
		</script>
        <?php
	}

	 function selected($v1,$v2){
	 	if($v1==$v2){
				echo "selected";
			}
 	}
	
	
 
	//Cargar multiples archivos, IMPORTANTE el campo input se debe llamar archivo
	function moverArchivos($archivos,$ruta){ //Optimizada para multiples archivos
 
        /**Instrucciones/
        /*la etiqueta form debe tener --enctype="multipart/form-data"-- FORZOSO*/
        /** el nombre del campo input type=file es: archivo[]/
        /* para capturar el campo file se usa $_FILES*/
        /* la funcion devuelve el nombre o nombres de los archivos subidos  */
        /*A veces marca error si el campo input file tiene el parametro required*/
        
    $directorio = $ruta; //ubicacion y nombre del directorio donde se guarda
    $ubicaciones = array();
 
    $extensiones = array('gif','jpg','jpeg','png','GIF','JPG','JPEG','PNG'); //extensiones permitidas
 	$i = 0;
    if (file_exists($directorio) && is_writable($directorio)) { //comprueba si el directorio existe y si es posible escribir
		
        if(isset($archivos["archivo"]["error"])){
 
            foreach ($archivos["archivo"]["error"] as $key => $error) {
				
                if ($error == 0) {
					
                    $trozo = explode(".",$archivos["archivo"]["name"][$key]); //obtenemos la extensión
                    $extension = strtolower(end($trozo)); //la pasamos a minuscula
 					
					
                    foreach($extensiones as $tipo){ //comprobamos que sea una extensión permitida
                        if($tipo == $extension){
                            $valido = true;
							break;
                        }
                        else {
                            $valido = false;
                        }
                    }
 						
						$valido = true;
						
                    if(isset($valido) and $valido === true){ //si el archivo es valido lo intentamos mover
                        $nombre_archivo = date("YmdHis") .$i. ".".$extension; //generamos un nombre personalizable
                        $ubicacion_original = $archivos["archivo"]["tmp_name"][$key]; //ubicacion original y temporal del archivo
 						$i++;
                        if(!move_uploaded_file($ubicacion_original,"$directorio/$nombre_archivo")){
                           aviso("No se puede mover el archivo",3);
							
                        }
                        else{
							
                            $ubicaciones[] = $nombre_archivo;
                        }
                    }
                    else{
                       aviso("Extension de archivo no valida",3);
				    }
                }
                else{
                    if($error != 0 and $error != 4){ //Si no subieron archivos No enviar ninguna advertencia
                        $mensaje_error = mensajesErrorArchivos($archivos["archivo"]["error"][$key]);
                        
                        aviso("Intente nuevamente",3);
	
                    }
                }
            }
           
        } //fin del existe error
        else { 
		 
				aviso(" Uno de los archivos sobrepasa la capacidad establecida por el servidor",2);
		}
    }
    else {
		aviso("No existe la carpeta para subir archivos o no tiene los permisos suficientes",3);
		
    }
         return $ubicaciones;
} // Termina la funcion moverArchivos()


//sustituye la imagen con el nombre proporcionado, el campo input se debe llamar archivo
	function moverArchivosNombre($archivos,$nombre,$ruta){ //Optimizada para multiples archivos
 
    $directorio = $ruta; //ubicacion y nombre del directorio donde se guarda
    $ubicaciones = array();//array resultado de los nombres de las imagenes
 
    //$extensiones = array('gif','jpg','jpe','jpeg','png'); //extensiones permitidas
 	//asigna un numero consecutivo al nuevo nombre de cada imagen
    if (file_exists($directorio) && is_writable($directorio)) { //comprueba si el directorio existe y si es posible escribir
		
        if(isset($archivos["archivo"]["error"])){
 
            foreach ($archivos["archivo"]["error"] as $key => $error) {
				
                if ($error == 0) {
					
                   /* $trozo = explode(".",$archivos["archivo"]["name"][$key]); //obtenemos la extensión
                    $extension = strtolower(end($trozo)); //la pasamos a minuscula
 					
					
					/*
                    foreach($extensiones as $tipo){ //comprobamos que sea una extensión permitida
                        if($tipo == $extension){
                            $valido = true;
							break;
                        }
                        else {
                            $valido = false;
                        }
                    }*/
 						
					$valido = true;
						
                    if(isset($valido) && $valido === true){ //si el archivo es valido lo intentamos mover
                        //$nombre_archivo = $nombre. ".".$extension; //generamos un nombre personalizable
						 $nombre_archivo = $nombre; //generamos un nombre personalizable
                        $ubicacion_original = $archivos["archivo"]["tmp_name"][$key]; //ubicacion original y temporal del archivo
 						
                        if(!move_uploaded_file($ubicacion_original,"$directorio/$nombre_archivo")){
                           
							?><ul class="message error grid_12">
                                <li><strong>Error!</strong>, <?php  echo "No se puede mover el archivo \n"; ?></li>
                                <li class="close-bt"></li>
                            </ul>
                            <?php
                        }
                        else{
							
							
                            $ubicaciones[] = $nombre_archivo;
						
							
							
                        }
                    }
                    else{
                       
						?><ul class="message error grid_12">
                                <li><strong>Error!</strong>, <?php  echo "Extension de archivo no valida \n"; ?></li>
                                <li class="close-bt"></li>
                            </ul>
                            <?php
                    }
                }
                else{
                    if($error != 0 and $error != 4){ //Si no subieron archivos No enviar ninguna advertencia
                        $mensaje_error = mensajesErrorArchivos($archivos["archivo"]["error"][$key]);
                        
						?> <ul class="message error grid_12">
                            <li><strong>Error!</strong>, <?php echo $mensaje_error." Intente nuevamente. \n"; ?></li>
                            <li class="close-bt"></li>
                       		</ul>
                         <?php
                        die;
                    }
                }
            }
            return $ubicaciones;
        } //fin del existe error
        else { 
		 
						?> <ul class="message error grid_12" style="position:absolute; z-index:100;">
                            <li><strong>Error!</strong> uno de los archivos sobrepasa la capacidad establecida por el servidor</li>
                            <li class="close-bt"></li>
                       		</ul>
                         <?php
		}
    }
    else {
		
		?> <ul class="message error grid_12" style="position:absolute; z-index:100;">
                            <li><strong>Error!</strong>, <?php echo $mensaje_error." No existe la carpeta para subir archivos o no tiene los permisos suficientes"; ?></li>
                            <li class="close-bt"></li>
                       		</ul>
                         <?php
    }
} // Termina la funcion moverArchivos()


function mensajesErrorArchivos($error_code) { //Mensajes Personalizados
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'El archivo excede el limite permitido por la directiva de PHP';
        case UPLOAD_ERR_FORM_SIZE:
            return 'El archivo excede el limite permitido por la directiva de HTML';
        case UPLOAD_ERR_PARTIAL:
            return 'El archivo solo se subio parcialmente, intentelo de nuevo';
        case UPLOAD_ERR_NO_FILE:
            return 'No hay archivo que subir';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'El folder temporal no existe';
        case UPLOAD_ERR_CANT_WRITE:
            return 'No tiene permisos para grabar archivos en el disco';
        case UPLOAD_ERR_EXTENSION:
            return 'El archivo tiene una extensión NO permitida';
        default:
            return 'Error desconocido al subir el archivo';
    }
} // Termina funcion mensajesErrorArchivos

function acceso($tipo,$icon=0){

    switch($tipo){
        case 1:
            $img = '<div class="status-icon red"></div> ';
			$tipo = "Super Admin";
            break;
        case 2:
            $img = '<div class="status-icon yellow"></div> ';
			$tipo = "Administrador";
            break;
		case 3:
            $img = '<div class="status-icon blue"></div> ';
			$tipo = "Colaborador";
            break;
		case 4:
            $img = '<div class="status-icon green"></div> ';
			$tipo = "Cliente";
            break;
		default:
			 $img = '<div class="status-icon grey"></div> ';
			 $tipo = "Invitado";
            break;
    
    }
	
	if($icon=="1"){
		$access = $img;
		}else{
			$access = $img." ".$tipo;	
		}
    
echo $access;
}

function perfil($id){
    $q = mysql_query("SELECT imagen, genero FROM usuario WHERE id='$id'") or die(mysql_error());
    $img = mysql_fetch_array($q,MYSQL_ASSOC);
   
    if($img["imagen"]!=NULL){
        $imagen = "assets/img/profiles/".$img["imagen"];
    }else{//No hay imagen registrada, se toma el sexo para imagen predeterminada
        switch($img["genero"]){
        
            case "H":
            $imagen = "assets/img/profiles/man.gif";
            break;
        
            case "M":
            $imagen = "assets/img/profiles/woman.gif";
            break;
            
            default:
            $imagen = "assets/img/profiles/man.gif";
        }
    }
    
    
    echo $imagen;
 }//foto perfil -->
    

function size($path, $formated = true, $retstring = null){
    if(!is_dir($path) || !is_readable($path)){
        if(is_file($path) || file_exists($path)){
            $size = filesize($path);
        } else {
            return false;
        }
    }else {
        $path_stack[] = $path;
        $size = 0;
         
        do {
            $path   = array_shift($path_stack);
            $handle = opendir($path);
            while(false !== ($file = readdir($handle))) {
                if($file != '.' && $file != '..' && is_readable($path . DIRECTORY_SEPARATOR . $file)) {
                    if(is_dir($path . DIRECTORY_SEPARATOR . $file)){ $path_stack[] = $path . DIRECTORY_SEPARATOR . $file; }
                    $size += filesize($path . DIRECTORY_SEPARATOR . $file);
                }
            }
            closedir($handle);
        } while (count($path_stack) > 0);
    }
    if($formated){
        $sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        if($retstring == null) { $retstring = '%01.2f %s'; }
        $lastsizestring = end($sizes);
        foreach($sizes as $sizestring){
            if($size < 1024){ break; }
            if($sizestring != $lastsizestring){ $size /= 1024; }
        }
        if($sizestring == $sizes[0]){ $retstring = '%01d %s'; } // los Bytes normalmente no son fraccionales
        $size = sprintf($retstring, $size, $sizestring);
    }
    return $size;
}
    
//funcion informacion de carpeta
function info_box($titulo,$carpeta,$color){//blue, red, purple, green
?>
       
		<div class="col-md-6  spacing-bottom-sm spacing-bottom">	
		<div class="tiles <?php echo $color; ?> added-margin">
		<div class="tiles-body"><div class="tiles-title"><?php echo $titulo; ?></div>	
		<div class="heading">
		<span class="animate-number" data-value="<?php
$total_imagenes = count(glob("$carpeta{*.jpg,*.gif,*.png,*.jpeg,*.JPG,*.GIF,*.PNG,*.JPEG}",GLOB_BRACE));
        
echo $total_imagenes;?>" data-animation-duration="1200">0</span> archivos</div>
	<div class="progress transparent progress-small no-radius">
	<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="<?php porcentaje(100,$total_imagenes,2); ?>"></div></div>					
	<div class="description"><i style="font-size: 14px;" class="fa fa-folder-open"></i><span class="text-white mini-description "><span class="blend">&nbsp;<strong>Tamaño</strong>&nbsp;
        
        <?php     
  

//------ archivos -----------------------   
        
echo size($carpeta);
    
//--------------archivos-----------
        ?>
        </span></span></div></div></div></div>

<?php         
}

//funcion para mostrar porcentaje de info_box
function porcentaje($cantidad,$porciento,$decimales){
echo number_format($cantidad*$porciento/100 ,$decimales);
}


//Funcion para mostrar mensajes de avisos
function aviso($men,$tipo){//1: exito, 2: aviso, 3: error
    
    switch($tipo){
    case 1:
        $titulo = "Éxito!";
        $alert = "alert-success";
        break;
    case 2:
        $titulo = "Aviso!";
        $alert = "alert-warning";
        break;
    case 3:
        $titulo = "Error!";
        $alert = "alert-error";
        break;
    }
    ?>

 <div style="position: absolute; width:250px; margin-left: 40%; margin-right: auto; margin-top:15%; z-index:200;" class="alert alert-block <?php echo $alert; ?> fade in">
  <button type="button" class="close" data-dismiss="alert"></button>
  <h4 class="alert-heading"><i class="icon-warning-sign"></i><?php echo $titulo; ?></h4>
  <p><?php echo $men; ?></p>
 </div>
<?php
}



function atajo($titulo,$link,$opcion,$color,$icon){
    ?>
				  <div class="col-md-4 white col-sm-4" style="margin-bottom: 20px;" >
                    <a href="<?php echo $link; ?>">
					<div class="tiles <?php echo $color; ?> added-margin" style="max-height:145px">
                        
						<div class="tiles-body">
														
								<span class="text-white " style="font-size: 70px;">
									
									<i class="fa <?php echo $icon; ?>"></i>
                                   
								</span>
                            <span style="font-size: 40px; color: #FFF;"><?php echo $titulo; ?></span>
                            <div class="blog-post-controls-wrapper">
										<div class="blog-post-control">
											<a class="text-white" href="<?php echo $link; ?>"><i class="icon-heart"></i>Acceso Directo</a>
										</div>
									</div>	
								<br>
						</div>	
						
					</div>	
                    </a>
					<div class="tiles white added-margin">
						<a href="<?php echo $link; ?>">
                        <div class="tiles-body">	
						 <div class="row">
							<div class="user-comment-wrapper col-mid-12">
								
								<div class="comment">
									<div class="user-name">
									<span class="semi-bold"><?php echo $opcion; ?></span>
									</div>	
								</div>
								
							<div class="clearfix"></div>
							</div>
						</div>						
						</div>	
                            </a>
					</div>				
				</div>
               
<?php
}
		

//funcion para mostrar peso de archivos
function tamano_archivo($peso , $decimales = 2 ) {
$clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
}

function max_files($n=0){
	$max_upload = (int)(ini_get('upload_max_filesize'));
	$max_post = (int)(ini_get('post_max_size'));
	$memory_limit = (int)(ini_get('memory_limit'));
	$upload_mb = min($max_upload, $max_post, $memory_limit);
 	
	if($n=="0"){
		echo "Tamaño maximo permitido <strong>$upload_mb MB</strong>";
	}else{
		echo "Tamaño maximo permitido $upload_mb MB";
	}
}
//Funcion enviar correo a soporte por algun error

function enviar_ticket($from,$nombre,$asunto,$info){

		$nombre = html_entity_decode(limpiar_tags($nombre));
		$asunto = html_entity_decode(limpiar_tags($asunto));
		$info = html_entity_decode(limpiar_tags($info));
		
		/* Datos de ajustes*/
		$ajus = mysql_query("SELECT * FROM ajustes WHERE id='1'") or die(mysql_error());
		$row = mysql_fetch_array($ajus, MYSQL_ASSOC);
												   
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		
		// Cabeceras adicionales
		$cabeceras .= 'To: Soporte FCH Web  <'.$row["email_soporte"].'>' . "\r\n";
		//$cabeceras .= "BCC: oficachi@ficachi.com.mx, mhernandez@ficachi.com.mx\r\n";
		
		$cabeceras .= 'From: '.$from.' <'.$from.'>' . "\r\n";
		
		
		//PHPMailer
		include("cfg/misc.inc");//Se incluye archivo de conexion							
		include("class.phpmailer.php");
		include("class.smtp.php");
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		//$mail->SMTPSecure = "ssl";
		$mail->Host = $row["servidor_smtp"];
		$mail->Port = $row["puerto"];
		$mail->Username = $row["usuario"];
		$mail->Password = $row["password"];					
		$mail->From = $from;
		$mail->FromName = $nombre;
		$mail->Subject = $asunto;
		
		$mensaje = '<table width="100%" border="0" align="center" cellspacing="0" cellpadding="10" bgcolor="#FFFFFF">
<tr>
    <td><table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
     <!-- logo area start -->
                                <tr>
                                  <td><table width="100%" border="0" align="center" cellspacing="0" cellpadding="20" bgcolor="#0059A5">
                                      <tr>
                                     
                                        <td align="center"   style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:24px; line-height:32px; color:#FFFFFF;"><strong>Reporte </strong><span> de Error</span></td>
                                        
                                      </tr>
                                    </table></td>
                                </tr>
                                <!-- logo area end -->
        <tr>
          <td><table  border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" width="90%">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                     
                      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
                          <!--==============header area start here===============-->
                          <tr>
                            <td valign="top"><table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
                               
                                <tr>
                                  <td valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF">
                                                                            
                                      <tr>
                                        <td style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#727272; padding-top:6px;">El usuario <strong>'.$nombre.'</strong> reporta <strong>'.$asunto.'</strong>.
                                        </td>
                                      </tr>
                                      
                                      <tr>
                                      <td><br></td>
                                      </tr>
                                      <tr><td align="left">
                                      <strong>Descripción</strong>
                                      </td></tr>
                                      <tr>
                                        <td>
                                       </td>
                                </tr>
                                <!-- banner text1 area end -->
                              </table></td>
                          </tr>
                          <!--==============header area end here===============--> 
                          <!--==============contant area start here===============-->
                          <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <!--==============area_1 start here===============-->
                                <tr>
                                  <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
                                      <!--==============level_1 start here===============-->
                                      <tr>
                                        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td><table width="100%" align="center" border="0" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF">
                                                  <tr>
                                                    <td valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
                                                        <tr>
                                                          <td style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#727272;">'.$info.'.</td>
                                                        </tr>
                                                        <tr>
                                                        <td><br></td>
                                                        </tr>
                                                       
                                                        <tr>
                                                          <td>
                                                          
                                                          </td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                           
                                            <tr>
                                            <td>
                                            
                                            
                                            </td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                     
                                     
                                   
                                    </table></td>
                                </tr>
                               
                              </table></td>
                          </tr>
                         
                         
                          <!--==============footer area end here===============-->
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <!--copy right text start-->
        <tr>
          <td valign="top" bgcolor="#ededed"></td>
        </tr>
        <!--copy right text end-->
      </table></td>
  </tr>
  <tr><td>
  <table width="100%" border="0" bgcolor="#ededed" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" height="15"></td>
              </tr>
              
              <tr>
              
              <td align="left" rowspan="2" ><a href="'.$row["url_absoluta"].'" target="_blank"><img style="height:40px; width:167px;" src="'.$row["url_logo"].'"  alt="logo ficachi" ></a></td>
              
              <td   colspan="2" align="right" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#000000;"><strong>Pizarro No. 41</strong> Fracc. Reforma C.P. 91919&nbsp;&nbsp;</td>
              </tr>
              
                <tr>
                
                <td  align="right" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:10px; line-height:20px; color:#000000;"><span><strong>Veracruz, Ver. M&eacute;xico</strong> Tel./Fax: <strong>+52 (229) 923 5700</strong></span>&nbsp;&nbsp;</td>
              </tr>
              <tr><td colspan="2" height="15"></td></tr>
              <tr>
                <td colspan="2" align="center" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:10px; line-height:18px; color:#999999;"><strong>&copy; 2015 - Ficachi Consultores, S.C. Todos los derechos reservados.</strong></td>
              </tr>
              <tr>
                <td colspan="2" height="5"></td>
              </tr>
            </table>
  </td></tr>
  <tr><td height="5"></td></tr>
  <tr>
  <td align="center" ><br><span style="font-size:10px; padding:5px; color:#999999">Este mensaje se dirige exclusivamente al destinatario referenciado. Si usted no lo es y lo ha recibido por error, proceda a borrarlo, y que en todo caso se abstenga de utilizar, reproducir, alterar, archivar o comunicar a terceros el presente mensaje y ficheros anexos.<br/>
<strong>AVISO DE PRIVACIDAD.-</strong> Ficachi y Asociados, S.C., con domicilio en  Pizarro No. 41 Fraccionamiento Reforma en la ciudad de Veracruz, Ver., C.P. 91919 es el responsable del tratamiento de sus datos personales, datos personales sensibles, datos financieros o patrimoniales, que en su caso le sean proporcionados.  Para mayor informaci&oacute;n en relaci&oacute;n con el aviso de privacidad aqu&iacute; mencionado, sus derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n, oposici&oacute;n y limitaci&oacute;n del uso o divulgaci&oacute;n de los datos, la revocaci&oacute;n de su consentimiento, as&iacute; como para conocer las posibles transferencias de informaci&oacute;n que se podr&aacute;n llevar a cabo y cambios a dicho aviso, puede acceder a nuestro aviso de privacidad integral a trav&eacute;s de la p&aacute;gina de internet: Ficachi y Asociados S.C.</span></td>
  </tr>
</table>';

		$mail->AltBody = $mensaje;
		$mail->MsgHTML($mensaje);
		
		$mail->AddAddress($row["email_soporte"]);
		$mail->IsHTML(true);
		// Activo condificacción utf-8
		$mail->CharSet = 'UTF-8';		
							
		if($row["envio_correo"]=="2"){		
			$status = mail($row["email_soporte"], $asunto, $mensaje, $cabeceras);
		}else{
			$status = $mail->Send(); 
			}
		//echo "From: ".$from;
		//echo $mail->ErrorInfo;			   
		return $status;
}

function recuperar_acceso($email,$acceso){	
	
		/* Datos de ajustes*/
		$ajus = mysql_query("SELECT * FROM ajustes WHERE id='1'") or die(mysql_error());
		$row = mysql_fetch_array($ajus, MYSQL_ASSOC);
												   
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		
		// Cabeceras adicionales
		$cabeceras .= 'To: Recuperar Acceso - FCH Web  <'.$email.'>' . "\r\n";
		//$cabeceras .= "BCC: oficachi@ficachi.com.mx, mhernandez@ficachi.com.mx\r\n";
		
		$cabeceras .= 'From: Soporte FCH Web <'.$row["usuario"].'>'."\r\n";
		
		
		//PHPMailer
		include("cfg/misc.inc");//Se incluye archivo de conexion							
		include("class.phpmailer.php");
		include("class.smtp.php");
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		//$mail->SMTPSecure = "ssl";
		$mail->Host = $row["servidor_smtp"];
		$mail->Port = $row["puerto"];
		$mail->Username = $row["usuario"];
		$mail->Password = $row["password"];					
		$mail->From = $row["usuario"];
		$mail->FromName = "Soporte FCH Web";
		$mail->Subject = "Recuperar Acceso - FCH Web";
		
		$mensaje = '<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#FFFFFF">
  <tr>
    <td><table bgcolor="#FFFFFF" width="100%" border="0" cellspacing="0" cellpadding="0">
        <!-- logo area start -->
                                <tr>
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="20" bgcolor="#0059A5">
                                      <tr>
                                     
                                        <td align="center"   style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:24px; line-height:32px; color:#FFFFFF;"><strong>Recuperar</strong><span> Acceso</span></td>
                                        
                                      </tr>
                                    </table></td>
                                </tr>
                                <!-- logo area end -->
        <tr>
          <td><table bgcolor="#FFFFFF" border="0" cellspacing="0" width="90%" cellpadding="5" align="center" >
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
              
                    <tr>
                     
                      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
                          <!--==============header area start here===============-->
                         
                          <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
                              
                                
                                <!-- banner text1 area start -->
                                <tr>
                                  <td valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            
                                      <tr>
                                        <td style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#727272; padding-top:6px; text-align:center;">Solicit&oacute; restablecer su contrase&ntilde;a de acceso a <strong>FCH</strong> Web del sitio web <strong>ficachi.com.mx</strong>.<br/>Si esta solicitud es correcta, haga clic en el siguiente enlace para crear una <strong>contrase&ntilde;a nueva</strong>.
                                        </td>
                                      </tr>
                                      
                                      <tr>
                                      <td><br><br></td>
                                      </tr>
                                      <tr><td align="center"><a style="background-color:#EF781F; color:#FFF; text-decoration:none; border-radius:5px; padding:10px; border: 2px solid #DB700F;" href="'.$row["url_absoluta"].'/mipanel/acceso.php?id='.$acceso.'">Restablecer Contrase&ntilde;a</a></td></tr>
                                      <tr>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="456" ></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                                <!-- banner text1 area end -->
                              </table></td>
                          </tr>
                          <!--==============header area end here===============--> 
                          <!--==============contant area start here===============-->
                          <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <!--==============area_1 start here===============-->
                                <tr>
                                  <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <!--==============level_1 start here===============-->
                                      <tr>
                                        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td height="25"></td>
                                            </tr>
                                            <tr>
                                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td height="6"></td>
                                                        </tr>
                                                        <tr>
                                                          <td style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#727272; text-align:center;">Si  no solicit&oacute; recuperar el acceso, haga caso omiso a este correo.</td>
                                                        </tr>
                                                        <tr>
                                                        <td><br></td>
                                                        </tr>
                                                       
                                                        <tr>
                                                          <td>
                                                          
                                                          </td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                           
                                            <tr>
                                            <td>
                                            
                                            
                                            </td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                     
                                     
                                   
                                    </table></td>
                                </tr>
                               
                              </table></td>
                          </tr>
                         
                         
                          <!--==============footer area end here===============-->
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <!--copy right text start-->
        <tr>
          <td valign="top" bgcolor="#ededed"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" height="15"></td>
              </tr>
              
              <tr>
              
              <td align="left" rowspan="2" ><a href="'.$row["url_absoluta"].'" target="_blank"><img style="height:40px; width:167px;" src="'.$row["url_logo"].'"  alt="logo ficachi" ></a></td>
              
              <td colspan="2" align="right" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#000000;"><strong>Pizarro No. 41</strong> Fracc. Reforma C.P. 91919&nbsp;&nbsp;</td>
              </tr>
              
                <tr>
                
                <td  align="right" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:10px; line-height:20px; color:#000000;"><span><strong>Veracruz, Ver. M&eacute;xico</strong> Tel./Fax: <strong>+52 (229) 923 5700</strong></span>&nbsp;&nbsp;</td>
              </tr>
              <tr><td colspan="2" height="15"></td></tr>
              <tr>
                <td colspan="2" align="center" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:10px; line-height:18px; color:#999999;"><strong>&copy; 2015 - Ficachi Consultores, S.C. Todos los derechos reservados.</strong></td>
              </tr>
              <tr>
                <td colspan="2" height="5"></td>
              </tr>
            </table></td>
        </tr>
        <!--copy right text end-->
      </table></td>
  </tr>
  <tr><td height="5"></td></tr>
  <tr>
  <td align="center"  ><span style="font-size:10px; padding:5px; color:#999999; text-align:center;" >Este mensaje se dirige exclusivamente al destinatario referenciado. Si usted no lo es y lo ha recibido por error, proceda a borrarlo, y que en todo caso se abstenga de utilizar, reproducir, alterar, archivar o comunicar a terceros el presente mensaje y ficheros anexos.<br/>
<strong>AVISO DE PRIVACIDAD.-</strong> Ficachi y Asociados, S.C., con domicilio en  Pizarro No. 41 Fraccionamiento Reforma en la ciudad de Veracruz, Ver., C.P. 91919 es el responsable del tratamiento de sus datos personales, datos personales sensibles, datos financieros o patrimoniales, que en su caso le sean proporcionados.  Para mayor informaci&oacute;n en relaci&oacute;n con el aviso de privacidad aqu&iacute; mencionado, sus derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n, oposici&oacute;n y limitaci&oacute;n del uso o divulgaci&oacute;n de los datos, la revocaci&oacute;n de su consentimiento, as&iacute; como para conocer las posibles transferencias de informaci&oacute;n que se podr&aacute;n llevar a cabo y cambios a dicho aviso, puede acceder a nuestro aviso de privacidad integral a trav&eacute;s de la p&aacute;gina de internet: Ficachi y Asociados S.C.</span></td>
  </tr>
</table>';

		$mail->AltBody = $mensaje;
		$mail->MsgHTML($mensaje);
		
		$mail->AddAddress($email);
		$mail->IsHTML(true);
		// Activo condificacción utf-8
		$mail->CharSet = 'UTF-8';		
							
		if($row["envio_correo"]=="2"){		
			$status = mail($email, $asunto, $mensaje, $cabeceras);
		}else{
			$status = $mail->Send(); 
			}
			
		//echo $mail->ErrorInfo;	
					   
		return $status;
}
	
function contacto($from,$nombre,$info,$telefono,$telefono2="s/n",$correos,$nom_recom="s/n",$emp_recom="s/n",$horario){	
	$asunto = "Solicitud de Informes - Web Ficachi";
		$from = limpiar_tags($from);
		$nombre = html_entity_decode(limpiar_tags($nombre));
		
		if(empty($tel2)){$tel2 = "s/n";}else{$tel2 = limpiar_tags($telefono2);}
		if(empty($nom_recom)){$nom_recom = "s/n";}else{$nom_recom = limpiar_tags($nom_recom);}
		if(empty($emp_recom)){$emp_recom = "s/n";}else{$emp_recom = limpiar_tags($emp_recom);}
		
		$tel1 = limpiar_tags($telefono);
		$horario = limpiar_tags($horario);
		$info = html_entity_decode(limpiar_tags($info));
		
		$to = "";
		foreach($correos as $n){
		  $to .= $n.", ";
		}
		
		$cco = array("oficachi@ficachi.com.mx", "mhernandez@ficachi.com.mx");
		
		include("mipanel/cfg/misc.inc");//Se incluye archivo de conexion	
		 
		/* Datos de ajustes*/
		$ajus = mysql_query("SELECT * FROM ajustes WHERE id='1'") or die(mysql_error());
		$row = mysql_fetch_array($ajus, MYSQL_ASSOC);
						
						   
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		
		// Cabeceras adicionales
		$cabeceras .= 'To: Contacto Web Ficachi <'.$to.'>' . "\r\n";
		$cabeceras .= "BCC: oficachi@ficachi.com.mx, mhernandez@ficachi.com.mx\r\n";
		//$cabeceras .= "BCC: sistemas@upmarketingstudio.com\r\n";
		
		$cabeceras .= 'From: '.$nombre.' <'.$from.'>' . "\r\n";
		
		//PHPMailer
								
		include("mipanel/class.phpmailer.php");
		include("mipanel/class.smtp.php");
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		//$mail->SMTPSecure = "ssl";
		$mail->Host = $row["servidor_smtp"];
		$mail->Port = $row["puerto"];
		$mail->Username = $row["usuario"];
		$mail->Password = $row["password"];					
		$mail->From = $from;
		$mail->FromName = $nombre;
		$mail->Subject = $asunto;
		
		$mensaje = '<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#FFFFFF" align="center">
  <tr>
  
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
    <!-- logo area start -->
                               
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="20" bgcolor="#0059A5">
                                      <tr>
                                     
                                        <td align="center"  style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:24px; line-height:32px; color:#FFFFFF;"><span>Solicitud de <strong>Informes</strong></span></td>
                                        
                                      </tr>
                                    </table></td>
                               
                                <!-- logo area end -->
        <tr>
          <td><table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" align="center" width="90%" >
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                     
                      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
                          <!--==============header area start here===============-->
                          <tr>
                            <td valign="top"><table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
                                
                                <!-- banner text1 area start -->
                                <tr>
                                  <td valign="top" ><table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" align="center" cellpadding="5">
                                                                            
                                      <tr>
                                        <td width="30%"><strong>Nombre</strong>
                                        </td>
                                        <td width="30%"><strong>Email</strong>
                                        </td>
                                        <td width="20%"><strong>Teléfono</strong>
                                        </td>
                                        <td width="20%"><strong>Teléfono 2</strong>
                                        </td>
                                      </tr>
                                      
                                      <tr bgcolor="#ededed">
                                        <td><span style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#727272;">'.$nombre.'</span></td>
                                        <td><span style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#727272;">'.$from.'</span></td>
                                        <td><span style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#727272;">'.$tel1.'</span></td>
                                        <td><span style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#727272;">'.$tel2.'</span></td>
                                      </tr>
                                      
                                     
                                    </table></td>
                                </tr>
                                <!-- banner text1 area end -->
                              </table></td>
                          </tr>
                          <!--==============header area end here===============--> 
                          <!--==============contant area start here===============-->
                          <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <!--==============area_1 start here===============-->
                                <tr>
                                  <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <!--==============level_1 start here===============-->
                                      <tr>
                                        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                                            <tr>
                                              <td><strong>Horario de contacto:</strong> '.$horario.'</td>
                                            </tr>
                                            <tr>
                                              <td style="padding:0px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF">
                                                        <tr>
                                                          <td height="10" colspan="4"></td>
                                                        </tr>
                                                        <tr bgcolor="#ededed">
                                                          <td><strong>Recomendado por:</strong></td>
  <td >'.$nom_recom.'</td>
  <td><strong>Empresa:</strong></td>
  <td >'.$emp_recom.'</td>                                                     </tr>
                                                        <tr>
                                                        <td colspan="4" height="10"></td>
                                                        </tr>
                                                       
                                                        <tr>
                                                          <td colspan="4" align="left"><strong>Mensaje</strong>
                                                          
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                        <td>
                                                        </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        <td colspan="4">'.$info.'</td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                           
                                            <tr>
                                            <td>
                                            
                                            
                                            </td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                     
                                     
                                   
                                    </table></td>
                                </tr>
                               
                              </table></td>
                          </tr>
                         
                         
                          <!--==============footer area end here===============-->
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <!--copy right text start-->
        <tr>
          <td valign="top" bgcolor="#ededed"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" height="15"></td>
              </tr>
              
              <tr>
              
              <td align="left" rowspan="2" ><a href="'.$row["url_absoluta"].'" target="_blank"><img style="height:40px; width:167px;" src="'.$row["url_logo"].'"  alt="logo ficachi" ></a></td>
              
              <td   colspan="2" align="right" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#000000;"><strong>Pizarro No. 41</strong> Fracc. Reforma C.P. 91919&nbsp;&nbsp;</td>
              </tr>
              
                <tr>
                
                <td  align="right" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:10px; line-height:20px; color:#000000;"><span><strong>Veracruz, Ver. M&eacute;xico</strong> Tel./Fax: <strong>+52 (229) 923 5700</strong></span>&nbsp;&nbsp;</td>
              </tr>
              <tr><td colspan="2" height="15"></td></tr>
              <tr>
                <td colspan="2" align="center" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:10px; line-height:18px; color:#999999;"><strong>&copy; 2015 - Ficachi Consultores, S.C. Todos los derechos reservados.</strong></td>
              </tr>
              <tr>
                <td colspan="2" height="5"></td>
              </tr>
            </table></td>
        </tr>
        <!--copy right text end-->
      </table></td>
  </tr>
  <tr><td height="5"></td></tr>
  <tr>
  <td align="center" ><span style="font-size:10px; padding:5px; color:#999999">Este mensaje se dirige exclusivamente al destinatario referenciado. Si usted no lo es y lo ha recibido por error, proceda a borrarlo, y que en todo caso se abstenga de utilizar, reproducir, alterar, archivar o comunicar a terceros el presente mensaje y ficheros anexos.<br/>
<strong>AVISO DE PRIVACIDAD.-</strong> Ficachi y Asociados, S.C., con domicilio en  Pizarro No. 41 Fraccionamiento Reforma en la ciudad de Veracruz, Ver., C.P. 91919 es el responsable del tratamiento de sus datos personales, datos personales sensibles, datos financieros o patrimoniales, que en su caso le sean proporcionados.  Para mayor informaci&oacute;n en relaci&oacute;n con el aviso de privacidad aqu&iacute; mencionado, sus derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n, oposici&oacute;n y limitaci&oacute;n del uso o divulgaci&oacute;n de los datos, la revocaci&oacute;n de su consentimiento, as&iacute; como para conocer las posibles transferencias de informaci&oacute;n que se podr&aacute;n llevar a cabo y cambios a dicho aviso, puede acceder a nuestro aviso de privacidad integral a trav&eacute;s de la p&aacute;gina de internet: Ficachi y Asociados S.C.</span></td>
  </tr>
</table>';
		
		$mail->AltBody = $mensaje;
		$mail->MsgHTML($mensaje);
		
		foreach($correos as $para){
		  $mail->AddAddress($para);
	    }
		
		foreach($cco as $n){
		  $mail->AddBCC($n);
	    }
		 
		$mail->IsHTML(true);
		// Activo condificacción utf-8
		$mail->CharSet = 'UTF-8';		
							
		if($row["envio_correo"]=="2"){		
			$status = mail($to, $asunto, $mensaje, $cabeceras);
		}else{
			$status = $mail->Send(); 
			//echo $mail->ErrorInfo;
		}	
		
			   
return $status;
}

function newsletter($boletin, $correos){
	  
	  /* Datos de ajustes*/
	  $ajus = mysql_query("SELECT * FROM ajustes WHERE id='1'") or die(mysql_error());
	  $row = mysql_fetch_array($ajus, MYSQL_ASSOC);
	  
	   /* Datos del Boletín*/
	  $bol = mysql_query("SELECT titulo, numero, anio, contenido FROM boletines WHERE id='$boletin'") or die(mysql_error());
	  $row_boletin = mysql_fetch_array($bol, MYSQL_ASSOC);
		
	  $mail = new PHPMailer();
	  $mail->IsSMTP();
	  $mail->SMTPAuth = true;
	  //$mail->SMTPSecure = "ssl";
	  $mail->Host = $row["servidor_smtp"];
	  $mail->Port = $row["puerto"];
	  $mail->Username = $row["usuario"];
	  $mail->Password = $row["password"];					
	  $mail->From = "info@ficachi.com.mx";
	  $mail->FromName = "Boletines - Ficachi Consultores";
	  $mail->Subject = "Nuevo Boletín ".$row_boletin["numero"]."/".$row_boletin["anio"]." - Ficachi Consultores";
	  
	  $mensaje = '<table width="100%" align="center" border="0" cellspacing="0" cellpadding="10" bgcolor="#FFFFFF">
   <!-- logo area start -->
                                <tr>
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="20" align="center" bgcolor="#0059A5">
                                      <tr>
                                     
                                        <td >
                                        <span style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:15px; line-height:32px; color:#FFFFFF; text-align:left;"><strong>Bolet&iacute;n </strong>'.$row_boletin["numero"].'/'.$row_boletin["anio"].'</span><br>
                                        <strong style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:20px; line-height:20px; color:#FFFFFF; padding-top:6px; text-align:center">'.$row_boletin["titulo"].'</strong>
                                        </td>
                                        
                                      </tr>
                                       
                                    </table></td>
                                </tr>
                                <!-- logo area end -->
          <tr>
          <tr>
    <td><table width="100%" align="center" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
        
          <td><table  border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
          
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                    <tr>
                     
                      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
                          <!--==============header area start here===============-->
                          <tr>
                            <td valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" align="center">
                                                             
                               
                                <!-- banner text1 area start -->
                                <tr>
                                  <td valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
                                     
                                      <tr><td align="left">'.html_entity_decode(addslashes($row_boletin["contenido"])).'</td></tr>
                                      <tr>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
                                           
                                          </table></td>
                                      </tr>
                                    </table></td>
                                </tr>
                                <!-- banner text1 area end -->
                              </table></td>
                          </tr>
                          <!--==============header area end here===============--> 
                          <!--==============contant area start here===============-->
                          <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                                <!--==============area_1 start here===============-->
                                <tr>
                                  <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
                                      <!--==============level_1 start here===============-->
                                      <tr>
                                        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
                                            <tr>
                                              <td height="25"></td>
                                            </tr>
                                            <tr>
                                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                                                  <tr>
                                                    <td valign="top" ><table width="100%" border="0" bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="5">
                                                        <tr>
                                                          <td height="6"></td>
                                                        </tr>
                                                        <tr>
                                                          <td>
                                                          · <a style="color:#EF781F; text-align: center;" title="Ver Boletín Completo" href="'.$row["url_absoluta"].'/mipanel"> Ver en <strong>FCH</strong>Web</a>
                                                          </td>
                                                          <td>
                                                          · <a style="color:#EF781F; text-align: center;" title="Boletines Anteriores" href="'.$row["url_absoluta"].'/mipanel"> Boletines Anteriores</a>
                                                          </td>
                                                           <td>
                                                          · <a style="color:#EF781F; text-align: center;" title="Indicadores Fiscales" href="'.$row["url_absoluta"].'/mipanel"> Indicadores Fiscales</a>
                                                          </td>
                                                           <td>
                                                          · <a style="color:#EF781F; text-align: center;" title="Indicadores Financieros" href="'.$row["url_absoluta"].'/mipanel"> Indicadores Financieros</a>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                        <td><br></td>
                                                        </tr>
                                                       
                                                        <tr>
                                                          <td>
                                                          
                                                          </td>
                                                        </tr>
                                                      </table></td>
                                                  </tr>
                                                </table></td>
                                            </tr>
                                           
                                            <tr>
                                            <td>
                                            
                                            
                                            </td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                     
                                     
                                   
                                    </table></td>
                                </tr>
                               
                              </table></td>
                          </tr>
                         
                         
                          <!--==============footer area end here===============-->
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <!--copy right text start-->
        <tr>
          <td valign="top" bgcolor="#ededed"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" height="15"></td>
              </tr>
              
              <tr>
              
              <td align="left" rowspan="2" ><a href="'.$row["url_absoluta"].'" target="_blank"><img style="height:40px; width:167px;" src="'.$row["url_logo"].'"  alt="logo ficachi" ></a></td>
              
              <td   colspan="2" align="right" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#000000;"><strong>Pizarro No. 41</strong> Fracc. Reforma C.P. 91919&nbsp;&nbsp;</td>
              </tr>
              
                <tr>
                
                <td  align="right" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:10px; line-height:20px; color:#000000;"><span><strong>Veracruz, Ver. M&eacute;xico</strong> Tel./Fax: <strong>+52 (229) 923 5700</strong></span>&nbsp;&nbsp;</td>
              </tr>
              <tr><td colspan="2" height="15"></td></tr>
              <tr>
                <td colspan="2" align="center" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:10px; line-height:18px; color:#999999;"><strong>&copy; 2015 - Ficachi Consultores, S.C. Todos los derechos reservados.</strong></td>
              </tr>
              <tr>
                <td colspan="2" height="5"></td>
              </tr>
            </table></td>
        </tr>
        <!--copy right text end-->
      </table></td>
  </tr>

  <tr>
  <td align="center" >
  <span style="font-size:12px; color:#999999">Este correo electr&oacute;nico fue enviado por <strong>FCH Web</strong>. Para <strong>desactivar</strong> el envio desmarque  la opci&oacute;n<br><i>"Boletines Newsletter"</i> entrando a <a href="'.$row["url_absoluta"].'/mipanel/MiPerfil">Mi Perfil</a>, puede re-activar el servicio cuando guste.</span>
  <br><br>
  <span style="font-size:10px; padding:5px; color:#999999">Este mensaje se dirige exclusivamente al destinatario referenciado. Si usted no lo es y lo ha recibido por error, proceda a borrarlo, y que en todo caso se abstenga de utilizar, reproducir, alterar, archivar o comunicar a terceros el presente mensaje y ficheros anexos.<br/>
<strong>AVISO DE PRIVACIDAD.-</strong> Ficachi y Asociados, S.C., con domicilio en  Pizarro No. 41 Fraccionamiento Reforma en la ciudad de Veracruz, Ver., C.P. 91919 es el responsable del tratamiento de sus datos personales, datos personales sensibles, datos financieros o patrimoniales, que en su caso le sean proporcionados.  Para mayor informaci&oacute;n en relaci&oacute;n con el aviso de privacidad aqu&iacute; mencionado, sus derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n, oposici&oacute;n y limitaci&oacute;n del uso o divulgaci&oacute;n de los datos, la revocaci&oacute;n de su consentimiento, as&iacute; como para conocer las posibles transferencias de informaci&oacute;n que se podr&aacute;n llevar a cabo y cambios a dicho aviso, puede acceder a nuestro aviso de privacidad integral a trav&eacute;s de la p&aacute;gina de internet: Ficachi y Asociados S.C.</span></td>
  </tr>
</table>';


	  $mail->AltBody = $mensaje;
	  $mail->MsgHTML($mensaje);
	  
	  foreach($correos as $n){
	  	$mail->AddAddress($n);
	  }
	  
	  $mail->IsHTML(true);
	  // Activo condificacción utf-8
	  $mail->CharSet = 'UTF-8';		
						  
	 $status = $mail->Send(); //Enviamos el correo
	 
	 echo $mail->ErrorInfo;
	 return $status;
	
}
	
function furl($id){ //Recibe el id y crea los enlaces amigables
	$q = mysql_query("SELECT id, marca, tipo, modelo FROM catalogo WHERE id='$id'") or die(mysql_error());
		$rw = mysql_fetch_array($q,MYSQL_ASSOC) or die(mysql_error());
		
		$tipo = str_replace(" ", "-", $rw["tipo"]);
		
        echo "seminuevo/".$rw["id"]."/".$rw["marca"]."-".$tipo."-".$rw["modelo"];
}
	
function fecha($fecha){
	
	        $dia = substr($fecha,8,2); //obtiene el dia 
			
			$anio = substr($fecha,0,4); //obtiene el año 
			
			$mes_cump = substr($fecha,5,2);
											
			switch($mes_cump){ //Obtiene el mes
				case 1:
					$mes = "ENERO";
					break;
				case 2:
					$mes = "FEBRERO";
					break;
				case 3:
					$mes = "MARZO";
					break;
				case 4:
					$mes = "ABRIL";
					break;
				case 5:
					$mes = "MAYO";
					break;
				case 6:
					$mes = "JUNIO";
					break;
				case 7:
					$mes = "JULIO";
					break;
				case 8:
					$mes = "AGOSTO";
					break;
				case 9:
					$mes = "SEPTIEMBRE";
					break;
				case 10:
					$mes = "OCTUBRE";
					break;
				case 11:
					$mes = "NOVIEMBRE";
					break;
				case 12:
					$mes = "DICIEMBRE";
					break;
				}
			if($dia!="0"){	
				return $date = $dia." de ".$mes." de ".$anio;	
			}else{
				return $date = "";
				}
}
	
function element_fecha($fecha,$tipo){
     $dia = substr($fecha,8,2); //obtiene el dia 
			
			$anio = substr($fecha,0,4); //obtiene el año 
			
			$mes_cump = substr($fecha,5,2);
											
			switch($mes_cump){ //Obtiene el mes
				case 1:
					$mes = "enero";
					break;
				case 2:
					$mes = "febrero";
					break;
				case 3:
					$mes = "marzo";
					break;
				case 4:
					$mes = "abril";
					break;
				case 5:
					$mes = "mayo";
					break;
				case 6:
					$mes = "junio";
					break;
				case 7:
					$mes = "julio";
					break;
				case 8:
					$mes = "agosto";
					break;
				case 9:
					$mes = "septiembre";
					break;
				case 10:
					$mes = "octubre";
					break;
				case 11:
					$mes = "noviembre";
					break;
				case 12:
					$mes = "diciembre";
					break;
				}
				
				switch($tipo){
					case "dia":
						$dato = $dia;
						break;
						
					case "mes":
						$dato = $mes;
						break;
						
					case "anio":
						$dato = $anio;
						break;
										
					}
					
			return $dato;	
}
	
function mes($mes_this){
	switch($mes_this){ //Obtiene el mes
				case 1:
					$mes = "Enero";
					break;
				case 2:
					$mes = "Febrero";
					break;
				case 3:
					$mes = "Marzo";
					break;
				case 4:
					$mes = "Abril";
					break;
				case 5:
					$mes = "Mayo";
					break;
				case 6:
					$mes = "Junio";
					break;
				case 7:
					$mes = "Julio";
					break;
				case 8:
					$mes = "Agosto";
					break;
				case 9:
					$mes = "Septiembre";
					break;
				case 10:
					$mes = "Octubre";
					break;
				case 11:
					$mes = "Noviembre";
					break;
				case 12:
					$mes = "Diciembre";
					break;
				}
				return $mes;
}
	
function file_ext($file){
    $ext = substr($file,-3);
		
				switch($ext){
					case "doc":
						$icon = '<img src="assets/img/doc.gif">';
						break;
						
					case "ocx":
						$icon = '<img src="assets/img/doc.gif">';
						break;
						
					case "xls":
						$icon = '<img src="assets/img/xls.gif">';
						break;
						
					case "lsx":
						$icon = '<img src="assets/img/xls.gif">';
						break;
						
					case "pdf":
						$icon = '<img src="assets/img/pdf.gif">';
						break;
					
					case "rar":
						$icon = '<img src="assets/img/rar.gif">';
						break;
						
					case "zip":
						$icon = '<img src="assets/img/zip.gif">';
						break;
					
					default:
						$icon = '<img src="assets/img/otro.gif">';
						break;			
				}
				
			return $icon;	
}
	
	
/* Tags de distintas marcas */
function marcastags(){
	echo '<div class="widget widget-category">
	<h3 class="widget-title"><span>Marcas</span></h3>
	<ul class="category-list unstyled clearfix">';
			
			// Crea un mosaico de tags con las marcas registradas
			$marca = mysql_query("SELECT DISTINCT marca FROM catalogo Order By marca ASC LIMIT 15");
			while($row = mysql_fetch_array($marca,MYSQL_ASSOC)){
				$m = mysql_query("SELECT id FROM catalogo WHERE marca='$row[marca]'") or die(mysql_error());
				$num = mysql_num_rows($m) or die(mysql_error());
				echo '<li><a href="busqueda/'.$row['marca'].'">'.$row['marca'].'</a><span class="posts-count">'.$num.'</span></li>';
				}
				mysql_free_result($marca);
	echo '</ul></div>';
}
			
/*---------------------------------*/
			
/* Tags de Tipos de autos */
function tipostags(){
	echo '<div class="widget widget-tags">
	<h3 class="widget-title"><span>Modelos </span></h3>
	<ul class="tag-cloud unstyled clearfix">';

		// Crea un mosaico de tags con los modelos registrados
		$tipo = mysql_query("SELECT DISTINCT modelo FROM catalogo Order By modelo ASC LIMIT 10");
		while($row = mysql_fetch_array($tipo,MYSQL_ASSOC)){
			$num = mysql_num_rows($tipo) or die(mysql_error());
			echo '<li><a href="busqueda/'.$row['modelo'].'">'.$row['modelo'].'</a></li>';
			}
			mysql_free_result($tipo);
	echo '</ul></div>';
}
	
	
/* Novedades de los ultimos 6 vehiculos  registrados*/			
		
function novedades(){
	echo '<div class="widget widget-latest-post">
	<h3 class="widget-title"><span>Novedades</span></h3>
	<ul class="carousel1">';
  
 $q = mysql_query("SELECT * FROM catalogo WHERE status='1' ORDER BY id DESC LIMIT 6") or die(mysql_error());
 
 while($row = mysql_fetch_array($q,MYSQL_ASSOC)){
	 
	 $q2 = mysql_query("SELECT imagen FROM galeria WHERE idauto = '$row[id]' ORDER BY id ASC LIMIT 1") or die(mysql_error());
	 $row2 = mysql_fetch_array($q2, MYSQL_ASSOC);

	  echo '<li><div class="media"> <a href="';
	  furl($row["id"]);
	  echo '"><img src="media/slider/'.$row2["imagen"].'" style="height:190px; width:100%;" alt="'.$row["marca"]." ".$row["tipo"].'"/></a>
		  <div class="media-desc">
			<a href="';
			furl($row["id"]);
			echo '"><h5 class="entry-title">'.$row["marca"]." ".$row["tipo"].'</h5></a>
			<time > <a href="';
			furl($row["id"]);
			echo '"> ';
			echo "MODELO ".$row["modelo"];
			echo '</a> </time>
		  </div>
		</div>
	  </li>';
   
 }
	mysql_free_result($q);
	mysql_free_result($q2);
	 
	echo '</ul>';
}
			
/*----------------------------------*/
			
			/* Lista  de autos general */
			/* Muestra los 4 Primeros registros disponibles */
			function lista(){
			  echo '<div id="tab-recent" class="tab-pane active">
              <ul class="entry-list unstyled">';
              
		 $q = mysql_query("SELECT * FROM catalogo WHERE status='1' ORDER BY id ASC LIMIT 4") or die(mysql_error());
		 
		 while($row = mysql_fetch_array($q,MYSQL_ASSOC)){
			 
			 $q2 = mysql_query("SELECT imagen FROM galeria WHERE idauto = '$row[id]' ORDER BY id ASC LIMIT 1") or die(mysql_error());
			 $row2 = mysql_fetch_array($q2, MYSQL_ASSOC);
		 
                echo '<li>
                  <div class="entry-thumbnail"><a class="img" href="';
				  
				  furl($row["id"]);
				  
				  echo '"><img style="width: auto; height:70px;" alt="'.$row["marca"]." ".$row["modelo"].'" src="media/slider/'.$row2["imagen"].'"></a> </div>
                  <div class="entry-main">
                    <div class="entry-header">
                      <h5 class="entry-title"><a href="';
					  
					  furl($row["id"]);
					  
					  echo '">'.$row["marca"]." ".$row["tipo"].'</a></h5>
                    </div>
                    <div class="entry-meta">
                      <time ><a href="';
					  
					 furl($row["id"]);
					  
					  echo '"> MODELO ';
					  echo $row["modelo"];
					  echo '</a> </time>
                      <div class="entry-comments"> <a href="';
					  
					  furl($row["id"]);
					  
					  echo '"><i class="fa fa-flag-checkered"></i> '.number_format($row["km"]).' Kms</a> </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>';
                
		 }
		 	mysql_free_result($q);
			mysql_free_result($q2);
			
              echo '</ul>';
				}
				
				
				/* Barra Lateral - LLamado a las funciones anteriores */
				function barralateral(){
					 //<!-- Marcas Tags -->
					   marcastags();
					  //<!-- // Marcas --> 
					  
					  //<!-- Tipos Tags -->
					  tipostags(); 
					  //<!-- // Tipos --> 
					  
					  //<!--  Novedades -->
					  novedades();
					  //<!-- //Novedades -->
						
					  //<!--Lista Thumbnail-->
				 	  lista();
					  //<!--// Lista Thumbnail-->
					}
					
					
			function check($checkbox){ //Verifica si un checkbox viene vació le coloca un cero "0"
				
				if($checkbox=="1"){
					echo ' checked="checked"';
				}
					
			}
				
			function trans($a){ // Verifica el tipo de transmisión
				if($a=="E"){
					echo "ESTÁNDAR";
					}else{
					 echo "AUTOMÁTICA";	
					}
				}
			
		  function comb($c){ // Verifica el tipo de transmisión
				if($c=="G"){
					echo "GASOLINA";
					}else{
					 echo "DIESEL";	
					}
				}
				
				
		  function esp($e){ //Verifica la especificación técnica
			  if($e==1){
				    echo "Sí";
				}else{
					echo "No";
			    }
		  }
		  
		   function gar($g){ //Verifica la garantía
			  if($g==1){
				    echo 'Sí <sup>1</sup>';
				}else{
					echo 'No <sup>2</sup>';
			    }
		  }
		  
		   function seg($s){ //Verifica los tipos de seguros
			  if($s=="M"){
				    echo "MANUALES";
				}else{
					echo "ELÉCTRICOS";
			    }
		  }
		  
		 function logos($marca){ //Devuelve el logo de la marca
			switch($marca){
				
				case "AUDI":
					echo "AUDI.png";
					break;
					
				case "BUICK":
					echo "BUICK.png";
					break;
					
				case "BMW":
					echo "BMW.png";
					break;
					
				case "CHEVROLET":
					echo "CHEVROLET.png";
					break;
					
				case "CHRYSLER":
					echo "CHRYSLER.png";
					break;
					
				case "DODGE":
					echo "DODGE.png";
					break;
					
				case "FIAT":
					echo "FIAT.png";
					break;
					
				case "FORD":
					echo "FORD.png";
					break;
					
				case "HONDA":
					echo "HONDA.png";
					break;
				
				case "JEEP":
					echo "JEEP.png";
					break;
					
				case "MAZDA":
					echo "MAZDA.png";
					break;
				
				case "MERCEDES BENZ":
					echo "MERCEDES.png";
					break;
				
				case "MITSUBIZI":
					echo "MITSUBIZI.png";
					break;
				
				case "NISSAN":
					echo "NISSAN.png";
					break;	
					
                case "PEUGEOT":
					echo "PEUGEOT.png";
					break;
					
				case "DODGE RAM":
					echo "RAM.png";
					break;
					
                case "RENAULT":
					echo "RENAULT.png";
					break;    
				
				case "SEAT":
					echo "SEAT.png";
					break;
					
				case "SUSUKI":
					echo "SUSUKI.png";
					break;
				
				case "TOYOTA":
					echo "TOYOTA.png";
					break;
					
                case "VOLVO":
					echo "VOLVO.png";
					break;    
                   
				case "VOLSKWAGEN":
					echo "VOLSKWAGEN.png";
					break;
					
				case "LINCOLN":
					echo "LINCOLN.png";
					break;
				
				}
		}
		  
		 
	function pag($n){
		
		echo '<div class="pull-right">';
           
		   $nx = $n+1;
		   $af = $n-1;
		   
		   $qaf = mysql_query("SELECT id FROM boletines WHERE id = '$af' AND status='1' ") or die(mysql_error());
		
		   $after = mysql_num_rows($qaf);
		   
		   if($after > 0){ //Comprobamos que si existan registros a antes del actual
          	echo '<a class="links btn btn-mini btn-default" href="BoletinView/';
			print($af);
			echo '" title="Anterior" ><i class="fa fa-angle-double-left"></i></a> ';
		   }
           mysql_free_result($qaf);
		  
          $qnx = mysql_query("SELECT id FROM boletines WHERE id = '$nx' AND status='1' ") or die(mysql_error());
		  
		  $next = mysql_num_rows($qnx);
		   
		  if($next > 0){ //Comprobamos que si existan registros despues del actual
          	echo '<a class="links btn btn-mini btn-default" href="BoletinView/';
			print($nx);
			echo '" title="Siguiente" ><i class="fa fa-angle-double-right"></i></a>';
		  }
          mysql_free_result($qnx);
		  
          echo '</div>';
		 
		}
		
	function marcas(){
		
		echo '<section class="brandslider bg-overlay overlay-bot">
				  <div class="container">
					<div class="row">
					  <header class="section-header ">
						<div class="heading-wrap">
						  <h2 class="heading"><span> Marcas y Modelos</span></h2>
						</div>
						<p> Contamos con las mejores marcas en auto seminuevos</p>
						<hr>
					  </header>
					  <ul>';
					   
					$dir = "media/brand/";
					
					// Abre un directorio conocido, y procede a leer el contenido
					if (is_dir($dir)) {
					if ($dh = opendir($dir)) {
					while (($file = readdir($dh)) !== false) {
					
					if($file == "." || $file == ".." || $file == ".DS_Store" || $file == ".DS_STORE"){
					
					}else{
					
						echo '<li><a href="s.php?t='.substr($file,0,-4).'"><img src="'.$dir.$file.'" alt="logo '.substr($file,0,-4).'"></a></li>'."\n";
						}
					
					//
					}
				
					closedir($dh);
					}
					}
					
					 echo' </ul>
					</div>
				  </div>
			</section>';
		}		  
	
	
	function link_share($titulo,$imagen,$texto){
		
	$url_absoluta = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$ruta = "http://".$_SERVER['HTTP_HOST'];
	
	echo '<div class="social">
	<p>Compartir <a href="http://www.facebook.com/sharer.php?s=100&p[url]='.$url_absoluta.'?m2w&s=100&p[title]='.$titulo.'&p[images][0]='.$ruta.'/imgprojects/'.$imagen.'&p[summary]='.$texto.'" target="popup" onClick="window.open(this.href, this.target, '."'".'width=350,height=420'."'".'); return false;">Facebook</a> | <a href="http://twitter.com/home?status='.$titulo.' - '.$url_absoluta.'"\n"#EstduiHabitareVeracruz" onClick="window.open(this.href, this.target, '."'".'width=350,height=420'."'".'); return false;">Twitter</a></p>
	</div>';
	
		}
		
	
	function item_activo($item){
		
		 if($item == basename($_SERVER['REQUEST_URI'])){
			  echo " current-menu-item"; 
		 }
	}
	
	function login_history($id){
		$iduser = $id;
		$ip = $_SERVER['REMOTE_ADDR'];
		$host = $_SERVER['REMOTE_HOST'];
		$puerto = $_SERVER['REMOTE_PORT'];
		$navegador = $_SERVER['HTTP_USER_AGENT'];
		
		$ql = "INSERT INTO login(iduser, ip, host, puerto, navegador ) VALUES ('$iduser','$ip','$host','$puerto','$navegador')";
		mysql_query($ql) or die(mysql_error());
		
		mysql_free_result($ql);
	}
	
	function inactivo($user){
		if($user=="1" || $user=="2"){
				$d = "";
			}else{
				$d = "disabled";
				}
		return $d;
	}	
	
	function tipo_aviso($aviso){
		switch($aviso){
			case "1":
				$tipo = "clientes";
				break;
			case "2":
				$tipo = "colaboradores";
				break;
			case "3":
				$tipo = "todos";
				break;
		}
		
		return $tipo;
	}
	
	function dameURL(){

	$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
	return $url;
	
	}


	function base($e=0){
		$cadena = $_SERVER['REQUEST_URI']; 
		
		if($e=="0"){
			$subcadena = "/"; 
			// localicamos en que posición se haya la $subcadena
			$posicionsubcadena = strrpos ($cadena, $subcadena); 
			// eliminamos los caracteres desde $subcadena hacia la izq, y le sumamos 1 para borrar tambien el @ en este caso
			//$link = substr ($cadena, ($posicionsubcadena+1)); 
			$link = substr ($cadena, 0,$posicionsubcadena); 
		}else{
			$link = substr ($cadena, 0,-2); 
		}
		
		echo '<base href="'.$link.'">';
	}
		
	function sala($sala){
		switch($sala){
			case "1":
				$s = "Biblioteca";
				break;
			case "2":
				$s = "Sala de Juntas";
				break;
			case "3":
				$s = "Sala Fiscal";
				break;
		}
		return $s;
	}
	
	function disabled($mes,$dia,$anio="0"){
		
		if($anio=="0"){ $anio = date("Y"); }
		
		$bisiesto = $anio%4;
				
		if(($mes=="02" && $dia=="30") || ($mes=="02" && $dia=="31") || ($mes=="02" && $dia=="29" && $bisiesto!="0")){
			echo 'disabled="disabled"';
		}
		
		if(($mes=="04" && $dia=="31") || ($mes=="06" && $dia=="31") || ($mes=="09" && $dia=="31") || ($mes=="11" && $dia=="31")){
			echo 'disabled="disabled"';
		}
		
		
	}
	
	function moneda($mon){
	
	switch($mon){
		
		//Franco
		case "Africa Central":
			$moneda = "Franco";
			break;
		case "Bélgica":
			$moneda = "Franco";
			break;	
		case "Francia":
			$moneda = "Franco";
			break;
		case "Luxemburgo":
			$moneda = "Franco";
			break;
		case "Rep. Dem. del Congo":
			$moneda = "Franco";
			break;
		case "Suiza":
			$moneda = "Franco";
			break;
			
		//Lek	
		case "Albania":
			$moneda = "Lek";
			break;
			
		//Marco	
		case "Alemania":
			$moneda = "Marco";
			break;
		case "Finlandia":
			$moneda = "Marco";
			break;	
			
		//Florín	
		case "Antillas Holandesas":
			$moneda = "Florín";
			break;
		case "Holanda":
			$moneda = "Florín";
			break;	
		case "Países Bajos":
			$moneda = "Florín";
			break;
		case "Surinam":
			$moneda = "Florín";
			break;
			
		//Riyal			
		case "Arabia Saudita":
			$moneda = "Riyal";
			break;
		case "Iran":
			$moneda = "Riyal";
			break;
			
		//Dinar			
		case "Argelia":
			$moneda = "Dinar";
			break;
		case "Bahrain":
			$moneda = "Dinar";
			break;
		case "Irak":
			$moneda = "Dinar";
			break;
		case "Jordania":
			$moneda = "Dinar";
			break;
		case "Kuwait":
			$moneda = "Dinar";
			break;
		case "Libia":
			$moneda = "Dinar";
			break;
		case "Serbia":
			$moneda = "Dinar";
			break;
		case "Yugoslavia":
			$moneda = "Dinar";
			break;
			
		//Peso	
		case "Argentina":
			$moneda = "Peso";
			break;
		case "Chile":
			$moneda = "Peso";
			break;
		case "Colombia":
			$moneda = "Peso";
			break;
		case "Cuba":
			$moneda = "Peso";
			break;
		case "Filipinas":
			$moneda = "Peso";
			break;
		case "Rep. Dominicana":
			$moneda = "Peso";
			break;
		case "Uruguay":
			$moneda = "Peso";
			break;	
			
			
		//Dólar	
		case "Australia":
			$moneda = "Dólar";
			break;
		case "Bahamas":
			$moneda = "Dólar";
			break;	
		case "Barbados":
			$moneda = "Dólar";
			break;
		case "Bélice":
			$moneda = "Dólar";
			break;
		case "Bermuda":
			$moneda = "Dólar";
			break;
		case "Canadá":
			$moneda = "Dólar";
			break;
		case "EUA":
			$moneda = "Dólar";
			break;
		case "Fidji":
			$moneda = "Dólar";
			break;
		case "Guyana":
			$moneda = "Dólar";
			break;
		case "Hong Kong":
			$moneda = "Dólar";
			break;
		case "Jamaica":
			$moneda = "Dólar";
			break;
		case "Nueva Zelanda":
			$moneda = "Dólar";
			break;
		case "Puerto Rico":
			$moneda = "Dólar";
			break;
		case "Singapur":
			$moneda = "Dólar";
			break;
		case "Taiwan":
			$moneda = "Dólar";
			break;
		case "Trinidad y Tobago":
			$moneda = "Dólar";
			break;
			
		//Chelín	
		case "Austria":
			$moneda = "Chelín";
			break;
		case "Kenia":
			$moneda = "Chelín";
			break;
		case "Tanzania":
			$moneda = "Chelín";
			break;
			
		//Boliviano	
		case "Bolivia":
			$moneda = "Boliviano";
			break;
			
		//Real
		case "Brasil":
			$moneda = "Real";
			break;
			
		//Lev
		case "Bulgaria":
			$moneda = "Lev";
			break;
			
		//Yuan	
		case "China":
			$moneda = "Yuan";
			break;
			
		//Won
		case "Corea del Norte":
			$moneda = "Won";
			break;
		case "Corea del Sur":
			$moneda = "Won";
			break;
			
		//Colón	
		case "Costa Rica":
			$moneda = "Colón";
			break;
		case "El Salvador":
			$moneda = "Colón";
			break;
			
		//Corona	
		case "Dinamarca":
			$moneda = "Corona";
			break;
		case "Eslovaquia":
			$moneda = "Corona";
			break;
		case "Estonia":
			$moneda = "Corona";
			break;
		case "Islandia":
			$moneda = "Corona";
			break;
		case "Noruega":
			$moneda = "Corona";
			break;
		case "Rep. Checa":
			$moneda = "Corona";
			break;
		case "Suecia":
			$moneda = "Corona";
			break;
			
		//Sucre	
		case "Ecuador":
			$moneda = "Sucre";
			break;
			
		//Libra	
		case "Egipto":
			$moneda = "Libra";
			break;
		case "Gran Bretaña":
			$moneda = "Libra";
			break;
		case "Líbano":
			$moneda = "Libra";
			break;
		case "Siria":
			$moneda = "Libra";
			break;
			
		//Dirham	
		case "Emiratos Arabes Unidos":
			$moneda = "Dirham";
			break;
		case "Marruecos":
			$moneda = "Dirham";
			break;
			
		//Peseta
		case "España":
			$moneda = "Peseta";
			break;
			
		//Birr	
		case "Etiopía":
			$moneda = "Birr";
			break;
			
		//Rublo	
		case "Federación Rusa":
			$moneda = "Rublo";
			break;
			
		//Cedi	
		case "Ghana":
			$moneda = "Cedi";
			break;
			
		//Dracma
		case "Grecia":
			$moneda = "Dracma";
			break;
			
		//Quetzal
		case "Guatemala":
			$moneda = "Quetzal";
			break;
			
		//Gourde
		case "Haití":
			$moneda = "Gourde";
			break;
			
		//Lempira
		case "Honduras":
			$moneda = "Lempira";
			break;
			
		//Forint
		case "Hungría":
			$moneda = "Forint";
			break;
			
		//Rupia
		case "India":
			$moneda = "Rupia";
			break;
		case "Indonesia":
			$moneda = "Rupia";
			break;	
		case "Pakistán":
			$moneda = "Rupia";
			break;
		case "Sri-Lanka":
			$moneda = "Rupia";
			break;
		case "India":
			$moneda = "Rupia";
			break;
			
		//Punt	
		case "Irlanda":
			$moneda = "Punt";
			break;
		//Shekel
		case "Israel":
			$moneda = "Shekel";
			break;
			
		//Lira
		case "Italia":
			$moneda = "Lira";
			break;
		case "Malta":
			$moneda = "Lira";
			break;
		case "Turquía":
			$moneda = "Lira";
			break;
			
		//Yen	
		case "Japón":
			$moneda = "Yen";
			break;
			
		//Litas	
		case "Lituania":
			$moneda = "Litas";
			break;
		
		//Ringgit	
		case "Malasia":
			$moneda = "Ringgit";
			break;
			
		//Córdoba	
		case "Nicaragua":
			$moneda = "Córdoba";
			break;
		
		//Nigeria
		case "Nigeria":
			$moneda = "Naira";
			break;
		
		//Balboa
		case "Panamá":
			$moneda = "Balboa";
			break;
			
		//Guaraní	
		case "Paraguay":
			$moneda = "Guaraní";
			break;
		
		//Nvo. Sol
		case "Perú":
			$moneda = "Nvo. Sol";
			break;
			
		//Zloty
		case "Polonia":
			$moneda = "Zloty";
			break;
			
		//Escudo	
		case "Portugal":
			$moneda = "Escudo";
			break;
		
		//Rand
		case "Rep. de Sudáfrica":
			$moneda = "Rand";
			break;
			
		//Rial
		case "Rep. de Yémen":
			$moneda = "Rial";
			break;
		case "Rep. Islámica de Irán":
			$moneda = "Rial";
			break;
			
		//Baht	
		case "Tailandia":
			$moneda = "Baht";
			break;
			
		//Hryvna
		case "Ucrania":
			$moneda = "Hryvna";
			break;
		
		//Euro
		case "Unión Monetaria Europea":
			$moneda = "Euro";
			break;
			
		//Bolivar
		case "Venezuela":
			$moneda = "Bolivar";
			break;
			
		//Dong
		case "Vietnam":
			$moneda = "Dong";
			break;
		
		//Leu
		case "Rumania":
			$moneda = "Leu";
			break;
	}
	
	
	return $moneda;	
	}
	
	
	
function num_mes($m){
	
	switch($m){
		case "01":
			$num = "ene";
			break;
		case "02":
			$num = "feb";
			break;
		case "03":
			$num = "mar";
			break;
		case "04":
			$num = "abr";
			break;
		case "05":
			$num = "may";
			break;
		case "06":
			$num = "jun";
			break;
		case "07":
			$num = "jul";
			break;
		case "08":
			$num = "ago";
			break;
		case "09":
			$num = "sep";
			break;
		case "10":
			$num = "oct";
			break;
		case "11":
			$num = "nov";
			break;
		case "12":
			$num = "dic";
			break;
	}

	return $num;
}
							
?>