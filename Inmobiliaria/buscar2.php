<?php
session_start();
require_once "conn.php";

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

    <div class="titulos resultados-busqueda">
      <h2><strong>Resultados de la búsqueda</strong></h2>
    </div>
    <div class="container col-10">

      <?php
      // Información de conexión
      include 'conn.php';

      // Crea conexión
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      // Comprueba conexión
      if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
      }

      // Obtiene el valor ingresado por el usuario (ya sea código de piso o zona)
      $search = $_POST['search'] ?? '';  // El valor del campo de búsqueda
      
      // Validación: Evitar consultas vacías
      if (empty($search)) {
        die('<p>Por favor, introduce un código de piso o una zona.</p>');

      }

      // Seguridad: Consulta preparada
// Intentamos buscar por código de piso o por zona
      $sql = "SELECT * FROM pisos WHERE codigo_piso = ? OR zona = ?";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "ss", $search, $search);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) > 0) {
        // Muestra los datos fila a fila
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
      } else {
        echo "No hay datos disponibles.";
      }

      // Cierra conexión
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
      ?>


    </div>
  </main>
  <br><br>
  <div class="volverInicio">
    <a href="index.php">Volver a la página de inicio</a>
  </div>


</body>

</html>