<?php
include("conexion.php");
$con=conectar();
$sql="SELECT*FROM formulario";
$query=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
</head>
<style>
    .head{
        background: rgb(65, 117, 223);
        padding: 20px 20px 20px 50px;
        margin: 20px 50px 40px 20px;

    }
    .contenedor{

    }
    .enlaces{
         /*display: flex;
            flex-direction: row;*/
            gap: 20px;
            display: grid;
            grid-template-columns: repeat(3,1fr);
    }
</style>
<body>
        <div class="head">
            <h1 style="text-align: center">Examen 1ER PARCIAL-APLICACIONES WEB</h1>
        </div>
        <main class="contenedor" style="display: grid; grid-template-columns: 50% 50%;" >
            <div class="contenedor" style="padding: 20px; background: rgb(123, 132, 150);">
                <h1 style="text-align: center">Formulario</h1>
                <form action="insertar.php"method="POST">
                    <div style="display: flex; gap: 10px;">
                         <input type="text" class="form-control" name="nombre producto" placeholder="nombre">
                        <input type="text" class="form-control" name="marca" placeholder="marca">
                        <input type="int" class="form-control" name="stock" placeholder="stock">
                        <input type="decimal" class="form-control" name="precio" placeholder="precio">
                        <button type="submit">guardar</button>
                     </div>
                </form>
            </div>
            <div class="derecha" style="padding: 20px; background: rgb(27, 39, 65);">
                <section>
                    <h1 style="text-align: center">tabla de productos</h1>
                </section>
                <thead>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>marca</th>
                            <th>STOCK</th>
                            <th>PRECIO</th>
                            <th>Acciones</th>
                        </tr>
                        <tbody>
                             <?php
                                 while ($row=mysqli_fetch_array($query)){
                                 ?>
                              <tr>
                <td><?php echo $row['nombre_producto']?></td>
                <td><?php echo $row['marca']?></td>
                <td><?php echo $row['stock']?></td>
                <td><?php echo $row['precio']?></td>
                <td>
                    <br>
                    <a href="eliminar.php?nombre_producto=<?php echo $row['nombre_producto'];?>">Eliminar</a>
                </td>
                              </tr>
                              <?php
                               }
                                ?>
                          </tbody>
                    </table>
                </thead>
            </div>
        </main>
        <br>
        <div class="enlaces">
            <div class="dere" style="padding: 20px; background: rgb(27, 39, 65);">
                <h1>R1- INTRODUCCION A git y GITHUB</h1>
            </div>
            <div class="izquierda" style="padding: 20px; background: rgb(64, 168, 128);">
                <h1>R2-HTML + CSS + BOX MODEL</h1>
            </div>
            <div class="izqui" style="padding: 20px; background: rgb(30, 104, 75);">
                <h1>R3-FELX Y GRID</h1>
                <nav>
                    <a href="documentos/R3-Grid y flex.pdf" class="href"></a>
                </nav>
            </div>
        </div>
         <div class="fina" style="display: flex; background-color: gold;">
            <div class="foto">
                <img src="https://www.nutrisslovers.com/Portals/nutrisslovers/Articulos%20Nutriss%20Gatos/vas-a-viajar-prepara-a-tu-gato-para-tu-ausencia/cuanto-tiempo-se-puede-dejar-solo-a-un-gato-en-casa.jpg?ver=eGzIHcF7ivuipCEwE_iTcA%3D%3D" alt="imagen" style="width: 120px; padding: 20px 20px 20px ; border-radius: 80px;">
            </div>
            <div class="informacion-personal" style="text-align: center;">
                <h2>----Edgar Omar Vera Escobar-----</h2>
                <h3>Pues hasta ahora ha sido un hermoso, dificil por las materias que se llevan a cabo pero hasta ahora ha sido algo facil excepto por el 3 cuatrimestre</h3>
                <div class="fo">
                </div>
            </div>
        </div>
</body>
</html>