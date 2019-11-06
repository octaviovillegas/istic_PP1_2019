<?php
include 'AccesoDatos.php';

var_dump($_GET);
//die();
$miObjeto = new stdClass();
$id = $_GET['hacer'];




$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$select="DELETE FROM `usuario` WHERE id=$id";
$consulta =$objetoAccesoDato->RetornarConsulta($select);
$consulta->execute();

//INSERT INTO usuario( nombre, clave) VALUES ("natalia","natalia")
/*
$archivo = fopen('usuarios.txt', 'a');
fwrite($archivo, json_encode($miObjeto)."\n");
fclose($archivo);*/
?>