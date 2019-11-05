<?php
include 'AccesoDatos.php';
	session_start();

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario");
			$consulta->execute();			
			$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);		
			var_dump($datos);
	
?>