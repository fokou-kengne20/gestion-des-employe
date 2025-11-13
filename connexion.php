<?php
//connexion a la base de donnee
$con = mysqli_connect("localhost", "root","","entreprise");
if(!$con){
    echo"vous n est pas connecte a la base de donnee";
}
?>