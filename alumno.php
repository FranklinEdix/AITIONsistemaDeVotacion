<?php include("db.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		 <![endif]-->
    <!-- Mobile Specific Metas -->
    <title>e-UNDAC - Sistema Academico UNDAC 2.0</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Cuprum:400italic,400,700italic,700" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="external_library/jquery-ui/jquery.ui.datepicker.css" media="screen" rel="stylesheet" type="text/css">
    <link href="css/app-min.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/hack.css" media="screen" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/icon.js"></script>
    <script type="text/javascript" src="/external_library/jquery-transit/jquery.transit.min.js"></script>
    <script type="text/javascript" src="/external_library/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="/external_library/bootstrap/js/jquery.functions.js"></script>
    <script type="text/javascript" src="/external_library/base64/jquery.base64.min.js"></script>
    <script type="text/javascript" src="/external_library/jquery-ui/jquery.ui.datepicker.js"></script>
    <script type="text/javascript" src="/external_library/jquery-ui/jquery.ui.core.js"></script>
    <script src='/js/vendor/socket.io-1.3.5.js'></script>
</head>

<body style="background-image: url('/img/fondo.png');background-size: cover;background-repeat: no-repeat; background-attachment: fixed;background-position: center;">
    <!-- <div id="loading_overlay" class="classLoading_Overlay">
			<div class="loading_message round_bottom">Cargando....</div>
			<div class="loading_allBlack"></div>
		</div> -->

    <input type="hidden" id="rol" value="AL">

    <header>
        <nav>
            <figure>
                <a href="#">
                    <img src="img/logo_03.png" alt="">
                    <!-- <h2>EXTRANET UNDAC</h2> -->
                </a>
            </figure>
            <div>
                <p><?php
                            ob_start();
                            $usuario = $_SESSION['usuario'];
                            $rol = $_SESSION['rol'];
                            if($rol == 'QUw=;--;'){
                                $query = "SELECT*FROM estudiante WHERE IdEstudiante = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row['Nombre'];
                            }elseif($rol == 'REM=;--;DC'){
                                $query = "SELECT*FROM docente WHERE IdDocente = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row['Nombre'];
                            }elseif($rol == 'RUc=;--;'){
                                $query = "SELECT*FROM graduado WHERE IdGraduado = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                echo $row['Nombre'];
                            }
                            ?> <span class="label label-danger c-notificaciones" id='notification'></span></p>
                <p>Facultad de  
                    <?php
                            ob_start();
                            $usuario = $_SESSION['usuario'];
                            $rol = $_SESSION['rol'];
                            if($rol == 'QUw=;--;'){
                                $query = "SELECT*FROM estudiante WHERE IdEstudiante = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                $queryFac = "SELECT*FROM facultad WHERE IdFacultad = '".$row['IdFacultad']."'";
                                $resultadoFac = mysqli_query($conexion, $queryFac);
                                $rowFac = mysqli_fetch_array($resultadoFac);
                                echo $rowFac['Nombre'];
                            }elseif($rol == 'REM=;--;DC'){
                                $query = "SELECT*FROM docente WHERE IdDocente = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                $queryFac = "SELECT*FROM facultad WHERE IdFacultad = '".$row['IdFacultad']."'";
                                $resultadoFac = mysqli_query($conexion, $queryFac);
                                $rowFac = mysqli_fetch_array($resultadoFac);
                                echo $rowFac['Nombre'];
                            }elseif($rol == 'RUc=;--;'){
                                $query = "SELECT*FROM graduado WHERE IdGraduado = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                $queryFac = "SELECT*FROM facultad WHERE IdFacultad = '".$row['IdFacultad']."'";
                                $resultadoFac = mysqli_query($conexion, $queryFac);
                                $rowFac = mysqli_fetch_array($resultadoFac);
                                echo $rowFac['Nombre'];
                            }?>
                </p>
            </div>
            <div>
                <a href="#" id="js_main-btn-menu"><span class="glyphicon glyphicon-align-justify"></span></a>
                <ul style="margin: -6px 0px 0px 0px;">
                    <li><a href="#" style="padding:25px;"><span><i class="bi bi-house-fill"></i></span> Inicio</a></li>
                    <li><a href="#" style="padding:25px;"><span><i class="bi bi-person-fill"></i></span> Mi Perfil </a></li>
                    <li><a href="#" style="padding:25px;"><span><i class="bi bi-cash"></i></span> Pagos en linea</a></li>
                    <li><a href="#" style="padding:25px;"><span><i class="bi bi-laptop"></i></span> Aula Virtual</a></li>
                    <!-- <li><a href="##"><span class="glyphicon glyphicon-envelope"></span> Notificaciones</a></li> -->
                    <li><a href="home.php" target="_blank" style="padding:25px;"><span class=""><i class="bi bi-check2-all"></i></span> Sufragio</a></li>
                    <li><a href="indexLogin.html" style="padding:25px;"><span class=""><i class="bi bi-box-arrow-right"></i></span> Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- <script type="text/javascript" src='/external_library/md5/md5.js'></script>
<script type="text/javascript" src='/external_library/md5/change.js'></script> -->
    <script>
        $(function() {
            var rol = $('#rol').val();
            if (rol == 'AL' || rol == 'EG') {
                var fullProfile = $('#fullProfile').val();
                var allCurrentUrl = window.location.pathname;
                var currentUrl = allCurrentUrl.substr(0, 23);
                if (fullProfile == 'no' && currentUrl != '/profile/public/student') {
                    $(location).attr('href', '/profile/public/student');
                };
            };

            var rellenoEncuesta = $('#rellenoEncuesta').val();
            if (rellenoEncuesta && rellenoEncuesta == 'No') {
                $(location).attr('href', '/alumno/index/encuesta');
            };
        });
    </script>

    <!-- <script>
      $(document).ready(function()
      {
         $("#comunicados").modal("show");
         $("#comunicado_docente").modal("show");
      });
</script> -->


    <nav>
        <div class="navigationLayout">
            <div class="navigationButtonsMainLayout">
                <a href="#"><span><i class="bi bi-arrow-left-short"></i></span></a></div>
            <p class="main_title_paragraph">
                <span class=""><span><i class="bi bi-person-fill"></i></span> Mi Perfil</p>
        </div>
    </nav>
    <div id="js_auxiliar" class="auxiliar">
        <div class="container container--auxiliar">
            <div class="auxiliar--content  js_auxiliar">

            </div>
        </div>
    </div>
    <main>
        <script>
            var nick = "160481158454";
            var socket = io('https://170.79.39.86:5555');
            socket.on('connect', function() {
                console.warn('connect success');
                socket.emit('initUser', nick, function(err) {
                    if (err) {
                        console.log(err);
                    }
                });
            });
            socket.on('notifications', function(data) {
                $('#notification').html(data);
            });
        </script>
        <link rel="stylesheet" href="css/profile.css">
        <!--input type="hidden" id="successProfile" value=""-->
        <!-- <div id="alertCompleteProfile" class="alert alert-danger hidden">
	<h4><span class="glyphicon glyphicon-exclamation-sign"></span> ACTUALIZA TU PERFIL : Información Estadística y Socio-Económica</h4>
	<p>Por favor lee las siguientes instrucciones :</p>
	<ol>
		<li>Para empezar tiene los siguientes datos para rellenar :</li>
		<ul>
			<li>Información Principal <strong>(obligatorio)</strong></li>
			<li>Datos Familiares <strong>(obligatorio)</strong></li>
			<li>Datos Académicos <strong>(obligatorio)</strong></li>
			<li>Datos Estadísticos <strong>(obligatorio)</strong></li>
			<li>Datos Laborales (opcional, si es que ya trabajaste o hiciste prácticas en algun lugar)</li>
			<li>Intereses <strong>(Obligatorio, todo tenemos hobbies)</strong></li>
		</ul>
		<li>En la parte derecha existe todo un <strong>Menú de Navegación</strong> dale click a cualquiera para empezar.</li>
		<li>Ahora, existen <strong>3 botones escenciales </strong> en todo el Perfil que le ayudarán a interactuar con este:</li>
			<ul>
				<li>El boton "Nuevo" <a href="##" class="btn btn-default btn-sm">Nuevo</a>, sirve para <strong>ingresar</strong> nuevos datos.</li>
				<li>El boton "Editar" <span class="glyphicon glyphicon-pencil"></span> que esta representado por un lápiz, sirve para <strong>editar</strong> datos ya existentes.</li>
				<li>Por ultimo el boton "Eliminar" <span class="glyphicon glyphicon-remove"></span>, que obviamente <strong>elimina</strong> datos que considera usted no deberían estar en su perfil.</li>
			</ul>
	</ol>
	<br>
	<p class="pull-right"><a id="btnCompleteProfile" href="##" class="btn btn-default"><span class="text-success">Actualizar Perfil</span></a></p>
	<br><br>
</div> -->

        <div class="container">
            <div class="row">
                <div class="col-md-2">

                    <!-- <figure href="#module_changephoto" data-toggle="modal"   data-toggle="dropdown" class="foto"><img class='img-avatar' src="/fotos/1744403142.jpg" onerror="imgError(this);" alt="Foto de Perfil" width="100%" height="160" alt="">
						</figure> -->

                    <figure class="foto"><img class='img-avatar' src="img/undac.png" onerror="imgError(this);" alt="Foto de Perfil" width="100%" height="160" alt="">
                    </figure>

                    <div class="datos-alu">
                        <p>
                            <?php
                            ob_start();
                            $usuario = $_SESSION['usuario'];
                            $rol = $_SESSION['rol'];
                            if($rol == 'QUw=;--;'){
                                $query = "SELECT*FROM estudiante WHERE IdEstudiante = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                echo "Nombre: ".$row['Nombre'];
                            }elseif($rol == 'REM=;--;DC'){
                                $query = "SELECT*FROM docente WHERE IdDocente = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                echo "Nombre: ".$row['Nombre'];
                            }elseif($rol == 'RUc=;--;'){
                                $query = "SELECT*FROM graduado WHERE IdGraduado = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                echo "Nombre: ".$row['Nombre'];
                            }
                            ?>
                            <br><br><?php
                            ob_start();
                            $usuario = $_SESSION['usuario'];
                            $rol = $_SESSION['rol'];
                            if($rol == 'QUw=;--;'){
                                $query = "SELECT*FROM estudiante WHERE IdEstudiante = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                echo "DNI: ".$row['DNI'];
                            }elseif($rol == 'REM=;--;DC'){
                                $query = "SELECT*FROM docente WHERE IdDocente = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                echo "DNI: ".$row['DNI'];
                            }elseif($rol == 'RUc=;--;'){
                                $query = "SELECT*FROM graduado WHERE IdGraduado = '$usuario'";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_array($result);
                                echo "DNI: ".$row['DNI'];
                            }?><br>
                            <br><br></p>
                    </div>
                    <div class="record">
                        <figure><span class="glyphicon glyphicon-file"></span><br>
                            <a class="btn btn-success" href="#">Record de Notas</a>
                        </figure>
                    </div>
                </div>
                <!--<div class="col-md-10">
                    <div class="studentProfile_buttons">
                        <button class="btnCurrent btnActive" goto="signinCurrent"><p>Matrícula<br>Actual</p><span class="glyphicon glyphicon-calendar"></span></button>
                        <button class="btnObO btnCurricula" goto="signinCurriculum"><p>Matrícula<br>por Curricula</p><span class="glyphicon glyphicon-list-alt"></span></button>
                        <button class="btnObO btnRealized" goto="signinRealized"><p>Matrículas<br>Realizadas</p><span class=" glyphicon glyphicon-th"></span></button>
                        <button class="btnObO btnMoreAboutMe" goto="info"><p>Datos<br>Generales</p><span class="glyphicon glyphicon-user"></span></button>
                    </div>
                    <div class="panel studentProfile_dataButtonsSide">
                        <div id="signinCurrent" class="dataContainer dataContainerActive"></div>
                        <div id="signinCurriculum" class="dataContainer"></div>
                        <div id="signinRealized" class="dataContainer"></div>
                        <div id="info" class="dataContainer"></div>
                    </div>
                </div>-->
                <!-- se agrego esto para el navegador global-->
                <div class="col-md-10">
                    <div class="card text-center">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="#"><p>Matrícula<br>Actual</p><i class="bi bi-calendar3"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="#"><p>Matrícula<br>por Curricula</p><i class="bi bi-file-earmark-text"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="#"><p>Matrículas<br>Realizadas</p><i class="bi bi-grid-3x3-gap-fill"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="#"><p>Datos<br>Generales</p><i class="bi bi-person-fill"></i></a>
                            </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    Quote
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-header">
                                    Quote
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------------------------------------------------------------->
            </div>
        </div>
        <style type="text/css">
            figure.imgage_user {
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
                width: 100%;
                position: relative;
                /*border-radius: 50%;*/
            }
            
            .datos-alu,
            .foto,
            .record {
                margin-left: 13px!important;
            }
            
            figure.imgage_user div {
                background-color: rgba(45, 57, 69, .5);
                width: 1px;
                height: 1px;
                position: absolute;
                overflow: hidden;
                justify-content: center;
                align-items: center;
                /*border-radius: 50%;*/
                cursor: pointer;
            }
            
            figure.imgage_user:hover img {
                zoom: 1.2;
            }
            
            figure.imgage_user:hover div {
                width: 100%;
                height: 100%;
                transition: .4s all ease;
                display: flex;
                color: #fff;
                font-weight: bold;
            }
        </style>
        <script>
            function imgError(image) {
                var avatar = 'M';
                image.onerror = "";
                image.src = "img/undac.png";
                return true;
            }

            $(function() {
                var llenado = '1';
                var codi = '17'
                var veriloc = '1'
                    //var aperid='20'
                var successProfile = $('#successProfile').val();
                if (successProfile == 'no') {
                    $('.btnObO').removeClass('btnActive');
                    $(".btnMoreAboutMe").addClass('btnActive');

                    var goTo = $(".btnMoreAboutMe").attr('goto');
                    $('.dataContainer').removeClass('dataContainerActive');
                    $('#' + goTo).addClass('dataContainerActive');
                };
                //Actualizar perfil
                /*$('#btnCompleteProfile').click(function(){
				$('html,body').animate({
		        	scrollTop: $("#profileTab").offset().top
		    	}, 500);
			});*/
                //--------------------------------------------------------------------------------------------------
                //loadData
                $("#signinCurrent").load("/profile/public/studentsigncurrent");

                $("#DataConst").load("/profile/public/statisticalrecord");

                $('#signinCurriculum').load('/profile/public/studentsignpercur');

                $("#signinRealized").load("/register/registerealized/index/pid/71068972/uid/1744403142/escid/4SI/subid/1901/perid/20B/rid/AL");

                $("#info").load("/profile/public/studentinfo/llenado/" + llenado);
                //-------------------------------------------------------------------------------------------------
                //Si es ingresante y no ha rellenado datos generales no cambia hasta que rellene
                var ro = 'AL'
                if ( /*codi==16/*aperid && */ llenado != 1 && ro == 'AL') {
                    restringir();
                    alert('Por favor rellene sus datos generales necesarios para activar las otras opciones');
                    $('.btnObO').on('click', function() {
                        alert('Por favor rellene todos sus datos generales');
                    });
                } else {
                    if (veriloc == 0 && ro == 'AL') {
                        restringir();
                    } else {
                        //Change Data (opciones para cargar datos)
                        var goTo = '';
                        $('button').on('click', function() {
                            $('button').removeClass('btnActive');
                            $('button').addClass('btnObO');
                            $(this).addClass('btnActive');
                            $(this).removeClass('btnObO');
                            goTo = $(this).attr('goto');
                            $('.dataContainer').removeClass('dataContainerActive');
                            $('#' + goTo).addClass('dataContainerActive');
                        });
                        //---------------------------------------------------
                    }
                }
                //-------------------------------------------------------------

                function restringir() {
                    $('.btnCurrent').addClass('btnObO');
                    $('.btnCurrent').removeClass('btnActive');
                    $('.btnMoreAboutMe').addClass('btnActive');
                    $('.btnMoreAboutMe').removeClass('btnObO');
                    $('#signinCurrent').removeClass('dataContainerActive');
                    $('#info').addClass('dataContainerActive');
                }
            });
        </script>


        <script type="text/javascript">
            document.getElementById("uploadFile").value = "";
            document.getElementById("photo").value = "";
            $('.photo_resp').addClass('hide');
            var URL = window.URL;
            var canvas = document.getElementById('canvas_photo');
            ctx = canvas.getContext('2d');
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            canvas.height = 100;

            document.getElementById("photo").onchange = function() {
                $('.photo_res_error').addClass('hide');
                $('#photo_n').addClass('hide');
                $('#photo_n1').addClass('show');
                if (document.getElementById("photo").value.indexOf('.jpg') > 0) {
                    document.getElementById("uploadFile").value = document.getElementById("photo").value;
                    var ss = $('#photo');
                    var MAX_WIDHT = 200,
                        MAX_HEIGHT = 200;
                    var file = ss[0].files[0];

                    var size = Math.round(file['size'] / 1000);
                    if (size <= 50) {
                        $("#label_photo").children('.fa').html(' ' + ss[0].files[0].name);
                        $("#save_photo").removeClass('disabled');

                        var canvas = document.getElementById('canvas_photo');
                        ctx = canvas.getContext('2d'),
                            url = URL.createObjectURL(file);
                        var img = new Image();

                        img.onload = function() {

                            if (img.width == 240 && img.height == 288) {
                                var width = img.width;
                                var height = img.height;
                                if (width > MAX_WIDHT) {
                                    height *= MAX_WIDHT / width;
                                    width = MAX_WIDHT;
                                } else {
                                    if (height > MAX_HEIGHT) {
                                        width *= MAX_HEIGHT / height;
                                        height = MAX_HEIGHT;
                                    }
                                }
                                canvas.width = width;
                                canvas.height = height;
                                ctx.drawImage(img, 0, 0, width, height);
                            } else {
                                $('.photo_res_error').removeClass('hide');
                                $("#save_photo").addClass('disabled');
                            }
                        };
                        img.src = url;
                    } else {
                        $('.photo_res_error').removeClass('hide');
                        $("#save_photo").addClass('disabled');
                    }
                } else {
                    $('.photo_res_error').removeClass('hide');
                    $("#save_photo").addClass('disabled');
                    var canvas = document.getElementById('canvas_photo');

                    ctx = canvas.getContext('2d');
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                };
            };
        </script>
    </main>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v7.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="109874880741592" theme_color="#0f4c81" logged_in_greeting="Hola, como puedo ayudarte?" logged_out_greeting="Hola, como puedo ayudarte?">
    </div>
    <footer>
        <ul>
            <li class="slideButtonLayout" slideupnumber="0">
                <a href="#"><span class="glyphicon glyphicon-user"></span> Plataforma</a>
                <div id="slideUpLayout0" class="desplegableLayout">
                    <ul>


                        <li><a href="#" title="">SOLICITUD</a></li>

                    </ul>
                </div>
            </li>
            <li class="slideButtonLayout" slideupnumber="1">
                <a href="#"><span class="glyphicon glyphicon-ok"></span> Matricula</a>
                <div id="slideUpLayout1" class="desplegableLayout">
                    <ul>


                        <li><a href="#" title="">MATRíCULA</a></li>

                    </ul>
                </div>
            </li>
        </ul>
    </footer>


</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>