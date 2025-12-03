<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "Biblioteca");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$anio = $_POST['anio'];

// Preparar la consulta SQL
$sql = "INSERT INTO libros (titulo, autor, genero, anio) 
        VALUES ('$titulo', '$autor', '$genero', '$anio')";

// Ejecutar y verificar
if ($conexion->query($sql) === TRUE) {
    echo "<h2>Libro guardado correctamente</h2>";
} else {
    echo "<h2>Error: " . $conexion->error . "</h2>";
}

// Cerrar conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libro Guardado</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Resultado</h1>
        </header>
        
        <nav class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="form_libros.php">Agregar otro libro</a></li>
                <li><a href="listar_libros.php">Ver todos los libros</a></li>
            </ul>
        </nav>
        
        <main class="contenido-principal">
            <div class="mensaje-exito">
                <p>El libro "<strong><?php echo $titulo; ?></strong>" ha sido guardado en la base de datos.</p>
                <p>Autor: <?php echo $autor; ?></p>
                <?php if($genero): ?>
                    <p>Género: <?php echo $genero; ?></p>
                <?php endif; ?>
                <?php if($anio): ?>
                    <p>Año: <?php echo $anio; ?></p>
                <?php endif; ?>
                
                <div class="botones-opciones">
                    <a href="form_libros.php" class="btn">Agregar otro libro</a>
                    <a href="listar_libros.php" class="btn">Ver todos los libros</a>
                    <a href="index.php" class="btn btn-secundario">Volver al inicio</a>
                </div>
            </div>
        </main>
        
        <footer>
            <p>Sistema de Biblioteca &copy; <?php echo date('Y'); ?></p>
        </footer>
    </div>
</body>
</html>