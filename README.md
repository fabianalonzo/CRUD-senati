# Sistema CRUD - SENATI

Aplicación web construida con CodeIgniter 4 orientada a la gestión de clientes, productos y proveedores mediante operaciones básicas de tipo CRUD.

## Descripción

Este sistema permite ejecutar las operaciones esenciales como crear, listar, actualizar y eliminar registros dentro de una base de datos denominada **senati**. Además, hace uso de migraciones y seeders para administrar la estructura y los datos de manera organizada. El proyecto está diseñado como práctica del patrón MVC utilizando CodeIgniter 4.

## Tecnologías utilizadas

- PHP 8.2 o superior  
- CodeIgniter 4  
- MySQL o MariaDB  
- HTML, CSS y JavaScript  

## Funcionalidades

### Clientes

- Permite registrar nuevos clientes  
- Permite visualizar la lista de clientes  
- Permite modificar la información de clientes existentes  
- Permite eliminar registros de clientes  

### Productos

- Permite registrar productos  
- Permite listar productos  
- Permite actualizar datos de productos  
- Permite eliminar productos  

### Proveedores

- Permite registrar proveedores  
- Permite listar proveedores  
- Permite editar información de proveedores  
- Permite eliminar proveedores  

## Rutas principales

- /clientes  
- /productos  
- /proveedores  

## Base de Datos

**Nombre de la base de datos:** senati  

### Tabla: clientes

- id  
- apellidos  
- nombres  
- dni  
- telefono  

### Tabla: productos

- id  
- tipo  
- descripcion  
- precio  
- stock  

### Tabla: proveedores

- id  
- razonsocial  
- direccion  
- ruc  
- telefono  
- representante  

## Migraciones y Seeders

### Migraciones

- Se debe crear la base de datos **senati**  
- Configurar el archivo `.env` con los datos de conexión  
- Generar una migración con el comando:  

```bash
php spark make:migration NombreArchivo
```

- Definir la estructura de las tablas, tipos de datos y restricciones  
- Ejecutar la migración con:  

```bash
php spark migrate
```

- Para revertir cambios usar:  

```bash
php spark migrate:rollback
```

### Seeders

Se utilizan para cargar datos iniciales o de prueba en la base de datos.

- Crear un seeder con:  

```bash
php spark make:seeder ClientesSeeder
```

- Ejecutar el seeder con:  

```bash
php spark db:seed ClientesSeeder
```
