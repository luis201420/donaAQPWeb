<?php

class PersonaObjet
{
    private $con;

    function __construct(){

        require_once dirname(__FILE__).'/DbConnect.php';
        $db = new DbConnect();
        $this->con = $db->connect();

    }


    public function create($nombres, $apellidos, $TipoSangre , $Edad , $Genero , $Correo , $Permisos , $Password ){

        $sql = $this->con->prepare(" insert into Persona (Nombres , Apellidos , TipoSangre , Edad , Genero , Correo , Permisos , Password ) values(?,?,?,?,?,?,?,?);");
        $sql->bind_param("sssissis",$nombres, $apellidos, $TipoSangre , $Edad , $Genero , $Correo , $Permisos , $Password);

        if($sql->execute()){
            return 1;
        }
        else{
            return 2;
        }

    }

    public function Delete($id){

        $sql = $this->con->prepare("DELETE FROM  Persona  WHERE idPersona=?;");

        $sql->bind_param("i",$id);

        if($sql->execute()){
            return 1;
        }
        else{
            return 2;
        }
    }


    public function getPersona($correo){
        $sql = $this->con->prepare("SELECT * FROM Persona WHERE Correo = ? ");
        $sql->bind_param("s",$correo);
        $sql->execute();
        return $sql->get_result()->fetch_assoc();
    }

    public function getPersonas(){
        $sql = $this->con->prepare("SELECT * FROM Persona ;");
//            $sql = $this->con->prepare("SELECT * FROM Egresado INNER JOIN Carrera ON Egresado.idCarrera=Carrera.id");
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