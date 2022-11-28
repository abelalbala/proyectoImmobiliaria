<?php
require "functions.php";
get_head();
get_header("home"); 

if(!isset($_SESSION['user'])) {
    //header("Location: ./index.php");
}
?>

<div class="main">
    <form id="productForm" action="" method="POST">
        <label for="">Nombre</label>
        <br>
        <input type="text" name="nomProducto">
        <br><br> 
        <label for="">Preu</label>
        <br>
        <input type="number" name="preuProducto">
        <br><br>
        <label for="">Preu descompte</label>
        <br>
        <input type="text" name="preuDescompteProducto">
        <br><br>
        <label for="">Descripcio</label>
        <br>
        <input type="text" name="descripcioProducto">
        <br><br>
        <select name="Categorias" id="selectCategorias"></select>
        <br>
        <select name="selectSubcategorias" id="selectSubcategorias"></select>
        <br><br>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <div class="drop-area" draggable="true">
            <h2 id="dragText">Drag & Drop files</h2>
            <button id="dragButton">Upload files</button>
            <input type="file" name="inputFiles[]" id="input-file" hidden multiple />
        </div>       
        <div id="preview"></div>
        <input type="submit">
    </form>
</div>
<script src="scripts/scriptDrag.js"></script>
<script src="scripts/scriptCategorias.js"></script>

<?php get_footer(); ?>