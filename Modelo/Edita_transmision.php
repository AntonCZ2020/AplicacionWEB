
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <style>
            input, select, textarea {
                width: 70%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                margin: 3px;
                text-align: center;
            }

            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }

            input[type=submit] {
                background-color: red;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a019;
            }
        </style>
    <center>
        <h2>Modificar Contacto</h2>
        <form action="metodos.php" method="POST">
            <input type="hidden" name="id_transmision" value="<?php echo $_POST['d0']; ?>"/>
            <input type="hidden" name="nombre" value="<?php echo $_POST['d1']; ?>" placeholder="Inserta Nombre completo" required/><br>
            <input type="hidden" name="apellidos" value="<?php echo $_POST['d2']; ?>" placeholder="Inserta Apellidos" required/><br>
            <input type="text" name="tema" value="<?php echo $_POST['d3']; ?>" placeholder="tema" required/><br>
            <input type="date" name="fecha" value="<?php echo $_POST['d4']; ?>" placeholder="Inserta fecha" required/><br>
            <input type="time" name="hora" value="<?php echo $_POST['d5']; ?>" placeholder="Inserta hora" required/><br>
            <input type="text" name="montaje" value="<?php echo $_POST['d6']; ?>" placeholder="Inserta montaje" required/><br>
            <input type="hidden" name="accion" value="editar"/>
            <input type="submit" value="Actualizar Informaciòn de Transmisión"/>
        </form>
        <a href="Muestra_transmision.php">Volver</a>
    </center>
</body>
</html>