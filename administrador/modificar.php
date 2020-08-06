<?php

include 'adminheader.php'; 

include_once('../db/db-conection.php');

include_once('validar.php');

$variable=$_GET["ide"];

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

$consulta=$baseDeDatos->prepare("SELECT alumnos.Nombre, carrera.Nombre, año.Año, comision.Comision from ((alumnos
INNER JOIN carrera ON alumnos.Id_carrera = carrera.Id)
INNER JOIN año ON alumnos.Id_anio = año.Id)
INNER JOIN comision ON alumnos.Id_Comision = comision.Id;");
$consulta->execute();
$a=$consulta->fetchAll(PDO::FETCH_ASSOC);


$consulta6=$baseDeDatos->prepare("SELECT * FROM alumnos WHERE Id = '$variable';");
$consulta6->execute();
$alumnos1=$consulta6->fetchAll(PDO::FETCH_ASSOC);



if($_POST){
  $validacion=validar($_POST);
  var_dump($_POST);
  if($validacion==""){
      $apellido=ucfirst ( $_POST["apellido"] );         
      $nombre=ucfirst ( $_POST["nombre"] );
      $dni=$_POST["DNI"];
      $tel=$_POST["telefono"];
      $eMail=strtolower ($_POST["email"]);         
      $iD_Carrera=$_POST["carrera"]; 
      $iD_Anio=$_POST["año"];
      $iD_Comision=$_POST["comision"];
      $modificacion=$baseDeDatos->prepare("UPDATE alumnos SET Apellido='$apellido', Nombre='$nombre', DNI='$dni', Telefono='$tel', email='$eMail', Id_carrera='$iD_Carrera', 	Id_anio='$iD_Anio', Id_Comision='$iD_Comision' WHERE Id = '$variable';");
      $modificacion->execute();
      header('Location: administrador1.php');
  }
}

?>

    <div class="container" style="margin-top: 30px;">
      <h3 style="text-align:center;">Modificar</h3>
      <br>
      <form method="POST" action="modificar.php?ide=<?php echo $alumnos1[0]["Id"];?>">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Apellido</label>
      <input type="text" name="apellido" class="form-control" id="inputEmail4" placeholder="Apellido" value="<?php echo $alumnos1[0]["Apellido"]; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="inputPassword4" placeholder="Nombre" value="<?php echo $alumnos1[0]["Nombre"]; ?>">
    </div>
  
  </div>

  <div class="form-row">

    <div class="form-group col-md-4">
    <label for="inputAddress">Carrera</label>
    <select id="inputState" class="form-control" name="carrera">
        <option value="<?php echo $alumnos1[0]["Id_carrera"]; ?>"><?php echo $a[0]["Nombre"]; ?></option>

        <?php foreach ($carreras as $carrera) { ?>
          <?php if($carrera["Nombre"]!=$a[0]["Nombre"]){ ?>
          <option value="<?php echo $carrera["Id"]; ?>"><?php echo $carrera["Nombre"]; ?></option>
          <?php } ?>
        <?php } ?>
        

      </select>
    </div>
    <div class="form-group col-md-4">
    <label for="inputAddress">Año</label>
    <select id="inputState" class="form-control" name="año">
    <option value="<?php echo $alumnos1[0]["Id_anio"]; ?>"><?php echo $a[0]["Año"]; ?></option>

        <?php foreach ($años as $año) { ?>
          <?php if($año["Año"]!=$a[0]["Año"]){ ?>
          <option value="<?php echo $año["Id"]; ?>"><?php echo $año["Año"]; ?></option>
          <?php } ?>
        <?php } ?>
        

      </select>
    </div>
  
    <div class="form-group col-md-4">
    <label for="inputAddress">Comision</label>
    <select id="inputState"  class="form-control" name="comision">
    <option value="<?php echo $alumnos1[0]["Id_Comision"]; ?>"><?php echo $a[0]["Comision"]; ?></option>

        <?php foreach ($comisiones as $comision) { ?>
          <?php if($comision["Comision"]!=$a[0]["Comision"]){ ?>
          <option value="<?php echo $comision["Id"]; ?>"><?php echo $comision["Comision"]; ?></option>
          <?php } ?>
        <?php } ?>
        

      </select>
    </div>

  </div>

  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">DNI</label>
      <input type="number" name="DNI" class="form-control" id="inputCity"  value="<?php echo $alumnos1[0]["DNI"]; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Telefono</label>
      <input type="number" name="telefono" class="form-control" id="inputCity"   value="<?php echo $alumnos1[0]["Telefono"]; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Email</label>
      <input type="email" name="email" class="form-control" id="inputZip"  value="<?php echo $alumnos1[0]["email"]; ?>">
    </div>
  </div>

  <br>
  
  <button type="submit" class="btn btn-primary" style="margin: 0 auto; display: block;">Modificar</button>
  <br>
</form>



    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>