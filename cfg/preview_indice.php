<?php
require_once("func.php");

$hoy = date("Y-m-d");

 //Obtenemos el tipo de cambio
	  $file = file('http://www.banxico.org.mx/tipcamb/tipCamMIAction.do?idioma=sp');
		$webpage = ""; //Declaramos la variable contenedora
		
		foreach($file as $linenum => $line){
			$webpage .= $line; //Creamos la concatenacion de caracteres
		}

		 $txt = '<table border="0" width="100%" cellspacing="0">'; //Especificamos el texto a buscar saltando comillas
		 $search = strpos($webpage, $txt); //Buscamos el texto en la variable string, devuelve posicion donde se encuentre la cadena

		$tabla = substr($webpage,$search,7263); //Extraemos el texto apartir del texto especificado hasta el numero de caracteres establecido
		
		/***********************/
		
?>	  

<table width="100%" align="center" border="0" cellspacing="0" cellpadding="10" bgcolor="#FFFFFF">
   <!-- logo area start -->
                                <tr>
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="20" align="center" bgcolor="#0059A5">
                                      <tr>
                                     
                                        <td ><p style="color:#FFF; font-size:20px"><?php echo strtoupper(element_fecha($hoy,"mes")).' '.element_fecha($hoy,"anio"); ?></p><strong style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:40px; line-height:40px; color:#FFFFFF; padding-top:6px; text-align:center">INDICE DEL DOF Y TIPO DE CAMBIO DEL DOLAR </strong><br>
                                        <p style="color:#FFF; font-size:18px">DEL DIA <?php echo fecha_corta($hoy) ?></p>
                                        </td>
                                        
                                      </tr>
                                       
                                    </table></td>
                                </tr>
                                <!-- logo area end -->
          <tr>
          <td>
          <h3><u>A.	ÍNDICE DEL DIARIO OFICIAL:</u></h3>
		  <p>Se adjunta a este correo.</p>
 
		   <h3><u>B.	TIPO DE CAMBIO DEL DÍA:</u></h3><br> 

          <!-- -->
          <table width="65%" align="center">
          <tr>
          <td>
          <strong style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:16px; color:#01404C; padding-top:6px; text-align:center">Tipo de cambio para solventar obligaciones denominadas en dólares de los EE.UU.A.,
pagaderas en la República Mexicana <sup>1/</sup></strong><br>
          </td>
          </tr>
          <tr>
          <td><?php echo $tabla; ?></td>
          </tr>
          <tr>
          <td>
          <br>
          <p style="font-size:12px; text-align:justify">1/ Para mayor información sobre este tipo de cambio consulte: <a href="http://www.banxico.org.mx/disposiciones/normativa/circular-3-2012/%7B60333E30-FC8B-94D3-E1D0-4AF8E3C75E90%7D.pdf" target="_blank">El Título Tercero, Capítulo V de la Circular 3/2012 del Banco de México</a>.<br><br>

2/ El tipo de cambio FIX es determinado por el Banco de México los días hábiles bancarios con base en un promedio de las cotizaciones del mercado de cambios al mayoreo para operaciones liquidables el segundo día hábil bancario siguiente. Dichas cotizaciones se obtienen de plataformas de transacción cambiaria y otros medios electrónicos con representatividad en el mercado de cambios. El Banco de México da a conocer el FIX a partir de las 12:00 horas de todos los días hábiles bancarios.<br><br>
3/ El tipo de cambio FIX se publica por el Banco de México en el Diario Oficial de la Federación el día hábil bancario inmediato siguiente a su determinación.<br><br>
4/ El tipo de cambio que se debe de utilizar el día de hoy para calcular el equivalente en pesos del monto de las obligaciones de pago denominadas en dólares de los EE.UU.A. para ser cumplidas en la República Mexicana, debe de ser el publicado por el Banco de México en el Diario Oficial de la Federación el día hábil bancario inmediato anterior.<br><br>
</p>
          </td>
          </tr>
          </table>
          </td>
          </tr> 
          <tr>
          <td>
          <p style="font-size: 13px;"><strong>NOTA:</strong> La tabla anterior con sus notas, es transcripción fiel de los Tipos de Cambio que aparecen en la siguiente liga:</p>
<i style="font-size:11px;">*fuente: <a href="http://www.banxico.org.mx/portal-mercado-cambiario/" target="_blank">http://www.banxico.org.mx/portal-mercado-cambiario/</a></i><br>

<p style="font-size: 13px">El tipo de cambio a utilizar para efectos fiscales, a que se refiere el articulo 20 del Código Fiscal de la Federación (cuando no hay adquisición) es el que el Banco de México identifica en la última columna (TIPO DE CAMBIO PARA PAGOS).</p>

          </td>
          </tr>
          <tr>
    <td><table width="100%" align="center" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
        <!--copy right text start-->
        <tr>
          <td valign="top" bgcolor="#FFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" height="15"></td>
              </tr>
              
              <tr>
              <td align="left" rowspan="2" ><a href="#" target="_blank"><img style="height:40px; width:167px;" src="../../images/logo.png"  alt="logo ficachi" ></a></td>
              <td   align="right" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:13px; line-height:20px; color:#000000;"><strong>Pizarro No. 41</strong> Fracc. Reforma C.P. 91919&nbsp;&nbsp;</td>
              </tr>
              
                <tr>
                
                <td  align="right" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:10px; line-height:20px; color:#000000;"><span><strong>Veracruz, Ver. M&eacute;xico</strong> Tel./Fax: <strong>+52 (229) 923 5700</strong></span>&nbsp;&nbsp;</td>
              </tr>
              <tr><td colspan="2" height="15"></td></tr>
              <tr>
                <td colspan="2" align="center" style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:10px; line-height:18px; color:#999999;"><strong>&copy; 2018 - Ficachi Consultores, S.C. Todos los derechos reservados.</strong></td>
              </tr>
              <tr>
                <td colspan="2" height="5"></td>
              </tr>
            </table></td>
        </tr>
        <!--copy right text end-->
      </table></td>
  </tr>

  <tr>
  <td align="center" >
  <span style="font-size:12px; color:#999999">Este correo electr&oacute;nico fue enviado por <strong>FCH Web</strong>.</span>
  <br>
  <span style="font-size:10px; padding:5px; color:#999999">Correo generado automaticamente, NO RESPONDER A ESTE CORREO, para cualquier duda o aclaración  en <a href="http://ficachi.com.mx/Contacto">contacto</a>.</span><br>
  <span style="font-size:10px; padding:5px; color:#999999">Este mensaje se dirige exclusivamente al destinatario referenciado. Si usted no lo es y lo ha recibido por error, proceda a borrarlo, y que en todo caso se abstenga de utilizar, reproducir, alterar, archivar o comunicar a terceros el presente mensaje y ficheros anexos.<br/><br>
<strong>AVISO DE PRIVACIDAD.-</strong> Ficachi y Asociados, S.C., con domicilio en  Pizarro No. 41 Fraccionamiento Reforma en la ciudad de Veracruz, Ver., C.P. 91919 es el responsable del tratamiento de sus datos personales, datos personales sensibles, datos financieros o patrimoniales, que en su caso le sean proporcionados.  Para mayor informaci&oacute;n en relaci&oacute;n con el aviso de privacidad aqu&iacute; mencionado, sus derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n, oposici&oacute;n y limitaci&oacute;n del uso o divulgaci&oacute;n de los datos, la revocaci&oacute;n de su consentimiento, as&iacute; como para conocer las posibles transferencias de informaci&oacute;n que se podr&aacute;n llevar a cabo y cambios a dicho aviso, puede acceder a nuestro aviso de privacidad integral a trav&eacute;s de la p&aacute;gina de internet: Ficachi y Asociados S.C.</span></td>
  </tr>
</table>