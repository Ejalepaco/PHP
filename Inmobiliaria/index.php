<?php
include 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="es">

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
        <?php
        if (isset($_SESSION['usuario'])) {  // Verifica si el usuario ha iniciado sesión
          echo "<h4>Bienvenido, " . $_SESSION['usuario'] . "</h4>";
          echo '<h4><a href="logout.php">Cerrar sesión</a></h4>';  // Enlace para cerrar sesión
          echo '<h4><a href="areaPrivada.php">Área privada</a></h4>';  // Enlace para cerrar sesión
        } else {
          echo '<h4><a href="login.php">Acceso</a></h4>';  // Enlace para acceder
        }
        ?>
      </div>
    </nav>
  </header>

  <main>

    <div class="titulos">
      <h2><strong>TE DAMOS LA BIENVENIDA A NUESTRA AGENCIA INMOBILIARIA</strong></h2>
      <HR>
      </HR>
      <h3><strong>Estás a un paso de encontrar tu próxima vivienda</strong></h3>
    </div>
    <div class="container col-8">
      <section class="busqueda">
        <form class="d-flex" role="search" action="buscar2.php" method="post" style="height: 50px; width: 80%;">
          <input class="form-control me-2" type="search" name="search"
            placeholder="Busca tu piso aqui, ingresando código o zona preferida" aria-label="Buscar">
          <button type="submit" class="btn btn-warning">Buscar</button>
        </form>
      </section>

      <section>
        <a href="list.php" class="btn btn-info">Ver todas las propiedades</a>
      </section>
    </div>
  </main>

</body>

</html>