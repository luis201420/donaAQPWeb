<?php

class CentroDonacionObjet
{
    private $con;

    function __construct(){

        require_once dirname(__FILE__).'/DbConnect.php';
        $db = new DbConnect();
        $this->con = $db->connect();

    }

    public function createCD($nombres, $direccion,$lat,$long,$repre){

        $sql = $this->con->prepare("INSERT INTO `CentroDonacion` (`nombreCentro` , `Direccion` , `Latitud` , `Longitud` , `Representante` ) VALUES (?,?,?,?,?);");
//        $repre=1;
        $sql->bind_param("ssddi",$nombres, $direccion,$lat,$long,$repre);

        if($sql->execute()){
            return 1;
        }
        else{
            return 2;
        }

    }

    public function getCentrosD(){
        $sql = $this->con->prepare("SELECT * FROM CentroDonacion INNER JOIN Persona ON CentroDonacion.Representante=Persona.idPersona;");
        $sql->bind_param("s",$codigo);
        $sql->execute();
        $result = $sql->get_result();

        $results=array();
        while ($row = $result->fetch_assoc()) {
            $results[]=$row;
        }
        return $results;

    }

    public function Update($nombre,$direccion,$id,$idrepre){
        if ($idrepre==-1){
            $sql = $this->con->prepare("UPDATE  `CentroDonacion` SET `nombreCentro`=? ,`Direccion`=? WHERE `idCentroDonacion`=?");
            $sql->bind_param("ssi",$nombre,$direccion,$id);

        }else
        {
            $sql = $this->con->prepare("UPDATE  `CentroDonacion` SET `nombreCentro`=? ,`Direccion`=? ,`Representante`=? WHERE `idCentroDonacion`=?");
            $sql->bind_param("ssii",$nombre,$direccion,$idrepre,$id);
        }

        if($sql->execute()){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function Delete($id){

            $sql = $this->con->prepare("DELETE FROM  CentroDonacion  WHERE `idCentroDonacion`=?");

            $sql->bind_param("i",$id);

            if($sql->execute()){
                return 1;
            }
            else{
                return 2;
            }
    }
}
?>