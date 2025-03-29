<?php
require './config/database.php';  // Incluye la conexión a la base de datos

// Obtener cursos desde la base de datos
$query = "SELECT * FROM cursos";
$stmt = $db->query($query);
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

include("./includes/header2.php");

?>
<main>


<div class="row no-gutters mb-3 m-4">
            <div class="col-12 d-flex justify-content-center align-items-center" style="background-color: rgb(255, 255, 255); height: auto; overflow: hidden;">
                <p class="subrayado-animado">La <strong>mejor</strong> estrategia ante la incertidumbre es la  <strong></strong>información</strong>.</p>

            </div>
        </div>
    </div>


    <div class="row no-gutters">
        <div class="col-12 col-md-12 d-flex flex-column justify-content-center align-items-center"
            style="background-color: rgba(255, 255, 255, 0.82); 
                background-image: url('./assets/img/educacion.jpg'); 
                background-size: cover; 
                background-attachment: fixed; 
                background-position: center;
                min-height: 400px;"> <!-- Establece una altura mínima de 500px -->

            <!-- Contenido dentro de la columna -->
            <img src="./assets/img/logo.png" alt="logo" style="width: 40%; margin: 2%;">
        </div>
    </div>


<div class="container">
    <h1 class="my-4 text-center">Cursos Disponibles</h1>
    <div class="row g-3"> <!-- Se usa Bootstrap Grid con 'g-3' para espacios uniformes -->
        <?php foreach ($cursos as $curso): ?>
            <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center"> 
                <!-- 1 tarjeta en móviles (col-12) -->
                <!-- 2 tarjetas en medianas (col-md-6) -->
                <!-- 3 tarjetas en grandes (col-lg-4) -->
                <div class="blog_post">
                    <div class="img_pod">
                        <img src="<?= $curso['imagen_url']; ?>" class="card-img" alt="Imagen del curso">
                    </div>
                    <div class="container_copy">
                        <h3 class="card-text"><strong>
                        <?php
                        $modalidades = [1 => 'Presencial', 2 => 'Remoto', 3 => 'Híbrido'];
                        echo htmlspecialchars($modalidades[$curso['modalidad']] ?? 'Desconocida');
                        ?>
                        </strong></h3>
                        <h1><?= $curso['titulo']; ?></h1>
                        <p><?= $curso['descripcion']; ?></p>
                        <h3 class="texto-duracion text-center">Duración: <?= $curso['duracion']; ?> Horas</h3>
                        <a class="boton-add d-flex justify-content-center" href='./vista-curso.php?id=<?= $curso['id']; ?>'>Ver más</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



</main>
<?php
// Incluir footer
include './includes/footer.php';
?>