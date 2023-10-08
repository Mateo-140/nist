<?php
include 'conex.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $idk = 1; 

    if ($con1) {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'sls_') === 0) {
                $nombreSistema = substr($key, 4);
                $c = "SELECT nombre, vrsion, edicion, arquitectura FROM sistema WHERE nombre = '$nombreSistema'";
                $r = mysqli_query($con1, $c);
                $row2 = mysqli_fetch_array($r);
                if ($row2) {
                    $nombre = $row2['nombre'];
                    $v = $row2['vrsion'];
                    $e = $row2['edicion'];
                    $a = $row2['arquitectura'];
                    $sql = "INSERT INTO usuario_sistema(nombre_usuario, nombre_sistema, vrsion, edicion, arquitectura) VALUES ('$idk', '$nombre', '$v', '$e', '$a')";
                    mysqli_query($con1, $sql);
                }
            }
        }
        header("Location: inicio.php");
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} else {
    echo "No se ha enviado ningún formulario.";
}
?>

