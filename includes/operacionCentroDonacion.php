<?php
	class OperacionCentroDonacion{
		private $con;

		function __construct(){

			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();

			$this->con = $db->connect();

		}

		public function sacarCD(){

			$sql = $this->con->prepare("SELECT nombreCentro,Direccion,Latitud,Longitud FROM CentroDonacion;");

			$sql->execute();
			$result = $sql->get_result();

			$results=array();
			while ($row = $result->fetch_assoc()) {
        		$results[]=$row;
    		}

			return $results;
		}

	}
?>