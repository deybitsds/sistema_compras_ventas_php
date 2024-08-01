
DROP DATABASE IF EXISTS sistema_inventario;

CREATE DATABASE sistema_inventario;
USE sistema_inventario;

-- Tabla para usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    sexo ENUM('M', 'F'),
    fecha_nacimiento DATE,
    tipo_documento ENUM('DNI', 'Pasaporte', 'Otro'),
    nro_documento VARCHAR(20) UNIQUE,
    foto BLOB,
    direccion VARCHAR(100),
    telefono VARCHAR(15),
    email VARCHAR(50),
    estado ENUM('Activo', 'Inactivo'),
    username VARCHAR(20) UNIQUE,
    password VARCHAR(100),
    tipo_usuario ENUM('Administrador', 'Empleado')
);

-- Tabla para categorias de productos
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    descripcion TEXT
);

-- Tabla para unidades de medida
CREATE TABLE unidades_medida (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    descripcion TEXT
);

-- Tabla para productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion TEXT,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    stock_inicial INT,
    stock_actual INT,
    categoria_id INT,
    unidad_medida_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    FOREIGN KEY (unidad_medida_id) REFERENCES unidades_medida(id)
);

-- Tabla para clientes
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    tipo_documento ENUM('DNI', 'Pasaporte', 'Otro'),
    nro_documento VARCHAR(20) UNIQUE,
    direccion VARCHAR(100),
    telefono VARCHAR(15),
    email VARCHAR(50)
);

-- Tabla para proveedores
CREATE TABLE proveedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    razon_social VARCHAR(100),
    ruc VARCHAR(11) UNIQUE,
    direccion VARCHAR(100),
    telefono VARCHAR(15),
    email VARCHAR(50),
    url VARCHAR(100)
);

-- Tabla para compras
CREATE TABLE compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_comprobante ENUM('Factura', 'Boleta'),
    nro_comprobante VARCHAR(20),
    fecha_emision DATE,
    proveedor_id INT,
    FOREIGN KEY (proveedor_id) REFERENCES proveedores(id)
);

-- Tabla para detalles de compras
CREATE TABLE detalle_compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    compra_id INT,
    producto_id INT,
    cantidad INT,
    precio DECIMAL(10, 2),
    FOREIGN KEY (compra_id) REFERENCES compras(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- Tabla para ventas
CREATE TABLE ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_comprobante ENUM('Factura', 'Boleta'),
    nro_comprobante VARCHAR(20),
    fecha_emision DATE,
    cliente_id INT,
    empleado_id INT,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (empleado_id) REFERENCES usuarios(id)
);

-- Tabla para detalles de ventas
CREATE TABLE detalle_ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venta_id INT,
    producto_id INT,
    cantidad INT,
    precio DECIMAL(10, 2),
    FOREIGN KEY (venta_id) REFERENCES ventas(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- Tabla para respaldos
CREATE TABLE respaldos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha_respaldo TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ruta_respaldo VARCHAR(255)
);