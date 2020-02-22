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
<title> Editar Grupo | FCH Soluciones </title>
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
</script>

   <style type="text/css">
		#depto2, #empresa2, .DTTT{display: none;}
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
       <h3><i class="fa fa-building"></i><span class="semi-bold"> Gestor</span> de Grupos empresariales</h3>
      </div>
    <?php
	$n = mysql_query("SELECT grupo FROM grupoemp WHERE  id='$idg'") or die(mysql_error());
	$row = mysql_fetch_array($n,MYSQL_ASSOC);
	?>
 
      <div class="row-fluid">
      <div class="col-md-2"></div>
        <div class="col-md-10">
          <div class="grid simple ">
           
            <form  method="post" action="EditarGrupoEmpresarial/<?php echo $idg; ?>" >
     		<div class="col-md-10 col-lg-10 col-sm-10">
            <div class="grid simple">
              <div class="grid-title blue no-border">
                <h4 class="semi-bold" ><i style="color:#FFF;" class="fa fa-building-o"></i>Editar <strong>Grupo empresarial</strong></h4>
              </div>
              <div class="grid-body">
                  
              <div class="row form-row">
              <input type="hidden" name="user" value="<?php echo $_SESSION["tipo"]; ?>">
              <input type="hidden" name="id"  value="<?php echo $idg; ?>">   
                 
              <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-body no-border">
                  <div class="row-fluid">
                                               
                            <div class="input-append col-md-12 col-sm-12 primary">
                            <label>Grupo empresarial</label>
                            <div class="input-group ">
                              <span class="input-group-addon "><i class="fa fa-building"></i></span>
                              <input id="appendedInput" class="form-control" placeholder="nombre" style="text-transform:uppercase" name="grupo" type="text" value="<?php echo $row["grupo"]; ?>"> 
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
                        
                          <button type="submit" class="btn btn-success btn-cons ">Guardar</button>
                          <a class="btn btn-cons btn-white" type="button" href="GestionGrupoEmpresarial"><i class="fa fa-arrow-left"></i> Volver</a>
                        </div>
                    </div>
                  </div>           
              </div>
            </div>
          </div>
			</form>
           
          </div>
        </div>
      <div class="col-md-2"></div>   
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