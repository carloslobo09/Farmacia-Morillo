<?Php

class conexion{

    private $servername ;
    private $username ;
    private $password;
    private $dbname;
   

    public function __construct(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "rootroot"; 
        $this->dbname = "farmacia";
        
    }
    
    public function getservername(){
        return $this->servername;
    }
    
    public function getusername(){
        return $this->username;
    }
    
    public function getpassword(){
        return $this->password;
    }
    
    public function getdbname(){
        return $this->dbname;
    }
    

    

    // public function conectar($conn){
    // $conn= new mysqli($servername, $username, $password);

    // if ($conn->connect_error){
    //     die("Fallo de la conexion: ".$conn->connect_error);
    // }
    // echo "Conexion exitosa";
    
    // $conn->close();
   
    // }
}

?>