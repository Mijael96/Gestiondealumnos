<?php

include 'adminheader.php'; 

include_once('../db/db-conection.php');

include_once('agregarAlumno.php');

if(!$_SESSION["nombre"]){
  header('Location: login.php');
}

$consulta=$baseDeDatos->prepare('SELECT * from carrera');
$consulta->execute();
$carreras=$consulta->fetchAll(PDO::FETCH_ASSOC);

$consulta1=$baseDeDatos->prepare('SELECT * from año');
$consulta1->execute();
$años=$consulta1->fetchAll(PDO::FETCH_ASSOC);

$consulta2=$baseDeDatos->prepare('SELECT * from comision');
$consulta2->execute();
$comisiones=$consulta2->fetchAll(PDO::FETCH_ASSOC);



?>



    <div class="container" style="margin-top: 30px;">
      <h3 style="text-align:center;">Agregar Alumno</h3>
      <br>
      <form method="POST" action="agregar.php">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Apellido</label>
      <input type="text" name="apellido" class="form-control" id="inputEmail4" placeholder="Apellido" value="<?php if($_POST && !isset($errores["apellido"])) echo $_POST["apellido"]; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="inputPassword4" placeholder="Nombre" value="<?php if($_POST && !isset($errores["nombre"])) echo $_POST["nombre"]; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Fecha de Nacimiento</label>
      <input type="date" name="date" class="form-control" value="<?php if($_POST && !isset($errores["date"])) echo $_POST["date"]; ?>">
    </div>
  </div>

  <div class="form-row">

    <div class="form-group col-md-4">
    <label for="inputAddress">Carrera</label>
    <select id="inputState" class="form-control" name="carrera">
        <option>Colocar</option>

        <?php foreach ($carreras as $carrera) { ?>
          <option value="<?php echo $carrera["Id"]; ?>"><?php echo $carrera["Nombre"]; ?></option>
        <?php } ?>
        

      </select>
    </div>
    <div class="form-group col-md-4">
    <label for="inputAddress">Año</label>
    <select id="inputState" class="form-control" name="año">
        <option>Colocar</option>

        <?php foreach ($años as $año) { ?>
          <option value="<?php echo $año["Id"]; ?>"><?php echo $año["Año"]; ?></option>
        <?php } ?>
        

      </select>
    </div>
  
    <div class="form-group col-md-4">
    <label for="inputAddress">Comision</label>
    <select id="inputState"  class="form-control" name="comision">
        <option>Colocar</option>

        <?php foreach ($comisiones as $comision) { ?>
          <option value="<?php echo $comision["Id"]; ?>"><?php echo $comision["Comision"]; ?></option>
        <?php } ?>
        

      </select>
    </div>

  </div>

  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">DNI</label>
      <input type="number" name="DNI" placeholder="DNI" class="form-control" id="inputCity"  value="<?php if($_POST && !isset($errores["DNI"])) echo $_POST["DNI"]; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Telefono</label>
      <input type="number" placeholder="Telefono" name="telefono" class="form-control" id="inputCity"  value="<?php if($_POST && !isset($errores["telefono"])) echo $_POST["telefono"]; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Email</label>
      <input type="email" placeholder="Email" name="email" class="form-control" id="inputZip"  value="<?php if($_POST && !isset($errores["email"])) echo $_POST["email"]; ?>">
    </div>
  </div>

  <br>
  
  <button type="submit" class="btn btn-primary" style="margin: 0 auto; display: block;">Agregar</button>
  <br>
</form>

<?php

/*if($_POST){
  if(is_array ( $errores )){
    foreach ($errores as $error) {
      echo $error."<br>";
    }
  }
  else {
    echo "todo bien";
  }
}*/


?>

<?php if($_POST) : ?>
  
  <?php if(is_array ( $errores )) : ?>
    <?php foreach ($errores as $error): ?>
      <p style="color:red; text-align:center;"><?php echo $error; ?></p>
    <?php endforeach; ?>
  <?php endif; ?>

<?php endif; ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>