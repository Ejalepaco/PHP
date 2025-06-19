<?php
session_start();
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

  <title>Eventos_Tech</title>
</head>

<body>
  <?php
  if (isset($_SESSION['usuario'])) {  // Verifica si el usuario ha iniciado sesión
    echo "<h4>Hola, " . $_SESSION['usuario'] . "</h4>";
  } else {
    echo '<h4><a href="login.php">Acceso</a></h4>';  // Enlace para acceder
  }
  ?>
  <header class="container mt-4 mb-5">
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

  <div class="container home mb-4">
    <h1>Technology Events Website</h1>
  </div>
  <div class="container home mb-5">
    <h2>Impulsa el éxito de tus eventos y haz crecer tu comunidad.</h2>
  </div>

  <div class="container video-home">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/KRnGmqYNBbs?si=0wR7hHXDaAjKR6Yq"
      title="YouTube video player" frameborder="20"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>
  <!-- <div class="container">
    <p class="copy-home fs-4 mt-4">Más que una herramienta de gestión, somos tu aliado estratégico para crear eventos
      impactantes que generen resultados. Optimiza tus procesos, amplía tu alcance y conecta con tu público de manera
      significativa. Descubre cómo nuestra plataforma puede transformar la forma en que planificas y ejecutas tus
      eventos.</p>
  </div> -->


</body>

</html>