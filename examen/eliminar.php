<?php
    include("conexion.php");
    $con=conectar();
    $nombre_producto=$_GET['nombre_producto'];
    $sql="DELETE FROM formulario WHERE nombre_producto='$nombre_producto'";
    $query=mysqli_query($con,$sql);
        if($query){
        header("location: examen.php");
        exit();
        } else{
        echo"error al eliminar el producto: " . mysqli_error($con);
        }
?>