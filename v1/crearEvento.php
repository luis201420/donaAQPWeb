<?php

	require_once '../includes/operacionEvento.php';
	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){

		if(
			isset($_POST['idRepresentante']) and 
			isset($_POST['titulo']) and 
			isset($_POST['mensaje']) and
			isset($_POST['tipoSangre']) and
			isset($_POST['fecha']) and
			($_POST['idRepresentante'] !="") and 
			($_POST['titulo']!="") and 
			($_POST['mensaje']!="") and
			($_POST['tipoSangre']!="") and
			($_POST['fecha']!="")
			){

			$db = new OperacionEvento();
			$result = $db->crearEvento(($_POST['idRepresentante']), ($_POST['titulo']) , ($_POST['mensaje']),
										($_POST['fecha']) ,($_POST['tipoSangre']));
			if($result == 1){
				$response['error']=false;
				$response['message']="Evento creado";
			}
			else{
				$response['error']=true;
				$response['message']="Se predujo un error intentelo de nuevo";
			}

		}
		else{
			$response['error']=true;
			$response['message']="Campos requeridos vacios";
		}

	}else{
		$response['error'] = true;
		$response['message'] = "Peticion invalida";
	}

	echo json_encode($response);
?>