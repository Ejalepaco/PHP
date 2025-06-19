<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Listado de todos los usuarios registrados</h2>
    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inmobiliaria";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Realizar la consulta
    $sql = "SELECT * FROM usuario LIMIT 1000";
    $result = $conn->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Crear la tabla HTML
        echo "<table border='1' cellpadding='10'>";
        echo "<thead><tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Rol</th><th>Acciones</th></tr></thead>";
        echo "<tbody>";

        // Mostrar los resultados en la tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["usuario_id"] . "</td>";
            echo "<td>" . $row["nombres"] . "</td>";
            echo "<td>" . $row["correo"] . "</td>";
            echo "<td>" . $row["tipo_usuario"] . "</td>";
            echo "<td><a href='infoUsuarios.php?id=" . $row["usuario_id"] . "'>Editar</a> | <a href='bajaUsuarios.php?id=" . $row["usuario_id"] . "'>Eliminar</a></td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "0 resultados";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

</body>

</html>