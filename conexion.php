<?php

$usuario = "root";
        $password = "";
        $servidor = "localhost";
        $basededatos = "eventos_culturales";
        //creacion de la conexion a la base de datos con my sqll_connected
    $conexion=mysqli_connect($servidor,$usuario,$password) or die (
    "No se ha podido conectar al servidorde Base de Datos");
        //seleccion de la base de datos a utilizar
    $db= mysqli_select_db($conexion,$basededatos)or die ( "Upps!
    pues ba a ser que no se ha podidi conectar a la base de datos");
        //Establecer y realizar consulta, guardamos en variable.
        //Establecer y realizar consulta, guardamos en variable.

?>