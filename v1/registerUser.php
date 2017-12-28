<?php

	require_once '../includes/DbOperations.php';
	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){

		if(
			isset($_POST['nombres']) and 
			isset($_POST['email']) and 
			isset($_POST['password']) and
			isset($_POST['edad']) and
			isset($_POST['apellidos']) and
			isset($_POST['genero']) and
			isset($_POST['tipoSangre']) and
			($_POST['nombres'] !="") and 
			($_POST['email']!="") and 
			($_POST['password']!="") and
			($_POST['edad']!="") and
			($_POST['apellidos']!="") and
			($_POST['genero']!="") and
			($_POST['tipoSangre']!="")
			){
			
			if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
				$response['error']=true;
				$response['message']="Email invalido";
			}

			elseif(!preg_match("/^[a-zA-Z]*$/", $_POST['nombres']) || !preg_match("/^[a-zA-Z]*$/", $_POST['apellidos'])){
				$response['error']=true;
				$response['message']="Nombres o apellidos invalidos";
			}

			elseif((0>=((int)$_POST['edad']) || ((int)$_POST['edad'])>70) || !preg_match("/^[0-9]*$/", $_POST['edad'])){
				$response['error']=true;
				$response['message']="Edad invalido";
			}

			//operate the data further
			else{
				$db = new DbOperation();
			
				$result = $db->createUser(($_POST['nombres']), ($_POST['email']) , ($_POST['password']),
											($_POST['edad']) ,($_POST['apellidos']),($_POST['genero']),($_POST['tipoSangre']));
				if($result == 1){
					$response['error']=false;
					$response['message']="Usuario registrado corectamente";
				}
				elseif($result == 2){
					$response['error']=true;
					$response['message']="Se predujo un error intentelo de nuevo";
				}
				elseif($result == 0){
					$response['error']=true;
					$response['message']="Usuario ya registrado, cambia de correo o nombre de usuario";	
				}
			}

		}
		else{
			$response['error']=true;
			$response['message']="Campos requeridos vacios o invalidos";
		}

	}else{
		$response['error'] = true;
		$response['message'] = "Peticion invalida";
	}

	echo json_encode($response);
?>