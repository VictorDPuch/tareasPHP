<?php
include("cfg/func.php");
?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/img/favicon.ico"  rel="shortcute icon">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title> Nueva Minuta | FCH Soluciones </title>
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
<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/ios-switch/ios7-switch.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" media="screen" />


<?php
function empresa_reg(){
?>



<!--<script language="JavaScript" type="text/javascript">

   window.onbeforeunload = function preguntarAntesDeSalir()
    {
        return "¿Seguro que quieres salir?";
    }

</script>-->


   <style type="text/css">
		#depto2, #empresa2, .DTTT, #grupo2, #empresa2, #imgmodal{display: none;}
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
			document.getElementById('grupo2').style.display = 'block'; 
			
		}else{
			document.getElementById('grupo2').style.display = 'none';
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

<script>
function mostrar_titulo(){
			document.getElementById("tema").value = document.getElementById("titulo").value;
		}

</script>
 

<!--campos dinamicos-->
<script type="text/javascript" language="javascript">// <![CDATA[  
/* Abrimos etiqueta de código Javascript */  
/* Partimos por definir una variable llamada posicionCampo. Esta variable servirá como índices para marcar cuantos campos se han agregado dinámicamente. La inicializamos en 1, ya que la primera llamada ocurrirá cuando no hayan campos agregados */  
var posicionCampoins = 1;  
/* Declaramos la función agregarUsuario( ) */  
function agregarTareas() {  
/* Declaramos una variable llamada nuevaFila y a ella le asignamos la recuperación del elemento HTML designado por el id tablaUsuarios. En este caso, la tabla en la que manejamos los campos dinámicamente y llamamos a la función insertRow para agregar una fila */  
    nuevaFila = document.getElementById("tablaContenido").insertRow(-1);  
    /* Asignamos a la propiedad id de nuevaFila el valor de posicionCampo, que inicializamos en 1 */  
    nuevaFila.id = posicionCampoins;  
/* Luego en otra variable llamada nuevaCelda, agregaremos una celda a la tabla, mediante la función insertCell */  
    nuevaCelda = nuevaFila.insertCell(-1);  
/* Con la celda creada, insertamos dinámicamente un campo de texto, el cual almacenaremos en un array llamado nombre, con una posición equivalente a la variable posicionCampo. Una vez terminado, repetimos la acción para el sitio Web y correo, asignando al array respectivo */  
    nuevaCelda.innerHTML = '<li style="line-height:0px; margin-top:15px;"><td><input  style="margin-top:-15px" type="text"  name="subproceso[]" placeholder="Tarea" class="form-control"></td>'; 
	nuevaCelda = nuevaFila.insertCell(-1);  
    nuevaCelda.innerHTML = '<td><select style="cursor:pointer;" class="form-control" name="subproceso[]" data-init-plugin="select2"><option value="">Seleccione...</option><option value="1">Joaquín Arroniz</option><option value="2">Pablo Sánchez</option></select></td>'; 
	
	
	nuevaCelda = nuevaFila.insertCell(-1);  
    nuevaCelda.innerHTML = '<td><div class="input-append success date col-md-12 col-lg-10 no-padding"><input type="date"  name="tareas[]" ><span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span></div></td></li>'; 
	nuevaCelda = nuevaFila.insertCell(-1);  
   

/* Finalmente añadimos una última celda para las acciones y ahí agregamos un botón llamado Eliminar, el cual al ser presionado (definiendo la propiedad onClick), llamará a una función eliminarUsuario, pasando como parámetro la fila correspondiente */  
	 
    nuevaCelda.innerHTML = "<td><button tittle='Eliminar' class='btn btn-danger' onclick='eliminarCampo(this)'><a title='Eliminar' style='color:#FFF'><i class='fa fa-trash-o'></i></a></button></td></tr>";  
/* Incrementamos el valor de posicionCampo para que empiece a contar de la fila siguiente */  
  
}  
  
/* Definimos la función eliminarUsuario, la cual se encargará de quitar la fila completa del formulario. No es necesario hacer modificaciones sobre este código */  
  
function eliminarCampo(obj) {  
    var oTr = obj;  
    while(oTr.nodeName.toLowerCase() != 'tr') {  
        oTr=oTr.parentNode;  
    }  
    var root = oTr.parentNode;  
    root.removeChild(oTr);  
}  
  
/* Cerramos el código Javascript */  
  
</script>  
<!--fin campos dinamicos-->
 
<!-- END CSS TEMPLATE -->
</head>
<!-- BEGIN BODY -->
<body class="horizontal-menu">
<!-- BEGIN HEADER -->
<?php include("menu.php"); ?>

<!-- END HEADER --> 
<!-- BEGIN CONTAINER -->

<div class="page-container row-fluid">

<?php //include("menu_movil.php"); ?>
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">
   
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
            
      <div class="page-title" style="margin-top:-10px;"> 
       
       <div class="pull-right actions">
       	<button class="btn btn-primary btn-cons" type="button" id="btn-new-ticket"><i style="font-size:1.2em; margin-top:-4px; color:#FFF;" class="fa fa-chevron-circle-down"></i> Agregar datos</button>
        </div>
        
        <div class="grid-title no-border" style="border-bottom:1px solid #999;" style="margin-top:-5px;">                
        	<h3 id="titulo" style="" class="inline text-left"> Nueva Minuta </h3>
        </div>
      </div>
      
      
                
      <!-- Nuevo -->
      <form  method="post" action="NuevaMinuta" >
      <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8 col-lg-8 col-sm-8 ">
            <div class="grid simple " id="new-ticket-wrapper" style="display: none;">
              <div class="grid-title green2 no-border">
                <h4 class="semi-bold" >Información complementaria</h4>
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
                         		 <label class="label-auto">Cliente</label>
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
                              <select class="form-control select" name="empresa" data-init-plugin="select" title="Seleccion el grupo" onChange="cambiarTextfields2(this);" required  style="cursor:pointer;" title="seleccione el grupo empresarial">
                                            <option value="">Empresa....</option>
                                       
                                              <?php
                                
                                                  $result = mysql_query("SELECT DISTINCT id, empresa FROM empresa  WHERE status = '1' Order By empresa ASC") or die(mysql_error());
                                                  //Generamos el menu desplegable
                                      
                                                  while ($dep=mysql_fetch_array($result,MYSQL_ASSOC)){
                                                      echo '<option value="'.$dep["id"].'">'.strtoupper($dep["empresa"])."</option>";
                                                  }
                                                  
                                                  mysql_free_result($result);
                                        
                                            ?>
                                            <option value="OTRA">OTRA</option>
                                        </select> 
                             </div>
                            <div id="empresa2" class="col-md-12 col-lg-12 primary">
                            <label class="label-auto">EMPRESA </label>
                            <input type="text" style="text-transform:uppercase;" name="empresa2" class="form-control" placeholder="Empresa">
                            </div>
                            
                            <div class="col-md-12">
                            	<label class="label-auto2">Involucrados</label>
                                <select id="multi" name="involucrados[]"  data-init-plugin="select2" style="width:100%; cursor:pointer;" placeholder="Involucrados"  multiple>
                                
                                <?php       
                                     $result = mysql_query("SELECT DISTINCT id, nombre, apellidos FROM usuario  WHERE status = '1' Order By nombre ASC") or die(mysql_error());
                                     //Generamos el menu desplegable
                                                        
                                     while ($dep=mysql_fetch_array($result,MYSQL_ASSOC)){
                                       echo '<option value="'.$dep["id"].'">'.$dep["nombre"]." ".$dep["apellidos"]."</option>";
                                     }                                
                                     mysql_free_result($result);
                                                            
                                ?>
                                </select>
                                <br>
                             </div>
                             <div class="col-md-12">
                             <label>Asistentes</label>
                             <label class="label-auto">Asistentes</label>
                             <input class="span12 tagsinput" name="asistentes" id="source-tags" type="text" placeholder="Asistentes" />
                             </div>
                             
                             <div class="col-md-8">
                             <label class="label-auto">Lugar</label>
                             <input class="form-control" name="lugar" type="text" placeholder="Lugar de reunión" />
                             </div>
                             <div class="col-md-4">
                             <label class="label-auto3" style="padding-right:50px">Fecha</label>
                             <div class="input-append success date col-md-12 col-lg-10 no-padding">
                            <input type="text" name="fecha" class="form-control" value="<?php echo date("m/d/Y"); ?>">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span>
                            </div>
                             </div>
                             
                             <div class="row-fluid">
                            <div class="col-md-12">
                            <div class="radio radio-primary">
                            <input id="reunion" type="radio" name="tipo" value="reunion">
                            <label for="reunion">Reunión de trabajo</label>
                            <input id="platica" type="radio" name="tipo" value="platica">
                            <label for="platica">Platica telefonica</label>
                            <input id="otro" type="radio" name="tipo" value="otro">
                            <label for="otro">Otro</label>
                            </div>
                            </div>
                            </div>
                            
                            <div class="col-md-12">
                            <label class="label-auto">Proyecto</label>
                            <input name="proyecto" type="text" class="form-control" placeholder="Proyecto">
                            </div>
                            
                            <div class="col-md-12">
                            <label class="label-auto">Tema</label>
                            <input id="tema" name="tema" onKeyPress="mostrar_titulo();" type="text" class="form-control" placeholder="Tema">
                            
                            </div>
                             
                      </div>             
                </div>           
                
                </div>
              </div>
            </div>
            
                                  
                  </div>
                  <div class="form-actions row form-row">
                    <div class="col-md-12 margin-top-10">
                      <div class="pull-right">
                        
                          <button class="btn btn-cons btn-white" type="button" id="btn-close-ticket">Continuar</button>
                        </div>
                    </div>
                  </div>           
              </div>
            </div>
      </div>
      <div class="col-md-2"></div>
      </div>
      
      <!-- /Nuevo-->

 
      <div class="row-fluid">
      <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="grid simple ">
            <div class="grid-title blue">
              <h4><i style="color:#FFF;" class="fa fa-file-text-o"></i> Minuta</h4>
              <div class="tools"><a href="Inicio" title="Cerrar"><i class="material-icons" style="font-size:18px">clear</i></a>
</div>
            </div>
            <div class="grid-body ">
             <div class="row-fluid">
             	<div class="col-md-8">
                 <div  class="boton">
                    <input accept="*" class="btn btn-mini tip"  name="archivo[]"  type="file" style="width: 290px;" data-toggle="tooltip" title="Agregar archivos" data-placement="right" multiple> 
                    </div>
                </div>

                <div class="col-md-4">
                <button type="button" class="btn btn-success btn-cons tip pull-right" data-toggle="modal" data-placement="right" title="Agrega una fila de campos" data-target="#add_tareas"><i class="fa fa-plus-square" title="Agrega una fila de campos"></i> Tarea</button>
                
                <!-- inicia ventana modal-->
                <div class="modal fade" id="add_tareas" tabindex="-1" role="dialog" aria-labelledby="AISHakjsb myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
                <h4 id="myModalLabel" class="semi-bold">Nueva Tarea</h4>
                </div>
                <div class="modal-body">
                <div class="row form-row">
                <div class="col-md-2">
                <button onClick="agregarTareas()" style="margin:5px 5px 5px 0px;" id="addins" name="addins" type="button" class="btn btn-success btn-cons tip" data-toggle="tooltip" title="Agregar Tareas" data-placement="right"><i class="fa fa-plus-square" title="Agrega una fila de campos"></i> Agregar</button>
                 </div>
                 </div>
                <div class="row form-row" > 
                <div class="col-md-12"><ol>
                <table class="table no-more-tables" id="tablaContenido" style="margin-left:-30px;">
                <tbody>
                <tr><td><strong>Tarea</strong></td><td><strong>Responsable</strong></td><td><strong>Entrega</strong></td><td><strong>Eliminar</strong></td></tr>
                
                
                <tr id="1">
                <td>
                <li style="line-height:0px; margin-top:15px;">
                <input style="margin-top:-15px" type="text" name="tareas[]" placeholder="Tarea" class="form-control">
                </li>
                </td>
                <td>
                
                                <select name="tareas[]"  style="width:100%; cursor:pointer;" >
                                <option value="">Responsable...</option>
                                <?php       
                                     $result = mysql_query("SELECT DISTINCT id, nombre, apellidos FROM usuario  WHERE status = '1' Order By nombre ASC") or die(mysql_error());
                                     //Generamos el menu desplegable
                                                        
                                     while ($dep=mysql_fetch_array($result,MYSQL_ASSOC)){
                                       echo '<option value="'.$dep["id"].'">'.$dep["nombre"]." ".$dep["apellidos"]."</option>";
                                     }                                
                                     mysql_free_result($result);
                                                            
                                ?>
                                
                                </select>
                </td>
                <td>
                 			<!-- <div class= "date... "-->
                             <div class="input-append success col-md-12 col-lg-10 no-padding">
                            <input type="date" name="tareas[]" class="form-control">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span>
                            </div>
                </td>
                <td>
                <button tittle="Eliminar" class="btn btn-danger" onclick="eliminarCampo(this)">
                <a title="Eliminar" style="color:#FFF"><i class="fa fa-trash-o"></i></a>
                </button>
                </td>
                </tr>
                </tbody>
                </table></ol>
                </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Continuar</button>
                </div>
                </div>
                
                </div>
                
                </div>
                <!-- termina Ventana Modal-->
                </div>
                
                <div class="col-md-12">
                <textarea style="resize:vertical;" id="text-editor" placeholder="Contenido..." class="form-control" rows="15"></textarea>
                </div>
             </div>
            </div>
             
            <div class="form-actions">
                <div class="pull-right">
                <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Guardar</button>
                <a class="btn btn-white btn-cons" type="button" href="Inicio">Cancelar</a>
                </div>
             </div>
    
    
          </div>
          
          
          
          
          
        </div>
      <div class="col-md-2"></div>      
      </div>
      </form>
    </div>
    <!-- END PAGE -->
	

  </div>

</div>

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
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script>
<script src="assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>

<script src="assets/js/form_elements.js" type="text/javascript"></script>
<script src="assets/js/support_ticket.js" type="text/javascript"></script>

<!-- END JAVASCRIPTS --> 

</body>
<?php
}
include("cfg/misc.inc");

if(isset($_POST["autor"])){
if((isset($_POST["user"]) == "1" || isset($_POST["user"]) == "2")){ //Solo si el usuario es superadmin o administrador
	
	//Recepcion de variables
	if(empty($_POST["grupo2"])){
		$grupo = $_POST["grupo"];
		$band = true;
		//echo "grupo 1";
	}else{
		$grupo = strtoupper($_POST["grupo2"]);
		$band = false;
		//echo "grupo 2";
	}
	$empresa = strtoupper($_POST["empresa"]);
	$registro = date("Y-m-d H:i:s");
	$autor = $_POST["autor"];
	@$asistentes = explode(",",$_POST["asistentes"]);
	@$involucrados = $_POST["involucrados"];
	
		
	//echo "Total involucrados: ".count($involucrados)."<br>";
	//Procesamos los datos
	
	/* TEST */
	//echo "Grupo: ".$grupo;
	//echo "<br>";
	//echo "Empresa: ".$empresa;
	//echo "<br>";
	//echo "Autor: ".$autor;
	//echo "<br>";
	//echo "Asistentes: ".$asistentes[0].", ".$asistentes[1].", ".$asistentes[2];
	//echo "<br>";
	//echo "Involucrados: ".$involucrados[0].",".$involucrados[1];
	//$q = true;
	/*/
	
	/*/
	if($band == true){ //Grupo se seleccionó de la lista
		$q = mysql_query("INSERT INTO `empresa`(`empresa`,`idGrupoemp`, `status`, `registro`) VALUES ('$empresa','$grupo', '1', '$registro')") or die(mysql_error());
		$error = mysql_error();
		
	}else{ //Se ingresó un nuevo Grupo y se debe conseguir el id 
		//registramos el grupo
		 mysql_query("INSERT INTO `grupoemp`(`grupo`,`status`, `registro`) VALUES ('$grupo', '1', '$registro')") or die(mysql_error());
		
		//optenemos el id
		$query_grup = mysql_query("SELECT id FROM `grupoemp` WHERE registro='$registro'") or die("Error en la consulta: ".mysql_error());
		$resultado_grup = mysql_fetch_array($query_grup, MYSQL_ASSOC);
			
		$grupo = $resultado_grup["id"]; //Id de la empresa
		
		//se registra la empresa con el id del grupo nuevo
		$q = mysql_query("INSERT INTO `empresa`(`empresa`,`idGrupoemp`, `status`, `registro`) VALUES ('$empresa','$grupo', '1', '$registro')") or die(mysql_error());
		$error = mysql_error();
	}
	
	
	$query = mysql_query("SELECT id FROM `empresa` WHERE registro='$registro'") or die("Error en la consulta: ".mysql_error());
	$resultado = mysql_fetch_array($query, MYSQL_ASSOC);
			
	$idEmpresa = $resultado["id"]; //Id de la empresa
	
	
	/*Registramos los asistentes a la tabla Contactos*/
	
	if($asistentes[0] != ""){//Verificamos si se agregaron asistentes
		foreach($asistentes as $n){
				mysql_query("INSERT INTO `contactos`(`autor`,`idEmpresa`, `nombre`, `status`,`registro`) VALUES ('$autor','$idEmpresa','$n', '1', '$registro')") or die(mysql_error());
		}
	}
	
	
	//Creamos la relación empleados con la empresa
	if(count($involucrados)>0){//Verificamos si existen empleados relacionados con la empresa
		foreach($involucrados as $n){
				mysql_query("INSERT INTO `empresacolaborador`(`idEmpresa`, `idUsuario`, `autor`, `registro`) VALUES ('$idEmpresa','$n', '$autor', '$registro')") or die(mysql_error());
		}
	}
	/**/
	
	if($q){
		aviso("Empresa registrada",1);
		empresa_reg();
	}else{
		aviso("error: ".$error,3);
		empresa_reg();
		}
			
   }else{
	   $men = "Sin permiso.";
	   aviso($men,2);
	   }
	     
    
}else{
	empresa_reg();
	}
?>
</html>