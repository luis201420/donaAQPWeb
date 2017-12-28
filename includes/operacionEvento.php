<?php
	class OperacionEvento{
		private $con;

		function __construct(){

			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();

			$this->con = $db->connect();

		}

		public function sacarEventos(){

			$sql = $this->con->prepare("SELECT Titulo,Mensaje,nombreCentro,TipoSangre FROM (Eventos
INNER JOIN CentroDonacion ON Eventos.Autor = CentroDonacion.idCentroDonacion) where Fecha >= CURDATE();");

			$sql->execute();
			$result = $sql->get_result();

			$results=array();
			while ($row = $result->fetch_assoc()) {
        		$results[]=$row;
    		}

			return $results;
		}

		public function buscarCD($idRepresentante){
			$sql = $this->con->prepare("SELECT * from CentroDonacion where Representante = ?");
			$sql->bind_param("i",$idRepresentante);
			$sql->execute();

			$res=$sql->get_result()->fetch_assoc();
			return $res["idCentroDonacion"];
		}

		public function crearEvento($idRepresentante, $titulo,$mensaje,$fecha,$tipoSangre){

			$idCD = $this->buscarCD($idRepresentante);

			$stmt = $this->con->prepare("INSERT INTO `Eventos` (`Titulo`,`Autor`, `Mensaje`, `Fecha`, `TipoSangre`) VALUES (?,?,?,?,?)");

			$stmt->bind_param("sisss",$titulo,$idCD,$mensaje,$fecha,$tipoSangre);
			
			if($stmt->execute()){
				return 1;
			}
			else{
				return 0;
			}
		}

	}
?>