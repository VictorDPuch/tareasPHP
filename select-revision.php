<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<table>
   <tr>
      <td align=right>Provincia:</td>
      <td align=left colspan=3>
          <!-- Añadido onchange para cargar los pueblos -->
          <select name="provincia" id="provincia" onchange="cargarPueblos();">
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
      <td align=right>Pueblo:</td>
      <td align=left colspan=3>
          <select name="pueblo" id="pueblo">
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
function cargarProvincias(){
	var array = ["CONTINO", "FICACHI", "GILGA", "GRUVER", "NAD_GLOBAL"];
	array.sort();
	addOptions("provincia", array);
}

//Función para agregar opciones a un <select>.
function addOptions(domElement, array) {
    var selector = document.getElementsByName(domElement)[0];
    for (provincia in array) {
        var opcion = document.createElement("option");
        opcion.text = array[provincia];
        // Añadimos un value a los option para hacer mas facil escoger los pueblos
        opcion.value = array[provincia].toLowerCase()
        selector.add(opcion);
    }
}



function cargarPueblos() {
    // Objeto de provincias con pueblos
    	var listaPueblos = {
			contino: ["CONTINO FOTO", "CONTINO SISTEMAS", "CORPORATIVO CONTINO"],
			ficachi: ["FICACHI ASOCIADOS"],
			gilga: ["CORPORATIVO GILGA"],
			gruver: ["CORPORATIVO GRUVER"],
			nad_global: ["CORPORATIVO NAD GLOBAL"]
		 }
    
    var provincias = document.getElementById('provincia')
    var pueblos = document.getElementById('pueblo')
    var provinciaSeleccionada = provincias.value
    
    // Se limpian los pueblos
    pueblos.innerHTML = '<option value="">Seleccione un Pueblo...</option>'
    
    if(provinciaSeleccionada !== ''){
      // Se seleccionan los pueblos y se ordenan
      provinciaSeleccionada = listaPueblos[provinciaSeleccionada]
      provinciaSeleccionada.sort()
    
      // Insertamos los pueblos
      provinciaSeleccionada.forEach(function(pueblo){
        let opcion = document.createElement('option')
        opcion.value = pueblo
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