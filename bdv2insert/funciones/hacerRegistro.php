<?php
include 'AccesoDatos.php';

$miObjeto = new stdClass();
$miObjeto->nombre = $_GET['inputUsuario'];
$miObjeto->apellido = $_GET['inputPassword'];



$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$select="INSERT INTO usuario( nombre, clave) VALUES ('lalala','1234')";
$consulta =$objetoAccesoDato->RetornarConsulta($select);
$consulta->execute();

//INSERT INTO usuario( nombre, clave) VALUES ("natalia","natalia")
/*
$archivo = fopen('usuarios.txt', 'a');
fwrite($archivo, json_encode($miObjeto)."\n");
fclose($archivo);*/
?>