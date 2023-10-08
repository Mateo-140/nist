<?php
include 'conex.php';
if ( !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['contra'])) {
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];
    $contra = hash('sha256',$contra);
    $sql2 = "SELECT * FROM registro WHERE correo = '" . $email . "'";
    $res = mysqli_query($con1, $sql2);
    echo mysqli_num_rows($res);


        if ( mysqli_num_rows($res)>0) {
            
            print("Error en la consulta");
            
        } else {
            echo mysqli_num_rows($res);
            
        $sql = "INSERT INTO registro(usuario,correo,contra) VALUES ('$usuario','$email','$contra')";
        
        mysqli_query ($con1,$sql) or die ("Error en la consulta");
     
        
            header('Location: inicio.php');
        
    }
    


}else print("Debe completar todos los campos solicitados");
?>
