<?php
#inclye la informacion del archivo de conexion
include("conexion.php");
#mandamos a llamar para ejecutar la funcion
$con=conectar();
#se entrega todo lo que se tenga en la tabla de alumnos
$sql="SELECT*FROM alumnos";
$query=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alumnos</title>
</head>
<body>
    <form action="guardar.php" >
        <input type="int" name="Matricula" placeholder="Matricula">
        <input type="text" name="Nombre" placeholder="Nombretext">
        <input type="text" name="Apellido paterno" placeholder="Apellido paterno">
        <input type="text" name="Apellido materno" placeholder="Apellido materno">
        <button>guardar</button>
    </form>
    <table border="1">
        <tr>
            <th>matricula</th>
            <th>nombre</th>
            <th>apellido Paterno</th>
            <th>apellido Materno</th>
        </tr>
    </table>
</body>
</html>