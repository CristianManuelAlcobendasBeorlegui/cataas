# CATAAS

## Descripción
Proyecto que permite probar como funcionan las APIs en Laravel.

Los datos (Imagen, el tipo, tamaño y etiquetas) que se usan se extraen de la pagina [https://cataas.com/api/cats](https://cataas.com/api/cats), guardandolos en una base de datos local.

Luego, a partir de las rutas definidas en el fichero `/routes/api` se pueden hacer llamadas a `localhost:8000/api/cats` y devolver un conjunto de gatitos.

## Poner en marcha el proyecto

### 1. Descargar e instalar dependencias
```bash
composer update
composer install
```

### 2. Crear las tablas y rellenarlas con datos de la web de gatitos
```bash
php artisan migrate:refresh --seed
```

### 3. Iniciar el servidor
```bash
php artisan serve
```

**_¡YA PUEDES HACER LLAMADAS A LA API!_**

**Prueba ha acceder a: http://localhost:8000/api/cats**

**Un posible resultado:**
```json
[
    {
        "image_id": "WDQ08TW4RVGxEjDU",
        "tags": "[\"serious\",\"black\"]"
    },
    {
        "image_id": "f1JAhXtqPfjOp5iq",
        "tags": "[\"grey\",\"cute\",\"nose\"]"
    },
    {
        "image_id": "HVWLzNNu6y4j8Eq6",
        "tags": "[\"Cute\",\"big eyes\",\"black\"]"
    },
    {
        "image_id": "Gzbswmejmglu6ZeP",
        "tags": "[\"cute\",\"black\"]"
    },
    {
        "image_id": "clrjmVqRb7hOofBV",
        "tags": "[\"Tabby\",\"hissing\"]"
    },
    {
        "image_id": "cgVj1kaXHy9zAWfZ",
        "tags": "[\"cute\",\"kittens\",\"couch\",\"sofa\"]"
    },
    {
        "image_id": "XKObgOMY9Laj0ux3",
        "tags": "[\"cute\"]"
    },
    {
        "image_id": "fX43gYP1tXJM183j",
        "tags": "[\"Peekaboo\",\"kitchencat\"]"
    },
    {
        "image_id": "52F88ixew6FGa474",
        "tags": "[\"Tent\"]"
    },
    {
        "image_id": "testARCV",
        "tags": "[\"test\", \"alpha\"]"
    }
]
```