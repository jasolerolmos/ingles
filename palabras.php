<?php
//$mysqli = new mysqli("localhost","lechien","reservas2016","lechien");
include("inc/conf.php");
include("inc/func.php");
include("inc/menu.php");

?>
<!DOCTYPE html>
<html lang="es">
    <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Libreta Comandero</title>
        <!-- CSS -->
		<?php include("css/general.css.php"); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $theme_dir."style.css";?>" media="screen" />
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/lightbox.css">
        <link type="text/css" rel="stylesheet" href="css/PrintArea.css" /> 
        <link rel="stylesheet" href="css/estilos.css">
        <!-- JavaScript -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.PrintArea.js"></script>
    </head>
<body>
	<div class="container show-top-margin separate-rows tall-rows">
	<div class="row">
		<div class="col-md-12" align="center">
			<span style="font-size: 32px; color: black">Inglés a tu medida</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10" style="background-color: black">
			<span class="titulo_seccion"><?php echo $titulo;?></span>
			<table border="0" cellpadding="0px" cellspacing="0px" width="100%">
				<tr>
					<?php
						foreach ($menu_sup AS $m){
							echo '<td class="texto_menu"><a href="'.($m['link']).'" >'.$m['texto'].'</a></td>';
						}
					?>
				</tr>
			</table>
		</div>
		<div class="col-md-2" style="background-color: #cdcdcd">
			<?php
			if($_SESSION['id']==0)
				echo "<a class=\"login\" class=\"color: black\" href=\"".Url_Amigable('login')."\">Login</a>";
			else{
				echo "<a class=\"login\" class=\"color: black\" href=\"".Url_Amigable('salir')."\">Salir</a>";
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			
			<?php
				$sql = "select * from categorias ORDER BY nombre ASC";
				if(isset($_GET['cat'])){
					$categoria = $_GET['cat'];
				}
				else{
					$categoria = rand(1,32);
				}
				
				$cat = $mysqli->query($sql);
				echo '<select id="listaCategorias" onchange="verCategoria();nuevoExamen()">';
				while ($item = $cat->fetch_array()) {
					$categorias[] = $item;
					if($item['id']==$categoria){
						$selected = "selected";
					}
					else{
						$selected = "";
					}
					echo "<option value=\"".$item['id']."\" ".$selected.">".utf8_encode($item['nombre'])."</option>";
				}
			?>
			</select>
			<?php
			$sql = "select * from ingles_palabras WHERE id_cat=".$categoria." ORDER BY ingles ASC";
			$aux = $mysqli->query($sql);
			echo '<div id="tablaPalabras" style="padding-left: 30px"><table class="c'.$c['id'].' word"  style="text-align: left">';
			//echo "<tr><td>".$sql."</td></tr>";".$sql."</td></tr>";
			$numero = 0;
			while ($item = $aux->fetch_array()) {
				$numero++;
				$examen[] = $item;
			}
			$aleatorios = array();
			for ($i=0; $i < 10; $i++) { 
				$ale = rand(0,count($examen)-1);
				if(!in_array($ale, $aleatorios))
					$aleatorios[] = $ale;
				else
					$i--;
			}
			foreach ($aleatorios as $key => $palabra) {
				echo '
					<tr style="height: 38px">
						<td style="display: none">
							'.$palabra.' '.$key.' '.$examen[$palabra]['id'].'
						</td>
						<td style="width: 300px">
							'.utf8_encode($examen[$palabra]['espanol']).'
						</td>
						<td style="width: 100px">
							<input type="text" ingles="'.$examen[$palabra]['ingles'].'" id="'.$examen[$palabra]['id'].'"" class="respuesta"/>
						</td>
						<td style="width: 40px">
							<img src="img/ok.png" id="'.$examen[$palabra]['id'].'ok" style="display: none"/>
							<img src="img/ko.png" id="'.$examen[$palabra]['id'].'ko" style="display: none"/>
						</td>
						<td>
							<span class="soluciones" style="display: none">'.$examen[$palabra]['ingles'].'</span>
						</td>
					</tr>'
				;
			}
			echo '</table></div>';
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" align="center">
			<button onclick="Corregir()">Corregir</button>
			<button onclick="$('.soluciones').toggle()">Soluciones</button>
			<button onclick="nuevoExamen()">Recargar</button>
			<script type="text/javascript">
				function Corregir(){
					$(".respuesta").each(function(){
						$("#"+$(this).attr("id")+"ok").hide()
						$("#"+$(this).attr("id")+"ko").hide()
						if($(this).attr("ingles").toLowerCase()==$(this).val().toLowerCase())
							$("#"+$(this).attr("id")+"ok").show()
						else
							$("#"+$(this).attr("id")+"ko").show()
					})
					}
				function nuevoExamen(){
					$.ajax({
				        statusCode: {
				            404: function() {
				                alert('Libreria no encontrada');
				            }
				        },
				        url: 'theme/alfa/func.php',
				        type: "POST",
				        data: "cat="+$('#listaCategorias :selected').val(),
				        beforeSend: function(){
				        },
				        success: function(datos){
				            $("#tablaPalabras").html(datos)
				        }
				    });
				}
				function verCategoria(){
					$(".word").hide()
					$(".c"+$("#listaCategorias :selected").val()).show()
				}
				</script>
		</div>
	</div>
	</div>
</body>

