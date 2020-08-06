<?php

include_once('../db/db-conection.php');

if($_POST){

function validar($unArray){
    $arrayErrores=array();

    if($unArray){
       
        if (isset($unArray["apellido"])) {
            $apellido=trim($unArray["apellido"]);
            if (empty($apellido)) {
                $arrayErrores["apellido"]="El campo apellido no puede estar vacio";
            }
           elseif(strlen($apellido)<2){
                $arrayErrores["apellido"]="El apellido debe tener como minimo 2 caracteres";
            }
        }

        if (isset($unArray["nombre"])) {
            $nombre=trim($unArray["nombre"]);
            if (empty($nombre)) {
                $arrayErrores["nombre"]="El campo nombre no puede estar vacio";
            }
           elseif(strlen($nombre)<2){
                $arrayErrores["nombre"]="El nombre debe tener como minimo 2 caracteres";
            }
        }

        if (isset($unArray["DNI"])) {
            $dni=strval( $unArray["DNI"] );
            if (empty($unArray["DNI"])) {
                $arrayErrores["DNI"]="El campo DNI no puede estar vacio";
            }
            elseif (is_nan($unArray["DNI"])) {
                $arrayErrores["DNI"]="El campo DNI debe ser numerico";
            }
            elseif (strlen ( $dni ) < 7 || strlen ( $dni ) > 8 ) {
                $arrayErrores["DNI"]="El campo DNI debe tener un minimo de 7 cifras y un maximo de 8";
            }
        }

        if (isset($unArray["año"])) {
            if($unArray["año"]=="Colocar"){
                $arrayErrores["año"]="El campo año no puede estar vacio";
            }
        }

        if (isset($unArray["carrera"])) {
            if($unArray["carrera"]=="Colocar"){
                $arrayErrores["carrera"]="El campo carrera no puede estar vacio";
            }
        }

        if (isset($unArray["comision"])) {
            if($unArray["comision"]=="Colocar"){
                $arrayErrores["comision"]="El campo comision no puede estar vacio";
            }
        }

        if (isset($unArray["date"])){
            if(empty($unArray["date"])){
                $arrayErrores["date"]="El campo fecha de nacimiento no puede estar vacio";
            }
        }

        if (isset($unArray["telefono"])){
            $telefono=strval( $unArray["telefono"] );
            if(empty($unArray["telefono"])){
                $arrayErrores["telefono"]="El campo telefono no puede estar vacio";
            }
            elseif (is_nan($unArray["telefono"])) {
                $arrayErrores["telefono"]="El campo telefono debe ser numerico";
            }
            elseif (strlen ( $telefono ) < 11 || strlen ( $dni ) > 14 ) {
                $arrayErrores["telefono"]="El campo telefono debe tener un minimo de 11 numeros y un maximo de 14";
            }
        }

        if (isset($unArray["email"])) {
            $email=$apellido=trim($unArray["email"]);
            if (empty($email)) {
                $arrayErrores["email"]="El campo email no puede estar vacio";
            }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $arrayErrores["email"]="Ingrese un email";
              }
        }
    }
    if (empty($arrayErrores)) {
        return "";
    }

    else {
        return $arrayErrores;
    }
}

$errores=validar($_POST);


if ($errores=="") {
    $apellido=$_POST["apellido"];
    $nombre=$_POST["nombre"];
    $carrera=$_POST["carrera"];
    $año=$_POST["año"];
    $comision=$_POST["comision"];
    $fDN=$_POST["date"];
    $dni=$_POST["DNI"];
    $telefono=$_POST["telefono"];
    $email=$_POST["email"];


    $consulta=$baseDeDatos->prepare("INSERT INTO alumnos(Apellido, Nombre, DNI, Fecha_De_nacimiento, Telefono, email, Id_carrera, Id_anio, Id_Comision) VALUES (:apellido,  :nombre, :DNI, :fnac, :telefono, :email, :carrera, :anio, :comision)");


    $consulta->bindValue(":apellido", ucfirst(strtolower($apellido)));
    $consulta->bindValue(":nombre", ucfirst(strtolower($nombre)));
    $consulta->bindValue(":DNI", $dni);
    $consulta->bindValue(":fnac", $fDN);
    $consulta->bindValue(":telefono", $telefono);
    $consulta->bindValue(":email", strtolower ( $email ));
    $consulta->bindValue(":carrera", $carrera);
    $consulta->bindValue(":anio", $año);
    $consulta->bindValue(":comision", $comision);
    
    $consulta->execute();

    header('Location: agregar.php');

}

}

