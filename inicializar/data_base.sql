
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

INSERT INTO `proveedores` (`id`, `razon_social`, `ruc`, `direccion`, `telefono`, `email`, `url`) VALUES
(1, 'ElectroPeru SA', '20123456789', 'Av. Electronica 101', '987654325', 'contacto@electroperu.com', 'http://www.electroperu.com'),
(2, 'ModaPeru SRL', '20456789012', 'Av. Moda 202', '987654326', 'ventas@modaperu.com', 'http://www.modaperu.com'),
(3, 'TecnoMundo SAC', '20345678901', 'Calle Tecnologia 303', '987654327', 'info@tecnomundo.com', 'http://www.tecnomundo.com'),
(4, 'Distribuidora Digital SAC', '20567890123', 'Jr. Digital 404', '987654328', 'ventas@distribuidoradigital.com', 'http://www.distribuidoradigital.com'),
(5, 'Gadgets EIRL', '20678901234', 'Av. Gadgets 505', '987654329', 'contacto@gadgetseirl.com', 'http://www.gadgetseirl.com'),
(6, 'Innovatech SA', '20789012345', 'Calle Innovacion 606', '987654330', 'soporte@innovatech.com', 'http://www.innovatech.com'),
(7, 'Electronica y Mas SAC', '20890123456', 'Av. Electronica 707', '987654331', 'info@electronicaymas.com', 'http://www.electronicaymas.com'),
(8, 'Tecnologia Global SRL', '20901234567', 'Jr. Tecnologia 808', '987654332', 'contacto@tecnologiaglobal.com', 'http://www.tecnologiaglobal.com'),
(9, 'Importaciones del Sur SAC', '21012345678', 'Av. Sur 909', '987654333', 'ventas@importacionesdelsur.com', 'http://www.importacionesdelsur.com'),
(10, 'Comercializadora Andina SRL', '21123456789', 'Calle Andina 1010', '987654334', 'ventas@comercializadoraandina.com', 'http://www.comercializadoraandina.com');

INSERT INTO `unidades_medida` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Unidad', 'Cantidad por unidad'),
(2, 'Caja', 'Cantidad por caja'),
(3, 'Paquete', 'Cantidad por paquete'),
(4, 'Pieza', 'Cantidad por pieza individual'),
(5, 'Juego', 'Conjunto de artículos vendidos como un juego'),
(6, 'Metro', 'Medida en metros'),
(7, 'Litro', 'Medida en litros'),
(8, 'Gigabyte', 'Capacidad de almacenamiento en gigabytes'),
(9, 'Terabyte', 'Capacidad de almacenamiento en terabytes'),
(10, 'Par', 'Cantidad por par, generalmente usado para auriculares u otros artículos en pares');

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `sexo`, `fecha_nacimiento`, `tipo_documento`, `nro_documento`, `foto`, `direccion`, `telefono`, `email`, `estado`, `username`, `password`, `tipo_usuario`) VALUES
(1, 'Juan', 'Pérez', 'M', '1980-01-01', 'DNI', '12345678', NULL, 'Calle Falsa 123', '987654321', 'juan.perez@example.com', 'Activo', 'jperez', 'password123', 'Administrador'),
(2, 'Ana', 'García', 'F', '1990-05-10', 'Pasaporte', 'A1234567', NULL, 'Avenida Siempre Viva 456', '987654322', 'ana.garcia@example.com', 'Activo', 'agarcia', 'password456', 'Empleado'),
(3, 'Carlos', 'Sánchez', 'M', '1985-07-23', 'DNI', '87654321', NULL, 'Calle Los Sauces 789', '987654323', 'carlos.sanchez@example.com', 'Inactivo', 'csanchez', 'password789', 'Empleado'),
(4, 'Laura', 'Martínez', 'F', '1987-03-12', 'DNI', '23456789', NULL, 'Av. Las Palmeras 345', '987654324', 'laura.martinez@example.com', 'Activo', 'lmartinez', 'password101', 'Empleado'),
(5, 'Miguel', 'Rodríguez', 'M', '1992-09-30', 'Pasaporte', 'B2345678', NULL, 'Jr. Los Olivos 678', '987654325', 'miguel.rodriguez@example.com', 'Activo', 'mrodriguez', 'password202', 'Empleado'),
(6, 'Paola', 'Hernández', 'F', '1984-11-25', 'DNI', '34567890', NULL, 'Calle Las Flores 901', '987654326', 'paola.hernandez@example.com', 'Inactivo', 'phernandez', 'password303', 'Empleado'),
(7, 'Ricardo', 'Jiménez', 'M', '1989-04-18', 'DNI', '45678901', NULL, 'Av. Las Estrellas 234', '987654327', 'ricardo.jimenez@example.com', 'Activo', 'rjimenez', 'password404', 'Administrador'),
(8, 'Sandra', 'Torres', 'F', '1995-07-16', 'Pasaporte', 'C3456789', NULL, 'Jr. Las Lunas 567', '987654328', 'sandra.torres@example.com', 'Activo', 'storres', 'password505', 'Empleado'),
(9, 'David', 'Castillo', 'M', '1983-02-09', 'DNI', '56789012', NULL, 'Calle Las Aves 890', '987654329', 'david.castillo@example.com', 'Inactivo', 'dcastillo', 'password606', 'Empleado'),
(10, 'Elena', 'Ramírez', 'F', '1990-06-22', 'Pasaporte', 'D4567890', NULL, 'Av. Las Montañas 123', '987654330', 'elena.ramirez@example.com', 'Activo', 'eramirez', 'password707', 'Empleado'),
(11, 'Fernando', 'Gómez', 'M', '1986-12-03', 'DNI', '67890123', NULL, 'Jr. Los Ríos 456', '987654331', 'fernando.gomez@example.com', 'Activo', 'fgomez', 'password808', 'Administrador');


INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Electrónica', 'Productos electrónicos como celulares, laptops, etc.'),
(2, 'Accesorios', 'Accesorios tecnológicos como teclados, ratones, cargadores, etc.'),
(3, 'Pantallas', 'Monitores y televisores de distintas marcas y tamaños'),
(4, 'Impresoras', 'Impresoras láser y de inyección de tinta'),
(5, 'Fotografía', 'Cámaras y accesorios relacionados con la fotografía'),
(6, 'Audio', 'Dispositivos de audio como auriculares y altavoces'),
(7, 'Almacenamiento', 'Dispositivos de almacenamiento como discos duros y SSDs'),
(8, 'Proyectores', 'Proyectores para entretenimiento y presentaciones'),
(9, 'Consolas', 'Consolas de videojuegos y accesorios relacionados'),
(10, 'Redes', 'Equipos de red como routers y sistemas mesh'),
(11, 'Componentes de PC', 'Componentes para computadoras como tarjetas gráficas, procesadores, y más');

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `tipo_documento`, `nro_documento`, `direccion`, `telefono`, `email`) VALUES
(1, 'Carlos', 'Gomez', 'DNI', '33445566', 'Calle Luna 456', '987654323', 'carlos.gomez@example.com'),
(2, 'Lucia', 'Martinez', 'DNI', '55667788', 'Av. Sol 789', '987654324', 'lucia.martinez@example.com'),
(3, 'Juan', 'Lopez', 'DNI', '77889900', 'Calle Estrella 123', '987654325', 'juan.lopez@example.com'),
(4, 'Maria', 'Fernandez', 'DNI', '11223344', 'Av. Primavera 456', '987654326', 'maria.fernandez@example.com'),
(5, 'Pedro', 'Perez', 'DNI', '44556677', 'Jr. Las Flores 789', '987654327', 'pedro.perez@example.com'),
(6, 'Ana', 'Torres', 'Pasaporte', 'P1234567', 'Calle Mar 101', '987654328', 'ana.torres@example.com'),
(7, 'Luis', 'Ramirez', 'DNI', '99887766', 'Av. Libertad 202', '987654329', 'luis.ramirez@example.com'),
(8, 'Carmen', 'Diaz', 'DNI', '22334455', 'Jr. Amanecer 303', '987654330', 'carmen.diaz@example.com'),
(9, 'Miguel', 'Vega', 'Pasaporte', 'P7654321', 'Calle Sol 404', '987654331', 'miguel.vega@example.com'),
(10, 'Sara', 'Mendoza', 'DNI', '66778899', 'Av. Horizonte 505', '987654332', 'sara.mendoza@example.com');


INSERT INTO `productos` (`id`, `descripcion`, `marca`, `modelo`, `stock_inicial`, `stock_actual`, `categoria_id`, `unidad_medida_id`) VALUES
(201, 'iPhone 13', 'Apple', 'A2633', 50, 50, 1, 1),
(202, 'Celular', 'Samsung', 'A5', 200, 200, 2, 1),
(203, 'Laptop', 'Dell', 'Inspiron 15', 30, 30, 1, 1),
(204, 'Tablet', 'Apple', 'iPad Pro', 40, 40, 1, 1),
(205, 'Smartwatch', 'Samsung', 'Galaxy Watch 4', 150, 150, 2, 1),
(206, 'Monitor', 'LG', 'UltraWide 34\"', 20, 20, 3, 1),
(207, 'Teclado', 'Logitech', 'MX Keys', 100, 100, 4, 1),
(208, 'Mouse', 'Razer', 'DeathAdder V2', 80, 80, 4, 1),
(209, 'Impresora', 'HP', 'LaserJet Pro M404', 15, 15, 5, 1),
(210, 'Cámara', 'Canon', 'EOS R5', 10, 10, 6, 1),
(211, 'Audífonos', 'Sony', 'WH-1000XM4', 60, 60, 7, 1),
(212, 'Disco Duro', 'Seagate', 'Backup Plus 4TB', 50, 50, 8, 1),
(213, 'SSD', 'Samsung', 'EVO 970 1TB', 120, 120, 8, 1),
(214, 'Proyector', 'Epson', 'Home Cinema 2150', 10, 10, 9, 1),
(215, 'Smartphone', 'Xiaomi', 'Mi 11', 200, 200, 2, 1),
(216, 'Consola', 'Sony', 'PlayStation 5', 25, 25, 10, 1),
(217, 'TV', 'Samsung', 'QLED 55\"', 30, 30, 9, 1),
(218, 'Router', 'Netgear', 'Nighthawk RAX50', 40, 40, 10, 1),
(219, 'Disco Externo', 'Western Digital', 'My Passport 2TB', 60, 60, 8, 1),
(220, 'Adaptador USB-C', 'Apple', 'Multiport Adapter', 100, 100, 10, 1),
(221, 'Auriculares', 'Beats', 'Studio3', 50, 50, 7, 1),
(222, 'Cámara Web', 'Logitech', 'C920', 150, 150, 6, 1),
(223, 'MicroSD', 'SanDisk', 'Ultra 128GB', 200, 200, 10, 1),
(224, 'Altavoz Bluetooth', 'JBL', 'Flip 5', 80, 80, 10, 1),
(225, 'Laptop', 'Apple', 'MacBook Air M1', 50, 50, 1, 1),
(226, 'Tablet', 'Samsung', 'Galaxy Tab S7', 30, 30, 1, 1),
(227, 'Smartphone', 'OnePlus', '9 Pro', 100, 100, 2, 1),
(228, 'Reloj Inteligente', 'Garmin', 'Fenix 6', 75, 75, 2, 1),
(229, 'Router Mesh', 'Google', 'Nest WiFi', 50, 50, 10, 1),
(230, 'Smart TV', 'LG', 'OLED 65\"', 20, 20, 9, 1),
(231, 'Monitor', 'ASUS', 'ROG Swift 27\"', 25, 25, 3, 1),
(232, 'Memoria RAM', 'Corsair', 'Vengeance 16GB', 150, 150, 10, 1),
(233, 'Case PC', 'NZXT', 'H510', 40, 40, 9, 1),
(234, 'Tarjeta Gráfica', 'NVIDIA', 'RTX 3080', 15, 15, 10, 1),
(235, 'Procesador', 'AMD', 'Ryzen 7 5800X', 50, 50, 10, 1),
(236, 'Placa Base', 'ASUS', 'ROG Strix B550-F', 60, 60, 10, 1),
(237, 'Fuente de Poder', 'EVGA', 'SuperNOVA 750W', 30, 30, 10, 1),
(238, 'Unidad Flash', 'Kingston', 'DataTraveler 64GB', 200, 200, 10, 1),
(239, 'Cargador', 'Anker', 'PowerPort Atom', 100, 100, 10, 1),
(240, 'Smartphone', 'Google', 'Pixel 6', 100, 100, 2, 1);
-- ---

--
INSERT INTO `compras` (`id`, `tipo_comprobante`, `nro_comprobante`, `fecha_emision`, `proveedor_id`) VALUES
(1, 'Factura', 'F001-000001', '2023-01-15', 1),
(2, 'Boleta', 'B001-000002', '2023-02-10', 2),
(3, 'Factura', 'F001-000003', '2023-03-20', 3),
(4, 'Boleta', 'B001-000004', '2023-04-25', 4),
(5, 'Factura', 'F001-000005', '2023-05-30', 5),
(6, 'Boleta', 'B001-000006', '2023-06-10', 6),
(7, 'Factura', 'F001-000007', '2023-07-15', 7),
(8, 'Boleta', 'B001-000008', '2023-08-20', 8),
(9, 'Factura', 'F001-000009', '2023-09-25', 9),
(10, 'Boleta', 'B001-000010', '2023-10-30', 10),
(11, 'Factura', 'F001-000011', '2023-11-05', 1),
(12, 'Boleta', 'B001-000012', '2023-12-10', 2),
(13, 'Factura', 'F001-000013', '2024-01-15', 3),
(14, 'Boleta', 'B001-000014', '2024-02-20', 4),
(15, 'Factura', 'F001-000015', '2024-03-25', 5),
(16, 'Boleta', 'B001-000016', '2024-04-30', 6),
(17, 'Factura', 'F001-000017', '2024-05-05', 7),
(18, 'Boleta', 'B001-000018', '2024-06-10', 8),
(19, 'Factura', 'F001-000019', '2024-07-15', 9),
(20, 'Boleta', 'B001-000020', '2024-08-20', 10),
(21, 'Factura', 'F001-000021', '2024-09-25', 1),
(22, 'Boleta', 'B001-000022', '2024-10-30', 2),
(23, 'Factura', 'F001-000023', '2024-11-05', 3),
(24, 'Boleta', 'B001-000024', '2024-12-10', 4),
(25, 'Factura', 'F001-000025', '2023-01-20', 5),
(26, 'Boleta', 'B001-000026', '2023-02-25', 6),
(27, 'Factura', 'F001-000027', '2023-03-30', 7),
(28, 'Boleta', 'B001-000028', '2023-04-10', 8),
(29, 'Factura', 'F001-000029', '2023-05-15', 9),
(30, 'Boleta', 'B001-000030', '2023-06-20', 10),
(31, 'Factura', 'F001-000031', '2023-07-25', 1),
(32, 'Boleta', 'B001-000032', '2023-08-30', 2),
(33, 'Factura', 'F001-000033', '2023-09-05', 3),
(34, 'Boleta', 'B001-000034', '2023-10-10', 4),
(35, 'Factura', 'F001-000035', '2023-11-15', 5),
(36, 'Boleta', 'B001-000036', '2023-12-20', 6),
(37, 'Factura', 'F001-000037', '2024-01-05', 7),
(38, 'Boleta', 'B001-000038', '2024-02-10', 8),
(39, 'Factura', 'F001-000039', '2024-03-15', 9),
(40, 'Boleta', 'B001-000040', '2024-04-20', 10);


INSERT INTO `detalle_compras` (`id`, `compra_id`, `producto_id`, `cantidad`, `precio`) VALUES
(43, 1, 201, 10, 1200.00),
(44, 1, 202, 5, 50.00),
(45, 2, 203, 20, 900.00),
(46, 3, 204, 15, 800.00),
(47, 3, 205, 30, 250.00),
(48, 4, 206, 7, 200.00),
(49, 5, 207, 25, 75.00),
(50, 6, 208, 15, 90.00),
(51, 7, 209, 3, 150.00),
(52, 8, 210, 10, 300.00),
(53, 9, 211, 20, 60.00),
(54, 10, 212, 5, 75.00),
(55, 11, 213, 30, 1500.00),
(56, 12, 214, 50, 1000.00),
(57, 13, 215, 12, 60.00),
(58, 14, 216, 10, 1300.00),
(59, 15, 217, 20, 400.00),
(60, 16, 218, 5, 200.00),
(61, 17, 219, 8, 75.00),
(62, 18, 220, 3, 150.00),
(63, 19, 221, 25, 50.00),
(64, 20, 222, 15, 90.00),
(65, 21, 223, 10, 120.00),
(66, 22, 224, 7, 70.00),
(67, 23, 225, 10, 1500.00),
(68, 24, 201, 12, 1100.00),
(69, 25, 202, 5, 1200.00),
(70, 26, 203, 8, 250.00),
(71, 27, 204, 10, 300.00),
(72, 28, 205, 6, 900.00),
(73, 29, 206, 4, 800.00),
(74, 30, 207, 10, 60.00),
(75, 31, 208, 25, 120.00),
(76, 32, 209, 20, 200.00),
(77, 33, 210, 15, 400.00),
(78, 34, 211, 10, 75.00),
(79, 35, 212, 8, 150.00),
(80, 36, 213, 3, 50.00),
(81, 37, 214, 5, 90.00),
(82, 38, 215, 20, 1200.00),
(83, 39, 216, 10, 1300.00),
(84, 40, 217, 15, 50.00);



INSERT INTO `ventas` (`id`, `tipo_comprobante`, `nro_comprobante`, `fecha_emision`, `cliente_id`, `empleado_id`) VALUES
(1, 'Factura', 'F001-000041', '2023-10-05', 1, 1),
(2, 'Boleta', 'B001-000042', '2023-10-10', 2, 2),
(3, 'Factura', 'F001-000043', '2023-10-15', 3, 3),
(4, 'Boleta', 'B001-000044', '2023-10-20', 4, 4),
(5, 'Factura', 'F001-000045', '2023-10-25', 5, 5),
(6, 'Boleta', 'B001-000046', '2023-11-05', 6, 6),
(7, 'Factura', 'F001-000047', '2023-11-10', 7, 7),
(8, 'Boleta', 'B001-000048', '2023-11-15', 8, 8),
(9, 'Factura', 'F001-000049', '2023-11-20', 9, 9),
(10, 'Boleta', 'B001-000050', '2023-11-25', 10, 10),
(11, 'Factura', 'F001-000051', '2023-12-01', 1, 1),
(12, 'Boleta', 'B001-000052', '2023-12-10', 2, 2),
(13, 'Factura', 'F001-000053', '2023-12-15', 3, 3),
(14, 'Boleta', 'B001-000054', '2023-12-20', 4, 4),
(15, 'Factura', 'F001-000055', '2023-12-25', 5, 5),
(16, 'Boleta', 'B001-000056', '2023-12-30', 6, 6),
(17, 'Factura', 'F001-000057', '2024-01-05', 7, 7),
(18, 'Boleta', 'B001-000058', '2024-01-10', 8, 8),
(19, 'Factura', 'F001-000059', '2024-01-15', 9, 9),
(20, 'Boleta', 'B001-000060', '2024-01-20', 10, 10),
(21, 'Factura', 'F001-000061', '2024-02-01', 1, 1),
(22, 'Boleta', 'B001-000062', '2024-02-05', 2, 2),
(23, 'Factura', 'F001-000063', '2024-02-10', 3, 3),
(24, 'Boleta', 'B001-000064', '2024-02-15', 4, 4),
(25, 'Factura', 'F001-000065', '2024-02-20', 5, 5),
(26, 'Boleta', 'B001-000066', '2024-02-25', 6, 6),
(27, 'Factura', 'F001-000067', '2024-03-01', 7, 7),
(28, 'Boleta', 'B001-000068', '2024-03-05', 8, 8),
(29, 'Factura', 'F001-000069', '2024-03-10', 9, 9),
(30, 'Boleta', 'B001-000070', '2024-03-15', 10, 10),
(31, 'Factura', 'F001-000071', '2024-03-20', 1, 1),
(32, 'Boleta', 'B001-000072', '2024-03-25', 2, 2),
(33, 'Factura', 'F001-000073', '2024-04-01', 3, 3),
(34, 'Boleta', 'B001-000074', '2024-04-05', 4, 4),
(35, 'Factura', 'F001-000075', '2024-04-10', 5, 5),
(36, 'Boleta', 'B001-000076', '2024-04-15', 6, 6),
(37, 'Factura', 'F001-000077', '2024-04-20', 7, 7),
(38, 'Boleta', 'B001-000078', '2024-04-25', 8, 8),
(39, 'Factura', 'F001-000079', '2024-05-01', 9, 9),
(40, 'Boleta', 'B001-000080', '2024-05-05', 10, 10);
INSERT INTO `detalle_ventas` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 1, 201, 10, 1300.00),
(2, 1, 202, 5, 1200.00),
(3, 2, 203, 15, 900.00),
(4, 3, 204, 8, 800.00),
(5, 3, 205, 12, 750.00),
(6, 4, 206, 20, 200.00),
(7, 5, 207, 7, 75.00),
(8, 6, 208, 25, 90.00),
(9, 7, 209, 10, 150.00),
(10, 8, 210, 15, 300.00),
(11, 9, 211, 5, 60.00),
(12, 10, 212, 20, 75.00),
(13, 11, 213, 10, 1500.00),
(14, 12, 214, 5, 1000.00),
(15, 13, 215, 8, 60.00),
(16, 14, 216, 12, 1300.00),
(17, 15, 217, 10, 400.00),
(18, 16, 218, 15, 200.00),
(19, 17, 219, 7, 75.00),
(20, 18, 220, 10, 150.00),
(21, 19, 221, 5, 50.00),
(22, 20, 222, 20, 90.00),
(23, 21, 223, 8, 120.00),
(24, 22, 224, 6, 70.00),
(25, 23, 225, 15, 1500.00),
(26, 24, 201, 5, 1100.00),
(27, 25, 202, 10, 1200.00),
(28, 26, 203, 12, 250.00),
(29, 27, 204, 7, 300.00),
(30, 28, 205, 8, 900.00),
(31, 29, 206, 5, 800.00),
(32, 30, 207, 15, 60.00),
(33, 31, 208, 10, 120.00),
(34, 32, 209, 7, 200.00),
(35, 33, 210, 8, 400.00),
(36, 34, 211, 6, 75.00),
(37, 35, 212, 5, 150.00),
(38, 36, 213, 20, 50.00),
(39, 37, 214, 10, 90.00),
(40, 38, 215, 12, 1300.00),
(41, 39, 216, 5, 1200.00),
(42, 40, 217, 15, 900.00);
