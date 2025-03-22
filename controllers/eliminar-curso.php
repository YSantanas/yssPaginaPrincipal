<?php
session_start();
require '../config/database.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Verificar si se ha recibido el ID del curso
if (isset($_POST['curso_id'])) {
    $curso_id = $_POST['curso_id'];

    // Preparar la consulta para eliminar el curso
    $stmt = $db->prepare("DELETE FROM cursos WHERE id = ?");
    $stmt->execute([$curso_id]);

    // Redirigir al usuario de vuelta a la página de cursos después de eliminar
    header('Location: ../add-cursos.php');
    exit;
} else {
    // Si no se ha recibido un ID, redirigir o mostrar un error
    echo "Error: No se proporcionó el ID del curso.";
    exit;
}
?>
