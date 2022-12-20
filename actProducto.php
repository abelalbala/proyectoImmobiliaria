<?php

echo $_POST["nomProducto"];
echo "<br>";
print_r($_FILES["inputFiles"]);
echo "<br><br>";
 
for ($i=0; $i<count($_FILES["inputFiles"]["name"]); $i++) {
    $archivo = $_FILES['inputFiles']['name'][$i];
    $tamano = $_FILES['inputFiles']['size'][$i];
    $temp = $_FILES['inputFiles']['tmp_name'][$i];
    echo $temp.'<br>';
    echo "Name: ".$archivo.'<br>';
    if (move_uploaded_file($temp, 'public/'.$archivo)) {
        chmod('public/'.$archivo, 0777);
        echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
        
    }
    else {
       echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try { 
        $con = new mysqli('localhost', 'abel', 'abel', 'daw_m7');
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        } 
        $nomProducto = $_POST['nomProducto'];
        $preuProducto = $_POST['preuProducto'];
        $preuDescompteProducto = $_POST['preuDescompteProducto'];
        $descripcioProducto = $_POST['descripcioProducto'];
        $categoria = $_POST['preuProducto'];
        $subcategoria = $_POST['preuProducto'];
        $inputFiles = $_POST['inputFiles'];
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];

        if(comprovaNomUnic($con, $nomProducto)) {
            $consulta= $con->prepare("INSERT INTO productos(user_id, producto_name, producto_precio, producto_precio_descuento, producto_descripcion, producto_imgs) VALUES (?,?,?,?,?,?)");
            $consulta->bind_param("isiiss", buscaIdUser(), $nomProducto, $preuProducto, $preuDescompteProducto, $descripcioProducto, $);
            $consulta->execute();
            
        } else echo "Email repetit, posa un altre per registrarte!!";

    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

function comprovaNomUnic($con, $nomProducto) {
    $consulta= $con->prepare("SELECT producto_name FROM productos WHERE producto_name = ?");
    $consulta->bind_param("s", $nomProducto);
    $consulta->execute();
    $consulta->bind_result($result);
    $consulta->store_result();
    if(!$consulta->num_rows > 0) return true;
    return false;
}

?>