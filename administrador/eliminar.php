<?php

include 'adminheader.php'; 

include_once('../db/db-conection.php');

if(!$_SESSION["nombre"]){
  header('Location: login.php');
}

$variable=$_GET["ide"];

$consulta6=$baseDeDatos->prepare("SELECT * FROM alumnos WHERE Id = '$ide';");
  $consulta6->execute();
  $alumnos1=$consulta6->fetchAll(PDO::FETCH_ASSOC);

$eliminar=$baseDeDatos->prepare("DELETE FROM alumnos WHERE Id='$variable';");

$eliminar->execute();

header('Location: administrador1.php');

?>