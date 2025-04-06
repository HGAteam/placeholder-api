# Usa PHP oficial con GD y extensiones comunes
FROM php:8.2-cli

# Instala dependencias necesarias (incluye GD)
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip unzip git curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Directorio de la aplicación
WORKDIR /app

# Copia los archivos del proyecto
COPY . .

# Instala dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Expone el puerto de Laravel
EXPOSE 8000

# Comando para correr Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
