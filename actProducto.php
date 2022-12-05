

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
        echo '<p><img src="public/'.$archivo.'"></p>';
    }
    else {
       echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
    }
}

?>