<?php

require_once '../objets/CentroDonacionObjet.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(
        isset($_POST['nombres']) and
        isset($_POST['direccion']) and
        isset($_POST['lat']) and
        isset($_POST['long']) and
        isset($_POST['repre']) and
        ($_POST['nombres']!="") and
        ($_POST['direccion']!="") and
        ($_POST['lat']!="") and
        ($_POST['long']!="") and
        ($_POST['repre']!="")
    ){


        //operate the data further
            $db = new CentroDonacionObjet();

            $result = $db->createCD(
                ($_POST['nombres']) ,
                ($_POST['direccion']) ,
                ($_POST['lat']) ,
//                ($_POST['long']));
                ($_POST['long']) , ($_POST['repre']) );

            if($result == 1){
                $response['error']=false;
                $response['message']="Centro de Donacion registrado corectamente";
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