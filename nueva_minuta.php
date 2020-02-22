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
function minuta(){
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

<script type="text/javascript" language="javascript">

	function cambiarTextfields(selec){
		
		/* Departamento */ 
		if (selec.value == "otro") { 
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
      <form  method="post" action="NuevaMinuta" enctype="multipart/form-data" >
      <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 col-lg-10 col-sm-10">
            <div class="grid simple " id="new-ticket-wrapper" style="display: none;">
              <div class="grid-title green2 no-border">
                <h4 class="semi-bold" ><i style="color:#FFF;" class="fa fa-list-alt"></i> Información complementaria</h4>
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
                                 <select id="grupo"   class="form-control select" name="grupo" style="cursor:pointer;" data-init-plugin="select" title="Seleccione el grupo empresarial" onChange="cambiarTextfields(this), cargarPueblos();" required>
<option value="">Grupo / Cliente....</option>
</select>
                      		 </div>                 
                            
                            <div id="grupo2" class="col-md-12 col-lg-12 primary">
                            <label class="label-auto">Grupo</label>
                            <input type="text" style="text-transform:uppercase;" name="grupo2" class="form-control" placeholder="Grupo empresarial">
                            </div>
                            
                        	<div class="col-md-12 col-lg-12 primary">
                              <label class="label-auto">Empresa</label>
                              <select id="empresa" class="form-control select" name="empresa" data-init-plugin="select" title="Seleccione la empresa" onChange="cambiarTextfields2(this);" required  style="cursor:pointer;" title="seleccione el grupo empresarial">
                                            <option value="">Empresa....</option>
                                       
                                            <option value="OTRA">OTRA</option>
                                        </select> 
                             </div>
                            <div id="empresa2" class="col-md-12 col-lg-12 primary">
                            <label class="label-auto">Empresa</label>
                            <input type="text" style="text-transform:uppercase;" name="empresa2" class="form-control" placeholder="Empresa">
                            </div>
                            
                            
                            <script>
function cargarProvincias(){
	<?php
	
	$query = mysql_query("SELECT DISTINCT id, grupo FROM grupoemp WHERE status='1' Order by grupo") or die(mysql_error()); 
	$total = mysql_num_rows($query);
	$i = 1;
	
	echo 'var array = [';
	while($row = mysql_fetch_array($query,MYSQL_ASSOC)){
		
		if($i < $total){
			echo '"'.str_replace(" ", "_", $row["grupo"]).'",';
			$i++;
		}else{
			echo '"'.str_replace(" ", "_", $row["grupo"]).'"];';
			}
	}
	?>
	array.sort();
    addOptions("grupo", array);
}


//Función para agregar opciones a un <select>.
function addOptions(domElement, array) {
    var selector = document.getElementsByName(domElement)[0];
    for (grupo in array) {
        var opcion = document.createElement("option");
        opcion.text = array[grupo];
        // Añadimos un value a los option para hacer mas facil escoger los pueblos
        opcion.value = array[grupo].toLowerCase()
        selector.add(opcion);
    }
}



function cargarPueblos() {
    // Objeto de provincias con pueblos
	
	<?php
	
	$query2 = mysql_query("SELECT DISTINCT id, grupo FROM grupoemp WHERE status='1' Order by grupo") or die(mysql_error());
	//echo "total: ".$total; = 5
	echo 'var listaPueblos = {';
	$k = 0;
	
	while($row1 = mysql_fetch_array($query2,MYSQL_ASSOC)){ //Grupos
		
		
		echo str_replace(" ", "_",strtolower($row1["grupo"])).': ["';
		
		
		if($k < $total){
			
			//Empresas
			$query3 = mysql_query("SELECT DISTINCT id, empresa FROM empresa WHERE idGrupoemp='".$row1["id"]."' Order by empresa") or die(mysql_error());
			$total2 = mysql_num_rows($query3); //Total de empresas en cada grupos 
			
			if($total2 != 0){
				$j = 1;
				while($row2 = mysql_fetch_array($query3,MYSQL_ASSOC)){
					
					if($j < $total2){
						echo $row2["empresa"].'","';
						$j++;
					}else{
						echo $row2["empresa"].'"],';
					}
				}
			}
			//Termina Empresas
			
			$k++;
		}else{
			echo $row["grupo"].'"]';
			}
		
	}
	echo '}';
	
	?>
		
	
    var provincias = document.getElementById('grupo')
    var pueblos = document.getElementById('empresa')
    var provinciaSeleccionada = provincias.value
    
    // Se limpian las empresas
    pueblos.innerHTML = '<option value="">Seleccione una empresa...</option>'
    
    if(provinciaSeleccionada !== ''){
      // Se seleccionan los pueblos y se ordenan
      provinciaSeleccionada = listaPueblos[provinciaSeleccionada]
      provinciaSeleccionada.sort()
    
      // Insertamos las empresas
      provinciaSeleccionada.forEach(function(pueblo){
        let opcion = document.createElement('option')
				
		opcion.value = pueblo
        opcion.text = pueblo
		
        pueblos.add(opcion)
      });
	  
	 
	  
	  
    }
    
  }
  
 // Iniciar la carga de provincias solo para comprobar que funciona
cargarProvincias();

</script>
                            
                            
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
                             <input class="span12 tagsinput" name="asistentes" id="source-tags" type="text" placeholder="Asistentes" />
                             </div>
                             
                             <div class="col-md-8">
                             <label class="label-auto">Lugar</label>
                             <input class="form-control" name="lugar" type="text" placeholder="Lugar de reunión" />
                             </div>
                             <div class="col-md-4">
                             <label class="label-auto3" style="padding-right:50px">Fecha</label>
                             <div class="input-append success date col-md-12 col-lg-10 no-padding">
                            <input type="text" name="fecha" class="form-control" value="<?php echo date("m/d/Y"); ?>" required>
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span>
                            </div>
                             </div>
                             
                             <div class="row-fluid">
                            <div class="col-md-12">
                            <div class="radio radio-primary">
                            <input id="reunion" type="radio" name="tipo" value="R">
                            <label for="reunion">Reunión de trabajo</label>
                            <input id="platica" type="radio" name="tipo" value="P">
                            <label for="platica">Platica telefonica</label>
                            <input id="otro" type="radio" name="tipo" value="O">
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
                            <input name="tema" type="text" class="form-control" placeholder="Tema">
                            
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
      <div class="col-md-1"></div>
      </div>
      
      <!-- /Nuevo-->

	<!-- <div class="row">
     <div class="col-md-1"></div>
     <a style="cursor:pointer;" type="button" id="btn-new-ticket2">
      <div class="col-md-10 col-lg-10 col-sm-10">
            <div class="grid simple" id="complemento" style="margin-bottom:-8px">
              <div class="grid-title green2 no-border" >
                <h4 class="semi-bold" ><i style="color:#FFF;" class="fa fa-list-alt"></i> Información complementaria</h4>
              </div>
            </div>
      </div>
      </a>
     <div class="col-md-1"></div>
     </div>-->
    
      <div class="row">
      	<div class="col-md-1"></div>
        <div class="col-md-10 col-lg-10 col-sm-10">
          <div class="grid simple ">
            <div class="grid-title blue">
              <h4><i style="color:#FFF;" class="fa fa-file-text-o"></i> Minuta</h4>
              <div class="tools"><a href="Inicio" title="Cerrar"><i class="material-icons" style="font-size:18px">clear</i></a>
</div>
            </div>
            <div class="grid-body ">
             <div class="row form-row">
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
                <textarea id="text-editor" name="comentarios" style="resize:vertical;"  placeholder="Contenido..." class="form-control" rows="12"></textarea>
                </div>
             </div>
            
            <div class="form-actions row form-row">
            <div class="col-md-12 margin-top-10">
                <div class="pull-right">
                <button class="btn btn-success btn-cons" type="submit"> Guardar</button>
                <a class="btn btn-white btn-cons" type="button" href="Inicio">Cancelar</a>
                </div>
             </div>
             </div>
             
            </div>
            
            
             
             
          </div>
        </div>
        <div class="col-md-1"></div>     
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

if(isset($_POST["autor"]) || isset($_POST["user"]) == "1" || isset($_POST["user"]) == "2"){ //Solo si el usuario es superadmin o administrador
	
	//Recepcion de variables
	$autor = $_POST["autor"];
	
	if($_POST["grupo"]=="otro"){
		
		//Creamos el grupo nuevo
		$grupo2 = $_POST["grupo2"];
		$gn = mysql_query("INSERT INTO `grupoemp`(`grupo`, `status`) VALUES ('$grupo2', '1')") or die(mysql_error());
		$cliente = mysql_insert_id(); //asignamos el id del grupo recien creado
		
		//Creamos la empresa nueva
		$empresa2 = $_POST["empresa2"];
		$gn = mysql_query("INSERT INTO `empresa`(`idGrupoemp`, `empresa`, `status`) VALUES ('$cliente', '$empresa2', '1')") or die(mysql_error());
		$empresa = mysql_insert_id(); //asignamos el id de la empresa recien creada
		
	}else{
		//ID Grupo
		$grupo_temp = str_replace("_", " ",strtolower($_POST["grupo"])); //Reemplazamos los _ por espacios resultado de la lista automatica de seleccion de empresa
		$r = mysql_query("SELECT id FROM grupoemp WHERE grupo='$grupo_temp' LIMIT 1");
		$rf = mysql_fetch_array($r, MYSQL_ASSOC);	
		$cliente = $rf["id"]; //asignamos el id del grupo seleccionado	
		
		//ID Empresa
		$empresa_temp = str_replace("_", " ",strtolower($_POST["empresa"])); //Reemplazamos los _ por espacios resultado de la lista automatica de seleccion de empresa
		$s = mysql_query("SELECT id FROM empresa WHERE empresa='$empresa_temp' LIMIT 1");
		$sf = mysql_fetch_array($s, MYSQL_ASSOC);
		$empresa = $sf["id"]; //asignamos el id del grupo seleccionado		
	}
	
	$proyecto = $_POST["proyecto"];
	$tema = $_POST["tema"];
	$comentarios = $_POST["comentarios"];
	$tipo = $_POST["tipo"];
	$lugar = $_POST["lugar"];
	$fecha = $_POST["fecha"];
	
	mysql_query("INSERT INTO minutas (autor, cliente, empresa, proyecto, tema, comentarios, tipo, lugar, registro) VALUES ('$autor','$cliente','$empresa','$proyecto','$tema','$comentarios','$tipo','$lugar','$fecha')") or die(mysql_error());
	$idminuta = mysql_insert_id(); //asignamos el id de la minuta recien creada
	
	//Insertamos los asistentes
	if(isset($_POST["asistentes"])){
		$asistentes = explode(",",$_POST["asistentes"]);
		
		for($i=0;$i<count($asistentes);$i++){     
			mysql_query("INSERT INTO contactos (autor, idEmpresa, nombre) VALUES ('$autor','$empresa','$asistentes[$i]')") or die("Insertando contactos: ".mysql_error());   
		} 
	}
	
	//Insertamos a los involucrados vinculados a la empresa
	if(isset($_POST["involucrados"])){
		$involucrados = $_POST["involucrados"];
		array_push($involucrados, $autor);	
		
		for($i=0;$i<count($involucrados);$i++){     
			mysql_query("INSERT INTO empresacolaborador (idEmpresa, idUsuario, autor) VALUES ('$empresa','$involucrados[$i]','$autor')") or die("Error en EmpresaColaborador".mysql_error());   
		} 
	}
	
	
	@$adjuntos = moverArchivos(@$_FILES,"adjuntos/",false);
	
	if(count($adjuntos)>0){
		for($i=0;$i<count($adjuntos);$i++){//Arreglo ubicaciones lo devuelve la funcion moverArchivos en func.php
			mysql_query("INSERT INTO archivos (`idUsuario`, `idTareaminuta`, `nombre`, `tipo`, `status`) VALUES ('$autor', '$idminuta', '$adjuntos[$i]', 't','1')") or die("Error al insertar archivo: ".mysql_error());
		}
	}
	
	
	aviso("Minuta registrada",1);
	minuta();
	
}else{
	minuta();
	}
?>
</html>