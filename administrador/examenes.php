<?php

include 'adminheader.php'; 

include_once('../db/db-conection.php');

$consulta=$baseDeDatos->prepare("SELECT materias.Materia, alumnos.Apellido, alumnos.Nombre
FROM ((inscripciones_mesas
INNER JOIN materias ON inscripciones_mesas.materia = materias.Id)
INNER JOIN alumnos ON inscripciones_mesas.id_alumno = alumnos.Id)ORDER BY materias.Id, alumnos.Apellido ASC;");
$consulta->execute();
$carreras=$consulta->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container">
        <br>
      <br>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Materia</th>
      <th scope="col">Apellido</th>
      <th scope="col">Nombre</th>

    </tr>
  </thead>
  <tbody>

  <?php foreach ($carreras as $carrera): ?>
    <tr>
      <th scope="row"><?php echo $carrera["Materia"];?></th>
      <td><?php echo $carrera["Apellido"];?></td>
      <td><?php echo $carrera["Nombre"];?></td>
   
    </tr>
  <?php endforeach; ?>
  
  </tbody>
</table>

