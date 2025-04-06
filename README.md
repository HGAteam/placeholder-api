# placeholder-api

API Laravel para la generación dinámica de datos de prueba como imágenes placeholder, texto, y más contenido simulado para entornos de desarrollo, diseño o testing. Ideal para acelerar prototipos y validar interfaces con recursos personalizables y en tiempo real.

## Características
- Generación de imágenes placeholder personalizables.
- Creación de texto simulado (Lorem Ipsum) en diferentes longitudes.
- Generación de datos de prueba como nombres, correos electrónicos, direcciones, etc.
- API RESTful fácil de integrar en cualquier proyecto.
- Soporte para múltiples formatos de imagen: PNG, JPEG, WEBP.
- Personalización de colores, texto y dimensiones.

## Uso
## Parámetros de la API de Imágenes
- **size**: Dimensiones de la imagen (ejemplo: `300x200`).
- **bg**: Color de fondo en hexadecimal o nombre (ejemplo: `ffcc00`, `blue`).
- **color**: Color del texto en hexadecimal o nombre válido.
- **text**: Texto que se mostrará en la imagen (ejemplo: `Hola+Mundo`).
- **format**: Formato de salida (`png`, `jpeg`, `webp`).

### Ejemplo de URL
```
https://placeholder-api-production.up.railway.app/api/image?size=300x200&bg=ffcc00&text=Hola+Mundo
```

### Ejemplo de uso en HTML
```html
<img src="https://placeholder-api-production.up.railway.app/api/image?size=300x200&bg=gray&text=Placeholder" alt="Placeholder">
```

## Ejemplos Visuales
### Diferentes Dimensiones
- `/api/image?size=300x200`
- `/api/image?size=600x300`
- `/api/image?size=150x150`

### Colores Personalizados
- `/api/image?size=300x200&bg=ffcc00`
- `/api/image?size=300x200&bg=blue`
- `/api/image?size=300x200&bg=111827&color=ffffff`

### Texto Personalizado
- `/api/image?size=400x200&text=Hola+Mundo`
- `/api/image?size=400x200&text=Laravel+Rocks&bg=ff0000&color=ffffff`

### Formatos Disponibles
- `/api/image?size=300x200&text=JPEG&format=jpeg`
- `/api/image?size=300x200&text=WEBP&format=webp`

## Instalación
1. Clona este repositorio:
   ```
   git clone https://github.com/tu-usuario/placeholder-api.git
   ```
2. Instala las dependencias:
   ```
   composer install
   ```
3. Configura el archivo `.env` con tus credenciales de base de datos.
4. Ejecuta las migraciones:
   ```
   php artisan migrate
   ```
5. Inicia el servidor:
   ```
   php artisan serve
   ```

## Stack Tecnológico
- Laravel 12.x
- Intervention Image v3 con driver Gd
- API pública sin autenticación
- Soporte para PNG, JPEG, WEBP

## Contribuciones
¡Las contribuciones son bienvenidas! Por favor, abre un issue o envía un pull request para sugerir mejoras.

## Licencia
Este proyecto está licenciado bajo la [MIT License](LICENSE).
