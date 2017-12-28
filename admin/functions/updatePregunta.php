<?php

require_once '../objets/PreguntaObject.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(
        isset($_POST['id']) and
        isset($_POST['pregunta']) and
        isset($_POST['respuesta']) and
        ($_POST['id']!="") and
        ($_POST['pregunta']!="") and
        ($_POST['respuesta']!="")
    ){


        $db = new PreguntaObject();

        $result = $db->Update(($_POST['id']),($_POST['pregunta']), ($_POST['respuesta']));

        if($result == 1){
            $response['error']=false;
            $response['message']="Centro de Donacion actualizada corectamente";
        }
        elseif($result == 2){
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