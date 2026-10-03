<?php
    include("conexion.php");
    $con=conectar();
    #recibir la informacion del formulario
    $matricula=$POST['matricula'];
    $nombre=$POST['nombre'];
    $apellido_p=$POST['apellido_p'];
    $apellido_m=$POST['apellido_m'];
    $edad=$POST['edad'];
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