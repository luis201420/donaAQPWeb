<?php

require_once '../objets/EventoObjet.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(
        isset($_POST['titulo']) and
        isset($_POST['autor']) and
        isset($_POST['mensaje']) and
        isset($_POST['fecha']) and
        ($_POST['titulo']!="") and
        ($_POST['mensaje']!="") and
        ($_POST['fecha']!="") and
        ($_POST['autor']!="")
    ){


        //operate the data further
        $db = new EventoObjet();

        $result = $db->create(
            ($_POST['titulo']) ,
            ($_POST['autor']) ,
            ($_POST['mensaje']) ,
            ($_POST['fecha']));

        if($result == 1){
            $response['error']=false;
            $response['message']="Evento registrado corectamente";
        }
        elseif($result == 2){
            $response['error']=true;
            $response['message']="Se predujo un error intentelo de nuevo";
        }
        elseif($result == 0){
            $response['error']=true;
            $response['message']="Datos ya registrados";
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