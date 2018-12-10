<!DOCTYPE html>
<html>
<head>
    <title>UPM - Padel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css'
          integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <a id="logo" class="navbar-brand" href="#">
        <img src="img/upmlogo.jpg" class="img-logo rounded" alt="Logo UPM"/>
        <span>Pádel U.P.M</span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li id="panelInicio" class="nav-item active"><a class="nav-link" href="#">Inicio
                    <span class="sr-only">(current)</span>
                </a></li>
            <li id="panelServicios" class="nav-item"><a class="nav-link" href="#">Servicios</a></li>
            <li id="panelInstalaciones" class="nav-item"><a class="nav-link" href="#">Instalaciones</a></li>
            <li id="panelReserva" class="invisible nav-item"><a class="nav-link" href="#">Reservar</a></li>
        </ul>

        <ul class="nav justify-content-end">
            <li id="panelRegistro" class="nav-item"><a class="nav-link" href="#"><i class='fas'>&#xf007;</i>
                    Registro</a></li>
            <li id="panelLogin" class="nav-item"><a class="nav-link" href="#"> <i class='fas fa-sign-in-alt'></i> Login</a>
            </li>
            <li id="panelLogout" class="invisible nav-item"><a class="nav-link" href="#"> <i
                            class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
</nav>

<div id="panel" class="container"></div>

<div class="container">
    <footer class="footer">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <p class="text-center">Universidad Politécnica de Madrid.</p>
            </div>
        </div>
    </footer>
</div>

<script src="js/jquery/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>