<?php
	class OperacionMensaje{
		private $con;

		function __construct(){

			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();

			$this->con = $db->connect();

		}

		public function crear($nombre, $email, $telefono, $mensaje){

			$stmt = $this->con->prepare("INSERT INTO `Mensaje` (`Nombre`,`Correo`, `Telefono`, `Mensaje`) VALUES (?, ?, ?, ?)");

			$stmt->bind_param("ssss",$nombre,$email,$telefono,$mensaje);
			
			if($stmt->execute()){
				return 1;
			}
			else{
				return 0;
			}
		}

	}
?>