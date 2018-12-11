<?php
?>
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
    <a id="logo" class="navbar-brand" href="index.php">
        <img src="img/upmlogo.jpg" class="img-logo rounded" alt="Logo UPM"/>
        <span>Pádel U.P.M</span>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li id="panelInicio" class="nav-item <?php if($section === 'panelInicio') echo active?>"><a class="nav-link" href="index.php">Inicio
                    <span class="sr-only">(current)</span>
                </a></li>
            <li id="panelServicios" class="nav-item"><a class="nav-link <?php if($section === 'panelServicios') echo active?>" href="panelServicios.php">Servicios</a></li>
            <li id="panelInstalaciones" class="nav-item"><a class="nav-link <?php if($section === 'panelInstalaciones') echo active?>" href="panelInstalaciones.php">Instalaciones</a></li>
            <li id="panelAdministracion" class="nav-item"><a class="nav-link <?php if($section === 'panelAdministracion') echo active?>" href="panelAdministracion.php">Administración</a></li>
        </ul>
    </div>
</nav>