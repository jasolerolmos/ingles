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
	/*
	$sql = "SELECT * FROM ingles_verbos";
	$consulta = mysql_query($sql);
	while ($lista[] = mysql_fetch_assoc($consulta)){
		$i=0;
	};
	*/
	$sql = "select * from ingles_verbos ORDER BY infinitivo ASC";
	$verbos = mysql_query($sql);
	$i=1;
	
	while ($item = mysql_fetch_assoc($verbos)) {
		$aux[] = $item;
	}
	//Multiples colummnas
	$columnas = 2;
	$cada_col = intval(count($aux)/$columnas);
	if((count($aux)%$columnas)>0)$cada_col++;
		
	$i=0;
	while ($i < $columnas){
		$guia[] = $cada_col*$i++;;
	}
	
	// Variables locales de la sección.
	$titulo = "Verbos Irregulares";
	
	$title = "Lista de verbos irregulares";
	include($theme_dir."lstverbos.php");
}
include("footer.php");
?>