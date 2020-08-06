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
      INNER JOIN comision ON alumnos.Id_Comision = comision.Id WHERE alumnos.Id = '$ide';");
      $consulta->execute();
      $a=$consulta->fetchAll(PDO::FETCH_ASSOC);
  
    
      $carreraid=$alumnos1[0]["Id_carrera"];
      $consulta2=$baseDeDatos->prepare("SELECT materias.Materia from materias
      where carrera_id = $carreraid ;");
      $consulta2->execute();
      $materias=$consulta2->fetchAll(PDO::FETCH_ASSOC);
    
      ?>
    
    
          <div class="container">
            <div class="perfil">
                <br>
              <h3 style="text-align: center;"><?php echo $alumnos1[0]["Apellido"] . " ". $alumnos1[0]["Nombre"]; ?></h3>
              <br>
              <br>
              <div class="container">
                <div class="row">
                  <div class="col-sm" style="text-align: center;">
                    Carrera:
                  </div>
                  <div class="col-sm" style="text-align: center;">
                  <?php echo $a[0]["Nombre"]; ?>
                  </div>
                </div>
              </div>
    
              <br>
    
              <div class="container">
                <div class="row">
                  <div class="col-sm" style="text-align: center;">
                    Año:
                  </div>
                  <div class="col-sm" style="text-align: center;">
                  <?php echo $a[0]["Año"]; ?>
                  </div>
                </div>
              </div>
    
              <br>
    
              <div class="container">
                <div class="row">
                  <div class="col-sm" style="text-align: center;">
                    Comision:
                  </div>
                  <div class="col-sm" style="text-align: center;">
                  <?php echo $a[0]["Comision"]; ?>
                  </div>
                </div>
              </div>
    
              <br>
    
              <div class="container">
                <div class="row">
                  <div class="col-sm" style="text-align: center;">
                    DNI:
                  </div>
                  <div class="col-sm" style="text-align: center;">
                  <?php echo $alumnos1[0]["DNI"]; ?>
                  </div>
                </div>
              </div>
    
    
              <br>
    
              <div class="container">
                <div class="row">
                  <div class="col-sm" style="text-align: center;">
                    Fecha de nacimiento:
                  </div>
                  <div class="col-sm" style="text-align: center;">
                  <?php echo $alumnos1[0]["Fecha_de_nacimiento"]; ?>
                  </div>
                </div>
              </div>
    
    
              <br>
    
              <div class="container">
                <div class="row">
                  <div class="col-sm" style="text-align: center;">
                    Mail:
                  </div>
                  <div class="col-sm" style="text-align: center;">
                  <?php echo $alumnos1[0]["email"]; ?>
                  </div>
                </div>
              </div>
    
              <br>
    
              <div class="container">
                <div class="row">
                  <div class="col-sm" style="text-align: center;">
                    Telefono:
                  </div>
                  <div class="col-sm" style="text-align: center;">
                  <?php echo $alumnos1[0]["Telefono"]; ?>
                  </div>
                </div>
              </div>
            </div>
    
            <br>
            <br>
    
            <div class="container d-flex justify-content-around">
                <div class="row ">
                  <div class="col-sm" style="text-align: center;">
                    <button type="button" class="btn btn-warning"><a href="modificar.php?ide=<?php echo $alumnos1[0]["Id"];?>" style="color:black;">Modificar</a></button>
                  </div>
                  <div class="col-sm" style="text-align: center;">
                    <button type="button" class="btn btn-danger"><a href="eliminar.php?ide=<?php echo $alumnos1[0]["Id"];?>" style="color:white;">Eliminar</a></button>
                  </div>
                </div>
              </div>
    
            
            <br>
    
            <br>

            <br>
                
            
            <button type="button" class="btn btn-primary btn-lg btn-block"><a href="colocarnotas.php?ide=<?php echo $alumnos1[0]["Id"];?>" style="color:white;">Agregar Notas</a></button>
            <button type="button" class="btn btn-secondary btn-lg btn-block"><a href="vernotas.php?ide=<?php echo $alumnos1[0]["Id"];?>" style="color:white;">Ver Notas</a></button>
          
    
    
      <br>
    

          </div>
    
          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        </body>
      </html>
    