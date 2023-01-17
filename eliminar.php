<?php

$productoId = $_GET['id'];

try { 

    $con = new mysqli('localhost', 'abel', 'abel', 'daw_m7');
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    } 
    $consulta = $con->prepare("DELETE FROM productos WHERE producto_id = ?");
    $consulta->bind_param("i", $productoId);
    $consulta->execute();

    header("Location: ./llistat.php");
    quit();

} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

?>