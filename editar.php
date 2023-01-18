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

<div class="main">
    <form id="form" action="actProducto.php" method="POST" enctype="multipart/form-data">
        <label for="">Nombre</label>
        <br>
        <input type="text" name="nomProducto" value="<?php echo $_GET['name'] ?>">
        <br><br> 
        <label for="">Preu</label>
        <br>
        <input type="number" name="preuProducto" value="<?php echo $_GET['precio'] ?>">
        <br><br>
        <label for="">Preu descompte</label>
        <br>
        <input type="text" name="preuDescompteProducto" value="<?php echo $_GET['precioDescuento'] ?>">
        <br><br>
        <label for="">Descripcio</label>
        <br>
        <input type="text" name="descripcioProducto" value="<?php echo $_GET['descripcion'] ?>">
        <br><br>
        <select name="Categorias" id="selectCategorias"></select>
        <br>
        <select name="selectSubcategorias" id="selectSubcategorias"></select>
        <br><br>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <div class="drop-area" draggable="true">
            <h2 id="dragText">Drag & Drop files</h2>
            <button id="dragButton">Upload files</button>
            <input type="file" name="inputFiles[]" id="input-file" hidden multiple="multiple" />
        </div>       
        <div id="preview"></div>
        <div id="map"></div>  
        <br>
        <input id="inptCalle" type="text" name="adreca" value="Carrer de la Selva de Mar 211 08020 Barcelona" id="adreca"/>  
        <button type="button" class="btn btn-secondary" id="findLoc">Buscar adreça</button>  
        <br>
        <input type="hidden" name="lat" value="" id="latitude" value="<?php echo $_GET['lat'] ?>"/>  
        <input type="hidden" name="lng" value="" id="longitude" value="<?php echo $_GET['lng'] ?>"/> 
        <br><br>
        <input id="inputSubmit" type="submit">
    </form>
</div>
<script src="scripts/scriptDrag.js"></script>
<script src="scripts/scriptCategorias.js"></script>
<script src="scripts/scriptRecullMapa.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1LqPNfReHlA4RTAU1YOuVKZxTqvCPa0g&callback=initMap" async defer></script>


<?php get_footer(); ?>