<?php
	session_start();
	include 'AccesoDatos.php';
	$usuarioIngresado = $_GET['inputEmail'];
	$claveIngresada = $_GET['inputPassword'];
	

	$booUsuario = 0;
	$booPassword = 0;

	if (empty($usuarioIngresado) || empty($claveIngresada)) 
	{
		header("Location: ../paginas/login.php?error=camposvacios");
		exit();
	}
	else
	{
		// antes con archivos => // $archivo = fopen("../archivos/usuarios.txt", "r") or die("Imposible arbrir el archivo");

			/* voy a buscar a la base de datos y traigo un arra asociativo */

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario");
			$consulta->execute();			
			$ArrayAsociaticoConDatos= $consulta->fetchAll(PDO::FETCH_ASSOC);		
	//var_dump($ArrayAsociaticoConDatos);die();

			/*volvi de la base de datos*/
		
		// antes con archivos => //while(!feof($archivo)) 

		foreach ($ArrayAsociaticoConDatos as $usuario) 
		{
			// antes con archivos => //$objeto = json_decode(fgets($archivo));
			if ( $usuario["nombre"] == $usuarioIngresado) 
			{	
				$booUsuario = 1;
				if ($usuario["clave"] == $claveIngresada)
				{
					//fclose($archivo);
					$_SESSION['usuario']=$usuario["nombre"] ;
					$_SESSION['perfil']=$usuario["perfil"] ;
					setcookie("usuario", $_SESSION['usuario']);
					header("Location: ../paginas/login.php?exito=signup");
					exit();
				}			
			}
		 	
		}	
		if ($booUsuario == 0) {
			header("Location: ../paginas/login.php?error=usuarioincorrecto");
			fclose($archivo);
			exit();
		}
		else 
	    {
			header("Location: ../paginas/login.php?error=contraseñaincorrecta");
			fclose($archivo);
			exit();
		}

		fclose($archivo);
	}	
	header("Location: ../paginas/login.php");
	exit();
?>