<?php

	require_once "../../include/operacionMensaje.php";

	$response = array();

	if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['message']) && isset($_POST['phone']) &&
	  ($_POST['email']!="") && ($_POST['name']!="") && ($_POST['message']!="") && ($_POST['phone']!="") ){
		
		$db = new OperacionMensaje();

		$result = $db->createUser($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['message']);
		if($result==1){
			$response["error"] = false;
		}
		else{
			$response["error"] = true;
			$response["mensaje"] = "Ocurrio un error, intentelo mas tarde";
		}
	}
	else{
		$response["error"] = true;
		$response["mensaje"] = "Campos requeridos no validos";
	}

?>