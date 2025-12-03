-- =====================================
-- BASE DE DATOS BIBLIOTECA - VERSIÓN SENCILLA
-- =====================================

-- 1. Borrar base si existe
DROP DATABASE IF EXISTS Biblioteca;

-- 2. Crear base de datos
CREATE DATABASE Biblioteca;

-- 3. Usar la base
USE Biblioteca;

-- 4. Tabla LIBROS (la principal)
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    genero VARCHAR(50),
    anio INT
);

-- 5. Tabla USUARIOS (para préstamos)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- 6. Tabla PRÉSTAMOS
CREATE TABLE prestamos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libro_id INT,
    usuario_id INT,
    fecha_prestamo DATE,
    fecha_devolucion DATE
);

-- =====================================
-- DATOS DE PRUEBA (solo algunos)
-- =====================================

-- Libros de ejemplo
INSERT INTO libros (titulo, autor, genero, anio) VALUES
('Cien años de soledad', 'Gabriel García Márquez', 'Novela', 1967),
('El principito', 'Antoine de Saint-Exupéry', 'Fábula', 1943),
('1984', 'George Orwell', 'Ciencia ficción', 1949),
('Harry Potter y la piedra filosofal', 'J.K. Rowling', 'Fantasía', 1997);

-- Usuarios de ejemplo
INSERT INTO usuarios (nombre, email) VALUES
('Ana García', 'ana@email.com'),
('Carlos López', 'carlos@email.com'),
('María Rodríguez', 'maria@email.com');

-- Préstamos de ejemplo
INSERT INTO prestamos (libro_id, usuario_id, fecha_prestamo, fecha_devolucion) VALUES
(1, 1, '2024-01-15', '2024-01-30'),
(2, 2, '2024-02-01', '2024-02-15'),
(3, 3, '2024-02-10', '2024-02-24');

-- =====================================
-- VER SI SE CREÓ BIEN
-- =====================================

-- Mostrar todos los libros
SELECT 'LIBROS EN LA BIBLIOTECA:' AS mensaje;
SELECT * FROM libros;

-- Mostrar todos los usuarios
SELECT 'USUARIOS REGISTRADOS:' AS mensaje;
SELECT * FROM usuarios;

-- Mostrar préstamos
SELECT 'PRÉSTAMOS ACTUALES:' AS mensaje;
SELECT * FROM prestamos;