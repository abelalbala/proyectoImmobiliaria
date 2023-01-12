<?php
require "functions.php";
get_head();
get_header("home"); 

if(!isset($_SESSION['userEmail'])) {
    header("Location: ./index.php");

    // abela
    // abela@gmail.com
    // aA1|aaaa
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LListat</title>
</head>
<body>
    <div class="imgs"></div>

    <div class="info"></div>
</body>

</html>

<?php

try { 
    $con = new mysqli('localhost', 'abel', 'abel', 'daw_m7');
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    } 

    $userId = buscaUserId($con);
    
    $consulta= $con->prepare("SELECT producto_name, producto_precio, producto_precio_descuento, producto_descripcion, producto_imgs, lat, lng, categoria_id, subcategoria_id) FROM productos WHERE user_id = ?");
    $consulta->bind_param("i", $userId);
    $consulta->execute();
    $consulta->bind_result($name, $precio, $precioDescuento, $descripcion, $imgs, $lat, $lng, $categoriaId, $subcategoriaId);
    $consulta->store_result();
    $consulta->fetch();

} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

function buscaUserId($con) {
    if(isset($_SESSION['userEmail'])) {       
        $consulta= $con->prepare("SELECT user_id FROM users WHERE user_email = ?");
        $consulta->bind_param("s", $_SESSION['userEmail']);
        $consulta->execute();
        $consulta->bind_result($userId);
        $consulta->store_result();
        $consulta->fetch();
        return $userId;
    }
}

?>

<?php get_footer(); ?>