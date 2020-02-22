<?php

	include("cfg/misc.inc");
	
	$query = mysql_query("SELECT * FROM usuario") or die(mysql_error());
	
	
	while($row = mysql_fetch_array($query,MYSQL_ASSOC)){          
		
		echo $str = "INSERT INTO `usuario2`(`id`, `nombre`, `apellidos`, `cumpleanios`, `idEmpresa`, `idGrupo`, `depto`, `cargo`, `status`, `genero`, `email`, `password`, `imagen`, `jefe`, `nivel`, `tipo`, `registro`, `edicion`) VALUES ('".$row["id"]."','".$row["primer_nombre"]." ".$row["segundo_nombre"]." ".$row["otro_nombre"]."','".$row["primer_apellido"]." ".$row["segundo_apellido"]."','".$row["cumpleanios"]."','".$row["idEmpresa"]."','".$row["idGrupo"]."','".$row["depto"]."','".$row["cargo"]."','".$row["status"]."','".$row["genero"]."','".$row["email"]."','".$row["password"]."','".$row["imagen"]."','".$row["jefe"]."','".$row["nivel"]."','".$row["tipo"]."','".$row["registro"]."','".$row["edicion"]."');";
		echo "<br>";
	}
				  
?>