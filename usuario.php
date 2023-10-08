<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="inicio.php">Inicio</a>
    <title>Document</title>
    
    <style>
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

        .verde {
            background-color: #4CAF50;
        }

        .rojo {
            background-color: #FF0000;
        }
    </style>
</head>
<body>
<?php
include 'conex.php';

if ($con1) {
    $c = "SELECT nombre_sistema, vrsion, edicion, arquitectura FROM usuario_sistema";
    $r = mysqli_query($con1, $c);
    if ($r) {
?>
<table>
    <thead>
        <tr>
            <th>Nombre Sistema</th>
            <th>Versión</th>
            <th>Edición</th>
            <th>Arquitectura</th>
            <th>Seleccionar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
<?php
        while ($row2 = mysqli_fetch_array($r)) {
            $nombre = $row2['nombre_sistema'];
            $vrsion = $row2['vrsion'];
            $edicion = $row2['edicion'];
            $arquitectura = $row2['arquitectura'];
            
            $valorAleatorio = rand(1, 2);
            
            $filaClass = ($valorAleatorio == 1) ? 'verde' : 'rojo';
?>
            <tr class="<?php echo $filaClass; ?>">
                <td><?php echo $nombre; ?></td>
                <td><?php echo $vrsion; ?></td>
                <td><?php echo $edicion; ?></td>
                <td><?php echo $arquitectura; ?></td>
                <td>
                    <form action="cargar_sistema.php" method="post">
                        <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                        <input type="hidden" name="version" value="<?php echo $vrsion; ?>">
                        <input type="hidden" name="edicion" value="<?php echo $edicion; ?>">
                        <input type="hidden" name="arquitectura" value="<?php echo $arquitectura; ?>">
                        <button type="button" name="select" onclick="consultarActualizaciones(this)">Consultar Actualizaciones</button>
                    </form>
                </td>
                <td>
                    <form action="borrar_datos_usuario.php" method="post">
                        <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                        <input type="hidden" name="version" value="<?php echo $vrsion; ?>">
                        <input type="hidden" name="edicion" value="<?php echo $edicion; ?>">
                        <input type="hidden" name="arquitectura" value="<?php echo $arquitectura; ?>">
                        <button type="submit" name="borrar">Borrar</button>
                    </form>
                </td>
            </tr>
<?php
        }
?>
    </tbody>
</table>


<script>
function consultarActualizaciones(button) {
    var fila = button.parentNode.parentNode;
    var valorAleatorio = Math.floor(Math.random() * 2) + 1;
    
    if (valorAleatorio === 1) {
        fila.classList.remove('rojo');
        fila.classList.add('verde');
    } else {
        fila.classList.remove('verde');
        fila.classList.add('rojo');
        alert('Se necesita actualizar');
    }
}
</script>

</body>
</html>
<?php
    }
}
?>