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
  $objetivo = $_POST['objetivo'];
  $direccion = $_POST['direccion'];
  $requisitos = $_POST['requisitos'];
  $duracion = $_POST['duracion'];
  $modalidad = $_POST['modalidad'];

  $enlace = !empty($_POST['enlace']) ? $_POST['enlace'] : null;
  $descripcion = $_POST['descripcion'];
  $imagen = $_POST['imagen']; // Ajustado para coincidir con el formulario
  $temario = $_POST['temario'];

  // Preparar la consulta SQL para insertar el curso
  $stmt = $db->prepare("INSERT INTO cursos (titulo,objetivo,direccion,requisitos,duracion,modalidad, enlace, descripcion, imagen_url, temario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->execute([$titulo, $objetivo, $direccion, $requisitos, $duracion, $modalidad, $enlace, $descripcion, $imagen, $temario]);

  // Redirigir al usuario a la página de cursos después de agregar el curso
  header('Location: add-cursos.php?success=true');
  exit;
}

// Obtener cursos de la base de datos
$stmt = $db->query("SELECT * FROM cursos");
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Asegúrate de usar FETCH_ASSOC

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
                      <label for="objetivo" class="form-label">Objetivo</label>
                      <input type="text" class="form-control" id="objetivo" name="objetivo" required>
                    </div>
                    <div class="mb-3">
                      <label for="direccion" class="form-label">Dirijido a</label>
                      <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>

                    <div class="mb-3">
                      <label for="requisitos" class="form-label">Requisitos</label>
                      <textarea class="form-control" id="requisitos" name="requisitos" rows="3" required></textarea>
                    </div>


                    <div class="mb-3">
                      <label for="duracion" class="form-label">Duración</label>
                      <input type="number" class="form-control" id="duracion" name="duracion" min="1" step="1" required>
                    </div>

                    <div class="mb-3">
                      <label for="modalidad" class="form-label">Modalidad</label>
                      <select class="form-select" id="modalidad" name="modalidad" required>
                        <option value="1" selected>Presencial</option>
                        <option value="2">Remoto</option>
                        <option value="3">Hibrido</option>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="enlace" class="form-label">URL del Curso</label>
                      <input type="text" class="form-control" id="enlace" name="enlace" placeholder="Ingresa una URL (opcional)">
                    </div>

                    <div class="mb-3">
                      <label for="descripcion" class="form-label">Descripción</label>
                      <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                      <label for="imagen" class="form-label">URL de la Imagen</label>
                      <input type="text" class="form-control" id="imagen" name="imagen" placeholder="https://ejemplo.com/imagen.jpg" required>
                    </div>
                    <div class="mb-3">
                      <label for="temario" class="form-label">Temario</label>
                      <textarea class="form-control" id="temario" name="temario" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-lg custom-btn d-block mx-auto">Agregar Curso</button>
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
                    <p class="card-text"><strong>Modalidad:</strong>
                      <?php
                      $modalidades = [1 => 'Presencial', 2 => 'Remoto', 3 => 'Híbrido'];
                      echo htmlspecialchars($modalidades[$curso['modalidad']] ?? 'Desconocida');
                      ?>
                    </p>
                    <p class="card-text"><?php echo htmlspecialchars($curso['descripcion']); ?></p>
                    <p class="card-text"><strong>Temario:</strong> <?php echo nl2br(htmlspecialchars($curso['temario'])); ?></p>

                    <div class="mt-auto align-self-center"> <!-- Esto empuja los botones hacia abajo -->
                      <form action="./controllers/eliminar-curso.php" method="POST" class="d-inline">
                        <input type="hidden" name="curso_id" value="<?php echo $curso['id']; ?>">
                        <button type="submit" class="btn btn-danger btn-m" onclick="return confirm('¿Estás seguro de eliminar este curso?');">Eliminar</button>
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