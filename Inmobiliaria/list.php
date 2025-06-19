<?php
session_start();
require_once "conn.php";
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
    <h2 style="text-align: center" class="mb-4">Lista de propiedades añadidas</h2>
    <?php
    include 'conn.php';

    $conn = mysqli_connect('localhost', 'root', '', 'inmobiliaria');

    if (!$conn) {
      die("Conexión fallida: " . mysqli_connect_error());
    }

    $sql = "SELECT imagen, precio, zona, metros FROM pisos";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo '<div class="row">';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-4 container">';
        echo '  <div class="card h-100">';
        echo '    <div class="card-body">';
        echo '      <h5 class="card-title">Precio: ' . $row['precio'] . '€</h5>';
        echo '      <p class="card-text">Zona: ' . $row['zona'] . '</p>';
        echo '      <p class="card-text">Metros: ' . $row['metros'] . ' m²</p>';
        echo '    </div>';
        echo '    <div class="card-footer">';
        echo '      <small class="text-body-secondary">Última actualización hace poco</small>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
      }
      echo '</div>';
    } else {
      echo "<h3>No hay pisos registrados todavía.</h3>";
      echo "<h3>Accede para subir tu propiedad</h3>";
    }
    mysqli_close(($conn));

    ?>

    <footer>
      <a href="index.php" style="text-align: center">Volver a la página de inicio</a>
    </footer>

  </main>

</body>

</html>