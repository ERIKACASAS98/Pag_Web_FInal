-- 1. Base de datos
CREATE DATABASE techstore;
USE techstore;

-- 2. Tabla principal: cotizaciones
CREATE TABLE clientes_cotizacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(150) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    celular VARCHAR(20) NOT NULL,
    comentarios TEXT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabla de productos cotizados
CREATE TABLE productos_cotizacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cotizacion_id INT NOT NULL,
    producto VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(12,2) NOT NULL,
    total DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (cotizacion_id) REFERENCES clientes_cotizacion(id) ON DELETE CASCADE
);
