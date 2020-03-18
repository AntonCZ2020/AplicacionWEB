<?php

class Persona{    
    private $nombres;
    private $apellidos;
    private $email;
    private $password;
    

    public function __construct($nombres=null, $apellidos=null, $email=null, $password=null){

        
        $this->nombres=$nombres;
        $this->apellidos=$apellidos;
        $this->email=$email;
        $this->password=$password;
    }

 

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }
    public function checaCorreo(){
        //include "../Modelo/conexion.php";
        $conn=mysqli_connect("localhost", "dba_radio", "Unir_rad10","radio_unir");
	        if (mysqli_connect_errno()) {
		        die("No se puede conectar a la base de datos:" . mysqli_connect_error());
	        }else{
		
		            echo "conexion exitosa";
	        }
        $eml = $this->getEmail();
        $sql="SELECT `e_mail` FROM personas WHERE `e_mail` = '$eml'";
        $result = msqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            return true;
        }else{
            return false;
        }


    	
    }

    public function agregarPersona(){
       
        include "../Modelo/conexion.php";
        $nom = $this->getNombres();
        $ape = $this->getApellidos();
        $eml = $this->getEmail();
        $pwd = $this->getPassword();
        echo " $nom, $ape, $eml, $pwd";
        $sql = "INSERT INTO `personas` ( `nombre`, `apellidos`, `e_mail`, `password`) VALUES ('$nom', '$ape', '$eml', '$pwd');";
        
        //$resultado= $conn->query($sql);
        if(mysqli_query($conn, $sql)) {

            echo"Datos ingresados";
        }
        else{
            echo "no se ingresaron datos".$sql."<br>";
            mysqli_error($conn);
        }

        mysqli_close($conn);


    }

   
}
?>