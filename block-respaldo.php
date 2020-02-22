<head>
<script src="assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
<link href="webarch/css/webarch.css" rel="stylesheet" type="text/css" />
<style>
#WindowLoad
{
    position:fixed;
    top:0px;
    left:0px;
    z-index:3200;
    background:#e5e9ec;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ventana Cargando</title>
</head>

<body>

<input value="Abrir Div que Bloquea Pantalla" type="button" onclick="jsShowWindowLoad('Se realiza una operación')" /><br>
</body>

<script>
function jsRemoveWindowLoad() {
	// eliminamos el div que bloquea pantalla
		
    $("#WindowLoad").remove();

}


function desbloqueo() {
	// eliminamos el div que bloquea pantalla
	var clave = $("#pass_block").val()	
    if(clave == "1234"){
		$("#WindowLoad").remove();
	}else{
		alert("valor: " + clave);	
	}
}

function jsShowWindowLoad(mensaje) {
	//eliminamos si existe un div ya bloqueando
    jsRemoveWindowLoad();
   
    //si no enviamos mensaje se pondra este por defecto
    if (mensaje === undefined) mensaje = "Procesando la información<br>Espere por favor";
   
    //centrar imagen gif
    height = 20;//El div del titulo, para que se vea mas arriba (H)
    var ancho = 0;
    var alto = 0;
	
	//obtenemos el ancho y alto de la ventana de nuestro navegador, compatible con todos los navegadores
    if (window.innerWidth == undefined) ancho = window.screen.width;
    else ancho = window.innerWidth;
    if (window.innerHeight == undefined) alto = window.screen.height;
    else alto = window.innerHeight;
    
	//operación necesaria para centrar el div que muestra el mensaje
    var heightdivsito = alto/2 - parseInt(height)/2;//Se utiliza en el margen superior, para centrar
	
   //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargando
    imgCentro = '<div style="text-align:center;height:' + alto + 'px;"><div  style="color:#000;margin-top:' + heightdivsito + 'px; font-size:20px;font-weight:bold">' + mensaje + '</div><input id="pass_block" type="text" name="pass_block"><input type="button" value="salir" onClick="desbloqueo()" />';

        //creamos el div que bloquea grande------------------------------------------
        div = document.createElement("div");
        div.id = "WindowLoad"
        div.style.width = ancho + "px";
        div.style.height = alto + "px";
        $("body").append(div);

        //creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
        input = document.createElement("input");
        input.id = "focusInput";
        input.type = "text"

		//asignamos el div que bloquea
        $("#WindowLoad").append(input);
        
		//asignamos el foco y ocultamos el input text 
        $("#focusInput").focus();
        $("#focusInput").hide();
		
		//centramos el div del texto
        $("#WindowLoad").html(imgCentro);

}
</script>
</html>