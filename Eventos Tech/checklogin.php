<?php
session_start();

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario'])) {
    // Redirigir a la página principal si ya está logueado
    header('Location: index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';

    // Simulación de autenticación (esto se debe adaptar a tu lógica real de autenticación)
    // Por ejemplo, con una base de datos o un archivo de usuarios.
    $archivo = fopen("usuarios.txt", "r");
    $autenticado = false;

    if ($archivo) {
        while (($linea = fgets($archivo)) !== false) {
            list($user, $pass) = explode(":", trim($linea));
            if ($usuario === $user && $clave === $pass) {
                $autenticado = true;
                $_SESSION['usuario'] = $usuario;  // Guardar en sesión
                break;
            }
        }
        fclose($archivo);
    }

    if ($autenticado) {
        // Mostrar el alert de bienvenida
        echo '<script type="text/javascript">';
        echo 'alert("Hola, ' . htmlspecialchars($usuario) . '!");';
        echo 'window.location.href = "index.php";';  // Redirigir a la página principal
        echo '</script>';
    } else {
        // Si la autenticación falla, mostrar un alert de error
        echo '<script type="text/javascript">';
        echo 'alert("Usuario o contraseña incorrectos.");';
        echo 'window.location.href = "login.php";';  // Redirigir a la página de login
        echo '</script>';
    }
}
?>