<?php
session_start();

// Proteger página
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, redirigir a login
    header('Location: login.php');
    exit();
}

// Conexión a la base de datos
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <title>Add2.php</title>
</head>

<body>
    <header class="container mt-4">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a href="index.php"><img src="./images/logo.png" width="50"></a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="add1.php">Registra tu evento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list.php">Listado de eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="update1.php">Mis eventos</a>
                        </li>
                    </ul>

                    <!-- Accesos a la derecha -->
                    <ul class="navbar-nav ms-auto">
                        <?php if (isset($_SESSION['usuario'])): ?>
                            <li class="nav-item">
                                <span class="nav-link">Bienvenido,
                                    <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Cerrar sesión</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Iniciar sesión</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <?php
        // Validación de datos recibidos
        $nombre = mysqli_real_escape_string($conn, $_REQUEST['nombre']);
        $fecha = mysqli_real_escape_string($conn, $_REQUEST['fecha']);
        $descripcion = mysqli_real_escape_string($conn, $_REQUEST['descripcion']);
        $lugar = mysqli_real_escape_string($conn, $_REQUEST['lugar']);
        $capacidad = mysqli_real_escape_string($conn, $_REQUEST['capacidad']);

        // Insertar datos en la base de datos
        $sql = "INSERT INTO eventos (nombre, fecha, descripcion, lugar, capacidad) 
            VALUES ('$nombre', '$fecha', '$descripcion', '$lugar', '$capacidad')";

        if (mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
            echo "Evento <strong>$nombre</strong> añadido correctamente. Número de evento: <strong>$id</strong>";
        } else {
            echo "Error: " . $sql . "<br> " . mysqli_error($conn);
        }

        // Cerrar la conexión
        mysqli_close($conn);
        ?>
    </div>

    <div class="container">
    </div>
</body>

</html>