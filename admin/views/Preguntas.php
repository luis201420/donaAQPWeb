<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>DonarAQP-Administration</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../resources/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="../resources/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../resources/css/style.css" rel="stylesheet" />

    <script src="../resources/js/html5shiv.js"></script>
    <script src="../resources/js/respond.min.js"></script>

</head>
<body onload="load_Preguntas()">
<header>

</header>
<!-- HEADER END-->
<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">

        <div class="left-div">
            <div class="user-settings-wrapper">
                <ul class="nav">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <span class="glyphicon glyphicon-tint" style="font-size: 25px;"></span>
                        </a>
                    </li>
                    <li style="color: white; margin-left: 10px">

                        <h1><b> Donar AQP</b></h1 >
                    </li>


                </ul>
            </div>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                require_once "navigator.php";
                ?>
            </div>

        </div>
    </div>
</section>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" id="alert_success" style="display: none">
                    <b>Exito!</b><span id="success_message"></span>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="row">
                <div class="container ">
                    <div class="panel panel-danger">
                        <div class="panel-heading "><h2>Preguntas Frecuentes</h2>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalAdd">agregar pregunta</button>
                        </div>
                        <div class="panel-body" id="Mensajes">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<div class="modal  fade " id="modalupdate" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="modalAddLabel">Actualizar Pregunta</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal" id="formulariocentroDonacion" style="width: 90%;">
                    <div class="form-group">
                        <label class="control-label col-sm-3">ID:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control col-sm-12" id="upid" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Pregunta:</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control col-sm-12" id="uppregunta"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Respuesta:</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control col-sm-12" id="uprespuesta"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btnupdate"  class="btn btn-primary">Guardar Pregunta</button>
            </div>
        </div>
    </div>
</div>
<div class="modal  fade " id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="modalAddLabel">Nueva Pregunta</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal" id="formulariocentroDonacion" style="width: 90%;">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Pregunta:</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control col-sm-12" id="addpregunta"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Respuesta:</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control col-sm-12" id="addrespuesta"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btncrear" onclick="create()" class="btn btn-primary">Guardar Pregunta</button>
            </div>
        </div>
    </div>
</div>
<div id="modaleliminar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-m">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Eliminar Perfil</h3>
            </div>
            <div class="modal-body " style="height:200px;">
                <div class="col-md-4 col-lg-4 " align="center"> <img alt="foto egresado" src="../resources/img/warning.jpeg" class=" img-responsive"> </div>
                <div class="col-md-8 col-lg-8 " align="center"> <h3 class="title "> <p><b>TEN CUIDADO!!</b></p> Esta Seguro que quieres eliminar la pregunta? </h3> </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="Eliminar">Eliminar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>

    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &copy; 2017 donarAQP |  <a ></a>
            </div>

        </div>
    </div>
</footer>
<!-- FOOTER SECTION END-->
<!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY SCRIPTS -->
<script src="../resources/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="../resources/js/bootstrap.js"></script>

<script>
    function load_Preguntas(){
        $.ajax({
            type        : 'POST',
            url         : '../functions/getPreguntas.php',
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                for (var i = 1; i <= data[0]; i++) {
                    $("#Mensajes").append(
                        //'<div class="panel panel-default "><div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#preguntas" data-target="#question'+data[i]["id"]+'"><h4 class="panel-title"><a href="#" class="ing" onclick="mostrarComentarios('+data[i]["id"]+')"><b>'+data[i]["Nombres"]+" "+data[i]["Apellidos"]+"</b>: "+data[i]["Contenido"]+'</a><span><small style="float:right;">Fecha: '+data[i]["Fecha"]+'</small></span></h4></div><div id="question'+data[i]["id"]+'" class="panel-collapse collapse" style="height: 0px;"></div></div>'
                        '<div class="panel panel-warning" style="cursor:pointer;">\n' +
                        '        <div class="panel-heading" data-toggle="collapse" data-target="#'+data[i]["idPregunta"]+'">' +
                        '           <h4><span class="fa fa-question-circle " style="margin-right: 10px"></span><b>'+data[i]["Titulo"]+'</b>' +
                        '               <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modaleliminar" onclick="sure_delete('+data[i]["idPregunta"]+')" "><i class="fa fa-eraser"></i></button>\n' +
                        '               <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#modalupdate" onclick="loadUpdate(' +
                        data[i].idPregunta+',\'' +
                        data[i].Titulo+'\',\'' +
                        data[i].Respuesta+
                        '\')" ><i class="fa fa-edit"></i></button></h4></div>\n' +
                        '        <div class="collapse panel-body" id="'+data[i]["idPregunta"]+'">' +
                        '           <h4><b> '+data[i]["Respuesta"]+'</b></h4>\n' +
                        '       </div>\n' +
                        '    </div>'
                    );
                }
            });
    }

    function loadUpdate(id,pre,resp) {
        // console.log("update");
        document.getElementById("btnupdate").onclick=function (ev) { update(id) };

        $('#upid').val(id);
        $('#uppregunta').val(pre);
        $('#uprespuesta').val(resp);
    }
    function sure_delete(id) {
        document.getElementById("Eliminar").onclick=function (ev) { eliminar(id) };
        console.log(id);
    }
    function eliminar(id) {
        console.log("eliminar ",id);
        var datos = {
            'id'        :id
        };
        $.ajax({
            type        : 'POST',
            url         : '../functions/deletePregunta.php',
            data        : datos,
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                if(data["error"]==false){

                    $("#modaleliminar").modal("hide");
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    $('#success_message').text(data["message"]);
                    $('#alert_success').show();
                    setTimeout(function() {
                        $('#alertaExito').hide();
                        location.reload();
                    }, 2000);
                }
                else{
                    console.log(data["message"]);
                }
            });

    }
    function create() {
        var datos = {
            'Pregunta'          :$('#addpregunta').val(),
            'Respuesta'         :$('#addrespuesta').val()
        };
        $.ajax({
            type        : 'POST',
            url         : '../functions/createPregunta.php',
            data        : datos,
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                if(data["error"]==false){
                    $("#modalAdd").modal("hide");
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    $('#success_message').text(data["message"]);
                    $('#alert_success').show();
                    setTimeout(function() {
                        $('#alertaExito').hide();
                        location.reload();
                    }, 2000);
                }
                else{
                    //$('#contenidoError').text(data["message"]);
                    //$('#alertaError').show();
                    console.log(data["message"]);
                }
            });

    }
    function update(idrepre) {
            var datos = {
                'id'        :$('#upid').val(),
                'pregunta'         :$('#uppregunta').val(),
                'respuesta'            :$('#uprespuesta').val()
            };

        $.ajax({
            type        : 'POST',
            url         : '../functions/updatePregunta.php',
            data        : datos,
            dataType    : 'json',
            encode      : true
        }).done(function(data) {
            if(data["error"]==false){
                $("#modalUpdate").modal("hide");
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                $('#success_message').text(data["message"]);
                $('#alert_success').show();
                setTimeout(function() {
                    $('#alertaExito').hide();
                    location.reload();
                }, 2000);
            }
            else{
                //$('#contenidoError').text(data["message"]);
                //$('#alertaError').show();
                console.log(data["message"]);
            }
        });

    }
</script>
</body>
</html>
