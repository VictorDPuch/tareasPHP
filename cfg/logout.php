<?php
include("Cmseguridad.php");
// Borramos toda la sesion
session_destroy();

?>
<SCRIPT LANGUAGE="javascript">
location.href = "/tareas/";
</SCRIPT>

<!-- original location.href = "../" -->