<?php
include("cfg/func.php");
?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/img/favicon.ico"  rel="shortcute icon">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title> Gestión Empresa | FCH Soluciones </title>
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

<script>
 function confirmAction(){
       var confirmed = confirm("¿Esta seguro de eliminar la empresa?");
       return confirmed;
 }
</script>

   <style type="text/css">
		#depto2, #empresa2, .DTTT, #grupo2{display: none;}
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
       	<button class="btn btn-success btn-cons" type="button" id="btn-new-ticket"><i style="font-size:1.2em; margin-top:-4px; color:#FFF;" class="fa fa-building-o"></i><i style=" position:relative; font-size:0.9em; margin-top:4px; margin-left:-12px; color:#FFF; z-index:100;" class="fa fa-plus"></i>Nuevo</button>
        </div>

        <div class="grid-title no-border" style="border-bottom:1px solid #999;">
        <?php include("menu_gestion.php"); ?>
        	<h2 style=" padding-left:20px;" class="inline text-center"><i class="fa fa-building-o"></i> Gestor <span class="semi-bold">de empresas</span></h2>
        </div>
      </div>



      <!-- Nuevo -->
      <form  method="post" action="GestionEmpresa" >
      <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 col-lg-6 col-sm-6 ">
            <div class="grid simple " id="new-ticket-wrapper" style="display: none;">
              <div class="grid-title blue no-border">
                <h4 class="semi-bold" ><i style="color:#FFF;" class="fa fa-building-o"></i>Nueva <strong>empresa</strong></h4>
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
                         		 <label class="label-auto">Grupo</label>
                                      <select class="form-control select" name="grupo" data-init-plugin="select" title="Seleccion el grupo" onChange="cambiarTextfields(this);" required  style="cursor:pointer;" title="seleccione el grupo empresarial">
                                            <option value="">Grupo empresarial....</option>

                                              <?php

                                                  $result = mysql_query("SELECT DISTINCT id, grupo FROM grupoemp  WHERE status = '1' AND id<>'0' Order By grupo ASC") or die(mysql_error());
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
                              <input id="appendedInput" class="form-control" placeholder="Nombre de la empresa" style="text-transform:uppercase" title="Ingrese el nombre de la empresa" name="empresa" type="text" required >
                             </div>

                            <div class="col-md-12">
                            	<label class="label-auto2">Involucrados</label>
                                <select id="multi" name="involucrados[]"  data-init-plugin="select2" style="width:100%; cursor:pointer;" placeholder="Involucrados"  multiple>

                                <?php
                                     $result = mysql_query("SELECT DISTINCT id, nombre, apellidos FROM usuario  WHERE status = '1' AND id<>'0' Order By nombre ASC") or die(mysql_error());
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
              <h4><i class=" fa fa-list" style="color:#FFF;"></i> <span class="semi-bold">Empresas Registradas</span></h4>
              <div class="tools"><a href="Inicio" title="Cerrar"><i class="material-icons" style="font-size:18px">clear</i></a>
</div>
            </div>
            <div class="grid-body ">
            <form action="cfg/delete_user_checkbox.php" method="post">
                <table class="table table-hover table-condensed" id="example">

                <button type="submit" name="delete_marck" class="btn btn-white delete_check" id="delete_check"  title="Eliminar" onClick="return confirmAction()"><i class="fa fa-times"></i> Eliminar Seleccionados</button>
                <a href="exportar.php" name="exportar" class="btn btn-white exportar"   title="Exportar a excel" ><i class="fa fa-file-text"></i> Exportar</a>

               <?php
			   		$g = mysql_query("SELECT id, grupo FROM grupoemp WHERE status='1' AND id!='0' order by grupo DESC") or die (mysql_error());
					while($rowg = mysql_fetch_array($g, MYSQL_ASSOC)){
			   ?>
                  <thead>
                  	<tr style="background-color: #f5f5f5"><td colspan="4"><p style="font-weight:bold; font-size:12px; margin:0px; color:#0aa699;"> > GRUPO <?php echo $rowg["grupo"]; ?></p></td></tr>
                    <tr>
                      <th style="width:2%; padding:2px">#</th>
                      <th style="width:30%; padding:2px">Empresa</th>
                      <th style="width:30%; padding:2px">Registro</th>
                      <th style="width:10%; padding:2px">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>

                   <?php
						  $q = mysql_query("SELECT * FROM empresa WHERE status='1' AND idGrupoemp='$rowg[id]' ORDER BY id ASC") or die(mysql_error());
						  while($row = mysql_fetch_array($q,MYSQL_ASSOC)){
								?>
								<tr>
								  <td><span class="muted"><?php echo $row["id"]; ?></span></td>
								  <td class="v-align-middle"><a href="EditarEmpresa/<?php echo $row["id"]; ?>" title="Editar Grupo"><?php echo $row["empresa"]; ?></a></td>
								  <td class="v-align-middle"><span class="muted"><?php echo $row["registro"]; ?></span></td>
								  <td align="center"><span class="muted eliminar"><a href="cfg/delete_delete.php?f=0&id=<?php echo $row["id"]; ?>&r=../GestionEmpresa&t=empresa" title="Eliminar" onClick="return confirmAction()"><i class="fa fa-trash-o"></i></a></span></td>
								</tr>
					<?php
						  }


					} //fin while de grupo

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
