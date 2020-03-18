<?php
require '../Modelo/conexion.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/style.css">
        <title>Agenda</title>
    </head>
    <body>
        <br><br>
                <center> 
    <p class="subti"> <font face="Comic Sans MS"> BIENVENIDO A TU AGENDA DE TRANSMISIONES</font></p>
    <hr class="subrayado">
    <center>
        <center> 
    <p class=""> <font face="Comic Sans MS"> <a href="../Vista/Transmisiones.html" style="background-color: teal;color: white;padding: 5px;border-radius: 5px;cursor: pointer;">Agregar Nuevo Contacto</a></font></p>
    <hr class="subrayado">
    <center>
        <table border="1" style="text-align: center;">
            <tr>
                <th>Transmision</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Tema<th>
                <th>Fecha</th>
                <th>HORA</th>
                <th>MONTAJE</th>
            </tr>
            <?php
            $sql ="SELECT `id_transmision`, `nombre`, `apellidos`, `tema`, fecha, hora, `montaje` FROM personas as p, transmisiones as t  WHERE p.id_persona=t.id_persona;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0)
                echo "consulta exitosa";
            else
                echo "error en la consulta";
            while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                ?>
                <tr>
                    <td><?php echo $row['id_transmision'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['apellidos'] ?></td>
                    <td><?php echo $row['tema'] ?></td>
                    <td><?php echo $row['fecha'] ?></td>
                    <td><?php echo $row['hora'] ?></td>
                    <td><?php echo $row['montaje'] ?></td>
                    <?php
                    $datos = array($row['id_transmision']
                        , $row['nombre']
                        , $row['apellidos']
                        , $row['tema']
                        , $row['fecha']
                        , $row['hora']
                        , $row['montaje']);
                    ?>
                    <td>
                            <center>
        <a href="../Vista/Transmisiones.html" style="background-color: teal;color: white;padding: 5px;border-radius: 5px;cursor: pointer;">Agregar Nuevo Contacto</a>
    </center>
                        <form action="metodos.php" method="POST">
                            <input type="hidden" name="datos" value="<?php echo $datos[0] ?>"/>
                            <input type="hidden" name="accion" value="eliminar"/>
                            <br>
                            <input type="submit" value="Eliminar Contacto"/>
                        </form>
                        <form action="Editar.php" method="POST">
                            <input type="hidden" name="d0" value="<?php echo $datos[0] ?>"/>
                            <input type="hidden" name="d1" value="<?php echo $datos[1] ?>"/>
                            <input type="hidden" name="d2" value="<?php echo $datos[2] ?>"/>
                            <input type="hidden" name="d3" value="<?php echo $datos[3] ?>"/>
                            <input type="hidden" name="d4" value="<?php echo $datos[4] ?>"/>
                            <input type="hidden" name="d5" value="<?php echo $datos[5] ?>"/>
                            <input type="hidden" name="d6" value="<?php echo $datos[6] ?>"/>
                            <input type="hidden" name="d7" value="<?php echo $datos[7] ?>"/>
                            <input type="hidden" name="d8" value="<?php echo $datos[8] ?>"/>
                            <input type="hidden" name="d9" value="<?php echo $datos[9] ?>"/>
                            <input type="submit" value="Editar Contacto"/>
                        </form>
                    </td>
                    <?php
                }
                mysqli_free_result($result);
                ?>
            </tr>
        </table>
    </center>
</body>
</html>
