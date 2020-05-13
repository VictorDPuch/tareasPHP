<!DOCTYPE html>
<html>
  <?php include("cfg/func.php"); ?>
  <!-- Mirrored from webarch.revox.io/3.0/html/horizontal_menu.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 29 Jul 2018 23:02:14 GMT -->
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Inicio | FCH Soluciones
    </title>
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
      #test2, select2-drop, #example2_wrapper .row, #example3_wrapper .row, #example2 td.center, #example2 th.sorting:first-child {
        display: none}
      i.fa-plus-circle:hover{
        cursor:pointer;
      }
      .titulo{
        width: 100px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
      }


    </style>
  </head>
  <body class="horizontal-menu" onload="responsivetable()">
    <?php include("menu.php"); ?>
    <div class="page-container row-fluid">
      <?php include("menu_movil.php"); ?>
      <div class="page-content">
        <?php //include("submenu.php"); ?>
        <div class="clearfix">
        </div>
        <div class="content" style="padding: 60px 0px 0px 0px;">
          <!-- Contenido -->
          <div class="col-md-12">
            <div class="tab-content" style="background-color:transparent;">
              <div class="tab-pane active" id="tareas">
                <div class="row-fluid">
                  <!-- Acordeon -->
                  <div class="col-md-6" style="padding:0px;">
                    <div class="grid simple ">
                      <div class="grid-title red">
                        <h4 style="font-weight:bold;">Mis Tareas
                        </h4>
                        <div class="tools">
                          <a href="MisTareas"  title="Expandir" >
                            <i class="material-icons" style="font-size:18px">launch
                            </i>
                          </a>
                        </div>
                      </div>
                      <?php
$result = mysql_query("SELECT * FROM tareas  WHERE responsable='$_SESSION[id]' AND status='1' Order By id ASC") or die(mysql_error());
?>
                      <div class="grid-body">
                        <table class="table table-hover" style="margin-bottom: 0px; background-color: #fff;
                                                                                 border-left: 1px solid #e8e8e8; border-right: 1px solid #e8e8e8;">
                          <thead id="headtable">
                            <tr>
                              <th style="width:20%">Tarea
                              </th>
                              <th  style="width:8%">Empresa
                              </th>
                              <th>
                                <a title="Prioridad">
                                  <span class="material-icons">
                                    <label class="tip" data-toggle="tooltip" title="Prioridad" data-placement="top">stars
                                    </label>
                                  </span>
                                </a>
                              </th>
                              <th>Entrega
                              </th>
                              <th>Estatus
                              </th>
                              <th>Involucrados
                              </th>
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
                              <td  scope="row" data-label="Tarea">
                                <?php
$result2 = mysql_query("SELECT * FROM subtareas  WHERE idTarea='$tareas[id]' ") or die(mysql_error());
$check = mysql_num_rows($result2);
if($check > 0){ //La tarea tiene subtareas
?>
                                <a class="collapsed"
                                   style="padding-right:8px;" data-toggle="collapse" data-parent="#accordion"
                                   onclick="mostrar(<?php echo $tareas["id"]; ?>)">
                                  <span class="material-icons" style="color:<?php echo $color; ?>; cursor:pointer ;">add_circle
                                  </span>
                                </a>
                                <?php }else{ ?>
                                <a style="padding-right:8px ;"
                                   >
                                  <span style="color:<?php echo $color; ?>;" class="material-icons">lens
                                  </span>
                                </a>
                                <?php }	?>
                                <a
                                   href="editar_tarea.php?id=<?php echo $tareas["id"]; ?>">
                                  <?php echo $tareas["titulo"]; ?>
                                </a>
                              </td>
                              <td class="small-cell v-align-middle"   data-label="Empresa">
                                <?php echo nombre_cliente($tareas["cliente"]); ?>
                              </td>
                              <td  class="small-cell v-align-middle" style="width:3%">
                                <?php echo $tareas["prioridad"]; ?>
                              </td>
                              <td class="small-cell v-align-middle" style="width:7%"  data-label="Entrega">
                                <?php echo $tareas["fecha_entrega"]; ?>
                              </td>
                              <td class="center small-cell v-align-middle" style="width:10%" data-label="Estado">
                                <?php echo status_tarea($tareas["fecha_entrega"]); ?>
                              </td>
                              <td class="small-cell v-align-middle" style="width:10%"   data-label="Involucrados">
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
?>
                              </td>
                            </tr>
                            <?php
$result3 = mysql_query("SELECT * FROM subtareas WHERE idTarea='$tareas[id]'") or die(mysql_error());
$subs = mysql_num_rows($result3);
if($subs > 0){ //Existen subtareas
?>
                            <tr>
                              <td id="st<?php echo $tareas["id"]; ?>" colspan="7" style="display:none" >
                                <table class="table table-hover table-responsive" >
                                  <thead>
                                    <tr>
                                      <td colspan="2">
                                        <strong>Subtarea
                                        </strong>
                                      </td>
                                      <td>
                                        <strong>Responsable
                                        </strong>
                                      </td>
                                      <td>
                                        <strong>Entrega
                                        </strong>
                                      </td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
$i = 1;
while($rw = mysql_fetch_array($result3, MYSQL_ASSOC)){
?>
                                    <tr>
                                      <td>
                                        <?php echo $i.".";?>
                                      </td>
                                      <td>
                                        <?php echo $rw["titulo"];?>
                                      </td>
                                      <td>
                                        <?php echo responsable_subtarea($rw["responsable"]);?>
                                      </td>
                                      <td>
                                        <?php echo $rw["fecha_entrega"]; ?>
                                      </td>
                                    </tr>
                                    <?php
$i++;
}
?>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
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
                  <!-- Tareas involucradas -->
                  <div class="col-md-5" style="padding:0px;">
                    <div class="grid simple ">
                      <div class="grid-title green2">
                        <h4 style="font-weight:bold;">Tareas Involucradas
                        </h4>
                        <div class="tools">
                          <a href="TareasInvolucradas"  title="Expandir" >
                            <i class="material-icons" style="font-size:18px">launch
                            </i>
                          </a>
                        </div>
                      </div>
                      <?php
$result = mysql_query("SELECT tareas.id,tareas.idMinuta,tareas.titulo,tareas.descripcion,tareas.autor,tareas.etiqueta,tareas.solicitante,tareas.cliente,tareas.prioridad,tareas.responsable
,tareas.fecha_entrega,tareas.idMinuta,tareas.registro,tareas.status,tareas.edicion FROM tareas INNER JOIN involucrados ON tareas.id=involucrados.idTarea
and involucrados.idUsuario='$_SESSION[id]' AND status='1' ") or die(mysql_error());
?>
                      <div class="grid-body">
                        <table class="table table-hover table-responsive" style="margin-bottom: 0px; background-color: #fff;
                                                                                 border-left: 1px solid #e8e8e8; border-right: 1px solid #e8e8e8;">
                          <thead id="headtable">
                            <tr>
                              <th style="width:20%">Tarea
                              </th>
                              <th  style="width:8%">Empresa
                              </th>
                              <th>
                                <a title="Prioridad">
                                  <span class="material-icons">
                                    <label class="tip" data-toggle="tooltip" title="Prioridad" data-placement="top">stars
                                    </label>
                                  </span>
                                </a>
                              </th>
                              <th>Entrega
                              </th>
                              <th>Estatus
                              </th>
                              <th>Involucrados
                              </th>
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
                                   onclick="mostrarinv(<?php echo $tareas["id"]; ?>)">
                                  <span class="material-icons" style="color:<?php echo $color; ?>; cursor:pointer ;">add_circle
                                  </span>
                                </a>
                                <?php }else{ ?>
                                <a style="padding-right:8px ;"
                                   >
                                  <span style="color:<?php echo $color; ?>;" class="material-icons">lens
                                  </span>
                                </a>
                                <?php }	?>
                                <a
                                   href="Tarea/<?php echo $tareas["id"]; ?>">
                                  <?php echo $tareas["titulo"]; ?>
                                </a>
                              </td>
                              <td class="small-cell v-align-middle" style="width:8%">
                                <?php echo nombre_cliente($tareas["cliente"]); ?>
                              </td>
                              <td  class="small-cell v-align-middle" style="width:3%">
                                <?php echo $tareas["prioridad"]; ?>
                              </td>
                              <td class="small-cell v-align-middle" style="width:7%">
                                <?php echo $tareas["fecha_entrega"]; ?>
                              </td>
                              <td class="center small-cell v-align-middle" style="width:10%">
                                <?php echo status_tarea($tareas["fecha_entrega"]); ?>
                              </td>
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
?>
                              </td>
                            </tr>
                            <?php
$result3 = mysql_query("SELECT * FROM subtareas WHERE idTarea='$tareas[id]'") or die(mysql_error());
$subs = mysql_num_rows($result3);
if($subs > 0){ //Existen subtareas
?>
                            <tr>
                              <td id="sti<?php echo $tareas["id"]; ?>" colspan="7" style="display:none" >
                                <table class="table table-hover table-responsive" >
                                  <thead>
                                    <tr>
                                      <td colspan="2">
                                        <strong>Subtarea
                                        </strong>
                                      </td>
                                      <td>
                                        <strong>Responsable
                                        </strong>
                                      </td>
                                      <td>
                                        <strong>Entrega
                                        </strong>
                                      </td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
$i = 1;
while($rw = mysql_fetch_array($result3, MYSQL_ASSOC)){
?>
                                    <tr>
                                      <td>
                                        <?php echo $i.".";?>
                                      </td>
                                      <td>
                                        <?php echo $rw["titulo"];?>
                                      </td>
                                      <td>
                                        <?php echo responsable_subtarea($rw["responsable"]);?>
                                      </td>
                                      <td>
                                        <?php echo $rw["fecha_entrega"]; ?>
                                      </td>
                                    </tr>
                                    <?php
$i++;
}
?>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
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
                  <!-- //Tareas involucradas -->
                  <!-- Tab Minutas -->
                </div>
              </div>
              <div class="tab-pane" id="minutas">
                <div class="row-fluid">
                  <div class="col-md-12">
                    <div class="grid simple ">
                      <div class="grid-title blue">
                        <h4 style="font-weight:bold;">Minutas
                        </h4>
                        <div class="tools">
                          <a href="Inicio"  title="Expandir" >
                            <i class="material-icons" style="font-size:18px">clear
                            </i>
                          </a>
                        </div>
                      </div>
                      <div class="grid-body">
                        <div class="scroller scrollbar-hidden" >
                          <table class="table table-hover no-more-tables">
                            <thead>
                              <tr>
                                <th colspan="2" width="180px">Proyecto
                                </th>
                                <th>Tema
                                </th>
                                <th>Empresa
                                </th>
                                <th style="width:410px;">Comentarios
                                </th>
                                <th>Tipo
                                </th>
                                <th>Fecha
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
$result3 = mysql_query("SELECT idEmpresa FROM empresacolaborador WHERE idUsuario='$_SESSION[id]' Order By id ASC") or die(mysql_error());
$result3_ch = mysql_fetch_array($result3, MYSQL_ASSOC);
$check_inv = mysql_num_rows($result3);
$result4 = mysql_query("SELECT * FROM minutas WHERE empresa='$result3_ch[idEmpresa]'");
if($check_inv > 0){
while($minutas_cons = mysql_fetch_array($result4, MYSQL_ASSOC)){
?>
                              <tr class="even gradeC status_tr_process">
                                <td>
                                  <a href="NuevaMinuta">
                                    <span class="material-icons" style="color:#4169e1;">lens
                                    </span>
                                  </a>
                                </td>
                                <td>
                                  <a href="NuevaMinuta">
                                    <?php echo $minutas_cons["proyecto"]; ?>
                                  </a>
                                </td>
                                <td>
                                  <?php echo $minutas_cons["tema"]; ?>
                                </td>
                                <td>
                                  <?php echo $minutas_cons["empresa"]; ?>
                                </td>
                                <td>
                                  <?php echo $minutas_cons["comentarios"]; ?>
                                </td>
                                <td class="center">
                                  <?php echo $minutas_cons["tipo"]; ?>
                                </td>
                                <td>
                                  <?php echo $minutas_cons["registro"]; ?>
                                </td>
                              </tr>
                              <?php
}
}
?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
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
        }
        else {
          $('#st'+id).show("slow");
        }
      }
      function mostrarinv(id) {
        if ($('#sti'+id).is(':visible')) {
          $('#sti'+id).hide("slow");
        }
        else {
          $('#sti'+id).show("slow");
        }
      }
    </script>
    <script type="text/javascript">
       $(document).ready(function() {
         $('#table').basictable();

         $('#table-breakpoint').basictable({
           breakpoint: 768
         });

         $('#table-container-breakpoint').basictable({
           containerBreakpoint: 485
         });

         $('#table-swap-axis').basictable({
           swapAxis: true
         });

         $('#table-force-off').basictable({
           forceResponsive: false
         });

         $('#table-no-resize').basictable({
           noResize: true
         });

         $('#table-two-axis').basictable();

         $('#table-max-height').basictable({
           tableWrapper: true
         });
       });

</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.basictable/1.0.9/jquery.basictable.min.js" integrity="sha256-bRyGcU6tP9c78IZuj1jld29tzek4+eR+dBkdml3spKI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript">
    </script>
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript">
    </script>
    <script src="webarch/js/webarch.js" type="text/javascript">
    </script>
    <script src="assets/js/chat.js" type="text/javascript">
    </script>
    <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript">
    </script>
    <script src="assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript">
    </script>
    <script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js">
    </script>
    <script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js">
    </script>
    <script src="assets/js/datatables.js" type="text/javascript">
    </script>
  </body>
</html>
