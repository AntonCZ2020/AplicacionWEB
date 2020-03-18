<?php
     include "../Modelo/Persona.php";
     include "../Modelo/conexion.php";
    $correo = $_POST['email'];
    $clave=sha1($_POST['password']);
    //$listaPersonas = array();
   
    
    $sql="SELECT `password`, `id_persona`  FROM personas WHERE`e_mail`='$correo';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $cla=$row['password'];
        $idp=$row['id_persona'];
        if ($cla == $clave)
        {   
            session_start();
            ob_start();
            $_SESSION['id_persona'] = $idp;

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $correo;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (60 * 15);
    
            
            //echo "Bienvenido a la pagina privada <br>";
            //echo "<a href=../Modelo/Muestra_transmision.php>Registrar Transmisión</a>";
            header("Location: ../Modelo/Muestra_transmision.php");

        }
        else
        {

            echo "No es usuario o pasword valido <br>";
            echo "<a href=../index.html>Volver al inicio</a>";

        }
    }    
    else
    {

        echo "No es usuario o pasword valido <br>";
        echo "<a href=../index.html>Volver al inicio</a>";

    }
?>