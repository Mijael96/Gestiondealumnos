<?php
      
      $ide=$_GET["ide"];

      include 'adminheader.php'; 
    
      if(!$_SESSION["nombre"]){
        header('Location: login.php');
      }
    
      include_once('../db/db-conection.php');
    
      $consulta6=$baseDeDatos->prepare("SELECT * FROM alumnos WHERE Id = '$ide';");
      $consulta6->execute();
      $alumnos1=$consulta6->fetchAll(PDO::FETCH_ASSOC);

      $consulta7=$baseDeDatos->prepare("SELECT * FROM notas WHERE Id_alumno = '$ide';");
      $consulta7->execute();
      $notas=$consulta7->fetchAll(PDO::FETCH_ASSOC);

      $consulta=$baseDeDatos->prepare("SELECT alumnos.Nombre, carrera.Nombre, año.Año, comision.Comision from ((alumnos
      INNER JOIN carrera ON alumnos.Id_carrera = carrera.Id)
      INNER JOIN año ON alumnos.Id_anio = año.Id)
      INNER JOIN comision ON alumnos.Id_Comision = comision.Id;");
      $consulta->execute();
      $a=$consulta->fetchAll(PDO::FETCH_ASSOC);
    
      $carreraid=$alumnos1[0]["Id_carrera"];
      $consulta2=$baseDeDatos->prepare("SELECT * from materias
      where carrera_id = $carreraid ;");
      $consulta2->execute();
      $materias=$consulta2->fetchAll(PDO::FETCH_ASSOC);

     if($_POST){
         foreach ($_POST as $key => $value) {
             if(!is_nan( $value )){
                 if($value <= 10 || $value <= 1){
                     $agregar=$baseDeDatos->prepare("INSERT INTO notas(Id_alumno, id_materia, Nota) VALUES (:alumno, :materia, :nota)");
                     $agregar->bindValue(":alumno", $ide);
                     $agregar->bindValue(":materia", $key);
                     $agregar->bindValue(":nota", $value);
                     $agregar->execute();
                     $exito="Nota Guardada";
                 }
                 else {
                    $errorAgregar="La nota debe ser del 1 al 10";
                }
             }
            
         }
     }


    
      ?>
    
      <br>
      <br>
          <div class="container">
          <br>
          <?php if(isset($exito)): ?>
                <div class="alert alert-success" role="alert" style="text-align:center;">
                        <?php echo $exito; ?>
                </div>
          <?php endif; ?>

          <?php if(isset($errorAgregar)): ?>
                <div class="alert alert-danger" role="alert" style="text-align:center;">
                        <?php echo $errorAgregar; ?>
                </div>
          <?php endif; ?>
          <br>
          <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Materia</th>
                        <th scope="col">Nota</th>
                        <th scope="col">Colocar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($materias as $materia) : ?>
                        <tr>
                        <th scope="row"><?php echo $materia["Materia"]; ?></th>
                        <td> <form method="POST" action="colocarnotas.php?ide=<?php echo $alumnos1[0]["Id"];?>"> <input type="number" name="<?php echo $materia["Id"]; ?>" style="display:block; margin: 0 auto;"></td>
                        <td> <input type="submit" style="display:block; margin: 0 auto;"></form></td>
                        </tr>
                    <?php endforeach; ?>
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
    