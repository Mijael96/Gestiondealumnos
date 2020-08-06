<?php
$usuario="root";
$contraseña="";
try {
    $baseDeDatos = new PDO('mysql:host=localhost;dbname=urquiza', $usuario, $contraseña, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>