<?php 
    include "../Modelo/Persona.php";
    include "../Modelo/conexion.php";
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
    $clave=sha1($_POST['clave']);
    $listaPersonas = array();
   
    $sql="SELECT `e_mail` FROM personas WHERE`e_mail`='$correo';";
    $result = mysqli_query($conn, $sql);

  
    $persona = new Persona($nombres, $apellidos, $correo, $clave);
    if(mysqli_num_rows($result)>0){
        print("El correo ya existe <br>");
        echo"<a href=../index.html>Volver al inicio para abrir sesion</a>";
    }
    else{
       
        $persona->agregarPersona();

        echo "Registro Exitoso <br>";
        echo "<a href=../index.html>Volver al inicio para abrir sesion</a>";
    }
?>