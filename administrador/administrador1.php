<?php

include 'adminheader.php'; 

include_once('../db/db-conection.php');

if(!$_SESSION["nombre"]){
  header('Location: login.php');
}

$del = $baseDeDatos->prepare('SELECT * FROM alumnos');
$del->execute();
$cuenta = $del->rowCount();

$del1 = $baseDeDatos->prepare('SELECT * FROM alumnos where Id_carrera= 1');
$del1->execute();
$cuenta1 = $del1->rowCount();

$del2 = $baseDeDatos->prepare('SELECT * FROM alumnos where Id_carrera= 2');
$del2->execute();
$cuenta2 = $del2->rowCount();

$del3 = $baseDeDatos->prepare('SELECT * FROM alumnos where Id_carrera= 3');
$del3->execute();
$cuenta3 = $del3->rowCount();


if($_POST){
  $apellido=ucfirst ($_POST["apellido"]); 
  $dni=$_POST["dni"];
  $consulta=$baseDeDatos->prepare("SELECT * FROM alumnos WHERE Apellido='$apellido' or DNI='$dni'");
  $consulta->execute();
  $alumnos=$consulta->fetchAll(PDO::FETCH_ASSOC);
  if(empty($alumnos)){
    $error="No se encontro ningun alumno";
  }
}

?>

      <div class="container">
          <hr style="margin-top: 35px;">
          <h3 style="text-align: center;">Buscar alumno</h3>
          <form method="POST" action="administrador1.php">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Apellido</label>
                  <input type="text" name="apellido" class="form-control" id="inputEmail4" placeholder="Apellido">
                </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">DNI</label>
                <input type="number" name="dni" placeholder="40000000" class="form-control" id="inputPassword4">
              </div>
              <input type="submit" class="btn btn-primary" value="Buscar" style="margin:0 auto;">
            </div>
          </form>
          <hr>
         
              <?php if (!empty($alumnos)): ?>
                <br>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($alumnos as $value): ?>
                      <tr>
                        <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Apellido"]?></a></td>
                        <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Nombre"]?></a></td>
                        <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["DNI"]?></a></td>
                        <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["email"]?></a></td>
                        <td><a class="enlaces-tablas" href="perfilalumno.php?ide=<?php echo $value["Id"];?>"><?= $value["Telefono"]?></a></td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                  <br>
              <?php endif; ?>

              <?php if (isset ( $error )): ?>
                <br>
                <p style="text-align:center; color:red;"><?php echo $error; ?></p>
                <br>
              <?php endif; ?>
              
          <br>
          <button type="button" class="btn btn-primary btn-lg btn-block" style="margin-top: 100px;"><a href="agregar.php" style="color:white;">Agregar Alumno</a></button>
          <br>
          <br>
          <h5 style="text-align:center;"><?php echo $cuenta; ?> Alumnos en total</h5>
          <br>
          <h6 style="text-align:center;"><?php echo $cuenta1; ?> Alumnos en AF</h6>
          <br>
          <h6 style="text-align:center;"><?php echo $cuenta2; ?> Alumnos en DS</h6>
          <br>
          <h6 style="text-align:center;"><?php echo $cuenta3; ?> Alumnos en ITI</h6>
        
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>