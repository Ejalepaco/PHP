<?php
session_start();

// Proteger página, redirigir si no hay sesión activa
if (!isset($_SESSION['usuario'])) {
    // Redirige al usuario si no está logueado
    header("Location: login.php");
    exit();  // Asegura que no se ejecute más código después de la redirección
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
    <title>Modificación de Eventos</title>
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

    <div class="container mt-4 mb-4">
        <h2>Modificación de eventos</h2>
        <!-- Mensaje de bienvenida o error -->
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'id_invalido') {
            echo '<div class="alert alert-danger">Por favor, ingresa un ID válido.</div>';
        }
        ?>
    </div>

    <div class="container">
        <!-- Formulario para buscar evento -->
        <form action="update2.php" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">Introduce el número del evento</label>
                <input class="form-control" type="text" name="id" id="id" placeholder="Número del evento" required>
            </div>
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>
    </div>

</body>

</html>