<?php
include_once '../Modelo/conexion.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Estilo/estilos.css">
        <title>Agenda</title>
    </head>
    <body>
    <div class ="Membrete">
        <p align="center"> <img src="../Vista/LogoUNIR.jpg" width="250" height="140"></p>
        <pre align="center"><h2>Maestría en Ingeniería de Software</h2></pre>
        <pre align="center"><h2>Computación en el Servidor WEB</h2></pre>
        <pre align="center"><h2>Computación en el Cliente WEB</h2></pre>
        <pre align="center"> <h2>Aplicación WEB</pre>
        <pre align="center"> <h2>José Antonio Cruz Zamora </h2></pre>
    </div>
        <br><br>
                <center> 
    <p class="subti"> <font face="Comic Sans MS"> BIENVENIDO A TU AGENDA DE TRANSMISIONES</font></p>
    <hr class="subrayado">
    <center>
        <center> 
    <p class=""> <font face="Comic Sans MS"> <a href="../Vista/Transmisiones.html" style="background-color: teal;color: white;padding: 5px;border-radius: 5px;cursor: pointer;">Agregar Nueva Transmisión</a></font></p>
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
        <a href="../Vista/Transmisiones.html" style="background-color: teal;color: white;padding: 5px;border-radius: 5px;cursor: pointer;">Agregar Nueva Transmisión</a>
    </center>
                        <form action="metodos.php" method="POST">
                            <input type="hidden" name="datos" value="<?php echo $datos[0] ?>"/>
                            <input type="hidden" name="accion" value="eliminar"/>
                            <br>
                            <input type="submit" value="Eliminar Transmisión"/>
                        </form>
                        <form action="Edita_transmision.php" method="POST">
                            <input type="hidden" name="d0" value="<?php echo $datos[0] ?>"/>
                            <input type="hidden" name="d1" value="<?php echo $datos[1] ?>"/>
                            <input type="hidden" name="d2" value="<?php echo $datos[2] ?>"/>
                            <input type="hidden" name="d3" value="<?php echo $datos[3] ?>"/>
                            <input type="hidden" name="d4" value="<?php echo $datos[4] ?>"/>
                            <input type="hidden" name="d5" value="<?php echo $datos[5] ?>"/>
                            <input type="hidden" name="d6" value="<?php echo $datos[6] ?>"/>
                            
                            <input type="submit" value="Editar Transmisión"/>
                        </form>
                        <Form action="../index.html" method="POST">
                                <input type="submit" value="Inicio">
                        </Form>

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
