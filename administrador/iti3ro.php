<?php

include 'adminheader.php'; 

include_once('../db/db-conection.php');

if(!$_SESSION["nombre"]){
  header('Location: login.php');
}

$consulta=$baseDeDatos->prepare('SELECT * from alumnos where Id_carrera="3" and 	Id_anio="3"');
$consulta->execute();
$alumnos=$consulta->fetchAll(PDO::FETCH_ASSOC);




$consulta1=$baseDeDatos->prepare('SELECT * from alumnos where Id_carrera="3" and 	Id_anio="3" and Id_Comision="2" ORDER BY Apellido ASC');
$primeroSegunda= $consulta1->execute();
$primeroSegunda=$consulta1->fetchAll(PDO::FETCH_ASSOC);

$consulta2=$baseDeDatos->prepare('SELECT * from alumnos where Id_carrera="3" and 	Id_anio="3" and Id_Comision="3" ORDER BY Apellido ASC');
$primeroTercera= $consulta2->execute();
$primeroTercera=$consulta2->fetchAll(PDO::FETCH_ASSOC);



?>


    <div class="container">
        <br>
      <h3 style="text-align: center;">3ro 1ra</h3>
      <br>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Apellido</th>
      <th scope="col">Nombre</th>
      <th scope="col">DNI</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Id</th>
    </tr>
  </thead>
  <tbody>

  <?php $consulta1=$baseDeDatos->prepare('SELECT * from alumnos where Id_carrera="3" and 	Id_anio="3" and Id_Comision="1" ORDER BY Apellido ASC');
        $consulta1->execute();
        $alumnos1=$consulta1->fetchAll(PDO::FETCH_ASSOC); $contador=1; 
    foreach ($alumnos1 as $alumno): ?>
    <tr>
      <th scope="row"><?= $contador++; ?></th>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $alumno["Id"];?>"><?= $alumno["Apellido"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $alumno["Id"];?>"><?= $alumno["Nombre"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $alumno["Id"];?>"><?= $alumno["DNI"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $alumno["Id"];?>"><?= $alumno["email"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $alumno["Id"];?>"><?= $alumno["Telefono"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $alumno["Id"];?>"><?= $alumno["Id"]?></a></td>
    </tr>
  <?php endforeach; ?>
  
  </tbody>
</table>
<br>


<br>
<?php if (!empty($primeroSegunda)): ?>
      <h3 style="text-align: center;">3ro 2da</h3>
      <br>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Apellido</th>
      <th scope="col">Nombre</th>
      <th scope="col">DNI</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Id</th>
    </tr>
  </thead>
  <tbody>

  <?php endif; ?>

  <?php $contador=1; foreach ($primeroSegunda as $value): ?>
    <?php if ($value["Id_carrera"]=="3" && $value["Id_anio"]=="3" && $value["Id_Comision"]=="2" ): ?>

      <tr>
      <th scope="row"><?= $contador++; ?></th>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Apellido"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Nombre"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["DNI"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["email"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Telefono"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Id"]?></a></td>
    </tr>
            
    <?php endif; ?>

  <?php endforeach; ?>

  </tbody>
</table>

  


  <br>
<?php if (!empty($primeroTercera)): ?>
      <h3 style="text-align: center;">3ro 3ra</h3>
      <br>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Apellido</th>
      <th scope="col">Nombre</th>
      <th scope="col">DNI</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Id</th>
    </tr>
  </thead>
  <tbody>

  <?php $contador=1; foreach ($primeroTercera as $value): ?>
    <?php if ($value["Id_carrera"]=="3" && $value["Id_anio"]=="3" && $value["Id_Comision"]=="3" ): ?>

    <tr>
      <th scope="row"><?= $contador++; ?></th>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Apellido"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Nombre"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["DNI"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["email"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Telefono"]?></a></td>
      <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Id"]?></a></td>
    </tr>
            
    <?php endif; ?>

  <?php endforeach; ?>

  <?php endif; ?>
  </tbody>
</table>




    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>