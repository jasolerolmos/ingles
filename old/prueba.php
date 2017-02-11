<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo de Bootstrap 3</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.js"></script>
</head>
<body>

<div class="container show-top-margin separate-rows tall-rows">
	<div class="row">
		<div class="col-md-12" align="center">
			<span style="font-size: 32px; color: black">Inglés a tu medida</span>
      <?php
      $mysqli = new mysqli("192.168.1.56","tyger","canijo","vocabulario");
      ?>
		</div>
	</div>
  <div class="row">
    <div class="col-md-12">
      <?php
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
      echo $sql = "select * from categorias ORDER BY nombre ASC";
      ?>
      
      <?php

        if(isset($_GET['cat'])){
          $categoria = $_GET['cat'];
        }
        else{
          $categoria = rand(1,32);
        }
        
        $cat = $mysqli->query($sql);
        var_dump($cat);
        echo '<select id="listaCategorias" onchange="verCategoria();nuevoExamen()">';
        while ($item = $cat->fetch_array()) {
          var_dump($item);
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
      echo $sql = "select * from categorias ";
      $aux = $mysqli->query($sql);
      var_dump($aux);
      $numero = 0;
      while ($item = $aux->fetch_array()) {
        var_dump($item);
      }
      ?>
    </div>
  </div>
</div>

</body>
</html>