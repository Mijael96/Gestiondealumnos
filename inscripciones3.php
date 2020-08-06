<?php

include 'header.php';

include_once('db/db-conection.php');

if($_POST){
    $apellido= ucfirst( $_POST["Apellido"] );
    $nombre= ucfirst( $_POST["Nombre"] );
    $dni= $_POST["DNI"];
    $email=$_POST["email"];
    $consulta=$baseDeDatos->prepare("SELECT * FROM alumnos where Apellido = '$apellido' and Nombre='$nombre' and DNI='$dni'");
    $consulta->execute();
    $carreras=$consulta->fetchAll(PDO::FETCH_ASSOC);

   if(!empty($carreras)){
       /*$consulta2=$baseDeDatos->prepare("INSERT INTO inscripciones_mesas(id_alumno, materia) value()")*/
       $id=$carreras[0]["Id"];
       $arrayMaterias=[];
       foreach ($_POST as $key => $value) {
           if($key!="Apellido" && $key!="Nombre" && $key!="DNI" && $key!="email"){
               array_push($arrayMaterias, $value);
               
        }
       }
       foreach($arrayMaterias as $valor){
        $insertar=$baseDeDatos->prepare("INSERT INTO inscripciones_mesas (id_alumno, materia) values('$id', '$valor')");
        $insertar->execute();
        $exito="Te inscribiste exitosamente";
    }
   }

   else {
       $error="No estas registrado en nuestra base de datos";
   }

  


}

?>
<?php if(isset($error)): ?>
<div class="alert alert-danger" role="alert">
  <?php echo $error; ?>
</div>
<?php endif; ?>

<?php if(isset($exito)): ?>
<div class="alert alert-success" role="alert">
  <?php echo $exito; ?>
</div>
<?php endif; ?>

<br>
<br>
<br>
<br>

