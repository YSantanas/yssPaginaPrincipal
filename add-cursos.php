<?php
include("./includes/header.php");

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $titulo = $_POST['titulo'];
    $horario = $_POST['horario'];
    $enlace = $_POST['enlace'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen']; // Ajustado para coincidir con el formulario
    $temario = $_POST['temario'];

    // Preparar la consulta SQL para insertar el curso
    $stmt = $db->prepare("INSERT INTO cursos (titulo, horario, enlace, descripcion, imagen_url, temario) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$titulo, $horario, $enlace, $descripcion, $imagen, $temario]);

    // Redirigir al usuario a la página de cursos después de agregar el curso
    header('Location: add-cursos.php?success=true');
    exit;
}

// Obtener cursos de la base de datos
$stmt = $db->query("SELECT * FROM cursos");
$cursos = $stmt->fetchAll();
?>


<main>
<section class="min-vh-100 mb-3" style="background: linear-gradient(to bottom,rgba(255, 255, 255, 0.32),rgba(230, 180, 239, 0.12));">
 
<div class="container py-5 h-100">
<h1 class="titulo-contenedor text-center">Bienvenido, <?php echo $_SESSION['username']; ?></h1>

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="./assets/img/formLogin.jpg"
                   alt="login form" class="img-fluid" 
                   style="border-radius: 1rem 0 0 1rem; height: 100%; width: 100%; object-fit: cover;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
              <h2 class="titulo-card">Agregar un Nuevo Curso</h2>
                <!-- Formulario de añadir curso -->
                <form method="POST" action="add-cursos.php">
    <div class="mb-3">
        <label for="titulo" class="form-label">Nombre del Curso</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>
    <div class="mb-3">
        <label for="horario" class="form-label">Horario</label>
        <input type="text" class="form-control" id="horario" name="horario" required>
    </div>
    <div class="mb-3">
        <label for="enlace" class="form-label">URL del Curso</label>
        <input type="text" class="form-control" id="enlace" name="enlace" placeholder="./paginas/pagina1.php" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">URL de la Imagen</label>
        <input type="text" class="form-control" id="imagen" name="imagen" placeholder="https://ejemplo.com/imagen.jpg" required>
    </div>
    <div class="mb-3">
        <label for="temario" class="form-label">Temario</label>
        <textarea class="form-control" id="temario" name="temario" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Curso</button>
</form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>



<section class="min-vh-100 mb-3" style="background: linear-gradient(to bottom,rgba(255, 255, 255, 0.32),rgba(230, 180, 239, 0.12));">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">


<div class="row">
<h2 class="titulo-card text-center">Cursos Disponibles</h2>

    <div class="row">
    <?php foreach ($cursos as $curso): ?>
        <div class="col-md-3 mb-3"> <!-- 4 tarjetas por fila en pantallas medianas y grandes -->
            <div class="card h-100">
                <div class="position-relative" style="height: 200px;"> <!-- Contenedor fijo para la imagen -->
                    <img src="<?php echo htmlspecialchars($curso['imagen_url']); ?>" 
                         class="card-img-top" 
                         alt="<?php echo htmlspecialchars($curso['titulo']); ?>"
                         style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo htmlspecialchars($curso['titulo']); ?></h5>
                    <p class="card-text"><strong>Horario:</strong> <?php echo htmlspecialchars($curso['horario']); ?></p>
                    <p class="card-text"><?php echo htmlspecialchars($curso['descripcion']); ?></p>
                    <p class="card-text"><strong>Temario:</strong> <?php echo nl2br(htmlspecialchars($curso['temario'])); ?></p>
                    
                    <div class="mt-auto"> <!-- Esto empuja los botones hacia abajo -->
                        <a href="<?php echo htmlspecialchars($curso['enlace']); ?>" class="btn btn-primary btn-sm me-2">Acceder</a>
                        <form action="./controllers/eliminar-curso.php" method="POST" class="d-inline">
                            <input type="hidden" name="curso_id" value="<?php echo $curso['id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este curso?');">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>



</div>
</div>



</div>
  </div>
</section>

</main>
<?php include("./includes/footer.php"); ?>
