<?php

header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Usuarios_FCHWeb.xls");


function check_news($dato){
	switch($dato){
		case(0):
			$m = " ";
			break;
		case(1):
			$m = " X ";
			break;	
	
	}
	echo $m;
}


include("cfg/misc.inc");
include("cfg/func.php");
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

                
                
                <table class="table table-hover table-condensed" border="1" >
                  <thead>
                    <tr>
                      <th style="width:2%" >#ID</th>
                      <th style="width:22%">Nombre</th>
                      <th style="width:20%">Genero</th>
                      <th style="width:22%">Cumpleaños</th>
                      <th style="width:8%">Tipo</th>
                      <th style="width:20%">Email</th>
                      <th style="width:20%">Email Alternativo</th>
                      <th style="width:20%">Empresa</th>
                      <th style="width:20%">Grupo Empresarial</th>
                      <th style="width:20%">Departamento</th>
                      <th style="width:20%">Cargo</th>
                      <th >Boletines</th>
                      <th >Indices</th>
                      <th style="width:20%">Registro</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                   <?php 
              $q = mysql_query("SELECT * FROM usuario WHERE status='1' AND id!='1' ORDER BY nombre ASC") or die(mysql_error());
              while($row = mysql_fetch_array($q,MYSQL_ASSOC)){          
       				?>
                    <tr>
                      <td><span class="muted"><?php echo $row["id"]; ?></span></td>
                      <td class="v-align-middle"><?php echo $row["nombre"]." ".$row["apellido"]; ?></td>
                      <td class="v-align-middle"><?php echo $row["genero"]; ?></td>
                      <td class="v-align-middle"><?php echo $row["cumpleanios"]; ?></td>
                      <td class="v-align-middle"><?php print(tipo_user($row["tipo"])); ?></td>
                      <td><span class="muted"><?php echo $row["email"]; ?></span></td>
                      <td class="v-align-middle"><?php echo $row["email_alternativo"]; ?></td>
                      <td class="v-align-middle"><span class="muted"><?php echo $row["empresa"]; ?></span></td>
                      <td class="v-align-middle"><span class="muted"><?php echo $row["grupo"]; ?></span></td>
                      <td class="v-align-middle"><span class="muted"><?php echo $row["depto"]; ?></span></td>
                      <td class="v-align-middle"><span class="muted"><?php echo $row["cargo"]; ?></span></td>
                      <td class="v-align-middle"><span class="muted"><?php check_news($row["emailing"]); ?></span></td>
                      <td class="v-align-middle"><span class="muted"><?php check_news($row["indice_emailing"]); ?></span></td>
                      <td class="v-align-middle"><span class="muted"><?php echo $row["registro"]; ?></span></td>
                    </tr>
                   <?php
			  }
				   ?>
                  </tbody>
                </table>


</body>
</html>