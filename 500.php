<!DOCTYPE html>
<html>
<?php
	require_once("cfg/func.php");
	$u = substr($_SERVER['REQUEST_URI'],-1);
	if($u!="/"){
		base(1);
	}else{
		base();
	}
	
?>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>500 - FCH Web</title>
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
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="horizontal-menu">

<?php 
include("menu.php");
    
?>
  
  <!-- inicio contenido-->
  <div class="page-content"> 
  <div class="content">  
  <div id="container">
          
           <div class="row-fluid">
           	
           
                    
                    <div class=" col-md-4 ">
                      <div class="error-number"><h1 class="bold" style="font-size:6.5em; text-align:center;">500</h1></div>
                      <div class="error-description-mini" style="text-align:center;">Ha ocurrido un problema con el servidor, intente nuevamente si el problema persiste favor de comunicarlo al <a href="mailto:soporte@maverinnovation.com">administrador</a>.</div>
                     
                      <a class="btn btn-block btn-success" href="Inicio">ir a Inicio</a>
                    </div>
									
                               
        	
       </div><!--/row-->
           
</div><!-- fin container -->
</div><!-- fin content -->
</div><!-- fin page-content --> 

		


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