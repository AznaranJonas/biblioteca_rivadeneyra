<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Agregar Nuevo Libro</h1>
            <p class="subtitle">Completa el formulario para registrar un libro</p>
        </header>
        
        <nav class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="form_libros.php">Libros</a></li>
                <li><a href="listar_libros.php">Listados</a></li>
            </ul>
        </nav>
        
        <main class="contenido-principal">
            <h2>Formulario de Libro</h2>
            
            <form action="guardar_libro.php" method="POST" class="formulario">
                <div class="campo-formulario">
                    <label for="titulo">Título del libro:</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                
                <div class="campo-formulario">
                    <label for="autor">Autor:</label>
                    <input type="text" id="autor" name="autor" required>
                </div>
                
                <div class="campo-formulario">
                    <label for="genero">Género:</label>
                    <input type="text" id="genero" name="genero">
                </div>
                
                <div class="campo-formulario">
                    <label for="anio">Año de publicación:</label>
                    <input type="number" id="anio" name="anio" min="1000" max="2025">
                </div>
                
                <div class="botones-formulario">
                    <button type="submit" class="btn">Guardar Libro</button>
                    <a href="index.php" class="btn btn-secundario">Cancelar</a>
                </div>
            </form>
            
            <div class="enlaces-rapidos">
                <a href="listar_libros.php">Ver listado de libros</a>
            </div>
        </main>
        
        <footer>
            <p>Sistema de Biblioteca &copy; <?php echo date('Y'); ?></p>
        </footer>
    </div>
</body>
</html>