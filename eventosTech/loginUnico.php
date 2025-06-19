<?php
session_start();
include 'conn.php'; // Conexión a la base de datos si es necesaria

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = $_POST['usuario'] ?? '';
  $clave = $_POST['clave'] ?? '';

  $archivo = fopen("usuarios.txt", "r");
  $autenticado = false;

  if ($archivo) {
    while (($linea = fgets($archivo)) !== false) {
      list($user, $pass) = explode(":", trim($linea));
      if ($usuario === $user && $clave === $pass) {
        $autenticado = true;
        $_SESSION['usuario'] = $usuario;
        break;
      }
    }
    fclose($archivo);
  }

  if ($autenticado) {
    $mensaje = "Hola, $usuario!";
  } else {
    $mensaje = "Usuario o contraseña incorrectos.";
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Login</title>
</head>

<body>
  <header class="container mt-4">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a href="index.php"><img src="./images/logo.png" width="50"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="add1.php">Registra tu evento</a></li>
            <li class="nav-item"><a class="nav-link" href="list.php">Listado de eventos</a></li>
            <li class="nav-item"><a class="nav-link" href="update1.php">Mis eventos</a></li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <?php if (isset($_SESSION['usuario'])) : ?>
              <li class="nav-item">
                <span class="nav-link">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Cerrar sesión</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Iniciar sesión</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container mt-4">
    <?php if (!isset($_SESSION['usuario'])) : ?>
      <form class="form-control" method="post">
        Usuario: <input class="mb-4 form-control" type="text" name="usuario" required><br>
        Contraseña: <input class="mb-4 form-control" type="password" name="clave" required><br>
        <input class="mb-4 btn btn-primary" type="submit" value="Iniciar sesión">
      </form>
    <?php else : ?>
      <h4>Ya has iniciado sesión como <?php echo htmlspecialchars($_SESSION['usuario']); ?>.</h4>
    <?php endif; ?>
  </div>

  <?php if (!empty($mensaje)) : ?>
    <script>
      alert("<?php echo htmlspecialchars($mensaje); ?>");
    </script>
  <?php endif; ?>

</body>

</html>
