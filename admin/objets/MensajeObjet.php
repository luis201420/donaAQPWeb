<?php

class MensajeObjet
{
    private $con;

    function __construct(){

        require_once dirname(__FILE__).'/DbConnect.php';
        $db = new DbConnect();
        $this->con = $db->connect();

    }

    public function getMensajes(){
        $sql = $this->con->prepare("SELECT * FROM Mensaje ;");
//      $sql->bind_param("s",$codigo);
        $sql->execute();
        $result = $sql->get_result();

        $results=array();
        while ($row = $result->fetch_assoc()) {
            $results[]=$row;
        }
        return $results;

    }
}