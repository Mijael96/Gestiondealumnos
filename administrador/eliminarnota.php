<?php

include 'adminheader.php'; 

include_once('../db/db-conection.php');

if(!$_SESSION["nombre"]){
  header('Location: login.php');
}

$variable=$_GET["ide"];

$consulta6=$baseDeDatos->prepare("SELECT * FROM notas WHERE ide = '$ide';");
  $consulta6->execute();
  $alumnos1=$consulta6->fetchAll(PDO::FETCH_ASSOC);

$eliminar=$baseDeDatos->prepare("DELETE FROM notas WHERE ide='$variable';");

$eliminar->execute();

header('Location: administrador1.php');

?>