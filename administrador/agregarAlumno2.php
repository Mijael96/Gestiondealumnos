<?php

include_once('../db/db-conection.php');


function validar($unArray){
    $arrayErrores=array();

    if($unArray){
       
        if (isset($unArray["apellido"])) {
            if (empty($unArray["apellido"])) {
                $arrayErrores["apellido"]="El campo apellido no puede estar vacio";
            }
           elseif(strlen($unArray["apellido"])<2){
                $arrayErrores["apellido"]="El apellido debe tener como minimo 2 caracteres";
            }
        }

        if (isset($unArray["nombre"])) {
            if (empty($unArray["nombre"])) {
                $arrayErrores["nombre"]="El campo nombre no puede estar vacio";
            }
           elseif(strlen($unArray["nombre"])<2){
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
            if (empty($unArray["email"])) {
                $arrayErrores["email"]="El campo email no puede estar vacio";
            }
            elseif (!filter_var($unArray["email"], FILTER_VALIDATE_EMAIL)) {
                $arrayErrores["email"]="Ingrese un email";
              }
        }
    }
    return $arrayErrores;
}


?>