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
                <h4 class="page-head-line">Centros de Donacion</h4>

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

            <div class=" col-sm-12 col-md-8" id="mapa" style=" height: 700px ;"></div>



            <div class="col-md-4">
                <div class="alert alert-info">
                    Para crear un nuevo Centro de Donacion:
                    <p> - haga click en  <b>Crear Nuevo Centro de Donacion</b> </p>
                    <p> - haga un click simple en la ubiacion deseada del mapa.</p>
                </div>
                <hr />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Operaciones
                    </div>
                    <div class="panel-body">
                        <button class="btn btn-primary col-md-12" style="margin: 5px" data-toggle="modal" onclick="addMarker()">
                            Crear Nuevo Centro de Donacion
                        </button>
                        <button class="btn btn-primary col-md-12" style="margin: 5px" data-toggle="modal" onclick="get_cds()">
                            Mostrar Centros de Donacion Registrados
                        </button>
                        <button class="btn btn-default col-md-12" style="margin: 5px"  onclick="iniciar()">
                            <i class="fa fa-refresh"></i>
                            reiniciar mapa
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="modal  fade " id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="modalAddLabel">Nuevo Centro de Donacion</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal" id="formulariocentroDonacion" style="width: 90%;">
                    <div class="form-group ">
                        <label class="control-label col-sm-5">latitud:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="adlatitud" placeholder="latitud" disabled>
                        </div>
                    </div>
                    <div class="form-group " >
                        <label class="control-label col-sm-5">longitud:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="adlongitud" placeholder="longitud" disabled>
                        </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        <label class="control-label col-sm-4">Nombre:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="adnombre" placeholder="nombre" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Direccion:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="addireccion" placeholder="direccion" >
                        </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        <label class="control-label col-sm-4">Correo del Representante:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" onkeyup="buscar_persona();" id="reprcorreo" placeholder="correo" >
                            <div class="alert alert-info" id="reprename" ></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btncrear" onclick="create_CD()" class="btn btn-primary">Crear Centro de Donacion</button>
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
                <div class="col-md-8 col-lg-8 " align="center"> <h3 class="title "> <p><b>TEN CUIDADO!!</b></p> Esta a Punto de eliminar este Centro de Donacion </h3> </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="Eliminar">Eliminar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>

    </div>
</div>
<div class="modal  fade " id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="modalAddLabel">Nuevo Centro de Donacion</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal" id="formulariocentroDonacion" style="width: 90%;">
                    <div class="form-group ">
                        <label class="control-label col-sm-5">ID:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="upid" placeholder="id" disabled>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-sm-5">latitud:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="uplatitud" placeholder="latitud" disabled>
                        </div>
                    </div>
                    <div class="form-group " >
                        <label class="control-label col-sm-5">longitud:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="uplongitud" placeholder="longitud" disabled>
                        </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        <label class="control-label col-sm-4">Nombre:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="upnombre" placeholder="nombre" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Direccion:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="updireccion" placeholder="direccion" >
                        </div>
                    </div>

                    <hr />
                    <div class="form-group">
                        <label class="control-label col-sm-4">Representante:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  id="upreprnombre" placeholder="Nombre" disabled>
                            <button type="button" onclick="$('#cambiarcorreo').show();" class="btn btn-warning col-sm-12" ><i class="fa fa-edit"></i> Cambiar Representate</button>

                        </div>
                    </div>
                    <div class="form-group" id="cambiarcorreo" style="display: none">
                        <label class="control-label col-sm-4">Correo del Representante:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" onkeyup="buscar_persona2();" id="reprcorreoed" placeholder="correo" >
                            <div class="alert alert-info" id="reprenameed" ></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btnupdate" onclick="update()" class="btn btn-primary">Guargar Centro de Donacion</button>
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
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD192AY4NxJxc8m55g4hrWzSAVVd6_XXf4&signed_in=true&callback=iniciar"></script>
<script>
    var map;
    var myCenter;
    var new_marker;

    function iniciar() {
        myCenter=new google.maps.LatLng(-16.4045861,-71.5311351);
        map = new google.maps.Map(document.getElementById('mapa'), {
            center: myCenter,
            zoom: 15
        });


    }
    function set_info(marker, info) {
        var infowindow = new google.maps.InfoWindow({
            content: info
        });

        marker.addListener('click', function() {
            infowindow.open(marker.get('map'), marker);
        });
    }

    function get_cds() {
        var datos = {
        };
        var id;
        $.ajax({
            type        : 'POST',
            url         : '../functions/getCentroDonacion.php',
            data        : datos,
            dataType    : 'json',
            encode      : true
        })
            .done(function(resp) {
                for (var i = 1; i <= resp[0]; i++) {

                    var location=new google.maps.LatLng(resp[i].Latitud,resp[i].Longitud);
                    var marcador_de_lugar = new google.maps.Marker({   //new_marker_for_lugar ya esta declarado como una variable global
                        position: location,
                        label: resp[i].id,
                        map: map
                    });
                    var info="<table class=\"table table-sm\"> " +
                        "<tbody>" +
                        " <tr> <th >Nombre:</th> <td >"+resp[i].nombreCentro+"</td>  </tr>"+
                        " <tr> <th >Direccion:</th> <td >"+resp[i].Direccion+"</td> </tr>"+
                        " <tr> <th >Representante: </th> <td >"+resp[i].Nombres+" "+resp[i].Apellidos+"</td> </tr>" +
                        " <tr>  " +
                        "<th><a class=\"edit text-warning\" id=\"editar\" style='margin-right: 5%;' data-toggle=\"modal\" data-target=\"#modalUpdate\" onclick=\"loadUpdate("+
                        resp[i].idCentroDonacion+",'" +
                        resp[i].nombreCentro+"','" +
                        resp[i].Direccion+"'," +
                        resp[i].Latitud+"," +
                        resp[i].Longitud+",'" +
                        resp[i].Nombres +" "+resp[i].Apellidos +
                        "')\"> <i class=\"fa fa-pencil\"></i> editar</a></th>"+
                        "<td><a class=\"remove text-danger\" data-toggle=\"modal\" data-target=\"#modaleliminar\" id=\""+resp[i].idCentroDonacion+"\"  onclick=\"sure_delete("+resp[i].idCentroDonacion+")\"> <i class=\"fa fa-trash-o \"></i>eliminar </a></td> </tr> " +
                        "</tbody> " +
                        "</table>";

                    set_info(marcador_de_lugar,info);


                    // var row = document.getElementById("datatable_body").insertRow(i-1);
                    // row.insertCell(0).innerHTML=data[i]["id"];
                    // row.insertCell(1).innerHTML=data[i]["Nombre"];
                    // var opt=row.insertCell(2);
                    // opt.innerHTML="<a data-original-title=\"Remove this user\" data-toggle=\"modal\" data-target=\"#modaleliminar\" type=\"button\" class=\"btn btn-sm btn-danger\"><i class=\"glyphicon glyphicon-remove\"></i></a>";
                    // var oc="setTitulo(\""+data[i]["Nombre"]+"\",\""+data[i]["id"]+"\");";
                    // opt.setAttribute("onclick",oc);


                }
            });
    }
    function sure_delete(id) {
        document.getElementById("Eliminar").onclick=function (ev) { eliminar(id) };
        console.log(id);
    }
    function buscar_persona2() {
        console.log($('#reprcorreoed').val());
        var datos = {
            'correo'        :$('#reprcorreoed').val()
        };
        var id;
        $.ajax({
            type        : 'POST',
            url         : '../functions/getPersona.php',
            data        : datos,
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                if(data["error"]==false){

                    $('#reprenameed').text("Nombre: "+data["Nombres"]+" "+data["Apellidos"]);
                    document.getElementById("btnupdate").disabled=false;
                    document.getElementById("btnupdate").onclick=function (ev) { update(data["idPersona"]) };

                    // id = data["idPersona"];

                }
                else{
                    $('#reprenameed').text("no hay coincidencias.");
                    // $('#btncrear').attr("disabled", true);
                    document.getElementById("btnupdate").disabled=true;
                    //$('#contenidoError').text(data["message"]);
                    //$('#alertaError').show();
                    console.log(data["message"]);
//                    console.log($('#reprcorreo').val());
                }
            });
        // return id;

    }

    function buscar_persona() {
        console.log($('#reprcorreo').val());
        var datos = {
            'correo'        :$('#reprcorreo').val()
        };
        var id;
        $.ajax({
            type        : 'POST',
            url         : '../functions/getPersona.php',
            data        : datos,
            dataType    : 'json',
            encode      : true
        })
            .done(function(data) {
                if(data["error"]==false){

                    $('#reprename').text("Nombre: "+data["Nombres"]+" "+data["Apellidos"]);
                    document.getElementById("btncrear").disabled=false;
                    document.getElementById("btncrear").onclick=function (ev) { create_CD(data["idPersona"]) };

                    // id = data["idPersona"];

                }
                else{
                    $('#reprename').text("no hay coincidencias.");
                    // $('#btncrear').attr("disabled", true);
                    document.getElementById("btncrear").disabled=true;
                    //$('#contenidoError').text(data["message"]);
                    //$('#alertaError').show();
                    console.log(data["message"]);
//                    console.log($('#reprcorreo').val());
                }
            });
        // return id;

    }
    function loadUpdate(id,nombrec,direccion,lat,long,nombrerepre) {
        // console.log("update");
        $('#upnombre').val(nombrec);
        $('#upid').val(id);
        $('#updireccion').val(direccion);
        $('#upreprnombre').val(nombrerepre);
        $('#uplatitud').val(lat);
        $('#uplongitud').val(long);
    }

    function update(idrepre) {
        if(idrepre==undefined){

            var datos = {
                'nombre'        :$('#upnombre').val(),
                'direccion'         :$('#updireccion').val(),
                'id'            :$('#upid').val(),
                'idrepre'         :-1
            };
        }else{
            var datos = {
                'nombre'        :$('#upnombre').val(),
                'direccion'         :$('#updireccion').val(),
                'id'            :$('#upid').val(),
                'idrepre'         :idrepre
            };
        }

        $.ajax({
            type        : 'POST',
            url         : '../functions/updateCentroDonacion.php',
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
    function eliminar(id) {
        console.log("eliminar ",id);
        var datos = {
            'id'        :id
        };
        $.ajax({
            type        : 'POST',
            url         : '../functions/deleteCentroDonacion.php',
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
    function create_CD(rep) {
        // var rep=buscar_persona();
        console.log(rep);
        var datos = {
            'nombres'        :$('#adnombre').val(),
            'direccion'         :$('#addireccion').val(),
            'lat'            :$('#adlatitud').val(),
            'long'         :$('#adlongitud').val(),
            'repre'         :rep
        };

        $.ajax({
            type        : 'POST',
            url         : '../functions/createCentroDonacion.php',
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
    function set_maker(lat,long) {
        var location=new google.maps.LatLng(lat,long);
        new_marker = new google.maps.Marker({
            position: location,
            map: map
        });
        return new_marker;
        // new_marker.setMap(null);
    }

    function set_maker(location) {
         new_marker = new google.maps.Marker({
            position: location,
            map: map
        });
        return new_marker;
        // new_marker.setMap(null);
    }
    function addMarker() {
        map.addListener("click",function (event) {
            set_maker(event.latLng);
            document.getElementById("adlatitud").value=event.latLng.lat();
            document.getElementById("adlongitud").value=event.latLng.lng();
            $("#modalAdd").modal("show");
        });

    }

</script>
</body>
</html>
