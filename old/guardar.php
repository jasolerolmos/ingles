<?php
include("inc/conf.php");
include("inc/func.php");

$palabras= str_replace("\t", "", $_POST['texto']);
$palabras = explode("\r\n", $palabras);
foreach ($palabras as $key => $value) {
	$palabras[$key] = trim($value);
	if(empty($palabras[$key]))
		unset($palabras[$key]);
}
foreach ($palabras as $key => $value) {
	$lista[] = $value;
}
?>
<form action="#" method="post">
	<input type="text" name="cat" value="<?=$_POST["cat"]?>"/>
<textarea name="texto" rows="50" cols="150"><?php
for ($i=0; $i < count($lista); $i=$i+2) { 
	$sql = "INSERT INTO ingles_palabras (ingles,espanol,id_cat) VALUES ('".$lista[$i+1]."','".$lista[$i]."',".$_POST["cat"].")";
	mysql_query($sql);
}
#var_dump($palabras)
	?></textarea>
<input type="submit" value="Analizar"/>
</form>