<?php
/*
	Fichero de configuración primario.
*/

session_start();

// Configuración de los estilos

$color_fondo_cabecera = "#098cf1";
$color_letra_cabecera = "#FFFFFF";
$color_fondo_pie = "#098cf1";
$color_letra_pie = "#000000";

$color_fondo_menu_superior = "#000000";
$color_letra_menu_superior = "#FFFFFF";

$theme_dir = "theme/alfa/";

$_SESSION['urls_amigables'] = true;
$_SESSION['tema'] = "alfa";

$mysqli = new mysqli("192.168.1.55","tyger","canijo","vocabulario");
//$mysqli = new mysqli("localhost","lechien","reservas2016","lechien");

?>