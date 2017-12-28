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
    <link href="../resources/DataTables/DataTables-1.10.16/css/dataTables.semanticui.min.css" rel="stylesheet"/>
    <link href="../resources/DataTables/SemanticUI-2.2.13/semantic.min.css" rel="stylesheet"/>

    <script src="../resources/js/html5shiv.js"></script>
    <script src="../resources/js/respond.min.js"></script>

</head>
<body>
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
                <h4 class="page-head-line">Personas</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" id="alert_success" style="display: none">
                    <b>Exito!</b><span id="success_message"></span>
                </div>
            </div>

        </div>
        <div class="row" style="margin-bottom: 20px">

            <div class="col-md-4">
                <button onclick="window.location.href='nuevaPersona.php'" class="btn btn-primary">Agregar Persona </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="response_table" class="ui celled table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Tipo de Sangre</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Opc</th>

                    </tr>
                    </thead>

                    <tbody id="datatable_body">

                    </tbody>
                </table>

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
                <div class="col-md-8 col-lg-8 " align="center"> <h3 class="title "> <p><b>TEN CUIDADO!!</b></p> Esta a Punto de eliminar esta Persona del Registro</h3> </div>
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

<script type="text/javascript" src="../resources/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../resources/DataTables/DataTables-1.10.16/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="../resources/DataTables/SemanticUI-2.2.13/semantic.min.js"></script>
<script>
    $(document).ready(function() {
        loadtable();
        setTimeout(function(){ $('#response_table').DataTable(); }, 1000);



    } );
    function loadtable() {
        console.log("load");
        var datos = {
        };

        $.ajax({
            type        : 'POST',
            url         : '../functions/getPersonas.php',
            data        : datos,
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                for (var i = 1; i <= data[0]; i++) {
                    var row = document.getElementById("datatable_body").insertRow(i-1);
                    row.insertCell(0).innerHTML=data[i]["Nombres"];
                    row.insertCell(1).innerHTML=data[i]["Apellidos"];
                    row.insertCell(2).innerHTML=data[i]["TipoSangre"];
                    row.insertCell(3).innerHTML=data[i]["Edad"];
                    row.insertCell(4).innerHTML=data[i]["Correo"];
                    var opt=row.insertCell(5);
                    opt.innerHTML=  "<a data-original-title=\"Remove this user\" data-toggle=\"modal\" onclick='sure_delete("+data[i]["idPersona"]+")' data-target=\"#modaleliminar\" type=\"button\" class=\"btn btn-sm btn-danger\" style='margin-right: 10px'>" +
                                    "<i class=\"glyphicon glyphicon-remove\"></i></a>";
                }
            });

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
            url         : '../functions/deletePersona.php',
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
</script>
</body>
</html>
