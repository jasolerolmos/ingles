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
      //$mysqli = new mysqli("192.168.1.55","tyger","canijo","vocabulario");
      ?>
		</div>
	</div>
  <div class="row">
    <div class="col-md-12">
      <?php
      //var_dump($_SERVER);
      
      foreach ($_SERVER as $key => $value) {
            echo "<p>".$key.": ".$value."</p>";
      }
      
      if($_SERVER["SERVER_NAME"]=="www.lechienandalou.com"){
        print "Estamos ONLINE!!!";
        $mysqli = new mysqli("localhost","lechien","reservas2016","lechien");
      }
      else{
        echo "Estamos en casa!!!";
        if($_SERVER['SERVER_ADDR']==$_SERVER["REMOTE_ADDR"]){
          echo "Estamos en el portatil.";
        }
        else{
          echo "El servidor DB es Linux."; 
        }
      }
      ?>
    </div>
  </div>
</div>

</body>
</html>