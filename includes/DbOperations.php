<?php
	class DbOperation{
		private $con;

		function __construct(){

			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();

			$this->con = $db->connect();

		}

		public function countUser(){
			$stmt = $this->con->prepare("SELECT idPersona FROM Persona");
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows;
		}

		/* CRUD -> C -> create */
		public function createUser($nombres, $email, $pass, $edad, $apellidos, $genero,$tipoSangre){

			if($this->isUserExist($email)){
				return 0;
			}else{
				$password = md5($pass);
				$permisos = '1';
				$id=($this->countUser())+1;

				$stmt = $this->con->prepare("INSERT INTO `Persona` (`idPersona`,`Nombres`, `Apellidos`, `Edad`, `Genero`, `Correo`, `Permisos`, `Password`,`TipoSangre`) VALUES (?, ?, ?, ?, ?, ? ,? ,?,?)");

				$stmt->bind_param("issssssss",$id,$nombres,$apellidos,$edad,$genero,$email,$permisos,$password,$tipoSangre);
				
				if($stmt->execute()){
					return 1;
				}
				else{
					return 2;
				}
			}
		}

		public function userLogin($email,$pass){
			$password = md5($pass);
			$stmt = $this->con->prepare("SELECT idPersona FROM Persona WHERE Correo = ? AND Password = ? ");
			$stmt->bind_param("ss",$email,$password);
			$stmt->execute();
			$stmt->store_result();

			return $stmt->num_rows > 0;
		}

		public function getUserByEmail($email){
			$stmt = $this->con->prepare("SELECT * FROM Persona WHERE Correo = ? ");
			$stmt->bind_param("s",$email);
			$stmt->execute();
			return $stmt->get_result()->fetch_assoc();
		}

		private function isUserExist($email){

			$stmt = $this->con->prepare("SELECT idPersona FROM Persona WHERE Correo=?");
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt->store_result();

			return $stmt->num_rows > 0;
		}

		public function editar($id,$nombres,$apellidos,$pass){
			$password = md5($pass);

			$sql = $this->con->prepare("UPDATE Persona set Nombres=?,Apellidos=?,Password=? where idPersona=?");
			$sql->bind_param("sssi",$nombres,$apellidos,$password,$id);
			
			if($sql->execute()){
				return 1;
			}
			else{
				return 2;
			}
		}


	}
?>