<?php
require 'database.php';  // Incluye la conexión a la base de datos

// Crear tabla de usuarios (predefinidos, sin registro de usuarios)
$db->exec("CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL
)");

// Insertar usuarios predefinidos si no existen
$usuarios = [
    ['admin', password_hash('admin123', PASSWORD_DEFAULT)],
    ['editor', password_hash('clave123', PASSWORD_DEFAULT)]
];

$stmt = $db->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
foreach ($usuarios as $usuario) {
    try {
        $stmt->execute($usuario);
    } catch (PDOException $e) {
        // Ignorar error si ya existen
    }
}

// Crear tabla de cursos con los nuevos campos
$db->exec("CREATE TABLE IF NOT EXISTS cursos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT NOT NULL,
    horario TEXT NOT NULL,
    enlace TEXT NOT NULL,
    descripcion TEXT NOT NULL,
    imagen_url TEXT NOT NULL,
    temario TEXT NOT NULL
)");

echo "Tablas creadas y usuarios insertados correctamente.";
?>
