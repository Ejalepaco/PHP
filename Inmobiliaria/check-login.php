<?php
session_start();
include 'conn.php'; // Incluye la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Conexión con la base de datos
  $conn = new mysqli("localhost", "root", "", "inmobiliaria");
  
  // Preparar la consulta SQL para obtener el usuario
  $sql = "SELECT usuario_id, nombres, correo, clave, tipo_usuario FROM usuario WHERE correo = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  // Verificar si el usuario existe
  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verificar si la contraseña es correcta
    if (password_verify($password, $user['clave'])) {
      $_SESSION['usuario'] = $user['nombres']; // Guardar el nombre del usuario
      $_SESSION['tipo_usuario'] = $user['tipo_usuario']; // Guardar el tipo de usuario

      // Redirigir al área privada o página según tipo de usuario
      if ($user['tipo_usuario'] === 'administrador') {
        header("Location: admin.php"); // Redirige a admin.php si es administrador
      } else {
        header("Location: areaPrivada.php"); // Redirige a área privada general si no es administrador
      }
      exit();
    } else {
      echo "Contraseña incorrecta";
    }
  } else {
    echo "Usuario no encontrado";
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
        <h4><a href="areaPrivada.php">Mi Perfil</a></h4>
      </div>
    </nav>
  </header>

  <main>

    <div class="titulos">
      <h2><strong>Estás a un paso de encontrar tu próxima vivienda</strong></h2>
    </div>
    <div class="container col-8">

      <section>
        <a href="insertar1.php" class="btn btn-primary">Añadir mi propiedad</a><br><br><br>
        <a href="logout.php" class="btn btn-primary">Cerrar sesión</a>
      </section>
    </div>
  </main>

</body>

</html>
