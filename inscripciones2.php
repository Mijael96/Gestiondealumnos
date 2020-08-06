<?php

include 'header.php';

include_once('db/db-conection.php');

$id=$_POST["carrera"];

$consulta=$baseDeDatos->prepare("SELECT * FROM materias where carrera_id = '$id'");
$consulta->execute();
$carreras=$consulta->fetchAll(PDO::FETCH_ASSOC);

if($_GET){
    var_dump($_GET);
}

?>

<br>
<h4 style="text-align: center;">MESAS DE EXAMEN</h4>
<br>
<br>
<form method="POST" action="inscripciones3.php" style="">
<div class="form-row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Apellido" name="Apellido">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Nombre" name="Nombre">
    </div>
  </div>

<br>

  <div class="form-row">
    <div class="col">
      <input type="number" class="form-control" placeholder="DNI" name="DNI">
    </div>
    <div class="col">
      <input type="email" class="form-control" placeholder="mail" name="email">
    </div>
  </div>
  
  <br>
<br>

<?php foreach($carreras as $carrera) : ?>
    <div class="form-check form-check-inline" style="    display: block;margin: 0 auto; text-align: center;">
    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $carrera["Id"]; ?>" name="<?php echo $carrera["Materia"]; ?>">
    <label class="form-check-label" for="inlineCheckbox1">
    <?php echo $carrera["Materia"]; ?>
  </label>
</div>
<br>
<?php endforeach; ?>
<br>

  <button class="btn btn-primary" type="submit" style="text-align:center; display:block; margin: 0 auto;">Continuar</button>
</form>

<?php
include 'footer.php';

?>