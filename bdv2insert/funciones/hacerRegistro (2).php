<?php
include 'AccesoDatos.php';

$miObjeto = new stdClass();
$miObjeto->nombre = $_GET['nombre'];
$miObjeto->apellido = $_GET['apellido'];



$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$select="INSERT INTO usuario( nombre, clave) VALUES ($miObjeto->nombre,$miObjeto->apellido)";
$consulta =$objetoAccesoDato->RetornarConsulta($select);
$consulta->execute();

//INSERT INTO usuario( nombre, clave) VALUES ("natalia","natalia")
/*
$archivo = fopen('usuarios.txt', 'a');
fwrite($archivo, json_encode($miObjeto)."\n");
fclose($archivo);*/
?>