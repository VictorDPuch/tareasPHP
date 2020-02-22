<!DOCTYPE html>
<html>
<?php
		
 	include("cfg/func.php");
 ?>
 
 <head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Mi Historial | FCH Soluciones</title>
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

<style type="text/css">
	 #test2, select2-drop, #example2_wrapper .row, #example3_wrapper .row, #example2 td.center, #example2 th.sorting:first-child {display: none}
	 i.fa-plus-circle:hover{
		 cursor:pointer;
	 }
	 a.cerrar:hover i{ color:#FFF;}
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
<div class="col-md-14">
<div class="grid simple ">
<div class="grid-title" style="background-color:#000;">
<h4 style="font-weight:bold; color:#FFF;">Mi Historial</h4>
<div class="tools">
<a href="Inicio"  class="cerrar" title="Salir" ><i class="material-icons" style="font-size:18px">clear</i></a>
</div>
</div>
<div class="grid-body">
<div class="scroller scrollbar-hidden" >

<table class="tabla-general table table-hover no-more-tables">
<thead>
<tr>
<th width="180px">Tarea</th>
<th>Observaciones</th>
<th>Autor</th>
<th>Cliente</th>
<td>Etiqueta</td>
<th>Empresa</th>
<th>Solicitante</th>
<th>Creación</th>
<th><a title="Prioridad"><span class="material-icons">stars</span></a></th>
<th>Responsable</th>
<th>Involucrados</th>
<th>Entrega</th>
<th>Terminación</th>
<th>Estatus</th>
</tr>
</thead>
<tbody>
<tr class="even gradeC status_tr_process">
<td><a href="Tarea/1"><span class="material-icons">add_circle</span> Lectura de información y creación de polizas</a></td>
<td>observaciones en texto de muestra</td>
<td>Victor Aldan</td>
<td>RIMSA</td>
<td>Consulta</td>
<td>FCH Tareas</td>
<td>Joaquin Arroniz</td>
<td>18/06/2019</td>
<td>A</td>
<td>Víctor Aldan</td>
<td>Pablo Sánchez, Osvaldo ficachi, Gilberto, Elizabeth</td>
<td>12/08/2019</td>
<td>18/08/2019</td>
<td class="center"><span class="process">En proceso</span></td>
</tr>
<tr class="even gradeC status_tr_process">
<td><a href="Tarea/2"><span class="material-icons">add_circle</span> Lectura de información y creación de polizas</a></td>
<td>observaciones en texto de muestra</td>
<td>Victor Aldan</td>
<td>RIMSA</td>
<td>Consulta</td>
<td>FCH Tareas</td>
<td>Joaquin Arroniz</td>
<td>18/06/2019</td>
<td>A</td>
<td>Víctor Aldan</td>
<td>Pablo Sánchez, Osvaldo ficachi, Gilberto, Elizabeth</td>
<td>12/08/2019</td>
<td>18/08/2019</td>
<td class="center"><span class="process">En proceso</span></td>
</tr>
<tr class="even gradeC status_tr_process">
<td><a href="#"><span class="material-icons">add_circle</span> Lectura de información y creación de polizas</a></td>
<td>observaciones en texto de muestra</td>
<td>Victor Aldan</td>
<td>RIMSA</td>
<td>Consulta</td>
<td>FCH Tareas</td>
<td>Joaquin Arroniz</td>
<td>18/06/2019</td>
<td>A</td>
<td>Víctor Aldan</td>
<td>Pablo Sánchez, Osvaldo ficachi, Gilberto, Elizabeth</td>
<td>12/08/2019</td>
<td>18/08/2019</td>
<td class="center"><span class="process">En proceso</span></td>
</tr>
<tr class="even gradeC status_tr_process">
<td><a href="#"><span class="material-icons">add_circle</span> Lectura de información y creación de polizas</a></td>
<td>observaciones en texto de muestra</td>
<td>Victor Aldan</td>
<td>RIMSA</td>
<td>Consulta</td>
<td>FCH Tareas</td>
<td>Joaquin Arroniz</td>
<td>18/06/2019</td>
<td>A</td>
<td>Víctor Aldan</td>
<td>Pablo Sánchez, Osvaldo ficachi, Gilberto, Elizabeth</td>
<td>12/08/2019</td>
<td>18/08/2019</td>
<td class="center"><span class="process">En proceso</span></td>
</tr>
<tr class="even gradeC status_tr_process">
<td><a href="#"><span class="material-icons">add_circle</span> Lectura de información y creación de polizas</a></td>
<td>observaciones en texto de muestra</td>
<td>Victor Aldan</td>
<td>RIMSA</td>
<td>Consulta</td>
<td>FCH Tareas</td>
<td>Joaquin Arroniz</td>
<td>18/06/2019</td>
<td>A</td>
<td>Víctor Aldan</td>
<td>Pablo Sánchez, Osvaldo ficachi, Gilberto, Elizabeth</td>
<td>12/08/2019</td>
<td>18/08/2019</td>
<td class="center"><span class="process">En proceso</span></td>
</tr>
<tr class="even gradeC status_tr_process">
<td><a href="#"><span class="material-icons">add_circle</span> Lectura de información y creación de polizas</a></td>
<td>observaciones en texto de muestra</td>
<td>Victor Aldan</td>
<td>RIMSA</td>
<td>Consulta</td>
<td>FCH Tareas</td>
<td>Joaquin Arroniz</td>
<td>18/06/2019</td>
<td>A</td>
<td>Víctor Aldan</td>
<td>Pablo Sánchez, Osvaldo ficachi, Gilberto, Elizabeth</td>
<td>12/08/2019</td>
<td>18/08/2019</td>
<td class="center"><span class="process">En proceso</span></td>
</tr>
<tr class="even gradeC status_tr_process">
<td><a href="#"><span class="material-icons">add_circle</span> Lectura de información y creación de polizas</a></td>
<td>observaciones en texto de muestra</td>
<td>Victor Aldan</td>
<td>RIMSA</td>
<td>Consulta</td>
<td>FCH Tareas</td>
<td>Joaquin Arroniz</td>
<td>18/06/2019</td>
<td>A</td>
<td>Víctor Aldan</td>
<td>Pablo Sánchez, Osvaldo ficachi, Gilberto, Elizabeth</td>
<td>12/08/2019</td>
<td>18/08/2019</td>
<td class="center"><span class="process">En proceso</span></td>
</tr>
<tr class="even gradeC status_tr_process">
<td><a href="#"><span class="material-icons">add_circle</span> Lectura de información y creación de polizas</a></td>
<td>observaciones en texto de muestra</td>
<td>Victor Aldan</td>
<td>RIMSA</td>
<td>Consulta</td>
<td>FCH Tareas</td>
<td>Joaquin Arroniz</td>
<td>18/06/2019</td>
<td>A</td>
<td>Víctor Aldan</td>
<td>Pablo Sánchez, Osvaldo ficachi, Gilberto, Elizabeth</td>
<td>12/08/2019</td>
<td>18/08/2019</td>
<td class="center"><span class="process">En proceso</span></td>
</tr>
<tr class="even gradeC status_tr_process">
<td><a href="#"><span class="material-icons">add_circle</span> Lectura de información y creación de polizas</a></td>
<td>observaciones en texto de muestra</td>
<td>Victor Aldan</td>
<td>RIMSA</td>
<td>Consulta</td>
<td>FCH Tareas</td>
<td>Joaquin Arroniz</td>
<td>18/06/2019</td>
<td>A</td>
<td>Víctor Aldan</td>
<td>Pablo Sánchez, Osvaldo ficachi, Gilberto, Elizabeth</td>
<td>12/08/2019</td>
<td>18/08/2019</td>
<td class="center"><span class="process">En proceso</span></td>
</tr>

</tbody>
</table>

</div>
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


<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>

<script src="assets/js/datatables.js" type="text/javascript"></script>

</body>

</html>