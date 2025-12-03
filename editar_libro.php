<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "Biblioteca");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el ID del libro desde la URL
$id = $_GET['id'];

// Consultar los datos del libro
$sql = "SELECT id, titulo, autor, genero, anio FROM libros WHERE id = $id";
$resultado = $conexion->query($sql);

// Verificar si existe el libro
if ($resultado->num_rows == 0) {
    die("Libro no encontrado");
}

$libro = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro - <?php echo htmlspecialchars($libro['titulo']); ?></title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        .titulo-edicion {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        
        .libro-id {
            background-color: #3498db;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            margin-left: 10px;
        }
        
        .formulario-edicion {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            border: 2px dashed #dee2e6;
        }
        
        .info-adicional {
            background-color: #e8f4fc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Encabezado -->
        <header>
            <h1>Editar Libro</h1>
            <p class="subtitle">Modifica la información del libro</p>
        </header>
        
        <!-- Menú de navegación -->
        <nav class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="form_libros.php">Agregar libro</a></li>
                <li><a href="listar_libros.php">Ver libros</a></li>
                <li><a href="form_prestamos.php">Préstamos</a></li>
            </ul>
        </nav>
        
        <!-- Contenido principal -->
        <main class="contenido-principal">
            <h2 class="titulo-edicion">
                Editando: <?php echo htmlspecialchars($libro['titulo']); ?>
                <span class="libro-id">ID: <?php echo $libro['id']; ?></span>
            </h2>
            
            <div class="info-adicional">
                <p><strong>Instrucciones:</strong> Modifica los campos que necesites y haz clic en "Actualizar Libro".</p>
            </div>
            
            <!-- Formulario de edición -->
            <form action="actualizar_libro.php" method="POST" class="formulario formulario-edicion">
                <!-- Campo oculto para el ID -->
                <input type="hidden" name="id" value="<?php echo $libro['id']; ?>">
                
                <!-- Título -->
                <div class="campo-formulario">
                    <label for="titulo">Título del libro:</label>
                    <input type="text" id="titulo" name="titulo" 
                           value="<?php echo htmlspecialchars($libro['titulo']); ?>" 
                           required placeholder="Ej: Cien años de soledad">
                </div>
                
                <!-- Autor -->
                <div class="campo-formulario">
                    <label for="autor">Autor:</label>
                    <input type="text" id="autor" name="autor" 
                           value="<?php echo htmlspecialchars($libro['autor']); ?>" 
                           required placeholder="Ej: Gabriel García Márquez">
                </div>
                
                <!-- Género -->
                <div class="campo-formulario">
                    <label for="genero">Género:</label>
                    <input type="text" id="genero" name="genero" 
                           value="<?php echo htmlspecialchars($libro['genero']); ?>" 
                           placeholder="Ej: Realismo mágico, Novela, Fantasía">
                </div>
                
                <!-- Año -->
                <div class="campo-formulario">
                    <label for="anio">Año de publicación:</label>
                    <input type="number" id="anio" name="anio" 
                           value="<?php echo $libro['anio']; ?>"
                           min="1000" max="<?php echo date('Y'); ?>" 
                           placeholder="Ej: 1967">
                </div>
                
                <!-- Botones -->
                <div class="botones-formulario">
                    <button type="submit" class="btn">Actualizar Libro</button>
                    <a href="listar_libros.php" class="btn btn-secundario">Cancelar</a>
                    <a href="eliminar_libro.php?id=<?php echo $libro['id']; ?>" 
                       class="btn btn-secundario" 
                       style="background-color: #e74c3c;"
                       onclick="return confirm('¿Estás SEGURO de eliminar este libro? Esta acción no se puede deshacer.')">
                       Eliminar Libro
                    </a>
                </div>
            </form>
            
            <!-- Enlaces rápidos -->
            <div class="enlaces-rapidos">
                <a href="listar_libros.php">Volver al listado de libros</a> | 
                <a href="index.php">Volver al inicio</a>
            </div>
        </main>
        
        <!-- Pie de página -->
        <footer>
            <p>Sistema de Biblioteca &copy; <?php echo date('Y'); ?> - Editando libro ID: <?php echo $libro['id']; ?></p>
        </footer>
    </div>
    
    <script>
        // Validación adicional del año
        document.addEventListener('DOMContentLoaded', function() {
            const anioInput = document.getElementById('anio');
            const maxYear = new Date().getFullYear();
            
            anioInput.addEventListener('change', function() {
                if (this.value > maxYear) {
                    alert('El año no puede ser mayor al año actual (' + maxYear + ')');
                    this.value = maxYear;
                }
            });
        });
    </script>
</body>
</html>

<?php
// Cerrar conexión
$conexion->close();
?>