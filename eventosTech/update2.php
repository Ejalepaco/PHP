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
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
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
  <?php
  $id = $_REQUEST['id'];
  $sql = "SELECT * FROM eventos WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Muestra los datos de la fila buscada
    $row = mysqli_fetch_assoc($result);

    echo "<div class='container mt-4 mb-4'>";
    echo "<h1>Datos del evento: </h1>";
    echo "<form action='update3.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo " <p> Nombre: <input type='text' name='nombre' value=" . $row['nombre'] . " ></p>";
    echo " <p> Fecha: <input type='date' name='fecha' value=" . $row['fecha'] . " ></p>";
    echo " <p> Descripcion: <input type='text' name='descripcion' value=" . $row['descripcion'] . " ></p>";
    echo " <p> Lugar: <input type='text' name='lugar' value=" . $row['lugar'] . " ></p>";
    echo " <p> Capacidad: <input type='text' name='capacidad' value=" . $row['capacidad'] . " ></p>";

    echo " <input class='btn btn-success' type='submit' value='Modificar datos'>";
    echo " <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger' onclick=\"return confirm('¿Estás seguro de que quieres eliminar este evento?')\">Eliminar evento</a>";


    echo "</form>";

  } else {
    echo "<div class='container mt-4 mb-4'>";
    echo "<p>No existe ese evento.</p>";

  }
  mysqli_close($conn);
  ?>

</body>

</html>