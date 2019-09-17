<?php
$miArchivo = fopen("usuarios.txt", 'r');
while (!feof($miArchivo)) {
	$objeto =json_decode(fgets($miArchivo));
	echo $objeto->nombre;
}
fclose($miArchivo);
?>