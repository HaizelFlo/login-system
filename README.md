# Login System

Sistema web para la administración de usuarios, roles y permisos, desarrollado con Laravel y MySQL.

El proyecto permite registrar e iniciar sesión, administrar usuarios mediante operaciones CRUD, asignar roles a usuarios y asignar permisos a cada rol.

## Funcionalidades

- Registro de usuarios.
- Inicio y cierre de sesión.
- CRUD de usuarios.
- CRUD de roles.
- CRUD de permisos.
- Asignación de roles a usuarios.
- Asignación de permisos a roles.
- Protección de rutas mediante middleware.
- Control de acceso según roles y permisos.
- Contraseñas cifradas.
- Dashboard con estadísticas.
- Interfaz responsive con Bootstrap 5.

## Tecnologías utilizadas

- PHP 8.2
- Laravel 12
- MySQL
- Blade
- Bootstrap 5
- Bootstrap Icons
- Laravel Breeze
- Composer
- Node.js
- npm
- Git
- GitHub

## Requisitos

Antes de instalar el proyecto es necesario tener:

- PHP 8.2 o superior.
- Composer.
- MySQL.
- Node.js y npm.
- Git.

## Instalación 

### 1. Clonar el repositorio

git clone https://github.com/HaizelFlo/login-system.git
cd login-system

composer install

npm install

### 2. Configurar .env

cp .env.example .env

php artisan key:generate

### 3. Base de datos

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=login_system
DB_USERNAME=root
DB_PASSWORD=

### 4. Ejecutar migraciones

php artisan migrate --seed

### 5. Compilar assets

npm run build

### 6. Ejecutar Laravel

php artisan serve

### 7. Abrir el navegador

http://127.0.0.1:8000

### 8. Usuario de Prueba

Correo:
admin@test.com

Contraseña:
Admin1234*
