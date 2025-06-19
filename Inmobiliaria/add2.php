<?php
session_start(); // Iniciar la sesión
require_once "conn.php";

// Asegurarnos de que los datos del formulario sean enviados con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include 'conn.php'; // Ahora la conexión ya está lista con la variable $conn

  // Recoger y limpiar los datos del formulario
  $nombres = mysqli_real_escape_string($conn, $_POST['nombres']);
  $correo = mysqli_real_escape_string($conn, $_POST['correo']);
  $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT); // Hashear la contraseña
  $tipo_usuario = mysqli_real_escape_string($conn, $_POST['tipo_usuario']);

  // Insertar el usuario en la base de datos
  $query = "INSERT INTO usuario (nombres, correo, clave, tipo_usuario) 
            VALUES ('$nombres', '$correo', '$clave', '$tipo_usuario')";

  if (mysqli_query($conn, $query)) {
    echo "<div><h3>La cuenta ha sido creada exitosamente como <strong>$tipo_usuario</strong>.</h3>";

    // Si el tipo de usuario es 'administrador', mostrar un enlace a la página admin.php
    if ($tipo_usuario === 'administrador') {
      echo "<a href='admin.php' class='btn btn-warning'>Ir a la sección de Administración</a>";
    } else {
      echo "<a href='login.php' class='btn btn-success'>Iniciar Sesión</a>";
    }
    echo "</div>";
  } else {
    echo "Error al crear la cuenta: " . mysqli_error($conn);
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inmobiliaria Europea - Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

  <main class="container">
    <h1 class="titulos">Creación de cuenta</h1>
    <div class="alert alert-info">
      <!-- El contenido de la creación de cuenta será mostrado aquí -->
      <!-- La lógica de inserción y mensajes de éxito/error ya están dentro del PHP -->
    </div>

    <a href="add1.php" class="btn btn-primary">Volver al formulario</a>
  </main>
</body>

</html>