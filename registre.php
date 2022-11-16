<?php
require "functions.php";

get_head();

get_header("home"); 
?>

<div class="main">
    <form action="registre.php" onsubmit="return validateForm()" method="POST">
        <label for="validationUsername">Nom d'Usuari</label>
        <br>
        <input type="text" name="userName" id="validationUsername">
        <br><br>
        <label for="validationEmail">Email</label>
        <br>
        <input type="email" name="email" id="validationEmail">
        <br>
        <p id="errorEmail">* Error al correu</p>
        <br>
        <label for="validationPassword">Password</label>
        <br>
        <input type="password" name="password" id="validationPassword">
        <br>
        <p class="checkPassword" id="char8min">* 8 caracters mínim</p>
        <p class="checkPassword" id="lletraMaj">* 1 lletra majúscula</p>
        <p class="checkPassword" id="lletraMin">* 1 lletra minuscula</p>
        <p class="checkPassword" id="num">* 1 numero</p>
        <p class="checkPassword" id="specialChar">* 1 caracter especial</p>
        <br>
        <input type="submit" >
    </form>
</div>
<script src="scripts/scriptRegistre.js"></script>

<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    try { 
        $con = new mysqli('localhost', 'abel', 'abel', 'daw_m7');
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            echo "boss";
            exit();
        } 
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
    //$consulta= $con->prepare("SELECT id, titulo FROM pelicula WHERE id<= ?");
    //$consulta->bind_param("i", $valor1);
}

?>

<?php get_footer(); ?>