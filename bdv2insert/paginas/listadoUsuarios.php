<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>ISTIC Estacionamiento</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/floating-labels.css" rel="stylesheet">

  </head>

  <body>

    <header>
    <?php
        include "../componentes/menu.php";
    ?>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
         
      <h1 class="mt-5">Estacionamiento ISTIC 2019</h1>
      <p class="lead">Bienvenido a Estacionamientos Alumno</p>

  <?php 
      if(isset($_SESSION['usuario'])){
        //solo muestra el menu si estas con la variable de sesión instaciada
  ?>

<form class="form-signin" action="../funciones/hacerborradoUsuario.php">
                              
  <?php
    include '../funciones/AccesoDatos.php';


      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario");
      $consulta->execute();     
      $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);    
      //var_dump($datos);
      foreach ($datos as $usuario ) {
        //var_dump($usuario );
        echo "usuario :".$usuario["nombre"];
        echo "<input type='submit' name='hacer'  value='".$usuario['id']."'>borrar</input><br>";
      }
  
  ?>
                             
</form>                      
            <?php 
              }
              else
              {
            ?>

                       

                            

                              <h2>Usted NO esta logeado</h2>
                              
            <?php 
              }
            ?>

    </main>
      
     <footer class="footer">
    <?php
        include "../componentes/pie.php";
    ?>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" cAlumnorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
