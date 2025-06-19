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
      <form action="insertar2.php" method="POST" enctype="multipart/form-data">
        <!-- Formulario para registrar nueva propiedad -->
        <label for="calle">* Calle: </label>
        <input type="text" id="calle" name="calle" placeholder="Indica la calle" size="40" required><br>

        <label for="numero">* Número: </label>
        <input type="number" id="numero" name="numero" placeholder="Indica el número" required><br>

        <label for="piso">Piso: </label>
        <input type="number" id="piso" name="piso" placeholder="Indica el piso"><br>

        <label for="puerta">Puerta: </label>
        <input type="text" id="puerta" name="puerta" placeholder="Indica la puerta" size="40"><br>

        <label for="cp">* Código postal: </label>
        <input type="number" id="cp" name="cp" placeholder="Indica el código postal"><br>

        <label for="metros">* Metros: </label>
        <input type="number" id="metros" name="metros" placeholder="Indica los metros" required><br>

        <label for="zona">* Zona: </label>
        <input type="text" id="zona" name="zona" placeholder="Indica la zona"><br>

        <label for="precio">* Precio: </label>
        <input type="number" id="precio" name="precio" placeholder="Indica el precio"><br><br>

        <input class="btn btn-success" type="submit" value="Registrar"><br><br>
        <input class="btn btn-light" type="reset" value="Limpiar"></input>
      </form>
    </div>
  </main>

  <br><br>
  <footer>
    <!-- Aquí puedes añadir información sobre el pie de página -->
    <div class="volverInicio">
      <a href="index.php">Volver a la página de inicio</a>
    </div>
  </footer>

</body>

</html>