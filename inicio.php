<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="usuario.php">Logo de usuario</a>
    <title>Document</title>
    
    <style>
        /* Estilos para la tabla */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilos para el formulario y los botones */
        form {
            display: inline-block;
            margin: 0;
        }

        button[type="submit"] {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php 
session_start();
include 'conex.php';
if ($con1) {
    $c = "SELECT nombre, vrsion, edicion, arquitectura FROM sistema";
    $r = mysqli_query($con1, $c);
    if ($r) {
?>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Versión</th>
            <th>Edición</th>
            <th>Arquitectura</th>
            <th>Seleccionar</th>
        </tr>
    </thead>
    <tbody>
<?php
        while ($row2 = mysqli_fetch_array($r)) {
            $nombre = $row2['nombre'];
            $vrsion = $row2['vrsion'];
            $edicion = $row2['edicion'];
            $arquitectura = $row2['arquitectura'];
?>
            <tr>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $vrsion; ?></td>
                <td><?php echo $edicion; ?></td>
                <td><?php echo $arquitectura; ?></td>
                <td>
                    <form action="cargar_sistema.php" method="post">
                        <input type="checkbox" name="sls_<?php echo $nombre; ?>">
                        <button type="submit" name="select_<?php echo $nombre; ?>">Cargar</button>
                    </form>
                </td>
            </tr>
<?php
        }
?>
    </tbody>
</table>
<?php
    }
}
?>
</body>
</html>

