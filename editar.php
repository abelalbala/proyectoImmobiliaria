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



<?php get_footer(); ?>