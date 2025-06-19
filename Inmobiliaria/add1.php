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
          echo '<h4><a href="areaPrivada.php">Área privada</a></h4>';  // Enlace acceso área privada
        } else {
          echo '<h4><a href="login.php">Acceso</a></h4>';  // Enlace para acceder
        }
        ?>
      </div>
    </nav>
  </header>
  <main>
    <h1 class="titulos">Crea tu cuenta</h1>
    <div class="formularioRegistro container">
      <form action="add2.php" method="post">
        <label for="tipo_usuario">Tipo de usuario: </label><br>

        <input type="radio" id="comprador" name="tipo_usuario" value="comprador" required>
        <label for="comprador">Comprador</label>

        <input type="radio" id="vendedor" name="tipo_usuario" value="vendedor" required>
        <label for="vendedor">Vendedor</label>

        <input type="radio" id="administrador" name="tipo_usuario" value="administrador" required>
        <label for="administrador">Administrador</label><br>

        <label for="nombres">Nombre: </label>
        <input type="text" placeholder="Escribe tu nombre" id="nombres" name="nombres" required><br>

        <label for="correo">Correo: </label>
        <input type="email" placeholder="Escribe tu correo" id="correo" name="correo" required><br>

        <label for="clave">Contraseña: </label>
        <input type="password" name="clave" id="clave" required><br>

        <input class="btn btn-success" type="submit" value="Registrar"><br>
        <input class="btn btn-light" type="reset" value="Limpiar">
      </form>

    </div>

  </main>

</body>

</html>