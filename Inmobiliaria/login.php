<?php
session_start();
require_once "conn.php"; // Asegúrate de que esta ruta sea correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $correo = $_POST['correo'] ?? null;
  $password = $_POST['password'] ?? null;

  if ($correo && $password) {
    // Consultar el usuario en la base de datos por el correo y obtener el rol
    $stmt = $conn->prepare("SELECT usuario_id, nombres, clave, tipo_usuario FROM usuario WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
      // Verificar la contraseña (usando password_verify si está hasheada)
      if (password_verify($password, $row['clave'])) {
        // Almacenar los datos del usuario en la sesión
        $_SESSION['usuario'] = $row['nombres']; // Guardamos el nombre del usuario
        $_SESSION['usuario_id'] = $row['usuario_id']; // Guardamos el ID del usuario
        $_SESSION['tipo_usuario'] = $row['tipo_usuario']; // Guardamos el tipo de usuario

        // Redirigir según el tipo de usuario
        if ($_SESSION['tipo_usuario'] === 'administrador') {
          header("Location: admin.php"); // Redirigir a admin.php si es administrador
        } else {
          header("Location: areaPrivada.php"); // Redirigir a área privada si no es administrador
        }
        exit(); // Detiene la ejecución para evitar que se ejecute el código posterior
      } else {
        $error = "⚠️ Usuario o contraseña incorrectos.";
      }
    } else {
      $error = "⚠️ Usuario no encontrado.";
    }

    $stmt->close();
  } else {
    $error = "⚠️ Por favor, completa todos los campos.";
  }
}
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
      <h2><strong>Inicia sesión para acceder a toda la información</strong></h2>
    </div>
    <div class="container col-8">
      <section class="busqueda">
        <form class="d-flex" role="search" action="login.php" method="POST" style="height: 40px; width: 80%;">

          <input class="form-control me-2" type="email" name="correo" placeholder="Ingresa correo electrónico" required
            aria-label="Buscar">
          <input type="password" class="form-control input-lg" name="password" placeholder="Password" required>

          <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
      </section>

      <?php if (isset($error)) {
        echo "<p class='text-danger'>$error</p>";
      } ?> <!-- Mostrar el mensaje de error -->

      <div class="titulos">
        <h2><strong>¿Primera vez?</strong></h2>
        <div class="links">
          <h4><a href="add1.php">Crea tu cuenta</a></h4>
        </div>
      </div>
    </div>
  </main>

</body>

</html>