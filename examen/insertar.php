<?php
    include("conexion.php");
    $con=conectar();
    $nombre_producto=$_POST['nombre_producto'];
    $marca=$_POST['marca'];
    $stock=$_POST['stock'];
    $precio=$_POST['precio'];
    $sql="INSERT INTO formulario (nombre_producto,marca,stock,precio)
    VALUES
    ('$nombre_producto','$marca','$stock','$precio')
    ";
     $query=mysqli_query($con,$sql);
        if($query){
        header("location: examen.php");
        } else{
        echo"error al insertar al alumno";
        }
?>