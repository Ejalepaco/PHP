<?php
session_start();

// Proteger página, si no está logueado, no permite la eliminación
if (!isset($_SESSION['usuario'])) {
    exit();
}

// Conexión a la base de datos
include 'conn.php';

$id = intval($_GET['id']);  // Obtener el ID del evento a eliminar

// Verificar si el ID es válido
if ($id > 0) {
    $sql = "DELETE FROM eventos WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Si la eliminación es exitosa
        echo "<script>
                alert('Evento eliminado correctamente.');
                window.location.href = 'list.php';  // Redirigir a la lista de eventos
              </script>";
    } else {
        // Si hubo un error al eliminar
        echo "<script>
                alert('Error al eliminar el evento: " . mysqli_error($conn) . "');
                window.location.href = 'list.php';  // Redirigir a la lista de eventos
              </script>";
    }
} else {
    // Si el ID no es válido
    echo "<script>
            alert('ID del evento no válido.');
            window.location.href = 'list.php';  // Redirigir a la lista de eventos
          </script>";
}

mysqli_close($conn);  // Cerrar la conexión a la base de datos
?>