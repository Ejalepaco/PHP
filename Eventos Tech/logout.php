<?php
session_start();

// Proteger página
if (!isset($_SESSION['usuario'])) {
  // Si no hay sesión activa, redirige al inicio
  header("Location: index.php");
  exit();  // Asegura que el código posterior no se ejecute
}

// Conexión a la base de datos (si es necesario en el logout, pero generalmente no se necesita aquí)
include 'conn.php';

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio después de cerrar sesión
header("Location: index.php");
exit();  // Asegura que el código posterior no se ejecute
?>
