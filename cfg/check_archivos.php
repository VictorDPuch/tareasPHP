<?php
// muestra, p.ej.  La última modificación de archivo.txt fue: December 29 2002 22:16:23.

//funcion para mostrar peso de archivos
function tamano_archivo($peso , $decimales = 2 ) {
$clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
}



$dir = "../assets/img/galeria/";
 
// Abre un directorio conocido, y procede a leer el contenido
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo $file;
			/*if (file_exists($file)) { //se requiere verificar si existe el archivo
				echo  date ("F d Y H:i:s.", filemtime($file))." ";
				//Tamaño del archivo
				echo tamano_archivo(filesize($file));
			}*/
			
			
			
			echo "<br>";
        }
        closedir($dh);
    }
}



?>