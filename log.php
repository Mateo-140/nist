<?php
include 'conex.php';
$us = $_POST['user'];
$cont = hash('sha256',$_POST['cont']);
$sql1 = "SELECT * FROM registro WHERE usuario='" . $us . "' and contra='" . $cont . "'";
$res1 = mysqli_query($con1, $sql1);

if (mysqli_num_rows($res1) > 0) {
    header('Location: inicio.php');
} else{ echo 'Los datos son invalidos';
   
}
// user Lolo contraseña 1234    
?>