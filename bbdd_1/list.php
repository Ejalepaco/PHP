<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de jugadores</title>
</head>

<body>
    <h1>Lista de Jugadores</h1>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'vcm_vikingos');

    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $sql = "SELECT id, nombre, posicion, edad FROM jugadores";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<ul>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li> 
            ID: ' . $row['id'] .
                ' - Nombre: ' . $row['nombre'] .
                ' - Posición: ' . $row['posicion'] .
                ' - Edad: ' . $row['edad'] . '</li>';
        }
        echo '</ul>';
    } else {
        echo "No hay jugadores registrados";
    }

    mysqli_close(($conn));


    ?>

    <a href="index.php">Volver a la página de inicio</a>
</body>

</html>