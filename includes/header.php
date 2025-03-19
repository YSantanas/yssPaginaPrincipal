<?php

$contenidoCarrusel = [
    ["titulo" => "Tu seguridad es nuestra prioridad.", "descripcion" => "Evita que tu empresa incumpla con la normativa."],
    ["titulo" => "Seguridad y cumplimiento, sin complicaciones.", "descripcion" => "Prioriza la seguridad de tus empleados"],
    ["titulo" => "Evita sanciones.", "descripcion" => "Manten a tu empresa lejos de riesgos"]
];


$contenidoEquipo = [
    ["nombre" => "Norma Odette Pazos Gil", "imagen" => "./assets/img/equipo/equipo-1.png", "puesto" => "CEO"],
    ["nombre" => "Alberto Israel Caramona Silva", "imagen" => "./assets/img/equipo/equipo-2.png", "puesto" => "Consultor Sinior"],
    ["nombre" => "Nancy López Fajardo", "imagen" => "./assets/img/equipo/equipo-4.png", "puesto" => "Consultora Jr"],
    ["nombre" => "Jésus Francisco Monrroy Fuentes", "imagen" => "./assets/img/equipo/equipo-3.png", "puesto" => "Consultor Jr"]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dux Agencia Clarificadora</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <script src="./assets/js/titulos.js" defer></script>

</head>
<body class="d-flex flex-column">

<header class="header">
<div class="video-background">
        <video autoplay muted loop class="video-background-content">
            <source src="./assets/video/Video2.mp4" type="video/mp4">
            Tu navegador no soporta el elemento video.
        </video>
    </div>

<nav class="navbar navbar-expand-lg">

    <div class="container-fluid">
        <a class="navbar-brand logo" href="#">
            <img src="./assets/img/logo.png" alt="Logo" class="img-fluid" style="max-width: 120px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto"> <!-- Agregamos mx-auto para centrar -->
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nosotros.php">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Títulos que se van cambiando dinámicamente -->
<div class="video-text-container">
    <?php foreach ($contenidoCarrusel as $item): ?>
        <h2 class="video-text"><?php echo $item['titulo']; ?></h2>
    <?php endforeach; ?>
</div>
</header>


<!-- Contenedor del video -->


