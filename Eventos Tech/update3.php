<?php
session_start();

// Proteger página
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
  <title>Actualizar Evento</title>
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
  // Validación y escape de las entradas del formulario
  $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;

  if ($id <= 0) {
    echo "<div class='container mt-4 mb-4'><div class='alert alert-danger'>ID inválido. Por favor, ingresa un ID de evento válido.</div></div>";
    exit();
  }

  $nombre = isset($_REQUEST["nombre"]) ? mysqli_real_escape_string($conn, $_REQUEST["nombre"]) : '';
  $fecha = isset($_REQUEST["fecha"]) ? $_REQUEST["fecha"] : '';
  $descripcion = isset($_REQUEST["descripcion"]) ? mysqli_real_escape_string($conn, $_REQUEST["descripcion"]) : '';
  $lugar = isset($_REQUEST["lugar"]) ? mysqli_real_escape_string($conn, $_REQUEST["lugar"]) : '';
  $capacidad = isset($_REQUEST["capacidad"]) ? intval($_REQUEST["capacidad"]) : 0;

  if (empty($nombre) || empty($fecha) || empty($descripcion) || empty($lugar) || $capacidad <= 0) {
    echo "<div class='container mt-4 mb-4'><div class='alert alert-warning'>Todos los campos son obligatorios. Por favor, completa todos los campos.</div></div>";
    exit();
  }

  // Consulta preparada
  $sql = "UPDATE eventos SET nombre = ?, fecha = ?, descripcion = ?, lugar = ?, capacidad = ? WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);

  echo "<div class='container mt-4 mb-4'>";
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssssii', $nombre, $fecha, $descripcion, $lugar, $capacidad, $id);

    if (mysqli_stmt_execute($stmt)) {
      echo "<div class='alert alert-success'>Evento actualizado correctamente.</div>";
    } else {
      echo "<div class='alert alert-danger'>Error modificando el evento: " . mysqli_stmt_error($stmt) . "</div>";
    }

    mysqli_stmt_close($stmt);
  } else {
    echo "<div class='alert alert-danger'>Error preparando la consulta: " . mysqli_error($conn) . "</div>";
  }
  mysqli_close($conn);
  echo "<a href='update1.php' class='btn btn-primary mt-3'>Volver a Mis eventos</a>";
  echo "</div>";
  ?>

</body>

</html>