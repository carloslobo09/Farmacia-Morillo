<?php
header("Content-Type: text/html;charset=utf-8");
include "conexion.php";
class insumos
{
    private $id_pre;
    private $nombre;
    private $stocki;
    private $stockf;
    private $csl;
    private $clearr;
    private $ue;
    private $clears;
    private $noapt;
    private $otras;
    private $consumom;


    function __construct($id_pre, $nombre, $stocki, $stockf, $csl, $clearr, $ue, $clears, $noapt, $otras, $consumom)
    {
        $this->id_pre = $id_pre;
        $this->nombre = $nombre;
        $this->stocki = $stocki;
        $this->stockf = $stockf;
        $this->csl = $csl;
        $this->clearr = $clearr;
        $this->ue = $ue;
        $this->clears = $clears;
        $this->noapt = $noapt;
        $this->otras = $otras;
        $this->consumom = $consumom;
        $this->conexion = new conexion();
    }

    public function setid_pre($id_pre)
    {
        $this->id_pre = $id_pre;
    }
    public function getid_pre()
    {
        return $this->id_pre;
    }
    public function setnombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getnombre()
    {
        return $this->nombre;
    }
    public function setstocki($stocki)
    {
        $this->stocki = $stocki;
    }
    public function getstocki()
    {
        return $this->stocki;
    }
    public function setstockf($stockf)
    {
        $this->stockf = $stockf;
    }
    public function getstockf()
    {
        return $this->stockf;
    }
    public function setcsl($csl)
    {
        $this->csl = $csl;
    }
    public function getcsl()
    {
        return $this->csl;
    }
    public function setclearr($clearr)
    {
        $this->clearr = $clearr;
    }
    public function getclearr()
    {
        return $this->clearr;
    }
    public function setus($ue)
    {
        $this->ue = $ue;
    }
    public function getue()
    {
        return $this->ue;
    }
    public function setclears($clears)
    {
        $this->clears = $clears;
    }
    public function getclears()
    {
        return $this->clears;
    }
    public function setnoapt($noapt)
    {
        $this->noapt = $noapt;
    }
    public function getnoapt()
    {
        return $this->noapt;
    }
    public function setotras($otras)
    {
        $this->otras = $otras;
    }
    public function getotras()
    {
        return $this->otras;
    }
    public function setconsumom($consumom)
    {
        $this->consumom = $consumom;
    }
    public function getconsumom()
    {
        return $this->consumom;
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
        $sql = "USE contralador";
        $sql = "CREATE TABLE insumos(
                id_ins integer auto_increment,
                id_pre integer,
                nombre varchar(200),
                stocki bigint(100),
                stockf bigint(100),
                csl bigint(100),
                clearr bigint (100),
                ue bigint (100),
                clears bigint (100),
                noapt bigint (100),
                otras bigint (100),
                consumom bigint(100),
                primary key(id_ins),
                FOREIGN KEY (id_pre) REFERENCES presentacion (id_pre));";

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
            $sql = "INSERT INTO insumos(id_pre,nombre,stocki,stockf,csl,clearr,ue,clears,noapt,otras,consumom) VALUES 
                        ('" . $this->id_pre . "'
                        ,'" . $this->nombre . "'
                        ,'" . $this->stocki . "'
                        ,'" . $this->stockf . "'
                        ,'" . $this->csl . "'
                        ,'" . $this->clearr . "'
                        ,'" . $this->ue . "'
                        ,'" . $this->clears . "'
                        ,'" . $this->noapt . "'
                        ,'" . $this->otras . "'
                        ,'" . $this->consumom . "')";
            if ($conn->query($sql) === TRUE) {
                return  " ";
            } else {
                return "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
    }
    public function getbyId($id_ins)
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = "SELECT * FROM insumos where id_ins=" . $id_ins;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->id_pre = $row["id_pre"];
                $this->nombre = $row["nombre"];
                $this->stocki = $row["stocki"];
                $this->stockf = $row["stockf"];
                $this->csl = $row["csl"];
                $this->clearr = $row["clearr"];
                $this->ue = $row["ue"];
                $this->clears = $row["clears"];
                $this->noapt = $row["noapt"];
                $this->otras = $row["otras"];
                $this->consumom = $row["consumom"];
            }
        }
        $conn->close();
    }
    public function borrar($id_ins)
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $sql = " DELETE FROM insumos WHERE id_ins = $id_ins ";
        $conn->query($sql);
        $conn->close();
    }

    public function modificar($id_ins)
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = "UPDATE insumos SET id_pre='" . $this->id_pre . "'
        , nombre='" . $this->nombre . "'
        , stocki='" . $this->stocki . "'
        , stockf='" . $this->stockf . "'
        , csl='" . $this->csl . "'
        , clearr='" . $this->clearr . "'
        , ue='" . $this->ue . "'
        , clears='" . $this->clears . "'
        , noapt='" . $this->noapt . "'
        , otras='" . $this->otras . "'
        , consumom='" . $this->consumom . "'
         WHERE  id_ins=" . $id_ins;
        $conn->query($sql);

        $conn->close();
    }
    public function unidadesentregadas($id_ins, $unide)
    {
        $suma = $this->ue + $unide;
        $resto = $this->stockf - $unide;
        if ($resto < 0) {
            $resto = 0;
        }
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = "UPDATE insumos SET  ue='" . $suma . "'
        , stockf='" . $resto . "'
         WHERE  id_ins=" . $id_ins;
        $conn->query($sql);

        $conn->close();
    }
    public function agregar($id_ins, $cslentr, $cl)
    {
        $suma1 = $this->csl + $cslentr;
        $suma2 = $this->clearr + $cl;
        $sumatot = $cslentr + $cl;
        $stockfinal = $this->stockf + $sumatot;
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = "UPDATE insumos SET  csl='" . $suma1 . "'
        , clearr='" . $suma2 . "'
        , stockf='" . $stockfinal . "'
         WHERE  id_ins=" . $id_ins;
        $conn->query($sql);

        $conn->close();
    }
    public function restar($id_ins, $cls, $na, $otr)
    {
        $suma1 = $this->clears + $cls;
        $suma2 = $this->noapt + $na;
        $suma3 = $this->otras + $otr;
        $sumatot = $cls + $na + $otr;
        $stockfinal = $this->stockf - $sumatot;
        if ($stockfinal < 0) {
            $stockfinal = 0;
        }
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = "UPDATE insumos SET  clears='" . $suma1 . "'
        , noapt='" . $suma2 . "'
        , otras='" . $suma3 . "'
        , stockf='" . $stockfinal . "'
         WHERE  id_ins=" . $id_ins;
        $conn->query($sql);

        $conn->close();
    }
    public function resetearmes()
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = "UPDATE insumos SET  stocki=stockf
        , csl=0
        , clearr=0
        , ue=0
        , clears=0
        , noapt=0
        , otras=0
        ";
        $conn->query($sql);

        $conn->close();
    }
    public function ue($id_ins,$unide)
    {
        $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
        $conn->set_charset("utf8");
        $sql = "INSERT INTO ue(id_ins,unide,fecha) VALUES 
            ('" . $id_ins . "', '" . $unide . "' , NOW());";
        $conn->query($sql);
        $conn->close();
    }
}
