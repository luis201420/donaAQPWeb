<?php

require_once '../objets/PersonaObjet.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(
        isset($_POST['nombres']) and
        isset($_POST['apellidos']) and
        isset($_POST['tipo']) and
        isset($_POST['edad']) and
        isset($_POST['genero']) and
        isset($_POST['correo']) and
        isset($_POST['permisos']) and
        isset($_POST['pass']) and
        ($_POST['nombres']!="") and
        ($_POST['apellidos']!="") and
        ($_POST['tipo']!="") and
        ($_POST['edad']!="") and
        ($_POST['genero']!="") and
        ($_POST['correo']!="") and
        ($_POST['permisos']!="") and
        ($_POST['pass']!="")
    ){

        if(!filter_var($_POST['correo'],FILTER_VALIDATE_EMAIL)){
            $response['error']=true;
            $response['message']="Email invalido";
        }
        else{
        //operate the data further
        $db = new PersonaObjet();
        $pass=md5($_POST['pass']);
        $result = $db->create(
            ($_POST['nombres']),
            ($_POST['apellidos']),
            ($_POST['tipo']),
            ($_POST['edad']),
            ($_POST['genero']),
            ($_POST['correo']),
            ($_POST['permisos']),
            $pass
             );

        if($result == 1){
            $response['error']=false;
            $response['message']="Personsa registrada corectamente";
        }
        elseif($result == 2){
            $response['error']=true;
            $response['message']="Se predujo un error intentelo de nuevo".($_POST['nombres']).
                ($_POST['apellidos']).
                ($_POST['tipo']).
                ($_POST['edad']).
                ($_POST['genero']).
                ($_POST['correo']).
                ($_POST['permisos']).
                $pass;
        }
        elseif($result == 0){
            $response['error']=true;
            $response['message']="Datos ya registrados";
        }
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