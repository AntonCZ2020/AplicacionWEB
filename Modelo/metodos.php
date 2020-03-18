<?php

require 'conexion.php';
$i = $_POST['accion'];
switch ($i) {
    
    case "editar": {
            $sql = "UPDATE `transmisiones` SET `tema`='" . $_POST['tema'] . "',`fecha`='" . $_POST['fecha'] . "',`hora`='" . $_POST['hora'] . "',`montaje`='" . $_POST['montaje'] . "' WHERE `id_transmision` = " . $_POST['id_transmision'] . "";
        }
        break;
    case "eliminar": {
            $sql = "DELETE FROM `transmisiones` WHERE `id_transmision` = " . $_POST['datos'] . "";
            echo $_POST['datos'];
        }
        break;
}
mysqli_query($conn, $sql);
/*if(mysqli_query($conn, $sql)){
    echo  "     se realizo";
    echo $_POST['accion'];

}
else
    echo "           No se realizo";
    echo $_POST['accion'];

echo "<a href='Muestra_transmision.php' style='background-color: teal;color: white;padding: 5px;border-radius: 5px;cursor: pointer;'>Regresar</a>" */
header("Location: Muestra_transmision.php");
?>