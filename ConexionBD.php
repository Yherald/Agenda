<?php
$servername = "localhost"; // Cambia localhost por el nombre de tu servidor si es diferente
$username = "root"; // Cambia root por el nombre de usuario de tu base de datos si es diferente
$password = ""; // Cambia la contraseña si la has establecido
$database = "agenda"; // Cambia agenda por el nombre de tu base de datos si es diferente

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Hacer la variable $conn global para que esté disponible en otros archivos
global $conn;
?>
