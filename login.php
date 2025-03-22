<?php 
include("./includes/header.php");
require './config/database.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Depuración: Mostrar los datos enviados
  var_dump($_POST);
  
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Preparar la consulta para buscar al usuario en la base de datos
  $stmt = $db->prepare("SELECT * FROM usuarios WHERE username = :username");
  $stmt->execute([':username' => $username]);
  $user = $stmt->fetch();

  if ($user) {
      var_dump($password); // Muestra la contraseña que el usuario ingresó
      var_dump($user['password']); // Muestra la contraseña almacenada en la base de datos

      // Verificar la contraseña
      if (password_verify($password, $user['password'])) {
          $_SESSION['usuario_id'] = $user['id'];
          $_SESSION['username'] = $user['username']; // Cambié 'usuario' por 'username' para ser consistente
          var_dump($_SESSION);  // Para ver el contenido de la sesión
          header("Location: add-cursos.php");
          exit();
      } else {
          echo "Usuario o contraseña incorrectos.";
      }
  } else {
      echo "Usuario no encontrado.";
  }
}
?>

<main>
<section class="vh-100" style="background: linear-gradient(to bottom,rgba(222, 179, 230, 0.32),rgba(64, 5, 74, 0.13));">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="./assets/img/formLogin2.jpg"
                   alt="login form" class="img-fluid" 
                   style="border-radius: 1rem 0 0 1rem; height: 100%; width: 100%; object-fit: cover;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <!-- Formulario de login -->
                <form method="POST">
                  <!-- Logo centrado -->
                  <div class="d-flex justify-content-center mb-3 pb-1">
                    <img src="./assets/img/logo.png" alt="login form" class="img-fluid" 
                         style="width: 50%; max-width: 150px; height: auto;" />
                  </div>

                  <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Introduce tus datos</h5>

                  <!-- Campo de usuario -->
                  <div class="form-outline mb-4">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Usuario" required />
                  </div>

                  <!-- Campo de contraseña -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Contraseña" required />
                  </div>

                  <!-- Botón de iniciar sesión centrado -->
                  <div class="d-flex justify-content-center pt-1 mb-4">
                    <button type="submit" class="btn btn-dark btn-lg btn-block">Iniciar sesión</button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</main>

<?php if (isset($error)) { echo "<p>$error</p>"; } ?>

<?php include("./includes/footer.php"); ?>
