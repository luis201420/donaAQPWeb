<?php

	require_once '../includes/operacionEvento.php';
	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$db = new OperacionEvento();

		$data = $db->sacarEventos();
		$response['error']=false;
		$response["Cantidad"]=count($data);
		for($i=0;$i<count($data);$i++){
			$response[(string)($i+1)]=$data[$i];
		}
	}else{
		$response['error'] = true;
		$response['message'] = "Peticion invalida";
	}

echo json_encode($response);

?>