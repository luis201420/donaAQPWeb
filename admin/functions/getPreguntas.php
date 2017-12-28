<?php

require_once '../objets/PreguntaObject.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $db = new PreguntaObject();

    $data = $db->getPreguntas();
    $response[0]=count($data);
    for($i=0;$i<count($data);$i++){
        $response[$i+1]=$data[$i];
    }
}else{
    $response['error'] = true;
    $response['message'] = "Peticion invalida";
}

echo json_encode($response);

?>