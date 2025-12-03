<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "Biblioteca");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener los libros
$sql = "SELECT id, titulo, autor, genero, anio FROM libros";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Libros</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        .tabla-libros {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        .tabla-libros th, .tabla-libros td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        
        .tabla-libros th {
            background-color: #2c3e50;
            color: white;
        }
        
        .tabla-libros tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .tabla-libros tr:hover {
            background-color: #e3f2fd;
        }
        
        .sin-libros {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
        }
        
        .acciones {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Listado de Libros</h1>
            <p class="subtitle">Todos los libros registrados en la biblioteca</p>
        </header>
        
        <nav class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="form_libros.php">Agregar libro</a></li>
                <li><a href="listar_libros.php">Ver libros</a></li>
            </ul>
        </nav>
        
        <main class="contenido-principal">
            <div class="controles">
                <a href="form_libros.php" class="btn">Agregar Nuevo Libro</a>
                <a href="index.php" class="btn btn-secundario">Volver al inicio</a>
            </div>
            
            <?php if ($resultado->num_rows > 0): ?>
                <table class="tabla-libros">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Género</th>
                            <th>Año</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($libro = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $libro['id']; ?></td>
                            <td><strong><?php echo htmlspecialchars($libro['titulo']); ?></strong></td>
                            <td><?php echo htmlspecialchars($libro['autor']); ?></td>
                            <td><?php echo $libro['genero'] ? htmlspecialchars($libro['genero']) : '-'; ?></td>
                            <td><?php echo $libro['anio'] ? $libro['anio'] : '-'; ?></td>
                            <td class="acciones">
                                <a href="editar_libro.php?id=<?php echo $libro['id']; ?>" class="btn" style="padding: 5px 10px; font-size: 14px;">Editar</a>
                                <a href="eliminar_libro.php?id=<?php echo $libro['id']; ?>" class="btn btn-secundario" style="padding: 5px 10px; font-size: 14px;" onclick="return confirm('¿Eliminar este libro?')">Eliminar</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                
                <div class="total-libros">
                    <p><strong>Total de libros:</strong> <?php echo $resultado->num_rows; ?></p>
                </div>
                
            <?php else: ?>
                <div class="sin-libros">
                    <p>No hay libros registrados en la biblioteca.</p>
                    <p>¡Agrega tu primer libro!</p>
                    <a href="form_libros.php" class="btn">Agregar Primer Libro</a>
                </div>
            <?php endif; ?>
            
            <?php $conexion->close(); ?>
        </main>
        
        <footer>
            <p>Sistema de Biblioteca &copy; <?php echo date('Y'); ?></p>
        </footer>
    </div>
</body>
</html>