<?php

include("../../inc/conf.php");
//$mysqli = new mysqli("localhost","lechien","reservas2016","lechien");

if(isset($_POST['cat'])){

	if(isset($_POST['cat'])){
		$categoria = $_POST['cat'];
	}
	else{
		$categoria = rand(1,32);
	}

	$sql = "select * from ingles_palabras WHERE id_cat=".$categoria." ORDER BY ingles ASC";
	$aux = $mysqli->query($sql);
	echo '<table class="c'.$c['id'].' word"  style="text-align: left">';
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
	echo '</table>';
}

if(isset($_POST['letras'])){

			$sql = "select * from ingles_verbos ORDER BY infinitivo ASC";
			$aux = $mysqli->query($sql);
			echo '<div id="tablaPalabras" style="padding-left: 30px"><table style="text-align: left">';

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
							'.utf8_encode($examen[$palabra]['traduccion']).'
						</td>
						<td style="width: 300px">
							'.utf8_encode($examen[$palabra]['infinitivo']).'
						</td>
						<td style="width: 300px">
							'.utf8_encode($examen[$palabra]['pasado']).'
						</td>
						<td style="width: 300px">
							'.utf8_encode($examen[$palabra]['preterito']).'
						</td>
						<td style="width: 100px">
							<input type="text" ingles="'.$examen[$palabra]['ingles'].'" id="'.$examen[$palabra]['id'].'"" class="respuesta"/>
						</td>
						<td style="width: 40px">
							<img src="img/ok.png" id="'.$examen[$palabra]['id'].'ok" style="display: none"/>
							<img src="img/ko.png" id="'.$examen[$palabra]['id'].'ko" style="display: none"/>
						</td>
						<td>
							<span class="soluciones" style="display: none">'.$examen[$palabra]['traduccion'].'</span>
						</td>
					</tr>'
				;
			}
			echo '</table></div>';
	}
?>