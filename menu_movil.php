<div class="page-sidebar " id="main-menu">

<div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
<div class="user-info-wrapper sm">
<div class="profile-wrapper sm">

<a href="MiPerfil">
<img src="<?php perfil($_SESSION["id"]); ?>"  alt="<?php print($_SESSION["user"]." ".$_SESSION["user_ap"]); ?>" title="<?php print($_SESSION["user"]." ".$_SESSION["user_ap"]); ?>" data-src="<?php perfil($_SESSION["id"]); ?>" data-src-retina="<?php perfil($_SESSION["id"]); ?>" width="69" height="69" /> 
</a>

</div>
<div class="user-info sm">
<div style="font-size:1em; padding-top:10px;" ><a href="perfil.php">Bienvenido</a></div>
<a href="MiPerfil">
<div class="username" style="color:#999; font-size:1em;">
<span style="color: #0059A5;"><?php $words = explode(" ", $_SESSION["user"]); echo $words[0]; ?></span> <span style="color:#FFF;" class="bold"><?php $words = explode(" ", $_SESSION["user_ap"]); echo $words[0]; ?></span></div>
<div class="status" style="font-size:12px;"><?php acceso($_SESSION["tipo"]);?></div>
</a>	
</div>
</div>


<p class="menu-title sm">MENU <span class="pull-right"><a href="javascript:refresh();"><i class="material-icons">refresh</i></a></span></p>
<ul>
<li><a href="MiPerfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
                
             
                    <?php if($_SESSION["tipo"]=="1"){ ?>
                    <li><a href="Ajustes"><i class="fa fa-cog"></i> Ajustes </a></li>
                    <?php } ?>
                  
                  <li><a href="Reportar"><i class="fa fa-bug"></i> Reportar Error</a></li> 
                  <li class="divider"></li>               
                  <li><a href="Salir"><i class="fa fa-power-off"></i> Salir</a></li>
</ul>

<div class="clearfix"></div>

</div>
</div>