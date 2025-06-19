<?php
echo "<h1>Ejercicio VCM</h1>";
$conn = mysqli_connect('localhost', 'root', '', 'vcm_vikingos');

if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
}

$nombre = mysqli_real_escape_string(mysql: $conn, string: $_POST['nombre']);
$posicion = mysqli_real_escape_string(mysql: $conn, string: $_POST['posicion']);
$edad = mysqli_real_escape_string(mysql: $conn, string: $_POST['edad']);
$sql = "INSERT INTO jugadores (nombre, posicion, edad) VALUES ('$nombre','$posicion','$edad')";

if (mysqli_query($conn, query: $sql)) {
    echo "Jugador añadido correctamente.";
} else {
    echo "Error: " . $sql . "<br> " . mysqli_error(mysql: $conn);
}
mysqli_close(mysql: $conn);
?>
<a href="index.php">Volver a la página de inicio</a>