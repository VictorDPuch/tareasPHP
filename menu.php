<?php 
//echo $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
include("cfg/Cmseguridad.php"); 
include("cfg/misc.inc");
?>

<style type="text/css">
			
					
			.nav .menu-desplegable li a {
				background-color: #FCFCFC;
				color:#5F5F5F;
				text-decoration:none;
				padding: 5px 8px;
				display:block;
				text-align:left;
				 
			}
			
			 .nav .subnivel li a:hover {
				background-color:#E9E8E8;
				border-left: 2px solid #999;
				transition: opacity 5s ease 0s, transform 5s ease 0s;
			}
			
			.nav .subnivel .sub-subnivel{
				right: -122px;
			}
			
						
			
			.nav li ul {
				visibility: hidden;
				position:absolute;
				/*min-width:140px;
				margin-left:-50px;*/
				border: 1px solid #c9c9c9;
    			padding-inline-start: 0px;
				list-style:none;
				transition: visibility 1s, opacity 0.5s ease-out 0.5s;
				-webkit-transition: visibility 1s, opacity 0.5s ease-out 0.5s;
			}
			
			.nav li:hover > ul {
				visibility:visible;
				box-shadow: 2px 2px 2px #c9c9c9;
				
				
				
			}
			
			.nav li ul li {
				position:relative;
				width:120px;
				padding-left:0px;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
			
			#btn-nuevo{
				display:inline-block;
				margin-top:-8px;
				margin-left: 5px;	
			}
			
</style>

<script>
function cambia_enlace(valor){
     
   if(valor == "T"){
	   document.getElementById("btn-nuevo").href = "NuevaTarea";
	   alert("Tarea:" + valor);
	}
	
	if(valor == "M"){
		document.getElementById("btn-nuevo").href = "NuevaMinuta";
		 alert("Minuta:" + valor);
	}
}
</script>

<div class="header navbar navbar-inverse ">
<div class="navbar-inner">
<div class="header-seperation">
<ul class="nav pull-left notifcation-center visible-xs visible-sm">
<li class="dropdown">
<a href="#main-menu" data-webarch="toggle-left-side">
<i class="material-icons">menu</i>
</a>
</li>
</ul>

 <a href="../">
     <img src="assets/img/logo.png" alt="logo ficachi" class="logo" alt="" data-src="assets/img/logo.png" data-src-retina="assets/img/logo.png" >
      </a>

<!-- menu movil -->


<?php include("menu_movil.php"); ?>

<!-- fin menu movil -->

<ul class="nav pull-right notifcation-center">
<li class="dropdown hidden-xs hidden-sm">
<a href="Inicio" class="dropdown-toggle active" data-toggle="">
<i class="material-icons">home</i>
</a>
</li>
</ul>
</div>

<div class="header-quick-nav">
<div class="pull-left" id="header">
<ul class="nav quick-section">
<li class="quicklinks menu-desplegable"><i class="material-icons" style="font-size: 25px; padding-top: 4px; padding-right: 4px; cursor:pointer;">menu</i>
    <ul class="subnivel">
    	
        <li><a href="#">Tareas <i style="float:right" class="material-icons">arrow_right</i></a>
        	<ul class="sub-subnivel">
           		<li><a href="NuevaTarea">Nueva Tarea</a></li>
            	<li><a href="MisTareas">Mis Tareas</a></li>
                <li><a href="TareasInvolucradas">Tareas involucradas</a></li>
                <li><a href="Historial">Mi Historial</a></li>
            </ul>
        </li>
        <li><a href="#">Minutas <i style="float:right" class="material-icons">arrow_right</i></a>
        	<ul class="sub-subnivel">
            <li><a href="NuevaMinuta">Nueva Minuta</a></li>
            <li><a href="#">Historial de Minutas</a></li>
            </ul>
        </li>
        <li><a href="EquipoTrabajo">Equipo de trabajo</a></li>
        
       <!-- <li><a href="">Reportes</a></li>-->
        <?php if($_SESSION["tipo"]=="1" || $_SESSION["tipo"]=="2"){ ?>
        <li><a href="#">Gestionar <i style="float:right" class="material-icons">arrow_right</i></a>
        	<ul class="sub-subnivel">
                <li><a href="GestionUsuarios">Gestionar usuarios</a></li>
                <li><a href="GestionGrupoEmpresarial">Gestionar grupos empresarial</a></li>
                <li><a href="GestionEmpresa">Gestionar empresas</a></li>
        	</ul>
        </li>
        <?php } ?>
    </ul>
</li>
<li class="quicklinks m-r-2"> <a href="Inicio" title="Inicio"><i class="material-icons"><img class="img-home" src="assets/img/favicon.png"></i></a></li>
<li  class="quicklinks" style="margin:8px 12px 0px 0px;">
<span id="nuevatar" style="font-size:16px; line-height:20px;"><?php if("Inicio" == basename($_SERVER['REQUEST_URI']) || "NuevaTarea" == basename($_SERVER['REQUEST_URI']) || "MisTareas" == basename($_SERVER['REQUEST_URI']) || "TareasInvolucradas" == basename($_SERVER['REQUEST_URI']) || "Historial" == basename($_SERVER['REQUEST_URI'])){ echo "FCH Tareas"; }else{ echo "FCH Minutas";}?></span>
<?php if("Inicio" == basename($_SERVER['REQUEST_URI'])){ ?>
<a id="btn-nuevo"  href="NuevaTarea"><button type="button" class="btn btn-white btn-sm btn-small"><span id="nombre">Nueva Tarea</span></button></a>
<?php } ?>
</li>
<li class="quicklinks"> <span class="h-seperate"></span></li>


<?php if("Inicio" == basename($_SERVER['REQUEST_URI'])){ ?>
<li>
<ul class="nav nav-pills" role="tablist" style="width:160px; display:inline-block; visibility:visible; box-shadow:none; border:none;">
<li class="active" style="width:80px">
<a href="#tareas"  class="btn-small" style="font-size:14px;" onClick="document.getElementById('nuevatar').innerHTML = 'FCH Tareas', document.getElementById('btn-nuevo').href = 'NuevaTarea', document.getElementById('nombre').innerHTML = 'Nueva Tarea'" role="tab" data-toggle="tab">Tareas</a>
</li>
<li style="width:80px">
<a href="#minutas" class="btn-small" style="font-size:14px;" onClick="document.getElementById('nuevatar').innerHTML = 'FCH Minutas', document.getElementById('btn-nuevo').href = 'NuevaMinuta', document.getElementById('nombre').innerHTML = 'Nueva Minuta'"  role="tab" data-toggle="tab">Minutas</a>
</li>
</ul>
</li>
<?php
}
?>
</ul>
</div>

<?php include("notify.php"); ?>

<div class="pull-right">
<a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
<div class="chat-toggler sm">
<ul class="nav" style="margin-top:3px;">

<li class="quicklinks">
<div class="user-details"> 
						<div class="username">
							<span style="color: #000000;"><?php $words = explode(" ", $_SESSION["user"]); echo $words[0]; ?></span> <span style="color:#000;" class="bold"><?php $words = explode(" ", $_SESSION["user_ap"]); echo $words[0]; ?></span>									
						</div>						
					</div>
                    
<div class="iconset top-down-arrow"></div>
<div class="profile-pic">
<img src="<?php perfil($_SESSION["id"]); ?>"  alt="" data-src="<?php perfil($_SESSION["id"]); ?>" data-src-retina="<?php perfil($_SESSION["id"]); ?>" width="35" height="35" class="material-icons"/>
</div>

</div>
</a>

<ul class="dropdown-menu pull-right " role="menu" aria-labelledby="user-options">
                  <li><a href="MiPerfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
             
                    <?php if($_SESSION["tipo"]=="1"){ ?>
                    <li><a href="Ajustes"><i class="fa fa-cog"></i> Ajustes </a></li>
                    <?php } ?>
                  
                  <li><a href="Reportar"><i class="fa fa-bug"></i> Reportar Error</a></li> 
                  <li class="divider"></li>
                  <li><a href="Bloquear"><i class="fa fa-lock"></i> Bloquear Pantalla</a></li>                
                  <li><a href="Salir"><i class="fa fa-power-off"></i> Salir</a></li>
               </ul>

</li>

</ul>
</div>

<div class="header-quick-nav pull-right">
<div class="sm">
<ul class="nav quick-section" style="display: inline-block; ">

<li class="m-r-10 input-prepend inside search-form no-boarder" style="margin-top:3px;">
<form action="Buscador" method="get">
<span class="add-on"> <i class="material-icons">search</i></span>
<input name="" type="text" class="no-boarder " placeholder="Buscador" style="width:180px;">
</form>
</li>
<li class="quicklinks" style="display:inline-block;">
<a href="#" class="titulo" id="my-task-list" data-placement="bottom" data-content='' data-toggle="dropdown" data-original-title="Equipo de Trabajo" title="Equipo de Trabajo">
<i class="material-icons" style="display:inline-block; font-size:24px; color:#7a7f8c; margin:0px; margin-top: 5px;">notifications_none</i>
 <span class="badge badge-important bubble-only"></span>
</a>
</li>
</ul>
</div>
</div>
</div>

</div>

</div>
