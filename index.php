<?php
// Incluir el header
include("./includes/header.php"); 


?>


<main>


    <div class="container-fluid p-2 mb-5 my-5">
        <div class="row no-gutters">
            <div class="col-12 d-flex justify-content-center align-items-center" style="background-color: rgb(255, 255, 255); height: auto; overflow: hidden;">
                <p class="subrayado-animado">Somos una Agencia “Clarificadora” comprometida con la mejora, innovación y crecimiento de todos nuestros socios comerciales y clientes.</p>

            </div>
        </div>
    </div>


    <div class="row no-gutters">
        <div class="col-12 col-md-12 d-flex flex-column justify-content-center align-items-center"
            style="background-color: rgba(255, 255, 255, 0.82); 
                background-image: url('./assets/img/portada4.jpg'); 
                background-size: cover; 
                background-attachment: fixed; 
                background-position: center;
                min-height: 400px;"> <!-- Establece una altura mínima de 500px -->

            <!-- Contenido dentro de la columna -->
            <img src="./assets/img/logo.png" alt="logo" style="width: 40%; margin: 2%;">
        </div>
    </div>



    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center" style="background-color:rgb(255, 255, 255); height: auto;">
                <img src="./assets/img/resolver.png" alt="logo" style="width: 55%;">

            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center" style="background-color:rgba(231, 224, 234, 0.41); height: auto;">
                <h1 class="titulo-contenedor text-center"> ¿Por qué "clarificadora"? somos la mejor opción ante la confusión</h1>

                <!-- Contenido de la segunda columna -->
                <p style="color: black; padding: 20px;">Nosotros en DUX asesoramos a nuestros clientes para el entendimiento y reordenamiento de los sistemas, procesos y procedimientos internos y externos de sus organizacion es para lograr un mejor desempeño y que sea sostenible en el tiempo. Te asesoramos para resolver y entender las necesidades específicas de tu organización y el mercado, para así poder lograr una Implementación de los sistemas y/o metodologías de la forma más adecuada obteniendo los mejores resultados.</p>
            </div>
        </div>
    </div>




    <div class="container-fluid p-0">
        <div class="row no-gutters">

            <!-- Primera columna -->
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center"
                style="background-color:rgba(231, 224, 234, 0.41); height: auto;">
                <h1 class="titulo-contenedor text-center">RESPONSABILIDAD SOCIAL EMPRESARIAL</h1>

                <p style="color: black; padding: 20px; display: flex; align-items: center;">
                    <img src="./assets/img/icon-01.png" alt="Icono 1" style="width: 40px; height: 40px; margin: 10px;">
                    Somos especialistas en implementación y seguimiento de programas de Responsabilidad Social Empresarial, enfocados en la creación de nuevas culturas sustentables y generando valor a las organizaciones a partir del core business de cada una de ellas.
                </p>

                <p style="color: black; padding: 20px; display: flex; align-items: center;">
                    <img src="./assets/img/icon-02.png" alt="Icono 2" style="width: 40px; height: 40px; margin: 10px;">
                    Consultoría para Obtención de Distintivo Empresa Socialmente Responsable.
                </p>

                <p style="color: black; padding: 20px; display: flex; align-items: center;">
                    <img src="./assets/img/icon-03.png" alt="Icono 3" style="width: 40px; height: 40px; margin: 10px;">
                    Contamos con servicios de auditorías sociales para identificar puntos que necesitan refuerzo dentro del sistema de responsabilidad social de la organización.
                </p>
            </div> <!-- Cierre correcto de la primera columna -->

            <!-- Segunda columna -->
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center"
                style="background-color:rgba(218, 217, 217, 0.12); height: auto;">
                <img src="./assets/img/revisar.png" alt="logo" style="width: 55%;">
            </div>

        </div>
    </div>




    <div class="row no-gutters">
        <div class="col-12 col-md-12 d-flex flex-column justify-content-center align-items-center"
            style="background-color: rgba(255, 255, 255, 0.82); 
                background-image: url('./assets/img/portada.jpg'); 
                background-size: cover; 
                background-attachment: fixed; 
                background-position: center;
                min-height: 400px;"> <!-- Establece una altura mínima de 500px -->

            <!-- Contenido dentro de la columna -->
            <h1 class="titulo-contenedor">Dux Agencia Clarificadora</h1>
        </div>
    </div>

    <div class="col-12 d-flex flex-column justify-content-center align-items-center"
        style="height: auto;">
        <h1 class="titulo-contenedor text-center">Nuestro Equipo</h1>
    </div>
    <!-- EQUIPO -->
    <div class="contenedor-equipo">
        <?php foreach ($contenidoEquipo as $persona): ?>

            <div class="card">
                <div class="cardImg">
                    <img src="<?php echo $persona['imagen']; ?>" alt="Imagen de la persona">
                </div>
                <div class="personaNombre">
                    <p><?php echo $persona['nombre']; ?></p> <!-- Aquí va el nombre -->
                </div>
                <div class="tag">
                    <p><span><?php echo $persona['puesto']; ?></span></p>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</main>


<!-- EQUIPO FIN -->


<?php include("./includes/footer.php"); ?>