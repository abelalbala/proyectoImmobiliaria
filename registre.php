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
            exit();
        } 
        $userName = $_POST['userName'];
        $userEmail = $_POST['email'];
        $userPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if(comprovaEmailUnic($con, $userEmail)) {
            $consulta= $con->prepare("INSERT INTO users(user_name, user_email, user_password) VALUES (?,?,?)");
            $consulta->bind_param("sss", $userName, $userEmail, $userPassword);
            $consulta->execute();

            
            
        } else echo "Email repetit, posa un altre per registrarte!!";

    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
function comprovaEmailUnic($con, $userEmail) {
    $consulta= $con->prepare("SELECT user_email FROM users WHERE user_email = ?");
    $consulta->bind_param("s", $userEmail);
    $consulta->execute();
    $consulta->bind_result($result);
    $consulta->store_result();
    if(!$consulta->num_rows > 0) return true;
    return false;
}

?>

<?php get_footer(); ?>

<?php



?>