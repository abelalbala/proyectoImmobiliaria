<?php
require "functions.php";

get_head();

get_header("home"); 

?>

<div class="main">
    <form action="" method="POST">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <div class="drop-area" draggable="true">
            <h2 id="dragText">Drag & Drop files</h2>
            <button id="dragButton">Upload files</button>
            <input type="file" name="inputFiles[]" id="input-file" hidden multiple />
        </div>       
        <div id="preview"></div>
    </form>
</div>
<script src="scripts/scriptDrag.js"></script>

<?php get_footer(); ?>