<?php

require_once '../objets/CentroDonacionObjet.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(
        isset($_POST['id']) and
        ($_POST['id']!="")
    ){

        //operate the data further
        $db = new CentroDonacionObjet();

        $result = $db->Delete($_POST['id']);

        if($result == 1){
            $response['error']=false;
            $response['message']="Ha Eliminado Este Centro de Donacion del Registro Correctamente";
        }
        elseif($result == 2){
            $response['error']=true;
            $response['message']="Se predujo un error intentelo de nuevo";
        }
        elseif($result == 3){
            $response['error']=true;
            $response['message']="no existe el dni";
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