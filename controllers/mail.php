<?php
// Verifica que los campos estén seteados y no vacíos
if (!isset($_POST['nombre']) || empty($_POST['nombre']) ||
    !isset($_POST['email']) || empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ||
    !isset($_POST['asunto']) || empty($_POST['asunto']) ||
    !isset($_POST['mensaje']) || empty($_POST['mensaje']) ||
    !isset($_POST['telefono']) || empty($_POST['telefono']) || !preg_match('/^\+?[0-9]{1,4}?[ ]?(\(?[0-9]{1,3}\)?[ ]?)?[0-9]{6,10}$/', $_POST['telefono'])) {
    // Redirige al usuario a contacto.php si algún campo está vacío, es incorrecto o no es válido
    header("Location: ../contacto.php");
    exit(); 
}

// Procesamiento de los campos si todos son válidos
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];


// Puedes procesar los datos antes de enviarlos por mail, por ejemplo, sanitizarlos.
$nombre = htmlspecialchars($nombre);
$email = htmlspecialchars($email);
$asunto = htmlspecialchars($asunto);
$telefono = htmlspecialchars($telefono);
$mensaje = htmlspecialchars($mensaje); // Evitar ATAQUES


// Preparar el contenido del correo
$cuerpo = "Nombre: $nombre\n";
$cuerpo .= "Email: $email\n";
$cuerpo .= "Teléfono: $telefono\n";
$cuerpo .= "Mensaje:\n$mensaje";

// Cabeceras para el correo
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Aquí puedes utilizar los valores de los campos, por ejemplo, enviar el correo o guardarlos en la base de datos
//var_dump($nombre, $email, $asunto, $telefono,$mensaje);
// Enviar el correo
$rta = mail('Ing.normapazos@gmail.com', "DuxWeb: $asunto", $cuerpo, $headers);
//$rta =mail('CORREO', "DuxWeb: $asunto", $mensaje);

// Verificar si el correo fue enviado correctamente
if ($rta) {
    echo "Correo enviado con éxito.";
} else {
    echo "Hubo un problema al enviar el correo.";
}
?>
