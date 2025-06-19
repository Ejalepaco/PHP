<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la búsqueda</title>
</head>

<body>
    <h1>Resultados de la búsqueda</h1>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'vcm_vikingos');
    if (!$conn) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $sql = "SELECT id, nombre FROM jugadores WHERE nombre LIKE '%$nombre'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<ul>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>ID: ' . $row['id'] . ' - Nombre' . $row['nombre'] . '</li>';
        }
        echo '</ul>';
    } else{
        echo "No se encontraron jugadores";
    }

    mysqli_close($conn);




    ?>
    <a href="index.php">Volver a la página de inicio</a>

</body>

</html>