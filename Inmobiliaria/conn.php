<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inmobiliaria";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>