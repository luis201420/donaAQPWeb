<?php

require_once '../objets/CentroDonacionObjet.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(
        isset($_POST['id']) and
        isset($_POST['nombre']) and
        isset($_POST['direccion']) and
        isset($_POST['idrepre']) and
        ($_POST['id']!="") and
        ($_POST['nombre']!="") and
        ($_POST['direccion']!="") and
        ($_POST['idrepre']!="")
    ){


            $db = new CentroDonacionObjet();

            $result = $db->Update(($_POST['nombre']),($_POST['direccion']), ($_POST['id']), ($_POST['idrepre']));

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