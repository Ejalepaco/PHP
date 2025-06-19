<?php
session_start(); // Inicia la sesión
session_destroy(); // Destruye la sesión
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cierre de sesión - Inmobiliaria Europea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="menu">
            <a href="index.php" class="logo">
                <img src="./images/logo.png" alt="Logo">
            </a>
            <h1>Inmobiliaria Europea</h1>
            <div class="links">
                <h4><a href="index.php">Volver a la página principal</a></h4>
            </div>
        </nav>
    </header>

    <main class="container text-center mt-5">
        <!-- Mensaje de confirmación -->
        <h2>La sesión ha sido cerrada correctamente</h2>
        <p><a href="index.php" class="btn btn-primary">Volver a la página principal</a></p>
    </main>

    <footer>
        <div class="volverInicio text-center mt-4">
            <a href="index.php">Volver a la página de inicio</a>
        </div>
    </footer>

</body>

</html>

<?php
// Redirige después de un pequeño retraso de 3 segundos para dar tiempo a ver el mensaje.
header('Refresh: 5; url=index.php');
exit();
?>