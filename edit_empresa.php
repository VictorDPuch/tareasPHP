<?php
include("cfg/func.php");
base();
?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/img/favicon.ico"  rel="shortcute icon">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title> Editar Empresa | FCH Soluciones </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/material+icons.css" rel="stylesheet">
<link href="assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
<link href="webarch/css/webarch.css" rel="stylesheet" type="text/css" />

<link href="assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/ios-switch/ios7-switch.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" media="screen" />

<?php


 
    
function grupo(){
	
	 if(isset($_GET["id"])){
		  $idg = $_GET["id"];
	  }else{
		 $idg = $_POST["id"];
	  }
	  
?>

<script>
 function confirmAction(){
       var confirmed = confirm("¿Esta seguro de eliminar el Grupo Empresarial?");
       return confirmed;
 }
 
 function cambiarTextfields(selec) {
		
		/* Departamento */ 
		if (selec.value == "OTRO") { 
			document.getElementById('grupo2').style.display = 'block'; 
			
		}else{
			document.getElementById('grupo2').style.display = 'none';
			} 
}
	
</script>

   <style type="text/css">
		#depto2, #empresa2, .DTTT, #grupo2{display: none;}
		 .eliminar a:hover{color: #EF7F1A;}
		 
		 .delete_check{
			 position: absolute;
			 margin-left:80px;
			 float:left;
			 z-index:10;
			 display:none !important;
			 }
			 
		.delete_check:hover{ 
			background-color:#f35958;
		 	color:#FFF;
			border-color:#F35958;
		}
		
		 .exportar{
			 position: absolute;
			 margin-left:260px;
			 float:left;
			 z-index:10;
			 display:none !important;
			 }
			 
		.exportar:hover{ 
			background-color: #197E14;
		 	color:#FFF;
			border-color: #0E4E0B;
		}
	</style>




 
<!-- END CSS TEMPLATE -->
</head>
<!-- BEGIN BODY -->
<body class="horizontal-menu">
<!-- BEGIN HEADER -->
<?php include("menu.php"); ?>

<!-- END HEADER --> 
<!-- BEGIN CONTAINER -->

<div class="page-container row-fluid">

<?php include("menu_movil.php"); ?>
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">
       
    <div class="clearfix"></div>
    <div class="content">
     
      
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
            
      <div class="page-title"> 
       <h3><i class="fa fa-building"></i><span class="semi-bold"> Editor</span> de Empresas</h3>
      </div>
    <?php
	$n = mysql_query("SELECT * FROM empresa WHERE id='$idg'") or die(mysql_error());
	$row = mysql_fetch_array($n,MYSQL_ASSOC);
	?>

      <div class="row">
      <div class="col-md-3"></div>
       <form  method="post" action="EditarEmpresa/<?php echo $idg; ?>" >
      <div class="col-md-6 col-lg-6 col-sm-6 ">
            <div class="grid simple " id="new-ticket-wrapper" >
              <div class="grid-title blue no-border">
                <h4 class="semi-bold" ><i style="color:#FFF;" class="fa fa-building-o"></i><strong><?php echo $row["empresa"]; ?></strong></h4>
              </div>
              <div class="grid-body">
                  
                  <div class="row form-row">
                  <input type="hidden" name="user" value="<?php echo $_SESSION["tipo"]; ?>"> 
                  <input type="hidden" name="autor" value="<?php echo $_SESSION["id"]; ?>">
                   
              <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    
                    <div class="row row-fluid">
                            <div class="col-md-12 col-lg-12 primary">
                         		 <label class="label-auto">Grupo</label>
                                      <select class="form-control select" name="grupo" data-init-plugin="select" title="Seleccion el grupo" onChange="cambiarTextfields(this);" required  style="cursor:pointer;" title="seleccione el grupo empresarial">
                                            <option value="">Grupo empresarial....</option>
                                       
                                              <?php
                                
                                                  $result = mysql_query("SELECT DISTINCT id, grupo FROM grupoemp  WHERE status = '1' Order By grupo ASC") or die(mysql_error());
                                                  //Generamos el menu desplegable
                                      
                                                  while ($dep=mysql_fetch_array($result,MYSQL_ASSOC)){
                                                      echo '<option value="'.$dep["id"].'">'.strtoupper($dep["grupo"])."</option>";
                                                  }
                                                  
                                                  mysql_free_result($result);
                                        
                                            ?>
                                            <option value="OTRO">OTRO</option>
                                        </select>
                      		 </div>                 
                            
                            <div id="grupo2" class="col-md-12 col-lg-12 primary">
                            <label class="label-auto">GRUPO </label>
                            <input type="text" style="text-transform:uppercase;" name="grupo2" class="form-control" placeholder="Grupo empresarial">
                            </div>
                            
                        	<div class="col-md-12 col-lg-12 primary">
                              <label class="label-auto">Empresa</label>
                              <input id="appendedInput" class="form-control" placeholder="Nombre de la empresa" style="text-transform:uppercase" title="Ingrese el nombre de la empresa" name="empresa" type="text" value="<?php echo $row["empresa"]; ?>" required > 
                             </div>
                            
                            <div class="col-md-12">
                            	<label class="label-auto2">Involucrados</label>
                                <select id="multi" name="involucrados[]"  data-init-plugin="select2" style="width:100%; cursor:pointer;" placeholder="Involucrados"  multiple>
                                
                                <?php       
                                     $result = mysql_query("SELECT DISTINCT id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido FROM usuario  WHERE status = '1' Order By primer_nombre ASC") or die(mysql_error());
                                     //Generamos el menu desplegable
                                                        
                                     while ($dep=mysql_fetch_array($result,MYSQL_ASSOC)){
                                       echo '<option value="'.$dep["id"].'">'.$dep["primer_nombre"]." ".$dep["segundo_nombre"]." ".$dep["primer_apellido"]." ".$dep["segundo_apellido"]."</option>";
                                     }                                
                                     mysql_free_result($result);
                                                            
                                ?>
                                </select>
                                <br>
                             </div>
                             <div class="col-md-12">
                             <label>Asistentes</label>
                             <input class="span12 tagsinput" name="asistentes" value="" id="source-tags" type="text" placeholder="Asistentes" />
                             </div>
                             
                      </div>             
                </div>           
                </form>
                </div>
              </div>
            </div>
            
                                  
                  </div>
                  <div class="form-actions row form-row">
                    <div class="col-md-12 margin-top-10">
                      <div class="pull-right">
                        
                          <button type="submit" class="btn btn-success btn-cons ">Registrar</button>
                          <a class="btn btn-cons btn-white" type="button" href="GestionEmpresa"><i class="fa fa-arrow-left"></i> Volver</a>
                        </div>
                    </div>
                  </div>           
              </div>
            </div>
          </div>
      <div class="col-md-3"></div>
      </div>
    </div>
    <!-- END PAGE -->
	

  </div>

</div>


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
<script src="assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script>
<script src="assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>


<script src="assets/js/form_elements.js" type="text/javascript"></script>


<script src="assets/js/support_ticket.js" type="text/javascript"></script>

<!-- END JAVASCRIPTS --> 

</body>
<?php
}
include("cfg/misc.inc");
if(isset($_POST["grupo"])){
if((isset($_POST["user"]) =="1" || isset($_POST["user"]) =="2")){
	
	
	$grupo = strtoupper($_POST["grupo"]);
	$idg = $_POST["id"];
	
   mysql_query("UPDATE `grupoemp` SET `grupo`='$grupo' WHERE id='$idg'") or die(mysql_error());
   
	   
		aviso("Cambios guardados",1);
		
		
   }else{
	   $men = "Sin permiso para editar.";
	   aviso($men,2);
	   }
	
    grupo();      
    
}else{
	grupo();
	}
?>
</html>