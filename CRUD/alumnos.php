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
    <h1>Formulario</h1>
    <form action="insertar.php" method="POST">
        <div style="display: flex; gap: 10px;">
            <input type="int" class="form-control" name="matricula" placeholder="Matricula">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
            <input type="text" class="form-control" name="apellido_p" placeholder="Apellido paterno">
            <input type="text" class="form-control" name="apellido_m" placeholder="Apellido materno">
            <input type="text" class="form-control" name="edad" placeholder="edad">
            <button type="submit">guardar</button>
        </div>
    </form>
    <br>
    <div class="tabla" >
        <thead>
            <table border="2">
                <tr>
                    <th>matricula</th>
                    <th>nombre</th>
                    <th>apellido Paterno</th>
                    <th>apellido Materno</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
        </thead>
        <tbody>
            <?php
            while ($row=mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $row['matricula']?></td>
                <td><?php echo $row['nombre']?></td>
                <td><?php echo $row['apellido_p']?></td>
                <td><?php echo $row['apellido_m']?></td>
                <td><?php echo $row['edad']?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
            </table>
    </div>
</body>
</html>