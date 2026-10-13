<?php
    include("conexion.php");
    $con=conectar();
    #recibir la informacion del formulario
    $matricula=$_POST['matricula'];
    $nombre=$_POST['nombre'];
    $apellido_p=$_POST['apellido_p'];
    $apellido_m=$_POST['apellido_m'];
    $edad=$_POST['edad'];
    #Contruimos una consultar para insertar datos en la tabla alumnos
    $sql="INSERT INTO alumnos (matricula,nombre,apellido_p,apellido_m,edad)
    VALUES
    ('$matricula','$nombre','$apellido_p','$apellido_m','$edad')
    ";
    #ejecutamos la consulta
     $query=mysqli_query($con,$sql);
        if($query){
        header("location: alumnos.php");
        } else{
        echo"error al insertar al alumno";
        }
?>