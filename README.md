# StackOverflow API Symfony

## Descripción

Esta aplicación es un servicio basado en Symfony que interactúa con la API de StackOverflow para obtener preguntas y almacenarlas en una base de datos. La aplicación permite consultar, almacenar y manejar información de preguntas de StackOverflow, incluyendo detalles sobre los autores, los tags asociados, y más.

## Características

- **Interacción con la API de StackOverflow**: Obtiene datos de preguntas desde la API de StackOverflow.
- **Almacenamiento en Base de Datos**: Persiste los datos obtenidos en una base de datos PostgreSQL.
- **Persistencia de Datos**: Maneja la persistencia y actualización de la información de las preguntas.

## Requisitos

Antes de empezar, asegúrate de tener los siguientes requisitos:

- **PHP**: 8.0 o superior
- **Symfony CLI**: 6.0 o superior
- **Composer**: 2.0 o superior
- **PostgreSQL**: 12 o superior
- **Node.js y NPM** (opcional, para el uso de herramientas de frontend si es necesario)

## Instalación

Sigue estos pasos para configurar y ejecutar la aplicación en tu entorno local:

### 1. Clona el Repositorio

Primero, clona el repositorio desde GitHub:

git clone (https://github.com/sergigarcia32/stackOverflowAPI.git)

### 2. Ejecutar

1. Compose install

2. docker-compose up -d

3. php bin/console doctrine:database:create

4. php bin/console doctrine:migrations:migrate

### 2. Levantar el servidor

1. symfony server:start

### 3. Usar un cliente HTTP

1. Puedes usar postman para probar la API

2. Pasale esta url como ejemplo: http://127.0.0.1:8000/api/stackoverflow/questions?tagged=html&formDate=2024-07-25&toDate=2024-07-24
