<?php
include("cfg/func.php");
?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/img/favicon.ico"  rel="shortcute icon">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title> Gestión Grupo Empresarial | FCH Soluciones </title>
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

<script>

	function cambiarTextfields(selec) {
		
		/* Departamento */ 
		if (selec.value == "OTRO") { 
			document.getElementById('depto2').style.display = 'block'; 
			
		}else{
			document.getElementById('depto2').style.display = 'none';
			} 
	}
	
	function cambiarTextfields2(selec){
		
		/* Empresa */
		if (selec.value == "OTRA") { 
			document.getElementById('empresa2').style.display = 'block'; 
			
		}else{
			document.getElementById('empresa2').style.display = 'none';
			} 
			
		}
</script>

<script type="text/javascript">
	/* Función que obtiene los datos de las variables y crea una cadena estilo $_GET que se envía a un iframe para generar la vista previa*/
	function url_get(){
		
		var titulo = document.getElementById("titulo").value;
		var numero = document.getElementById("numero").value;
		var anio = document.getElementById("anio").value;
		
		var titulo2 = escape(titulo);
		var numero2 = escape(numero);
		var anio2 = escape(anio);
		
		/* Asigna el contenido del editor al textarea para recuperarlo*/
		var contenido = tinyMCE.get('desc').getContent();
		var con = escape(contenido);
		
		var uri = 'cfg/preview.php?titulo='+titulo+'&numero='+numero+'&anio='+anio+'&contenido='+con;
		//var uri2 = escape(uri);
		
		document.getElementById('iframe').setAttribute('src', uri);
	}


/* Función para habilitar el asunto*/
	window.onload = function(){
      var miCheckbox = document.getElementsByClassName('check');
      miCheckbox.onclick = function(){
        
        if(miCheckbox.checked == "checked"){
           document.getElementById('delete_check').style.display = "block";
      	}
	  }
    }
</script> 

 
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
       <div class="pull-right actions">
       	<button class="btn btn-success btn-cons" type="button" id="btn-new-ticket"><i style="font-size:1.2em; margin-top:-4px; color:#FFF;" class="fa fa-building"></i><i style=" position:relative; font-size:0.9em; margin-top:4px; margin-left:-12px; color:#FFF; z-index:100;" class="fa fa-plus"></i>Nuevo</button>
        </div>
        
        <div class="grid-title no-border" style="border-bottom:1px solid #999;">
        <?php include("menu_gestion.php"); ?>	                  
        	<h2 style=" padding-left:20px;" class="inline text-center"><i class="fa fa-building"></i> Gestor <span class="semi-bold"> Grupo empresarial</span></h2>
        </div>
      </div>
      
      <!-- Nuevo -->
      <form  method="post" action="GestionGrupoEmpresarial" >
      <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 col-lg-6 col-sm-6 ">
            <div class="grid simple " id="new-ticket-wrapper" style="display: none;">
              <div class="grid-title blue no-border">
                <h4 class="semi-bold" ><i style="color:#FFF;" class="fa fa-building-o"></i>Nuevo <strong>Grupo empresarial</strong></h4>
              </div>
              <div class="grid-body">
                  
                  <div class="row form-row">
                  <input type="hidden" name="user" value="<?php echo $_SESSION["tipo"]; ?>"> 
                   
                 
              <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    
                    <div class="row row-fluid">
                                               
                            <div class="input-append col-md-12 col-sm-12 primary">
                            <label>Grupo empresarial</label>
                            <div class="input-group ">
                              <span class="input-group-addon "><i class="fa fa-building"></i></span>
                              <input id="appendedInput" class="form-control" placeholder="nombre" style="text-transform:uppercase" name="grupo" type="text" > 
                             </div>  
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
                          <button class="btn btn-cons btn-white" type="button" id="btn-close-ticket"><i class="fa fa-sign-out"></i> Cerrar</button>
                        </div>
                    </div>
                  </div>           
              </div>
            </div>
          </div>
      <div class="col-md-3"></div>
      </div>
      <!-- /Nuevo-->
 </form>
 
      <div class="row-fluid">
      <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="grid simple ">
            <div class="grid-title green2">
              <h4><i class=" fa fa-list" style="color:#FFF;"></i> <span class="semi-bold">Grupos Registrados</span></h4>
              <div class="tools"><a href="Inicio" title="Cerrar"><i class="material-icons" style="font-size:18px">clear</i></a>
</div>
            </div>
            <div class="grid-body ">
            <form action="cfg/delete_user_checkbox.php" method="post">  
                <table class="table table-hover table-condensed" id="example">
                
                <button type="submit" name="delete_marck" class="btn btn-white delete_check" id="delete_check"  title="Eliminar" onClick="return confirmAction()"><i class="fa fa-times"></i> Eliminar Seleccionados</button>
                <a href="exportar.php" name="exportar" class="btn btn-white exportar"   title="Exportar a excel" ><i class="fa fa-file-text"></i> Exportar</a>
                  <thead>
                    <tr>
                      <th style="width:2%">#</th>
                      <th style="width:30%">Grupo</th>
                      <th style="width:30%">Registro</th>
                      <th style="width:10%">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                   <?php 
              $q = mysql_query("SELECT * FROM grupoemp WHERE status='1' AND id!='0' ORDER BY id ASC") or die(mysql_error());
              while($row = mysql_fetch_array($q,MYSQL_ASSOC)){          
       				?>
                    <tr>
                      <td><span class="muted"><?php echo $row["id"]; ?></span></td>
                      <td class="v-align-middle"><a href="EditarGrupoEmpresarial/<?php echo $row["id"]; ?>" title="Editar Grupo"><?php echo $row["grupo"]; ?></a></td>
                      <td class="v-align-middle"><span class="muted"><?php echo $row["registro"]; ?></span></td>
                      <td align="center"><span class="muted eliminar"><a href="cfg/delete_delete.php?f=0&id=<?php echo $row["id"]; ?>&r=../GestionGrupoEmpresarial&t=grupoemp" title="Eliminar" onClick="return confirmAction()"><i class="fa fa-trash-o"></i></a></span></td>
                    </tr>
                   <?php
			  }
				   ?>
                  </tbody>
                </table>
			</form>
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
	
   mysql_query("INSERT INTO grupoemp (`grupo`) VALUES ('$grupo')") or die(mysql_error());
	   
		aviso("Grupo registrado",1);
		
		
   }else{
	   $men = "Sin permiso para registrar.";
	   aviso($men,2);
	   }
	
    grupo();      
    
}else{
	grupo();
	}
?>
</html>