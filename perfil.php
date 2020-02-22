<!DOCTYPE html>
<html>

<head>
<?php 
include("cfg/func.php");

if(empty($_GET["id"]) || !isset($_GET["id"])){
	base(1);
}else{
	base();
}

?>
<link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
  
<title>Mi Perfil | FCH Soluciones</title>
<!-- BEGIN PLUGIN CSS -->

<link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/ios-switch/ios7-switch.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" media="screen" />


<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />


<link href="webarch/css/webarch.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	#grupo2{display: none;}
	label i{ font-size:0.8em; margin-top:-20px; margin:0px;}
	select{ cursor:pointer;}
	select:disabled{ cursor: not-allowed;}
</style>

<script>

function cambiarTextfields(selec) { 
	if (selec.value == "OTRO") { 
		document.getElementById('grupo2').style.display = 'block'; 
		
	}else{
		document.getElementById('grupo2').style.display = 'none';
		} 
}
</script>


</head>
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
 
  
<body class="horizontal-menu">
<?php 
	include("menu.php");     
	include("menu_movil.php");
    
	//<!-- BEGIN PAGE CONTAINER-->
function profile(){  
     
	if(isset($_GET["id"])){
		@$id = $_GET["id"];
	}elseif($_POST["id"]){
		@$id = $_POST["id"];
	}else{
		@$id = $_SESSION["id"];
	}

$query = mysql_query("SELECT * FROM usuario WHERE id='$id'") or die(mysql_error()); 
$row = mysql_fetch_array($query,MYSQL_ASSOC);  
?>    
    <div class="page-content condensed" >
      <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
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
            
           
      <div class="clearfix"></div>
      <div class="content" <?php if(isset($_POST["id"]) || isset($_GET["id"])){ echo 'style="margin: 0px;"'; }else{ echo 'style="margin-top: -40px;"'; }?>>
       <?php if($_SESSION["id"]==$id){ ?>
                       <form action="MiPerfil" method="post" enctype="multipart/form-data">
                       <?php }else{ ?>
                       <form action="MiPerfil/<?php echo @$id;?>" method="post" enctype="multipart/form-data">
                       <?php } ?>
        <div class="row" >
          <div class="col-md-12">
            <div class=" tiles white col-md-6" style="padding:0px;">
              <div class="tiles green cover-pic-wrapper"></div>
              <div class="tiles white">
                <div class="row">
                  <div class="col-md-3 col-sm-3">
                    <div class="user-profile-pic"> <img data-src-retina="<?php perfil($id); ?>" data-src="<?php perfil($id); ?>" src="<?php perfil($id); ?>" alt="" height="69" width="69"> </div>
                    <?php
					if($row["cumpleanios"]!=NULL){
					?>
                    <div class="user-mini-description" style="margin-right:0px;">
                      <?php
					 					  
					  if(substr($row["cumpleanios"],5,6) == date("m-d")){ ?>
                      <h1 style="text-align:right;" class="text-success semi-bold"><img style="margin-left:50px;" src="assets/img/pastel.gif"></h1>
                      <?php }else{ ?>
                      <h1 style="text-align:right; margin-bottom:0px;" class="text-success semi-bold"><i class="material-icons" style="font-size:80px; marging-left:60px;">cake</i></h1>                      
                      <?php } ?>
                      <h5 style="text-align:right;"><?php echo substr(fecha($row["cumpleanios"]),0,-8); ?></h5>
									
					</div>
                    <?php
					}
					?>
                                
                  </div>
                  <div class="col-md-8 user-description-box  col-sm-5">
                    <h4 class="semi-bold no-margin"><?php echo $row["nombre"]." ".$row["apellidos"]; ?></h4>
                    <h6 class="no-margin" style="text-transform: uppercase;"><?php acceso($row["tipo"],"1"); echo $row["cargo"]; ?></h6>
                    <br>
                   
                    <p><i class="fa fa-envelope-o"></i><?php echo $row["email"]; ?></p>
                    <p><i class="fa fa-sitemap"></i><?php echo $row["depto"]; ?></p>
                    
                  </div>
                  
                  
                   <?php
							if($_SESSION["tipo"]=="1" || $_SESSION["tipo"]=="2"){
					?>
                   <!-- Permisos -->
            
            <div class="col-md-12">
          <div class="grid simple">
            
            <div class="grid-body no-border">
            <div class="row">
                <div class="col-md-12">
                      <h3><span class="semi-bold">Permisos</span></h3>
                      <p>Marque la casilla para otorgarle privilegios especificos al usuario.</p>
                      <br>
                     
                            <div class="row form-row">
                             <div class="input-append col-md-12 col-sm-12 primary "> 
                               <?php if($row["tipo"]!="1"){ ?>
                               <label class="label">Tipo de usuario</label>
                      			<select name="tipo" style="width:90%; cursor:pointer;" title="Seleccione el tipo de usuario" required>
                                <option value="">Tipo de usuario...</option>
                                <option value="4" <?php if($row["tipo"]=="4"){echo "selected"; } ?>>Cliente</option>
                                <option value="3" <?php if($row["tipo"]=="3"){echo "selected"; } ?>>Colaborador</option>
                                <option value="2" <?php if($row["tipo"]=="2"){echo "selected"; } ?>>Administrador</option>
                                </select>
                               <span class="add-on"><span class="arrow"></span><i class="fa fa-shield"></i></span>
                               <?php
							    }else{ 
							   		if($_SESSION["id"]!="1"){
							   ?>
                              <div class="input-group">
                              <span class="input-group-addon "><i class="fa fa-shield"></i></span>
                              <input type="text" class="form-control" value="Super Administrador" disabled>
                              </div><br>                              
                               <?php
									}else{
								?>
									<select name="tipo" style="width:90%; cursor:pointer;" title="Seleccione el tipo de usuario" required>
                                	<option value="">Tipo de usuario...</option>
                                	<option value="4" <?php if($row["tipo"]=="4"){echo "selected"; } ?>>Cliente</option>
                                	<option value="3" <?php if($row["tipo"]=="3"){echo "selected"; } ?>>Colaborador</option>
                                	<option value="2" <?php if($row["tipo"]=="2"){echo "selected"; } ?>>Administrador</option>
                                    <option value="1" <?php if($row["tipo"]=="1"){echo "selected"; } ?>>Super Administrador</option>
                                	</select>	
									
                                <?php	
										}
								}
								?>
                               </div>
                         </div>
                </div>
            </div>
           
           
            </div>
          </div>
        </div>
            
            <!-- // Permisos -->
              <?php
				}
			?>
                </div>
              </div>
            </div>
            
                        
            <div class="col-md-6 flayer-2">
              <div class="grid simple">
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    <h3>Datos de <span class="semi-bold">Acceso</span></h3>
                    
                    <div class="row row-fluid">
                                               
                            <div class="input-append col-md-4 col-sm-4 primary">
                            <label>Nombre</label>
                            <input type="hidden" value="<?php echo $id; ?>" name="id" >
                            <input type="hidden" value="<?php echo $_SESSION["tipo"]; ?>" name="tipo_admin" >
                            <div class="input-group ">
                              <span class="input-group-addon "><i class="fa fa-user"></i></span>
                              <input id="appendedInput" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $row["nombre"]; ?>" type="text" <?php echo inactivo($_SESSION["tipo"]); ?>> 
                             </div>  
                            </div>
                            <div class="input-append col-md-4 col-lg-4 primary">
                            <label>Apellidos</label>
                              <input id="appendedInput" class="form-control" placeholder="Apellidos" name="apellidos" value="<?php echo $row["apellidos"]; ?>" type="text" <?php echo inactivo($_SESSION["tipo"]); ?>>  
                            </div>
                            <div class="col-md-4">
                           <label>Genero</label>
                                <div class="radio">
                                <input id="male" type="radio" name="genero" value="H" <?php if($row["genero"]=="H"){ echo 'checked="checked"';} ?> <?php echo inactivo($_SESSION["tipo"]); ?>>
                                <label for="male"><i class="fa fa-male"></i> Hombre</label></label>
                                <input id="female" type="radio" name="genero" value="M" <?php if($row["genero"]=="M"){ echo 'checked="checked"';} ?> <?php echo inactivo($_SESSION["tipo"]); ?>>
                                <label for="female"><i class="fa fa-female"></i> Mujer</label></label>
                                </div>
                            </div>
                      </div>      
                   
                     
                                 
                                                                    
                    <div clas="row row-fluid margin-top-10">
                            
                           	 <div class="col-md-4 no-padding">
                                <label class="form-label">Cumpleaños</label>
                                <div class="input-append success date col-md-4 col-lg-10 no-padding">
                                <input type="text" name="cumpleanios" class="form-control" data-provide="datepicker-inline" value="<?php  echo date_format(date_create($row["cumpleanios"]), 'm-d-Y'); ?>">
                                <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                                </div>
                              </div>
                              
                              <div class="col-md-4">
                                <label>Departamento</label>
                                 <div class="input-group  ">
                                      <span class="input-group-addon "><i class="fa fa-sitemap"></i></span>
                                <input style="text-transform:uppercase;" type="text" class="form-control" placeholder="Nombre del Departamento" name="depto" value="<?php echo strtoupper($row["depto"]); ?>" <?php echo depto_inactivo($_SESSION["tipo"]); ?>>
                                 
                                </div>
                               </div>
                               
                               
                               <div class="col-md-4">
                                     <label>Puesto</label>                                     
                                      <div class=" input-group">
                                      <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                      <input style="text-transform:uppercase;" type="text"  name="cargo" class="form-control" value="<?php  echo $row["cargo"];  ?>" placeholder="Cargo o Puesto" title="Ingrese su puesto" <?php echo inactivo($_SESSION["tipo"]); ?>>
                                      </div>
                                </div>
                       </div>
                     
                     <div class="clearfix"></div>
                     
                     <div class="row row-fluid margin-top-10">           
                      <div class="col-md-4 col-lg-4 primary">
                      <label>Empresa</label>
                        <select class="form-control select" name="empresa" data-init-plugin="select" title="Seleccion el grupo" <?php echo inactivo($_SESSION["tipo"]); ?>>
                           
                                  <?php
                    
                                      $result = mysql_query("SELECT DISTINCT id, empresa FROM empresa  WHERE status = '1' Order By empresa ASC") or die(mysql_error());
                                      //Generamos el menu desplegable
                          
                                      while ($emp = mysql_fetch_array($result,MYSQL_ASSOC)){
                                          echo '<option value="'.$emp["id"].'"';
										  
										  
										  if($emp["id"] == $row["idEmpresa"]){ echo "selected";}
										  
										  echo ">".strtoupper($emp["empresa"])."</option>";
                                      }
                                      
                                      mysql_free_result($result);
                            
                                ?>
                            </select>
                       </div>
                          
                       <div class="col-md-4 col-lg-4 primary">
                          <label>Grupo Empresarial</label>
                          <div class=" right">
                           
                            <select class="form-control select" name="grupo" data-init-plugin="select" title="Seleccion el grupo" onChange="cambiarTextfields(this);" required  <?php echo inactivo($_SESSION["tipo"]); ?>>
                           
                                  <?php
                    
                                      $result = mysql_query("SELECT DISTINCT id, grupo FROM grupoemp  WHERE status = '1' Order By grupo ASC") or die(mysql_error());
                                      //Generamos el menu desplegable
                          
                                      while ($dep=mysql_fetch_array($result,MYSQL_ASSOC)){
                                          echo '<option value="'.$dep["id"].'"';
										  
										  
										  if($dep["id"] == $row["idGrupo"]){ echo "selected";}
										  
										  echo ">".strtoupper($dep["grupo"])."</option>";
                                      }
                                      
                                      mysql_free_result($result);
                            
                                ?>
                                <option value="OTRO">OTRO</option>
                            </select>
                            </div>
                        </div>   
                        
                      <div id="grupo2" class="col-md-4 col-sm-4">
                        <label>Nombre del grupo</label>
                         <div class="input-group ">
                              <input style="text-transform:uppercase;" id="appendedInput"  type="text" class="form-control"  placeholder="Ingrese el grupo" name="grupo2" >
                             
                            </div>
                       </div>
                       
                       
                           
                     </div>
                     
                       
                     <div class="clearfix"></div>
                                          
                    <div class="row row-fluid margin-top-10">           
                      <div class="col-md-4 col-lg-4 primary">
                        <label>Email</label>
                          <div class="input-group ">
                          <span class="input-group-addon primary "><i class="fa fa-envelope"></i></span>
                          <input id="appendedInput" name="email" class="form-control" placeholder="Email" value="<?php echo $row["email"]; ?>" type="text" <?php echo inactivo($_SESSION["tipo"]); ?>>
                          </div>
                          </div>
                       
                       
                       <div class="col-md-4 col-lg-4 primary">
                        <label>Nivel</label>
                         <select class="form-control select" name="nivel" data-init-plugin="select" title="Seleccione el nivel" required  <?php echo inactivo($_SESSION["tipo"]); ?>>
                         <option value="">Seleccione...</option>
                         <option value="N1" <?php selected($row["nivel"],"N1"); ?>>Presidente</option>
                         <option value="N2" <?php selected($row["nivel"],"N2"); ?>>Gerente</option>
                         <option value="N3" <?php selected($row["nivel"],"N3"); ?>>Subgerente</option>
                         <option value="N4" <?php selected($row["nivel"],"N4"); ?>>Colaborador</option>
                         <option value="N5" <?php selected($row["nivel"],"N5"); ?>>Auxiliar</option>
                         </select>
                         
                          </div>
                       
                          
                       <div class="col-md-4 col-lg-4 primary">
                          <label>Jefe inmediato</label>
                          <div class=" right">
                            <i class=""></i>
                            <select class="form-control select" name="jefe" data-init-plugin="select" title="Seleccion el jefe"  <?php echo inactivo($_SESSION["tipo"]); ?>>
                             <option value="" >Sin asignar</option>
                                  <?php
                    
                                      $result = mysql_query("SELECT * FROM usuario  WHERE status = '1' AND nivel='N1' OR nivel='N2' OR nivel='N3' Order By nombre ASC") or die(mysql_error());
                                      //Generamos el menu desplegable
                          
                                      while ($jefe = mysql_fetch_array($result,MYSQL_ASSOC)){
                                          echo '<option value="'.$jefe["id"].'"';
										  
										  if($jefe["id"] == $row["jefe"]){ echo "selected";};
										  
										  echo ">".$jefe["nombre"].' '.$jefe["apellidos"].'</option>';
                                      }
                                      
                                      mysql_free_result($result);
                            
                                ?>
                               
                            </select>
                           
                            </div>
                        </div>   
                            
                     </div>
                     
                         
                       <div class="row row-fluid margin-top-10 margin-bottom-10">         
                          
                          <div class="col-md-6 col-lg-6 primary">
                           <label>Contraseña</label>
                           <div class="input-group">
                           <span class="input-group-addon "><i class="fa fa-lock"></i></span>
                          <input id="appendedInput2" class="form-control" name="pass" placeholder="Password" type="password" > 
                          </div>
                          </div>
                          
                          <div class="col-md-6 col-lg-6 primary">
                           <label>Repetir Contraseña</label>
                          <div class="input-group">
                               <span class="input-group-addon "><i class="fa fa-lock"></i></span>
                              <input id="appendedInput2" name="pass2" class="form-control" placeholder="Repetir Password" type="password" >
                              </div>
                        </div>
                		</div>
                         
                </div>
                                   
                  <div class="form-actions">
                    <div class="pull-right">
                        <input type="submit" class="btn btn-success btn-cons-md" value="Guardar">
                        <?php if(isset($_GET["id"])){ ?>
                        	<a href="GestionUsuarios" class="btn btn-white btn-cons-md" ><i class="fa fa-arrow-left"></i> Volver</a>
                        <?php }else{ ?>
                        	<a href="Inicio" class="btn btn-white btn-cons-md" ><i class="fa fa-sign-out"></i> Cerrar</a>
                        <?php } ?>
                    </div>
                  </div>
            		</form>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
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


    <?php
}

    ?>  
</body>    
<?php
include("cfg/misc.inc");
if(isset($_POST["id"])){
	$id = $_POST["id"];	
    $edicion = date("Y-m-d H:i:s");
	$depto = $_POST["depto"];
	$nivel = $_POST["nivel"];
	
    if(isset($_POST["email"])){
		$email = $_POST["email"];
	}
		
	if(isset($_POST["pass"])){
    	$pass = md5($_POST["pass"]);
	}
	
	if(isset($_POST["pass2"])){
    	$pass2 = md5($_POST["pass2"]);
	}
	
	if(isset($_POST["cargo"])){
		$puesto = $_POST["cargo"];
	}
	
	if(isset($_POST["cumpleanios"])){
		@$cumple = date_format(date_create($_POST["cumpleanios"]), 'Y-m-d'); //fecha ingresada mm-dd-YYYY => a la base de datos YYYY-mm-dd
	}
	
		
    
    if(!empty($_POST["pass"]) && !empty($_POST["pass2"])){
       
        if($pass == $pass2){
            mysql_query("UPDATE usuario SET password='$pass' WHERE id='$id'") or die("error password: ".mysql_error());
            aviso("Cambios guardados",1);
        }else{
        
            aviso("Los passwords no concuerdan",3);
           
        }
    }
    
	
	
	
	if($_POST["tipo_admin"] == "1" || $_POST["tipo_admin"] == "2"){ //Cambios solo realizables por un administrador o superior
		
		$genero = $_POST["genero"];
		if($_POST["genero"] == "H"){
			$imagen = "man.gif";
		}else{
			$imagen = "woman.gif";
		}
		$nombre = $_POST["nombre"];
		$apellidos = $_POST["apellidos"];
		$empresa = $_POST["empresa"];
		$jefe = $_POST["jefe"]; 
		
		if($_POST["grupo"] == "OTRO"){
			$gpo = strtoupper($_POST["grupo2"]);
			
			$qinsert = "INSERT INTO `grupoemp`(`grupo`) VALUES ('$gpo')";
			mysql_query($qinsert) or die("Error insertando grupo: ".mysql_error());
			
			$idgrupo = "SELECT `id` FROM `grupoemp` WHERE `grupo` = '$gpo'";
			$idg = mysql_query($idgrupo) or die("Error consultando id grupo: ".mysql_error());
			$idg2 = mysql_fetch_array($idg);
			$grupo = $idg2[0];
				
		}else{
			$grupo = $_POST["grupo"];
		}
		
		
		$query = "UPDATE usuario SET genero='$genero', nombre='$nombre', apellidos='$apellidos', idEmpresa='$empresa', idGrupo='$grupo', cumpleanios='$cumple', jefe='$jefe', imagen='$imagen' WHERE id='$id'";
		
		//echo "grupo: ".$grupo;
				
		mysql_query($query) or die("Error de acceso: ".mysql_error());
	
		if(isset($_POST["tipo"])){ //Cambiar tipo de usuario
			mysql_query("UPDATE usuario SET tipo='$_POST[tipo]' WHERE id='$id'") or die("error tipo: ".mysql_error());
		}
		
		if(isset($_POST["nivel"])){ //Cambiar tipo de usuario
			mysql_query("UPDATE usuario SET nivel='$_POST[nivel]' WHERE id='$id'") or die("error nivel: ".mysql_error());
		}	
	
	}
	
   	
	if(isset($_POST["depto"])){
		 mysql_query("UPDATE usuario SET depto='$depto' WHERE id='$id'") or die("error departamento: ".mysql_error());
	}
	
	
	if(isset($_POST["email"])){
		 mysql_query("UPDATE usuario SET email='$email' WHERE id='$id'") or die("error email: ".mysql_error());
	}
	
	
   mysql_query("UPDATE usuario SET  cargo='$puesto', edicion='$edicion', nivel='$nivel' WHERE id='$id'") or die("error cargo: ".mysql_error());
   
        aviso("Cambios guardados",1);
   
        profile();
	
       
    
}else{
    profile();
}

?>
</html>
