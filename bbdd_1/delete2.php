<?php
$conn = mysqli_connect('localhost', 'root', '', database: 'vcm_vikingos');

if (!$conn) {
    die("Conexion fallida " - mysqli_connect_error());
}
$id = mysqli_real_escape_string($conn, $_POST['id']);
$sql = "DELETE FROM jugadores WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Jugador eliminado correctamente \n";

} else {
    echo "Error: " - mysqli_error($conn);
}

mysqli_close($conn);


?>
<hr><br><a href="list.php">Comprobar la lista actualizada</a><br><br>
<br><a href="index.php">Volver a la página de inicio</a>