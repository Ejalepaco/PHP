<?php
session_start();

// Conexión a la base de datos
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <title>Listado de Eventos</title>
</head>

<body>
  <header class="container mt-4">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a href="index.php"><img src="./images/logo.png" width="50" alt="Logo"></a>
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
            <?php
            if (isset($_SESSION['usuario'])) {
              echo "<li class='nav-item'><span class='nav-link'>Hola, " . $_SESSION['usuario'] . "</span></li>";
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

  <div class="container mt-3 mb-3">
    <h3>Listado de eventos registrados</h3>
  </div>

  <?php


  $sql = "SELECT id, nombre, fecha, descripcion, lugar, capacidad FROM eventos";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="table-dark">';
    echo '  <tr>';
    echo '    <th>Nombre</th>';
    echo '    <th>Fecha</th>';
    echo '    <th>Descripción</th>';
    echo '    <th>Lugar</th>';
    echo '    <th>Capacidad</th>';
    echo '  </tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '  <td>' . htmlspecialchars($row['nombre']) . '</td>';
      echo '  <td>' . htmlspecialchars($row['fecha']) . '</td>';
      echo '  <td>' . htmlspecialchars($row['descripcion']) . '</td>';
      echo '  <td>' . htmlspecialchars($row['lugar']) . '</td>';
      echo '  <td>' . htmlspecialchars($row['capacidad']) . '</td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
  } else {
    echo '<div class="container">';
    echo "<h3>No hay eventos registrados todavía.</h3>";
  }

  mysqli_close($conn);
  ?>

</body>

</html>