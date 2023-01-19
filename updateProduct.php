<?php
session_start();

// TEMPORALMENTE INACTIVO

/*// CARGAR IMAGENES, EN ESPERA POR EL MOMENTO
$total = count($_FILES['inputFiles']['name']);
echo $total . "---";
print_r($_FILES["inputFiles"]);
$nombreArchivos = [];
for ($i=0; $i<count($_FILES["inputFiles"]["name"]); $i++) {
    $archivo = $_FILES['inputFiles']['name'][$i];
    $tamano = $_FILES['inputFiles']['size'][$i];
    $temp = $_FILES['inputFiles']['tmp_name'][$i];
    echo $temp.'<br>';
    echo "Name: ".$archivo.'<br>';
    if (move_uploaded_file($temp, 'public/'.$archivo)) {
        chmod('public/'.$archivo, 0777);
        array_push($nombreArchivos, $archivo);
        echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
    }
    else {
       echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
    }
}*/

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    try { 
        $con = new mysqli('localhost', 'abel', 'abel', 'daw_m7');
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        } 
        $productoId = $_POST["productoId"];
        echo $productoId;
        $nomProducto = $_POST["nomProducto"];
        $preuProducto = $_POST['preuProducto'];
        $preuDescompteProducto = $_POST['preuDescompteProducto'];
        $descripcioProducto = $_POST['descripcioProducto'];
        $categoria_id = $_POST['Categorias'];
        $subcategoria_id = $_POST['selectSubcategorias'];
        $inputFiles = $_POST['inputFiles'];
        $lat = (string)$_POST['lat'];
        $lng = (string)$_POST['lng'];       
        $direccion = $_POST['adreca'];
        $categoriaId = $_POST['categoriaId'];
        $subcategoriaId = $_POST['subcategoriaId'];
        //$nombreArchivos = implode(" ", $nombreArchivos);
        
        // INGRESA PRODUCTE         
            $userId = buscaUserId($con);
            $consulta= $con->prepare("UPDATE productos SET producto_name = ?, producto_precio = ?, producto_precio_descuento = ?, producto_descripcion = ?, lat= ?, lng= ?, categoria_id= ?, subcategoria_id= ?, direccion= ? WHERE producto_id= ?;");
            $consulta->bind_param("siisssiisi", $nomProducto, $preuProducto, $preuDescompteProducto, $descripcioProducto, $lat, $lng, $categoria_id, $subcategoria_id, $direccion, $productoId);
            
            $consulta->execute();
            
            header("Location: ./llistat.php");
            quit();

    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
//}

function comprovaNomUnic($con, $nomProducto) {
    $consulta= $con->prepare("SELECT producto_name FROM productos WHERE producto_name = ?");
    $consulta->bind_param("s", $nomProducto);
    $consulta->execute();
    $consulta->bind_result($result);
    $consulta->store_result();
    if(!$consulta->num_rows > 0) return true;
    return false;
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

/*function buscaCategoriaId($con) {
    $consulta= $con->prepare("SELECT categoria_id FROM categorias WHERE categoria_name = ?");
    $consulta->bind_param("s", $_POST['Categorias']);
    $consulta->execute();
    $consulta->bind_result($catId);
    $consulta->store_result();
    $consulta->fetch();
    return $catId;
}

function buscaSubcategoriaId($con) {
    $consulta= $con->prepare("SELECT subcategoria_id FROM subcategorias WHERE subcategoria_name = ?");
    $consulta->bind_param("s", $_POST['selectSubcategorias']);
    $consulta->execute();
    $consulta->bind_result($subcatId);
    $consulta->store_result();
    $consulta->fetch();
    return $subcatId;
}*/

?>