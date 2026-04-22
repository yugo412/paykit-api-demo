# Base image
FROM php:8.4-fpm-alpine

# Install system dependencies + nginx + PHP extensions
RUN apk add --no-cache \
    nginx \
    bash \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install mbstring

# Copy composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install dependencies (optimized for production/demo)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Configure Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Fix permissions
RUN mkdir -p /run/nginx \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Expose port
EXPOSE 8080

# Start both PHP-FPM & Nginx
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
