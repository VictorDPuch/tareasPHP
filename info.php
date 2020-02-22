<?php 
include("cfg/func.php");
?>
<!DOCTYPE html>
<html>

  <head>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  
    <title>Reportar | FCH Soluciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="" name="description">
    <meta content="" name="author">
    
    <?php include("script_top.php"); ?>
    
  </head>
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="horizontal-menu">
    <!-- BEGIN HEADER -->
    <?php include("menu.php"); ?>
    <!-- BEGIN PAGE CONTAINER-->
    <?php include("menu_movil.php"); ?>
    <div class="page-content condense-menu">
      <div class="content">
        <div class="clearfix"></div>
       
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
     	<div class="row">
        		
                <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="grid simple " id="new-ticket-wrapper" style="overflow: hidden;">
              <div class="grid-title no-border">
                <h2 class="semi-bold"><i class="fa fa-bug"></i>Reportar <strong>Error</strong></h2>
                 <p>En esta sección puede reportar problemas con el sistema, errores en el contenido y solicitar corrección de datos personales en su <strong>Perfil</strong>.</p>
              </div>
              <div class="grid-body no-border">
                 <form action="Reportar" method="post"> 
                  <div class="row form-row">
                  <input type="hidden" name="user" value="<?php print($_SESSION["id"]); ?>"> 
                      
            <div class="col-md-12">
              <div class="grid simple ">
                <div class="grid-body no-border">
                  <div class="row-fluid">
				  <?php
						if(!isset($_POST["mensaje"])){
				   ?>
                    <div class="row form-row">
                         
                       <div class="input-append col-md-12 col-sm-12 primary">
                       <label>Asunto</label>
                        <select name="asunto" title="Seleccione un problema" style="cursor:pointer;" required>
                        <option value="">Reportar Problema...</option>
                        <option value="Reparar Error">Reportar Error</option>
                        <option value="Correguir Información en Indicadores">Información incompleta (Indicadores)</option>
                        <option value="Corrección de información personal">Corrección de información personal (Mi Perfil)</option>
                        <option value="Correguir errores ortográficos">Errores ortográficos</option>
                        <option value="Solucionar problema que no esta en lista">Otro</option>
                        </select>
                       </div>
                     </div>
                     
                     <div class="row form-row">       
                    
                    <div class="col-md-12">
                    <label>Descripción</label>
                    <textarea name="mensaje" placeholder="Describa el error que presenta..." title="Describa brevemente el problema que presenta" style="width:100%; resize:vertical;" rows="8" required></textarea>
                    </div>
                                                                
                    </div>
                   <?php
					  }else{
						  $q = mysql_query("SELECT * FROM usuario WHERE id='$_POST[user]'") or die(mysql_error());
						  $row = mysql_fetch_array($q, MYSQL_ASSOC);
						  
						  $status = enviar_ticket($row["email"], $row["primer_nombre"]." ".$row["segundo_nombre"]." ".$row["primer_apellido"], $_POST["asunto"], $_POST["mensaje"]);
					 ?>
					 <div  style="padding:10px;" class="col-md-12"> 
                     <?php if($status){ ?>
					 <h3 class="bold"><i class="fa fa-check"></i> Mensaje Enviado</h3>
					 <p>Su mensaje ha sido enviado exitosamente, en breve recibirá respuesta en <b><?php echo $row["email"]; ?></b>.</p>
                     <?php }else{ ?>
                     <h3 class="bold"><i class="fa fa-times"></i> Mensaje No Enviado</h3>
					 <p>Ha ocurrido un error en el envio, <a href="MiPerfil">verifique</a> que su correo este correcto y por favor vuelva a intentar o llame al <a href="tel:2299235700">(229) 923 5700</a>.</p>
                     <?php } ?>
					 </div>
					 <?php
					  }
					  ?> 
                    
                  </div>
                  
                </div>
              </div>
            </div>
           </div>
                  <div class="form-actions row form-row">
                    <div class="col-md-12 margin-top-10">
                      <div class="pull-right">
                        
                          <?php if(!isset($_POST["mensaje"])){  ?>
						  <button type="submit" class="btn btn-success btn-cons ">Enviar</button>
                          <?php } ?>
                          <a class="btn btn-cons" href="Inicio"><i class="fa fa-sign-out"></i> Salir</a>
                        </div>
                    </div>
                  </div>  
                  </form>         
              </div>
            </div>
                </div>
                			
      </div>
      <!-- END FORM OPTIONS-->
      <!-- END PAGE --> 
     </div>
   
</div>
   
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- END FOOTER -->
    <!-- BEGIN CORE JS FRAMEWORK-->
   <?php include("script_footer.php"); ?>
<!-- END CORE TEMPLATE JS --> 
   
  </body>
</html>