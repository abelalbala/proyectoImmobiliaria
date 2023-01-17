<?php
require "functions.php";
get_head();
get_header("home"); 

if(!isset($_SESSION['userEmail'])) {
    header("Location: ./index.php");
    quit();

    // abela
    // abela@gmail.com
    // aA1|aaaa
}
?>
<div class="mainLListat" style="text-align: center;">
    <h1>Listado de productos</h1>
    <br>
    <table style="margin: auto;">    

        <th>Nombre</th>
        <th>Precio</th>
        <th>Precio descuento</th>
        <th>Descripcion</th>
        <th>Categoria</th>
        <th>Subcategoria</th>
        <th>Imagenes</th>

        </tr>

        <?php       
        try { 
            $con = new mysqli('localhost', 'abel', 'abel', 'daw_m7');
            if ($con->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            } 
            $sql = "select * from productos where user_id = ".buscaUserId($con);
            $resultado = mysqli_query($con,$sql);

            while($mostrar=mysqli_fetch_array($resultado)) {
        ?>
        
        <tr>
            <td><?php echo $mostrar['producto_name']; ?></td>
            <td><?php echo $mostrar['producto_precio']; ?></td>
            <td><?php echo $mostrar['producto_precio_descuento']; ?></td>
            <td><?php echo $mostrar['producto_descripcion']; ?></td>
            <td><?php echo buscaCategoriaId($con, $mostrar['categoria_id']); ?></td>
            <td><?php echo buscaSubcategoriaId($con, $mostrar['subcategoria_id']); ?></td>
            <td>
                <?php 
                    $arrImgs = explode(" ", $mostrar['producto_imgs']);
                    //echo $mostrar['producto_imgs'];
                    //echo $arrImgs[0];
                    echo "<div style='display:flex;'>";
                    foreach ($arrImgs as $img) {
                        if($img != null) echo "<img style='height: 200px; width: 250px;' class='imatges' src='public/".$img."'>"; 
                    }
                    echo "</div>";
                ?>
            </td>
            
            <td>
                <div class="crud" style="">
                    <?php echo "<a href='editar.php?id=".$mostrar['producto_id']."&name=".$mostrar['producto_name']."&precio=".$mostrar['producto_precio']."&precioDescuento=".$mostrar['producto_precio_descuento']."&descripcion=".$mostrar['producto_descripcion']."&categoriaId=".$mostrar['subcategoria_id']."&imgs=".$mostrar['producto_imgs']."'>Editar</a>"?>
                    <br><br>
                    <?php echo "<a href='eliminar.php?id=".$mostrar['producto_id']."'>Eliminar</a>"?>
                </div>
            </td>
        </tr>
        <?php
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        ?>
    </table>
</div>

<style>
    th, td {
  padding: 15px;
  font-size: 20px;
}
</style>

<?php
/*
try { 
    $con = new mysqli('localhost', 'abel', 'abel', 'daw_m7');
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    } 

        <?php echo "<a href='recibir.php?name=".$mostrar['producto_name']."&precio=".$mostrar['producto_precio']."&precioDescuento=".$mostrar['producto_precio_descuento']."&descripcion=".$mostrar['producto_descripcion']."&categoriaId=".$mostrar['subcategoria_id']."&imgs=".$mostrar['producto_imgs']."'>Editar</a>"?>


    // SELECT PRODUCTS

    $userId = buscaUserId($con);
    $consulta= $con->prepare("SELECT producto_name, producto_precio, producto_precio_descuento, producto_descripcion, producto_imgs, lat, lng, categoria_id, subcategoria_id FROM productos WHERE user_id = ?");
    $consulta->bind_param("i", $userId);
    $consulta->execute();
    $consulta->bind_result($name, $precio, $precioDescuento, $descripcion, $imgs, $lat, $lng, $categoriaId, $subcategoriaId);
    $consulta->store_result();
    $consulta->fetch();
    
    // MOSTRA IMATGES
    $arrImgs = explode(";", $imgs);
    echo "<div style='display:flex;'>";
    foreach ($arrImgs as $img) {
        if($img != null) echo "<img src='public/".$img."'>"; 
    }
    echo "</div>";

    // MOSTRA POSICIO DEL MAPA


    // MOSTRA LA RESTA DE INFO
    echo "<p style='margin-left: 50px;'> Nom: ".$name."</p>";
    echo "<p style='margin-left: 50px;'> Preu: ".$precio."</p>";
    if($precioDescuento != null) echo "<p style='margin-left: 50px;'> Preu descompte"."</p>";
    echo "<p style='margin-left: 50px;'> Descripció: ".$descripcion."</p>";
    echo "<p style='margin-left: 50px;'> Categoria: ".buscaCategoriaId($con, $categoriaId)."</p>";
    echo "<p style='margin-left: 50px;'>Subcategotria: ".buscaSubcategoriaId($con, $subcategoriaId)."</p>";

} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
*/
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

function buscaCategoriaId($con, $categoriaId) {
    $consulta= $con->prepare("SELECT categoria_name FROM categorias WHERE categoria_id = ?");
    $consulta->bind_param("i", $categoriaId);
    $consulta->execute();
    $consulta->bind_result($catName);
    $consulta->store_result();
    $consulta->fetch();
    return $catName;
}
function buscaSubcategoriaId($con, $subcategoriaId) {
    $consulta= $con->prepare("SELECT subcategoria_name FROM subcategorias WHERE subcategoria_id = ?");
    $consulta->bind_param("i", $subcategoriaId);
    $consulta->execute();
    $consulta->bind_result($subcatName);
    $consulta->store_result();
    $consulta->fetch();
    return $subcatName;
}

?>

<?php get_footer(); ?>