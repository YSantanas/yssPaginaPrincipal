<?php
$contenidoCarrusel = [
    ["titulo" => "Imagen 1", "descripcion" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor."],
    ["titulo" => "Imagen 2", "descripcion" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor."],
    ["titulo" => "Imagen 3", "descripcion" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor."]
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

</head>
<body class="d-flex flex-column min-vh-100">
<header class="header">

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

</header>


<!-- Contenedor del video -->

<div class="video-contenedor">
    <video autoplay loop muted playsinline>
        <source src="assets/video/emergencia.mp4" type="video/mp4">
        Tu navegador no soporta videos.
    </video>

    <!-- Contenedor del carrusel -->
    <div class="carrusel">
        <?php
        $activo = "active"; // La primera imagen será la activa
        foreach ($contenidoCarrusel as $contenido) :
        ?>
            <!-- Item carrusel -->
            <div class="carrusel-item <?php echo $activo; ?>">
                <div class="carrusel-texto">
                    <h2><?php echo $contenido["titulo"]; ?></h2>
                    <p><?php echo $contenido["descripcion"]; ?></p>
                </div>
            </div>
            <!-- Cambiar la clase activa solo para el primer item -->
            <?php $activo = ""; endforeach;?>
    </div>
</div>

<script src="./assets/js/carrusel.js"></script> <!-- Ruta a tu archivo JS -->
