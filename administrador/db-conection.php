<?php
try {
    $baseDeDatos = new PDO('mysql:host=localhost;dbname=urquiza', $usuario, $contraseña);
    echo "Conexion exitosa";
    $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>