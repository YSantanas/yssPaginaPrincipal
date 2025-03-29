<?php
session_start(); // Asegúrate de que la sesión esté iniciada antes de verificar la variable


$contenidoCarrusel = [
    ["titulo" => "Tu seguridad es nuestra prioridad.", "descripcion" => "Evita que tu empresa incumpla con la normativa."],
    ["titulo" => "Seguridad y cumplimiento, sin complicaciones.", "descripcion" => "Prioriza la seguridad de tus empleados"],
    ["titulo" => "Evita sanciones.", "descripcion" => "Mantén a tu empresa lejos de riesgos"]
];


$contenidoCarrusel2 = [
    ["mensaje" => "Bienvenido a", "sitio" => "Nosotros"],
    ["mensaje" => "Bienvenido a", "sitio" => "Servicios"],
    ["mensaje" => "Bienvenido a", "sitio" => "Cursos"],
    ["mensaje" => "Bienvenido a", "sitio" => "Contacto"]
];

$contenidoEquipo = [
    ["nombre" => "Norma Odette Pazos Gil", "imagen" => "./assets/img/equipo/equipo-1.png", "puesto" => "CEO"],
    ["nombre" => "Alberto Israel Caramona Silva", "imagen" => "./assets/img/equipo/equipo-2.png", "puesto" => "Consultor Senior"],
    ["nombre" => "Nancy López Fajardo", "imagen" => "./assets/img/equipo/equipo-4.png", "puesto" => "Consultora Jr"],
    ["nombre" => "Jesús Francisco Monrroy Fuentes", "imagen" => "./assets/img/equipo/equipo-3.png", "puesto" => "Consultor Jr"]
];

// Obtener la página actual
$posActual = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dux Agencia Clarificadora</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./assets/js/titulos.js" defer></script>
</head>

<body class="d-flex flex-column">
    <header class="header <?php echo ($posActual != 'index.php') ? 'video-section' : ''; ?>">
        <?php if ($posActual != 'index.php'): ?>
            <div class="video-background2">
                <video autoplay muted loop class="video-background-content">
                    <source src="./assets/video/Video2.mp4" type="video/mp4">
                    Tu navegador no soporta el elemento video.
                </video>
            </div>
        <?php else: ?>
            <!-- Aquí puedes agregar otra estructura si lo deseas o dejarlo vacío -->
            <div class="video-background">
                <video autoplay muted loop class="video-background-content">
                    <source src="./assets/video/Video2.mp4" type="video/mp4">
                    Tu navegador no soporta el elemento video.
                </video>
            </div>
        <?php endif; ?>


    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="./login.php">
                <img src="./assets/img/logo.png" alt="Logo" class="img-fluid" style="max-width: 120px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($posActual == 'index.php') ? 'active' : ''; ?>" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($posActual == 'nosotros.php') ? 'active' : ''; ?>" href="nosotros.php">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($posActual == 'servicios.php') ? 'active' : ''; ?>" href="servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($posActual == 'cursos.php') ? 'active' : ''; ?>" href="cursos.php">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($posActual == 'contacto.php') ? 'active' : ''; ?>" href="contacto.php">Contacto</a>
                    </li>
                    <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'norma'): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($posActual == 'add-cursos.php') ? 'active' : ''; ?>" href="add-cursos.php">Añadir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./controllers/salir.php">Salir</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Títulos dinámicos del video -->
    <div class="<?php echo ($posActual == 'index.php') ? 'video-text-container' : 'video2-text-container'; ?>">
        <?php if ($posActual == 'index.php'): ?>
            <?php foreach ($contenidoCarrusel as $item): ?>
                <h2 class="video-text"><?php echo $item['titulo']; ?></h2>
            <?php endforeach; ?>
        <?php else: ?>
            <?php
            // Verifica la página actual y muestra el mensaje correspondiente
            if ($posActual == 'nosotros.php' && !empty($contenidoCarrusel2)) : ?>
                <h2 class="video-text"><?php echo $contenidoCarrusel2[0]['mensaje']; ?> <strong><?php echo $contenidoCarrusel2[0]['sitio']; ?></strong></h2>
            <?php elseif ($posActual == 'servicios.php' && !empty($contenidoCarrusel2)) : ?>
                <h2 class="video-text"><?php echo $contenidoCarrusel2[1]['mensaje']; ?> <strong><?php echo $contenidoCarrusel2[1]['sitio']; ?></strong></h2>
            <?php elseif ($posActual == 'cursos.php' && !empty($contenidoCarrusel2)) : ?>
                <h2 class="video-text"><?php echo $contenidoCarrusel2[2]['mensaje']; ?> <strong><?php echo $contenidoCarrusel2[2]['sitio']; ?></strong></h2>
            <?php elseif ($posActual == 'contacto.php' && !empty($contenidoCarrusel2)) : ?>
                <h2 class="video-text"><?php echo $contenidoCarrusel2[3]['mensaje']; ?> <strong><?php echo $contenidoCarrusel2[3]['sitio']; ?></strong></h2>
            <?php else : ?>
                <?php foreach ($contenidoCarrusel2 as $item) : ?>
                    <h2 class="video-text"><?php echo $item['mensaje']; ?> <strong><?php echo $item['sitio']; ?></strong></h2>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>


    </header>

    <body>