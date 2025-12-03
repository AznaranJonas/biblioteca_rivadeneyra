<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "Biblioteca");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$anio = $_POST['anio'];

// Preparar la consulta SQL de actualización
$sql = "UPDATE libros SET 
        titulo = '$titulo',
        autor = '$autor',
        genero = '$genero',
        anio = '$anio'
        WHERE id = $id";

// Ejecutar y verificar
if ($conexion->query($sql) === TRUE) {
    $mensaje = "✅ Libro actualizado correctamente";
    $tipo_mensaje = "exito";
} else {
    $mensaje = "❌ Error al actualizar: " . $conexion->error;
    $tipo_mensaje = "error";
}

// Cerrar conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro Actualizado</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        .resultado-actualizacion {
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            margin: 20px 0;
        }
        
        .resultado-actualizacion.exito {
            border: 3px solid #28a745;
            background-color: #d4edda;
        }
        
        .resultado-actualizacion.error {
            border: 3px solid #dc3545;
            background-color: #f8d7da;
        }
        
        .detalles-actualizacion {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 600px;
            text-align: left;
        }
        
        .detalle-item {
            margin: 10px 0;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .icono-grande {
            font-size: 60px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Encabezado -->
        <header>
            <h1>📖 Actualización de Libro</h1>
            <p class="subtitle">Resultado de la operación</p>
        </header>
        
        <!-- Menú de navegación -->
        <nav class="menu">
            <ul>
                <li><a href="index.php">🏠 Inicio</a></li>
                <li><a href="listar_libros.php">📋 Ver libros</a></li>
                <li><a href="form_libros.php">➕ Agregar libro</a></li>
            </ul>
        </nav>
        
        <!-- Contenido principal -->
        <main class="contenido-principal">
            <div class="resultado-actualizacion <?php echo $tipo_mensaje; ?>">
                <div class="icono-grande">
                    <?php echo ($tipo_mensaje == 'exito') ? '✅' : '❌'; ?>
                </div>
                
                <h2><?php echo $mensaje; ?></h2>
                
                <?php if ($tipo_mensaje == 'exito'): ?>
                <div class="detalles-actualizacion">
                    <h3>📋 Datos actualizados:</h3>
                    
                    <div class="detalle-item">
                        <strong>ID del libro:</strong> <?php echo $id; ?>
                    </div>
                    
                    <div class="detalle-item">
                        <strong>Título:</strong> <?php echo htmlspecialchars($titulo); ?>
                    </div>
                    
                    <div class="detalle-item">
                        <strong>Autor:</strong> <?php echo htmlspecialchars($autor); ?>
                    </div>
                    
                    <div class="detalle-item">
                        <strong>Género:</strong> <?php echo $genero ? htmlspecialchars($genero) : 'No especificado'; ?>
                    </div>
                    
                    <div class="detalle-item">
                        <strong>Año:</strong> <?php echo $anio ? $anio : 'No especificado'; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="botones-opciones">
                    <a href="listar_libros.php" class="btn">📋 Ver todos los libros</a>
                    <a href="editar_libro.php?id=<?php echo $id; ?>" class="btn btn-secundario">✏️ Editar de nuevo</a>
                    <a href="index.php" class="btn btn-secundario">🏠 Volver al inicio</a>
                </div>
            </div>
        </main>
        
        <!-- Pie de página -->
        <footer>
            <p>Sistema de Biblioteca &copy; <?php echo date('Y'); ?></p>
        </footer>
    </div>
</body>
</html>