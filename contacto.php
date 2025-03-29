<?php include("./includes/header.php"); ?>
<main>

    <div class="container-fluid p-2 mb-2 my-4">
        <div class="row no-gutters">
            <div class="col-12 d-flex justify-content-center align-items-center" style="background-color: rgb(255, 255, 255); height: auto; overflow: hidden;">
                <p class="subrayado-animado">Ponte en <strong>contacto</strong> con nuestro <strong>equipo</strong></p>

            </div>
        </div>
    </div>


    <div class="row no-gutters">
        <div class="col-12 col-md-12 d-flex flex-column justify-content-center align-items-center"
            style="background-color: rgba(255, 255, 255, 0.82); 
                background-image: url('./assets/img/contacto.jpg'); 
                background-size: cover; 
                background-attachment: fixed; 
                background-position: center;
                min-height: 400px;"> <!-- Establece una altura mínima de 500px -->

            <!-- Contenido dentro de la columna -->
            <img src="./assets/img/logo.png" alt="logo" style="width: 40%; margin: 2%;">
        </div>
    </div>

    <div class="container contacto-form">
        <div class="contacto-image">
            <img src="./assets/img/contact.png" alt="logo" />
        </div>
        <form method="post" action="./controllers/mail.php">
            <h3>Contáctanos</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="" />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Correo" value="" />
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="asunto" required>
                            <option value="" disabled selected>Selecciona asunto</option>
                            <option value="informacion">Información</option>
                            <option value="sugerencia">Sugerencia</option>
                            <option value="dudas">Dudas</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="tel" name="telefono" class="form-control" placeholder="Número telefonico" value="" />
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="mensaje" class="form-control" placeholder="Escribe tu mensaje" style="width: 100%; height: 150px;"></textarea>
                    </div>

                </div>
                <div class="form-group text-center">
                    <input type="submit" name="btnSubmit" class="btnContacto" value="Enviar Mensaje" />
                </div>
            </div>
        </form>
    </div>

</main>

<?php
// Incluir footer
include './includes/footer.php';
?>