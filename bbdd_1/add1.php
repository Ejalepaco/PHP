<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>

<body>


    <h1 class="titulo1">Registro de jugadores VCM Vikingos</h1>
    <div class="container">
        <form action="add2.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Escribe tu nombre" id="nombre" name="nombre" required><br>
            <label for="posicion">Posicion</label>
            <input type="text" placeholder="Escribe tu posicion" id="posicion" name="posicion" required><br>
            <label for="edad">Edad</label>
            <input type="number" placeholder="Escribe tu edad" id="edad" name="edad" required><br>
            <input type="submit" value="Registrar"><br>
            <input type="reset"></input>
        </form>

    </div>
    <a href="add1.php">Volver a la página de inicio</a>

</body>

</html>