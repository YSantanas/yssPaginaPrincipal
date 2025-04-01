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



    <div class="container-fluid">
        <div class="row no-gutters">

            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center" style="height: auto;">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.7139558224203!2d-99.16668!3d19.4678958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f9b20a78bbd7%3A0x687728e587e4d75f!2sDUX%20AGENCIA%20CLARIFICADORA%20SAS%20DE%20CV!5e0!3m2!1ses-419!2smx!4v1743541782132!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <a href="https://wa.me/5215519480041" target="_blank" class="whatsapp-btn">
                    <i class="fab fa-whatsapp"></i>
                </a>

            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center p-3" style="background-color:rgb(249, 245, 251); height: auto;">

                <div class="container contacto-form" style="background-color:rgb(255, 255, 255);">
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


            </div>

        </div>
    </div>


</main>

<?php
// Incluir footer
include './includes/footer.php';
?>