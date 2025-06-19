<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventos_tech";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>