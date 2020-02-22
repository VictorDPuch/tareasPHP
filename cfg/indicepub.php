<!DOCTYPE html>
<html>
<head>

<title>Crear Inidce | FCH Web</title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<link href="assets/img/favicon.ico"  rel="shortcute icon">
<?php
require_once("cfg/func.php");
require_once("tiny.php");
function registro(){
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- BEGIN PLUGIN CSS -->
<!-- BEGIN PLUGIN CSS -->
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/ios-switch/ios7-switch.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END PLUGIN CSS -->

<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->

<link href="assets/plugins/boostrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>

<style type="text/css">

#mensaje{
	display:none;
}

</style>


<script type="application/javascript">
	
	
	
var statSend = false;

function checkSubmit(){
	if(!statSend){
		statSend = true;
		return true;
	}else{
		alert("El Boletín ya se esta publicando...");
		return false;	
	}	
}

</script>

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="" onLoad="javascript:url_get()">
<!-- BEGIN HEADER -->
<?php include("menu.php"); ?>
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">
   <!-- MENSAJE --> 
    <div id="mensaje" style="position: absolute; width:290px; margin-left: 30%; margin-right: auto; margin-top:15%; z-index:200;" class="alert alert-block alert-error fade in">
  <h3 class="alert-heading"><span class="fa fa-align-right"></span><span class="fa fa-envelope-o"></span> Enviando Indice</h3>
  <p>Espere un momento por favor...</p>
  <p style="text-align:center"><img style="margin-top:20px;" src="cfg/progress.gif"></p>
 </div>
   
   <!-- FIN MENSAJE -->
   
    <div class="content">
    <div class="clearfix"></div>
    <ul class="breadcrumb">
      <li>
        <p><a href="Inicio">Inicio</a></p>
      </li>
      <li><a href="#" class="active">Indice</a> </li>
    </ul>
    
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
            
                    
 <!-- BEGIN TAG INPUTS / FILE UPLOADER CONTROLS-->
    
       <div class="row">
        <!-- Modal -->
           <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content" style="width:850px; border-radius:10px; -webkit-border-radius:10px; -moz-border-radius:10px;">
                        <div class="modal-header" style="background-color:#F5F5F5;">
                          <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          
                          <h3 id="myModalLabel" class="semi-bold">Indices - Vista Previa</h3>
                          
                        </div>
                        <div class="modal-body" style="background-color:#FFF;">
                         <div class="grid-body no-border"> 
                              <iframe id="iframe" src="cfg/preview_indice.php" style="border:none;" width="100%" height="320px"></iframe>
                           
                          </div>  
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-times-circle"></i></button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
         <!-- /.modal -->
         
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                <form action="prueba" method="get" target="_self">
                  <div class="pull-right">
                      <a href="BitacoraIndice" title="Ver Indices Publicados" class="btn btn-white"><i class="fa fa-list"></i> Bitacora de Indices</a>
                      <a onClick="javascript:url_get()"  data-toggle="modal" data-target="#myModal" title="Vista Previa del Indice" class="btn btn-default"><i class="fa fa-eye"></i> Vista Previa</a>
                 </form>       
                      
                  
                  </div>
                  
                  <h3><i class="fa fa-list"></i> Editor de<span class="semi-bold"> Indices</span></h3>
                  <p>Publicador de Indices.</p>
                </div>
                
                
               
                <div class="grid-body no-border">
                
                  <div class="row form-row">
                  <form action="PublicarIndice" method="post"  enctype="multipart/form-data" onSubmit="return mostrarMensaje();" >
                                         
                        <div class="input-append col-md-4"> 
                        <label>Titulo del Indice</label>
                        <input type="text" name="titulo" class="form-control" placeholder="titulo" title="Ingrese el titulo del indice"  style="text-transform:uppercase;" value="INDICE DEL DOF Y TIPO DE CAMBIO DEL DOLAR" required>
                        </div>
                        
                        <div class="input-append col-md-4"> 
                        <label>Adjuntos <i style=" font-size:1.2em;cursor:pointer;" class="tip fa fa-info-circle" data-placement="top" data-original-title="<?php max_files(1); ?>"></i></label>
                             <input type="file" class="btn btn-success tip" name="archivo[]" data-toggle="tooltip"  title="Agregar archivos adjunto" data-placement="top" multiple max="2"  required>
                        </div>
                        
                   		 <div class="input-append col-md-2"  style="margin-right:20px;"> 
                        <label>Fecha del Indice</label>
                         <div class="input-append success  date">
                              <input type="text" name="fechar" class="form-control" placeholder="dd/mm/aaaa" value="<?php echo date("m/d/Y"); ?>" required >
                               <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span>
                            </div> 
                        </div> 
                                                
                   </div>
                        
                 
                           
            <div class="form-actions">
                    <div class="pull-right">
                        <input  id="publicar" type="submit" name="publicar" class="btn btn-primary btn-cons-md btn-add " value="Publicar" >          
            
            <a id="cerrar" href="Inicio" class="btn btn-white btn-cons-md " >Cerrar</a>
                    </div>
                  </div>
                </div>
                
                
              
              </div>       
            </div>
           </div>
	   <!-- END TAG INPUTS / FILE UPLOADER CONTROLS-->
      <!-- END PAGE -->
    </div>
    
    </form>
  </div>
</div>

<!-- END CHAT --> 
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- END FOOTER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>

<!-- END CORE JS FRAMEWORK -->
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/ios-switch/ios7-switch.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/js/form_elements.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS --> 	
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script> 	
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS --> 

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script>
    
<?php
}

require_once("cfg/misc.inc");
require_once("cfg/func.php");



if(isset($_POST["fechar"])){ //Se adjuntaron los archivos

$registro = $_POST["fechar"];
$titulo = $_POST["titulo"];
		
	if(isset($_POST["registro"])){
		$registro = date("Y-m-d", strtotime($_POST["registro"])); //Agregamos la hora actual a la fecha proporcionada
	}else{
		$registro = date("Y-m-d");
	}
	
		
	
	/******** CONSULTAMOS LOS CORREOS DE INDICE **************/
	$consulta = mysql_query("SELECT email FROM usuario WHERE indice_emailing='1' ") or die("Error en consulta correo indice: ".mysql_error());
	
	$i = 0;
		
		while($em = mysql_fetch_array($consulta, MYSQL_ASSOC)){ //Creamos el array de correos
			$correos[$i] = $em["email"];
			$i++;
		}
		
	//$correos = array("victor_aldan@hotmail.com","victor.aldan05@gmail.com");
	
	if(count($correos)>0){
		@$adjuntos = moverArchivos(@$_FILES,"../indices/",false);
		//echo $adjuntos[0];
		$status = envio_indices($titulo,$registro,$adjuntos,$correos);
		$status = "true";
		
		if($status){ //Si el envio es correcto se registra en la bitacora
			
			$destinatarios = "";
			
			foreach($correos as $n){
				$destinatarios .= $n.", ";
			}
			
			$num = count($correos); //numero de emails enviados
			
			
			//se insertan los datos en la tabla "bitacora_indices"
			mysql_query("INSERT INTO `bitacora_indices`(`destinatarios`, `num_envio`) VALUES ('".$destinatarios."','".$num."')") or die("Error insertando datos en bitacora: ".mysql_error());
			
			aviso("Indice enviado",1);
		}else{ //No se pudo enviar el correo
			aviso("Error en el envio",3);
			}
	}
			
	
    registro(); // se muestra la interfaz
}else{
    registro();
}
                    
?>
</body>

</html>