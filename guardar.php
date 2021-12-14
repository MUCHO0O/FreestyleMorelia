<?php
include 'conexion.php';
        //recuperar variables.
        $nombre=$_POST['nombre'];
        $lugar=$_POST['lugar'];
        $fecha=$_POST['fecha'];
        $descrip=$_POST['descrip'];
        //hacemos la sentencia sql
        $sql ="INSERT INTO evento(nombre,lugar,fecha,descrip) VALUES('$nombre','$lugar','$fecha','$descrip')";
        $ejecutar=mysqli_query($conexion,$sql);
        //verificar la ejecucuion
        if(!$ejecutar){
            echo "hubo algun error";
        }else{
            echo "datos guardados correctamente <br><a href='index.html'>volver</a>";
        }
        header("Location:mostrar.php")
        //mysqli_close( $conexion);//cerrar la conexion con base de datos
        ?>
        mysqli_close( $conexion);//cerrar la conexion con base de datos
        ?>