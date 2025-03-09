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
Crea las tablas en la base de datos ejecutando las migraciones y agrega los seeders para poblar las tablas:

```bash
artisan migrate --seed

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

## 👥 Usuarios por defecto

Al ejecutar las migraciones y los seeders (`php artisan migrate --seed`), se crearán los siguientes usuarios por defecto:

- **Admin:**
  - **Nombre**: JEBC-DEV
  - **Email**: admin@admin.com
  - **Contraseña**: password

- **User:**
  - **Nombre**: user
  - **Email**: user@user.com
  - **Contraseña**: password

- **Guest:**
  - **Nombre**: guest
  - **Email**: guest@guest.com
  - **Contraseña**: password


## 💡 Uso

A continuación, se describen los pasos para utilizar las funcionalidades principales del proyecto:

---

### 1️⃣ Crear un evento

- Haz clic en el botón **"Crear evento"**.
- Completa el formulario con los siguientes detalles del evento:
    - **Título**: Nombre del evento.
    - **Fecha de inicio**: Fecha y hora en que comienza el evento.
    - **Fecha de fin**: Fecha y hora en que termina el evento.
    - **Descripción**: Información adicional sobre el evento (opcional).
- Haz clic en **"Guardar"** para crear el evento.

---

### 2️⃣ Editar un evento

- Haz clic en el evento que deseas editar en el calendario.
- Modifica los detalles del evento en el formulario:
    - Cambia el título, la fecha de inicio, la fecha de fin o la descripción.
- Haz clic en **"Guardar"** para aplicar los cambios.

---

### 3️⃣ Eliminar un evento

- Haz clic en el evento que deseas eliminar en el calendario.
- Confirma la eliminación cuando se te solicite.
- El evento se eliminará permanentemente del calendario.

---

### 4️⃣ Visualizar eventos

- Todos los eventos creados se mostrarán en el calendario.
- Puedes hacer clic en cualquier evento para ver sus detalles completos.

---

### 5️⃣ Navegar por el calendario

- Usa las flechas de navegación para moverte entre meses.
- Haz clic en un día específico para ver los eventos programados en esa fecha.

---

### 6️⃣ Crear una categoría

- Haz clic en el botón **"Crear categoría"**.
- Completa el formulario con los siguientes detalles:
    - **Nombre**: Nombre de la categoría.
    - **Descripción**: Información adicional sobre la categoría (opcional).
- Haz clic en **"Guardar"** para crear la categoría.

---

### 7️⃣ Editar una categoría

- Haz clic en la categoría que deseas editar.
- Modifica los detalles de la categoría en el formulario:
    - Cambia el nombre o la descripción.
- Haz clic en **"Guardar"** para aplicar los cambios.

---

### 8️⃣ Eliminar una categoría

- Haz clic en la categoría que deseas eliminar.
- Confirma la eliminación cuando se te solicite.
- La categoría se eliminará permanentemente.

---

### 9️⃣ Crear un contacto

- Haz clic en el botón **"Crear contacto"**.
- Completa el formulario con los siguientes detalles:
    - **Nombre**: Nombre del contacto.
    - **Email**: Correo electrónico del contacto.
    - **Teléfono**: Número de teléfono del contacto.
    - **Dirección**: Dirección del contacto.
    - **Categoría**: Selecciona una categoría existente para el contacto.
- Haz clic en **"Guardar"** para crear el contacto.

---

### 🔟 Editar un contacto

- Haz clic en el contacto que deseas editar.
- Modifica los detalles del contacto en el formulario:
    - Cambia el nombre, email, teléfono, dirección o categoría.
- Haz clic en **"Guardar"** para aplicar los cambios.

---

### 1️⃣1️⃣ Eliminar un contacto

- Haz clic en el contacto que deseas eliminar.
- Confirma la eliminación cuando se te solicite.
- El contacto se eliminará permanentemente.

---

### 1️⃣2️⃣ Visualizar contactos

- Todos los contactos creados se mostrarán en la lista de contactos.
- Puedes hacer clic en cualquier contacto para ver sus detalles completos.

---


