<?php
session_start();

// Verifica si el usuario ha iniciado sesión y si es administrador
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'administrador') {
  // Redirigir a areaPrivada.php si el usuario no es administrador
  header("Location: areaPrivada.php");
  exit(); // Detiene la ejecución del script
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inmobiliaria Europea - Área Administrador</title>
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
      <h1>Área Privada - Administrador</h1>
      <div class="links">
        <?php
        // Verifica si el usuario ha iniciado sesión
        if (isset($_SESSION['usuario'])) {
          // Si está logueado, muestra el nombre del usuario
          echo "<h4>Área privada: " . $_SESSION['usuario'] . "</h4>";
        }
        ?>
        <h4><a href="logout.php">Cerrar sesión</a></h4>
      </div>
    </nav>
  </header>

  <main class="container col-12">
    <h2 class="mt-4 text-center">Gestiones Administrativas</h2><br>

    <div class="row mt-4">
      <div class="col-md-6">
        <h3>Usuarios</h3><br>
        <h4><a href="add1.php">Alta de usuarios</a></h4>
        <h4><a href="./areaPrivada/bajaUsuarios.php">Baja de usuarios</a></h4>
        <h4><a href="./areaPrivada/buscarUsuarios.php">Búsqueda de usuarios</a></h4>
        <h4><a href="./areaPrivada/infoUsuarios.php">Actualización de usuarios</a></h4>
        <h4><a href="./areaPrivada/listadoUsuarios.php">Listado de usuarios</a></h4>
      </div>

      <div class="col-md-6">
        <h3>Propiedades</h3><br>
        <h4><a href="insertar1.php">Alta de propiedades</a></h4>
        <h4><a href="./areaPrivada/bajaPropiedades.php">Baja de propiedades</a></h4>
        <h4><a href="buscar2.php">Búsqueda de propiedades</a></h4>
        <h4><a href="./areaPrivada/infoPropiedades.php">Actualización de propiedades</a></h4>
        <h4><a href="list.php">Listado de propiedades</a></h4>
      </div>
    </div>
  </main>

</body>

</html>