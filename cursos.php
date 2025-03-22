<?php
require './config/database.php';  // Incluye la conexión a la base de datos

// Obtener cursos desde la base de datos
$query = "SELECT * FROM cursos";
$stmt = $db->query($query);
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

include("./includes/header.php"); 

?>
<main>
<div class="container">
    <h2 class="my-4">Cursos Disponibles</h2>
    <div class="row">
        <?php foreach ($cursos as $curso): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="<?= $curso['titulo']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $curso['titulo']; ?></h5>
                        <p class="card-text"><?= $curso['horario']; ?></p>
                        <a href="<?= $curso['enlace']; ?>" class="btn btn-primary" target="_blank">Ver más</a>
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