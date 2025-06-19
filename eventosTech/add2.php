<?php
session_start();

// Proteger página
if (!isset($_SESSION['usuario'])) {
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
            <li class="nav-item">
              <a class="nav-link" href="login.php">Iniciar sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="container">
    <?php
    $nombre = mysqli_real_escape_string(mysql: $conn, string: $_REQUEST['nombre']);
    $fecha = mysqli_real_escape_string(mysql: $conn, string: $_REQUEST['fecha']);
    $descripcion = mysqli_real_escape_string(mysql: $conn, string: $_REQUEST['descripcion']);
    $lugar = mysqli_real_escape_string(mysql: $conn, string: $_REQUEST['lugar']);
    $capacidad = mysqli_real_escape_string(mysql: $conn, string: $_REQUEST['capacidad']);
    $sql = "INSERT INTO eventos (nombre, fecha, descripcion, lugar, capacidad) VALUES ('$nombre', '$fecha', '$descripcion', '$lugar', '$capacidad')";

    if (mysqli_query($conn, query: $sql)) {
      $id = mysqli_insert_id($conn);
      echo "Evento <strong>$nombre</strong> añadido correctamente. Número de evento: <strong>$id</strong>";
    } else {
      echo "Error: " . $sql . "<br> " . mysqli_error(mysql: $conn);
    }
    mysqli_close(mysql: $conn);
    ?>
  </div>
  <div class="container">
    <a href="list.php">Listado de todos los eventos</a>
  </div>
</body>

</html>