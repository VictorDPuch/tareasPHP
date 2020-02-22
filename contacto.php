<!DOCTYPE html>
<html>
  <!-- Mirrored from www.revox.io/webarch/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 05 Jan 2014 23:21:09 GMT --><!-- Added by HTTrack -->
  <head>
      
    <!-- /Added by HTTrack -->
    <title>UPanel | Contacto</title>
    <?php 
include("cfg/func.php");
function contacto_in(){
?>
 <link href="assets/img/favicon.ico"  rel="shortcute icon">
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="" name="description">
    <meta content="" name="author">
    <!-- BEGIN PLUGIN CSS -->
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css"

      media="screen">
    <link href="assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet"

      type="text/css">
    <link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet"

      type="text/css">
    <link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet"

      type="text/css">
    <link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css"

      rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css"

      rel="stylesheet" type="text/css">
    <link href="assets/plugins/ios-switch/ios7-switch.css" rel="stylesheet" type="text/css"

      media="screen">
    <link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css"

      media="screen">
    <link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet"

      type="text/css" media="screen">
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet"

      type="text/css">
    <link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet"

      type="text/css">
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet"

      type="text/css">
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css">
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css">
    <!-- END CSS TEMPLATE -->
    <link href="assets/plugins/boostrap-slider/css/slider.css" rel="stylesheet"

      type="text/css">
  </head>
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="">
    <!-- BEGIN HEADER -->
    <?php include("menu.php"); ?>
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
      <div class="content">
        <div class="clearfix"></div>
        <ul class="breadcrumb">
          <li>
            <p><a href="cpanel.php">Inicio</a></p>
          </li>
          <li><a href="#" class="active">Contacto</a> </li>
        </ul>
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="col-md-4">
          <div class="grid simple">
            <div class="grid-body no-border">
              <div class="row-fluid">
                <h3><i class="fa fa-envelope"></i> Correo <span class="semi-bold">Contacto</span></h3>
                <p>Introduzca el correo para recibir mensajes de los clientes.<br>
                  Los mensajes enviados através del formulario de <strong>contacto</strong>
                  llegarán a la bandeja del correo proporcionado. </p>
                <p><strong>Puede cambiar el correo cuando guste, las veces que
                    quiera.</strong></p>
                <br>
                  
                <form action="contacto.php" method="post">
                  <div class="input-group"> <span class="input-group-addon primary">
                      <span class="arrow"></span> <i class="fa fa-envelope-o"></i>
                    </span> <input class="form-control" placeholder="Email" name="contacto" type="text" value="<?php
                    $q = mysql_query("SELECT email FROM contacto WHERE id = 1") or die(mysql_error());
                    $row = mysql_fetch_array($q, MYSQL_ASSOC);
                    echo $row["email"];
                    ?>" title="Ingrese el correo del formulario de contacto" required>
                  </div>
               
              </div>
              <br>
              <button type="submit" class="btn btn-success btn-cons">Guardar</button>
                </form> </div>
            
          </div>
        </div>
      </div>
      <!-- END FORM OPTIONS-->
      <!-- END PAGE --> </div>
   
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- END FOOTER -->
    <!-- BEGIN CORE JS FRAMEWORK-->
    <script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <!-- END CORE JS FRAMEWORK -->
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"

type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"

type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"

type="text/javascript"></script>
    <script src="assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
    <script src="assets/plugins/ios-switch/ios7-switch.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="assets/js/form_elements.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/core.js" type="text/javascript"></script>
    <script src="assets/js/chat.js" type="text/javascript"></script>
    <script src="assets/js/demo.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- END JAVASCRIPTS -->
    <?php
}
include("cfg/misc.inc");
if(isset($_POST["contacto"])){
	$contacto = $_POST["contacto"];
		mysql_query("UPDATE contacto SET email='$contacto' WHERE id=1") or die(mysql_error());
    aviso("Correo actualizado correctamente",1);
	contacto_in();
}else{
	contacto_in();
	}

?>
  </body>
  <!-- Mirrored from www.revox.io/webarch/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 05 Jan 2014 23:21:21 GMT -->
</html>
