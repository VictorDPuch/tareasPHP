<?php
	require_once("misc.inc");
	/* Datos de ajustes*/
	  $ajus = mysql_query("SELECT * FROM ajustes WHERE id='1'") or die(mysql_error());
	  $row = mysql_fetch_array($ajus, MYSQL_ASSOC);
	  

	@$numero = $_GET["numero"];
	@$anio = $_GET["anio"];
	@$titulo = $_GET["titulo"];
	@$numero = $_GET["numero"];
	@$contenido = $_GET["contenido"];
?>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="10" bgcolor="#FFFFFF">
   <!-- logo area start -->
                                <tr>
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="20" align="center" bgcolor="#0059A5">
                                      <tr>
                                     
                                        <td >
                                        <span style="font-family:Arial, Helvetica, sans-serif, Trebuchet MS; font-size:15px; line-height:32px; color:#FFFFFF; text-align:left;"><strong>Bolet&iacute;n </strong><?php print($numero.'/'.$anio); ?></span><br>
                                        <strong style="font-family: Arial, Helvetica, sans-serif, Trebuchet MS; font-size:20px; line-height:20px; color:#FFFFFF; padding-top:6px; text-align:center; text-transform:uppercase;"><?php print($titulo); ?></strong>
                                        </td>
                                        
                                      </tr>
                                       
                                    </table></td>
                                </tr>
                                <!-- logo area end -->
          <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left" bgcolor="#FFFFFF">
                                     
                                      <tr><td align="left"><?php print($contenido); ?></td></tr>
                                     
                                    </table>
    </td>
  </tr>
</table>
<?php mysql_free_result($ajus); ?>