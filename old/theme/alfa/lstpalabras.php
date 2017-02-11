<span class="titulo_seccion"><?php echo $titulo;?></span>
<script type="text/javascript">
	function verCategoria(){
		$(".word").hide()
		$(".c"+$("#listaCategorias :selected").val()).show()
	}
</script>
<select id="listaCategorias" onchange="verCategoria()">
<?php
	$sql = "select * from categorias ORDER BY nombre ASC";
	$cat = mysql_query($sql);
	while ($item = mysql_fetch_assoc($cat)) {
		$categorias[] = $item;
		echo "<option value=\"".$item['id']."\">".$item['nombre']."</option>";
	}
?>
</select>
<table border="2" width="90%">
	<?php
	$sql = "select * from categorias ORDER BY nombre ASC";
	$cat = mysql_query($sql);
	while ($c = mysql_fetch_assoc($cat)) {
		$sql = "select * from ingles_palabras WHERE id_cat=".$c['id']." ORDER BY ingles ASC";
		$aux = mysql_query($sql);
		echo '<table  class="c'.$c['id'].' word">';
		//echo "<tr><td>".$sql."</td></tr>";
		while ($item = mysql_fetch_assoc($aux)) {
			echo '
				<tr>
					<td>
						'.$item['ingles'].'
					</td>
					<td>
						'.$item['espanol'].'
					</td>
				</tr>'
			;

		}
		echo '</table>';
	}
	?>
</table>
<script type="text/javascript">$(".word").hide()</script>