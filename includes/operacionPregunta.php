<?php
	class OperacionPregunta{
		private $con;

		function __construct(){

			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();

			$this->con = $db->connect();

		}

		public function sacarPreguntas(){

			$sql = $this->con->prepare("SELECT idPregunta,Titulo FROM Pregunta;");

			$sql->execute();
			$result = $sql->get_result();

			$results=array();
			while ($row = $result->fetch_assoc()) {
        		$results[]=$row;
    		}

			return $results;
		}

		public function darRespuesta( $id ){

			$sql = $this->con->prepare("SELECT Titulo,Respuesta FROM Pregunta WHERE idPregunta=  ?;");

			$sql->bind_param("i",$id);
			$sql->execute();
			return $sql->get_result()->fetch_assoc();
		}

	}
?>