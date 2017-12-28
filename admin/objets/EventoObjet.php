<?php
/**
 * Created by PhpStorm.
 * User: edson
 * Date: 25/12/17
 * Time: 08:38 AM
 */

class EventoObjet
{
    private $con;

    function __construct(){

        require_once dirname(__FILE__).'/DbConnect.php';
        $db = new DbConnect();
        $this->con = $db->connect();

    }
    public function create($Titulo, $Autor, $Mensaje, $Fecha){

        $sql = $this->con->prepare("INSERT INTO Eventos (Titulo, Autor, Mensaje, Fecha) VALUE (?,?,?,?);");
        $sql->bind_param("siss",$Titulo, $Autor, $Mensaje, $Fecha);

        if($sql->execute()){
            return 1;
        }
        else{
            return 2;
        }

    }
    public function getEventos(){
        $sql = $this->con->prepare("SELECT * FROM Eventos INNER JOIN CentroDonacion ON Eventos.Autor = CentroDonacion.idCentroDonacion;");
        $sql->bind_param("s",$codigo);
        $sql->execute();
        $result = $sql->get_result();

        $results=array();
        while ($row = $result->fetch_assoc()) {
            $results[]=$row;
        }
        return $results;

    }

}