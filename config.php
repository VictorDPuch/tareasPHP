<!DOCTYPE html>
<html>
  
  <head>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <!-- /Added by HTTrack -->
    <title>Ajustes | FCH Soluciones</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <?php 
		include("cfg/func.php");
		function ajustes(){
	?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="" name="description">
    <meta content="" name="author">
   
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />


<link href="webarch/css/webarch.css" rel="stylesheet" type="text/css" />
  	
	<style type="text/css">
		.delete:hover{ color: #EF7F1A;}
	</style>
    
<script>
		function habilitar(value)
		{
			console.log(value);
			if(value=="1")
			{
				// habilitamos
				document.getElementById("servidor").disabled=false;
				document.getElementById("puerto").disabled=false;
				document.getElementById("usuario_correo").disabled=false;
				document.getElementById("pass_correo").disabled=false;
			}else if(value=="2"){
				// deshabilitamos
				document.getElementById("servidor").disabled=true;
				document.getElementById("puerto").disabled=true;
				document.getElementById("usuario_correo").disabled=true;
				document.getElementById("pass_correo").disabled=true;
			}
		}
	</script>
  </head>

  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="horizontal-menu">
    <!-- BEGIN HEADER -->
    <?php include("menu.php"); ?>
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
      <div class="content">
        <div class="clearfix"></div>
        
        
        <!--IMPORTANTE!!-->                     
                  <div class="row-fluid" style="visibility:hidden; display:none;">
                    <div class="slide-primary">
                      <input type="checkbox" name="switch" class="ios" checked="checked"/>
                    </div>
                    <div class="slide-success">
                      <input type="checkbox" name="switch" class="iosblue" checked="checked"/>
                    </div>
                  </div>
            <!--No eliminar esta sección de código-->
            
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <div class="row">
        
     <form action="Ajustes" method="post"> 
      <div class="col-md-12">
            <div class="col-md-12">
<ul class="nav nav-tabs" role="tablist">
<li class="active">
<a href="#sistema" role="tab" data-toggle="tab">Sistema</a>
</li>
<li>
<a href="#correo" role="tab" data-toggle="tab">Correo</a>
</li>
<li>
<a href="#soporte" role="tab" data-toggle="tab">Soporte</a>
</li>
</ul>

<div class="tab-content">
<?php $row = mysql_fetch_array(mysql_query("SELECT * FROM ajustes WHERE id='1'"), MYSQL_ASSOC); ?>
<div class="tab-pane active" id="sistema">
<div class="row column-seperation">
<div class="col-md-12">
<h4 class="semi-bold">Paso 1 - <span class="light">Biblioteca</span></h4>
     
                            
                            <label>Administrador de Biblioteca</label>
                              <select name="admin_biblio" style="width:100%">
                                  <?php
                    				  
                                      $result = mysql_query("SELECT DISTINCT * FROM usuario  WHERE tipo!='4' Order By primer_nombre ASC") or die(mysql_error());
                                      //Generamos el menu desplegable
                          
									  
								  while($dep = mysql_fetch_array($result, MYSQL_ASSOC)){
									  echo '<option value="'.$dep["id"].'" ';
									  selected($dep["id"],$row["admin_biblio"]);
									  echo '>'.$dep["primer_nombre"]." ".$dep["segundo_nombre"]." ".$dep["primer_apellido"]." ".$dep["segundo_apellido"].'</option>';
								  }
								  
                                      
                                      mysql_free_result($result);
                            
                                ?>
                              </select>
                            
</div>

</div>
</div>
<div class="tab-pane" id="correo">
<div class="row">
<div class="col-md-12">
<h4 class="semi-bold">Paso 2 - <span class="light">Servidor de Correo</span></h4>
                        <br>
                        <div class="row form-row">
                        
                        <div class="col-md-12">
                        <h5 class="bold">Método de envio de correo</h5>
                         <div class="radio radio-primary">
                        <input id="1" type="radio" name="envio_correo" value="1" onchange="habilitar(this.value);" <?php if($row["envio_correo"]=="1"){ echo 'checked="checked"'; } ?> >
                        <label for="1">PHPMailer</label>
                        <input id="2" type="radio" name="envio_correo"  value="2" onchange="habilitar(this.value);" <?php if($row["envio_correo"]=="2"){ echo 'checked="checked"'; } ?>  >
                        <label for="2">mail</label>
                      </div>
                        </div>
                        
                        
                          <div class="col-md-4">
                          <label>Servidor</label>
                            <input type="text" placeholder="Servidor" class="form-control no-boarder " name="servidor" id="servidor" title="Servidor SMTP" value="<?php echo $row["servidor_smtp"]; ?>" <?php if($row["envio_correo"]=="2"){ echo "disabled";} ?> required>
                            <input type="hidden" name="servidor2" value="<?php echo $row["servidor_smtp"]; ?>">
                          </div>
                          
                          <div class="col-md-4">
                          <label>Puerto</label>
                          <input type="text" placeholder="Puerto" class="form-control no-boarder "  value="<?php echo $row["puerto"]; ?>" <?php if($row["envio_correo"]=="2"){ echo "disabled";} ?> name="puerto" id="puerto" title="Puerto de salida" required>
                          <input type="hidden" name="puerto2" value="<?php echo $row["puerto"]; ?>">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-8">
                          <label>Usuario</label>
                            <input type="text" placeholder="Usuario" class="form-control no-boarder " value="<?php echo $row["usuario"]; ?>" <?php if($row["envio_correo"]=="2"){ echo "disabled";} ?> name="usuario" id="usuario_correo" title="Usuario de correo" required>
                            <input type="hidden" name="usuario2" value="<?php echo $row["usuario"]; ?>">
                          </div>
                          <div class="col-md-8">
                          <label>Password</label>
                            <input type="text" placeholder="Password" class="form-control no-boarder " value="<?php echo $row["password"]; ?>" <?php if($row["envio_correo"]=="2"){ echo "disabled";} ?> name="password" id="pass_correo" title="Password de correo" required>
                            <input type="hidden" name="password2" value="<?php echo $row["password"]; ?>">
                          </div>
                        </div>
</div>
</div>
</div>
<div class="tab-pane" id="soporte">
<div class="row">
<div class="col-md-12">
<h4 class="semi-bold">Paso 3 - <span class="light">Soporte</span></h4>
                        <br>
                           <div class="row form-row">
                         
                           <div class="col-md-12">
                           <label>URL Absoluta</label>
                            <input type="text" placeholder="URL Absoluta del sitio (http://)" class="form-control no-boarder" value="<?php if(!empty($row["url_absoluta"])){ echo $row["url_absoluta"];}else{ echo "http://".$_SERVER['HTTP_HOST']; } ?>" name="url_absoluta" id="txtCountry" title="URL Absoluta para los correos" required>
                          </div>
                          
                          <div class="col-md-12">
                          <label>URL Logo</label>
                            <input type="text" placeholder="Logo con URL Absoluta del sitio (http://)" class="form-control no-boarder" value="<?php if(!empty($row["url_logo"])){ echo $row["url_logo"];} ?>" name="logo" id="txtCountry" title="URL Absoluta del logo para los correos" required>
                          </div>
                          
                          <div class="col-md-12">
                          <label>Email Soporte</label>
                            <input type="text" placeholder="Email de Soporte" class="form-control no-boarder" value="<?php echo $row["email_soporte"]; ?>" name="email_soporte"  title="Email de soporte" required>
                          </div>
                          
                          <div class="col-md-12">
                          <label>Key API (<a href="http://tinypng.com" target="_blank"><i>tinypng.com</i></a>)</label>
                            <input type="text" placeholder="Key para compresión de imagenes" class="form-control no-boarder" value="<?php echo $row["key_tinypng"]; ?>" name="key_tiny"  title="Key de API Tinypng.com" required>
                          </div>
                          
                        </div>
                        
                    
                    <div class="pull-right">
                    <input type="hidden" name="uri" value="19050888">
                    <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Guardar</button>
                    <a href="Inicio"><button class="btn btn-white btn-cons" type="button">Cancelar</button></a>
                    </div>

        </div>
        </div>
        </div>
        
        </div>
        
        </div>
      </div>
   </form>
   <!-- END CHAT --> 
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- END FOOTER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>

<script src="assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>


<script src="webarch/js/webarch.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script>






    <?php
}
include("cfg/misc.inc");


if(isset($_POST["uri"])){
  
	
	if(!empty($_POST["envio_correo"])){
		$envio_correo = $_POST["envio_correo"];
	}else{
		$envio_correo = "";
		}
		
	if(!empty($_POST["servidor"])){
    	$servidor = $_POST["servidor"];
	}else{
		$servidor = $_POST["servidor2"];;
		}
	
	if(!empty($_POST["puerto"])){
    	$puerto = $_POST["puerto"];
	}else{
		$puerto = $_POST["puerto2"];;
		}
		
	if(!empty($_POST["usuario"])){	
    	$usuario = $_POST["usuario"];
	}else{
		$usuario = $_POST["usuario2"];;
		}
		
		if(!empty($_POST["password"])){	
    		$password = $_POST["password"];
		}else{
			$password = $_POST["password2"];;
			}
	
	$admin_biblio = $_POST["admin_biblio"];
	$url = $_POST["url_absoluta"];
	$logo = $_POST["logo"];
	$email_soporte = $_POST["email_soporte"];
	$key_tiny = $_POST["key_tiny"];	

   
     mysql_query("UPDATE ajustes SET servidor_smtp = '$servidor', puerto = '$puerto', usuario='$usuario', password = '$password', email_soporte = '$email_soporte', url_absoluta='$url', url_logo='$logo', envio_correo = '$envio_correo', admin_biblio = '$admin_biblio', key_tinypng='$key_tiny'  WHERE id= '1' ") or die(mysql_error());
    
    aviso("Ajustes Guardados correctamente",1);
    ajustes();

			
}else{
	ajustes();
	}

?>
  </body>
 </html>
