<style>
body{
	background-color: #79bef2;
}
#page{
	width: 900px;
	background: #FFFFFF;
}
#header{
	height: 130px; 
	background: #79bef2 url('img/theme/fondo_header.png') no-repeat top left; 
	color: <?php echo $color_letra_cabecera;?>;
}
#center{
	height: 600px; 
	background: #FFFFFF url('img/theme/fondo_cuerpo_sup.png') no-repeat top left; 
	color: <?php echo $color_letra_cabecera;?>;
}
#menu_superior{
	background: transparent url('img/theme/menu_sup.png') no-repeat top left; 
	width: 450px; 
	height: 30px; 
	float: left;
	margin: 5px 0 0 5px;
	padding-top: 4px;
	padding-left: 15px;
	text-align: left;
}
#menu_lateral{
	position: relative;
	right: 5px;
	background: transparent url('img/theme/menu_lat.png') no-repeat top right; 
	color: <?php echo $color_letra_menu_superior;?>; 
	width: 120px; 
	height: 30px; 
	float: right;
	padding-top: 4px;
	margin: 5px 5px 0 0;
	text-align: right;
	z-index: 999;
}
#div_login{
	
	right: 5px;
	background: transparent url('img/theme/menu_lat.png') no-repeat top right; 
	color: <?php echo $color_letra_menu_superior;?>; 
	width: 120px; 
	height: 30px; 
	float: right;
	padding-top: 4px;
	margin: 5px 5px 0 0;
	text-align: center;
	text-decoration: none;
}
.texto_menu{	
	color: <?php echo $color_letra_menu_superior;?>;
	text-align: center;
	text-decoration: none;
}
.texto_menu a:link , .texto_menu a:visited{
	color: #FFFFFF;
	text-decoration:none;
}
.texto_menu a:hover, .texto_menu a:active{
	color: orange;
}
#footer{
}
</style>
