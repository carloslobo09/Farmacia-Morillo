<?php
header("Content-Type: text/html;charset=utf-8");
include "conexion.php";
class presentacion
{
    private $nombre;

    function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->conexion = new conexion();
    }

    public function setnombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getnombre()
    {
        return $this->nombre;
    }

    public function conectar()
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword());
        $conn->set_charset("utf8");
        if ($conn->connect_error) {
            echo "Fallo la conexion: " . $conn->connect_error;
        } else {


            echo "Conectado </br>";
        }
        $sql = "CREATE DATABASE farmacia;";
        if (mysqli_query($conn, $sql)) {
            echo "la base de datos se creo correctamente </br>";
        } else {
            echo "ya existe: " . mysqli_error($conn) . "</br>";
        }
    }
    public function creartb()
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = "USE farmacia";
        $sql = "CREATE TABLE presentacion(
                id_pre integer auto_increment,
                nombre varchar(60) ,
                primary key(id_pre));";

        if ($conn->query($sql) === TRUE) {
            echo "se creo correctamente la tabla </br>";
        } else {
            echo "error al crear tabla: " . $conn->error;
        }
    }

    public function guardar()
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $sql = "INSERT INTO presentacion(nombre) VALUES 
                        ('" . $this->nombre . "')";
            if ($conn->query($sql) === TRUE) {
                return  " ";
            } else {
                return "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
    }
    public function getbyId($id_pre)
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = "SELECT id_pre,nombre FROM presentacion where id_pre=" . $id_pre;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->id_pre = $row["id_pre"];
                $this->nombre = $row["nombre"];
            }
        }
        $conn->close();
    }
    public function borrar($id_pre)
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = " DELETE FROM presentacion WHERE id_pre = $id_pre ";
        $conn->query($sql);
        $conn->close();
    }

    public function modificar($id_pre)
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = "UPDATE presentacion SET nombre='" . $this->nombre . "' WHERE  id_pre=" . $id_pre;
        $conn->query($sql);

        $conn->close();
    }
}
