<?php
include("cfg/func.php");
?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/img/favicon.ico"  rel="shortcute icon">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title> Gestión de Usuarios | FCH Soluciones </title>
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
function usuarios(){
?>

<script>
 function confirmAction(){
       var confirmed = confirm("¿Esta seguro de eliminar el Usuario?");
       return confirmed;
 }
</script>

   <style type="text/css">
   		#grupo2, #empresa2, #test2{display: none;}
		<!-- #depto2, #empresa2, .DTTT{display: none;} -->
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
	if (selec.value == "OTRO") { 
		document.getElementById('grupo2').style.display = 'block'; 
		
	}else{
		document.getElementById('grupo2').style.display = 'none';
		} 
}


function cambiarTextfields2(selec) { 
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
       	<button class="btn btn-success btn-cons" type="button" id="btn-new-ticket"><i style="font-size:1.2em; margin-top:-4px; color:#FFF;" class="fa fa-user"></i><i style=" position:relative; font-size:0.9em; margin-top:4px; margin-left:-12px; color:#FFF; z-index:100;" class="fa fa-plus"></i>Nuevo</button>
        </div>
        
        <div class="grid-title no-border" style="border-bottom:1px solid #999;">
        <?php include("menu_gestion.php"); ?>	                  
        	<h2 style=" padding-left:20px;" class="inline text-center"><i class="fa fa-user"></i> Gestor <span class="semi-bold">de Usuarios</span></h2>
        </div>
      </div>
      
      <!-- Nuevo -->
      <form  method="post" action="GestionUsuarios" >
      <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 col-lg-6 col-sm-6 ">
            <div class="grid simple " id="new-ticket-wrapper" style="display: none;">
              <div class="grid-title blue no-border">
                <h4 class="semi-bold" ><i style="color:#FFF;" class="fa fa-user-plus"></i>Nuevo <strong>Usuario</strong></h4>
              </div>
              <div class="grid-body">
                  
                  <div class="row form-row">
                  <input type="hidden" name="user" value="<?php echo $_SESSION["tipo"]; ?>"> 
                   
                 
              <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    
                    <div class="row row-fluid">
                                               
                            <div class="input-append col-md-4 col-sm-4 primary">
                            <label class="label-auto3">Nombre</label>
                            	<div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input id="appendedInput" class="form-control" placeholder="Nombre" name="nombre" type="text" title="Introduzca el nombre" required> 
                            	</div>
                            </div>
                            <div class="input-append col-md-4 col-lg-4 primary">
                            <label class="label-auto3">Apellidos</label>
                              <input id="appendedInput" class="form-control" placeholder="Apellidos" name="apellidos" type="text" title="introduzca los apellidos"  required>  
                            </div>
                            <div class="col-md-4">
                               <div class="radio">
                                <input id="male" type="radio" name="genero" value="H"  required>
                                <label for="male"><i class="fa fa-male"></i> Hombre</label></label>
                                <input id="female" type="radio" name="genero" value="M">
                                <label for="female"><i class="fa fa-female"></i> Mujer</label></label>
                                </div>
                            </div>
                      </div>      
                   
                     
                                 
                                                                    
                    <div clas="row row-fluid margin-top-10">
                            
                           	 <div class="col-md-4 no-padding">
                             <label class="label-auto3" style="float: left; margin-left:50%;">Cumpleaños</label>
                                <div class="input-append success date col-md-4 col-lg-10 no-padding">
                                <input type="text" name="cumpleanios" class="form-control" data-provide="datepicker-inline" title="Introduzca el cumpleaños"  placeholder="cumpleaños" required>
                                <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                                </div>
                              </div>
                              
                              <div class="col-md-4">
                              <label class="label-auto3">Departamento</label>
                                 <div class="input-group  ">
                                      <span class="input-group-addon "><i class="fa fa-sitemap"></i></span>
                                <input style="text-transform:uppercase;" type="text" class="form-control" placeholder="Departamento" title="Ingrese el departamento" name="depto" required>
                                 
                                </div>
                               </div>
                               
                               
                               <div class="col-md-4">
                               <label class="label-auto3">Cargo</label>                                     
                                      <div class=" input-group">
                                      <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                      <input style="text-transform:uppercase;" type="text"  name="puesto" class="form-control" placeholder="Cargo o Puesto" title="Ingrese su puesto" required>
                                      </div>
                                </div>
                       </div>
                       
                     <div class="clearfix"></div>
                      
                      <div class="row row-fluid margin-top-10">           
                      <div class="col-md-6 col-lg-6 primary">
                      <label class="label-auto3" >Empresa</label>
                      <select class="form-control select" name="empresa" data-init-plugin="select" title="Seleccion el grupo" onChange="cambiarTextfields2(this);" required  style="cursor:pointer;" title="seleccione el grupo empresarial">
                            	<option value="">Empresa....</option>
                           
                                  <?php
                    
                                      $result = mysql_query("SELECT DISTINCT id, empresa FROM empresa  WHERE status = '1' Order By empresa ASC") or die(mysql_error());
                                      //Generamos el menu desplegable
                          
                                      while ($dep=mysql_fetch_array($result,MYSQL_ASSOC)){
                                          echo '<option value="'.$dep["id"].'">'.$dep["empresa"]."</option>";
                                      }
                                      
                                      mysql_free_result($result);
                            		  
                                ?>
                                <option value="OTRA">OTRA</option>
                            </select>
                       </div>
                       
                      <div id="empresa2" class="col-md-6 col-lg-6 primary">
                      <label class="label-auto3">Empresa</label>
                        <input type="text" style="text-transform:capitalize;" class="form-control"  placeholder="Ingrese la empresa" name="empresa2" > 
                       </div>
                      
                      </div>
                      
                      <div class="row row-fluid margin-top-10">     
                       <div class="col-md-6 col-lg-6 primary">
                       <label class="label-auto3" >Grupo</label>
                          <div class=" right">
                          <i class=""></i>
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
                        </div>
                           
                        <div id="grupo2" class="col-md-6 col-lg-6 primary">
                        <label class="label-auto2" style="margin-left:80%;">Grupo</label>
                              <input style="text-transform:uppercase;" type="text" class="form-control"  placeholder="Ingrese el grupo" name="grupo2" >
                       </div>
                           
                     </div>
                                          
                    <div class="row row-fluid margin-top-10">           
                      <div class="col-md-5 col-lg-5 primary">
                          <label class="label-auto3">E-mail</label>
                          <div class="input-group ">
                          <span class="input-group-addon primary "><i class="fa fa-envelope"></i></span>
                          <input id="appendedInput" name="email" class="form-control" placeholder="E-mail" type="text" title="ingrese correo valido" pattern="[a-z]\@ficachi.com.mx" required>
                          </div>
                          </div>
                          
                      <div class="col-md-3 col-lg-3 primary">
                      <label class="label-auto3" >Nivel</label>
                         <select class="form-control select" name="nivel" data-init-plugin="select" title="Seleccione el nivel" style="cursor:pointer;" required>
                         <option value="" >Nivel...</option>
                         <option value="N2">Gerente</option>
                         <option value="N3">Subgerente</option>
                         <option value="N4" selected="selected">Colaborador</option>
                         <option value="N5" >Auxiliar</option>
                         </select>
                         
                          </div>
                             
                       <div class="col-md-4 col-lg-4 primary">
                       <label class="label-auto3">Jefe</label>
                            <select style="cursor:pointer;" class="form-control select" name="jefe" data-init-plugin="select" title="Seleccion el jefe"  required>
                             <option value="" >Jefe inmediato...</option>
                                  <?php
                    
                                      $result = mysql_query("SELECT * FROM usuario  WHERE status = '1' AND nivel='N1' OR nivel='N2' OR nivel='N3' Order By nombre ASC") or die(mysql_error());
                                      //Generamos el menu desplegable
                          
                                      while ($dep=mysql_fetch_array($result,MYSQL_ASSOC)){
                                          echo '<option value="'.$dep["id"].'"';
										  
										  echo ">".$dep["nombre"].' '.$dep["apellidos"].'</option>';
                                      }
                                      
                                      mysql_free_result($result);
                            
                                ?>
                               
                            </select>
                        </div>   
                            
                     </div>
                     
                         
                       <div class="row row-fluid margin-top-10 margin-bottom-10">         
                          
                          <div class="col-md-6 col-lg-6 primary">
                           <div class="input-group">
                           <span class="input-group-addon "><i class="fa fa-lock"></i></span>
                          <input id="appendedInput2" class="form-control" name="pass" placeholder="Password" type="password" title="Ingrese contraseña"  required> 
                          </div>
                          </div>
                          
                          <div class="col-md-6 col-lg-6 primary">
                          <div class="input-group">
                               <span class="input-group-addon "><i class="fa fa-lock"></i></span>
                              <input id="appendedInput2" name="pass2" class="form-control" placeholder="Repetir Password" type="password" title="repita contraseña" required>
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
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title green2">
              <h4><i class=" fa fa-list" style="color:#FFF;"></i> <span class="semi-bold">Usuarios Registrados</span></h4>
              <div class="tools"><a href="Inicio" title="Cerrar"><i class="material-icons" style="font-size:18px">clear</i></a>
</div>
            </div>
            <div class="grid-body ">
            <form action="cfg/delete_user_checkbox.php" method="post">  
                <table class="table table-hover table-condensed" id="example3">
                <input type="hidden" name="return" value="Usuarios">
                <button type="submit" name="delete_marck" class="btn btn-white delete_check" id="delete_check"  title="Eliminar" onClick="return confirmAction()"><i class="fa fa-times"></i> Eliminar Seleccionados</button>
                <a href="exportar.php" name="exportar" class="btn btn-white exportar"   title="Exportar a excel" ><i class="fa fa-file-text"></i> Exportar</a>
                  <thead>
                    <tr>
                      <th style="width:2%">#</th>
                      <th>Nombre</th>
                      <th>Tipo</th>
                      <th>Email</th>
                      <th>Empresa</th>
                      <th>Grupo</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                   <?php 
              $q = mysql_query("SELECT * FROM usuario WHERE status='1' AND id!='1' ORDER BY nombre ASC") or die(mysql_error());
              while($row = mysql_fetch_array($q,MYSQL_ASSOC)){          
       				?>
                    <tr>
                      <td align="right"><span class="muted"><?php echo $row["id"]; ?></span></td>
                      <td class="v-align-middle"><a href="MiPerfil/<?php echo $row["id"]; ?>" title="Editar Perfil"><?php echo $row["nombre"]." ".$row["apellidos"]; ?></a></td>
                      <td class="v-align-middle"><span class="muted" style="text-transform:uppercase;"><?php print(tipo_user($row["tipo"])); ?></span></td>
                      <td><span class="muted"><?php echo $row["email"]; ?></span></td>
                      <td class="v-align-middle"><span class="muted"><?php  empresa($row["idEmpresa"]); ?></span></td>
                      <td class="v-align-middle"><span class="muted"><?php echo grupo_emp($row["idGrupo"]); ?></span></td>
                      <td><span class="muted eliminar"><a href="cfg/delete_user.php?id=<?php echo $row["id"]; ?>&r=../GestionUsuarios" title="Eliminar" onClick="return confirmAction()"><i class="fa fa-trash-o"></i></a></span></td>
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


<script src="assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>

<script src="assets/js/datatables.js" type="text/javascript"></script>
<!-- END JAVASCRIPTS --> 

</body>
<?php
}
include("cfg/misc.inc");
if(isset($_POST["email"])){	
	$depto = $_POST["depto"];
	$nivel = $_POST["nivel"];
	$email = $_POST["email"];
	$cargo = $_POST["puesto"];
	@$cumple = date_format(date_create($_POST["cumpleanios"]), 'Y-m-d'); //fecha ingresada mm-dd-YYYY => a la base de datos YYYY-mm-dd
	$genero = $_POST["genero"];
		if($_POST["genero"] == "H"){
			$imagen = "man.gif";
		}else{
			$imagen = "woman.gif";
	}
    $nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$jefe = $_POST["jefe"]; 
	
	//Grupo	
	if($_POST["grupo"] == "OTRO"){
			$gpo = strtoupper($_POST["grupo2"]);
			
			$qinsert = "INSERT INTO `grupoemp`(`grupo`) VALUES ('$gpo')";
			mysql_query($qinsert) or die("Error insertando grupo: ".mysql_error());
			
			$idgrupo = "SELECT `id` FROM `grupoemp` WHERE `grupo` = '$gpo'";
			$idg = mysql_query($idgrupo) or die("Error consultando idGrupo: ".mysql_error());
			$idg2 = mysql_fetch_array($idg);
			$grupo = $idg2[0];
				
	}else{
			$grupo = $_POST["grupo"];
	}
	
	//Empresa
	if($_POST["empresa"] == "OTRA"){
			$emp = strtoupper($_POST["empresa2"]);
			
			$qinsert = "INSERT INTO `empresa`(`empresa`,`idGrupoemp`) VALUES ('$emp','$grupo')";
			mysql_query($qinsert) or die("Error insertando empresa: ".mysql_error());
			
			$idemp = "SELECT `id` FROM `empresa` WHERE `empresa` = '$emp'";
			$idempre = mysql_query($idemp) or die("Error consultando idEmpresa: ".mysql_error());
			$idempresa = mysql_fetch_array($idempre);
			$empresa = $idempresa[0];
				
	}else{
			$empresa = $_POST["empresa"];
	}
	

	
    if(!empty($_POST["pass"]) && !empty($_POST["pass2"])){
       
        if($_POST["pass"] == $_POST["pass2"]){
            $password = $_POST["pass"];
			$q = mysql_query("INSERT INTO `usuario`(`nombre`, `apellidos`, `cumpleanios`, `idEmpresa`, `idGrupo`, `depto`, `cargo`, `status`, `genero`, `email`, `password`, `imagen`, `jefe`, `nivel`, `tipo`) VALUES ('$nombre','$apellidos','$cumple','$empresa','$grupo','$depto','$cargo','1','$genero','$email', '$password','$imagen','$jefe','$nivel','3')") or die(mysql_error());
	   
			if($q){
            	aviso("Usuario registrado",1);
				usuarios();
			}
        }else{
        
            aviso("Los passwords no concuerdan",3);
			usuarios();
           
        }
    }
         
    
}else{
	usuarios();
	}

?>
</html>