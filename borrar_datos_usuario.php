<?php
include 'conex.php';

if (isset($_POST['borrar'])) {
    $nombre = $_POST['nombre'];
    $vrsion = $_POST['version'];
    $edicion = $_POST['edicion'];
    $arquitectura = $_POST['arquitectura'];
        //código para eliminar el registro de la base de datos
    
    $sql = "DELETE FROM usuario_sistema WHERE nombre_sistema = '$nombre' AND vrsion = '$vrsion' AND edicion = '$edicion' AND arquitectura = '$arquitectura'";
    mysqli_query($con1, $sql);

    //redirigir a la página
     header("Location: usuario.php");

}
?>