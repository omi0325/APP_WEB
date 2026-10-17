<?php
include("conexion.php");
$con = conectar();
$matricula = $_GET['matricula'];
$sql = "SELECT * FROM alumnos WHERE matricula='$matricula'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);

if (isset($_POST['actualizar'])) {
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $edad = $_POST['edad'];
    $sql = "UPDATE alumnos SET
    nombre='$nombre',
    apellido_p='$apellido_p',
    apellido_m='$apellido_m',
    edad='$edad'
    WHERE matricula='$matricula'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("location: alumnos.php");
        exit();
    } else {
        echo "Error al editar al alumno";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar alumno</title>
</head>
<body>
    <h1>Editar alumno</h1>
    <?php if (isset($row) && $row) { ?>
    <form action="update.php?matricula=<?php echo $row['matricula']; ?>" method="POST">
    <div style="display: flex; gap: 10px;">
        <input type="int" name="matricula"
               value="<?php echo $row['matricula']; ?>">
        <input type="text" class="form-control" name="nombre"
               value="<?php echo $row['nombre']; ?>" placeholder="Nombre">
        <input type="text" class="form-control" name="apellido_p"
               value="<?php echo $row['apellido_p']; ?>" placeholder="Apellido paterno">
        <input type="text" class="form-control" name="apellido_m"
               value="<?php echo $row['apellido_m']; ?>" placeholder="Apellido materno">
        <input type="text" class="form-control" name="edad"
               value="<?php echo $row['edad']; ?>" placeholder="Edad">
        <button type="submit" name="actualizar">Actualizar</button>
    </div>
    </form>
    <?php } else { ?>
        <p>No se encontró al alumno.</p>
    <?php } ?>
    <br>
    <a href="alumnos.php">Regresar</a>
</body>
</html>
