<?php 
/*
	Prueba de diseño de la plataforma de Ingles
*/

include("inc/conf.php");
include("inc/func.php");
include("inc/menu.php");

$menu_lateral = false;
// --------------------------------

include("header.php");
if($_SESSION['id'] == 0){
	// Variables locales de la sección.
	$titulo = "Identificate";
	$title = "Quien eres?";
	include($theme_dir."login.php");
}
else{
	// Variables locales de la sección.
	$titulo = "Lista de Palabras";
	
	$title = "Lista de verbos irregulares";
	include($theme_dir."lstpalabras.php");
}
include("footer.php");
?>