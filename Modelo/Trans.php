<?php

class Transmision{    
    private $id_persona;
    private $tema;
    private $fecha;
    private $hora;
    private $montaje;

    

    public function __construct($id_persona=null, $tema=null, $fecha=null, $hora=null, $montaje=null){

        $this->id_persona=$id_persona;
        $this->tema=$tema;
        $this->fecha=$fecha;
        $this->hora=$hora;
        $this->montaje=$montaje;
    }

    public function getIdPersona(){
        return id_persona;
    }

    public function getTema(){
        return $this->tema;
    }

    public function getfecha(){
        return $this->fecha;
    }

    public function getHora(){
        return $this->hora;
    }

    public function getMontaje(){
        return $this->montaje;
        
    }
    /*public function checaCorreo(){
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


    	
    }*/

    public function agregarTransmision(){
       
        include "../Modelo/conexion.php";
        $id_per =  $this->id_persona;
        $tem =$this->tema;
        $fech =$this->fecha;
        $hor =$this->hora;
        $mon =$this->montaje;
 
        //$sql = "INSERT INTO `transmisiones` (`id_persona`, `tema`, `fecha`, `hora`, `motaje`) VALUES ($id_per, '$tem', '$fech', '$hor', '$mon');";
        $sql = "INSERT INTO `transmisiones` ( `id_persona`, `tema`, `fecha`, `hora`, `montaje`) VALUES ($id_per, '$tem', '$fech', '$hor', '$mon');";
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