<?php
require "functions.php";
get_head();
get_header("home"); 
?>

<form action="login.php" method="POST">
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
<script src="scripts/scriptLogin.js"></script>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try { 
        $con = new mysqli('localhost', 'abel', 'abel', 'daw_m7');
        if ($con->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        } 
        $userEmail = $_POST['email'];
        $userPassword = $_POST['password'];

        $consulta= $con->prepare("SELECT user_email, user_password FROM users WHERE user_email = ?");
        $consulta->bind_param("s", $userEmail);
        $consulta->execute();
        $consulta->bind_result($email, $password);
        $consulta->store_result();
        if(!$consulta->num_rows > 0) echo "Email incorrecte";
        else {
            $consulta->fetch();
            if(!password_verify($userPassword, $password)) echo "Dadas incorrectas";
            else {
                // Redirigir a su sesion de aplicacion
                $_SESSION['userEmail'] = $userEmail;
                header("Location: ./llistat.php");
                quit();
            }
        }
        
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

?>

<?php get_footer(); ?>