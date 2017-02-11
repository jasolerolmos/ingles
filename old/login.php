<?php 
/*
	Prueba de diseño de la plataforma de Ingles
*/

include("inc/conf.php");
include("inc/func.php");
include("inc/menu.php");

//Analizamos el usuario y la contraseña

// Ahora sin base de datos
if($_POST['login']=='jose' && $_POST['pass']=='jose'){
	$_SESSION['id'] = 1;
	$_SESSION['nombre'] = "jose";
	$_SESSION['nivel'] = 1;
}
else{
	$_SESSION['id'] = 0;
}
//


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
	$titulo = $_SESSION['nombre'];
	$title = "Taquilla";
	include($theme_dir."taquilla.php");
}
include("footer.php");
?>