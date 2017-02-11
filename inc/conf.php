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

/*
if($_SERVER["SERVER_NAME"]=="www.lechienandalou.com"){
	$mysqli = new mysqli("localhost","lechien","reservas2016","lechien");
}
else{
	$mysqli = new mysqli("192.168.1.55","tyger","canijo","vocabulario");
}

foreach ($_SERVER as $key => $value) {
    echo "<p>".$key.": ".$value."</p>";
}
      */
if($_SERVER["SERVER_NAME"]=="www.lechienandalou.com"){
	echo "Estamos ONLINE!!!";
	$mysqli = new mysqli("localhost","lechien","reservas2016","lechien");
}
else{
	//echo "Estamos en casa!!!";
	if($_SERVER['SERVER_ADDR']==$_SERVER["REMOTE_ADDR"] && $_SERVER["REMOTE_ADDR"]=="::1"){
		echo "Estamos en el portatil. La base de datos está en ".$_SERVER['SERVER_NAME'];
		$mysqli = new mysqli("192.168.1.105","tyger","canijo","vocabulario");
	}
	else{
		echo "El servidor DB es Linux"; 
		$mysqli = new mysqli("192.168.1.55","tyger","canijo","vocabulario");
	}
}
//$mysqli = new mysqli("localhost","lechien","reservas2016","lechien");

?>