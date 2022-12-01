<?php

try { 
    
    $con = new mysqli('localhost', 'abel', 'abel', 'daw_m7');
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    
    $consulta= $con->prepare("SELECT categoria_name, categoria_id FROM categorias");
    $consulta->execute();
    $consulta->bind_result($categoriaName, $categoriaId);
    $consulta->store_result();

    if($consulta->num_rows > 0) {
        $return = array();

        while($consulta->fetch()) {
            $object = new stdClass();
            $object->name = $categoriaName;
            $object->id = $categoriaId;

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