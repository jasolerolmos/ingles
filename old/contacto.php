<?php 
/*
	Prueba de diseño de la plataforma de Ingles
*/

include("inc/conf.php");
include("inc/func.php");
include("inc/menu.php");

// Variables locales de la sección.
$titulo = "Contacto";
$title = "Ingles a su medida";

$menu_lateral = false;
// --------------------------------

include("header.php");
include($theme_dir."contacto.php");
include("footer.php");
?>