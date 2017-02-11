<span class="titulo_seccion"><?php echo $titulo;?></span>
<script type="text/javascript">
	function verCategoria(){
		$(".word").hide()
		$(".c"+$("#listaCategorias :selected").val()).show()
	}
</script>
<select id="listaCategorias" onchange="verCategoria();nuevoExamen()">
<?php

	if(isset($_GET['cat'])){
		$categoria = $_GET['cat'];
	}
	else{
		$categoria = rand(1,32);
	}

	$sql = "select * from categorias ORDER BY nombre ASC";
	$cat = mysql_query($sql);
	while ($item = mysql_fetch_assoc($cat)) {
		$categorias[] = $item;
		if($item['id']==$categoria){
			$selected = "selected";
		}
		else{
			$selected = "";
		}
		echo "<option value=\"".$item['id']."\" ".$selected.">".$item['nombre']."</option>";
	}
?>
</select>

	<?php
	$sql = "select * from categorias WHERE id=".$categoria." ORDER BY nombre ASC";
	$cat = mysql_query($sql);
	
		$sql = "select * from ingles_palabras WHERE id_cat=".$categoria." ORDER BY ingles ASC";
		$aux = mysql_query($sql);
		echo '<div id="tablaPalabras"><table class="c'.$c['id'].' word"  style="text-align: left">';
		//echo "<tr><td>".$sql."</td></tr>";".$sql."</td></tr>";
		$numero = 0;
		while ($item = mysql_fetch_assoc($aux)) {
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
						'.$examen[$palabra]['espanol'].'
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

</script>