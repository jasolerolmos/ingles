<?php
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("css/general.css.php"); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_dir."style.css";?>" media="screen" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen" />
<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="js/func.js"></script>
<title><?php echo $title; ?></title>
</head>
<body>
	<div align="center">
		<div id="page">
			<div id="header"  align="center" class="row">
				<div style="font-size: 64px; color: white;padding-top: 10px;padding-left: 10px">Inglés a tu medida</div>
			</div>
			
			<div id="center" class="row">
				<div id="menu_superior" style="" >
					<table border="0" cellpadding="0px" cellspacing="0px" width="90%">
						<tr>
							<?php
								foreach ($menu_sup AS $m){
									echo '<td class="texto_menu"><a href="'.Url_Amigable($m['link']).'" >'.$m['texto'].'</a></td>';
								}
							?>
						</tr>
					</table>
				</div>
				<?php
					if($menu_lateral==true){
				?>
				<div id="menu_lateral">
					<div style="background-color: #79bef2" align="center"><a class="texto_menu" onclick="MenuLateral()" id="desplegar" src="img/desplegar.gif">Opciones</a></div>
					<table border="0" cellpadding="0" cellspacing="0" width="100%" align="right" id="tabla_menu_lateral" style="display: none">
						<?php
							foreach ($menu_lat AS $m){
								echo '<tr><td class="texto_menu" height="40px"><a href="'.Url_Amigable($m['link']).'" >'.$m['texto'].'</a></td></tr>';
							}
						?>
					</table>
				</div>
				<?php
					}
					else {
						?>
						<div id="div_login">
							<?php
							if($_SESSION['id']==0)
								echo "<a class=\"login\" href=\"".Url_Amigable('login')."\">Login</a>";
							else{
								echo "<a class=\"login\" href=\"".Url_Amigable('salir')."\">Salir</a>";
								//echo '<a class="login" href="'.Url_Amigable('salir').'">Salir</a>';
							}
							?>
						</div>
						<?php
					}
				?>
				<div id="content" style="float: left; width: 100%; text-align: left">