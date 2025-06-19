<?php
session_start();
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

    <div class="titulos resultados-busqueda">
      <h2><strong>Alta de nueva propiedad</strong></h2>
    </div>
    <div class="container col-10">

      <?php
      // Información de conexión
      include 'conn.php';

      // Crea conexión
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      // Comprueba conexión
      if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
      }

      // Verifica que el usuario esté autenticado
      if (!isset($_SESSION['usuario_id'])) {
        die("Error: No se ha identificado al usuario.");
      }

      // Recibe los datos del formulario y los sanitiza
      $calle = mysqli_real_escape_string($conn, $_POST["calle"]);
      $numero = mysqli_real_escape_string($conn, $_POST["numero"]);
      $piso = mysqli_real_escape_string($conn, $_POST["piso"]);
      $puerta = mysqli_real_escape_string($conn, $_POST["puerta"]);
      $cp = mysqli_real_escape_string($conn, $_POST["cp"]);
      $metros = mysqli_real_escape_string($conn, $_POST["metros"]);
      $zona = mysqli_real_escape_string($conn, $_POST["zona"]);
      $precio = mysqli_real_escape_string($conn, $_POST["precio"]);
      $usuario_id = $_SESSION['usuario_id']; // Obtiene el usuario_id de la sesión
      
      // Comando SQL de insertar con el usuario_id
      $sql = "INSERT INTO pisos (calle, numero, piso, puerta, cp, metros, zona, precio, usuario_id) 
              VALUES ('$calle', '$numero', '$piso', '$puerta', '$cp', '$metros', '$zona', '$precio', '$usuario_id')";

      // Ejecuta el insert y controla el error
      if (mysqli_query($conn, $sql)) {
        echo "<p>Nueva propiedad añadida correctamente.</p>";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      // Cierra conexión
      mysqli_close($conn);
      ?>

    </div>
  </main>

  <br><br>
  <footer>
    <!-- Aquí puedes añadir información sobre el pie de página -->
  </footer>
  <div class="volverInicio">
    <a href="index.php">Volver a la página de inicio</a>
  </div>

</body>

</html>