# Agenda - Gestión de Eventos con Laravel

<p align="center"> 
  <a href="https://github.com/Interianxx/Agenda" target="_blank"> 
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Logo del Proyecto"> 
  </a> 
</p>

## 📌 Descripción del Proyecto

Agenda es un sistema de gestión de eventos desarrollado con **Laravel**. Permite a los usuarios crear, editar, eliminar y visualizar eventos en un **calendario interactivo**.  
El proyecto está diseñado para ser **fácil de usar** y **altamente personalizable**.

## ⚙️ Requisitos previos

Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:

- **PHP** (versión 8.0 o superior)
- **Composer** (gestor de dependencias de PHP)
- **Node.js** (para compilar assets)
- **MySQL** o cualquier otro sistema de gestión de bases de datos compatible con Laravel
- **Git** (opcional, pero recomendado)

---

## 🚀 Instalación

Sigue estos pasos para clonar y configurar el proyecto en tu entorno local:

### 1️⃣ Clonar el repositorio
Ejecuta el siguiente comando en tu terminal:
```bash
git clone https://github.com/Interianxx/Agenda.git
```

### 2️⃣ Navegar a la carpeta del proyecto
```bash
cd Agenda
```

### 3️⃣ Instalar las dependencias con Composer
```bash
composer install
```

### 4️⃣ Configurar el archivo `.env`
Copia el archivo `.env.example` y renómbralo a `.env`. Luego, edita el archivo `.env` para configurar las variables de entorno, como la conexión a la base de datos:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

```

### 5️⃣ Generar la clave de aplicación
Ejecuta el siguiente comando para generar una clave de aplicación:

```bash
php artisan key:generate

```

### 6️⃣ Generar la clave de aplicación
Crea las tablas en la base de datos ejecutando las migraciones:

```bash
php artisan migrate

```

### 7️⃣ Instalar dependencias de JavaScript
El proyecto usa Node.js para compilar assets (como CSS o JavaScript), para las dependencias y compilarlas:

```bash
npm install
npm run dev
```

### 8️⃣ Ejecutar el proyecto
Una vez configurado, inicia el servidor de desarrollo de Laravel:

```bash
php artisan serve
```

El proyecto estara disponible en: 
[php artisan serve](http://127.0.0.1:8000)
