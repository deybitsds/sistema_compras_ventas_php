
INSERT INTO usuarios (nombre, apellido, sexo, fecha_nacimiento, tipo_documento, nro_documento, foto, direccion, telefono, email, estado, username, password, tipo_usuario)
VALUES 
('Juan', 'Pérez', 'M', '1980-01-01', 'DNI', '12345678', NULL, 'Calle Falsa 123', '987654321', 'juan.perez@example.com', 'Activo', 'jperez', 'password123', 'Administrador'),
('Ana', 'García', 'F', '1990-05-10', 'Pasaporte', 'A1234567', NULL, 'Avenida Siempre Viva 456', '987654322', 'ana.garcia@example.com', 'Activo', 'agarcia', 'password456', 'Empleado'),
('Carlos', 'Sánchez', 'M', '1985-07-23', 'DNI', '87654321', NULL, 'Calle Los Sauces 789', '987654323', 'carlos.sanchez@example.com', 'Inactivo', 'csanchez', 'password789', 'Empleado');

INSERT INTO categorias (nombre, descripcion)
VALUES 
('Electrónica', 'Productos electrónicos como celulares, laptops, etc.'),
('Ropa', 'Todo tipo de prendas de vestir');

INSERT INTO unidades_medida (nombre, descripcion)
VALUES 
('Unidad', 'Cantidad por unidad'),
('Caja', 'Cantidad por caja');

INSERT INTO productos (descripcion, marca, modelo, stock_inicial, stock_actual, categoria_id, unidad_medida_id)
VALUES 
('iPhone 13', 'Apple', 'A2633', 50, 50, 1, 1),
('Jeans', 'Levis', '501', 200, 200, 2, 1);

INSERT INTO clientes (nombre, apellido, tipo_documento, nro_documento, direccion, telefono, email)
VALUES 
('Carlos', 'Gomez', 'DNI', '33445566', 'Calle Luna 456', '987654323', 'carlos.gomez@example.com'),
('Lucia', 'Martinez', 'DNI', '55667788', 'Av. Sol 789', '987654324', 'lucia.martinez@example.com');

INSERT INTO proveedores (razon_social, ruc, direccion, telefono, email, url)
VALUES 
('ElectroPeru SA', '20123456789', 'Av. Electronica 101', '987654325', 'contacto@electroperu.com', 'http://www.electroperu.com'),
('ModaPeru SRL', '20456789012', 'Av. Moda 202', '987654326', 'ventas@modaperu.com', 'http://www.modaperu.com');

INSERT INTO compras (tipo_comprobante, nro_comprobante, fecha_emision, proveedor_id)
VALUES 
('Factura', 'F001-000001', '2024-07-01', 1),
('Boleta', 'B001-000002', '2024-07-02', 2);

INSERT INTO detalle_compras (compra_id, producto_id, cantidad, precio)
VALUES 
(1, 1, 30, 1200.00),
(2, 2, 100, 50.00);

INSERT INTO ventas (tipo_comprobante, nro_comprobante, fecha_emision, cliente_id, empleado_id)
VALUES 
('Factura', 'F001-000003', '2024-07-03', 1, 1),
('Boleta', 'B001-000004', '2024-07-04', 2, 2);

INSERT INTO detalle_ventas (venta_id, producto_id, cantidad, precio)
VALUES 
(1, 1, 10, 1300.00),
(2, 2, 50, 60.00);