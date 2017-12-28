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
<body onload="load_Notifi()">
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
                <h4 class="page-head-line">Notificaciones</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12" style="display: none">
                <div class="alert alert-success">
                    This is a simple admin template that can be used for your small project or may be large projects. This is free for personal and commercial use.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container ">
                <div class="panel panel-danger">
                    <div class="panel-heading "><h3>Notificaciones Activas</h3>
                    </div>
                    <div class="panel-body" id="Proximos">
                    </div>
                </div>
                <div class="panel panel-danger">
                    <div class="panel-heading "><h3>Notificaciones pasadas</h3>
                    </div>
                    <div class="panel-body" id="Pasados">

                    </div>
                </div>

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
    function load_Notifi(){
        $.ajax({
            type        : 'POST',
            url         : '../functions/getNotificaciones.php',
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                for (var i = 1; i <= data[0]; i++) {
                    var fecha= new Date(data[i]["Fecha"]);
                    fecha.setDate(fecha.getDate()+1);
                    fecha.setHours(0,0,0,0);
                    var actual= new Date();

                    if(actual<fecha){
                        $("#Proximos").append(
                            //'<div class="panel panel-default "><div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#preguntas" data-target="#question'+data[i]["id"]+'"><h4 class="panel-title"><a href="#" class="ing" onclick="mostrarComentarios('+data[i]["id"]+')"><b>'+data[i]["Nombres"]+" "+data[i]["Apellidos"]+"</b>: "+data[i]["Contenido"]+'</a><span><small style="float:right;">Fecha: '+data[i]["Fecha"]+'</small></span></h4></div><div id="question'+data[i]["id"]+'" class="panel-collapse collapse" style="height: 0px;"></div></div>'
                            '<div class="panel panel-warning">\n' +
                            '        <div class="panel-heading" data-toggle="collapse" data-target="#'+data[i]["idMensaje"]+'"><h4><i class="glyphicon glyphicon-tint " style="margin-right:  15px;"></i><b>'+data[i]["Nombres"]+' '+data[i]["Apellidos"]+'</b><span class="label label-success" style="margin-left: 10px">'+data[i]["Fecha"]+'</span></h4></div>\n' +
                            '        <div class="collapse panel-body" id="'+data[i]["idMensaje"]+'">' +
                            '           <h4><b> </b>'+data[i]["Mensaje"]+'</h4>\n' +
                            '       </div>\n' +
                            '    </div>'
                        );
                    }

                    else {
                        $("#Pasados").append(
                            //'<div class="panel panel-default "><div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#preguntas" data-target="#question'+data[i]["id"]+'"><h4 class="panel-title"><a href="#" class="ing" onclick="mostrarComentarios('+data[i]["id"]+')"><b>'+data[i]["Nombres"]+" "+data[i]["Apellidos"]+"</b>: "+data[i]["Contenido"]+'</a><span><small style="float:right;">Fecha: '+data[i]["Fecha"]+'</small></span></h4></div><div id="question'+data[i]["id"]+'" class="panel-collapse collapse" style="height: 0px;"></div></div>'
                            '<div class="panel panel-warning">\n' +
                            '        <div class="panel-heading" data-toggle="collapse" data-target="#'+data[i]["idMensaje"]+'"><h4><i class="glyphicon glyphicon-tint " style="margin-right:  15px;"></i><b>'+data[i]["Nombres"]+' '+data[i]["Apellidos"]+'</b><span class="label label-success" style="margin-left: 10px">'+data[i]["Fecha"]+'</span></h4></div>\n' +
                            '        <div class="collapse panel-body" id="'+data[i]["idMensaje"]+'">' +
                            '           <h4><b> </b>'+data[i]["Mensaje"]+'</h4>\n' +
                            '       </div>\n' +
                            '    </div>'
                        );
                    }

                }
            });
    }
</script>
</body>
</html>
