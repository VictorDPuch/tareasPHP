<?php
@session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Tareas | FCH Soluciones</title>
<?php
function login(){
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>

<link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
<!-- END CSS TEMPLATE -->
<style type="text/css">
body{
	background-image:url(assets/img/cover_user-1.png);
	background-position:center left;
	background-size:cover;
	overflow-x:hidden;
	background-color:#e7e7e9;
	}
</style>

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="error-body no-top">

      <?php
	  if(isset($_SESSION["id"])){
	  ?>

	  <script type="text/javascript">
		window.location="Inicio";
	  </script>

      <?php
	  }

    if(isset($_GET["m"])){

    $m = $_GET["m"];

		switch($m){
			case "1":
				aviso("Password actualizado",1);
				break;
			case "2":
				aviso("Este link ya esta expirado",3);
				break;
		}
    }?>
<div class="container" >
  <div class="row login-container  animated fadeInUp">

        <div class="col-md-5 col-md-offset-4 tiles white no-padding">
        <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-1-10 xs-p-b-10">


       	   <h1 align="center"><img src="assets/img/fchsoluciones.png" title="FCH Soluciones"></h1>
          <form class="login-form" action="#" method="post">
		 <div class="row">
		 <div class="form-group col-md-12">
           <div class="controls">
            <div class="input-group col-md-12">
				  <span class="input-group-addon primary">
				  <span class="arrow"></span>
					<i class="fa fa-user" style="padding-left:2px;"></i>
				  </span>
				  <input type="email" name="email"  class="form-control" placeholder="Email" title="Ingrese su usuario" value="<?php if(isset($_SESSION['email_temp'])){ echo $_SESSION['email_temp']; } ?>" required>
				</div>
            </div>
          </div>
        </div>

		 <div class="row">
          <div class="form-group col-md-12">

            <div class="controls">
             <div class="input-group col-md-12">
				  <span class="input-group-addon primary">
				  <span class="arrow"></span>
					<i class="fa fa-lock">&nbsp;</i>
				  </span>
				  <input type="password" name="password" id="txtpassword" class="form-control" placeholder="Password" title="Ingrese su password" required>
				</div>
            </div>
          </div>
        </div>

          <div class="row-fluid">

         	<div class="col-md-6">
              <div class="checkbox check-success ">
                      <input id="checkbox2" type="checkbox"  name="recuerdame" value="1"  checked>
                      <label for="checkbox2" >Recordar mi sesión </label><i style=" font-size:1.2em;cursor:pointer;" class="tip fa fa-info-circle" data-placement="right" data-original-title="Tú sesión se mantiene abierta hasta que cierres sesión." ></i>
               </div>
            </div>

            <div class="col-md-6" style="margin-bottom:30px;">
              <button class="btn btn-primary btn-cons pull-right" type="submit">Entrar</button>
            </div>
          </div>
		  </form>





          </div>
          </div>
        </div>



  </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/messages_notifications.js" type="text/javascript"></script>

<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/js/login.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
<?php
}
include("cfg/misc.inc");
include("cfg/func.php");


if(isset($_POST["email"])){
	$_SESSION["email_temp"] = $_POST["email"];
	$email = $_POST["email"];
	$password = md5($_POST["password"]);

	$result = mysql_query("SELECT id, nombre, apellidos,password, tipo, email, nivel FROM usuario WHERE email='$email' AND password='$password'") or die(mysql_error());
	$row = mysql_num_rows($result);

		if($row > 0){
			$data = mysql_fetch_array($result,MYSQL_ASSOC);

			$_SESSION["id"] = $data["id"];
			$_SESSION["user"] = $data["nombre"];
            $_SESSION["user_ap"] = $data["apellidos"];
			$_SESSION["pin"] = $data["password"];
			$_SESSION["tipo"] = $data["tipo"];
			$_SESSION["nivel"] = $data["nivel"];

			if($_POST["recuerdame"]=="1"){
				$_SESSION["recuerdame"] = "1";
			}else{
				$_SESSION["recuerdame"] = "0";
				}

			/* Permisos

			//Avisos *Si pueden publicar también editar
			$_SESSION["pubaviso"] = $data["perm_pubaviso"];

			//Boletines *Si pueden publicar también editar
			$_SESSION["pubbol"] = $data["perm_pubbol"];

			//Indicadores *Si pueden publicar también editar
			$_SESSION["pubind"] = $data["perm_pubind"];

			//Biblioteca *Si pueden publicar también editar
			$_SESSION["bibli"] = $data["perm_bibli"];

			//Sala de juntas *Si pueden reservar
			$_SESSION["sala"] = $data["perm_salajuntas"];

			//Cumpleaños de Clientes
			$_SESSION["concumpclients"] = $data["perm_concumpclients"];

			//Bolsa de Trabajo
			$_SESSION["bolsatrabajo"] = $data["perm_bolsatrabajo"];
			*/


			$_SESSION["autentificado"]="SI";
			$_SESSION["ultimoacceso"]=date("G:i");

			login_history($_SESSION["id"]);

			if(isset($_GET["y"])){
				header("Location: $_GET[y]");
				/*print('<script type="text/javascript">window.location="$_GET["y"]"</script>');*/
			}else{
				header("Location: Inicio");
			}

		}else{
			//llegamos a este else porque el usuario si es valido pero el password no
			$_SESSION["errorusuario"]="si";
			aviso("Algo estuvo Mal, revisa y vuelve a intentar",3);
			login();
		}


}else{
	login();
}
analytics();
?>
</body>
</html>
