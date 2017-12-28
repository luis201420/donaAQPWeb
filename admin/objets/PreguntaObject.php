<?php

class PreguntaObject
{
    private $con;

    function __construct(){

        require_once dirname(__FILE__).'/DbConnect.php';
        $db = new DbConnect();
        $this->con = $db->connect();

    }
    public function create($Pregunta, $Respuesta){

        $sql = $this->con->prepare("INSERT INTO Pregunta ( Titulo, Respuesta) VALUES (?,?);");
        $sql->bind_param("ss",$Pregunta, $Respuesta);

        if($sql->execute()){
            return 1;
        }
        else{
            return 2;
        }

    }
    public function Delete($id){

        $sql = $this->con->prepare("DELETE FROM  Pregunta  WHERE `idPregunta`=?");

        $sql->bind_param("i",$id);

        if($sql->execute()){
            return 1;
        }
        else{
            return 2;
        }
    }
    public function Update($id,$Pregunta,$Respuesta){

        $sql = $this->con->prepare("UPDATE Pregunta SET Titulo=?,Respuesta=? WHERE idPregunta=?");
        $sql->bind_param("ssi",$Pregunta,$Respuesta,$id);

        if($sql->execute()){
        return 1;
        }
        else{
            return 0;
        }
    }
    public function getPreguntas(){
        $sql = $this->con->prepare("SELECT * FROM Pregunta ;");

        $sql->execute();
        $result = $sql->get_result();

        $results=array();
        while ($row = $result->fetch_assoc()) {
            $results[]=$row;
        }
        return $results;

    }

}