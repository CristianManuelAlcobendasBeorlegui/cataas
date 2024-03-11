# CATAAS

## Descripción
Proyecto que permite probar como funcionan las APIs en Laravel.

Los datos (Imagen, el tipo, tamaño y etiquetas) que se usan se extraen de la pagina [https://cataas.com/api/cats](https://cataas.com/api/cats), guardandolos en una base de datos local.

Luego, a partir de las rutas definidas en el fichero `/routes/api` se pueden hacer llamadas a `localhost:8000/api/cats` y devolver un conjunto de gatitos.