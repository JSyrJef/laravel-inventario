# Laravel 12 – Sistema de Gestión de Productos e Inventario

Aplicación web desarrollada con Laravel 12 para gestionar productos e inventario. Incluye autenticación, control de stock y diseño responsivo con Tailwind CSS.

## ✨ Tecnologías Utilizadas

- **Laravel 12** – Framework principal
- **Tailwind CSS** – Estilos responsivos
- **MySQL** – Base de datos relacional
- **Blade** – Motor de plantillas
- **Eloquent ORM** – Manejo de base de datos
- **Laravel Breeze** – Autenticación sencilla

## 📁 Estructura del Proyecto

- `/app/Models` – Modelos `Product` y `InventoryMovement`
- `/app/Http/Controllers` – Controladores principales `InventoryMovementController` y `ProductController`
- `/resources/views` – Vistas Blade organizadas
- `/routes/web.php` – Rutas web
- `/database/migrations` – Esquema de base de datos
- `/database/seeders` – Seeder para usuario admin

## ⚙️ Configuración Inicial

1. Clonar el proyecto o crear uno nuevo:
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

2. Configurar `.env` para base de datos MySQL
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD=tu_contraseña_mysql
```
3. Ejecutar migraciones y seeder:
```bash
php artisan migrate --seed
```

4. Crear enlace simbólico de almacenamiento:
```bash
php artisan storage:link
```

5. Iniciar el servidor local:
```bash
php artisan serve
```

## 📅 Funcionalidades

### Productos
- Crear, ver, editar, eliminar productos
- Campos: nombre, descripción, precio, imagen, cantidad
- Búsqueda y filtrado de productos

### Inventario
- Registrar entradas/salidas de stock
- Historial de movimientos
- Actualización automática del stock

## 🔐 Usuario Predeterminado

Al iniciar por primera vez, se crea automáticamente un usuario:

> Crendenciales de Usuario Predeterminado 🔐
- **Correo**: `admin@example.com`
- **Contraseña**: `admin20#25`

> ⚠️ Cambiar la contraseña al iniciar sesión por seguridad.

---
