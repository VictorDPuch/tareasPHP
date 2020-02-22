<!DOCTYPE html>
<?php
require_once("cfg/func.php");

?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Descargas - FCH Web</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
<link href="assets/img/favicon.ico"  rel="shortcute icon">
<style type="text/css">


.im_box p{ color:#EF7F1A;}
.img_box  .delete a i{ display:none;}
.img_box:hover .delete a i{ display:block;}
.img_box:hover  .delete a i, .img_box:hover .delete a{
	color:#EF7F1A;
	transition-duration: 0.5s;
	-moz-transition-duration: 0.5s;
	-webkit-transition-duration: 0.5s;
	-o-transition-duration:0.5s;
	}
.img_box:hover p{	
	transition-duration: 0.5s;
	-moz-transition-duration: 0.5s;
	-webkit-transition-duration: 0.5s;
	-o-transition-duration:0.5s;
	
	color: #EF7F1A;
	}
	

.delete a{
	
	font-size:1.2em;
	color: #666;
	left:70%;
	top: 0px;
}

i.info{ font-size:0.8em;}
</style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="">

<?php 
		
include("menu.php"); 
?>
  
  <!-- inicio contenido-->
  <div class="page-content"> 
  <div class="content"> 
  
  	  <ul class="breadcrumb">
        <li>
          <p><a href="Inicio">Inicio</a></p>
        </li>
        <li><a href="#" class="active">Descargas</a></li>
      </ul>
      <div class="page-title"> 
       <h3><i class="fa fa-download"></i><span class="semi-bold"> Actualizaciones para FCH Fiscal </h3>
       <p style="font-size:1.2em;">Última actualización disponible para el programa de los clientes de asesoria fiscal del despacho Ficachi y Asociados.<br/>Para el funcionamiento de esta actualización, tendrán que tener instalado previamente la <strong>versión completa del sistema</strong>.</p>
       
      </div>
      
       
  <div id="container">
            
            
            </div><!-- /row fluid-->
           <div class="clearfix"></div>
           <div class="row-fluid">
           
           <!-- Avisos de todos -->
                     <?php 
            //Mostrar grupos
				 
				
				 $dir = "../descargas/";
				
				 if (is_dir($dir)) {
				 if ($dh = opendir($dir)) {
					 
			   while (($file = readdir($dh)) !== false) {
			  
				   if($file == "." || $file == ".." || $file == ".DS_Store" || $file == ".DS_STORE"){
					   
				   }else{
							
       ?>
                          <!-- Lista de avisos -->
							
                                  <div class="col-md-3">
                                      <div class="grid simple" >
                                        <div class="grid-title" style="background-color: #ededed; ">
                                          <h3 class="bold"><i class="fa fa-cloud-download"></i> Descarga </h3>
                                         
                                          <h6 class="text-right" style="font-size:1em; margin-top:-10px;"> <i class="fa fa-calendar"></i> <?php echo date("d-m-Y H:i:s.",filectime($dir.$file)); ?></h6>                    
                                            </div>
                                        <div class="grid-body">                                                             
                                            <p>
                                            <?php
											echo '<div class="img_box" >';
											echo '<div class="delete" ><a href="../descargas/'.$file.'" target="_blank"><span class="fa-stack " ><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-download fa-stack-1x fa-inverse" style="color: #FFF;"></i></span>';
											echo file_ext($file).'<p>'.$file.'<br>';
											echo '<i class="info">tamaño '.size($dir.$file).'</i></p></a></div></div>';
											?>
                                            </p>
                                            
                                        </div>
                                      </div>
                                    </div>
								
							<!--// Lista de avisos -->
                             <?php
			  		}	
				 }
				
			 }			 
		 }    	
        ?>     
        	</div>
       </div><!--/row-->
           
</div><!-- fin container -->
</div><!-- fin content -->
</div><!-- fin page-content --> 

		

<!-- BEGIN CORE JS FRAMEWORK--> 
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<!-- END CORE JS FRAMEWORK --> 
<!-- BEGIN PAGE LEVEL JS --> 	
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script> 	
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS --> 	

<!-- BEGIN CORE TEMPLATE JS --> 
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS --> 
</body>

</html>