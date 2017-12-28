<?php

	require_once '../includes/DbOperations.php';
	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){

		if(
			isset($_POST['id']) and 
			isset($_POST['nombres']) and 
			isset($_POST['apellidos']) and
			isset($_POST['pass']) and
			($_POST['id'] !="") and 
			($_POST['nombres']!="") and 
			($_POST['apellidos']!="") and
			($_POST['pass']!="")
			){

			$db = new DbOperation();
			$result = $db->editar(($_POST['id']), ($_POST['nombres']) , ($_POST['apellidos']),
										($_POST['pass']));
			if($result == 1){
				$response['error']=false;
				$response['message']="Datos editados";
			}
			else{
				$response['error']=true;
				$response['message']="Se predujo un error intentelo de nuevo";
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