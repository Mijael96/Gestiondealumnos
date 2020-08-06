<?php
include 'header.php';


include_once('db/db-conection.php');

$consulta=$baseDeDatos->prepare("SELECT * FROM carrera");
$consulta->execute();
$carreras=$consulta->fetchAll(PDO::FETCH_ASSOC);

?>
<br>
<h4 style="text-align: center;">MESAS DE EXAMEN</h4>
<br>
<br>
<form method="POST" action="inscripciones2.php" style="height:450px;">
    <span style="text-align:center; display:block; font-size: 25px;">Ingresa tu Carrera</span><br><br>
   
    <select id="inputState" class="form-control" name="carrera">

        <?php foreach ($carreras as $carrera) { ?>
          <option value="<?php echo $carrera["Id"]; ?>"><?php echo $carrera["Nombre"]; ?></option>
        <?php } ?>
        

      </select><br><br><br>

  <button class="btn btn-primary" type="submit" style="text-align:center; display:block; margin: 0 auto;">Continuar</button>
</form>

<?php
include 'footer.php';

?>