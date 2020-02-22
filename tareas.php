<!DOCTYPE html>
<html>
<?php
	$tipo = $_GET['tipo'];
 //1 = Mis Tareas :: 2 = Pendientes Involucrados

	if($tipo=="1"){
		$titulo = "Mis Tareas";
		$color = "red";
	}else{
		$titulo = "Tareas Involucradas";
		$color = "green2";
	}

 	include("cfg/func.php");
 ?>

 <head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title><?php print($titulo); ?> | FCH Tareas</title>
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

<style type="text/css">
	 #test2, select2-drop, #example2_wrapper .row, #example3_wrapper .row, #example2 td.center, #example2 th.sorting:first-child {display: none}
	 i.fa-plus-circle:hover{
		 cursor:pointer;
	 }
	 a.cerrar:hover i{ color:#FFF;}

   #headtable, #titlet{
  background: white;
  position: sticky;
  top: 0;
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
}
</style>

</head>


<body class="horizontal-menu">
<?php include("menu.php"); ?>



<div class="page-container row-fluid">

<?php include("menu_movil.php"); ?>

<div class="page-content">
<?php //include("submenu.php"); ?>
<div class="clearfix"></div>

<div class="content" style="padding-left: 5px; padding-right:5px;">

<!-- Contenido -->


<div class="row-fluid">
<!-- tabla 1 acortada -->
<div class="col-md-14" style="padding:0px;">
<div class="grid simple ">
  <div class="grid-title <?php echo $color; ?>">
  <h4 style="font-weight:bold;"><?php echo $titulo; ?></h4>
  <?php
  if($tipo=="1"){
  	$result = mysql_query("SELECT * FROM tareas  WHERE responsable='$_SESSION[id]' AND status='1' Order By id ASC") or die(mysql_error());

  }else{
  	$result = mysql_query("SELECT tareas.id,tareas.idMinuta,tareas.titulo,tareas.descripcion,tareas.autor,tareas.etiqueta,tareas.solicitante,tareas.cliente,tareas.prioridad,tareas.responsable
  		,tareas.fecha_entrega,tareas.idMinuta,tareas.registro,tareas.status,tareas.edicion FROM tareas INNER JOIN involucrados ON tareas.id=involucrados.idTarea
  		and involucrados.idUsuario='$_SESSION[id]' AND status='1' ") or die(mysql_error());

  }
   ?>
<div class="tools">
<a href="MisTareas"  id="titulot" title="Expandir" ><i class="material-icons" style="font-size:18px">launch</i></a>
</div>
</div>
<div class="grid-body">
<table class="table table-hover table-responsive" style="margin-bottom: 0px; background-color: #fff;
 border-left: 1px solid #e8e8e8; border-right: 1px solid #e8e8e8;">
 <thead id="headtable">
 <tr>
 <th style="width:20%">Tarea</th>
 <th style="width:12%">Descripción</th>
 <th style="width:3%">Autor</th>
 <th style="width:8%">Cliente</th>
 <th style="width:8%">Etiqueta</th>
 <th  style="width:8%">Empresa</th>
 <th>Solicitante</th>
 <th>Creación</th>
 <th><a title="Prioridad"><span class="material-icons"><label class="tip" data-toggle="tooltip" title="Prioridad" data-placement="top">stars</label></span></a></th>
 <th>Responsable</th>
 <th>Entrega</th>
 <th>Estatus</th>
 <th>Involucrados</th>
 </tr>
 </thead>


<!-- Tarea -->

<!-- //Tarea -->

<!-- Tarea con subtarea -->
  <tbody>
<?php
while($tareas = mysql_fetch_array($result,MYSQL_ASSOC)){

	if($tareas["idMinuta"] != NULL){
		$color = "#4169e1"; //Minuta
	}else{
		$color = "#4b0082"; //Tarea
	}
?>
            <tr class="odd gradeX status_tr_warning">
            <td >
            <?php
				$result2 = mysql_query("SELECT * FROM subtareas  WHERE idTarea='$tareas[id]' ") or die(mysql_error());
				$check = mysql_num_rows($result2);

				if($check > 0){ //La tarea tiene subtareas
			?>
            <a class="collapsed"
							style="padding-right:8px;" data-toggle="collapse" data-parent="#accordion"
							onclick="mostrar(<?php echo $tareas["id"]; ?>)"><span class="material-icons" style="color:<?php echo $color; ?>; cursor:pointer ;">add_circle</span></a>
            <?php }else{ ?>
           	<a style="padding-right:8px ;"
								><span style="color:<?php echo $color; ?>;" class="material-icons">lens</span></a>
            <?php }	?>

            <a
							 href="Tarea/<?php echo $tareas["id"]; ?>"><?php echo $tareas["titulo"]; ?></a></td>
            <td  class="small-cell v-align-middle" style="width:14%" ><?php echo $tareas["descripcion"]; ?></td>
            <td  class="small-cell v-align-middle" style="width:3%"><?php echo $tareas["autor"]; ?></td>
            <td class="small-cell v-align-middle" style="width:8%"><?php echo nombre_cliente($tareas["cliente"]); ?></td>
            <td  class="small-cell v-align-middle" style="width:8%"><?php echo $tareas["etiqueta"]; ?></td>
						<?php
							$grp = mysql_query("	SELECT grupoemp.grupo from grupoemp INNER JOIN
		           empresa ON grupoemp.id=empresa.idGrupoemp AND empresa.id='$tareas[cliente]' ") or die(mysql_error());
							 $grparr = mysql_fetch_array($grp,MYSQL_ASSOC)
							?>

            <td class="small-cell v-align-middle" style="width:8%"><?php echo $grparr["grupo"]; ?></td>
            <td class="small-cell v-align-middle" style="width:9%"><?php echo $tareas["solicitante"]; ?></td>
            <td class="small-cell v-align-middle" style="width:7%"><?php echo date("Y/m/d", strtotime($tareas["registro"]));; ?></td>
            <td  class="small-cell v-align-middle" style="width:3%"><?php echo $tareas["prioridad"]; ?></td>
            <td  class="small-cell v-align-middle" style="width:9%"><?php echo $tareas["responsable"]; ?></td>
            <td class="small-cell v-align-middle" style="width:7%"><?php echo $tareas["fecha_entrega"]; ?></td>
            <td class="center small-cell v-align-middle" style="width:10%"><?php echo status_tarea($tareas["fecha_entrega"]); ?></td>
            <td class="small-cell v-align-middle" style="width:10%">
           <?php
           $a = "SELECT usuario.nombre,usuario.apellidos from usuario INNER JOIN
           involucrados ON usuario.id=involucrados.idUsuario AND involucrados.idTarea='$tareas[id]'";
           $con_inv = mysql_query($a) or die(mysql_error());
           $num = mysql_num_rows($con_inv);
           if($num > 0){
           while($inv = mysql_fetch_array($con_inv,MYSQL_ASSOC)){
           usuarios_involucrados($inv["nombre"],$inv["apellidos"]);
           }
           }else{
           echo "<center> - </center>";
           }
           ?></td>
           </tr>
        <?php
		$result3 = mysql_query("SELECT * FROM subtareas WHERE idTarea='$tareas[id]'") or die(mysql_error());
		$subs = mysql_num_rows($result3);

		if($subs > 0){ //Existen subtareas
		?>
            <tr><td id="st<?php echo $tareas["id"]; ?>" colspan="7" style="display:none" >
            <table class="table table-hover table-responsive" >
            <thead>
            <tr>
            <td colspan="2"><strong>Subtarea</strong></td>
            <td><strong>Responsable</strong></td>
            <td><strong>Entrega</strong></td>
            </tr>
            </thead>

            <tbody>

            <?php
			$i = 1;
			while($rw = mysql_fetch_array($result3, MYSQL_ASSOC)){
			?>
            <tr>
            <td><?php echo $i.".";?></td>
            <td><?php echo $rw["titulo"];?></td>
            <td><?php echo responsable_subtarea($rw["responsable"]);?></td>
            <td><?php echo $rw["fecha_entrega"]; ?></td>
            </tr>

            <?php
			$i++;
			}
			?>

            </tbody>
            </table>
        <?php
		}
		?>

<?php
} //Fin while
?>
</tbody>
</table>
</div>

</div>
</div>

</div>




<!-- fin del contenido -->
</div>
</div>



</div>
<script>
function mostrar(id) {
 if ($('#st'+id).is(':visible')) {
    $('#st'+id).hide("slow");
} else {
    $('#st'+id).show("slow");
}
}
</script>
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

</html>
