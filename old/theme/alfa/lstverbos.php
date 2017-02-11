<span class="titulo_seccion"><?php echo $titulo;?></span>

<table border="2" width="90%">
	<?php
	//foreach ($aux AS $verbo){
	for($i=0;$i<77;$i++){
		$verbo = $aux[$i];
		$verbo2 = $aux[$i+77];
		echo '
		<tr>
			<td>
				'.$verbo['infinitivo'].'
			</td>
			<td>
				'.$verbo['pasado'].'
			</td>
			<td>
				'.$verbo['preterito'].'
			</td>
			<td></td>
			<td>
				'.$verbo2['infinitivo'].'
			</td>
			<td>
				'.$verbo2['pasado'].'
			</td>
			<td>
				'.$verbo2['preterito'].'
			</td>
		</tr>';
	};
	?>
</table>