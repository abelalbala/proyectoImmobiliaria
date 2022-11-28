<?php

try { 
    $con = new mysqli('localhost', 'abel', 'abel', 'daw_m7');
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    } 
    $cat = $_POST['categoria'];
   // echo $cat;
    
    $consulta= $con->prepare("SELECT subcategoria_name, subcategoria_id FROM subcategorias WHERE categoria_id = ?");
    $consulta->bind_param("i", $cat);
    $consulta->execute();
    $consulta->bind_result($subcatName, $subcategoriaId);
    $consulta->store_result();

    if($consulta->num_rows > 0) {
        $return = array();

        while($consulta->fetch()) {
            $object = new stdClass();
            $object->name = $subcatName;
            $object->id = $subcategoriaId;

            array_push($return, $object);
        }
        echo json_encode($return);
    }

} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
} finally {
    $consulta->close();
    $con >close();
}

?>