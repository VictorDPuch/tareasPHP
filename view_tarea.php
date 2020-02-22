<!DOCTYPE html>
<html>
<?php
include("cfg/func.php");
base();
?>

<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Tarea | FCH Soluciones</title>
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
<script src="dropsfiles/dropzone.js"></script>
<link rel="stylesheet" href="dropsfiles/dropzone.css">

<style type="text/css">
	 #test2, select2-drop, #example2_wrapper .row, #example3_wrapper .row, #example2 td.center, #example2 th.sorting:first-child {display: none}
	 i.fa-plus-circle:hover{ cursor:pointer;}
	 ul.select2-results scroll-content scroll-scrollx_visible scroll-scrolly_visible{ margin-bottom:none;}
	 
	 .datos input, .datos select, .datos .select2-drop-mask { margin-bottom: 10px;}
</style>

<!--campos dinamicos-->
<script type="text/javascript" language="javascript">// <![CDATA[  
/* Abrimos etiqueta de código Javascript */  
/* Partimos por definir una variable llamada posicionCampo. Esta variable servirá como índices para marcar cuantos campos se han agregado dinámicamente. La inicializamos en 1, ya que la primera llamada ocurrirá cuando no hayan campos agregados */  
var posicionCampoins = 1;  
/* Declaramos la función agregarUsuario( ) */  
function agregarSubproceso() {  
/* Declaramos una variable llamada nuevaFila y a ella le asignamos la recuperación del elemento HTML designado por el id tablaUsuarios. En este caso, la tabla en la que manejamos los campos dinámicamente y llamamos a la función insertRow para agregar una fila */  
    nuevaFila = document.getElementById("tablaContenido").insertRow(-1);  
    /* Asignamos a la propiedad id de nuevaFila el valor de posicionCampo, que inicializamos en 1 */  
    nuevaFila.id = posicionCampoins;  
/* Luego en otra variable llamada nuevaCelda, agregaremos una celda a la tabla, mediante la función insertCell */  
    nuevaCelda = nuevaFila.insertCell(-1);  
/* Con la celda creada, insertamos dinámicamente un campo de texto, el cual almacenaremos en un array llamado nombre, con una posición equivalente a la variable posicionCampo. Una vez terminado, repetimos la acción para el sitio Web y correo, asignando al array respectivo */  
    nuevaCelda.innerHTML = '<li style="line-height:0px; margin-top:15px;"><td><input  style="margin-top:-15px" type="text"  name="subproceso[]" placeholder="Subtarea" class="form-control"></td>'; 
	nuevaCelda = nuevaFila.insertCell(-1);  
    nuevaCelda.innerHTML = '<td><select style="cursor:pointer;" class="form-control" name="subproceso[]" data-init-plugin="select2"><option value="">Seleccione...</option><option value="1">Joaquín Arroniz</option><option value="2">Pablo Sánchez</option></select></td>'; 
	nuevaCelda = nuevaFila.insertCell(-1);  
    nuevaCelda.innerHTML = '<td><div class="input-append success date col-md-12 col-lg-10 no-padding"><input type="date"  name="subproceso[]"  maxlenght="10" placeholder="dd/mm/YYYY" ></div></td>'; 
	nuevaCelda = nuevaFila.insertCell(-1);
	
	nuevaCelda.innerHTML = '<td><button tittle="finalizar" class="btn btn-success" onclick="finalizarCampo(this)"><a title="Finalizar" style="color:#FFF"><i class="fa fa-check"></i></a></button></td>'; 
	nuevaCelda = nuevaFila.insertCell(-1);  
   
   nuevaCelda.innerHTML = '<td><button tittle="Autorizar" class="btn btn-primary" onclick="autorizarCampo(this)"><a title="Autorizar" style="color:#FFF"><i class="fa fa-check-square-o"></i></a></button></td></li>'; 
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
<script>
 function confirmAction(){
       var confirmed = confirm("¿Esta seguro de eliminar el registro?");
       return confirmed;
 }
</script>  


<!--<script language="JavaScript" type="text/javascript">

   window.onbeforeunload = function preguntarAntesDeSalir()
    {
        return "¿Seguro que quieres salir?";
    }

</script>-->

</head>


<body class="horizontal-menu">
 
<?php include("menu.php"); ?>



<div class="page-container row-fluid">

<?php include("menu_movil.php"); ?>

<div class="page-content">
<?php //include("submenu.php"); ?>
<div class="clearfix"></div>

<div class="content">
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
<h4 style="font-weight:bold;">Nueva tarea</h4>
<div class="tools">
<a style="cursor:pointer;" onClick="window.history.back()" title="Salir" ><i class="material-icons" style="font-size:18px">clear</i></a>
</div>
</div>
<div class="grid-body no-border">
<!--<form class="form-no-horizontal-spacing" action="NuevaTarea" method="post">-->
<div class="row column-seperation" style="padding-top:10px;">
<div class="col-md-6 datos">
<div class="row form-row">
<div class="col-md-12">
<input name="tarea" type="text" class="form-control" placeholder="Tarea">
</div>
<div class="col-md-12">
<input type="hidden" name="autor" value="<?php echo $_SESSION["id"]; ?>">
</div>
<div class="col-md-12">
<select name="prioridad" class="form-control" style="cursor:pointer;">
<option value="">Prioridad...</option>
<option value="C">C - BAJA</option>
<option value="B">B - MEDIA</option>
<option value="A">A - ALTA</option>
</select>
</div>
</div>
<div class="row form-row">

<div class="col-md-12">
<input name="solicitante" type="text" class="form-control" placeholder="Solicitante">
</div>
</div>
<div class="row form-row">
<div class="col-md-12">
<input name="empresa" type="text" class="form-control" placeholder="Empresa">
</div>
<div class="col-md-12">
<select class="form-control select" name="grupoempresarial" data-init-plugin="select" title="Seleccion el grupo empresarial" required>
<?php
$query="SELECT id,grupo FROM grupoemp WHERE status = '1' ORDER BY grupo";
$result = mysql_query($query) or die(mysql_error().": Ocurrio un error en la consulta SQL");

echo '<option value="">Cliente / Grupo empresarial...</option>';
while (($fila = mysql_fetch_array($result)) != NULL) {
    echo '<option value="'.$fila["id"].'">'.$fila["grupo"].'</option>';
}
?>
</select>

</div>
</div>
<div class="row form-row">
<div class="col-md-12" style="margin-top:-20px;">
<label class="form-label"></label>
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
<div class="col-md-12" style="margin-top:-10px;">
<label class="form-label" ></label>
<select id="multi" name="involucrados"  data-init-plugin="select2" style="width:100%; cursor:pointer;" placeholder="Involucrados"  multiple>

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

<input style="margin-top:5px;" name="etiqueta" type="text" class="form-control" placeholder="Etiqueta">
</div>

<div class="col-md-12">
<textarea style="resize:vertical;" id="text-editor" placeholder="Comentarios..." class="form-control" rows="3"></textarea>
</div>

<!--<div class="col-md-12">
<form class="dropzone" action="NuevaTarea"></form>
</div>-->

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
<input type="text" name="f_terminacion" class="form-control" data-provide="datepicker-inline" placeholder="Fecha de terminación">
<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
</div>
</div>
<div class="clearfix"></div>
</div> 
 
 <div class="row form-row">
 <div class="col-md-2">
<button onClick="agregarSubproceso()" style="margin:5px 5px 5px 0px;" id="addins" name="addins" type="button" class="btn btn-success btn-cons tip" data-toggle="tooltip" title="Agregar subtareas" data-placement="right"><i class="fa fa-plus-square" title="Agrega una fila de campos"></i> Agregar</button>
 </div>
 </div>
 
<div class="row form-row" > 
<div class="col-md-12"><ol>
<table class="table no-more-tables" id="tablaContenido" style="margin-left:-30px;">
<tbody>
<tr><td><strong>Subtarea</strong></td><td><strong>Responsable</strong></td><td><strong>Entrega</strong></td><td><strong>Finalizar</strong></td><td><strong>Autorizar</strong></td><td><strong>Eliminar</strong></td></tr>
</tbody>
</table></ol>
</div>
</div>

</div>

</div>
<div class="form-actions">

<div class="pull-right">
<button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Crear</button>
<a class="btn btn-white btn-cons" type="button" href="Inicio">Cancelar</a>
</div>
</div>
 </form>
</div>
</div>
</div>
</div>

<!-- fin del contenido -->
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
<script src="assets/js/form_elements.js" type="text/javascript"></script>

</body>

</html>