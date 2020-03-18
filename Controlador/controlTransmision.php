<?php 
    include_once "../Modelo/conexion.php";
   
    require "../Modelo/Trans.php";

    $tema=$_POST['tema'];
    $montaje=$_POST['montaje'];
    $fecha=$_POST['fecha'];
    $hora=$_POST['hora'];
    session_start();
    ob_start();
    //echo $_SESSION['id_persona'];
    $id_persona = $_SESSION['id_persona'];
   
    /*$sql="SELECT `e_mail` FROM personas WHERE`e_mail`='$correo'";
    $result = mysqli_query($conn, $sql);*/

  
    $trans = new Transmision($id_persona, $tema, $fecha, $hora, $montaje);
    
       
    $trans->agregarTransmision();

    //echo "Registro Exitoso <br>";
    //echo "<a href=../Modelo/Muestra_transmision.php>Volver </a>";
    header("Location: ../Modelo/Muestra_transmision.php");
    
?>