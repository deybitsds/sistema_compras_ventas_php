### Sistema de Información para Control de Compra y Venta de Computadoras

---

#### Descripción

Este proyecto consiste en un sistema de información diseñado para gestionar la compra y venta de computadoras. Incluye funcionalidades para registrar y gestionar categorías de productos, productos, unidades de medida, clientes, proveedores, empleados, compras y ventas, así como para generar diversos reportes. El sistema está desarrollado en PHP, utilizando MySQL para la gestión de la base de datos, y HTML/CSS para el front-end.

---

#### Requerimientos del Sistema

Para ejecutar este sistema correctamente, necesitas:

1. **XAMPP**: Este es un paquete de software libre que incluye el servidor Apache y el sistema de gestión de bases de datos MySQL.
   
   - Descarga e instala XAMPP desde [Apache Friends](https://www.apachefriends.org/index.html).

2. **Navegador Web**: Para acceder a la interfaz del sistema.

---

#### Instrucciones de Instalación

1. **Instalar XAMPP**:
   - Descarga XAMPP desde el enlace proporcionado.
   - Sigue las instrucciones de instalación y asegúrate de que Apache y MySQL estén seleccionados.
   - Una vez instalado, abre XAMPP y haz clic en "Start" para Apache y MySQL.

2. **Configurar el Proyecto**:
   - Descarga o clona el repositorio del proyecto.
   - Copia la carpeta del proyecto `sistema_ventas_compras_php` en la carpeta `htdocs` de tu instalación de XAMPP. Generalmente, la ruta es `C:/xampp/htdocs/`.

3. **Configurar la Base de Datos**:
   - Abre tu navegador web y dirígete a `http://localhost/phpmyadmin`.
   - Crea una nueva base de datos con el nombre `sistema_inventario`.
   - Importa el archivo SQL proporcionado en el proyecto (generalmente llamado `sistema_inventario.sql`) a la base de datos `sistema_inventario`. Esto configurará las tablas necesarias y poblará la base de datos con los datos iniciales.

---

#### Instrucciones de Uso

1. **Acceder al Sistema**:
   - Abre tu navegador web y dirígete a `http://localhost/sistema_ventas_compras_php/`.
   - Si la página principal no se carga automáticamente, navega manualmente a `http://localhost/sistema_ventas_compras_php/index.html`.

2. **Inicio de Sesión**:
   - Usa las credenciales proporcionadas para acceder al sistema:
     - **Usuario Admin**: `jperez` - **Contraseña**: `password123`
     - **Usuario Vendedor**: `agarcia` - **Contraseña**: `password456`
     - **Usuario Inactivo**: `csanchez` - **Contraseña**: `password789`
   - Una vez dentro, podrás navegar por las distintas secciones del sistema usando el menú de navegación.

3. **Gestión de Datos**:
   - **Categorías de Productos**: Añadir, editar y eliminar categorías de productos.
   - **Productos**: Registrar nuevos productos con sus detalles y gestionar su inventario.
   - **Unidades de Medida**: Definir las unidades de medida para los productos.
   - **Clientes y Proveedores**: Gestionar la información de clientes y proveedores.
   - **Empleados**: Añadir y gestionar empleados, incluyendo la capacidad de asignarles acceso al sistema.
   - **Compras y Ventas**: Registrar y gestionar compras y ventas, con actualización automática de inventarios.
   - **Reportes**: Generar reportes detallados de inventarios, ventas, compras y empleados.

---

#### Notas Adicionales

- **Seguridad**: Asegúrate de cambiar las contraseñas predeterminadas y de realizar copias de seguridad periódicas de la base de datos.
- **Personalización**: Puedes modificar los estilos CSS y los scripts PHP según tus necesidades específicas.

---

#### Créditos

Este proyecto fue desarrollado por un equipo de 6 personas como parte del curso de Desarrollo de Software, bajo la supervisión del profesor Edgar Quispe Ccapacca.

---

#### Licencia

Este proyecto está licenciado bajo la Licencia GPL-2.0. Para más información, consulta el archivo LICENSE.

---

Con estas instrucciones, deberías poder instalar y ejecutar el sistema de manera efectiva. Si tienes alguna duda, no dudes en consultarnos. ¡Buena suerte!
