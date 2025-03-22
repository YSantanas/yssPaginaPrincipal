<?php
try {
    $db = new PDO("sqlite:" . __DIR__ . "/../database/database.sqlite");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
if (!$db) {
    die("Error de conexión a la base de datos.");
} else {
    echo "Conexión exitosa a SQLite.";
}

?>
