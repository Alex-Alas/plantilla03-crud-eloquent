# 🚀 API RESTful con Laravel 12 - Gestión de Usuarios

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)

Este proyecto es una implementación robusta de una API RESTful desarrollada con el framework **Laravel 12**. El objetivo principal es demostrar la gestión eficiente de datos utilizando **Eloquent ORM**, incluyendo operaciones CRUD completas y manejo de eliminaciones lógicas (Soft Deletes).

Este repositorio sirve como muestra de código limpio, estructurado y siguiendo los estándares modernos de desarrollo backend.

---

## 📋 Tabla de Contenidos

- [Características Principales](#-características-principales)
- [Tecnologías Utilizadas](#-tecnologías-utilizadas)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Documentación de la API](#-documentación-de-la-api)
- [Instalación y Configuración](#-instalación-y-configuración)
- [Autor](#-autor)

---

## ✨ Características Principales

Este sistema backend incluye las siguientes funcionalidades clave:

*   **CRUD Completo:** Creación, lectura, actualización y eliminación de usuarios.
*   **Eloquent ORM:** Uso avanzado de modelos y relaciones de Laravel.
*   **Soft Deletes:** Implementación de borrado lógico para recuperación de datos (papelera de reciclaje).
*   **API Versioning:** Rutas prefijadas por versión (`v1`) para escalabilidad futura.
*   **Validación de Datos:** Uso de Form Requests para asegurar la integridad de la información.
*   **Recursos API:** Uso de `UserResource` para transformación y estandarización de respuestas JSON.

---

## 🛠 Tecnologías Utilizadas

| Tecnología | Versión | Descripción |
| :--- | :---: | :--- |
| **PHP** | 8.2+ | Lenguaje de programación del lado del servidor. |
| **Laravel** | 12.x | Framework PHP utilizado para la arquitectura MVC. |
| **MySQL** | 8.0 | Sistema de gestión de bases de datos relacional. |
| **Composer** | 2.x | Gestor de dependencias para PHP. |
| **Git** | 2.x | Control de versiones. |

---

## 📂 Estructura del Proyecto

A continuación, se destacan los archivos y directorios más relevantes del proyecto:

```
plantilla03-crud-eloquent/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── UserController.php    # Lógica principal de los endpoints
│   │   ├── Requests/                 # Validaciones de entrada
│   │   └── Resources/
│   │       └── UserResource.php      # Formato de respuesta JSON
│   └── Models/
│       └── User.php                  # Modelo Eloquent con SoftDeletes
├── routes/
│   └── api.php                       # Definición de rutas (API v1)
├── database/
│   ├── migrations/                   # Esquema de base de datos
│   └── seeders/                      # Datos de prueba
└── composer.json                     # Dependencias del proyecto
```

---

## 📚 Documentación de la API

La API expone los siguientes endpoints públicos bajo el prefijo `/api/v1/`.

| Método | Endpoint | Descripción | Parámetros Requeridos |
| :---: | :--- | :--- | :--- |
| `GET` | `/users` | Obtener lista de todos los usuarios. | N/A |
| `POST` | `/users` | Registrar un nuevo usuario. | `name`, `email`, `password` |
| `GET` | `/users/{id}` | Obtener detalles de un usuario específico. | `id` (entero) |
| `PUT` | `/users/{id}` | Actualizar un usuario completamente. | `name`, `email` |
| `PATCH` | `/users/{id}` | Actualizar campos específicos de un usuario. | `name` o `email` (opcionales) |
| `DELETE` | `/users/{id}` | Eliminar un usuario (Soft Delete). | `id` (entero) |
| `POST` | `/users/{id}/restore` | Restaurar un usuario eliminado. | `id` (entero) |

> **Nota:** Todas las respuestas están en formato JSON y siguen estándares HTTP (200 OK, 201 Created, 404 Not Found, etc.).

---

## 🚀 Instalación y Configuración

Sigue estos pasos para levantar el proyecto en tu entorno local:

1.  **Clonar el repositorio:**
    ```bash
    git clone https://github.com/tu-usuario/plantilla03-crud-eloquent.git
    cd plantilla03-crud-eloquent
    ```

2.  **Instalar dependencias:**
    ```bash
    composer install
    ```

3.  **Configurar entorno:**
    Duplica el archivo `.env.example` y renómbralo a `.env`. Luego configura tus credenciales de base de datos.
    ```bash
    cp .env.example .env
    ```

4.  **Generar clave de aplicación:**
    ```bash
    php artisan key:generate
    ```

5.  **Ejecutar migraciones:**
    Crea las tablas en tu base de datos configurada.
    ```bash
    php artisan migrate
    ```

6.  **Iniciar el servidor:**
    ```bash
    php artisan serve
    ```
    La API estará disponible en `http://localhost:8000/api/v1/users`.

---

## 👤 Autor

Desarrollado como parte del portafolio profesional de Desarrollo Backend.

*   **Perfil:** [Tu Nombre]
*   **LinkedIn:** [Tu Perfil de LinkedIn]
*   **Email:** [tu-email@ejemplo.com]

---
*Este README fue generado automáticamente para documentar la calidad técnica del proyecto.*
