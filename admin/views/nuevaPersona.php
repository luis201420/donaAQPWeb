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
                <h4 class="page-head-line">Dashboard</h4>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" id="alert_success" style="display: none">
                    <b>Exito!</b><span id="success_message"></span>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="form-horizontal" id="formulariocentroDonacion" style="width: 90%;">
                <div class="form-group">
                    <label class="control-label col-sm-4">Nombre:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nombres" placeholder="nombre" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Apellidos:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="apellidos" placeholder="apellidos" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Tipo de Sangre:</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="tipo">
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="O+">O+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                            <option value="O-">O-</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Edad:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="edad" placeholder="edad" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Genero:</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="genero">
                            <option value="masculino">masculino</option>
                            <option value="femenino">femenino</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Correo:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="correo" placeholder="correo" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Permisos:</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="permisos">
                            <option value="1">Persona</option>
                            <option value="2">Representante</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Password:</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="pass" placeholder="password" >
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="control-label col-sm-4"></label>
                    <div class="col-sm-8">
                        <button type="button" onclick="create()" class="btn btn-primary col-sm-4" ><i class="fa fa-save" style="margin-right: 10px"></i> Crear Persona</button>

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
    // console.log($('#tipo').val());
    function create() {
        var datos = {
            'nombres'        :$('#nombres').val(),
            'apellidos'         :$('#apellidos').val(),
            'tipo'            :$('#tipo').val(),
            'genero'         :$('#genero').val(),
            'edad'         :$('#edad').val(),
            'correo'         :$('#correo').val(),
            'permisos'         :$('#permisos').val(),
            'pass'         :$('#pass').val()
        };
        console.log(datos);
        $.ajax({
            type        : 'POST',
            url         : '../functions/createPersona.php',
            data        : datos,
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                if(data["error"]==false){

                    $('#success_message').text(data["message"]);
                    $('#alert_success').show();
                    setTimeout(function() {
                        window.location.href="personas.php";
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
