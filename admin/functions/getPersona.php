<?php

require_once '../objets/PersonaObjet.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(
        isset($_POST['correo']) and
        ($_POST['correo']!="")
    ){


        $db = new PersonaObjet();

        $data = $db->getPersona($_POST['correo']);
        if ($data!=null){
            $data['error']=false;
            echo json_encode($data);
        }
        else {
            $data=array();
            $data['error']=true;
            $data['message']="no hay coincidencias";
            echo json_encode($data);

        }

    }
    else{
        $response['error']=true;
        $response['message']="Campos requeridos vacios";
        echo json_encode($response);
    }

}else{
    $response['error'] = true;
    $response['message'] = "Peticion invalida";
    echo json_encode($response);
}


?>