<?php

require_once '../objets/PreguntaObject.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(
        isset($_POST['Pregunta']) and
        isset($_POST['Respuesta']) and
        ($_POST['Pregunta']!="") and
        ($_POST['Respuesta']!="")
    ){


        //operate the data further
        $db = new PreguntaObject();

        $result = $db->create(
            ($_POST['Pregunta']) ,
            ($_POST['Respuesta']));

        if($result == 1){
            $response['error']=false;
            $response['message']="Pregunta registrado corectamente";
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