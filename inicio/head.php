<?php 
session_start();
if(!isset($_SESSION['usuario'])){
  header("location:login.php");
}else{
    if ($_SESSION['usuario']=="ok"){
      $nombreUsuario=$_SESSION["nombreUsuario"];
    }

}

?>
<!doctype html>
<html lang="es">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <?php $url="http://".$_SERVER['HTTP_HOST']."/admin"  ?>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="../admin/inicio.php"><?php echo $nombreUsuario; ?><span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="http://localhost/woncoalt/chocolateria/back-end/admin/login.php">Log out</a>
            <a class="nav-item nav-link" href="http://localhost/woncoalt/chocolateria/boostrap/#about">Ver sitio web</a>

        </div>
    </nav>
        <div class="container">
            <br/>
            <div class="row">