<?php

	require_once '../includes/operacionPregunta.php';
	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){

		if($_POST['codigo']!="" and isset($_POST['codigo'])){		
			$db = new OperacionPregunta();

			$data = $db->darRespuesta($_POST['codigo']);
			$response = $data;
		}
		else{
			$response['error'] = true;
			$response['message'] = "Datos invalidos";
		}
	}else{
		$response['error'] = true;
		$response['message'] = "Peticion invalida";
	}

echo json_encode($response);

?>