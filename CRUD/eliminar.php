<?php
    include("conexion.php");
    $con=conectar();
    $matricula=$_GET['matricula'];
    $sql="DELETE FROM alumnos WHERE matricula='$matricula'";
    $query=mysqli_query($con,$sql);
        if($query){
        header("location: alumnos.php");
        exit();
        } else{
        echo"error al eliminar al alumno: " . mysqli_error($con);
        }
?>