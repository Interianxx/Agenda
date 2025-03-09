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

### Crear un evento
Para crear un evento, haz clic en el botón **"Crear evento"** y completa el formulario con el título, la fecha de inicio y fin, así como una descripción (opcional). Luego, haz clic en **"Guardar"** para añadir el evento al calendario.

### Editar un evento
Para editar un evento, simplemente haz clic sobre él en el calendario. Modifica los detalles como el título, las fechas y la descripción, y haz clic en **"Guardar"** para aplicar los cambios.

### Eliminar un evento
Haz clic sobre el evento que deseas eliminar en el calendario y confirma la eliminación cuando se te solicite. El evento se eliminará de forma permanente.

### Visualizar eventos
Todos los eventos creados se muestran en el calendario. Puedes hacer clic en cualquiera de ellos para ver los detalles completos.

### Navegar por el calendario
Usa las flechas de navegación para moverte entre los meses o selecciona un día específico para ver los eventos programados en esa fecha.

### Crear y gestionar categorías
Puedes crear nuevas categorías haciendo clic en **"Crear categoría"**, completando los detalles del nombre y descripción. Para editar o eliminar una categoría, simplemente selecciona la categoría y modifica o elimina la información.

### Gestionar contactos
Para agregar un contacto, haz clic en **"Crear contacto"** e ingresa los detalles necesarios, como nombre, correo electrónico, teléfono, dirección y categoría. Los contactos pueden ser editados o eliminados de la misma manera, seleccionándolos en la lista y aplicando los cambios necesarios.

## 📞 Contacto

Si tienes alguna pregunta o sugerencia, no dudes en contactarme:

- **Nombre**: [Jose Alejandro Interian Pech, Carla Escalante, Jose Ramirez]
- **Email**: [al070687@uacam.mx, al064216@uacam.mx, al064255@uacam.mx]]

¡Gracias por usar este proyecto! 😊

---

## 📝 Notas adicionales
[Documentacion Tecnica](https://docs.google.com/document/d/1uCUN15h_a27egQzZ4Og-VgUFjkUhaxZrPLefDkJm6JY/edit?tab=t.0 )



