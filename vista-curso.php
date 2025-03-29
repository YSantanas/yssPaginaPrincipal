<?php
require './config/database.php';  // Incluye la conexión a la base de datos
include("./includes/header.php");
// Obtener cursos desde la base de datos
$query = "SELECT * FROM cursos";
$stmt = $db->query($query);
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verificar si se recibió un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener el curso correspondiente
    $query = "SELECT * FROM cursos WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$curso) {
        echo "Curso no encontrado.";
        exit;
    }
} else {
    echo "ID no válido.";
    exit;
}


?>
<main>

    <div class="container">
        <div class="card-principal text-bg-dark position-relative bg-primary m-5">
            <img src="<?= $curso['imagen_url']; ?>" class="card-img" alt="Imagen del curso">
            <div class="overlay">

                <!-- Título fijo en la parte superior -->
                <div class="card-titulo">
                    <h5 class="card-title"><?= $curso['titulo']; ?></h5>
                </div>

                <!-- Contenido centrado -->
                <div class="card-descrip">
                    <p><?= $curso['descripcion']; ?></p>
                </div>

                <!-- Nuevo elemento antes del footer -->
                <div class="card-central">
                    <p class="middle-text">Modalidad: <?= $curso['modalidad']; ?></p>
                </div>

                <!-- Footer fijo en la parte inferior -->
                <div class="card-final">
                    <small>Contactar</small>
                </div>
            </div> <!-- Capa de color -->
        </div>
    </div>

</main>
<?php
// Incluir footer
include './includes/footer.php';
?>