<?php
session_start();

// Proteger página, redirigir si no hay sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Modificar Evento</title>
</head>

<body>
    <header class="container mt-4">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a href="index.php"><img src="./images/logo.png" width="50" alt="Logo"></a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="add1.php">Registra tu evento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list.php">Listado de eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="update1.php">Mis eventos</a>
                        </li>
                    </ul>

                    <!-- Accesos a la derecha -->
                    <ul class="navbar-nav ms-auto">
                        <?php
                        if (isset($_SESSION['usuario'])) {
                            echo "<li class='nav-item'><span class='nav-link'>Hola, " . htmlspecialchars($_SESSION['usuario']) . "</span></li>";
                            echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Cerrar sesión</a></li>";
                        } else {
                            echo "<li class='nav-item'><a class='nav-link' href='login.php'>Iniciar sesión</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php
    // Validar el ID para evitar inyecciones SQL
    $id = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : 0;

    if ($id <= 0) {
        echo "<div class='container mt-4 mb-4'><div class='alert alert-danger'>ID inválido. Por favor, ingresa un ID de evento válido.</div></div>";
        exit();
    }

    // Consulta para obtener los datos del evento
    $sql = "SELECT * FROM eventos WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container mt-4 mb-4">
            <h2>Datos del evento:</h2>
            <form action="update3.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        value="<?php echo htmlspecialchars($row['nombre'], ENT_QUOTES); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $row['fecha']; ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control"
                        value="<?php echo htmlspecialchars($row['descripcion'], ENT_QUOTES); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="lugar" class="form-label">Lugar:</label>
                    <input type="text" name="lugar" id="lugar" class="form-control"
                        value="<?php echo htmlspecialchars($row['lugar'], ENT_QUOTES); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="capacidad" class="form-label">Capacidad:</label>
                    <input type="number" name="capacidad" id="capacidad" class="form-control"
                        value="<?php echo $row['capacidad']; ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Modificar datos</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"
                    onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">Eliminar evento</a>
            </form>
        </div>

        <?php
    } else {
        echo "<div class='container mt-4 mb-4'><div class='alert alert-warning'>No existe un evento con el ID especificado.</div></div>";
    }

    mysqli_close($conn);
    ?>

</body>

</html>