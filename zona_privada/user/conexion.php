<?php
try{
    $conexion = new PDO('mysql:host=localhost; dbname=u963748284_zylu', 'u963748284_zylu', 'Admingenius$$09');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");
}catch(Exception $e){
    die("Error" . $e->getMessage());
    echo "Línea del error" . $e->getLine();
}
?>