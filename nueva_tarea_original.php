<!DOCTYPE html>
<html>
<?php include("cfg/func.php"); ?>

<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Nueva Tarea | FCH Soluciones</title>
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
function nueva_tarea(){
?>
<style type="text/css">
	#grupo2, #empresa2{display: none;}
	 #test2, select2-drop, #example2_wrapper .row, #example3_wrapper .row, #example2 td.center, #example2 th.sorting:first-child {display: none}
	 i.fa-plus-circle:hover{ cursor:pointer;}
	 ul.select2-results scroll-content scroll-scrollx_visible scroll-scrolly_visible{ margin-bottom:none;}
	 
	 .datos input, .datos select, .datos .select2-drop-mask { margin-bottom: 10px;}
	 select:hover {cursor: pointer;}
</style>





<!--<script language="JavaScript" type="text/javascript">

   window.onbeforeunload = function preguntarAntesDeSalir()
    {
        return "¿Seguro que quieres salir?";
    }

</script>-->

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
</head>


<body class="horizontal-menu">
 
<?php include("menu.php"); ?>



<div class="page-container row-fluid">

<?php include("menu_movil.php"); ?>

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

<?php 
	$id = $_SESSION["id"];
	$nivel = $_SESSION["nivel"];
?>
<!-- Contenido -->

<!-- Formulario Registro de tarea -->
<div class="row">
<div class="col-md-12">
<div class="grid simple form-grid">
<div class="grid-title blue">
<h4 id="titulo" style="font-weight:bold;">Nueva tarea</h4>
<div class="tools">
<a style="cursor:pointer;" onClick="window.history.back()" title="Salir" ><i class="material-icons" style="font-size:18px">clear</i></a>
</div>
</div>
<div class="grid-body no-border">
<div class="row column-seperation" style="padding-top:10px;">
<div class="col-md-6 datos">
<div class="row row-fluid">
<div class="col-md-12">
<form action="NuevaTarea" name="form1" method="post" enctype="multipart/form-data">
<label class="label-auto">Tarea</label>
<input id="tarea" name="tarea" type="text" class="form-control" placeholder="Tarea"  title="Ingrese el nombre de la tarea" required>
</div>
<div class="col-md-12">
<label class="label-auto">Solicitante</label>
<input name="solicitante" type="text" class="form-control" placeholder="Solicitante" title="Ingrese el solicitante" required>
</div>
<div class="col-md-12">
<label class="label-auto">Cliente</label>
<select id="grupo" class="form-control select" name="grupo" data-init-plugin="select" title="Seleccione el grupo empresarial" onChange="cambiarTextfields(this), cargarPueblos();" required>
<option value="">Grupo / Cliente....</option>
</select>
</div>

<div id="grupo2" class="col-md-12 col-lg-12 primary">
<label class="label-auto">Nuevo Grupo </label>
<input type="text" style="text-transform:uppercase;" name="grupo2" class="form-control" placeholder="Grupo empresarial">
</div>
                            
<input type="hidden" name="autor" value="<?php echo $_SESSION["id"]; ?>">
<div class="col-md-12">
<label class="label-auto">Empresa</label>
<select id="empresa" class="form-control select" name="empresa" onChange="cambiarTextfields2(this);" data-init-plugin="select" title="Seleccione la empresa" required>
<option value="">Empresa....</option>
</select>
</div>

<div id="empresa2" class="col-md-12 col-lg-12 primary">
<label class="label-auto">Nueva Empresa</label>
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
<label class="label-auto">Prioridad</label>
<select name="prioridad" class="form-control" style="cursor:pointer;" title="Establezca nivel de prioridad" required>
<option value="">Prioridad...</option>
<option value="C">C - BAJA</option>
<option value="B">B - MEDIA</option>
<option value="A">A - ALTA</option>
</select>
</div>

<div class="col-md-12" style="">
<label class="label-auto2">Responsable</label>
<select class="form-control select2"  name="responsable" data-init-plugin="select2" title="Seleccione un responsable" required>
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
</div>

<div class="col-md-12" style="margin-top:10px; margin-bottom:10px;">
<label class="label-auto2">Involucrados</label>
<select id="multi" name="involucrados"  data-init-plugin="select2" style="width:100%; cursor:pointer;" multiple>

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
<label class="label-auto">Etiquetas</label>
<input class="span12 tagsinput" name="etiquetas" id="source-tags" type="text" placeholder="Etiquetas">
</div>



<div class="col-md-12" style="margin-bottom:10px;">
<textarea name="comentarios" style="resize:vertical;" placeholder="Comentarios..." class="form-control" rows="3"></textarea>
</div>



</div>
</div>
<div class="col-md-6" style="border-right:none;">

<div class="row form-row">

<div class="col-md-6">
    <div  class="boton">
    <input accept="*" class="btn btn-mini tip"  name="archivo[]"  type="file" style="width: 290px;" data-toggle="tooltip" title="Agregar archivos" data-placement="right" multiple> 
    </div>
  </div>

<div class="col-md-6">
<div class="input-append success date col-md-10 col-lg-6 no-padding">
<input type="text" name="fecha_entrega" class="form-control" data-provide="datepicker-inline" placeholder="Fecha de terminación" required>
<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
</div>
</div>
</div> 
 
 <div class="row form-row">
 <div class="col-md-2">
<!--boton agregar -->
 </div>
 </div>
 
<div class="row form-row" > 
<div class="col-md-12">
<!--campos dinamicos-->
<script>
 var posicionCampoins = 1;  

function agregarSubtarea() {  
/* Declaramos una variable llamada nuevaFila y a ella le asignamos la recuperación del elemento HTML designado por el id tablaUsuarios. En este caso, la tabla en la que manejamos los campos dinámicamente y llamamos a la función insertRow para agregar una fila */  
    nuevaFila = document.getElementById("tablaSubtareas").insertRow(-1);  
    /* Asignamos a la propiedad id de nuevaFila el valor de posicionCampo, que inicializamos en 1 */  
    nuevaFila.id = posicionCampoins;  
/* Luego en otra variable llamada nuevaCelda, agregaremos una celda a la tabla, mediante la función insertCell */  
    nuevaCelda = nuevaFila.insertCell(-1);  
/* Con la celda creada, insertamos dinámicamente un campo de texto, el cual almacenaremos en un array llamado nombre, con una posición equivalente a la variable posicionCampo. Una vez terminado, repetimos la acción para el sitio Web y correo, asignando al array respectivo */  
    nuevaCelda.innerHTML = '<li style="line-height:0px; margin-top:15px;"><td><input style="margin-top:-15px" type="text" name="subproceso[]" value="" placeholder="Subtarea" class="form-control"></td>'; 
	nuevaCelda = nuevaFila.insertCell(-1);  
    nuevaCelda.innerHTML = '<td><select style="cursor:pointer;" class="form-control select2"  data-init-plugin="select2" name="subproceso[]"><option value="">Seleccione...</option><?php $result = mysql_query("SELECT DISTINCT id, nombre, apellidos FROM usuario  WHERE status = '1' Order By nombre ASC") or die(mysql_error());
                       
     while ($dep = mysql_fetch_array($result,MYSQL_ASSOC)){
       echo '<option value="'.$dep["id"].'">'.$dep["nombre"]." ".$dep["apellidos"]."</option>";
     }                                
     mysql_free_result($result);
                            
?></select></td>'; 
	nuevaCelda = nuevaFila.insertCell(-1);  
    nuevaCelda.innerHTML = '<td><input type="date"  name="subproceso[]" value=""  placeholder="dd/mm/YYYY"></td></li>'; 
	nuevaCelda = nuevaFila.insertCell(-1);  
   

/* Finalmente añadimos una última celda para las acciones y ahí agregamos un botón llamado Eliminar, el cual al ser presionado (definiendo la propiedad onClick), llamará a una función eliminarUsuario, pasando como parámetro la fila correspondiente */  
	 
    nuevaCelda.innerHTML = '<td><button tittle="Eliminar" class="btn btn-danger" onclick="eliminarCampo(this)"><a title="Eliminar" style="color:#FFF"><i class="fa fa-trash-o"></i></a></button></td></tr>';  
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

</script>  
<!--fin campos dinamicos-->
<button onClick="agregarSubtarea()" style="margin:5px 5px 5px 0px;" id="addins" name="addins" type="button" class="btn btn-success btn-cons tip" data-toggle="tooltip" title="Agregar subtareas" data-placement="right"><i class="fa fa-plus-square" title="Agrega una fila de campos"></i> Agregar</button>

<ol>
<table class="table no-more-tables" id="tablaSubtareas" style="margin-left:-30px;">
<tbody>
<tr><td><strong>Subtarea</strong></td><td><strong>Responsable</strong></td><td><strong>Entrega</strong></td><td><strong>Eliminar</strong></td></tr>

</tbody>
</table>
</ol>
</div>
</div>

</div>

</div>
<div class="form-actions">

<div class="pull-right">
<button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Crear</button>
<a class="btn btn-white btn-cons" type="button" href="Inicio">Cancelar</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<!-- fin del contenido -->
</div>
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




</body>
<?php
}
include("cfg/misc.inc");
if(isset($_POST["tarea"])){	

//Variables generales
$titulo = $_POST["tarea"];
$autor = $_POST["autor"];
$responsable = $_POST["responsable"];

//Variable Grupo
if($_POST["grupo"] == "OTRO"){
	$grupo_new = $_POST["grupo2"];
	mysql_query("INSERT INTO grupoemp (grupo, status) VALUES ('$grupo_new','1')");
	$grupo = mysql_insert_id(); //asignamos el id del grupo recien insertado

}else{
	$grupo_temp = str_replace("_", " ",strtolower($_POST["grupo"])); //Reemplazamos los _ por espacios resultado de la lista automatica de seleccion de grupos
	$q = mysql_query("SELECT id FROM grupoemp WHERE grupo='$grupo_temp' LIMIT 1");
	$qf = mysql_fetch_array($q, MYSQL_ASSOC);	
	$grupo = $qf["id"]; //asignamos el id del grupo seleccionado

}


//Variable Empresa
if($_POST["empresa"] == "OTRA"){
	$empresa_new = $_POST["empresa2"];
	mysql_query("INSERT INTO empresa (empresa, idGrupoemp, status) VALUES ('$empresa_new', '$grupo' ,'1')");
	$empresa = mysql_insert_id(); //asignamos el id de la empresa recien insertada
	
}else{
	$empresa_temp = str_replace("_", " ",strtolower($_POST["empresa"])); //Reemplazamos los _ por espacios resultado de la lista automatica de seleccion de empresa
	$r = mysql_query("SELECT id FROM empresa WHERE empresa='$empresa_temp' LIMIT 1");
	$rf = mysql_fetch_array($r, MYSQL_ASSOC);	
	$empresa = $rf["id"]; //asignamos el id de la empresa seleccionada

}

$comentarios = limpiar_tags($_POST["comentarios"]);
$etiquetas = $_POST["etiquetas"];
$solicitante = $_POST["solicitante"];
$prioridad = $_POST["prioridad"];
$fecha_entrega = $_POST["fecha_entrega"];

$involucrados = $_POST["involucrados"]; //La variable ya viene en array por el plugin
/*foreach($involucrados as $n){
	//Se crea la relación de la tarea con los involucrados
	//
}*/

$subproceso = $_POST["subproceso"]; //Array de subtareas
$i = 0;
foreach($subproceso as $p){
	//Se crea la relación de la tarea con los involucrados
	echo $i.": ".$p."<br>";
	$i++;
}

nueva_tarea();

}else{
	nueva_tarea();	
}

?>
</html>