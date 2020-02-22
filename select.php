<!doctype html>
<html>
<head>
<?php
	include("cfg/func.php");
	include("cfg/misc.inc");
?>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<table>
   <tr>
      <td align=right>Grupo:</td>
      <td align=left colspan=3>
          <!-- Añadido onchange para cargar los pueblos -->
          <select name="grupo" id="grupo" onchange="cargarPueblos();">
              <!-- Hay que terminar los options -->
              <!-- 
                   Eliminado de value la llamada a la función,
                   si eso funciona lo desconocía, y aunque 
                   lo haga es totalmente innecesario, 
                   lo correcto es usar el evento onchange 
                -->
              <option value="">Seleccione una Provincia...</option>
          </select>
      </td>
  </tr>
  <tr>                    
      <td align=right>Empresa:</td>
      <td align=left colspan=3>
          <select name="empresa" id="empresa">
              <!-- Hay que terminar los options -->
              <!-- 
                   Eliminado de value la llamada a la función,
                   si eso funciona lo desconocía, y aunque 
                   lo haga es totalmente innecesario, 
                   lo correcto es usar el evento onchange 
                -->
              <option value="">Seleccione un Pueblo...</option>
          </select>
      </td>
  </tr>
</table>

<script>
function cargarProvincias() {
	<?php
	
	$query = mysql_query("SELECT DISTINCT id, grupo FROM grupoemp WHERE status='1' Order by grupo") or die(mysql_error()); 
	$total = mysql_num_rows($query);
	$i = 1;
	
	echo 'var array = [';
	while($row = mysql_fetch_array($query,MYSQL_ASSOC)){
		
		if($i < $total){
			echo '"'.str_replace(" ", "_", $row["grupo"]).'",';
			$i++;
		}else{
			echo '"'.str_replace(" ", "_", $row["grupo"]).'"];';
			}
	}
	?>
	array.sort();
    addOptions("grupo", array);
}


//Función para agregar opciones a un <select>.
function addOptions(domElement, array) {
    var selector = document.getElementsByName(domElement)[0];
    for (grupo in array) {
        var opcion = document.createElement("option");
        opcion.text = array[grupo];
        // Añadimos un value a los option para hacer mas facil escoger los pueblos
        opcion.value = array[grupo].toLowerCase()
        selector.add(opcion);
    }
}



function cargarPueblos() {
    // Objeto de provincias con pueblos
	
	<?php
	
	$query2 = mysql_query("SELECT DISTINCT id, grupo FROM grupoemp WHERE status='1' Order by grupo") or die(mysql_error());
	//echo "total: ".$total; = 5
	echo 'var listaPueblos = {';
	$k = 0;
	
	while($row1 = mysql_fetch_array($query2,MYSQL_ASSOC)){ //Grupos
		
		
		echo str_replace(" ", "_",strtolower($row1["grupo"])).': ["';
		
		
		if($k < $total){
			
			//Empresas
			$query3 = mysql_query("SELECT DISTINCT id, empresa FROM empresa WHERE idGrupoemp='".$row1["id"]."' Order by empresa") or die(mysql_error());
			$total2 = mysql_num_rows($query3); //Total de empresas en cada grupos 
			
			if($total2 != 0){
				$j = 1;
				while($row2 = mysql_fetch_array($query3,MYSQL_ASSOC)){
					
					if($j < $total2){
						echo $row2["empresa"].'","';
						$j++;
					}else{
						echo $row2["empresa"].'"],';
					}
				}
			}
			//Termina Empresas
			
			$k++;
		}else{
			echo $row["grupo"].'"]';
			}
		
	}
	echo '}';
	
	?>
		
	
    var provincias = document.getElementById('grupo')
    var pueblos = document.getElementById('empresa')
    var provinciaSeleccionada = provincias.value
    
    // Se limpian las empresas
    pueblos.innerHTML = '<option value="">Seleccione una empresa...</option>'
    
    if(provinciaSeleccionada !== ''){
      // Se seleccionan los pueblos y se ordenan
      provinciaSeleccionada = listaPueblos[provinciaSeleccionada]
      provinciaSeleccionada.sort()
    
      // Insertamos las empresas
      provinciaSeleccionada.forEach(function(pueblo){
        let opcion = document.createElement('option')
				
		opcion.value = 2
        opcion.text = pueblo
		
        pueblos.add(opcion)
      });
	  
	 
	  
	  
    }
    
  }
  
 // Iniciar la carga de provincias solo para comprobar que funciona
cargarProvincias();

</script>
</body>
</html>