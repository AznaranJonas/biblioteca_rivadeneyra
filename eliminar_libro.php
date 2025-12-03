<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Conectar a la base de datos
    $conexion = new mysqli("localhost", "root", "", "Biblioteca");
    
    // Primero verificamos si el libro existe
    $sql_verificar = "SELECT titulo FROM libros WHERE id = $id";
    $resultado = $conexion->query($sql_verificar);
    
    if ($resultado->num_rows > 0) {
        $libro = $resultado->fetch_assoc();
        $titulo = $libro['titulo'];
        
        // Eliminar el libro
        $sql_eliminar = "DELETE FROM libros WHERE id = $id";
        
        if ($conexion->query($sql_eliminar) === TRUE) {
            echo "<script>
                    alert('Libro \"$titulo\" eliminado correctamente');
                    window.location.href = 'listar_libros.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al eliminar: " . $conexion->error . "');
                    window.location.href = 'listar_libros.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Libro no encontrado');
                window.location.href = 'listar_libros.php';
              </script>";
    }
    
    $conexion->close();
} else {
    header("Location: listar_libros.php");
}
?>