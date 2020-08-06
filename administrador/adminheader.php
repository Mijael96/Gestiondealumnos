<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilosadmin.css">

    <title>Administrador</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand"><?php session_start(); echo $_SESSION["nombre"] ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav m-auto">
      <li class="nav-item active">
        <a class="nav-link" href="administrador1.php">Inicio</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Análisis Funcional
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="af1ro.php">1er año</a>
          <a class="dropdown-item" href="af2do.php">2do año</a>
          <a class="dropdown-item" href="af3ro.php">3er año</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Desarrollo de Software
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="ds1ro.php">1er año</a>
          <a class="dropdown-item" href="ds2do.php">2do año</a>
          <a class="dropdown-item" href="ds3ro.php">3er año</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Infraestructura y Tecnología
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="iti1ro.php">1er año</a>
          <a class="dropdown-item" href="iti2do.php">2do año</a>
          <a class="dropdown-item" href="iti3ro.php">3er año</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="examenes.php">Examenes</a>
      </li>
    </ul>
  </div>
  <button type="button" class="btn btn-danger"><a href="cerrarsession.php" style="color: white;">Salir</a></button>
  </div>
</nav>