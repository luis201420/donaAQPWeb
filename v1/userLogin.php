<?php

	require_once '../includes/DbOperations.php';
	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['email']) and isset($_POST['password'])){
			$db = new DbOperation();

			if($db->userLogin($_POST['email'],$_POST['password'])){
				$data = $db->getUserByEmail($_POST['email']);
				$response['error'] = false;
				$response['id'] = $data['idPersona'];
				$response['Correo'] = $data['Correo'];
				$response['Nombres'] = $data['Nombres'];
				$response['Apellidos'] = $data['Apellidos'];
				$response['Edad'] = $data['Edad'];
				$response['Genero'] = $data['Genero'];
				$response['Permisos'] = $data['Permisos'];
				$response['TipoSangre'] = $data['TipoSangre'];
			}else{
				$response['error']=true;
				$response['message']="Invalid username or password";	
			}

		}else{
			$response['error']=true;
			$response['message']="Required fields are missing";
		}
	}

	echo json_encode($response);

?>