<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Biblioteca-Rivadeneyra</title>
    <!-- Enlazar el CSS separado -->
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <!-- Encabezado -->
        <header>
            <h1>Sistema de Biblioteca</h1>
            <p class="subtitle">Gestión de libros</p>
        </header>
        
        <!-- Menú de navegación -->
        <nav class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="form_libros.php">Libros</a></li>
                <li><a href="listar_libros.php">Listados</a></li>
            </ul>
        </nav>
        
        <!-- Contenido principal -->
        <main class="contenido-principal">
            <h2>Bienvenido al Sistema de Biblioteca</h2>
            <p>Selecciona una opción del menú o usa los botones rápidos:</p>
            
            <div class="botones-rapidos">
                <!-- Botón para Libros -->
                <div class="opcion">
                    <div class="icono">Libro</div>
                    <h3>Libros</h3>
                    <p>Gestiona el catálogo de libros</p>
                    <a href="form_libros.php" class="btn">Agregar Libro</a>
                    <a href="listar_libros.php" class="btn btn-secundario">Ver Libros</a>
                </div>
                

                

            </div>
            
            <!-- Información del sistema -->
            <div class="info-sistema">
                <h3>Resumen del Sistema</h3>
                <div class="resumen">
                    <div class="item-resumen">
                        <span class="numero">4</span>
                        <span class="texto">Libros registrados</span>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- Pie de página -->
        <footer>
            <p>Sistema de Biblioteca &copy; <?php echo date('Y'); ?> - Desarrollado con PHP y MySQL</p>
            <p class="version">Versión 1.0 - Para fines educativos</p>
        </footer>
    </div>
</body>
</html>