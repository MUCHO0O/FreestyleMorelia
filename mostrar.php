<?php 
include 'conexion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de eventos</title>
        <link rel="stylesheet" href="css/most.css">
    </head>
    <body>
        <table border="3">
            <thead>
                <tr>
                    <th><a href="from.html">ingresar</a></th>
                    <th><a href="index.html">menu</a></th>
                    <th><a href="desplegable.html">portada</a></th>
                </tr>
            </thead>
            <tr>
                <td>id_evento</td>
                <td>nombre</td>
                <td>lugar</td>
                <td>fecha</td>
                <td>descripcion</td>
                
            </tr>
            <?php
            $sql="SELECT * from evento";
            $result=mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
            
            ?>
            <tr>
                <td><?php echo $mostrar['id_evento'] ?></td>
                <td><?php echo $mostrar['nombre'] ?></td>
                <td><?php echo $mostrar['lugar'] ?></td>
                <td><?php echo $mostrar['fecha'] ?></td>
                <td><?php echo $mostrar['descrip'] ?></td>
                
            </tr>
            
            <?php
            }
            
            ?>
            
        </table>
    </body>

</html>