<?php
session_start(); // Asegúrate de iniciar la sesión

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
  // Si no ha iniciado sesión, muestra un mensaje de error o redirige
  echo "<h1>Fallo en el inicio de sesión. Inténtalo de nuevo.</h1>";
  exit(); // Detiene el código si el usuario no está logueado
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inmobiliaria Europea</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
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
        <h4><a href="logout.php">Cerrar sesión</a></h4>
        <h4><a href="admin.php">Cuenta Admin</a></h4>
      </div>
    </nav>
  </header>

  <main>
    <div class="titulos">
      <h2>ÁREA PRIVADA</h2>
      <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1> <!-- Mostrar el nombre o correo del usuario -->
    </div>

    <div class="container col-10" style="text-align: center;">
      <h2>¿Tienes una propiedad que no estás utilizando?</h2><br>
      <h3>En el mercado actual, la demanda de viviendas está en aumento. ¡No dejes pasar la oportunidad de obtener
        ingresos extra alquilando o vendiendo tu propiedad!</h3><br>
      <h3>Te ayudamos a encontrar al inquilino o comprador ideal, de forma rápida y segura.</h3><br>
      <h3><a href="insertar1.php">Registra tu propiedad</a></h3>
    </div>

  </main>

  <footer>
    <div class="volverInicio">
      <a href="index.php">Volver a la página de inicio</a>
    </div>
  </footer>
</body>

</html>