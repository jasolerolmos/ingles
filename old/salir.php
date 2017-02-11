<?php 
/*
	Prueba de diseño de la plataforma de Ingles
*/

include("inc/conf.php");


$_SESSION['id'] = 0;
unset($_SESSION['nombre']);
unset($_SESSION['nivel']);

include("inc/func.php");
include("inc/menu.php");

// Variables locales de la sección.
$titulo = "Inicio";
$title = "Ingles a su medida";
// --------------------------------


include("header.php");
include($theme_dir."login.php");
include("footer.php");
?>