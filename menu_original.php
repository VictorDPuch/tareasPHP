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
				display:none;
				position:absolute;
				/*min-width:140px;
				margin-left:-50px;*/
				border: 1px solid #c9c9c9;
    			padding-inline-start: 0px;
				list-style:none;
			}
			
			.nav li:hover > ul {
				display:block;
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
			
		</style>
        
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

<li class="quicklinks m-r-10"> <a href="Inicio" title="Inicio"><i class="material-icons"><img class="img-home" src="assets/img/favicon.png"></i></a></li>
<li class="quicklinks menu-desplegable"><i class="material-icons" style="font-size: 25px; padding-top: 4px; padding-right: 4px; cursor:pointer;">menu</i>
    <ul class="subnivel">
    	
        <li><a href="#">Tareas <i style="float:right" class="material-icons">arrow_right</i></a>
        	<ul class="sub-subnivel">
           		<li><a href="NuevaTarea">Nueva Tarea</a></li>
            	<li><a href="MisTareas">Mis Tareas</a></li>
                <li><a href="PendientesInvolucrados">Tareas involucradas</a></li>
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
        
        <li><a href="">Reportes</a></li>
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

<li  class="quicklinks ">
<a id="nuevatar" href="NuevaTarea"><button type="button" class="btn btn-white btn-sm btn-small"><span >Nueva</span></button></a>
</li>
<li class="quicklinks"> <span class="h-seperate"></span></li>

<li class="quicklinks">
<a href="#" class="titulo" id="my-task-list" data-placement="bottom" data-content='' data-toggle="dropdown" data-original-title="Equipo de Trabajo" title="Equipo de Trabajo">
<i class="material-icons">notifications_none</i>
 <span class="badge badge-important bubble-only"></span>
</a>
</li>

<li class="m-r-10 input-prepend inside search-form no-boarder">
<form action="Buscador" method="get">
<span class="add-on"> <i class="material-icons">search</i></span>
<input name="" type="text" class="no-boarder " placeholder="Buscador" style="width:180px;">
</form>
</li>

<?php if("Inicio" == basename($_SERVER['REQUEST_URI'])){ ?>
<li>
<ul class="nav nav-pills" role="tablist" style="position: initial; margin-bottom:0px; margin-left: 92%; width:160px; display:inline-block; box-shadow:none; border:none;">
<li class="active" style="width:80px">
<a href="#tareas"  class="btn-small" onclick="document.getElementById('nuevatar').href = 'NuevaTarea'" role="tab" data-toggle="tab">Tareas</a>
</li>
<li style="width:80px">
<a href="#minutas" class="btn-small" onclick="document.getElementById('nuevatar').href = 'NuevaMinuta'" role="tab" data-toggle="tab">Minutas</a>
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
<ul class="nav quick-section ">
<li class="quicklinks">
<div class="user-details"> 
						<div class="username">
							<span style="color: #0059A5;"><?php $words = explode(" ", $_SESSION["user"]); echo $words[0]; ?></span> <span style="color:#000;" class="bold"><?php $words = explode(" ", $_SESSION["user_ap"]); echo $words[0]; ?></span>									
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

</div>

</div>

</div>
